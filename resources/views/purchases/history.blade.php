@extends('adminlte::page')

@section('title', 'Riwayat Pembelian')

@section('content_header')
    <h1>Riwayat Pembelian Saya</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-history"></i> Riwayat Pembelian
                    </h3>
                </div>
                <div class="card-body">
                    @if($purchases->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th width="15%">Tanggal</th>
                                        <th width="20%">Produk</th>
                                        <th width="15%">Kategori</th>
                                        <th width="10%">Jumlah</th>
                                        <th width="15%">Harga Satuan</th>
                                        <th width="15%">Total</th>
                                        <th width="10%">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($purchases as $index => $purchase)
                                        <tr>
                                            <td>{{ $purchases->firstItem() + $index }}</td>
                                            <td>{{ $purchase->created_at->format('d/m/Y H:i') }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    @if($purchase->product->gambar)
                                                        <img src="{{ asset('img/' . $purchase->product->gambar) }}" 
                                                             alt="{{ $purchase->product->nama }}" 
                                                             class="img-thumbnail mr-2" 
                                                             style="width: 40px; height: 40px; object-fit: cover;">
                                                    @endif
                                                    <span>{{ $purchase->product->nama }}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="badge badge-info">
                                                    {{ ucfirst($purchase->product->kategori) }}
                                                </span>
                                            </td>
                                            <td class="text-center">{{ $purchase->quantity }}</td>
                                            <td class="text-right">Rp {{ number_format($purchase->unit_price, 0, ',', '.') }}</td>
                                            <td class="text-right">
                                                <strong>Rp {{ number_format($purchase->total_price, 0, ',', '.') }}</strong>
                                            </td>
                                            <td>
                                                @if($purchase->status === 'completed')
                                                    <span class="badge badge-success">Selesai</span>
                                                @elseif($purchase->status === 'pending')
                                                    <span class="badge badge-warning">Pending</span>
                                                @else
                                                    <span class="badge badge-danger">Dibatalkan</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr class="bg-light">
                                        <th colspan="6" class="text-right">Total Keseluruhan:</th>
                                        <th class="text-right">
                                            Rp {{ number_format($purchases->sum('total_price'), 0, ',', '.') }}
                                        </th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <div class="d-flex justify-content-center">
                            {{ $purchases->links() }}
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-shopping-cart fa-5x text-muted mb-3"></i>
                            <h4 class="text-muted">Belum Ada Pembelian</h4>
                            <p class="text-muted">Anda belum melakukan pembelian apapun.</p>
                            <a href="{{ route('home') }}" class="btn btn-primary">
                                <i class="fas fa-shopping-bag"></i> Mulai Belanja
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
<style>
    .img-thumbnail {
        border: 1px solid #dee2e6;
    }
    
    .table th {
        background-color: #f8f9fa;
        font-weight: 600;
    }
    
    .badge {
        font-size: 0.8em;
    }
</style>
@stop
