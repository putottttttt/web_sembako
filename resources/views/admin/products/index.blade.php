@extends('adminlte::page')

@section('title', 'Kelola Produk')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Daftar Produk</h1>
        <div>
            <a href="{{ route('admin.export.products') }}" class="btn btn-success">
                <i class="fas fa-file-excel"></i> Export Excel
            </a>
            <a href="{{ route('products.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Produk
            </a>
        </div>
    </div>
@endsection

@section('content')
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-boxes"></i> Daftar Semua Produk
            </h3>
        </div>
        
        <!-- Filter dan Search -->
        <div class="card-body border-bottom">
            <form method="GET" action="{{ route('products.index') }}">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="search">Cari Produk:</label>
                            <input type="text" 
                                   name="search" 
                                   id="search"
                                   class="form-control" 
                                   placeholder="Cari nama produk..."
                                   value="{{ request('search') }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="kategori">Filter Kategori:</label>
                            <select name="kategori" id="kategori" class="form-control">
                                <option value="">Semua Kategori</option>
                                <option value="makanan" {{ request('kategori') == 'makanan' ? 'selected' : '' }}>Makanan</option>
                                <option value="minuman" {{ request('kategori') == 'minuman' ? 'selected' : '' }}>Minuman</option>
                                <option value="alatmandi" {{ request('kategori') == 'alatmandi' ? 'selected' : '' }}>Alat Mandi</option>
                                <option value="pencuci" {{ request('kategori') == 'pencuci' ? 'selected' : '' }}>Pencuci</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="sort">Urutkan:</label>
                            <select name="sort" id="sort" class="form-control">
                                <option value="">Terbaru</option>
                                <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Nama A-Z</option>
                                <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Nama Z-A</option>
                                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Harga Terendah</option>
                                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Harga Tertinggi</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>&nbsp;</label>
                            <div class="d-flex">
                                <button type="submit" class="btn btn-primary mr-2">
                                    <i class="fas fa-search"></i> Cari
                                </button>
                                <a href="{{ route('products.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-times"></i> Reset
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Gambar</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>
                            @if ($product->gambar)
                                <img src="{{ asset('img/' . $product->gambar) }}" 
                                     alt="{{ $product->nama }}" 
                                     class="img-thumbnail" 
                                     style="width: 60px; height: 60px; object-fit: cover;">
                            @else
                                <div class="bg-light d-flex align-items-center justify-content-center" 
                                     style="width: 60px; height: 60px; border-radius: 4px;">
                                    <i class="fas fa-image text-muted"></i>
                                </div>
                            @endif
                        </td>
                        <td>
                            <strong>{{ $product->nama }}</strong>
                        </td>
                        <td>
                            <span class="badge badge-{{ $product->kategori == 'makanan' ? 'success' : ($product->kategori == 'minuman' ? 'info' : ($product->kategori == 'alatmandi' ? 'warning' : 'primary')) }}">
                                {{ ucfirst($product->kategori) }}
                            </span>
                        </td>
                        <td>
                            <strong class="text-success">Rp {{ number_format($product->harga, 0, ',', '.') }}</strong>
                        </td>
                        <td>
                            <small class="text-muted">
                                @if($product->created_at)
                                    {{ $product->created_at->format('d/m/Y') }}
                                @else
                                    ID: {{ $product->id }}
                                @endif
                            </small>
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('products.show', $product->id) }}" 
                                   class="btn btn-sm btn-info" 
                                   title="Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('products.edit', $product->id) }}" 
                                   class="btn btn-sm btn-warning" 
                                   title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('products.destroy', $product->id) }}" 
                                      method="POST" 
                                      class="d-inline"
                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn btn-sm btn-danger" 
                                            title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4">
                            <div class="text-muted">
                                @if(request('search') || request('kategori'))
                                    <i class="fas fa-search fa-2x mb-2"></i>
                                    <p>Tidak ada produk yang sesuai dengan pencarian Anda</p>
                                    @if(request('search'))
                                        <p><strong>Kata kunci:</strong> "{{ request('search') }}"</p>
                                    @endif
                                    @if(request('kategori'))
                                        <p><strong>Kategori:</strong> {{ ucfirst(request('kategori')) }}</p>
                                    @endif
                                    <a href="{{ route('products.index') }}" class="btn btn-secondary">
                                        <i class="fas fa-times"></i> Hapus Filter
                                    </a>
                                @else
                                    <i class="fas fa-box-open fa-2x mb-2"></i>
                                    <p>Belum ada produk tersedia</p>
                                    <a href="{{ route('products.create') }}" class="btn btn-primary">
                                        <i class="fas fa-plus"></i> Tambah Produk Pertama
                                    </a>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($products->hasPages())
        <div class="card-footer clearfix">
            <div class="float-left">
                <small class="text-muted">
                    <i class="fas fa-info-circle"></i>
                    Menampilkan {{ $products->firstItem() ?? 0 }} sampai {{ $products->lastItem() ?? 0 }} 
                    dari {{ $products->total() }} produk
                    @if(request('search'))
                        <span class="badge badge-info ml-1">Pencarian: "{{ request('search') }}"</span>
                    @endif
                    @if(request('kategori'))
                        <span class="badge badge-secondary ml-1">Kategori: {{ ucfirst(request('kategori')) }}</span>
                    @endif
                </small>
            </div>
            <div class="float-right">
                {{ $products->appends(request()->query())->links('pagination::bootstrap-4') }}
            </div>
        </div>
        @elseif($products->count() > 0)
        <div class="card-footer">
            <small class="text-muted">
                <i class="fas fa-check-circle text-success"></i>
                Total {{ $products->count() }} produk ditemukan
                @if(request('search'))
                    <span class="badge badge-info ml-1">Pencarian: "{{ request('search') }}"</span>
                @endif
                @if(request('kategori'))
                    <span class="badge badge-secondary ml-1">Kategori: {{ ucfirst(request('kategori')) }}</span>
                @endif
            </small>
        </div>
        @endif
    </div>
@endsection

@section('css')
    <style>
        .table th {
            background-color: #f8f9fa;
            border-top: none;
        }
        .card-header {
            background-color: #fff;
            border-bottom: 1px solid #dee2e6;
        }
        .btn-group .btn {
            margin-right: 2px;
        }
        .btn-group .btn:last-child {
            margin-right: 0;
        }
        
        /* Pagination Styles */
        .pagination {
            margin-bottom: 0;
        }
        .pagination .page-link {
            color: #007bff;
            border: 1px solid #dee2e6;
            padding: 0.5rem 0.75rem;
        }
        .pagination .page-link:hover {
            color: #0056b3;
            background-color: #e9ecef;
        }
        .pagination .page-item.active .page-link {
            background-color: #007bff;
            border-color: #007bff;
        }
        .pagination .page-item.disabled .page-link {
            color: #6c757d;
            background-color: #fff;
            border-color: #dee2e6;
        }
        
        /* Card footer */
        .card-footer {
            background-color: #f8f9fa;
            border-top: 1px solid #dee2e6;
        }
    </style>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            // Auto hide alerts after 5 seconds
            setTimeout(function() {
                $('.alert').fadeOut('slow');
            }, 5000);
            
            // Search functionality
            $('input[name="table_search"]').on('keyup', function() {
                var value = $(this).val().toLowerCase();
                $('table tbody tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
@endsection
