@extends('layouts.app')

@section('content')

  <div class="container py-4">
    <div id="cene-section" class="row">
      <div class="table-responsive-md col-md-6">
        <table class="table">
          <thead>
            <tr>
              <th rowspan="3">OPIS UGLUGE</th>
              <th colspan="3">DUŽINA KOSE</th>
            </tr>
            <tr>
               <th>KRATKA</th>
               <th>SREDNJA</th>
               <th>DUGA</th>
             </tr>
          </thead>
          <tbody>
            <!-- Ovde idu cene iz json fajla -->
          </tbody>
          <tfoot>
            <tr>
              <td class="opis-usluge">SVEČANE FRIZURE</td>
               <td colspan="3">1500RSD - 2500RSD</td>
             </tr>
             <tr>
                <td colspan="4"></td>
              </tr>
              <tr>
                <td class="opis-usluge">ŠMINKANJE</td>
                 <td colspan="3">1000RSD - 1500RSD</td>
              </tr>
          </tfoot>
        </table>
      </div>
      <div class="col-md-6 responziv-center">
        <img class="rounded mb-4" style="width:80%;" src="/img/cene-slika-1.jpg" alt="Images">
        <img class="rounded" style="width:80%;" src="/img/cene-slika-2.jpg" alt="Images">
      </div>
    </div>
  </div>


  <script type="text/javascript">

  $(document).ready(function() {
        /* Upisuje u tableu iz json file */
        $.ajax({
            url: '/data/cene.json',
            dataType: 'json',
            success: function(data) {
              $('.table').innerHTML = '';
              $(data).each(function(index,vrednost) {
                var red = '<tr><td class="opis-usluge">'+vrednost.naziv_usluge+'</td><td>'+vrednost.kratka+'</td><td>'+vrednost.srednja+'</td><td>'+vrednost.duga+'</td></tr>';
                $('.table').append(red);

              });
            }
         });



  });

</script>

@endsection
