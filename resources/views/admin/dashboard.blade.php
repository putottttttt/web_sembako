@extends('adminlte::page')

@section('title', 'Dashboard Admin')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Dashboard Admin</h1>
        <div>
            <span class="badge badge-success">Online</span>
            <small class="text-muted">{{ now()->format('d/m/Y H:i') }}</small>
        </div>
    </div>
@endsection

@section('content')
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $totalProducts }}</h3>
                    <p>Total Produk</p>
                </div>
                <div class="icon">
                    <i class="fas fa-boxes"></i>
                </div>
                <a href="{{ route('products.index') }}" class="small-box-footer">
                    Selengkapnya <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $totalUsers }}</h3>
                    <p>Total Pengguna</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="{{ route('users.index') }}" class="small-box-footer">
                    Selengkapnya <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $totalAdmins }}</h3>
                    <p>Total Admin</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-shield"></i>
                </div>
                <a href="{{ route('users.index') }}?role=admin" class="small-box-footer">
                    Selengkapnya <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $totalClients }}</h3>
                    <p>Total Client</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-friends"></i>
                </div>
                <a href="{{ route('users.index') }}?role=client" class="small-box-footer">
                    Selengkapnya <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Menu Utama -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-tachometer-alt"></i> Menu Utama
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-primary">
                                    <i class="fas fa-boxes"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Kelola Produk</span>
                                    <span class="info-box-number">{{ $totalProducts }} produk</span>
                                    <div class="progress">
                                        <div class="progress-bar bg-primary" style="width: 100%"></div>
                                    </div>
                                </div>
                                <div class="info-box-more">
                                    <a href="{{ route('products.index') }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-success">
                                    <i class="fas fa-users"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Kelola Pengguna</span>
                                    <span class="info-box-number">{{ $totalUsers }} pengguna</span>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" style="width: 100%"></div>
                                    </div>
                                </div>
                                <div class="info-box-more">
                                    <a href="{{ route('users.index') }}" class="btn btn-sm btn-success">
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-warning">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Tambah Produk</span>
                                    <span class="info-box-number">Cepat</span>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" style="width: 80%"></div>
                                    </div>
                                </div>
                                <div class="info-box-more">
                                    <a href="{{ route('products.create') }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-info">
                                    <i class="fas fa-user-plus"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Tambah Pengguna</span>
                                    <span class="info-box-number">Cepat</span>
                                    <div class="progress">
                                        <div class="progress-bar bg-info" style="width: 80%"></div>
                                    </div>
                                </div>
                                <div class="info-box-more">
                                    <a href="{{ route('users.create') }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Informasi Sistem -->
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-chart-pie"></i> Statistik
                    </h3>
                </div>
                <div class="card-body">
                    <div class="chart-container" style="position: relative; height: 300px;">
                        <div id="chartLoading" class="chart-loading">
                            <i class="fas fa-spinner fa-spin fa-2x"></i>
                            <span class="ml-2">Memuat chart...</span>
                        </div>
                        <canvas id="categoriesChart" style="display: none;"></canvas>
                    </div>
                    
                    <hr>
                    
                    <div class="row">
                        <div class="col-12">
                            <h6><i class="fas fa-chart-bar text-info"></i> Statistik Kategori:</h6>
                            <div class="row">
                                <div class="col-6">
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="bg-success rounded-circle" style="width: 12px; height: 12px;"></div>
                                        <span class="ml-2">Makanan: <strong>{{ $productsByCategory['makanan'] ?? 0 }}</strong></span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="bg-info rounded-circle" style="width: 12px; height: 12px;"></div>
                                        <span class="ml-2">Minuman: <strong>{{ $productsByCategory['minuman'] ?? 0 }}</strong></span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="bg-warning rounded-circle" style="width: 12px; height: 12px;"></div>
                                        <span class="ml-2">Alat Mandi: <strong>{{ $productsByCategory['alatmandi'] ?? 0 }}</strong></span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="bg-primary rounded-circle" style="width: 12px; height: 12px;"></div>
                                        <span class="ml-2">Pencuci: <strong>{{ $productsByCategory['pencuci'] ?? 0 }}</strong></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <hr>
                    
                    <h6><i class="fas fa-info-circle text-info"></i> Info Sistem:</h6>
                    <ul class="list-unstyled">
                        <li><strong>Aplikasi:</strong> Toko Putra Sugema</li>
                        <li><strong>Versi:</strong> 1.0.0</li>
                        <li><strong>Framework:</strong> Laravel</li>
                        <li><strong>Database:</strong> MySQL</li>
                    </ul>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-clock"></i> Aktivitas Terbaru
                    </h3>
                </div>
                <div class="card-body">
                    <div class="timeline">
                        <div class="time-label">
                            <span class="bg-green">{{ now()->format('d M Y') }}</span>
                        </div>
                        <div>
                            <i class="fas fa-user bg-blue"></i>
                            <div class="timeline-item">
                                <span class="time"><i class="fas fa-clock"></i> {{ now()->format('H:i') }}</span>
                                <h3 class="timeline-header">Login ke dashboard</h3>
                                <div class="timeline-body">
                                    Anda berhasil login sebagai {{ auth()->user()->role }}
                                </div>
                            </div>
                        </div>
                        <div>
                            <i class="fas fa-clock bg-gray"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Recent Products -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-boxes"></i> Produk Terbaru
                    </h3>
                    <div class="card-tools">
                        <a href="{{ route('products.index') }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-eye"></i> Lihat Semua
                        </a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Gambar</th>
                                    <th>Nama Produk</th>
                                    <th>Kategori</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentProducts as $product)
                                <tr>
                                    <td>
                                        @if($product->gambar)
                                            <img src="{{ asset('img/' . $product->gambar) }}" 
                                                 alt="{{ $product->nama }}" 
                                                 class="img-thumbnail"
                                                 style="width: 40px; height: 40px; object-fit: cover;">
                                        @else
                                            <div class="bg-light d-flex align-items-center justify-content-center" 
                                                 style="width: 40px; height: 40px; border-radius: 4px;">
                                                <i class="fas fa-image text-muted"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('products.show', $product) }}" class="text-decoration-none">
                                            {{ $product->nama }}
                                        </a>
                                    </td>
                                    <td>
                                        <span class="badge badge-{{ $product->kategori == 'makanan' ? 'success' : ($product->kategori == 'minuman' ? 'info' : ($product->kategori == 'alatmandi' ? 'warning' : 'primary')) }}">
                                            {{ ucfirst($product->kategori) }}
                                        </span>
                                    </td>
                                    <td>
                                        <strong class="text-success">
                                            Rp {{ number_format($product->harga, 0, ',', '.') }}
                                        </strong>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-3">
                                        <i class="fas fa-box-open"></i> Belum ada produk
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Users -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-users"></i> Pengguna Terbaru
                    </h3>
                    <div class="card-tools">
                        <a href="{{ route('users.index') }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-eye"></i> Lihat Semua
                        </a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Role</th>
                                    <th>Tanggal Gabung</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentUsers as $user)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-user-circle fa-2x text-muted mr-2"></i>
                                            <div>
                                                <a href="{{ route('users.show', $user) }}" class="text-decoration-none">
                                                    {{ $user->name ?: 'Nama belum diset' }}
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <code>{{ $user->username }}</code>
                                    </td>
                                    <td>
                                        <span class="badge badge-{{ $user->role == 'admin' ? 'danger' : 'primary' }}">
                                            <i class="fas fa-{{ $user->role == 'admin' ? 'user-shield' : 'user' }}"></i>
                                            {{ ucfirst($user->role) }}
                                        </span>
                                    </td>
                                    <td>
                                        <small class="text-muted">
                                            {{ $user->created_at ? $user->created_at->format('d/m/Y') : '-' }}
                                        </small>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-3">
                                        <i class="fas fa-user-slash"></i> Belum ada pengguna
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <style>
        .small-box {
            border-radius: 0.375rem;
        }
        .card {
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }
        .info-box {
            display: flex;
            align-items: center;
            padding: 10px;
            background: white;
            border-radius: 0.375rem;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            border: 1px solid #dee2e6;
        }
        .info-box-more {
            margin-left: auto;
        }
        .timeline > div > .timeline-item {
            margin-left: 0;
        }
        
        /* Chart styles */
        .chart-container {
            position: relative;
            margin: auto;
            height: 300px;
        }
        
        .chart-container canvas {
            max-width: 100%;
            height: auto;
        }
        
        /* Loading animation */
        .chart-loading {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 300px;
            color: #6c757d;
        }
        
        .chart-loading i {
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        $(document).ready(function() {
            // Fungsi untuk membuat chart
            function createChart() {
                const ctx = document.getElementById('categoriesChart');
                const loading = document.getElementById('chartLoading');
                
                if (!ctx) {
                    console.error('Chart canvas not found');
                    return;
                }
                
                try {
                    // Data untuk chart
                    const chartData = {
                        makanan: {{ $productsByCategory['makanan'] ?? 0 }},
                        minuman: {{ $productsByCategory['minuman'] ?? 0 }},
                        alatmandi: {{ $productsByCategory['alatmandi'] ?? 0 }},
                        pencuci: {{ $productsByCategory['pencuci'] ?? 0 }}
                    };
                    
                    console.log('Chart data:', chartData);
                    
                    // Periksa apakah ada data
                    const totalData = Object.values(chartData).reduce((a, b) => a + b, 0);
                    
                    // Sembunyikan loading
                    if (loading) {
                        loading.style.display = 'none';
                    }
                    
                    if (totalData > 0) {
                        // Tampilkan canvas
                        ctx.style.display = 'block';
                        
                        const categoriesChart = new Chart(ctx, {
                            type: 'doughnut',
                            data: {
                                labels: ['Makanan', 'Minuman', 'Alat Mandi', 'Pencuci'],
                                datasets: [{
                                    data: [
                                        chartData.makanan,
                                        chartData.minuman,
                                        chartData.alatmandi,
                                        chartData.pencuci
                                    ],
                                    backgroundColor: [
                                        '#28a745',
                                        '#17a2b8', 
                                        '#ffc107',
                                        '#007bff'
                                    ],
                                    borderWidth: 2,
                                    borderColor: '#fff'
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                plugins: {
                                    legend: {
                                        position: 'bottom',
                                        labels: {
                                            padding: 15,
                                            usePointStyle: true,
                                            font: {
                                                size: 12
                                            }
                                        }
                                    },
                                    tooltip: {
                                        callbacks: {
                                            label: function(context) {
                                                const label = context.label || '';
                                                const value = context.parsed;
                                                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                                const percentage = ((value / total) * 100).toFixed(1);
                                                return label + ': ' + value + ' produk (' + percentage + '%)';
                                            }
                                        }
                                    }
                                }
                            }
                        });
                        
                        console.log('Chart created successfully');
                    } else {
                        // Jika tidak ada data, tampilkan pesan
                        ctx.parentElement.innerHTML = '<div class="text-center text-muted py-4"><i class="fas fa-chart-pie fa-3x mb-2"></i><p>Belum ada data untuk ditampilkan</p><small>Tambahkan produk untuk melihat statistik</small></div>';
                    }
                    
                } catch (error) {
                    console.error('Error creating chart:', error);
                    
                    // Sembunyikan loading
                    if (loading) {
                        loading.style.display = 'none';
                    }
                    
                    // Tampilkan pesan error
                    ctx.parentElement.innerHTML = '<div class="text-center text-danger py-4"><i class="fas fa-exclamation-triangle fa-3x mb-2"></i><p>Error memuat chart</p><small>Silakan refresh halaman</small></div>';
                }
            }
            
            // Tunggu sebentar untuk memastikan DOM sudah siap
            setTimeout(createChart, 100);
        });
    </script>
@endsection
