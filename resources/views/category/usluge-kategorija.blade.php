@extends('layouts.app')

@section('content')

<div class="container py-4">
  @if(count($posts) > 0)
    @foreach($posts->chunk(2) as $items)
    <div id="usluge" class="row md-flex justify-content-center">
       @forelse($items as $post)
         <div id="usluge-card" class="card">
            <!-- Card Top Deo -->
             <a href="/usluga/{{ $post->id }}">
               <img class="card-img-top "  src="/storage/image/{{ $post->image }}" alt="Images">
             </a>
            <!-- Card Body -->
            <div class="card-body">
           		<h2 class="card-title">{{ $post->title }}</h2>
              <small>Objavljeno: {{ $post->created_at }}</small>
              <p class="mt-2">Kategorija: {{ $post->category->name }}</p>
           		<button><a href="/usluga/{{ $post->id }}">Pogledaj</a></button>
              <a href="/kontakt"><i class="fas fa-pen-alt"></i></a>
         	</div>
         </div>
       @empty
         <p>Trenutno nema nijedne usluge u ovoj kategoriji!</p>
       @endforelse
    </div>
    @endforeach
  @endif
</div>

@endsection
