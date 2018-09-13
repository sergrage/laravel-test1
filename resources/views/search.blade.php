@extends('layouts.app')

@section('content')

@include('partials._nav')

<div class="content">
    <div class="title m-b-md">

       Articles

    </div>
</div>
<hr>
<div class="row">
    <div class="col">

        @foreach ($articles as $article)
            <article class="pb-lg-5">
                <h3> {{ $article->title }} </h3>
                @isset ($article->image)
                <img class="img-fluid pb-lg-5" src="{{ asset('/storage/' . $article->image) }}" alt="">
                @endisset
                <p>  {!! $article->body !!} </p>
                <p> Published  <span class="badge badge-light">{{ $article->publishedAtForHumans() }}</span> by <span class="badge badge-info"> {{ $article->user->name }} </span></p>
                <p>View: <span> {{ $article->view }} </span></p>

                <div>

                    @foreach ($article->tags as $tag)
                     <span class="badge badge-secondary">{{ $tag->name }}</span>
                    @endforeach
                </div>
                
                <hr>
            </article>
        @endforeach
    </div>

</div>
@endsection
