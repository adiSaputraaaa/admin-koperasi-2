# Koperasi App - Laravel (Backend) + Next.js (Frontend)

Ini adalah project sistem koperasi yang dibangun menggunakan Laravel untuk backend dan Next.js untuk frontend.

---

## 📁 Struktur Proyek

```
project-root/
├── admin-koperasi/     # Laravel Backend
└── admin/              # Next.js Frontend
```

---

## 🚀 Cara Menjalankan Proyek

### 🯩 Backend - Laravel

> 📁 Masuk ke direktori backend Laravel:

```bash
cd admin-koperasi
```

#### 1. 📦 Install Dependency

```bash
composer install
```

#### 2. 🔑 Salin dan Konfigurasi `.env`

```bash
cp .env.example .env
```

Lalu buka `.env` dan sesuaikan konfigurasi database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=root
DB_PASSWORD=
```

#### 3. 🔐 Generate APP Key

```bash
php artisan key:generate
```

#### 4. 🧱 Jalankan Migrasi dan Seeder

```bash
php artisan migrate --seed
```

#### 5. ▶️ Jalankan Server Laravel

```bash
php artisan serve
```

Backend Laravel akan berjalan di:

```
http://127.0.0.1:8000
```

---

### 💻 Frontend - Next.js

> 📁 Masuk ke direktori frontend:

```bash
cd ../admin
```

#### 1. 📦 Install Dependency

```bash
npm install
```

#### 2. ⚙️ Konfigurasi Environment (Opsional)

Jika dibutuhkan, salin file `.env.example`:

```bash
cp .env.example .env.local
```

Lalu sesuaikan API endpoint backend:

```env
NEXT_PUBLIC_API_URL=http://127.0.0.1:8000
```

#### 3. ▶️ Jalankan Server Next.js

```bash
npm run dev
```

Frontend akan berjalan di:

```
http://localhost:3000
```

---

## 🔗 Integrasi API

Pastikan Next.js mengakses API Laravel dengan benar, contohnya:

```js
axios.get(`${process.env.NEXT_PUBLIC_API_URL}/api/endpoint`)
```

Untuk memperbolehkan akses dari frontend, pastikan CORS di Laravel (`config/cors.php`) seperti berikut:

```php
'paths' => ['api/*'],
'allowed_origins' => ['http://localhost:3000'],
```

---

## 🏁 Penutup

Setelah mengikuti langkah-langkah di atas:

* ✅ Laravel berjalan di `http://127.0.0.1:8000`
* ✅ Next.js berjalan di `http://localhost:3000`

Salam ! 🚀
