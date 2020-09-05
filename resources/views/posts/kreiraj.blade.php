@extends('layouts.app')

@section('content')

<div class="container py-4">

  <h2 class="mb-4">Kreiraj uslugu:</h2>
    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
      {{ Form::label('category_id','Kategorija:') }}
      <div class="form-group">
        <select class="form-control" name="category_id">
            @foreach($category as $vrednost)
              <option value="{{ $vrednost->id }}">{{ $vrednost->name }}</option>
            @endforeach
        </select>
      </div>
      <div class="form-group">
        {{ Form::label('title','Naslov:') }}
        {{ Form::text('title','',['class' => 'form-control']) }}
      </div>
      <div class="form-group">
        {{ Form::label('body','Tekst:') }}
        {{ Form::textarea('body','',['class' => 'form-control']) }}
      </div>
      <div class="form-group">
        {{ Form::file('image') }}
      </div>
    {{ Form::submit('Kreiraj',['class' => 'btn admin-btn']) }}
    {!! Form::close() !!}
</div>

@endsection
