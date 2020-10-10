<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\User\UserRequest;
use App\Http\Resources\V1\User\User as UserResource;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //TODO نوشتن کامنت ها
    public function login(Request $request)
    {
        $validData =  Validator::make($request, [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if(! Auth::attempt($validData) ) {

            return response([
                'data' => 'اطلاعات شما صحیح نمی باشد',
                'status' => 'error'
            ], 403);
        }

        return new UserResource( auth()->user );
    }

    //TODO comment
    public function register(Request $request)
    {
        return response([
            'data' => 'We do not have this route',
            'status' => 'error'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user) 
    {
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        if( auth()->user()->hasRole('100e82ba-e1c0-4153-8633-e1bd228f7399') ) {

            if($request->hasFile('avatar')) {
                
                $avatar = $this->upload_image( $request->file('avatar') );
            } else {

                $avatar = $user->avatar;
            }
            $user->update(
                array_merge( $request->all() , ['avatar' => $avatar] ));
            
            return Response([
                'message' => 'Your profile was updated successfully',
                'status' => 'success' 
            ]);
        }
    }
}
