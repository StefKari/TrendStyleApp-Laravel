@extends('layouts.app')

@section('content')

<div class="container py-4">
  <div class="row">
    <div class="col-md-8 mt-4">
      <table class="table table-kat">
        <thead>
          <tr>
            <th>Ime kategorije</th>
            <th>Opcija / Izbriši</th>
          </tr>
        </thead>
        <tbody>
          @foreach($category as $vrednost)
          <tr>
            <th>{{ $vrednost->name }}</th>
            <th>
              @if(!Auth::guest())
               @if(auth()->user()->is_admin == 1)
                {!! Form::open(['action' => ['CategoryController@destroy', $vrednost->id],'method' => 'POST', 'class' => 'pull-right']) !!}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Izbriši',['class' => 'btn btn-danger izbriši']) }}
                {!! Form::close() !!}
                @endif
              @endif
            </th>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="col-md-4 mt-4">
      @if(!Auth::guest())
        @if(auth()->user()->is_admin == 1)
          <h3 class="mb-4">Kreiraj kategoriju:</h3>
            {!! Form::open(['action' => 'CategoryController@store', 'method' => 'POST']) !!}
              <div class="form-group">
                {{ Form::label('ime','Ime Kategorije:') }}
                {{ Form::text('ime','',['class' => 'form-control']) }}
              </div>
            {{ Form::submit('Kreiraj',['class' => 'btn admin-btn']) }}
            {!! Form::close() !!}
        @endif
      @endif
    </div>
  </div>
</div>
@endsection
