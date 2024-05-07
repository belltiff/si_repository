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
                <h2>Daftar Kategori</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('kategori.create') }}"> Tambah kategori </a>
            </div>
        </div>
        <div class="container">

            <table class="table table-bordered table-hover">
                <tr>
                    <th>NO</th>
                    <th>Deskripsi</th>
                    <th>Kategori</th>
                    <th style="width: 15%">action</th>
                </tr>
            
                @foreach ($rsetKategori as $rowkategori)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $rowkategori->kategori }}</td>
                        <td>{{ $rowkategori->ketkategorik}}</td>
                        <td>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('kategori.destroy',$rowkategori->id) }}" method="POST">
                                <a class="btn btn-sm btn-dark"  href="{{ route('kategori.show',$rowkategori->id) }}"><i class="fa fa-eye"></i></a>        
                                <a class="btn btn-sm btn-primary" href="{{ route('kategori.edit',$rowkategori->id) }}"><i class="fa fa-pencil-alt"></i></a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>

            {!! $rsetKategori->links('pagination::bootstrap-5') !!}
        </div>
        
@endsection