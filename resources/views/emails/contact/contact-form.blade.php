@component('mail::message')

<h2>Rezervacija</h2>

<strong>Ime i Prezime:</strong> {{ $contact['ime_prezime'] }}<br>
<strong>Telefon:</strong> {{ $contact['telefon'] }}<br>
<strong>Email:</strong> {{ $contact['email'] }}<br>
<strong>Usluga:</strong> {{ $contact['usluga'] }}<br>
<strong>Dan:</strong> {{ $contact['dan'] }}
<strong>Mesec:</strong> {{ $contact['mesec'] }}
<strong>Vreme:</strong> {{ $contact['vreme'] }}<br>
<strong>Poruka:</strong><br>
{{ $contact['poruka'] }}

@endcomponent
