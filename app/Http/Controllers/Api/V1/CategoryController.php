<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Category\CategoryRequest;
use App\Http\Resources\Api\V1\Category\Category as CategoryResource;
use App\Http\Resources\Api\V1\Category\CategoryCollection;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Input;
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
        $categories = Category::all();
        return new CategoryCollection($categories);
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
        $category = new Category;

            $category->create( array_merge( $request->all(), [
                'image' => $this->upload_image($request->file('image'))
            ]  
            ));

        return $this->responce([
            'data' => 'دسته بندی با موققیت ثبت شد',
            'status' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return new CategoryResource($category);
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
        return $request;
        if($request->hasFile('image')) {
            $image = $this->upload_image($request->file('image'));
        } else {
            $image = $category->image;
        }
        $category->update(array_merge($request->all(), [
                'image' => $image
            ] 
        ));

        return $this->responce([
            'data' => 'دسته بندی با موفقیت به روز رسانی شد',
            'status' => 'success' 
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return response([
            'data' => 'دسته بندی با موفقیت حذف شد',
            'status' => 'success'
        ]);
    }
}
