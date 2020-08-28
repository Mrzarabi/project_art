
@extends('Layouts.master')
@section('main')
<div id="ts-hero" class="ts-animate-hero-items">

    @include('Layouts.content')

</div>
<!--end #hero-->

<main id="ts-content">

    <!--MY SERVICES ***********************************************************************************-->
    {{-- <section id="my-services" class="ts-block ts-xs-text-center pb-0">

        @include('Layouts.my_service')

    </section> --}}
    <!--END MY SERVICES *************************************************************************************-->

    {{-- <section id="about-me" class="ts-block pb-4">
        
        @include('Layouts.about_me')

    </section> --}}

    {{-- <section class="ts-block">
        <div class="container">
            <div class="text-center px-5 pt-5 position-relative">
                <h3 class="my-3">
                    Let’s Work Together On Your Next Project!
                </h3>
                <a href="#contact" class="btn btn-primary mr-2 ts-push-down__50 ts-has-talk-arrow">Hire Me Now!</a>
                <div class="ts-background ts-opacity__20" data-bg-image="assets/img/bg-keyboard.jpg"></div>
            </div>
        </div>
    </section> --}}

    {{-- <section id="my-skills" class="ts-block pb-5">
        <div class="container">
            <div class="ts-title text-center">
                <h2>My Skills</h2>
            </div>
            <!--end ts-title-->
            <h4>Every Day is a  New Challenge</h4>
            <div class="row">
                <div class="col-md-6">
                    <p>
                        In id nulla magna. Nullam posuere fermentum mattis. Nunc id dui at sapien faucibus fermentum
                        ut vel diam. Nullam tempus, nunc id efficitur sagittis, urna est ultricies eros, ac porta
                        sem turpis quis leo. Nulla in feugiat elit.
                    </p>
                    <p>
                        Phasellus accumsan scelerisque dolor, quis mattis justo bibendum non. Nulla sollicitudin
                        turpis in enim elementum varius. Vestibulum ante ipsum primis in faucibus orci luctus
                        et ultrices posuere cubilia Curae
                    </p>
                    <a href="#contact" class="btn btn-outline-light mb-5">Contact Me</a>
                </div>
                <!--end col-md-6-->
                <div class="col-md-6">
                    <div class="progress" data-progress-width="100%">
                        <h5 class="ts-progress-title">Webdesign</h5>
                        <figure class="ts-progress-value"></figure>
                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <!--end progress-->
                    <div class="progress" data-progress-width="80%">
                        <h5 class="ts-progress-title">Photography</h5>
                        <figure class="ts-progress-value"></figure>
                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <!--end progress-->
                    <div class="progress" data-progress-width="90%">
                        <h5 class="ts-progress-title">Coding</h5>
                        <figure class="ts-progress-value"></figure>
                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <!--end progress-->
                    <div class="progress" data-progress-width="60%">
                        <h5 class="ts-progress-title">Copywriting</h5>
                        <figure class="ts-progress-value"></figure>
                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <!--end progress-->
                </div>
                <!--end col-md-6-->
            </div>
            <!--end row-->
        </div>
        <!--end container-->
    </section> --}}

    <section class="ts-block pb-5" id="portfolio">
        
        @include('Layouts.portfolio')

    </section>
    <!--end portfolio-->

    {{-- <section class="ts-block" data-bg-image="assets/img/bg-man-sitting.jpg">
        <div class="container ts-promo-numbers">
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="ts-promo-number text-center">
                        <figure class="odometer" data-odometer-final="43">0</figure>
                        <h5>Clients</h5>
                    </div>
                    <!--end ts-promo-number-->
                </div>
                <!--end col-md-3-->
                <div class="col-sm-6 col-md-3">
                    <div class="ts-promo-number text-center">
                        <figure class="odometer" data-odometer-final="68">0</figure>
                        <h5>Projects</h5>
                    </div>
                    <!--end ts-promo-number-->
                </div>
                <!--end col-md-3-->
                <div class="col-sm-6 col-md-3">
                    <div class="ts-promo-number text-center">
                        <figure class="odometer" data-odometer-final="17">0</figure>
                        <h5>Awards</h5>
                    </div>
                    <!--end ts-promo-number-->
                </div>
                <!--end col-md-3-->
                <div class="col-sm-6 col-md-3">
                    <div class="ts-promo-number text-center">
                        <figure class="odometer" data-odometer-final="12">0</figure>
                        <h5>Years Experience</h5>
                    </div>
                    <!--end ts-promo-number-->
                </div>
                <!--end col-md-3-->
            </div>
        </div>
    </section> --}}
    <!--end ts-block-->

    @include('Layouts.testimonial')

    <!--LOGOS ***********************************************************************************************-->
    {{-- <section id="partners" class="ts-block py-4">
        <!--container-->
        <div class="container">
            <!--block of logos-->
            <div class="d-block d-md-flex justify-content-between align-items-center text-center ts-partners py-3">
                <a href="#">
                    <img src="assets/img/logo-01-w.png" alt="">
                </a>
                <a href="#">
                    <img src="assets/img/logo-02-w.png" alt="">
                </a>
                <a href="#">
                    <img src="assets/img/logo-03-w.png" alt="">
                </a>
                <a href="#">
                    <img src="assets/img/logo-04-w.png" alt="">
                </a>
                <a href="#">
                    <img src="assets/img/logo-05-w.png" alt="">
                </a>
            </div>
            <!--end logos-->
        </div>
        <!--end container-->
    </section> --}}
    <!--END LOGOS *******************************************************************************************-->

</main>
<!--end #content-->    
@endsection
