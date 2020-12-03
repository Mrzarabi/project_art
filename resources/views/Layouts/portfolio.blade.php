<div class="container">
    <div class="ts-title">
        <h2>Portfolio</h2>
    </div>
    <!--end ts-title-->
    <div class="card-columns ts-gallery ts-column-count-4">
       @foreach ($posts as $post)
       @php
            $image = $post->images()->first();
        @endphp
            <a href=" {{route('post.show', ['post' => $post->id])}} " class="card ts-gallery__item ts-link-arrow-effect" data-animate="ts-fadeInUp" style="padding-right: 0px !important;">
                <div class="ts-gallery__image" >
                    <div class="ts-gallery__item-description">
                        <h6 class="ts-opacity__50"> 
                        @if ($post->category)
                            {{$post->category->title}}
                        @endif </h6>
                        <h4>{{ $post->title }}</h4>
                    </div>
                    @if ( isset($post->images) )
                        <img src=" {{$image->image}} " class="card-img" alt="image" style="max-height: 400px">
                    @else
                        <img src="assets/img/img-work-02.png" class="card-img" alt="image">
                    @endif
                    <!--end ts-gallery__item-description-->
                </div>
                <!--end ts-gallery__image-->
            </a>
            <!--end card ts-gallery__item-->
       @endforeach
    </div>
    <!--end ts-gallery-->
</div>
<!--end container-->