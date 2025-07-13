💻 Praktikum PHP Framework (CodeIgniter 4)

Repositori ini berisi panduan praktikum untuk memahami dan menerapkan framework **CodeIgniter 4**, mulai dari pengenalan konsep dasar hingga membangun aplikasi sederhana dengan fitur **CRUD**.

---

# Praktikum 1

## 1. Mengaktifkan Ekstensi

Buka file konfigurasi `php.ini`, kemudian aktifkan ekstensi berikut (hilangkan tanda ";"):

```ini
extension=json
extension=mysqli
extension=xml
extension=intl
extension=curl
```

![Hasil Serve](https://github.com/user-attachments/assets/7b776fc9-39ba-4606-95f4-3ee96a82859c)

## 2. Instalasi CodeIgniter

1. Unduh CodeIgniter: [codeigniter.com/download](https://codeigniter.com/download)
2. Ekstrak ke direktori `htdocs/Lab7Web`
3. Ubah nama folder menjadi `ci4`
4. Jalankan CLI XAMPP:

   ```bash
   cd xampp/htdocs/Lab7Web/ci4/
   php spark serve
   ```

   Akses di browser: `http://localhost:8080`

![Screenshot CLI](https://github.com/user-attachments/assets/8f655722-403f-4b22-88c1-73a58ae0e353)

## 3. Mode Debugging

Ubah nilai `CI_ENVIRONMENT` menjadi `development` di file `.env`:

```env
CI_ENVIRONMENT = development
```

![Debug Config](https://github.com/user-attachments/assets/d8d3827e-69f4-43eb-bff3-c11caffe17ff)

## 4. Routing dan Controllers

* Nonaktifkan autoroute:

```php
$routes->setAutoRoute(false);
```

* Tambahkan route manual:

```php
$routes->get('/artikel', 'Artikel::index');
```

## 5. View dan Layout

* Buat file `app/Views/about.php`
* Tambahkan layout di folder `template/` → `header.php`, `footer.php`
* Buat `style.css` di direktori `public/`

---

# Praktikum 2

## Database dan Artikel

* Buat model `ArtikelModel.php`
* Buat controller `Artikel.php`
* Tambahkan view `app/views/artikel/index.php`

## Menampilkan Data

```sql
INSERT INTO artikel (judul, isi, slug) VALUES
('Artikel pertama', 'Isi artikel pertama', 'artikel-pertama'),
('Artikel kedua', 'Isi artikel kedua', 'artikel-kedua');
```

## Detail Artikel

* Buat fungsi `view($slug)`
* Buat `detail.php`
* Tambah route:

```php
$routes->get('page/artikel/(:any)', 'Page::artikel/$1');
```

## Menu Admin

* Fungsi: `admin_index()`, `add()`, `edit()`, `delete()`
* Buat view `admin_index.php`, `form_add.php`, `form_edit.php`

---

# Praktikum 3 - Layout & ViewCell

* Buat `app/Views/layout/main.php`
* Gunakan `<?= $this->extend('layout/main') ?>` pada view
* Buat `app/Cells/ArtikelTerkini.php`
* Buat komponen `app/Views/components/artikel_terkini.php`

---

# Praktikum 4 - Modul Login

1. Buat table `users`
2. Buat `UserModel.php`
3. Buat controller `User.php` → fungsi `index()`, `login()`
4. View `login.php`
5. Buat seeder `UserSeeder`

```bash
php spark make:seeder UserSeeder
php spark db:seed UserSeeder
```

6. Tambah route:

```php
$routes->group('user', function($routes) {
   $routes->get('login', 'User::login');
   $routes->post('login', 'User::login');
   $routes->get('logout', 'User::logout');
});
```

7. Buat filter `Auth.php`

---

# Praktikum 5 - Pagination & Search

* Tambahkan `<?= $pager->links(); ?>`
* Buat input search pada view `admin_index.php`
* Tambahkan pencarian di controller `Artikel.php`

---

# Praktikum 6 - Upload Gambar

* Tambah field file gambar pada form `form_add.php`
* Handle upload di controller `Artikel.php`

---

# Praktikum 7 - Kategori

* Buat table `kategori`
* Tambahkan `id_kategori` di `artikel`
* Buat model `KategoriModel`
* Relasikan dengan `ArtikelModel`
* Tampilkan pilihan kategori di form

---

# Praktikum 8 - jQuery & Ajax

* Tambahkan pustaka jQuery
* Buat `AjaxController`
* Buat view untuk menampilkan data dengan Ajax
* Buat route:

```php
$routes->get('admin/ajax', 'AjaxController::index');
$routes->get('ajax/getData', 'AjaxController::getData');
```

---

# Praktikum 9 - Ajax Search & Pagination

* Ubah `admin_index()` untuk menangani Ajax
* View: `admin_ajax.php`

---

# Praktikum 10 - REST API

* Unduh Postman
* Buat REST controller `Post.php`
* Tambah route:

```php
$routes->resource('post');
```

* Test API via Postman (GET, POST, PUT, DELETE)

---

# Praktikum 11 - VueJS

* Gunakan CDN VueJS dan Axios

```html
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
```

## Struktur Folder

```plaintext
index.html
assets/
  css/style.css
  js/app.js
```

* Buat binding Vue pada `app.js`
* Buat form tambah dan ubah data
* Lengkapi kode VueJS untuk fetch dan manipulasi data dari API
