@extends('layout')
@section('content')
    <div class="row mt-lg-5">
    <div class="col-md-12">
        {!! Form::model($article, ['method' => 'PATCH', 'action' => ['IndexController@update', $article->id]]) !!}

        @include('partials._form', ['submitBtn' => 'Update Article'])

        {!! Form::close() !!}

        @include('errors/list')
    </div>

    </div>
@endsection
