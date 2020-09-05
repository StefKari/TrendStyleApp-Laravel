@extends('layouts.app')

@section('content')

<div class="container py-4">

  <h2 class="mb-4">Edituj uslugu:</h2>

  {!! Form::open(['action' => ['PostsController@update', $post->id],'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    {{ Form::label('category_id','Kategorija:') }}
    <div class="form-group">
      <select class="form-control" name="category_id">
          <?php $selectedVrednost = $post->category_id?>
          @foreach($category as $vrednost)
            <option value="{{ $vrednost->id }}" {{ $selectedVrednost == $vrednost['id'] ? 'selected="selected"' : ''}}>{{ $vrednost->name }}</option>
          @endforeach
      </select>
    </div>
    <div class="form-group">
      {{ Form::label('title','Naslov:') }}
      {{ Form::text('title', $post->title, ['class' => 'form-control','placeholder' => 'Naslov']) }}
    </div>
    <div class="form-group">
      {{ Form::label('body','Tekst:') }}
      {{ Form::textarea('body', $post->body, ['class' => 'form-control','placeholder' => 'Tekst']) }}
    </div>
    <div class="form-group">
      {{ Form::file('image') }}
    </div>
  {{ Form::hidden('_method','PUT') }}
  {{ Form::submit('Edituj',['class' => 'btn btn-warning edituj']) }}
  {!! Form::close() !!}

</div>

@endsection
