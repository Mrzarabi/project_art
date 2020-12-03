@extends('Layouts.master')
@section('main')
    <section id="testimonials" class="ts-block text-center pb-5">
        <div class="container">
            <div class="ts-title">
                <h2>Testimonials</h2>
            </div>
            <!--end ts-title-->
            <div class="row">
                @foreach ($praiseds as $praised)
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-8 offset-2">
                                <div class="owl-carousel" data-owl-dots="1" data-owl-loop="3" data-animate="ts-fadeInUp">
                                    @foreach ($praised->images as $image)
                                        @if ( ! empty($praised->images) )
                                            <div class="d-flex justify-content-center">
                                                <img src=" {{$image->image}}" class="card-img" alt="image" style="width:auto; max-width: 600px; height:auto; max-height: 400px">
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
                                    @if ($praised->s_link)
                                        <dd>
                                            <a href=" {{$praised->s_link}} " class="d-flex text-white" style="justify-content: flex-start;">
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
                                    @if ($praised->writer)
                                        <dd>
                                            <div class="d-flex text-white" style="justify-content: flex-start;">
                                                <span class="mr-3">
                                                    <i class="fa fa-user ts-bg-primary p-1 rounded"></i>
                                                </span>
                                                <span class="mr-2 pr-2">
                                                    <p style="font-size: 11px" class="mb-0">
                                                        Written By {{$praised->writer}}
                                                    </p>
                                                </span>
                                            </div>    
                                        </dd>
                                    @endif 
                                    @if ($praised->date)
                                        <dd>
                                            <div class="d-flex text-white" style="justify-content: flex-start;">
                                                <span class="mr-3">
                                                    <i class="fa fa-calendar-times ts-bg-primary p-1 rounded"></i>
                                                </span>
                                                <span class="mr-2 pr-2">
                                                    <p style="font-size: 11px" class="mb-0">
                                                        Posted in {{$praised->date}}
                                                    </p>
                                                </span>
                                            </div>    
                                        </dd>
                                    @endif 
                                    @if ($praised->time)
                                        <dd>
                                            <div class="d-flex text-white" style="justify-content: flex-start;">
                                                <span class="mr-3">
                                                    <i class="fa fa-clock ts-bg-primary p-1 rounded"></i>
                                                </span>
                                                <span class="mr-2 pr-2">
                                                    <p style="font-size: 11px" class="mb-0">
                                                        {{$praised->time}} Min For Read
                                                    </p>
                                                </span>
                                            </div>    
                                        </dd>
                                    @endif 
                                </dl>
                                <hr class="ts-hr-light">
                                <h5 class="text-left mb-3"> {{$praised->title}} </h5>
                                <h6 class="ts-opacity__40 text-left"> {{$praised->body}} </h6>
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
        </div>
        <!--end container-->
    </section>
    {{ $praiseds->links('vendor.pagination.simple-default') }}
    <!--end #testimonials ts-block-->
@endsection