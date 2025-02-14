# README - Aplikasi Buku Laravel

## 📌 Informasi Diri
Nama: Nurhalim Habibie  
Pendidikan: Pendidikan Teknologi Informasi Universitas Islam Negeri Ar-Raniry  
Fokus: Pengembangan Web Backend menggunakan Laravel  

## 🎯 Deskripsi Proyek
Aplikasi ini adalah web sederhana untuk mencatat daftar buku. Fitur utama meliputi:
- Menampilkan daftar buku di halaman utama
- Autentikasi pengguna (hanya pengguna terdaftar yang dapat menambah, mengedit, dan menghapus buku)
- Penggunaan Laravel untuk backend dan Blade untuk tampilan

---

## 🚀 Tahapan Instalasi & Konfigurasi

### **1. Persiapan & Instalasi Laravel**

1. Pastikan Anda telah menginstal **PHP (>=8.1), Composer, dan Laravel**.
2. Buat proyek Laravel baru:
   ```sh
   composer create-project laravel/laravel books-app
   ```
3. Masuk ke direktori proyek:
   ```sh
   cd books-app
   ```
4. Jalankan server Laravel untuk memastikan instalasi berhasil:
   ```sh
   php artisan serve
   ```

### **2. Konfigurasi Database**

1. Buat database baru di MySQL atau PostgreSQL.
2. Edit file `.env` dan sesuaikan koneksi database:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=buku-web
   DB_USERNAME=root
   DB_PASSWORD=
   ```
3. Jalankan migrasi database:
   ```sh
   php artisan migrate
   ```

### **3. Buat Model, Controller, dan Migration untuk Buku**

1. Buat model dan migrasi untuk entitas **Book**:
   ```sh
   php artisan make:model Book -mcr
   ```
2. Edit file migrasi (`database/migrations/xxxx_xx_xx_xxxxxx_create_books_table.php`):
   ```php
   public function up()
   {
       Schema::create('books', function (Blueprint $table) {
           $table->id();
           $table->string('title');
           $table->string('author');
           $table->string('publisher');
           $table->year('publish_year');
           $table->text('description');
           $table->timestamps();
       });
   }
   ```
3. Jalankan migrasi:
   ```sh
   php artisan migrate
   ```

### **4. Konfigurasi Autentikasi**

1. Instal Laravel Breeze untuk autentikasi:
   ```sh
   composer require laravel/breeze --dev
   ```
2. Jalankan perintah berikut:
   ```sh
   php artisan breeze:install
   ```
3. Install dependensi frontend:
   ```sh
   npm install && npm run dev
   ```
4. Jalankan migrasi ulang jika perlu:
   ```sh
   php artisan migrate
   ```

### **5. Routing & Middleware**

1. Edit file `routes/web.php`:
   ```php
   use App\Http\Controllers\BookController;
   use App\Models\Book;
   use Illuminate\Support\Facades\Route;

   Route::get('/', function () {
       $books = Book::all();
       return view('home', compact('books'));
   });

   Route::get('/books', [BookController::class, 'index'])->name('books.index');

   Route::middleware('auth')->group(function () {
       Route::resource('books', BookController::class)->except(['index', 'show']);
   });
   ```
2. Pastikan middleware autentikasi diterapkan di **`app/Http/Controllers/BookController.php`**:
   ```php
   public function __construct()
   {
       $this->middleware('auth')->except('index');
   }
   ```

### **6. Implementasi View & Blade Template**

1. Buat folder `resources/views/layouts` dan buat file `app.blade.php`:
   ```blade
   <!DOCTYPE html>
   <html lang="{{ app()->getLocale() }}">
   <head>
       <meta charset="utf-8">
       <title>{{ config('app.name', 'Laravel') }}</title>
   </head>
   <body>
       <nav>
           @auth
               <a href="{{ route('books.create') }}">Tambah Buku</a>
               <a href="{{ route('logout') }}">Logout</a>
           @endauth
           @guest
               <a href="{{ route('login') }}">Login</a>
           @endguest
       </nav>
       <main>
           @yield('content')
       </main>
   </body>
   </html>
   ```
2. Buat `resources/views/home.blade.php` untuk menampilkan daftar buku:
   ```blade
   @extends('layouts.app')
   
   @section('content')
   <h1>Daftar Buku</h1>
   <ul>
       @foreach($books as $book)
           <li>{{ $book->title }} - {{ $book->author }}</li>
       @endforeach
   </ul>
   @endsection
   ```

### **7. Testing & Debugging**

1. Jalankan perintah berikut untuk memastikan semua fitur berjalan:
   ```sh
   php artisan serve
   ```
2. Buka browser dan akses `http://127.0.0.1:8000`.
3. Coba login, tambah buku, dan cek apakah hanya pengguna terdaftar yang bisa mengelola buku.

---

## ✅ **Kesimpulan**
Dengan mengikuti langkah-langkah di atas, Anda telah berhasil membuat aplikasi Laravel sederhana untuk mencatat buku dengan fitur:
- **Autentikasi pengguna**
- **Manajemen buku (CRUD) dengan kontrol akses**
- **Tampilan berbasis Blade Template**

Selamat mencoba! 🚀
