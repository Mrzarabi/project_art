<section id="testimonials" class="ts-block text-center pb-5">
    <div class="container">
        <div class="ts-title">
            <h2>Events</h2>
        </div>
        <!--end ts-title-->
        <div class="row">
            <div class="owl-carousel" data-owl-dots="1" data-owl-loop="4" data-animate="ts-fadeInUp" freeDrag="0" margin="1000">
                @foreach ($events as $event)
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-8 offset-2">
                                <div class="row">
                                    <div class="col-md-10">
                                        @if ($event->date)
                                            <div class="d-flex text-white" style="justify-content: flex-start;">
                                                <span class="mr-4">
                                                    <i class="fa fa-calendar-times ts-bg-primary p-1 rounded"></i>
                                                </span>
                                                <span class="mr-2 pr-2">
                                                    <p style="font-size: 13px">
                                                        {{$event->date}}
                                                    </p>
                                                </span>
                                            </div>    
                                        @endif 
                                        @if ($event->address)
                                            <div class="d-flex text-white " style="justify-content: flex-start;">
                                                <span class="mr-4">
                                                    <i class="fa fa-map-marker ts-bg-primary p-1 rounded"></i>
                                                </span>
                                                <span class="mr-2 pr-2">
                                                    <p style="font-size: 13px">
                                                        {{$event->address}}
                                                    </p>
                                                </span>
                                            </div>    
                                        @endif 
                                    </div>
                                    <div class="col-md-2">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        @if ($event->i_link)
                                                            <a href=" {{$event->i_link}} " class="mb-3 d-flex text-white ts-align__vertical" style="justify-content: flex-end;">
                                                                <span class="ts-circle__xs border border-white ts-border-light mr-4">
                                                                    <i class="fab fa-instagram"></i>
                                                                </span>
                                                            </a>    
                                                        @endif
                                                    </div>
                                                    <div class="col-md-6">
                                                        @if ($event->f_link)
                                                            <a href=" {{$event->f_link}} " class="mb-3 d-flex text-white ts-align__vertical" style="justify-content: flex-end;">
                                                                <span class="ts-circle__xs border border-white ts-border-light mr-4">
                                                                    <i class="fab fa-facebook"></i>
                                                                </span>
                                                            </a>    
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                @if ( ! empty($event->image) )
                                    <div class="d-flex justify-content-center">
                                        <img src=" {{$event->image}}" class="card-img" id="event-image-sm" alt="image" style="width: auto; max-width: 500px; max-height: 400px">
                                    </div>
                                @else
                                    <img src="assets/img/img-work-02.png" class="card-img" style="width: auto;" alt="image">
                                @endif
                            </div>
                            <!--end col-md-4-->
                            <div class="col-md-5">
                                <div>
                                    <div class="slide mb-5 mt-5">
                                        <h5 style="text-align: left"> {{$event->title}} </h5>
                                        <h6 class="ts-opacity__40" style="text-align: left"> {{$event->body}} </h6>
                                    </div>
                                    <!--end slide-->
                                </div>
                                <!--end owl-carousel-->
                            </div>
                            <!--end col-md-8-->
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

<script>

    var el = document.getElementById('event-image-sm');
    
    if(screen.width < 769 )
    {
        el.style.paddingLeft = '100px';
        el.style.paddingRight = '100px';
    }
</script>