<!-- css includes -->
@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/frontend/posts/style.css') }}">
@endsection

<!-- js includes -->
@section('js')
    <script type="text/javascript" src="//downloads.mailchimp.com/js/signup-forms/popup/embed.js" data-dojo-config="usePlainJson: true, isDebug: false"></script><script type="text/javascript">require(["mojo/signup-forms/Loader"], function(L) { L.start({"baseUrl":"mc.us17.list-manage.com","uuid":"307e7898b2f7cee1d865ffd9e","lid":"cb1410e538"}) })</script>
    <script src="{{ asset('/js/frontend/post/script.js') }}"></script>
@endsection

<!-- layout -->
@extends('experimenteerbuurt-layout')
<!-- content -->
@section('content')
<img class="nieuws-background" src="{{ URL::asset('/images/news/news-background.jpg') }}">

<div class="posts-wrapper animated fadeInRight col-lg-10 col-lg-offset-2 col-md-10 col-md-offset-2 col-sm-12 col-xs-12">

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 news-title-wrapper">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 news-title">Nieuw(s)</div>
    </div>

    @foreach($posts as $post)
        @if($post->image)
        <div class="post col-lg-8 col-md-9 col-sm-12 col-xs-12 row">
            <div class="col-lg-4 col-md-4 col-sm-4 hidden-xs img-holder">
                <img class="col-lg-12 col-md-12 col-sm-12 col-xs-12 img-responsive news-image" src="/uploads/news/{{ $post->image }}" alt="{{ $post->title }} afbeelding"/>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                @if($post->link)
                <a href="{{ $post->link }}" target="_blank">
                    <div class="title" style="padding: 0;">{{ $post->title }}<span class="hyperlink-indicator glyphicon glyphicon-link"></span></div>
                </a>
                @else
                <div class="title col-lg-12 col-md-12 col-sm-10 col-xs-12">{{ $post->title }}</div>
                @endif
                <div class="col-lg-12 col-md-12 col-sm-10 col-xs-12" style="display: flex; align-items: center; justify-content: center;">
                    <div class="content">{{ $post->content}}</div>
                </div>
            </div>
        </div>
        @else
        <div class="post col-lg-8 col-md-12 col-sm-8 col-xs-12 column">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                @if($post->link)
                <a href="{{ $post->link }}" target="_blank">
                    <div class="title" style="padding: 0;">{{ $post->title }} <span class="hyperlink-indicator glyphicon glyphicon-link"></span></div>
                </a>
                @else
                <div class="title">{{ $post->title }}</div>
                @endif
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="display: flex; align-items: center; justify-content: center;">
                    <div class="content">{{ $post->content}}</div>
                </div>
            </div>
        </div>
        @endif
    @endforeach
</div>

@endsection
