<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\multiDelete\multiDeleteRequest;
use App\Http\Requests\V1\Post\PostRequest;
use App\Http\Requests\V1\Upload\UploadFileRequest;
use App\Http\Requests\V1\Upload\UploadImageRequest;
use App\Http\Resources\V1\Post\Post as PostResource;
use App\Http\Resources\V1\Post\PostCollection;
use App\Models\Image;
use App\Models\Post;
use App\Models\Video;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10);

        if(request()->wantsJson()) {
            return new PostCollection($posts);
        } else {
            return view('test', compact($posts));
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
    public function store(PostRequest $request)
    {
        if( auth()->user()->hasRole('100e82ba-e1c0-4153-8633-e1bd228f7399') ) {

            $post = auth()->user()->posts()->create( array_merge( $request->all()));
            return response([
                'data' => $post->id,
                'message' => 'Your post was submitted successfully',
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
    public function upload(UploadFileRequest $request, Post $post)
    {
        if( auth()->user()->hasRole('100e82ba-e1c0-4153-8633-e1bd228f7399') ) {

            if($request->hasFile('image')) {

                $images = $request->file('image');
                foreach ($images as $image) {
                    $file = $this->upload_image($image);
                    $post->images()->create([ 'image' => $file ]);
                }
                return response([
                'data' => 'Your images were uploaded successfully',
                    'status' => 'success'
                ]);

            } elseif( $request->videoUrl ) {

                $videos = explode(" ", $request->videoUrl);
                foreach ($videos as $video) {
                    $post->videos()->create([ 'videoUrl' => $video ]);
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
    public function show(Post $post)
    {
        if(request()->wantsJson()) {

            return new PostResource($post);
        } else {

            return view('Layouts.Post.show', compact('post'));
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
    public function update(PostRequest $request, Post $post)
    {
        if( auth()->user()->hasRole('100e82ba-e1c0-4153-8633-e1bd228f7399') ) {
            
            $post->update($request->all());
            
            return Response([
                'images' => Image::where('post_id', $post->id)->get(),
                'videos' => Video::where('post_id', $post->id)->get(),
                'message' => 'Your post was updated successfully',
                'status' => 'success'
            ]);
        }
    }

    //TODO نوشتن کامنت 
    public function updateUpload(UploadFileRequest $request, Post $post) 
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
                    $post->images()->create(['image' => $file]);
                }
                return response([
                    'data' => 'Your images were updated successfully',
                    'status' => 'success'
                ]);

            } elseif ($request->videoUrl) {

                $videos = explode(" ", $request->videoUrl);
                foreach ($videos as $video) {
                    $post->videos()->create([ 'videoUrl' => $video ]);
                }
                
                return response([
                    'data' => 'Your videos were updated successfully',
                    'status' => 'success'
                ]);
            } else {
                
                return response([
                    'data' => 'Your request was updated successfully',
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
    public function destroy(Post $post)
    {
        if( auth()->user()->hasRole('100e82ba-e1c0-4153-8633-e1bd228f7399') ) {

            $images = Image::where('post_id', $post->id )->get();
            foreach ($images as $image) {
                $path = $this->unlink_image_from_path( $image->image );
                unlink($path); 
            }
            $post->delete();

            return response([
                'data' => 'Your post was deleted successfully',
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
                $images = Image::where('post_id', $id )->get();
                foreach ($images as $image) {
                    $path = $this->unlink_image_from_path( $image->image );
                    unlink($path); 
                }
                DB::table('posts')->where('id', $id)->delete();
            }

            return response([
                'data' => 'Your posts were deleted successfully',
                'status' => 'success'
            ]);
        }
    }
}
