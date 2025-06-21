# Laravel Event Management System

Bu loyiha Laravel asosida tuzilgan, va unda **Event CRUD**, **filter**, **SQLite**, hamda **Factory orqali seeding** imkoniyatlari mavjud.

## 📦 Talablar

- PHP 8.1+
- Composer
- Git
- Laravel 12
- SQLite qo‘llab-quvvatlanuvchi PHP

## 🚀 O‘rnatish

### 1. Loyihani klonlash

```bash
git clone https://github.com/BekzodNazirbekov/gita-test-project.git
cd project
```

### 2. Composer orqali kutubxonalarni o‘rnatish

```bash
composer install
```

### 3. `.env` faylini tayyorlash

```bash
cp .env.example .env
```

Va `.env` faylidagi quyidagi qatorda:

```
DB_CONNECTION=sqlite
```

pastidagi `DB_DATABASE` quyidagidek yozilishi kerak (agar siz `database/database.sqlite` fayl ishlatayotgan bo‘lsangiz):

```
DB_DATABASE=${PWD}/database/database.sqlite
```

Yoki to‘g‘ridan-to‘g‘ri absolyut yo‘l:

```
DB_DATABASE=/absolute/path/to/your/project/database/database.sqlite
```

**Tavsiyalar:**
```bash
touch database/database.sqlite
```

### 4. Laravel kalit yaratish

```bash
php artisan key:generate
```

### 5. Ma'lumotlar bazasini yaratish

```bash
php artisan migrate
```

### 6. (Ixtiyoriy) Soxta ma'lumotlar bilan to‘ldirish

```bash
php artisan migrate --seed
```

Seeder fayllar `database/seeders/` ichida joylashgan bo‘lib, ular `EventFactory` orqali test ma'lumotlar bilan to‘ldiradi.

---

## ⚙️ Foydalanish

Loyiha ishga tushirilgach, siz quyidagicha brauzeringizda ochishingiz mumkin:

```
http://localhost:8000
```

Ishga tushirish:

```bash
php artisan serve
```

---

## 📂 Muhim papkalar

- `app/Models/Event.php` — event modeli
- `resources/views/events/` — blade fayllar
- `database/factories/EventFactory.php` — test ma'lumotlar generatsiyasi
- `database/seeders/EventSeeder.php` — boshlang'ich seeding
- `routes/web.php` — marshrutlar

---

## 🧪 Test qilish

Agar siz test yozgan bo‘lsangiz:

```bash
php artisan test
```

---

## 📘 Litsenziya

MIT
