# 🔐 CREDENTIAL ADMIN TOKO PUTRA SUGEMA

## 👨‍💼 **DAFTAR ADMIN YANG TERSEDIA**

### **1. Admin Utama**

-   **Username**: `admin`
-   **Password**: `admin123` ✅ (Verified)
-   **Nama**: Admin
-   **Email**: admin@example.com
-   **Status**: ✅ Aktif

### **2. Super Admin**

-   **Username**: `superadmin`
-   **Password**: `super123` ✅ (Verified)
-   **Nama**: Super Admin
-   **Email**: superadmin@tokosembako.com
-   **Status**: ✅ Aktif

### **3. Manager Toko**

-   **Username**: `manager`
-   **Password**: `manager123`
-   **Nama**: Manager Toko
-   **Email**: manager@tokosembako.com
-   **Status**: ✅ Aktif

### **4. Admin Putra**

-   **Username**: `adminputra`
-   **Password**: `putra123`
-   **Nama**: Admin Putra
-   **Email**: adminputra@tokosembako.com
-   **Status**: ✅ Aktif

### **5. Test Admin**

-   **Username**: `testadmin`
-   **Password**: `test123`
-   **Nama**: Test Admin
-   **Email**: testadmin@example.com
-   **Status**: ✅ Aktif

---

## 🛠️ **CARA MEMBUAT ADMIN BARU**

### **Menggunakan Command Artisan:**

```bash
php artisan admin:create [username] [password] --name="Nama Lengkap" --email="email@domain.com"
```

### **Contoh:**

```bash
# Basic (nama dan email otomatis)
php artisan admin:create newadmin password123

# Lengkap dengan opsi
php artisan admin:create johndoe secret123 --name="John Doe" --email="john@company.com"
```

### **Menggunakan Seeder:**

1. Buat seeder baru: `php artisan make:seeder [NamaSeeder]`
2. Edit file seeder di `database/seeders/`
3. Jalankan: `php artisan db:seed --class=[NamaSeeder]`

---

## 🔑 **AKSES ADMIN DASHBOARD**

**URL Dashboard**: `http://localhost:8000/admin`

**Fitur yang Tersedia:**

-   ✅ Dashboard dengan statistik
-   ✅ Kelola Produk (CRUD)
-   ✅ Kelola Pengguna (CRUD)
-   ✅ Export data ke Excel/CSV
-   ✅ Upload gambar produk
-   ✅ Pencarian & filter
-   ✅ Responsive design

---

## 🔒 **KEAMANAN**

-   **Role-based Access**: Hanya admin yang bisa akses dashboard
-   **Password Hashing**: Semua password di-hash dengan bcrypt
-   **Session Management**: Auto logout jika tidak aktif
-   **CSRF Protection**: Proteksi dari serangan CSRF
-   **Middleware Protection**: AdminMiddleware melindungi route admin

---

## 👤 **CLIENT CREDENTIAL**

### **Client User**

-   **Username**: `client`
-   **Password**: `client123`
-   **Nama**: Client User
-   **Email**: client@example.com
-   **Role**: client
-   **Akses**: Halaman toko di `http://localhost:8000/index`

---

## 📱 **CARA LOGIN**

1. **Buka**: `http://localhost:8000`
2. **Klik**: "Login sebagai Admin" atau "Login sebagai Client"
3. **Masukkan**: Username, Password, dan pilih Role
4. **Hasil**: Auto redirect ke dashboard sesuai role

---

## 🚀 **TIPS PENGGUNAAN**

-   **Multi Admin**: Semua admin memiliki akses yang sama
-   **Unique Username**: Setiap username harus unik
-   **Strong Password**: Gunakan password yang kuat untuk keamanan
-   **Email Valid**: Gunakan email yang valid untuk notifikasi
-   **Regular Update**: Update password secara berkala

---

**🎉 Selamat menggunakan sistem admin Toko Putra Sugema!**
