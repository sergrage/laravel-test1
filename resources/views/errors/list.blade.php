@if ($errors->any())
    <ul class="alert alert-danger mt-lg-4">
        @foreach($errors->all() as $e)
        <li> {{ $e }} </li>
        @endforeach
    </ul>
@endif
