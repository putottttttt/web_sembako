@extends('adminlte::page')

@section('title', 'Detail User')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Detail User</h1>
        <div>
            <a href="{{ route('users.edit', $user) }}" class="btn btn-warning">
                <i class="fas fa-edit"></i> Edit User
            </a>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">
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
                    <h3 class="card-title">Profil User</h3>
                </div>
                <div class="card-body text-center">
                    <div class="user-avatar mb-3">
                        <i class="fas fa-user-circle fa-5x text-muted"></i>
                    </div>
                    <h4>{{ $user->name ?: 'Nama belum diset' }}</h4>
                    <p class="text-muted">{{ $user->email ?: 'Email belum diset' }}</p>
                    <span class="badge badge-{{ $user->role == 'admin' ? 'danger' : 'primary' }} badge-lg">
                        <i class="fas fa-{{ $user->role == 'admin' ? 'user-shield' : 'user' }}"></i>
                        {{ ucfirst($user->role) }}
                    </span>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Status Account</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 mb-2">
                            <span class="badge badge-success">
                                <i class="fas fa-check-circle"></i> Aktif
                            </span>
                        </div>
                        <div class="col-12 mb-2">
                            <small class="text-muted">
                                <i class="fas fa-calendar-alt"></i> 
                                Bergabung: {{ $user->created_at ? $user->created_at->format('d F Y') : '-' }}
                            </small>
                        </div>
                        <div class="col-12">
                            <small class="text-muted">
                                <i class="fas fa-clock"></i> 
                                Last Update: {{ $user->updated_at ? $user->updated_at->format('d F Y, H:i') : '-' }}
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Informasi User</h3>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <th width="150">ID User:</th>
                            <td>{{ $user->id }}</td>
                        </tr>
                        <tr>
                            <th>Nama Lengkap:</th>
                            <td><strong>{{ $user->name ?: 'Nama belum diset' }}</strong></td>
                        </tr>
                        <tr>
                            <th>Username:</th>
                            <td><code>{{ $user->username }}</code></td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td>{{ $user->email ?: 'Email belum diset' }}</td>
                        </tr>
                        <tr>
                            <th>Role:</th>
                            <td>
                                <span class="badge badge-{{ $user->role == 'admin' ? 'danger' : 'primary' }} badge-lg">
                                    <i class="fas fa-{{ $user->role == 'admin' ? 'user-shield' : 'user' }}"></i>
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>Tanggal Bergabung:</th>
                            <td>{{ $user->created_at ? $user->created_at->format('d F Y, H:i') : '-' }}</td>
                        </tr>
                        <tr>
                            <th>Terakhir Diupdate:</th>
                            <td>{{ $user->updated_at ? $user->updated_at->format('d F Y, H:i') : '-' }}</td>
                        </tr>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{ route('users.edit', $user) }}" class="btn btn-warning btn-block">
                                <i class="fas fa-edit"></i> Edit User
                            </a>
                        </div>
                        <div class="col-md-6">
                            @if(!($user->role === 'admin' && \App\Models\User::where('role', 'admin')->count() <= 1))
                                <form action="{{ route('users.destroy', $user) }}" 
                                      method="POST" 
                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-block">
                                        <i class="fas fa-trash"></i> Hapus User
                                    </button>
                                </form>
                            @else
                                <button class="btn btn-secondary btn-block" disabled>
                                    <i class="fas fa-lock"></i> Admin Terakhir
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Aktivitas Recent</h3>
                </div>
                <div class="card-body">
                    <div class="timeline">
                        <div class="time-label">
                            <span class="bg-green">{{ now()->format('d M Y') }}</span>
                        </div>
                        <div>
                            <i class="fas fa-user bg-blue"></i>
                            <div class="timeline-item">
                                <span class="time"><i class="fas fa-clock"></i> {{ $user->created_at ? $user->created_at->format('H:i') : '-' }}</span>
                                <h3 class="timeline-header">User terdaftar</h3>
                                <div class="timeline-body">
                                    User bergabung dengan role {{ $user->role }}
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
@endsection

@section('css')
    <style>
        .badge-lg {
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
        }
        .user-avatar {
            margin-bottom: 1rem;
        }
        .timeline > div > .timeline-item {
            margin-left: 0;
        }
    </style>
@endsection
