---
name: akfo-php-website
description: >-
  Develop and maintain the Agnes Kagure Foundation PHP website. Use when editing
  this repo, adding pages/routes, fixing forms, updating navigation, working on
  controllers/views, or deploying AKFO.org locally on XAMPP.
---

# AKFO PHP Website

## Stack

- PHP 8.2+, vanilla MVC (no framework)
- Views in `resources/views/`, data in `resources/data/`
- Web root is the **project root** via root `index.php` — URLs must **not** include `/public`

## Architecture

```
index.php              → delegates to public/index.php
routes/web.php         → route definitions
app/Controllers/       → one controller per page/feature
app/Core/              → Router, Controller, View
app/Services/          → business logic (ContactService, etc.)
resources/views/
  layouts/main.php     → SEO, head, header, footer
  components/          → header, footer, mobile-menu, alert
  pages/               → thin wrappers
  partials/stitch/     → Stitch HTML page bodies
resources/data/        → site.php, navigation.php, news.php, design-colors.php
public/assets/         → css/, js/, images/
storage/messages/      → form submissions (JSON)
google_stitch/         → design source of truth (read-only reference)
```

## Routing rules

- Clean URLs only: `/about`, `/programs`, `/news/{slug}` — never `.php` or query-string routing
- Add route in `routes/web.php`, controller in `app/Controllers/`, page wrapper in `resources/views/pages/`
- Update `resources/data/navigation.php` and `SeoController` sitemap when adding public pages
- `APP_URL` in `.env` must **not** include `/public` (e.g. `http://localhost/stitch_agnes_kagure_foundation_portal`)

## View pattern

Page wrapper includes Stitch partial:

```php
<?php include BASE_PATH . '/resources/views/partials/stitch/about.php'; ?>
```

Layout is applied in `Controller::render()` — do not duplicate header/footer in page partials.

## Forms

Forms in Stitch partials must have:

- `action="<?= url('/contact') ?>"` (or correct route)
- `method="POST"`
- `<?= csrf_field() ?>`
- Named inputs + server validation in controller
- Submissions stored via `ContactService` → `storage/messages/`

Re-running `scripts/extract-stitch-content.php` **wipes** form attributes — re-apply after extraction.

## Adding a page

1. Route in `routes/web.php`
2. Controller with `render('page-name', [...])` and SEO metadata
3. `resources/views/pages/page-name.php` → include partial or custom content
4. Navigation + sitemap updates
5. Run `php scripts/smoke-test.php`

## Conventions

- Escape output with `e()`, URLs with `url()` / `asset()`
- Content in `resources/data/` — not hard-coded in multiple views
- Match Stitch designs; use `google_stitch/agnes_kagure_foundation/DESIGN.md` for tokens
- Minimal diff scope; no unnecessary dependencies
- Never commit `.env`

## Local URL

`http://localhost/stitch_agnes_kagure_foundation_portal/`

Requires Apache `mod_rewrite` and `AllowOverride All`.
