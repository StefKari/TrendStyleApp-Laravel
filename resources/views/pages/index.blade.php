
@extends('layouts.app')

@section('content')

<!-- Glavni slider-->
@include('inc.glavni-slider')

<div class="container py-4">

<!-- Radno vreme-->
<div id="radno_vreme" class="col-md-12">
  <div class="row md-flex justify-around sm-flex text-center justify-content-center">
    <p><span>Radno vreme:</span><br>
    Utorak/Subota 9:00h-17:00h<br>
    Nedelja 9:00h-15:00h<br>
    Ponedeljak Neradni Dan</p>
  </div>
</div>
<!-- Karakteristike firme-->
<div id="naslov-pocetna" class="row responziv-center">
  <div class="col-md-8">
    <h1>Trednd Style<span><br>Frizerski salon Muško/Ženski</span></h1>
    <p>Salon postoji više od 14 godina i to na istom mestu od samog otvaranja.<br>Najbolji dokaza našeg rada su mušterije koje kod nas dolaze vise od 10 godina.<br>Funkcionišemo preko zakazivanja koje možete ostvariti preko menija stranica kontakt ili naravno direktnim pozivom.</p>
    <p>Zakažite termin Vaše frizure:
    <a href="/kontakt">Na sajtu <i class="fas fa-pen-alt"></i></a>
    <a href="tel:+381694546605"><i class="fas fa-phone-volume"></i> +381694546605</a></p>
  </div>
  <div class="col-md-4">
    <img class="rounded" style="width:100%;" src="/img/natpis.jpg" alt="Images">
  </div>
</div>
<!-- Karakteristike 2-->
<div id="karakteristike" class="row responziv-center">
  <div class="col-md-6">
    <i class="fas fa-calendar-check mb-2"> Profesionalna usluga</i>
    <p>Slogan salona: &quot;Musterija je uvek u pravo&quot;.
    <br>Profesionalnost i kvalitet su reči koje nas odvajaju od konkurencije.<br>To su reči zadovoljnih mušterija.</p>
  </div>
  <div class="col-md-6">
    <i class="fas fa-registered mb-2"> Revlon professional</i>
    <p>Koristimo samo proverene dobavljače.<br>Kvalitet nam je na prvom mestu.</p>
  </div>
  <div class="col-md-6 mt-2">
    <i class="fas fa-map-marker-alt mb-2"> Salon u užem centru grada.</i>
    <p>Izuzetno dobra i pristupačna lokacija.
    <br>Salon se nalazi preko puta Abraševića i crkve Sv.Trojice a pored Doma Vojske Srbije.
    </p>
  </div>
  <div class="col-md-6 mt-2">
    <a href="">
      <i class="fab fa-facebook-f fa-lg white-text mr-4 mb-2"></i>
    </a>
    <a href="">
      <i class="fab fa-linkedin-in mr-4 mb-2"></i>
    </a>
    <a href="">
      <i class="fab fa-instagram fa-lg white-text mb-2"></i>
    </a>
    <p>Prisutni smo na Društvenim mrezama.
    <br>Možete direktno otići do željene mreže.</p>
  </div>
</div>

<!-- Musterije slider-->
@include('inc.musterije-slider')

</div>

@endsection
