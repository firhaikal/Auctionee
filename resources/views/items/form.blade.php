@extends('layouts.app')
@section('content')
    

<body>
    <div class="container">
      <div class="row d-flex p-2 justify-content-around">
        <div class="card mt-2">
          <h5 class="card-header">Item Form</h5>
          <div class="card-body">
            <form action="{{ url('items', @$item->id_barang) }}" method="POST" class="needs-validation" enctype="multipart/form-data" novalidate>
              @csrf

              @if (!empty($item))
                  @method('PATCH')                      
              @endif
              <div class="form-group">
                <label for="nama_barang">Item Name</label>
                <input type="text"
                  class="form-control" name="nama_barang" id="nama_barang"
                  aria-describedby="helpId" placeholder="Enter Item Name"
                  value="{{ old('nama_barang', @$item->nama_barang) }}" required>

                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
              </div>   
              <div class="form-group">
                <label for="tgl">Date</label>
                <input type="date"
                  class="form-control" name="tgl" id="tgl"
                  aria-describedby="helpId" value="{{ old('tgl', @$item->tgl) }}" required>

                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>

            </div>
            <div class="form-group">
                <label for="harga_awal">Start Price</label>
                <input type="text"
                  class="form-control" name="harga_awal" id="harga_awal"
                  aria-describedby="helpId" placeholder="Enter Start Price" value="{{ old('harga_awal', @$item->harga_awal) }}" required>

                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>

            </div>
            <div class="form-group">
              <label for="deskripsi_barang">Description</label>
              <textarea class="form-control" name="deskripsi_barang"
              id="deskripsi_barang" rows="3" required>{{ old('deskripsi_barang', @$item->deskripsi_barang) }}</textarea>

              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please fill out this field.</div>
            
            </div>
            <div class="form-group">
              <label for="">Image</label>
              <input type="file"
                class="form-control" id="image" name="image" value="{{ old('image', @$item->image) }}" required>
              <small id="helpId" class="form-text text-muted">Max size 2048KB</small>
            </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
      @include('layouts.footers.footers')
    </div>
    <script>
        // Disable form submissions if there are invalid fields
        (function() {
          'use strict';
          window.addEventListener('load', function() {
            // Get the forms we want to add validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
              form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                  event.preventDefault();
                  event.stopPropagation();
                }
                form.classList.add('was-validated');
              }, false);
            });
          }, false);
        })();
        </script>
    </body>
@endsection