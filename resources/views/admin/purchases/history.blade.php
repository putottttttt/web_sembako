@extends('adminlte::page')

@section('title', 'Riwayat Pembelian - Admin')

@section('content_header')
    <h1>Manajemen Riwayat Pembelian</h1>
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

            <!-- Statistics Cards -->
            <div class="row mb-4">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $purchases->total() }}</h3>
                            <p>Total Transaksi</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>Rp {{ number_format($purchases->sum('total_price'), 0, ',', '.') }}</h3>
                            <p>Total Penjualan</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $purchases->where('status', 'completed')->count() }}</h3>
                            <p>Transaksi Selesai</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $purchases->where('status', 'pending')->count() }}</h3>
                            <p>Transaksi Pending</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-clock"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-history"></i> Semua Riwayat Pembelian
                    </h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    @if($purchases->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="purchasesTable">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th width="10%">Tanggal</th>
                                        <th width="15%">Customer</th>
                                        <th width="20%">Produk</th>
                                        <th width="10%">Kategori</th>
                                        <th width="8%">Qty</th>
                                        <th width="12%">Harga Satuan</th>
                                        <th width="12%">Total</th>
                                        <th width="8%">Status</th>
                                        <th width="10%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($purchases as $index => $purchase)
                                        <tr>
                                            <td>{{ $purchases->firstItem() + $index }}</td>
                                            <td>{{ $purchase->created_at->format('d/m/Y H:i') }}</td>
                                            <td>
                                                <div>
                                                    <strong>{{ $purchase->user->name }}</strong><br>
                                                    <small class="text-muted">{{ $purchase->user->username }}</small>
                                                </div>
                                            </td>
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
                                            <td>
                                                <button type="button" 
                                                        class="btn btn-danger btn-sm" 
                                                        onclick="deletePurchase({{ $purchase->id }})"
                                                        title="Hapus">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr class="bg-light">
                                        <th colspan="7" class="text-right">Total Keseluruhan:</th>
                                        <th class="text-right">
                                            Rp {{ number_format($purchases->sum('total_price'), 0, ',', '.') }}
                                        </th>
                                        <th colspan="2"></th>
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
                            <h4 class="text-muted">Belum Ada Transaksi</h4>
                            <p class="text-muted">Belum ada transaksi pembelian yang tercatat.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus riwayat pembelian ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <form id="deleteForm" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
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
    
    .small-box {
        border-radius: 0.25rem;
    }
    
    .small-box .inner h3 {
        font-size: 1.5rem;
        font-weight: bold;
    }
</style>
@stop

@section('js')
<script>
function deletePurchase(id) {
    $('#deleteForm').attr('action', '/admin/purchases/' + id);
    $('#deleteModal').modal('show');
}

$(document).ready(function() {
    $('#purchasesTable').DataTable({
        "paging": false,
        "searching": true,
        "ordering": true,
        "info": false,
        "autoWidth": false,
        "responsive": true,
        "language": {
            "search": "Cari:",
            "emptyTable": "Tidak ada data yang tersedia",
            "zeroRecords": "Tidak ada data yang cocok"
        }
    });
});
</script>
@stop
