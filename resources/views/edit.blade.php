@extends('layouts.app')

@section('content')
@include('partials._nav')
    <div class="row mt-lg-5">
    <div class="col-md-12">
    	@isset ($article->image)
            <img class="img-fluid pb-lg-5" src="{{ asset('/storage/' . $article->image) }}" alt="">
        @endisset
        {!! Form::model($article, ['method' => 'PATCH', 'enctype' => 'multipart/form-data','action' => ['IndexController@update', $article->id]]) !!}

        @include('partials._form', ['submitBtn' => 'Update Article'])

        {!! Form::close() !!}

        @include('errors/list')
    </div>

    </div>
@endsection
