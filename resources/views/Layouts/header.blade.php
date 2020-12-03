@php
    use App\Models\Logo;

    $logo = Logo::latest()->first();
@endphp
<div class="ts-page-wrapper" id="page-top">
    <!--NAVIGATION ******************************************************************************************-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-white">
        <div class="container">
            <a class="navbar-brand ts-push-down__50 position-absolute ts-bottom__0 bg-white pb-0 ts-z-index__1 ts-scroll" href="#page-top">
                @if (isset($logo->logo))
                    <img src="{{$logo->logo}}" style="max-width: 75px; max-height: 75px;" alt="logo">
                @else
                    <img src="assets/img/logo.png" alt="logo">
                @endif
            </a>
            <!--end navbar-brand-->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!--end navbar-toggler-->
            <div class="collapse navbar-collapse nav" id="navbarNavAltMarkup">
                <div class="navbar-nav d-block d-lg-flex ml-auto text-right">
                    <a class="nav-item nav-link" href=" {{route('index')}} ">Home</a>
                    <a class="nav-item nav-link" href=" {{route('category.index')}} ">Gallery</a>
                    <a class="nav-item nav-link" href=" {{route('praised.index')}} ">Testimonials</a>
                    <a class="nav-item nav-link mr-2" href=" {{route('exhibition.index')}} ">Exhibitions</a>
                    <a class="nav-item nav-link " href=" {{route('about-me')}} ">About Me</a>
                </div>
                <!--end navbar-nav-->
            </div>
            <!--end collapse-->
        </div>
        <!--end container-->
    </nav>
    <!--end navbar-->