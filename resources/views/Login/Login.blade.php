<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login Toko Sembako</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

  <style>
    body {
      background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .login-card {
      background: #fff;
      border-radius: 1rem;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
      max-width: 400px;
      width: 100%;
      padding: 2rem;
      animation: fadeInUp 0.7s ease forwards;
    }
    @keyframes fadeInUp {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    .form-control:focus {
      box-shadow: 0 0 5px #7f8ff4;
      border-color: #7f8ff4;
    }
    .btn-primary {
      background: #7f8ff4;
      border: none;
      transition: background 0.3s ease;
    }
    .btn-primary:hover {
      background: #5a6bda;
    }
    .login-header {
      font-weight: 700;
      margin-bottom: 1.5rem;
      text-align: center;
      color: #333;
      letter-spacing: 1px;
    }
    .input-group-text {
      background: #7f8ff4;
      border: none;
      color: white;
    }
    .footer-text {
      text-align: center;
      margin-top: 1.2rem;
      font-size: 0.95rem;
    }
    .footer-text a {
      color: #7f8ff4;
      text-decoration: none;
      font-weight: 600;
    }
    .footer-text a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <div class="login-card shadow-sm">
    <h2 class="login-header">Login Toko Sembako</h2>

    <form method="POST" action="{{ route('login') }}">
      @csrf

      <!-- Username -->
      <div class="mb-4">
        <label for="username" class="form-label">Username</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
          <input
            type="text"
            class="form-control @error('username') is-invalid @enderror"
            id="username"
            name="username"
            placeholder="Masukkan username"
            value="{{ old('username') }}"
            required
            autofocus
            autocomplete="username"
          />
          @error('username')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
      </div>

      <!-- Password -->
      <div class="mb-4">
        <label for="password" class="form-label">Password</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
          <input
            type="password"
            class="form-control @error('password') is-invalid @enderror"
            id="password"
            name="password"
            placeholder="Masukkan password"
            required
            autocomplete="current-password"
          />
          @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
      </div>

      <!-- Role -->
      <div class="mb-4">
        <label for="role" class="form-label">Masuk Sebagai</label>
        <select
          id="role"
          name="role"
          class="form-select @error('role') is-invalid @enderror"
          required
        >
          <option value="" disabled {{ old('role') ? '' : 'selected' }}>Pilih role</option>
          <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
          <option value="client" {{ old('role') == 'client' ? 'selected' : '' }}>Client</option>
        </select>
        @error('role')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <!-- Remember Me -->
      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="remember" name="remember" />
        <label class="form-check-label" for="remember">Ingat saya</label>
      </div>

      <button type="submit" class="btn btn-primary w-100 py-2 fs-5">Login</button>
    </form>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
