@extends('layouts.app')

@section('content')

@include('partials._nav')

<div class="content">
    <div class="title m-b-md">
        Add Article
    </div>
</div>
<hr>
<div class="row">
    <div class="col-md-6">

        {!! Form::open(['method' => 'POST', 'action' => 'IndexController@store']) !!}

        @include('partials._form', ['submitBtn' => 'Add Article'])

        {!! Form::close() !!}

        @include('errors/list')

        @include ('flash::message')

    </div>
    <div class="col-md-6">

        @forelse ($articles as $article)
            <article class="pb-lg-5">
                <h3> {{ $article->title }} </h3>
                @isset ($path)
                <img class="img-fluid" src="{{ asset('/storage/' . $path) }}" alt="">
                @endisset
                <p>  {{ $article->body }} </p>
                <p> Published  <span class="badge badge-light">{{ $article->publishedAtForHumans() }}</span> by <span class="badge badge-info"> {{ $article->user->name }} </span></p>
                <p>View: <span> {{ $article->view }} </span></p>
                <a href=" {{action ('IndexController@show', [$article->id])}} " class="btn btn-info">Show</a>
                <a href=" {{action ('IndexController@edit', [$article->id])}} " class="btn btn-warning">Edit</a>

                {!! Form::model($article, ['method' => 'DELETE','files' => true, 'action' => ['IndexController@destroy', $article->id], 'class' => 'd-inline']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}

                <hr>
            </article>
        @empty
            <h3>No articles</h3>
        @endforelse
            {{ $articles->links() }}
    </div>

</div>
@endsection

