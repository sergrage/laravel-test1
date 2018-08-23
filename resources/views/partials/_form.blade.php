<div class="form-group">
    {!! Form::label('title', 'Article Title') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('body', 'Article body') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control ck-editor__editable', 'placeholder' => 'Enter-content', 'id' => 'editor', 'rows' => '10']) !!}
</div>
<div class="form-group">
	{!! Form::label('tags', 'Tags:') !!}
	{!! Form::select('tags[]', $tagsList, null, ['class' => 'form-control', 'multiple']) !!}
</div>
<div class="form-group">
    {!! Form::file('image') !!}
</div>
<div class="form-group">
    {!! Form::submit($submitBtn, ['class' => 'btn btn-primary']) !!}
</div>


