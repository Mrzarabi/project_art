@extends('Layouts.master')
@section('main')
    <div class="container">
        <div class="ts-title">
            <h2>Portfolio</h2>
        </div>
        <!--end ts-title-->
        <div class="card-columns ts-gallery ts-column-count-4">
        @foreach ($posts as $post)
            @php
                $image = $post->images()->first();
                $video = $post->videos()->first();
            @endphp
            <a href=" {{route('post.show', ['post' => $post->id ])}} " class="card ts-gallery__item" data-animate="ts-fadeInUp">
                <div class="ts-gallery__image">
                    <div class="ts-gallery__item-description">
                        <h6 class="ts-opacity__50"> 
                        @if ($post->category)
                            {{$post->category->title}}
                        @endif </h6>
                        <h4>{{ $post->title }}</h4>
                    </div>
                    @if ( isset($post->images) )
                        <img src=" {{$image->image}} " class="card-img" alt="image" style="max-height: 400px">
                    {{-- @else
                        <div class="d-flex justify-content-center">
                            <video width="200" height="100">
                                <source src="{{$video}}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        </div> --}}
                    @endif

                    <!--end ts-gallery__item-description-->
                </div>
                <!--end ts-gallery__image-->
            </a>
            <!--end card ts-gallery__item-->
        @endforeach
            {{-- <a href="assets/img/img-work-03.png" class="card ts-gallery__item popup-image" data-animate="ts-fadeInUp">
                <div class="ts-gallery__image">
                    <img src="assets/img/img-work-03.png" class="card-img" alt="">
                    <div class="ts-gallery__item-description">
                        <h6 class="ts-opacity__50">Typography</h6>
                        <h4>Kali</h4>
                    </div>
                    <!--end ts-gallery__item-description-->
                </div>
                <!--end ts-gallery__image-->
            </a> --}}
            <!--end card ts-gallery__item-->
            {{-- <a href="assets/img/img-work-04.png" class="card ts-gallery__item popup-image" data-animate="ts-fadeInUp">
                <div class="ts-gallery__image">
                    <img src="assets/img/img-work-04.png" class="card-img" alt="">
                    <div class="ts-gallery__item-description">
                        <h6 class="ts-opacity__50">Identity</h6>
                        <h4>Purity</h4>
                    </div>
                    <!--end ts-gallery__item-description-->
                </div>
                <!--end ts-gallery__image-->
            </a> --}}
            <!--end card ts-gallery__item-->
            {{-- <a href="assets/img/img-work-05.png" class="card ts-gallery__item popup-image" data-animate="ts-fadeInUp">
                <div class="ts-gallery__image">
                    <img src="assets/img/img-work-05.png" class="card-img" alt="">
                    <div class="ts-gallery__item-description">
                        <h6 class="ts-opacity__50">Coding</h6>
                        <h4>SawMill</h4>
                    </div>
                    <!--end ts-gallery__item-description-->
                </div>
                <!--end ts-gallery__image-->
            </a> --}}
            <!--end card ts-gallery__item-->
            {{-- <a href="assets/img/img-work-06.png" class="card ts-gallery__item popup-image" data-animate="ts-fadeInUp">
                <div class="ts-gallery__image">
                    <img src="assets/img/img-work-06.png" class="card-img" alt="">
                    <div class="ts-gallery__item-description">
                        <h6 class="ts-opacity__50">Webdesign</h6>
                        <h4>Browar</h4>
                    </div>
                    <!--end ts-gallery__item-description-->
                </div>
                <!--end ts-gallery__image-->
            </a> --}}
            <!--end card ts-gallery__item-->
            {{-- <a href="assets/img/img-work-07.png" class="card ts-gallery__item popup-image" data-animate="ts-fadeInUp">
                <div class="ts-gallery__image">
                    <img src="assets/img/img-work-07.png" class="card-img" alt="">
                    <div class="ts-gallery__item-description">
                        <h6 class="ts-opacity__50">Experiment</h6>
                        <h4>Wood Tables</h4>
                    </div>
                    <!--end ts-gallery__item-description-->
                </div>
                <!--end ts-gallery__image-->
            </a> --}}
            <!--end card ts-gallery__item-->
            {{-- <a href="assets/img/img-work-08.png" class="card ts-gallery__item popup-image" data-animate="ts-fadeInUp">
                <div class="ts-gallery__image">
                    <img src="assets/img/img-work-08.png" class="card-img" alt="">
                    <div class="ts-gallery__item-description">
                        <h6 class="ts-opacity__50">Product Design</h6>
                        <h4>Air Purifier</h4>
                    </div>
                    <!--end ts-gallery__item-description-->
                </div>
                <!--end ts-gallery__image-->
            </a> --}}
            <!--end card ts-gallery__item-->
            {{-- <a href="assets/img/img-work-10.png" class="card ts-gallery__item popup-image" data-animate="ts-fadeInUp">
                <div class="ts-gallery__image">
                    <img src="assets/img/img-work-10.png" class="card-img" alt="">
                    <div class="ts-gallery__item-description">
                        <h6 class="ts-opacity__50">App Developing</h6>
                        <h4>Boombox</h4>
                    </div>
                    <!--end ts-gallery__item-description-->
                </div>
                <!--end ts-gallery__image-->
            </a> --}}
            <!--end card ts-gallery__item-->
            {{-- <a href="assets/img/img-work-11.png" class="card ts-gallery__item popup-image" data-animate="ts-fadeInUp">
                <div class="ts-gallery__image">
                    <img src="assets/img/img-work-11.png" class="card-img" alt="">
                    <div class="ts-gallery__item-description">
                        <h6 class="ts-opacity__50">3D Art</h6>
                        <h4>The Deer</h4>
                    </div>
                    <!--end ts-gallery__item-description-->
                </div>
                <!--end ts-gallery__image-->
            </a> --}}
            <!--end card ts-gallery__item-->
            {{-- <a href="assets/img/img-work-09.png" class="card ts-gallery__item popup-image" data-animate="ts-fadeInUp">
                <div class="ts-gallery__image">
                    <img src="assets/img/img-work-09.png" class="card-img" alt="">
                    <div class="ts-gallery__item-description">
                        <h6 class="ts-opacity__50">Rebranding</h6>
                        <h4>Dafont</h4>
                    </div>
                    <!--end ts-gallery__item-description-->
                </div>
                <!--end ts-gallery__image-->
            </a> --}}
            <!--end card ts-gallery__item-->
        </div>
        <!--end ts-gallery-->
    </div>
    <!--end container-->
@endsection