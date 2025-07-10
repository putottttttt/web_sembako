@extends('adminlte::page')

@section('title', 'Detail Produk')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Detail Produk</h1>
        <div>
            <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Edit Produk
            </a>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Gambar Produk</h3>
                </div>
                <div class="card-body text-center">
                    @if($product->gambar)
                        <img src="{{ asset('img/' . $product->gambar) }}" 
                             alt="{{ $product->nama }}" 
                             class="img-fluid rounded"
                             style="max-width: 100%; max-height: 300px;">
                    @else
                        <div class="bg-light d-flex align-items-center justify-content-center rounded" 
                             style="height: 300px;">
                            <div class="text-center">
                                <i class="fas fa-image fa-4x text-muted mb-3"></i>
                                <p class="text-muted">Tidak ada gambar</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Informasi Produk</h3>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <th width="150">ID Produk:</th>
                            <td>{{ $product->id }}</td>
                        </tr>
                        <tr>
                            <th>Nama Produk:</th>
                            <td><strong>{{ $product->nama }}</strong></td>
                        </tr>
                        <tr>
                            <th>Kategori:</th>
                            <td>
                                <span class="badge badge-{{ $product->kategori == 'makanan' ? 'success' : ($product->kategori == 'minuman' ? 'info' : ($product->kategori == 'alatmandi' ? 'warning' : 'primary')) }} badge-lg">
                                    {{ ucfirst($product->kategori) }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>Harga:</th>
                            <td>
                                <span class="text-success h4">
                                    <strong>Rp {{ number_format($product->harga, 0, ',', '.') }}</strong>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>Tanggal Dibuat:</th>
                            <td>{{ $product->created_at ? $product->created_at->format('d F Y, H:i') : '-' }}</td>
                        </tr>
                        <tr>
                            <th>Terakhir Diupdate:</th>
                            <td>{{ $product->updated_at ? $product->updated_at->format('d F Y, H:i') : '-' }}</td>
                        </tr>
                        <tr>
                            <th>File Gambar:</th>
                            <td>
                                @if($product->gambar)
                                    <code>{{ $product->gambar }}</code>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-block">
                                <i class="fas fa-edit"></i> Edit Produk
                            </a>
                        </div>
                        <div class="col-md-6">
                            <form action="{{ route('products.destroy', $product) }}" 
                                  method="POST" 
                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-block">
                                    <i class="fas fa-trash"></i> Hapus Produk
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <style>
        .badge-lg {
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
        }
    </style>
@endsection
