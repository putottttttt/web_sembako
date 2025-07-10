@extends('adminlte::page')

@section('title', 'Edit Produk')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Edit Produk: {{ $product->nama }}</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Produk</a></li>
                <li class="breadcrumb-item active">Edit</li>
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
                        <i class="fas fa-edit"></i> Form Edit Produk
                    </h3>
                </div>
                
                <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
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
                                   value="{{ old('nama', $product->nama) }}" 
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
                                <option value="makanan" {{ old('kategori', $product->kategori) == 'makanan' ? 'selected' : '' }}>
                                    Makanan
                                </option>
                                <option value="minuman" {{ old('kategori', $product->kategori) == 'minuman' ? 'selected' : '' }}>
                                    Minuman
                                </option>
                                <option value="alatmandi" {{ old('kategori', $product->kategori) == 'alatmandi' ? 'selected' : '' }}>
                                    Alat Mandi
                                </option>
                                <option value="pencuci" {{ old('kategori', $product->kategori) == 'pencuci' ? 'selected' : '' }}>
                                    Pencuci
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
                                       value="{{ old('harga', $product->harga) }}" 
                                       placeholder="0"
                                       min="0"
                                       step="100"
                                       required>
                                @error('harga')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
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
                                    <label class="custom-file-label" for="gambar">Pilih gambar baru...</label>
                                </div>
                                @error('gambar')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <small class="form-text text-muted">
                                Kosongkan jika tidak ingin mengubah gambar. Format: JPG, JPEG, PNG, GIF. Maksimal 2MB.
                            </small>
                            
                            @if($product->gambar)
                            <div class="mt-3">
                                <label class="form-label">Gambar Saat Ini:</label>
                                <div class="current-image">
                                    <img src="{{ asset('img/' . $product->gambar) }}" 
                                         alt="{{ $product->nama }}" 
                                         class="img-thumbnail" 
                                         style="max-width: 200px; max-height: 200px; object-fit: cover;">
                                    <p class="text-muted small mt-2">{{ $product->gambar }}</p>
                                </div>
                            </div>
                            @endif
                            
                            <div id="image-preview" class="mt-3" style="display: none;">
                                <label class="form-label">Preview Gambar Baru:</label>
                                <div>
                                    <img id="preview-img" src="" alt="Preview" class="img-thumbnail" style="max-width: 200px; max-height: 200px;">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Update Produk
                        </button>
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                        <a href="{{ route('products.create') }}" class="btn btn-success">
                            <i class="fas fa-plus"></i> Tambah Produk Baru
                        </a>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-info-circle"></i> Informasi Produk
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-sm">
                        <tr>
                            <td><strong>ID Produk:</strong></td>
                            <td>{{ $product->id }}</td>
                        </tr>
                        <tr>
                            <td><strong>Dibuat:</strong></td>
                            <td>{{ $product->created_at ? $product->created_at->format('d/m/Y H:i') : '-' }}</td>
                        </tr>
                        <tr>
                            <td><strong>Diupdate:</strong></td>
                            <td>{{ $product->updated_at ? $product->updated_at->format('d/m/Y H:i') : '-' }}</td>
                        </tr>
                        <tr>
                            <td><strong>Kategori:</strong></td>
                            <td>
                                <span class="badge badge-{{ $product->kategori == 'makanan' ? 'success' : ($product->kategori == 'minuman' ? 'info' : ($product->kategori == 'alatmandi' ? 'warning' : 'primary')) }}">
                                    {{ ucfirst($product->kategori) }}
                                </span>
                            </td>
                        </tr>
                    </table>
                    
                    <hr>
                    
                    <h6><i class="fas fa-exclamation-triangle text-warning"></i> Perhatian:</h6>
                    <ul class="list-unstyled small">
                        <li><i class="fas fa-check text-success"></i> Pastikan data sudah benar sebelum menyimpan</li>
                        <li><i class="fas fa-check text-success"></i> Gambar akan menggantikan gambar lama jika diupload</li>
                        <li><i class="fas fa-check text-success"></i> Perubahan akan langsung terlihat di website</li>
                    </ul>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-cogs"></i> Aksi Cepat
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('products.destroy', $product->id) }}" 
                          method="POST" 
                          onsubmit="return confirm('PERINGATAN: Apakah Anda yakin ingin menghapus produk ini? Tindakan ini tidak dapat dibatalkan!')">
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
        .current-image, #image-preview {
            border: 2px dashed #dee2e6;
            border-radius: 0.375rem;
            padding: 1rem;
            text-align: center;
        }
        .table td {
            border-top: none;
            padding: 0.5rem 0;
        }
    </style>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            // File input label update
            $('.custom-file-input').on('change', function() {
                let fileName = $(this).val().split('\\').pop();
                $(this).next('.custom-file-label').addClass("selected").html(fileName || 'Pilih gambar baru...');
                
                // Show image preview
                if (this.files && this.files[0]) {
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        $('#preview-img').attr('src', e.target.result);
                        $('#image-preview').show();
                    };
                    reader.readAsDataURL(this.files[0]);
                } else {
                    $('#image-preview').hide();
                }
            });
            
            // Format harga input
            $('#harga').on('input', function() {
                let value = $(this).val();
                if (value) {
                    // Remove any non-digit characters except for the value itself
                    value = value.replace(/\D/g, '');
                    $(this).val(value);
                }
            });
        });
    </script>
@endsection
