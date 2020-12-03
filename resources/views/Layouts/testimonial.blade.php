<section id="testimonials" class="ts-block text-center pb-5">
    <div class="container">
        <div class="ts-title">
            <h2>Testimonials</h2>
        </div>
        <!--end ts-title-->
        <div class="row">
            <div class="owl-carousel" data-owl-dots="1" data-owl-loop="3" data-animate="ts-fadeInUp">
                @foreach ($praiseds as $praised)
                    @php
                        $image = $praised->images()->first();
                    @endphp
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6 offset-1">
                                @if (isset($praised->images) )
                                    <div class="d-flex justify-content-center">
                                        <img src=" {{$image->image}}" class="card-img" alt="image" style="width: auto; max-width: 500px; max-height: 400px">
                                    </div> 
                                @else
                                    <img src="assets/img/img-work-02.png" class="card-img" alt="image">
                                @endif
                            </div>
                            <!--end col-md-6-->
                            <div class="col-md-3 mt-2">
                                <div class="col-md-12">
                                    <dl class="ts-column-count-1">
                                        @if ($praised->s_link)
                                            <dd>
                                                <a href=" {{$praised->s_link}} " class="d-flex text-white" style="justify-content: flex-start;">
                                                    <span class="mr-3">
                                                        <i class="fa fa-globe ts-bg-primary p-1 rounded"></i>
                                                    </span>
                                                    <span class="mr-2 pr-2">
                                                        <p style="font-size: 13px" class="mb-0">
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
                                                        <p style="font-size: 13px" class="mb-0">
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
                                                        <p style="font-size: 13px" class="mb-0">
                                                            {{$praised->time}} Min For Read
                                                        </p>
                                                    </span>
                                                </div>    
                                            </dd>
                                        @endif 
                                    </dl>
                                </div>
                                <hr class="ts-hr-light">
                                <h5 style="text-align: left"> {{$praised->title}} </h5>
                                <h6 class="ts-opacity__40" style="text-align: left"> {{$praised->desc}} </h6>
                                <div class="ts-item col-md-12 pt-5">
                                    <!--end ts-item-body-->
                                    <div class="ts-item-footer" style="text-align: right">
                                        <a href=" {{ route('praised.show', ['praised' => $praised->id ]) }} " class="ts-link-arrow-effect">
                                            <span>show More</span>
                                        </a>
                                    </div>
                                    <!--end ts-item-footer-->
                                </div>
                            </div>
                            <!--end col-md-3-->
                        </div>
                    </div>
                    <!--end col-md-12-->
                @endforeach
            </div>
        </div>
        <!--end row-->
    </div>
    <!--end container-->
</section>
<!--end #testimonials ts-block-->