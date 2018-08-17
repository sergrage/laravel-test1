@extends('layout')
@section('content')
    <div class="row mt-lg-5">
        <article>
            <h3> {{ $article->title }} </h3>
            <p>  {{ $article->body }} </p>
            <p>  {{ $article->published_at }}</p>
            <hr>
        </article>
        
        <a href="{{ URL::previous() }}" class="btn btn-danger">Back</a>
    </div>
@endsection
