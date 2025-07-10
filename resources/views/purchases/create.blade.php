@extends('adminlte::page')

@section('title', 'Beli Produk')

@section('content_header')
    <h1>Beli Produk</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Form Pembelian</h3>
                </div>
                <div class="card-body">
                    <!-- Informasi Produk -->
                    <div class="row mb-4">
                        <div class="col-md-4">
                            @if($product->gambar)
                                <img src="{{ asset('img/' . $product->gambar) }}" 
                                     alt="{{ $product->nama }}" 
                                     class="img-fluid rounded">
                            @else
                                <img src="{{ asset('img/default-product.svg') }}" 
                                     alt="Default" 
                                     class="img-fluid rounded">
                            @endif
                        </div>
                        <div class="col-md-8">
                            <h4>{{ $product->nama }}</h4>
                            <p class="text-muted">Kategori: {{ ucfirst($product->kategori) }}</p>
                            <h5 class="text-success">Rp {{ number_format($product->harga, 0, ',', '.') }}</h5>
                        </div>
                    </div>

                    <!-- Form Pembelian -->
                    <form action="{{ route('purchases.store') }}" method="POST" onsubmit="return confirmPurchase()">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        
                        <!-- Debug Info -->
                        <div class="alert alert-info">
                            <small>
                                <strong>Debug Info:</strong><br>
                                Product ID: {{ $product->id }}<br>
                                Product Name: {{ $product->nama }}<br>
                                Product Price: Rp {{ number_format($product->harga, 0, ',', '.') }}<br>
                                Form Action: {{ route('purchases.store') }}<br>
                                Current User: {{ auth()->check() ? auth()->user()->username : 'Not logged in' }}
                            </small>
                        </div>
                        
                        <div class="form-group">
                            <label for="quantity">Jumlah</label>
                            <input type="number" 
                                   class="form-control @error('quantity') is-invalid @enderror" 
                                   id="quantity" 
                                   name="quantity" 
                                   value="{{ old('quantity', 1) }}" 
                                   min="1" 
                                   required
                                   onchange="updateTotal()">
                            @error('quantity')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Total Harga</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input type="text" 
                                       class="form-control" 
                                       id="total_display" 
                                       value="{{ number_format($product->harga, 0, ',', '.') }}" 
                                       readonly>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success btn-block">
                                    <i class="fas fa-shopping-cart"></i> Beli Sekarang
                                </button>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ url()->previous() }}" class="btn btn-secondary btn-block">
                                    <i class="fas fa-arrow-left"></i> Kembali
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Ringkasan Pembelian</h3>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <td>Produk:</td>
                            <td class="text-right">{{ $product->nama }}</td>
                        </tr>
                        <tr>
                            <td>Harga Satuan:</td>
                            <td class="text-right">Rp {{ number_format($product->harga, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <td>Jumlah:</td>
                            <td class="text-right" id="qty_display">1</td>
                        </tr>
                        <tr class="border-top">
                            <td><strong>Total:</strong></td>
                            <td class="text-right"><strong id="total_summary">Rp {{ number_format($product->harga, 0, ',', '.') }}</strong></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
<script>
    const unitPrice = {{ $product->harga }};
    
    function updateTotal() {
        const quantity = document.getElementById('quantity').value;
        const total = unitPrice * quantity;
        
        // Update display
        document.getElementById('total_display').value = total.toLocaleString('id-ID');
        document.getElementById('qty_display').textContent = quantity;
        document.getElementById('total_summary').textContent = 'Rp ' + total.toLocaleString('id-ID');
    }
    
    function confirmPurchase() {
        const quantity = document.getElementById('quantity').value;
        const total = unitPrice * quantity;
        const productName = '{{ $product->nama }}';
        
        const message = `Konfirmasi Pembelian:\n\nProduk: ${productName}\nJumlah: ${quantity}\nTotal: Rp ${total.toLocaleString('id-ID')}\n\nApakah Anda yakin ingin melanjutkan?`;
        
        if (confirm(message)) {
            console.log('Purchase confirmed:', {
                product_id: {{ $product->id }},
                quantity: quantity,
                unit_price: unitPrice,
                total_price: total
            });
            return true;
        }
        return false;
    }
    
    // Initialize
    updateTotal();
</script>
@stop
