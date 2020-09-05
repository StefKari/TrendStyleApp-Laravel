@extends('layouts.app')

@section('content')

<div id="usluga" class="container py-4 responziv-center">

    <div class="row mt-2">
       <div class="col-md-12">
         <h2 class="mb-4">{{ $post->title }}</h2>
         <small>Objavljeno:{{$post->updated_at}}</small>
         <p id="kategorija" class="mt-2">Kategorija: {{$post->category->name}}</p>
      </div>
    </div>
    <hr>
    <div class="row">
       <div class="col-md-12">
        <p>{{ $post->body }}</p>
       </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <img class="rounded" style="width:60%;" src="../storage/image/{{ $post->image }}" alt="Images">
      </div>
    </div>
    @if(!Auth::guest())
      @if(auth()->user()->is_admin == 1)
        <div class="row my-4">
          <div class="col-md-12">
            <a href="/usluga/{{$post->id}}/edit" class="btn btn-warning edituj"><i class="fas fa-edit"></i> Edituj</a>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            {!! Form::open(['action' => ['PostsController@destroy', $post->id],'method' => 'POST', 'class' => 'pull-right']) !!}
              {{ Form::hidden('_method', 'DELETE') }}
              {{ Form::button('<i class="fas fa-trash-alt"></i> Izbriši',['type' => 'submit', 'class' => 'btn btn-danger izbriši']) }}
            {!! Form::close() !!}
          </div>
        </div>
      @endif
    @endif
@endsection

</div>
