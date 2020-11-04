@extends('layouts.app')

@section('content')
    <div class="tm-blog-img-container">

    </div>
    <section class="tm-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-xs-center">
                    <h2 class="tm-gold-text tm-title">все статьи</h2>
                </div>
            </div>
            @if($articles)
                <div class="row">
                    @foreach($articles as $article)
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3 col-xl-3">

                            <div class="tm-content-box">
                                <img src="https://via.placeholder.com/200/0000FF/808080?text=image mini" alt="Image" class="tm-margin-b-20 img-fluid">
                                <h4 class="tm-margin-b-20 tm-gold-text">{{\Illuminate\Support\Str::limit($article->title,20)}}</h4>
                                <p class="tm-margin-b-20">{{\Illuminate\Support\Str::limit($article->description,40)}}</p>
                                <a href="{{route('article.show',[$article->slug])}}" class="tm-btn text-uppercase">Read More</a>
                            </div>

                        </div>
                    @endforeach
                </div>
                <div class="card-footer clearfix">
                    {{ $articles->links() }}
                </div>
            @else
                <h3> Articles not found</h3>
            @endif
        </div>
    </section>
@endsection
