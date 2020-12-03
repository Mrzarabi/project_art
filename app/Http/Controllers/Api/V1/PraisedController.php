<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\multiDelete\multiDeleteRequest;
use App\Http\Requests\V1\Praised\PraisedRequest;
use App\Http\Requests\V1\Upload\UploadFileRequest;
use App\Http\Resources\V1\Praised\Praised as PraisedResource;
use App\Http\Resources\V1\Praised\PraisedCollection;
use App\Models\Image;
use App\Models\Praised;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PraisedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $praiseds = Praised::latest()->paginate(10);
        if(request()->wantsJson()) {

            return new PraisedCollection($praiseds);
        } else {
            $praiseds = Praised::latest()->simplePaginate(1);
            return view('Layouts.Praised.praised', compact('praiseds'));
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
    public function store(PraisedRequest $request)
    {
        if( auth()->user()->hasRole('100e82ba-e1c0-4153-8633-e1bd228f7399') ) {

            $praised = auth()->user()->praiseds()->create( $request->all() );
            return response([
                'data' => $praised->id,
                'message' => 'Your praised post was submitted successfully',
                'status' => 'success',
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
    public function upload(UploadFileRequest $request, Praised $praised)
    {
        if( auth()->user()->hasRole('100e82ba-e1c0-4153-8633-e1bd228f7399') ) {

            if($request->hasFile('image')) {

                $images = $request->file('image');
                foreach ($images as $image) {
                    $file = $this->upload_image($image);
                    $praised->images()->create([ 'image' => $file ]);
                }

                return response([
                'data' => 'Your images were uploaded successfully',
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
    public function show(Praised $praised)
    {
        if(request()->wantsJson()) {

            return new PraisedResource($praised);
        } else {

            return view('Layouts.Praised.show', compact('praised'));
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
    public function update(PraisedRequest $request, Praised $praised)
    {
        if( auth()->user()->hasRole('100e82ba-e1c0-4153-8633-e1bd228f7399') ) {

            $praised->update($request->all());

            return Response([
                'message' => 'Your praised post was updated successfully',
                'status' => 'success' 
            ]);
        }
    }

    //TODO نوشتن کامنت 
    public function updateUpload(UploadFileRequest $request, Praised $praised) 
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

            if( $request->hasFile('image')) {

                $images = $request->file('image');

                foreach ($images as $image) {
                    $file = $this->upload_image($image);
                    $praised->images()->create(['image' => $file]);
                }

                return response([
                    'data' => 'Your images were updated successfully',
                    'status' => 'success'
                ]);
            }
            
            return response([
                'data' => 'Your images were updated successfully',
                'status' => 'success'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Praised $praised)
    {
        if( auth()->user()->hasRole('100e82ba-e1c0-4153-8633-e1bd228f7399') ) {

            $images = Image::where('praised_id', $praised->id )->get();
            foreach ($images as $image) {
                $path = $this->unlink_image_from_path( $image->image );
                unlink($path); 
            }
            $praised->delete();

            return response([
                'data' => 'Your praised post was deleted successfully',
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
                $images = Image::where('praised_id', $id )->get();
                foreach ($images as $image) {
                    $path = $this->unlink_image_from_path( $image->image );
                    unlink($path); 
                }
                DB::table('praiseds')->where('id', $id)->delete();
            }

            return response([
                'data' => 'Your praised were deleted successfully',
                'status' => 'success'
            ]);
        }
    }
}
