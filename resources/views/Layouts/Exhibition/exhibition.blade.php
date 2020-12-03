@extends('Layouts.master')
@section('main')
    <section id="testimonials" class="ts-block text-center pb-5">
        <div class="container">
            <div class="ts-title">
                <h2>Exhibitions</h2>
            </div>
            <!--end ts-title-->
            <div class="row">
                @foreach ($exhibitions as $exhibition)
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-8 offset-2">
                                <div class="owl-carousel" data-owl-dots="1" data-owl-loop="1" data-animate="ts-fadeInUp">
                                    @foreach ($exhibition->videos as $video)
                                        <div class="d-flex justify-content-center">
                                            <video width="600" height="400" controls>
                                                <source src="{{$video->videoUrl}}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="owl-carousel" data-owl-dots="1" data-owl-loop="3" data-animate="ts-fadeInUp" >
                                    @foreach ($exhibition->images as $image)
                                        @if ( ! empty($exhibition->images) )
                                        <div class="d-flex justify-content-center">
                                            <img src=" {{$image->image}}" alt="image" style="width: auto; max-width: 500px; max-height: 400px" controls>
                                        </div>
                                        @else
                                            <img src="assets/img/img-work-02.png" class="card-img" alt="image">
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <!--end col-md-8-->
                            <div class="col-md-10 offset-1 mt-2">
                                <dl class="ts-column-count-4">
                                    @if ($exhibition->s_link)
                                        <dd>
                                            <a href=" {{$exhibition->s_link}} " class="d-flex text-white" style="justify-content: flex-start;">
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
                                    @if ($exhibition->i_link)
                                        <dd>
                                            <a href=" {{$exhibition->i_link}} " class="d-flex text-white" style="justify-content: flex-start;">
                                                <span class="mr-3">
                                                    <i class="fab fa-instagram ts-bg-primary p-1 rounded"></i>
                                                </span>
                                                <span class="mr-2 pr-2">
                                                    <p style="font-size: 11px" class="mb-0">
                                                       Click For Seeing In The Instagram
                                                    </p>
                                                </span>
                                            </a>    
                                        </dd>
                                    @endif 
                                    @if ($exhibition->f_link)
                                        <dd>
                                            <a href=" {{$exhibition->f_link}} " class="d-flex text-white" style="justify-content: flex-start;">
                                                <span class="mr-3">
                                                    <i class="fab fa-facebook ts-bg-primary p-1 rounded"></i>
                                                </span>
                                                <span class="mr-2 pr-2">
                                                    <p style="font-size: 11px" class="mb-0">
                                                        Click For Seeing In The FaceBook
                                                    </p>
                                                </span>
                                            </a>    
                                        </dd>
                                    @endif 
                                    @if ($exhibition->date)
                                        <dd>
                                            <div class="d-flex text-white" style="justify-content: flex-start;">
                                                <span class="mr-3">
                                                    <i class="fa fa-calendar-times ts-bg-primary p-1 rounded"></i>
                                                </span>
                                                <span class="mr-2 pr-2">
                                                    <p style="font-size: 11px" class="mb-0">
                                                        Posted in {{$exhibition->date}}
                                                    </p>
                                                </span>
                                            </div>    
                                        </dd>
                                    @endif 
                                    @if ($exhibition->time)
                                        <dd>
                                            <div class="d-flex text-white" style="justify-content: flex-start;">
                                                <span class="mr-3">
                                                    <i class="fa fa-clock ts-bg-primary p-1 rounded"></i>
                                                </span>
                                                <span class="mr-2 pr-2">
                                                    <p style="font-size: 11px" class="mb-0">
                                                        {{$exhibition->time}} Min For Read
                                                    </p>
                                                </span>
                                            </div>    
                                        </dd>
                                    @endif 
                                </dl>
                                <hr class="ts-hr-light">
                                <h5 class="text-left mb-3"> {{$exhibition->title}} </h5>
                                <h6 class="ts-opacity__40 text-left"> {{$exhibition->body}} </h6>
                                <div class="col-md-12 pt-5">
                                </div>
                            </div>
                            <!--end col-md-8-->
                        </div>
                    </div>
                    <!--end col-md-12-->
                @endforeach
            </div>
            <!--end row-->
            {{-- {!! $exhibitions->links('vendor.pagination.default') !!} --}}
            {{ $exhibitions->links('vendor.pagination.simple-default') }}
        </div>
        <!--end container-->
    </section>
    <!--end #testimonials ts-block-->
@endsection