# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

Laravel 12 application serving a bilingual (English/French) website. The entire backend/CMS is built with Filament 4 — all content management (pages, articles, reviews, users) goes through Filament resources and the admin panel at `/admin`. Any new CMS functionality should be implemented as Filament resources, pages, or widgets. The frontend renders content via Blade templates with dynamic page sections stored as JSON in the database.

## Common Commands

```bash
# Full project setup (install deps, generate key, migrate, build assets)
composer setup

# Start development (serves app, queue worker, log tail, Vite HMR concurrently)
composer dev

# Run tests (clears config cache first, uses in-memory SQLite)
composer test

# Code style fixing
./vendor/bin/pint

# Asset build for production
npm run build
```

## Architecture

### Routing Strategy (`routes/web.php`)
- Dynamic catch-all page routing: `/{parent?}/{section?}/{child?}` — pages are resolved by slug
- Article/news routes use slug-based URLs
- Language toggle switches between English and French
- QR code redirects and static HTML pages have dedicated routes
- API routes in `routes/api.php` (minimal, includes location/travel data endpoint)

### Content Model
- **Pages** have multilingual columns (en/fr) and a JSON `content` column for flexible structured data
- **PageSections** are linked to pages and rendered dynamically as Blade components
- **Articles** serve as news/blog posts with slug-based routing
- **Reviews** store testimonials

### Controllers
Controllers in `app/Http/Controllers/` are organized by domain (Articles, Pages, Links, Static, Form, Lang, Qr, Blogs, News). Most use the invokable `__invoke()` pattern.

### Filament Admin (`app/Filament/`)
CRUD resources for Articles, Pages, Users, and Reviews under `app/Filament/Resources/`. The admin panel is configured in `app/Providers/Filament/AdminPanelProvider.php`.

### Frontend
- Vite 7 with `laravel-vite-plugin` for HMR and asset compilation
- TailwindCSS 4 — entry point at `resources/css/app.css`
- Blade components in `resources/views/components/` (sections, forms, nav, utils)
- Page section components in `resources/views/components/sections/` are dynamically loaded based on database records

### Database
- MySQL in development (`yvan_zim_website_2026`), SQLite in-memory for tests
- Session, cache, and queue all use database driver
- Legacy data imported via migration (`import_old_database`)
