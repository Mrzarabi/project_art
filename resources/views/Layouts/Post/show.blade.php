@extends('Layouts.master')
@section('main')
    <section id="testimonials" class="ts-block text-center pb-5">
        <div class="container">
            <div class="ts-title">
                <h2> {{$post->title}} </h2>
            </div>
            <!--end ts-title-->
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-8 offset-2">
                            <div class="owl-carousel video" data-owl-dots="1" data-owl-loop="1" data-animate="ts-fadeInUp" owl-trigger='stop.owl.autoplay'>
                                @foreach ($post->videos as $video)
                                    <div class="d-flex justify-content-center">
                                        <video width="600" height="400" controls>
                                            <source src="{{$video->videoUrl}}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    </div>
                                @endforeach
                            </div>
                            <div class="owl-carousel" data-owl-dots="1" data-owl-loop="3" data-animate="ts-fadeInUp">
                                @foreach ($post->images as $image)
                                    @if ( isset($post->images) )
                                        <div class="d-flex justify-content-center">
                                            <img src=" {{$image->image}}" class="card-img card-columns" alt="image" style=" width:auto; max-width: 600px; height:auto; max-height: 400px">
                                        </div>
                                    @else
                                        <img src="assets/img/img-work-02.png" class="card-img" alt="image">
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <!--end col-md-8-->
                        <div class="col-md-10 offset-1 mt-2">
                            {{-- <dl class="ts-column-count-4">
                                @if ($post->s_link)
                                    <dd>
                                        <a href=" {{$post->s_link}} " class="d-flex text-white" style="justify-content: flex-start;">
                                            <span class="mr-3">
                                                <i class="fa fa-globe ts-bg-primary p-1 rounded"></i>
                                            </span>
                                            <span class="mr-2 pr-2">
                                                <p style="font-size: 11px" class="mb-0">
                                                    Click For Seeing The Original
                                                </p>
                                            </span>
                                        </a>    
                                    </dd>
                                @endif 
                                @if ($post->writer)
                                    <dd>
                                        <div class="d-flex text-white" style="justify-content: flex-start;">
                                            <span class="mr-3">
                                                <i class="fa fa-user ts-bg-primary p-1 rounded"></i>
                                            </span>
                                            <span class="mr-2 pr-2">
                                                <p style="font-size: 11px" class="mb-0">
                                                    Written By {{$post->writer}}
                                                </p>
                                            </span>
                                        </div>    
                                    </dd>
                                @endif 
                                @if ($post->date)
                                    <dd>
                                        <div class="d-flex text-white" style="justify-content: flex-start;">
                                            <span class="mr-3">
                                                <i class="fa fa-calendar-times ts-bg-primary p-1 rounded"></i>
                                            </span>
                                            <span class="mr-2 pr-2">
                                                <p style="font-size: 11px" class="mb-0">
                                                    Posted in {{$post->date}}
                                                </p>
                                            </span>
                                        </div>    
                                    </dd>
                                @endif 
                                @if ($post->time)
                                    <dd>
                                        <div class="d-flex text-white" style="justify-content: flex-start;">
                                            <span class="mr-3">
                                                <i class="fa fa-clock ts-bg-primary p-1 rounded"></i>
                                            </span>
                                            <span class="mr-2 pr-2">
                                                <p style="font-size: 11px" class="mb-0">
                                                    {{$post->time}} Min For Read
                                                </p>
                                            </span>
                                        </div>    
                                    </dd>
                                @endif 
                            </dl> --}}
                            <hr class="ts-hr-light">
                            <h6 class="ts-opacity__40 text-left"> {{$post->body}} </h6>
                            <div class="col-md-12 pt-5">
                            </div>
                        </div>
                        <!--end col-md-8-->
                    </div>
                </div>
                <!--end col-md-12-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section>
    <!--end #testimonials ts-block-->
@endsection