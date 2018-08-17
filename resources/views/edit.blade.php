@extends('layout')
@section('content')
    <div class="row mt-lg-5">
        {!! Form::open(['method' => 'PATCH', 'action' => ['IndexController@update', $article->id]]) !!}
        <div class="form-group">
            {!! Form::label('title', 'Article Title') !!}
            {!! Form::text('title', $article->title, ['class' => 'form-control', 'placeholder' => 'Enter-title']) !!}
        </div>
        <div class="form-group">    
            {!! Form::label('body', 'Article body') !!}
            {!! Form::textarea('body', $article->body, ['class' => 'form-control', 'placeholder' => 'Enter-content']) !!}
        </div>    
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ URL::previous() }}" class="btn btn-danger">Back</a>
        {!! Form::close() !!}

        @if ($errors->any())
            <ul class="alert alert-danger mt-lg-4">
                @foreach($errors->all() as $e)
                <li> {{ $e }} </li>
                @endforeach
            </ul>
        @endif
        
        
    </div>
@endsection
