@extends('layouts.app')

@section('content')

@if(!Auth::guest())
   @if(auth()->user()->is_admin == 1)
    <div class="container mt-4">
      <a href="/gallery/kreiraj" class="btn btn-warning">Dodaj Fotografiju u Galeriju</a>
    </div>
  @endif
@endif
<div class="container py-4">
   <div class="row mt-4">
    @if(count($images) > 0)
      @forelse ($images as $image)
        <div class="col-xl-6 col-lg-6 col-md-6 col-xs-12">
          <div class="card mb-3">
              <a href="{{ asset($image->gallery) }}">
                <img src="{{ asset($image->gallery) }}" class="card-img-top rounded" alt="Images" height="500px">
              </a>
              <div class="text-center">
                @if(!Auth::guest())
                   @if(auth()->user()->is_admin == 1)
                    {!! Form::open(['action' => ['GalleryController@destroy', $image->id],'method' => 'POST', 'class' => 'pull-right']) !!}
                      {{ Form::hidden('_method', 'DELETE') }}
                      {{ Form::submit('Izbriši',['class' => 'btn btn-danger izbriši']) }}
                    {!! Form::close() !!}
                   @endif
                @endif
              </div>
           </div>
         </div>
      @empty
        <p>Trenutno nema Galerije!</p>
      @endforelse
    @endif
   </div>
   <div class="row justify-content-center mt-2 mb-2">
     {{ $images->links() }}
   </div>
</div>
<script type="text/javascript">

</script>

@endsection
