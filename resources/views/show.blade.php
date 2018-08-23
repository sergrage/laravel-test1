@extends('layouts.app')

@section('content')
@include('partials._nav')
    <div class="row mt-lg-5">
        <article>
            <h3> {{ $article->title }} </h3>
            @isset ($article->image)
                <img class="img-fluid rounded mx-auto d-block  pb-lg-5"  src="{{ asset('/storage/' . $article->image) }}" alt="">
                @endisset
            <p>  {{ $article->body }} </p>
            <p> Published  <span class="badge badge-light">{{ $article->publishedAtForHumans() }}</span> by <span class="badge badge-info"> {{ $article->user->name }} </span></p>
            
            @forelse($article->tags as $tag)
                <span class="badge badge-secondary">{{ $tag->name }}</span>
            @empty
                <span class="badge badge-secondary">No tags for this article</span>
            @endforelse
            <hr>
        </article>

        <a href="{{ route('articles.index') }}" class="btn btn-danger">Back</a>
    </div>
@endsection
