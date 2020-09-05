@extends('layouts.app')

@section('content')

<div class="container py-4">

  <h2 class="mb-4">Kreiraj Galeriju:</h2>

    {!! Form::open(['action' => 'GalleryController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
      <div class="form-group">
        {{ Form::label('gallery','Dodaj Fotografiju u Galeriju:') }}
      </div>
      <div class="form-group">
        {{ Form::file('image[]') }}
      </div>
    {{ Form::submit('Kreiraj',['class' => 'btn admin-btn']) }}
    {!! Form::close() !!}

</div>
<div class="prazan">
</div>

@endsection
