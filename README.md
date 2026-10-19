# Backend Design & Engineering - Updated Codebase Guide (October 2026)

**Backend runtime: Laravel 13 / PHP 8.3+.** The applicable server application is located at `codebase/`. Install its Composer dependencies, copy `.env.example` to `.env`, generate the app key, migrate and seed the database, and start the API on port **8000**.

```bash
cd .
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve --port=8000
php artisan test
```

The **React / JavaScript frontends** and **Flutter mobile client** remain in their original languages. They use the new Laravel API. For mobile Android emulators the base URL is `http://10.0.2.2:8000`; for a physical phone use your computer's LAN IP.

The teaching code is for local education, not live banking, live payments, or production deployment. Never upload real customer information.
