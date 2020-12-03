<!--HERO CONTENT ****************************************************************************************-->
<div class="container position-relative h-100 ts-align__vertical">
    <div class="row w-100">
        <div class="col-md-8">
            <!--SOCIAL ICONS-->
            {{-- <figure class="ts-social-icons mb-4">
                <a href="#" class="mr-3">
                    <i class="fab fa-facebook"></i>
                </a>
                <a href="#" class="mr-3">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="mr-3">
                    <i class="fab fa-pinterest"></i>
                </a>
                <a href="#" class="mr-3">
                    <i class="fab fa-slack"></i>
                </a>
                <a href="#" class="mr-3">
                    <i class="fab fa-instagram"></i>
                </a>
            </figure> --}}

            <!--TITLE -->
            <h1 class="ts-bubble-border">
                <span class="ts-title-rotate">
                    @foreach ($banners as $banner)
                        <span> {{$banner->title}} </span>
                    @endforeach
                </span>
            </h1>
        </div>
        <!--end col-md-8-->
    </div>
    <!--end row-->
</div>
<!--end container-->
<!--END HERO CONTENT ************************************************************************************-->

<!--HERO BACKGROUND *************************************************************************************-->
<div class="ts-background owl-carousel" data-owl-dots="1" data-owl-loop="1" data-animate="ts-fadeInUp" >
    @foreach ($banners as $banner)
        <div class="ts-background-image" data-bg-image="{{ $banner->image }}"></div>
    @endforeach 
</div>
<!--END HERO BACKGROUND *********************************************************************************-->