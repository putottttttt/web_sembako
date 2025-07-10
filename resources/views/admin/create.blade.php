@extends('adminlte::page')

@section('title', 'Tambah Produk')

@section('content_header')
    <h1>Tambah Produk</h1>
@endsection

@section('content')
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <x-adminlte-input name="nama" label="Nama Produk" required/>
        <x-adminlte-select name="kategori" label="Kategori" required>
            <option value="makanan">Makanan</option>
            <option value="minuman">Minuman</option>
            <option value="alatmandi">Alat Mandi</option>
            <option value="pencuci">Pencuci</option>
        </x-adminlte-select>
        <x-adminlte-input name="harga" label="Harga (Rp)" type="number" required/>
        <x-adminlte-input-file name="gambar" label="Gambar Produk" />

        <x-adminlte-button class="btn btn-primary mt-2" type="submit" label="Simpan Produk" />
    </form>
@endsection
