@extends('layouts.main')
@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" style="margin-top: -40px" data-aos="fade-up">{{$post->title}}</h1>
            <p class="edica-blog-post-meta mt-1" data-aos="fade-up" style="margin-bottom: 5px;"
               data-aos-delay="200">{{$date->translatedFormat('F')}}
                • {{$date->day}} • {{$date->year}} • {{$date->format('H:i')}} • {{$post->comments->count()}}
                Коментариев</p>
            <div class="row mx-auto justify-content-center align-items-center mt-4">
                <div>
                    @auth()
                        <form action="{{route('post.like.store', $post->id)}}" method="post">
                            @csrf
                            <button class="btn mr-3" type="submit">{{$post->liked_users_count}}
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
                            <i class="far fa-heart mr-3"></i>
                        </div>
                    @endguest
                </div>
                <div href="#comment-section" class="btn scroll-to-section">
                    <span>{{$post->comments->count()}}</span>
                    <i class="far fa-comment"></i>
                </div>
            </div>
            <section class="blog-post-featured-img w-75 mx-auto mt-4" data-aos="fade-up"
                     data-aos-delay="300">
                <div class="row">
                    <img src="{{asset('storage/' . $post->main_image)}}" alt="featured image" class="w-100">
                </div>
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto" data-aos="fade-up">
                        {!! $post->content !!}
                    </div>
                </div>
            </section>
            <div class="row">
                <div class="mx-auto pt-2 pb-4">
                    <form action="{{route('post.like.store', $post->id)}}" method="post">
                        @csrf
                        <button class="btn btn-dark" type="submit">Мне нравиться ({{$post->liked_users_count}})
                            @auth()
                                @if(auth()->user()->likedPosts->contains($post->id))
                                    <i class="fas fa-heart"></i>
                                @else
                                    <i class="far fa-heart"></i>
                                @endif
                            @endauth
                        </button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    @if($relatedPosts->count()>0)
                        <section class="related-posts">
                            <h2 class="section-title mb-4" style="margin-top: -40px" data-aos="fade-up">Еще публикации
                                по
                                тематике:
                                <a class="text-decoration-none text-reset" href="#">{{$post->category->title}}</a></h2>
                            <div class="row">
                                @foreach($relatedPosts as $relatedPost)
                                    <a class="nav-link" href="{{route('post.show', $relatedPost->id)}}">
                                        <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                            <img src="{{asset('storage/' . $relatedPost->preview_image)}}"
                                                 alt="related post"
                                                 class="post-thumbnail">
                                            <p class="post-category">{{$relatedPost->category->title}}</p>
                                            <h5 class="post-title">{{$relatedPost->title}}</h5>
                                        </div>
                                    </a>

                                @endforeach
                            </div>
                        </section>
                    @endif
                    <section id="comment-section" class="comment-list mb-5">
                        <h2 class="section-title mb-3" data-aos="fade-up">Комментарии({{$post->comments->count()}})</h2>
                        @foreach($post->comments as $comment)
                            <div class="comment-text mb-2">
                                <div>{{$comment->user->name}}:</div>
                                <span class="text-muted float-right">{{$comment->dateAsCarbon->diffForHumans()}}</span>
                                <div>{{$comment->message}}</div>
                            </div>
                        @endforeach
                    </section>
                    @auth()
                        <section class="comment-section">
                            <h2 class="section-title" data-aos="fade-up">Оставить комментарий</h2>
                            <form action="{{route('post.comment.store', $post->id)}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-12" data-aos="fade-up">
                                        <label for="comment" class="sr-only">Comment</label>
                                        <textarea name="message" id="comment" class="form-control"
                                                  placeholder="Комментарий"
                                                  rows="10"></textarea>
                                    </div>
                                    <input type="hidden" name="post_id" value="{{$post->id}}">
                                </div>
                                <div class="row">
                                    <div class="col-12" data-aos="fade-up">
                                        <input type="submit" value="Отправить" class="btn btn-warning">
                                    </div>
                                </div>
                            </form>
                        </section>
                    @endauth
                </div>
            </div>
        </div>
    </main>
    <script>
        $(document).ready(function () {
            // При нажатии на элемент с классом scroll-to-section
            $('.scroll-to-section').click(function (e) {
                // Предотвращаем стандартное действие ссылки
                e.preventDefault();

                // Получаем id целевого элемента из атрибута href
                var target = $(this).attr('href');

                // Плавно прокручиваем страницу к целевому элементу
                $('html, body').animate({
                    scrollTop: $(target).offset().top
                }, 1000); // скорость прокрутки в миллисекундах
            });
        });
    </script>
@endsection
