@extends('layout')

@section('content')
<div class="content">
    <div class="title m-b-md">
        Add Article
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-6">
        
        {!! Form::open(['method' => 'POST', 'action' => 'IndexController@store']) !!}
        <div class="form-group">
            {!! Form::label('title', 'Article Title') !!}
            {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Enter-title']) !!}
        </div>
        <div class="form-group">    
            {!! Form::label('body', 'Article body') !!}
            {!! Form::textarea('body', null, ['class' => 'form-control', 'placeholder' => 'Enter-content']) !!}
        </div>    
        <button type="submit" class="btn btn-primary">Submit</button>
        {!! Form::close() !!}

        @if ($errors->any())
            <ul class="alert alert-danger mt-lg-4">
                @foreach($errors->all() as $e)
                <li> {{ $e }} </li>
                @endforeach
            </ul>
        @endif

    </div>
    <div class="col-md-6">

        @forelse ($articles as $article)
            <article class="pb-lg-5">
                <h3> {{ $article->title }} </h3>
                <p>  {{ $article->body }} </p>
                <p>  Published {{ $article->publishedAtForHumans() }}</p>
                <a href=" {{action ('IndexController@show', [$article->id])}} " class="btn btn-info">Show all</a>
                <a href=" {{action ('IndexController@edit', [$article->id])}} " class="btn btn-warning">Edit</a>
                <a href=" {{action ('IndexController@show', [$article->id])}} " class="btn btn-danger">Delete</a>
                <hr>
            </article>
        @empty
            <h3>No articles</h3>
        @endforelse
        
    </div>
</div>
@endsection

