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

        {!! Form::open(['method' => 'POST', 'enctype' => 'multipart/form-data' ,'file' => 'true', 'action' => 'IndexController@store']) !!}

        @include('partials._form', ['submitBtn' => 'Add Article'])

        {!! Form::close() !!}

        @include('errors/list')

        @include ('flash::message')

    </div>
    <div class="col-md-6">

        @forelse ($articles as $article)
            <article class="pb-lg-5">
                <h3> {{ $article->title }} </h3>
                @isset ($article->image)
                <img class="img-fluid pb-lg-5" src="{{ asset('/storage/' . $article->image) }}" alt="">
                @endisset
                <p>  {!! $article->body !!} </p>
                <p> Published  <span class="badge badge-light">{{ $article->publishedAtForHumans() }}</span> by <a class="badge badge-info" href="{{route('author.search',  $article->user->name)}}"> {{ $article->user->name }} </a></p>
                <p>View: <span> {{ $article->view }} </span></p>
                <a href=" {{action ('IndexController@show', [$article->id])}} " class="btn btn-sm btn-info">Show</a>
                <a href=" {{action ('IndexController@edit', [$article->id])}} " class="btn btn-sm btn-warning">Edit</a>

                {!! Form::model($article, ['method' => 'DELETE','files' => true, 'action' => ['IndexController@destroy', $article->id], 'class' => 'd-inline']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                {!! Form::close() !!}

                <div>
                    @forelse($article->tags as $tag)
                    <a class="badge badge-secondary" href="{{ route('tag.search', $tag->name)}}">{{ $tag->name }}</a>
                    @empty
                        <span class="badge badge-secondary">No tags for this article</span>
                    @endforelse
                </div>
                
                <hr>
            </article>
        @empty
            <h3>No articles</h3>
        @endforelse
            {{ $articles->links() }}
    </div>

</div>
@endsection
