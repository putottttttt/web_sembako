<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Keranjang Belanja - Toko Putra Sugema</title>
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">🛒 Keranjang Belanja</h2>

    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Cek apakah keranjang memiliki item --}}
    @if(count($keranjang) > 0)
    <form action="{{ route('checkout') }}" method="POST">
        @csrf
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Produk</th>
                    <th>Jumlah</th>
                    <th>Harga Satuan</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach($keranjang as $id => $item)
                    @php 
                        $subtotal = $item['harga'] * $item['jumlah']; 
                        $total += $subtotal; 
                    @endphp
                    <tr>
                        <td>{{ $item['nama'] }}</td>
                        <td>{{ $item['jumlah'] }}</td>
                        <td>Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
                <tr class="table-info">
                    <td colspan="3"><strong>Total Belanja</strong></td>
                    <td><strong>Rp {{ number_format($total, 0, ',', '.') }}</strong></td>
                </tr>
            </tbody>
        </table>

        {{-- Pilihan metode pembayaran --}}
        <div class="mb-3">
            <label for="metode_pembayaran" class="form-label">Metode Pembayaran:</label>
            <select name="metode_pembayaran" id="metode_pembayaran" class="form-select" required>
                <option value="">-- Pilih --</option>
                <option value="bayar_sekarang">Bayar Sekarang</option>
                <option value="paylater">Paylater</option>
            </select>
        </div>

        {{-- Pilihan metode pengiriman --}}
        <div class="mb-4">
            <label for="metode_pengiriman" class="form-label">Metode Pengiriman:</label>
            <select name="metode_pengiriman" id="metode_pengiriman" class="form-select" required>
                <option value="">-- Pilih --</option>
                <option value="ambil_ditempat">Ambil ke Tempat</option>
                <option value="cod">COD (Bayar di Tempat)</option>
            </select>
        </div>

        {{-- Tombol aksi --}}
        <div class="d-flex justify-content-between">
            <a href="{{ route('home') }}" class="btn btn-secondary">← Kembali Belanja</a>
            <button type="submit" class="btn btn-success">Checkout Sekarang</button>
        </div>
    </form>

    @else
        {{-- Jika keranjang kosong --}}
        <div class="alert alert-warning">Keranjang kamu masih kosong.</div>
        <div class="mt-3">
            <a href="{{ route('home') }}" class="btn btn-primary">← Kembali Belanja</a>
        </div>
    @endif
</div>

</body>
</html>
