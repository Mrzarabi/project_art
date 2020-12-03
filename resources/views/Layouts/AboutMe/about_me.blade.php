@extends('Layouts.master')
@section('main')
    <div class="container">
        <div class="ts-title text-center">
            <h2>About Me</h2>
        </div>
        <!--end ts-title-->
        <div class="row ts-align__vertical">
            <div class="col-md-5">
                @if ($user->avatar)
                    <img src=" {{$user->avatar}} " alt="avatar" class="mw-100 mb-5">
                @else
                    <img src="assets/img/img-man-looking.jpg" alt="avatar" class="mw-100 mb-5">
                @endif
            </div>
            <div class="col-md-7">
                <div class="row">
                    <div class="col-md-3">
                        <h4 class="ts-bubble-border">Hi There</h4>
                    </div>
                    <div class="col-md-3 offset-6">
                        @if ($user->i_acc)
                            <a href=" {{$user->i_acc}} " class="mb-3 d-flex text-white ts-align__vertical" style="justify-content: flex-end; float:right;">
                                <span class="ts-circle__xs border border-white ts-border-light mr-4">
                                    <i class="fab fa-instagram"></i>
                                </span>
                            </a>    
                        @endif
                        @if ($user->f_acc)
                            <a href=" {{$user->f_acc}} " class="mb-3 d-flex text-white ts-align__vertical" style="justify-content: flex-end;">
                                <span class="ts-circle__xs border border-white ts-border-light mr-4">
                                    <i class="fab fa-facebook"></i>
                                </span>
                            </a>    
                        @endif
                    </div>
                </div>
                
                <p>
                    {{$user->desc}}
                </p>
                <hr class="ts-hr-light mb-5">
                <dl class="ts-column-count-3">
                    <dt>Name:</dt>
                    <dd>{{$user->name . ' ' . $user->family}}</dd>
                    <dt>Email:</dt>
                    <dd> {{$user->email}} </dd>
                    <dt>Phone:</dt>
                    <dd> {{$user->phone_number}} </dd>
                </dl>
                <dl class="ts-column-count-1">
                    <dt>Address:</dt>
                    <dd> {{$user->address}} </dd>
                </dl>
            </div>
        </div>
        <!--end row-->
    </div>    
@endsection
