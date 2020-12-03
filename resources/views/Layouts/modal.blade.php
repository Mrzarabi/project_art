<!-- Modal -->
<div class="modal fade text-dark" id="modal{{$post->id}} " tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content border-0 rounded-0">
            <div class="modal-body p-5">
                <div class="owl-carousel" data-owl-dots="1">
                    <div class="slide">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="owl-carousel">
                                        @foreach ($post->images as $image)
                                            <div class="slide">
                                                <img src=" {{$image->image}} " alt="image">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <h4 class="mb-3">{{$post->title}}</h4>
                                    <p>
                                        {{$post->body}}
                                    </p>
                                    <hr>
                                </div>
                                <!--end col-md-8-->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end container-fluid-->
                    </div>
                    <!--end slide-->
                </div>
                <!--end owl-carousel-->
            </div>
            <!--end modal-body-->
        </div>
        <!--end modal-content-->
    </div>
    <!--end modal-dialog-->
</div>
<!--end modal-->