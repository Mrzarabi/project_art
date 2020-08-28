@extends('Layouts.master')
@section('main')
    <div class="container">
    <div class="ts-title text-center">
        <h2>My Services</h2>
    </div>
    <!--end ts-title-->
    <div class="row">
        @foreach ($categories as $category)
            <div class="col-sm-6 col-md-4 col-xl-4">
                <div class="ts-item" data-animate="ts-fadeInUp">
                    <div class="ts-item-content">
                        <div class="ts-item-header">
                            <figure class="icon">
                                <img src="assets/img/icon-brushes.png" alt="">
                            </figure>
                            <!--end icon-->
                        </div>
                        <!--end ts-item-header-->
                        <div class="ts-item-body">
                            <h4> {{$category->title}} </h4>
                            <p class="mb-0">
                                Duis molestie enim mattis gravida viverra. Fusce ut eros augue. Sed id mauris vel neque
                            </p>
                        </div>
                        <!--end ts-item-body-->
                        <div class="ts-item-footer">
                            <a href=" {{ route('category.show', ['category' => $category->id ]) }} " data-toggle="modal" data-target="#modal" class="ts-link-arrow-effect">
                                <span>Read More</span>
                            </a>
                        </div>
                        <!--end ts-item-footer-->
                    </div>
                    <!--end ts-item-content-->
                </div>
                <!--end ts-item-->
            </div>
            <!--end col-xl-4-->    
        @endforeach
        
    </div>
    <!--end row-->
</div>
<!--end container-->
@endsection