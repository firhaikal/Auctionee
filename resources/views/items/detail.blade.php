@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row d-flex align-content-around flex-wrap m-4">
            <div class="col">
                <div class="card bg-dark text-white">
                    <img class="card-img" src="/images/{{ $item->image }}" alt="{{ $item->nama_barang }}">
                </div>
            </div>
            <div class="col">
                <h1 class="display-4">{{ old('nama_barang', @$item->nama_barang) }}</h1>
                <div class="card">
                    <div class="card-header">
                      Description
                    </div>
                    <div class="card-body">
                      <blockquote class="blockquote mb-0">
                        <p class="card-text">{{ old('deskripsi_barang', @$item->deskripsi_barang) }}</p>
                      </blockquote>
                      <div class="card-footer text-muted d-flex justify-content-center">
                        Added at {{ @$item->tgl }}
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            @auth
              @if (@$item->status == 0)
                <a href="#" class="btn btn-primary disabled" role="button">Lelang ditutup</a>
              @else
                <button type="button" class="btn btn-primary btn-lg">Mulai Lelang</button>
              @endif  
            @endauth
            @guest
                <a href="#" class="btn btn-primary disabled" role="button">Lelang ditutup</a>
            @endguest
        </div>
        @include('layouts.footers.footers')
    </div>
    
@endsection