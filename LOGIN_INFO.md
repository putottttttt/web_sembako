# 🛍️ TOKO PUTRA SUGEMA - SISTEM ADMIN & CLIENT

## 📋 INFORMASI LOGIN

### 👨‍💼 LOGIN SEBAGAI ADMIN

#### **Admin Utama:**

-   **Username**: `admin`
-   **Password**: `admin123`
-   **Role**: `admin`

#### **Super Admin:**

-   **Username**: `superadmin`
-   **Password**: `super123`
-   **Role**: `admin`

#### **Manager Toko:**

-   **Username**: `manager`
-   **Password**: `manager123`
-   **Role**: `admin`

#### **Admin Putra:**

-   **Username**: `adminputra`
-   **Password**: `putra123`
-   **Role**: `admin`

**Semua admin memiliki akses penuh ke**: `http://localhost:8000/admin`

### 👤 LOGIN SEBAGAI CLIENT

-   **Username**: `client`
-   **Password**: `client123`
-   **Role**: `client`
-   **URL**: `http://localhost:8000/index`

## 🚀 CARA MENJALANKAN APLIKASI

1. **Clone & Setup**

    ```bash
    composer install
    npm install
    cp .env.example .env
    php artisan key:generate
    ```

2. **Database Setup**

    ```bash
    php artisan migrate
    php artisan db:seed
    ```

3. **Jalankan Server**

    ```bash
    php artisan serve
    ```

4. **Akses Aplikasi**
    - **Homepage**: `http://localhost:8000`
    - **Login**: `http://localhost:8000/login`
    - **Admin Dashboard**: `http://localhost:8000/admin`

## 🔐 FITUR KEAMANAN

-   **Auto Redirect**: Setelah login, pengguna akan otomatis diarahkan ke dashboard sesuai role
-   **Admin Protection**: Halaman admin hanya bisa diakses oleh pengguna dengan role admin
-   **Session Management**: Sistem logout yang aman
-   **Role-based Access**: Kontrol akses berdasarkan peran pengguna

## 📊 FITUR ADMIN DASHBOARD

-   ✅ **Dashboard Statistik**: Total produk, pengguna, chart kategori
-   ✅ **Kelola Produk**: CRUD, search, filter, export
-   ✅ **Kelola Pengguna**: CRUD, search, filter, export
-   ✅ **Upload Gambar**: Fitur upload gambar produk
-   ✅ **Export Data**: Download data dalam format CSV
-   ✅ **Responsive Design**: Support mobile dan desktop

## 🛒 FITUR CLIENT

-   ✅ **Katalog Produk**: Browse produk berdasarkan kategori
-   ✅ **Keranjang Belanja**: Tambah produk ke keranjang
-   ✅ **Checkout**: Proses pembelian
-   ✅ **User-Friendly**: Interface yang mudah digunakan

## 🔧 TEKNOLOGI

-   **Backend**: Laravel 10
-   **Frontend**: AdminLTE, Bootstrap
-   **Database**: MySQL
-   **Authentication**: Laravel Auth
-   **Charts**: Chart.js
-   **Icons**: Font Awesome

## 👥 KONTRIBUTOR

-   **Developer**: AI Assistant
-   **Project**: Toko Sembako Digital
-   **Version**: 1.0.0

## 🔧 TROUBLESHOOTING LOGIN ADMIN

### ✅ Masalah Berhasil Diperbaiki:

#### **1. Password Admin Tidak Cocok**

-   **Problem**: Password admin di database tidak sesuai dengan yang ada di dokumentasi
-   **Solution**: Reset password admin menggunakan command:
    ```bash
    php artisan admin:reset-password admin admin123
    ```

#### **2. Error SQL: Column 'created_at' not found**

-   **Problem**: Tabel users tidak memiliki kolom created_at/updated_at
-   **Solution**:
    -   Mengganti `->latest()` dengan `->orderBy('id', 'desc')` di UserController
    -   Mengganti `->latest()` dengan `->orderBy('id', 'desc')` di AdminController
    -   Model User sudah menggunakan `public $timestamps = false;`

#### **3. Command Debug yang Tersedia**

```bash
# Reset password admin
php artisan admin:reset-password {username} {password}

# Debug user login
php artisan debug:user-login {username}

# Lihat daftar admin
php artisan admin:list

# Cek kolom tabel users
php artisan debug:users-columns
```

### 🎯 Status Saat Ini:

-   ✅ Password admin sudah benar
-   ✅ Error SQL sudah diperbaiki
-   ✅ Login admin sudah berfungsi
-   ✅ Dashboard admin dapat diakses

### 🔗 Link Akses:

-   **Server**: http://127.0.0.1:8000
-   **Login**: http://127.0.0.1:8000/login
-   **Admin**: http://127.0.0.1:8000/admin

---

**Selamat menggunakan sistem manajemen toko sembako! 🎉**
