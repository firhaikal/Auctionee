@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
<div class="container mt-4">
    <div class="row d-flex justify-content-around align-content-around flex-wrap">
            @if ($items->count())
                @foreach ($items as $item)
                <div class="card m-2" style="width: 14rem;">
                    <img class="card-img-top" src="/images/{{ $item->image }}" alt="{{ $item->nama_barang }}">
                    <div class="card-body">
                      <h5 class="card-title">{{ $item->nama_barang }}</h5>
                      <p class="card-text">{{ \Illuminate\Support\Str::limit($item->deskripsi_barang, 35, "...") }}</p>
                      <a href="{{ url('/items/' . $item->id_barang . '/detail') }}" class="btn btn-primary">See more</a>
                    </div>
                  </div>
                {{-- <div class='col-sm-4'>
                    <a class="thumbnail fancybox" rel="ligthbox" href="{{ url('/items/' . $item->id_barang . '/detail') }}">
                        <div class="card">
                            <div class="card-body">
                              <img class="img-responsive" alt="" src="/images/{{ $item->image }}" />
                              <h3 class="card-title">{{ $item->nama_barang }}</h3>
                              <p class="card-text">Text</p>
                            </div>
                        </div>
                    </a>
                    
                </div> --}}
                @endforeach
            @endif
    </div>
    @include('layouts.footers.footers')
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none"
        });
    });
</script>
@endsection
