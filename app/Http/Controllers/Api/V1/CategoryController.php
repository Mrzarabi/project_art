<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Category\CategoryRequest;
use App\Http\Resources\V1\Category\Category as CategoryResource;
use App\Http\Resources\V1\Category\CategoryCollection;
use App\Models\Category;
use Carbon\Carbon;
use Facade\FlareClient\Http\Response;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('category_id', null)->get();
        
        if (request()->wantsJson()) {
            return new CategoryCollection($categories);
        } else {
            return view('category', compact('categories'));
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
    public function store(CategoryRequest $request)
    {
        if( auth()->user()->hasRole('100e82ba-e1c0-4153-8633-e1bd228f7399') ) {

            $category = new Category;
            if($request->hasFile('image')) {
    
                $imageUrl = $this->upload_image($request->file('image'));
                $category->create( array_merge( $request->all(), [ 'image' => $imageUrl ] ));
            } else {
    
                $category->create( array_merge( $request->all() ));
            }
            return Response([
                'data' => 'Your category was submitted successfully',
                'status' => 'success'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        if(request()->wantsJson()) {
            
            return new CategoryResource($category);
        } else {
            return view('test', compact('category'));
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
    public function update(CategoryRequest $request, Category $category)
    {
        if( auth()->user()->hasRole('100e82ba-e1c0-4153-8633-e1bd228f7399') ) {

            if($request->hasFile('image')) {

                $image = $this->upload_image($request->file('image'));
            } else {
                
                $image = $category->image;
            }
            $category->update(array_merge($request->all(), [
                    'image' => $image
                ] 
            ));

            return Response([
                'data' => 'Your category was updated successfully',
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
    public function destroy(Category $category)
    {
        if( auth()->user()->hasRole('100e82ba-e1c0-4153-8633-e1bd228f7399') ) {
            $category->delete();

            return Response([
                'data' => 'Your category was deleted successfully',
                'status' => 'success'
            ]);
        }
    }
}
