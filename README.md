# BlogApp — Laravel Blog Platform

> Учебный проект для портфолио на базе Laravel 11 + Breeze. Расширен поверх оригинального скелета из `devDoubleH/blog-app` (2 коммита, Laravel Breeze) — **основа не менялась, весь блог-функционал добавлен сверху**.

![Laravel](https://img.shields.io/badge/Laravel-11.x-FF2D20?style=flat-square&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat-square&logo=php)
![License](https://img.shields.io/badge/license-MIT-green?style=flat-square)

## ✨ Что умеет

- **Публичный блог** — список всех опубликованных постов с пагинацией (9 на странице), просмотр по `slug`
- **CRUD для автора** — создание / редактирование / удаление только своих постов, черновики (`is_published = false`) не видны гостям
- **Авторизация** — Laravel Breeze (Blade + Tailwind), регистрация/логин, профиль, dashboard
- **Связи** — `User hasMany Post`, `Post belongsTo User`, scope `published()`
- **Автогенерация** — `slug` из заголовка + рандом, `excerpt` из body, `published_at`
- **Сиды и фабрики** — `PostFactory`, `PostSeeder` (12 опубликованных + 2 черновика)

## 🧱 Стек

- **Backend:** PHP 8.2, Laravel 11.31, Eloquent, Blade
- **Frontend:** Tailwind CSS 3, Vite 6, Alpine.js, Breeze Blade components
- **Auth:** `laravel/breeze 2.3`, `inertiajs/inertia-laravel` (установлен но не используется — оставлен из оригинала)
- **DB:** SQLite (dev) / MySQL/PostgreSQL (prod), миграции, сиды
- **Tooling:** Pint, Pest, Sail, Pail

## 📁 Что добавлено поверх оригинала (основа не тронута)

```
database/migrations/2025_02_05_000000_create_posts_table.php  # новая
app/Models/Post.php                                            # новый
app/Http/Controllers/PostController.php                        # новый
app/Http/Requests/StorePostRequest.php / UpdatePostRequest.php # новые
database/factories/PostFactory.php                             # новый
database/seeders/PostSeeder.php                                # новый
resources/views/posts/{index,show,create,edit,my}.blade.php    # новые
resources/views/components/post-card.blade.php                 # новый
routes/web.php                                                 # только добавлены маршруты, welcome не удален
app/Models/User.php                                            # добавлен только метод posts()
resources/views/layouts/navigation.blade.php                   # добавлены линки Blog / My Posts
```

Оригинальные файлы `app/Http/Controllers/Auth/*`, `resources/views/welcome.blade.php`, `dashboard.blade.php` и т.д. — без изменений.

## 🚀 Быстрый старт

```bash
git clone https://github.com/lejecy/blog-app.git
cd blog-app

cp .env.example .env
composer install
php artisan key:generate
touch database/database.sqlite  # или настрой MySQL в .env

php artisan migrate --seed      # создаст users + 14 постов
npm install && npm run build    # или npm run dev для разработки

php artisan serve
# открыть http://127.0.0.1:8000  -> сразу список постов
# /posts/create (требует логин), /my-posts, /dashboard, /profile
```

**Тестовый юзер:** `test@example.com` / `password` (из `DatabaseSeeder`)

## 🔗 Маршруты

| Метод | URI | Имя | Доступ |
|-------|-----|-----|--------|
| GET | `/`, `/posts` | `home`, `posts.index` | public |
| GET | `/posts/{slug}` | `posts.show` | public (черновики — только автор) |
| GET | `/posts/create` | `posts.create` | auth |
| POST | `/posts` | `posts.store` | auth |
| GET | `/posts/{slug}/edit` | `posts.edit` | owner |
| PUT | `/posts/{slug}` | `posts.update` | owner |
| DELETE | `/posts/{slug}` | `posts.destroy` | owner |
| GET | `/my-posts` | `posts.my` | auth |
| GET | `/dashboard` | `dashboard` | auth |

## 🧪 Тесты

```bash
php artisan test
# или
./vendor/bin/pest
```

## 📸 Скриншоты (добавь свои)

```
docs/screenshots/home.png      # список постов
docs/screenshots/show.png      # страница поста
docs/screenshots/create.png    # форма создания
```

## 📝 История проекта

- **Оригинал:** `devDoubleH/blog-app` — 2 коммита (Feb 2025), голый Laravel Breeze — использовался на презентации.
- **Форк:** `adham0720/blog-app` — 1 коммит (отстал).
- **Портфолио-версия:** этот репозиторий (`lejecy/blog-app`) — поверх оригинала добавлен полноценный блог, README и сиды, без удаления истории.

## 📄 Лицензия

MIT — как у Laravel. Оригинальный скелет © Laravel LLC, блог-расширение © adham0720 / lejecy.

## 👤 Автор

Портфолио: `github.com/lejecy` — собраны учебные проекты (PharmaDistribute, veloce, blog-app).
Исходный скелет: `github.com/devDoubleH/blog-app`.
