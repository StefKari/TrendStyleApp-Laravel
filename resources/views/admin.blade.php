@extends('layouts.app')

@section('content')
<div class="container py-4 mt-4 mb-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h3>Admin Panel by {{ Auth::user()->name }} <span class="caret"></span></h3>
                </div>
                <div id="admin-template"class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- Usluge!-->
                    <h3 class="py-4">Usluge</h3>
                    <div class="row">
                      <div class="col-md-4">
                        <p>Putanja do stanice za kreiranje usluge:</p>
                        <a href="/posts/kreiraj" class="btn admin-btn my-3"><i class="fas fa-plus"></i> Kreiraj</a>
                      </div>
                      <div class="col-md-4">
                        <p>Putanja za editovanje odredjene usluge:</p>
                        <a href="/usluge" class="btn btn-warning my-3 edituj"><i class="fas fa-edit"></i> Edituj</a>
                      </div>
                      <div class="col-md-4">
                        <p>Putanja do odredjene usluge za brisanje:</p>
                        <a href="/usluge" class="btn btn-danger my-3 izbriši"><i class="fas fa-trash-alt"></i> Izbriši</a>
                      </div>
                    </div>
                    <hr>
                    <!-- Kategorija -->
                    <h3 class="py-4">Kategorije Usluga</h3>
                    <div class="row">
                      <div class="col-md-4">
                        <p>Putanja za kreiranje kategorije:</p>
                        <a href="/kategorije" class="btn admin-btn my-3"><i class="fas fa-plus"></i> Kreiraj</a>
                      </div>
                      <div class="col-md-4">
                        <p>Putanja za brisanje kategorije:</p>
                        <a href="/kategorije" class="btn btn-danger my-3 izbriši"><i class="fas fa-trash-alt"></i> Izbriši</a>
                      </div>
                    </div>
                    <hr>
                    <!-- Galerija -->
                    <h3 class="py-4">Galerija</h3>
                    <div class="row">
                      <div class="col-md-4">
                        <p>Putanja za kreiranje fotografije u galeriji:</p>
                        <a href="/gallery/kreiraj" class="btn admin-btn my-3"><i class="fas fa-plus"></i> Kreiraj</a>
                      </div>
                      <div class="col-md-4">
                        <p>Putanja za brisanje fotografije u galeriji:</p>
                        <a href="/galerija" class="btn btn-danger my-3 izbriši"><i class="fas fa-trash-alt"></i> Izbriši</a>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
