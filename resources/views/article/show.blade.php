@extends('layouts.app')

@section('content')
    <div class="tm-blog-img-container">

    </div>

    <section class="tm-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 col-xl-9">
                    <div class="tm-blog-post">
                        <h3 class="tm-gold-text">{{$article->title}}</h3>
                        <img src="https://via.placeholder.com/400/0000FF/808080?text=image standart" alt="Image"
                             class="img-fluid tm-img-post">

                        <p>{{$article->description}}</p>
                    </div>

                    <div class="row tm-margin-t-big">
                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <form id="likeForm" action="{{--{{route()}}--}}">
                                @csrf
                                <label id="count_like" for="submit">{{$article->count_like}}</label>
                                <button class="btn-success" id="likeForm" type="submit"><i class="fa fa-thumbs-up"></i>
                                </button>
                            </form>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <i class="fa fa-eye"></i><span id="count_watch"> {{$article->count_watch}}</span>

                        </div>
                    </div>
                    <div class="row tm-margin-t-big">
                        <h3 style="color: #cc9900">Comments</h3>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                            @foreach($article->comments as $comment)
                                <b>{{$comment->title}}</b>
                                <p>{{$comment->comment}}</p>
                                <hr>
                            @endforeach
                            <div id="comment-form">
                                <div style="color: red" id="errors"><ul id="error"></ul></div>
                                <form id="submitComment" action="{{--{{route()}}--}}">
                                    @csrf
                                    <label for="title">title</label>
                                    <input class="form-control" type="text" name="title" id="title">
                                    <div class="form-group">
                                    </div>
                                    <label for="comment">comment</label>
                                    <textarea class="form-control" name="comment" id="comment" cols="90"
                                              rows="0"></textarea>
                                    <div class="form-group">
                                    </div>
                                    <button class="btn-success" id="submitComment" type="submit">submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                    <aside class="col-xs-12 col-sm-12 col-md-4 col-lg-3 col-xl-3 tm-aside-r">
                        <div class="tm-aside-container">
                            <h3 class="tm-gold-text tm-title">
                                Tags
                            </h3>
                            <nav>
                                @foreach($article->tags as $tag)
                                    <a href="{{route('articles.index', [$tag->id])}}">
                                        <button class="btn btn-info">{{$tag->tag}}</button>
                                    </a>
                                @endforeach
                            </nav>
                        </div>
                    </aside>
                </div>
            </div>

    </section>
@endsection
@push('bottom_js')
    <script type="text/javascript">

        $('#likeForm').on('submit', function (event) {
            event.preventDefault();
            let id = {{$article->id}}
            $.ajax({
                url: "/test-blog/public/like-form/" + id,
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                success: function (response) {
                    $("#count_like").empty();
                    $("#count_like").append(response.data);
                },
            });
        });

        $('#submitComment').on('submit', function (event) {
            event.preventDefault();
            let id = {{$article->id}};
            let formData = {
                "_token": "{{ csrf_token() }}",
                'article_id' : id,
                'title' : $('#title').val(),
                'comment'    : $('#comment').val()
            };
            $.ajax({
                type: "POST",
                url: "/test-blog/public/comment-form" ,
                data: formData,
                success: function (response) {
                    if(response.status == 400){
                        $('#error').empty()
                        $.each(response.data, function( index, value ) {
                            $('#error').append("<li>"+value+"</li>")
                        })
                    }else {
                        $("#comment-form").empty();
                        $("#comment-form").append('Ваше сообщение успешно отправлено');
                    }
                },
                error: function (e) {
                    console.log(e)
                },
            });
        });


        $(document).ready(function () {
            setTimeout(
                function () {
                    let id = {{$article->id}}
                    $.ajax({
                        url: "/test-blog/public/count-watch/" + id,
                        type: "POST",
                        data: {
                            "_token": "{{ csrf_token() }}",
                        },
                        success: function (response) {

                        },
                    });
                }, 5000);
        });
    </script>
@endpush
