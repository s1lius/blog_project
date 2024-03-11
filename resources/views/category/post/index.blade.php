@extends('layouts.main')
@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" style="margin-top: -40px" data-aos="fade-up">Новостной блог</h1>
            <section class="featured-posts-section">
                <div class="row">
                    @foreach($posts as $post)
                        <div class="col-md-4 fetured-post blog-post" data-aos="fade-up">
                            <div class="blog-post-thumbnail-wrapper">
                                <a href="{{route('post.show', $post->id)}}">
                                    <img src="{{asset('storage/' . $post->preview_image)}}" alt="blog post">
                                </a>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="blog-post-category">{{$post->category->title}}</p>
                                @auth()
                                <form action="{{route('post.like.store', $post->id)}}" method="post">
                                    @csrf
                                    <span>{{$post->liked_users_count}}</span>
                                    <button class="border-0 bg-transparent" style="margin-top: -15px" type="submit">
                                            @if(auth()->user()->likedPosts->contains($post->id))
                                                <i class="fas fa-heart"></i>
                                            @else
                                                <i class="far fa-heart"></i>
                                            @endif
                                    </button>
                                </form>
                                @endauth
                                @guest()
                                    <div>
                                        <span>{{$post->liked_users_count}}</span>
                                        <i class="far fa-heart"></i>
                                    </div>
                                @endguest
                            </div>
                            <a href="{{route('post.show', $post->id)}}" class="blog-post-permalink">
                                <h6 class="blog-post-title">{{$post->title}}</h6>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="mx-auto mb-5" style="margin-top: -70px;">
                        {{$posts->links()}}
                    </div>
                </div>
            </section>
        </div>

    </main>
@endsection
