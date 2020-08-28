@extends('Layouts.master')
@section('main')
    <div class="container">
        <div class="ts-title text-center">
            <h2>About Me</h2>
        </div>
        <!--end ts-title-->
        <div class="row ts-align__vertical">
            <div class="col-md-6">
                <img src="assets/img/img-man-looking.jpg" alt="" class="mw-100 mb-5">
            </div>
            <div class="col-md-6">
                <h4 class="ts-bubble-border">Hi There</h4>
                <p>
                    In id nulla magna. Nullam posuere fermentum mattis. Nunc id dui at sapien faucibus fermentum
                    ut vel diam. Nullam tempus, nunc id efficitur sagittis, urna est ultricies eros, ac porta
                    sem turpis quis leo. Nulla in feugiat elit.
                </p>
                <dl class="ts-column-count-2">
                    <dt>Name:</dt>
                    <dd>Jonathan Doe</dd>
                    <dt>Phone:</dt>
                    <dd>+1 908-736-1801</dd>
                    <dt>Email:</dt>
                    <dd>hello@example.com</dd>
                    <dt>Twitter:</dt>
                    <dd>freelancer9</dd>
                </dl>
                <hr class="ts-hr-light mb-5">
                <a href="#contact" class="ts-btn-effect mr-2">
                    <span class="ts-visible btn btn-primary ts-btn-arrow">Contact Me</span>
                    <span class="ts-hidden btn btn-primary ts-btn-arrow" data-bg-color="#d44729">Contact Me</span>
                </a>
                <!--<a href="#contact" class="btn btn-primary ts-btn-arrow mr-2">Contact Me</a>-->
                <!--<a href="#contact" class="btn btn-outline-light ts-btn-border-light">-->
                    <!--<i class="fa fa-download small mr-2"></i>-->
                    <!--Download CV-->
                <!--</a>-->
                <a href="#contact" class="ts-btn-effect mr-2">
                    <span class="ts-visible btn btn-outline-light">
                        <i class="fa fa-download small mr-2"></i>
                        Download CV
                    </span>
                    <span class="ts-hidden btn btn-light bg-white">
                        <i class="fa fa-download small mr-2"></i>
                        Download CV
                    </span>
                </a>
            </div>
        </div>
        <!--end row-->
    </div>    
@endsection
