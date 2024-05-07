@extends('layouts.adm-main')

@section('content')

@if ($message = Session::get('success'))
    
    <div class="container">
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    </div>

@endif
        <div class="col-lg-12 margin-tb m-4">
            <div class="pull-left">
                <h2>Daftar Barang</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('barang.create') }}"> Tambah barang </a>
            </div>
        </div>
        <div class="container">

            <table class="table table-bordered table-hover">
                <tr>
                    <th>NO</th>
                    <th>Merk</th>
                    <th>Seri</th>
                    <th>Spesifikasi</th>
                    <th>Stok</th>
                    <th>Kategori</th>
                    <th>Action</th>
                </tr>
            
                @foreach ($rsetBarang as $rowbarang)
                
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $rowbarang->merk }}</td>
                        <td>{{ $rowbarang->seri }}</td>
                        <td>{{ $rowbarang->spesifikasi }}</td>
                        <td>{{ $rowbarang->stok }}</td>
                        <td>{{ $rowbarang->kategori->kategori}}</td>
                        <td>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('barang.destroy',$rowbarang->id) }}" method="POST">
                                <a class="btn btn-sm btn-dark"  href="{{ route('barang.show',$rowbarang->id) }}"><i class="fa fa-eye"></i></a>        
                                <a class="btn btn-sm btn-primary" href="{{ route('barang.edit',$rowbarang->id) }}"><i class="fa fa-pencil-alt"></i></a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>

            {!! $rsetBarang->links('pagination::bootstrap-5') !!}
        </div>
        
@endsection