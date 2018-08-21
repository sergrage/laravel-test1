@extends('layouts.app')

@section('content')
@include('partials._nav')
    <div class="row mt-lg-5">
        <article>
            <h3> {{ $article->title }} </h3>
            <p>  {{ $article->body }} </p>
            <p> Published  <span class="badge badge-light">{{ $article->publishedAtForHumans() }}</span> by <span class="badge badge-info"> {{ $article->user->name }} </span></p>
            <hr>
        </article>

        <a href="{{ route('articles.index') }}" class="btn btn-danger">Back</a>
    </div>
@endsection
