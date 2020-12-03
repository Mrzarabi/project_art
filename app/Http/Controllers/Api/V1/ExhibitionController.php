<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Exhibition\ExhibitionRequest;
use App\Http\Requests\V1\multiDelete\multiDeleteRequest;
use App\Http\Requests\V1\Upload\UploadFileRequest;
use App\Http\Resources\V1\Exhibition\Exhibition as ExhibitionResource;
use App\Http\Resources\V1\Exhibition\ExhibitionCollection;
use App\Models\Exhibition;
use App\Models\Image;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExhibitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exhibitions = Exhibition::latest()->paginate(10);
        if(request()->wantsJson()) {

            return new ExhibitionCollection($exhibitions);
        } else {
            $exhibitions = Exhibition::latest()->simplePaginate(1);
            return view('Layouts.Exhibition.exhibition', compact('exhibitions'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExhibitionRequest $request)
    {
        if( auth()->user()->hasRole('100e82ba-e1c0-4153-8633-e1bd228f7399') ) {

            $exhibition = auth()->user()->exhibitions()->create( $request->all() );
            return response([
                'data' => $exhibition->id,
                'message' => 'Your exhibition post was submitted successfully',
                'status' => 'success'
            ]);
        }
    }

    //TODO نوشتن کامنت 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function upload(UploadFileRequest $request, Exhibition $exhibition)
    {
        if( auth()->user()->hasRole('100e82ba-e1c0-4153-8633-e1bd228f7399') ) {

            if($request->hasFile('image')) {

                $images = $request->file('image');
                foreach ($images as $image) {
                    $file = $this->upload_image($image);
                    $exhibition->images()->create([ 'image' => $file ]);
                }
                return response([
                'data' => 'Your images were uploaded successfully',
                'status' => 'success'
                ]);

            } elseif( $request->videoUrl ) {

                $videos = explode(" ", $request->videoUrl);
                foreach ($videos as $video) {
                    $exhibition->videos()->create([ 'videoUrl' => $video ]);
                }
                return response([
                    'data' => 'Your videos were uploaded successfully',
                    'status' => 'success'
                ]);
            } else {

                return response([
                    'data' => 'You have not uploaded anything :(',
                    'status' => 'success'
                ]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Exhibition $exhibition)
    {
        if(request()->wantsJson()) {

            return new ExhibitionResource($exhibition);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExhibitionRequest $request, Exhibition $exhibition)
    {
        if( auth()->user()->hasRole('100e82ba-e1c0-4153-8633-e1bd228f7399') ) {

            $exhibition->update($request->all());

            return Response([
                'message' => 'Your exhibition post was updated successfully',
                'status' => 'success' 
            ]);
        }
    }

    //TODO نوشتن کامنت 
    public function updateUpload(UploadFileRequest $request, Exhibition $exhibition) 
    {
        if( auth()->user()->hasRole('100e82ba-e1c0-4153-8633-e1bd228f7399') ) {

            /**
             * find id image should delete 
             */
            if( $request->deleteFileImage ) {
                
                $ids = explode(',', $request->deleteFileImage);
                foreach ($ids as $id) {
                    $path = $this->unlink_image( $id );
                    unlink($path); 
                    Image::where('id', $id)->delete();
                }
            } 

            /**
             * find id video url should delete 
             */
            if( $request->deleteFileVideoUrl ) {

                $ids = explode(',', $request->deleteFileVideoUrl);
                foreach ($ids as $id) {
                    Video::where('id', $id)->delete();
                }
            }

            if( $request->hasFile('image')) {

                $images = $request->file('image');

                foreach ($images as $image) {
                    $file = $this->upload_image($image);
                    $exhibition->images()->create(['image' => $file]);
                }
                return response([
                    'data' => 'Your images were updated successfully',
                    'status' => 'success'
                ]);
            } elseif ($request->videoUrl) {

                $videos = explode(" ", $request->videoUrl);
                foreach ($videos as $video) {
                    $exhibition->videos()->create([ 'videoUrl' => $video ]);
                }
                
                return response([
                    'data' => 'Your videos were updated successfully',
                    'status' => 'success'
                ]);
            } else {
                
                return response([
                    'data' => 'Your requests were updated successfully',
                    'status' => 'success'
                ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exhibition $exhibition)
    {
        if( auth()->user()->hasRole('100e82ba-e1c0-4153-8633-e1bd228f7399') ) {

            $images = Image::where('exhibition_id', $exhibition->id )->get();
            foreach ($images as $image) {
                $path = $this->unlink_image_from_path( $image->image );
                unlink($path); 
            }

            $exhibition->delete();

            return response([
                'data' => 'Your exhibition post was deleted successfully',
                'status' => 'success'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function multiDelete(multiDeleteRequest $request)
    {
        if( auth()->user()->hasRole('100e82ba-e1c0-4153-8633-e1bd228f7399') ) {

            $ids = explode(',', $request->ids);
            foreach ($ids as $id) {
                $images = Image::where('exhibition_id', $id )->get();
                foreach ($images as $image) {
                    $path = $this->unlink_image_from_path( $image->image );
                    unlink($path); 
                }
                DB::table('exhibitions')->where('id', $id)->delete();
            }

            return response([
                'data' => 'Your exhibition were deleted successfully',
                'status' => 'success'
            ]);
        }
    }
}