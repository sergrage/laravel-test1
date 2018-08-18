<div class="form-group">
    {!! Form::label('title', 'Article Title') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Enter-title']) !!}
</div>
<div class="form-group">
    {!! Form::label('body', 'Article body') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control', 'placeholder' => 'Enter-content']) !!}
</div>
<div class="form-group">
{!! Form::submit($submitBtn, ['class' => 'btn btn-primary']) !!}
</div>


