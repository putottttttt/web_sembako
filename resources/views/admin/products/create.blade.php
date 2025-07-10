@extends('adminlte::page')

@section('title', 'Tambah Produk')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Tambah Produk Baru</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Produk</a></li>
                <li class="breadcrumb-item active">Tambah</li>
            </ol>
        </nav>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-plus-circle"></i> Form Tambah Produk
                    </h3>
                </div>
                
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <h5><i class="icon fas fa-ban"></i> Error!</h5>
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="nama">Nama Produk <span class="text-danger">*</span></label>
                            <input type="text" 
                                   class="form-control @error('nama') is-invalid @enderror" 
                                   id="nama" 
                                   name="nama" 
                                   value="{{ old('nama') }}" 
                                   placeholder="Masukkan nama produk"
                                   required>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="kategori">Kategori <span class="text-danger">*</span></label>
                            <select class="form-control @error('kategori') is-invalid @enderror" 
                                    id="kategori" 
                                    name="kategori" 
                                    required>
                                <option value="">-- Pilih Kategori --</option>
                                <option value="makanan" {{ old('kategori') == 'makanan' ? 'selected' : '' }}>
                                    <i class="fas fa-utensils"></i> Makanan
                                </option>
                                <option value="minuman" {{ old('kategori') == 'minuman' ? 'selected' : '' }}>
                                    <i class="fas fa-coffee"></i> Minuman
                                </option>
                                <option value="alatmandi" {{ old('kategori') == 'alatmandi' ? 'selected' : '' }}>
                                    <i class="fas fa-bath"></i> Alat Mandi
                                </option>
                                <option value="pencuci" {{ old('kategori') == 'pencuci' ? 'selected' : '' }}>
                                    <i class="fas fa-broom"></i> Pencuci
                                </option>
                            </select>
                            @error('kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="harga">Harga (Rp) <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input type="number" 
                                       class="form-control @error('harga') is-invalid @enderror" 
                                       id="harga" 
                                       name="harga" 
                                       value="{{ old('harga') }}" 
                                       placeholder="0"
                                       min="0"
                                       step="100"
                                       required>
                                @error('harga')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <small class="form-text text-muted">Masukkan harga dalam rupiah</small>
                        </div>

                        <div class="form-group">
                            <label for="gambar">Gambar Produk</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" 
                                           class="custom-file-input @error('gambar') is-invalid @enderror" 
                                           id="gambar" 
                                           name="gambar"
                                           accept="image/*">
                                    <label class="custom-file-label" for="gambar">Pilih gambar...</label>
                                </div>
                                @error('gambar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <small class="form-text text-muted">
                                Format yang didukung: JPG, JPEG, PNG, GIF. Maksimal 2MB.
                            </small>
                            
                            <div id="image-preview" class="mt-3" style="display: none;">
                                <img id="preview-img" src="" alt="Preview" class="img-thumbnail" style="max-width: 200px; max-height: 200px;">
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan Produk
                        </button>
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-info-circle"></i> Panduan
                    </h3>
                </div>
                <div class="card-body">
                    <h6><i class="fas fa-lightbulb text-warning"></i> Tips Menambah Produk:</h6>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-check text-success"></i> Gunakan nama produk yang jelas dan deskriptif</li>
                        <li><i class="fas fa-check text-success"></i> Pilih kategori yang sesuai</li>
                        <li><i class="fas fa-check text-success"></i> Pastikan harga sudah benar</li>
                        <li><i class="fas fa-check text-success"></i> Upload gambar berkualitas baik</li>
                    </ul>
                    
                    <hr>
                    
                    <h6><i class="fas fa-tags text-info"></i> Kategori Tersedia:</h6>
                    <div class="d-flex flex-wrap">
                        <span class="badge badge-success mr-1 mb-1">Makanan</span>
                        <span class="badge badge-info mr-1 mb-1">Minuman</span>
                        <span class="badge badge-warning mr-1 mb-1">Alat Mandi</span>
                        <span class="badge badge-primary mr-1 mb-1">Pencuci</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <style>
        .card {
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }
        .form-group label {
            font-weight: 600;
        }
        .breadcrumb {
            background: transparent;
            padding: 0;
            margin: 0;
        }
        #image-preview {
            border: 2px dashed #dee2e6;
            border-radius: 0.375rem;
            padding: 1rem;
            text-align: center;
        }
    </style>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            // File input label update
            $('.custom-file-input').on('change', function() {
                let fileName = $(this).val().split('\\').pop();
                $(this).next('.custom-file-label').addClass("selected").html(fileName);
                
                // Show image preview
                if (this.files && this.files[0]) {
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        $('#preview-img').attr('src', e.target.result);
                        $('#image-preview').show();
                    };
                    reader.readAsDataURL(this.files[0]);
                }
            });
            
            // Format harga input
            $('#harga').on('input', function() {
                let value = $(this).val();
                if (value) {
                    // Remove any non-digit characters
                    value = value.replace(/\D/g, '');
                    $(this).val(value);
                }
            });
            
            // Category icons
            $('#kategori').on('change', function() {
                let selected = $(this).val();
                let icons = {
                    'makanan': 'fas fa-utensils',
                    'minuman': 'fas fa-coffee', 
                    'alatmandi': 'fas fa-bath',
                    'pencuci': 'fas fa-broom'
                };
                
                if (selected && icons[selected]) {
                    console.log('Selected category:', selected);
                }
            });
        });
    </script>
@endsection
