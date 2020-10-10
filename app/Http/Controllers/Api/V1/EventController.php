<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Event\EventRequest;
use App\Http\Requests\V1\multiDelete\multiDeleteRequest;
use App\Http\Resources\V1\Event\EventCollection;
use App\Http\Resources\V1\Event\Event as EventResource;
use App\models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::latest()->paginate(10);
        if(request()->wantsJson()) {

            return new EventCollection($events);
        } else {
            
            return view('test', compact($events));
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
    public function store(EventRequest $request)
    {
        if( auth()->user()->hasRole('100e82ba-e1c0-4153-8633-e1bd228f7399') ) {

            if($request->hasFile('image')) {

                $image = $this->upload_image( $request->file('image') );
                auth()->user()->events()->create( 
                    array_merge( $request->all(), ['image' => $image]) );
            } else {

                auth()->user()->events()->create( $request->all() );
            }

            return response([
                'data' => 'Your event was submitted successfully',
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
    public function show(Event $event)
    {
        if(request()->wantsJson()) {

            return new EventResource($event);
        } else {
            
            return view('test', compact($event));
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
    public function update(EventRequest $request, Event $event)
    {
        if( auth()->user()->hasRole('100e82ba-e1c0-4153-8633-e1bd228f7399') ) {

            if($request->hasFile('image') ) {

                $image = $this->upload_image( $request->file('image') );
            } else {

                $image = $event->image;
            }

            //TODO ثبت ایونت هایی که تصویر ندارن و براشون تصویر هم اپدیت نمیشه
            $event->update(
                 array_merge($request->all(), ['image' => $image]));

            return Response([
                'message' => 'Your event was updated successfully',
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
    public function destroy(Event $event)
    {
        if( auth()->user()->hasRole('100e82ba-e1c0-4153-8633-e1bd228f7399') ) {

            $event->delete();

            return response([
                'data' => 'Your event was deleted successfully',
                'status' => 'success'
            ]);
        }
    }

    //TODO نوشتن کامنت 
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
                DB::table('events')->where('id', $id)->delete();
            }

            return response([
                'data' => 'Your events were deleted successfully',
                'status' => 'success'
            ]);
        }
    }
}
