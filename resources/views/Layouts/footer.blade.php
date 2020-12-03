@php
    use App\User;
    use App\Models\Category;
    use App\Models\Post;
    use App\Models\Logo;

    $user = User::where('email', 'rastasafari.art@gmaill.com')->first();
    $categories = Category::all();
    $posts = Post::where('category_id' ,1)->latest()->take(6)->get();
    $logo = Logo::first();
@endphp
    <footer id="ts-footer" class="mt-5" style="background-color: #121220;">
        <section id="contact" class="ts-block ts-separate-bg-element" data-bg-image="assets/img/bg-man-wall.jpg" data-bg-image-opacity=".1">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="row">
                        <div class="col-md-4 col-sm-12 p-5">
                            <dl class="ts-column-count-1">
                                <dd> 
                                    @if (isset($logo->desc))
                                        {{$logo->desc}}
                                    @endif
                                </dd>
                                <dt>
                                    <small>
                                        @if (isset($logo->title))
                                            {{$logo->title}}
                                        @endif
                                    </small>
                                </dt>
                            </dl>
                        </div>
                        <div class="col-md-8 col-sm-12">
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-3 col-sm-6">
                                    <dl class="ts-column-count-1"> 
                                        <dt class="pb-4"> Gallery </dt>
                                        <dd> 
                                            <div class="ts-column-count-sm-2">
                                                @foreach ($categories as $category)
                                                    <a href=" {{route('category.show', ['category' => $category->id])}} " class="mb-3 d-flex text-white ts-align__vertical"> {{$category->title}} </a>   
                                                @endforeach
                                            </div>    
                                        </dd>
                                    </dl>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <dl class="ts-column-count-1"> 
                                        <dt class="pb-4"> Resent Posts </dt>
                                        <dd> 
                                            <div class="ts-column-count-sm-2">
                                                @foreach ($posts as $post)
                                                    <a href=" {{route('post.show', ['post' => $post->id])}} " class="mb-3 d-flex text-white ts-align__vertical"> {{$post->title}} </a>   
                                                @endforeach
                                            </div>    
                                        </dd>
                                    </dl>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <dl class="ts-column-count-1">
                                        <dt class="pb-4"> Let’s Connect </dt>
                                        <dd>
                                            <div class="ts-column-count-sm-2">
                                                @if ( $user->f_acc )
                                                    <a href=" {{$user->f_acc}} " class="mb-3 d-flex text-white ts-align__vertical">
                                                    <span class="ts-circle__xs border border-white ts-border-light mr-4">
                                                        <i class="fab fa-facebook-f"></i>
                                                    </span>
                                                        <span>Facebook</span>
                                                    </a>
                                                    <!--end link-->
                                                @endif
                                                @if ( $user->i_acc )
                                                    
                                                    <a href=" {{$user->i_acc}} " class="mb-3 d-flex text-white ts-align__vertical">
                                                    <span class="ts-circle__xs border border-white ts-border-light mr-4">
                                                        <i class="fab fa-instagram"></i>
                                                    </span>
                                                        <span>Instagram</span>
                                                    </a>
                                                    <!--end link-->
                                                @endif
                                                @if ( $user->phone_number )
                                                    <a href=" Tel:{{$user->phone_number}} " class="mb-3 d-flex text-white ts-align__vertical">
                                                    <span class="ts-circle__xs border border-white ts-border-light mr-4">
                                                        <i class="fa fa-phone"></i>
                                                    </span>
                                                        <span>Phone Number</span>
                                                    </a>
                                                    <!--end link-->
                                                @endif
                                            </div>
                                        </dd>
                                    </dl>
                                </div>
                                {{-- <div class="col-md-2">
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--end #contact-->

        <div class="text-dark bg-white">
            <div class="container py-3 position-relative">
                <small>© 2025 Rasta Safari, All Rights Reserved</small>
                <a href="#page-top" class="ts-circle__xs rounded-0 bg-dark position-absolute ts-right__0 ts-top__0 ts-push-up__50 ts-scroll">
                    <i class="fa fa-arrow-up text-white"></i>
                </a>
            </div>
        </div>

    </footer>
    <!--end #footer-->
</div>
<!--end page-->


