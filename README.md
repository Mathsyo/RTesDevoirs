# RTesDevoirs

## Installation

```bash
git clone 
composer install
```

Edit .env DB settings

```bash
php artisan migrate
php artisan db:seed --class=CourseSeeder
php artisan db:seed --class=PermissionsSeeder
php artisan make:admin
php artisan db:seed --class=UserSeeder
php artisan serve
```
