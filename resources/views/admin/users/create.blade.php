@extends('adminlte::page')

@section('title', 'Tambah Pengguna')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Tambah Pengguna Baru</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Pengguna</a></li>
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
                        <i class="fas fa-user-plus"></i> Form Tambah Pengguna
                    </h3>
                </div>
                
                <form action="{{ route('users.store') }}" method="POST">
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
                            <label for="name">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name') }}" 
                                   placeholder="Masukkan nama lengkap"
                                   required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="username">Username <span class="text-danger">*</span></label>
                            <input type="text" 
                                   class="form-control @error('username') is-invalid @enderror" 
                                   id="username" 
                                   name="username" 
                                   value="{{ old('username') }}" 
                                   placeholder="Masukkan username"
                                   required>
                            @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Username harus unik dan akan digunakan untuk login</small>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   id="email" 
                                   name="email" 
                                   value="{{ old('email') }}" 
                                   placeholder="Masukkan email (opsional)">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Email bersifat opsional</small>
                        </div>

                        <div class="form-group">
                            <label for="role">Role <span class="text-danger">*</span></label>
                            <select class="form-control @error('role') is-invalid @enderror" 
                                    id="role" 
                                    name="role" 
                                    required>
                                <option value="">-- Pilih Role --</option>
                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>
                                    <i class="fas fa-user-shield"></i> Admin
                                </option>
                                <option value="client" {{ old('role') == 'client' ? 'selected' : '' }}>
                                    <i class="fas fa-user"></i> Client
                                </option>
                            </select>
                            @error('role')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Password <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="password" 
                                       class="form-control @error('password') is-invalid @enderror" 
                                       id="password" 
                                       name="password" 
                                       placeholder="Masukkan password"
                                       required>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <small class="form-text text-muted">Password minimal 6 karakter</small>
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Konfirmasi Password <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="password" 
                                       class="form-control" 
                                       id="password_confirmation" 
                                       name="password_confirmation" 
                                       placeholder="Konfirmasi password"
                                       required>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" id="togglePasswordConfirmation">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Simpan Pengguna
                        </button>
                        <a href="{{ route('users.index') }}" class="btn btn-secondary">
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
                    <h6><i class="fas fa-users text-primary"></i> Role Pengguna:</h6>
                    <div class="mb-3">
                        <span class="badge badge-danger mb-2">
                            <i class="fas fa-user-shield"></i> Admin
                        </span>
                        <ul class="list-unstyled small">
                            <li><i class="fas fa-check text-success"></i> Kelola produk</li>
                            <li><i class="fas fa-check text-success"></i> Kelola pengguna</li>
                            <li><i class="fas fa-check text-success"></i> Akses dashboard</li>
                        </ul>
                    </div>
                    
                    <div class="mb-3">
                        <span class="badge badge-primary mb-2">
                            <i class="fas fa-user"></i> Client
                        </span>
                        <ul class="list-unstyled small">
                            <li><i class="fas fa-check text-success"></i> Lihat produk</li>
                            <li><i class="fas fa-check text-success"></i> Beli produk</li>
                            <li><i class="fas fa-check text-success"></i> Kelola keranjang</li>
                        </ul>
                    </div>
                    
                    <hr>
                    
                    <h6><i class="fas fa-lock text-warning"></i> Keamanan:</h6>
                    <ul class="list-unstyled small">
                        <li><i class="fas fa-check text-success"></i> Password akan dienkripsi</li>
                        <li><i class="fas fa-check text-success"></i> Username harus unik</li>
                        <li><i class="fas fa-check text-success"></i> Email boleh kosong</li>
                    </ul>
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
    </style>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            // Toggle password visibility
            $('#togglePassword').click(function() {
                let input = $('#password');
                let icon = $(this).find('i');
                
                if (input.attr('type') === 'password') {
                    input.attr('type', 'text');
                    icon.removeClass('fa-eye').addClass('fa-eye-slash');
                } else {
                    input.attr('type', 'password');
                    icon.removeClass('fa-eye-slash').addClass('fa-eye');
                }
            });
            
            $('#togglePasswordConfirmation').click(function() {
                let input = $('#password_confirmation');
                let icon = $(this).find('i');
                
                if (input.attr('type') === 'password') {
                    input.attr('type', 'text');
                    icon.removeClass('fa-eye').addClass('fa-eye-slash');
                } else {
                    input.attr('type', 'password');
                    icon.removeClass('fa-eye-slash').addClass('fa-eye');
                }
            });
            
            // Username formatting
            $('#username').on('input', function() {
                let value = $(this).val();
                // Remove spaces and convert to lowercase
                value = value.toLowerCase().replace(/\s+/g, '');
                $(this).val(value);
            });
        });
    </script>
@endsection
