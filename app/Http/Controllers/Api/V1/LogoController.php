<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Logo\LogoRequest;
use App\Http\Resources\V1\Logo\Logo as LogoResource;
use App\Http\Resources\V1\Logo\LogoCollection;
use App\Models\Logo;
use Illuminate\Http\Request;

class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logos = Logo::latest()->paginate(10);
        return new LogoCollection($logos);
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
    public function store(LogoRequest $request)
    {
        if( auth()->user()->hasRole('100e82ba-e1c0-4153-8633-e1bd228f7399') ) {

            $logo = new Logo();
            if($request->hasFile('logo')) {

                $imageUrl = $this->upload_image($request->file('logo'));
                $logo->create( array_merge( $request->all(), [ 'logo' => $imageUrl ] ));
            } else {
    
                $logo->create( $request->all() );
            }
            return Response([
                'data' => 'Your request was submitted successfully',
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
    public function show(Logo $logo)
    {
        return new LogoResource($logo);
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
    public function update(LogoRequest $request, Logo $logo)
    {
        if( auth()->user()->hasRole('100e82ba-e1c0-4153-8633-e1bd228f7399') ) {

            if($request->hasFile('logo')) {
                
                if(! empty($logo->logo) ) {

                    $path = $this->unlink_image_from_path( $logo->logo );
                    unlink($path); 
                }
                $image = $this->upload_image($request->file('logo'));
            } else {
                
                $image = $logo->logo;
            }
            $logo->update(array_merge($request->all(), [
                    'logo' => $image
                ] 
            ));

            return Response([
                'data' => 'Your request was updated successfully',
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
    public function destroy(Logo $logo)
    {
        if( auth()->user()->hasRole('100e82ba-e1c0-4153-8633-e1bd228f7399') ) {
            
            if(! empty($logo->logo) ) {

                $path = $this->unlink_image_from_path( $logo->logo );
                unlink($path); 
            }
            $logo->delete();

            return Response([
                'data' => 'Your request was deleted successfully',
                'status' => 'success'
            ]);
        }
    }
}
