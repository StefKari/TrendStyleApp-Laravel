@extends('layouts.app')

@section('content')

<div class="container py-4">
  <div class="row">
    <div id="kontakt" class="col-md-10">
      <p><span>Poštovani,</span><br> U koliko želite da rezervišete termin za Vašu frizuru.<br>Molimo Vas da popunite sledeća polja:</p>
      {!! Form::open(['action' => 'ContactController@store', 'method' => 'POST']) !!}
        <div class="form-group">
          {{ Form::label('ime_prezime','Ime i Prezime:') }}
          {{ Form::text('ime_prezime','',['class' => 'form-control']) }}
        </div>
        <div class="form-group">
          {{ Form::label('telefon','Telefon:') }}
          {{ Form::text('telefon','',['class' => 'form-control']) }}
        </div>
        <div class="form-group">
          {{ Form::label('email','Email:') }}
          {{ Form::text('email','',['class' => 'form-control']) }}
        </div>
        <div class="form-group">
          {{ Form::label('usluga', 'Izaberite uslugu: ') }}
          {{ Form::select('usluga',[
              'Farbanje' => 'Farbanje',
              'Šišanje' => 'Šisanje',
              'Feniranje' => 'Feniranje'
            ], null, ['class' => 'usluga-select']) }}
        </div>
        <div class="form-group">
            {{ Form::label('dan', 'Izaberite Dan: ') }}
            {{ Form::selectRange('dan', 1, 31) }}

            {{ Form::label('mesec', 'Izaberite Mesec: ') }}
            {{ Form::select('mesec', [
                  'Januar' => 'Januar',
                  'Februar' => 'Februar',
                  'Mart' => 'Mart',
                  'April' => 'April',
                  'Maj' => 'Maj',
                  'Jun' => 'Jun',
                  'Jul' => 'Jul',
                  'Avgust' => 'Avgust',
                  'Septembar' => 'Septembar',
                  'Oktobar' => 'Oktobar',
                  'Novembar' => 'Novembar',
                  'Decembar' => 'Decembar'
                ], null, ['class' => 'mesec-select'])  }}

            {{ Form::label('vreme', 'Izaberite vreme: ') }}
            {{ Form::select('vreme',[
                  '9:00h' => '9:00h',
                  '9:30h' => '9:30h',
                  '10:00h' => '10:00h',
                  '10:30h' => '10:30h',
                  '11:00h' => '11:00h',
                  '11:30h' => '11:30h',
                  '12:00h' => '12:00h',
                  '12:30h' => '12:30h',
                  '13:00h' => '13:00h',
                  '13:30h' => '13:30h',
                  '14:00h' => '14:00h',
                  '14:30h' => '14:30h',
                  '15:00h' => '15:00h',
                  '15:30h' => '15:30h',
                  '16:00h' => '16:00h',
                  '16:30h' => '16:30h',
                  '17:00h' => '17:00h'
              ], null, ['class' => 'vreme-select']) }}

        </div>
        <p>U koliko imate neku posebnu poruku,<br>možete uneti u polje ispod:</p>
        <div class="form-group">
          {{ Form::label('poruka','Poruka:') }}
          {{ Form::textarea('poruka','',['class' => 'form-control','rows' => 3, 'cols' => 30]) }}
        </div>
        <p>Odgovor na rezervaciju dobićete u najkraćem mogućem roku!<br>Vaš TrendStyle.</p>
      {{ Form::submit('Rezerviši',['class' => 'dugme']) }}
    {!! Form::close() !!}
  </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div id="mapa"></div>
        <script>
            var mymap = L.map('mapa').setView([43.7259955,20.6821573], 19.75);
            var marker = L.marker([43.7259955,20.6821573]).addTo(mymap);
            L.tileLayer('https://a.tile.openstreetmap.org/{z}/{x}/{y}.png ', {
                  attribution: '',
                  maxZoom: 18,
            }).addTo(mymap);
       </script>
    </div>
  </div>

</div>

@endsection
