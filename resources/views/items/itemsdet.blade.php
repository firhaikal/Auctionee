<div class="container">
    <h1>Item Management</h1>
</div>
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="alert alert-error alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    {{ session('error') }}
</div>
@endif

<div class="container">
    <a class="btn btn-primary" href="{{ url('/items/create') }}" role="button">Add Item</a>
</div>
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col">
            <table class="table table-hover">
                <thead class="thead-inverse">
                    <tr>
                        <th>No</th>
                        <th>Id</th>
                        <th>Item Name</th>
                        <th>Date</th>
                        <th>Start Price</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                <tbody>
                    @foreach ($items as $row)
                    <tr>
                        <td>{{ isset($i) ? ++$i : $i = 1 }}</td>
                        <td>{{ $row->id_barang }}</td>
                        <td>{{ $row->nama_barang }}</td>
                        <td>{{ $row->tgl }}</td>
                        <td>{{ $row->harga_awal }}</td>
                        <td>{{ $row->deskripsi_barang }}</td>
                        <td>
                            <a class="btn btn-warning" href="{{ url('/items/' . $row->id_barang . '/edit') }}" role="button">Edit</a>
                            <a class="btn btn-primary" href="{{ url('/items/' . $row->id_barang . '/detail') }}" role="button">Detail</a>
                            <form action="{{ url('/items/' . $row->id) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
</div>
<footer class="row">
    @include('includes.footer')
</footer>