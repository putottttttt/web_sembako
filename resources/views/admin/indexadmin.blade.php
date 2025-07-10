@extends('adminlte::page')

@section('title', 'Kelola Produk')

@section('content_header')
    <h1>Daftar Produk</h1>
@endsection

@section('content')
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">+ Tambah Produk</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Gambar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $p)
            <tr>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->kategori }}</td>
                <td>Rp {{ number_format($p->harga) }}</td>
                <td>
                    @if ($p->gambar)
                        <img src="{{ asset('images/' . $p->gambar) }}" width="80">
                    @else
                        -
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
