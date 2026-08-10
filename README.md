# Agnes Kagure Foundation (AKFO) Website

Production-ready PHP website for the Agnes Kagure Foundation, built from Google Stitch designs with a modular MVC-style architecture, clean URLs, reusable components, and database-ready content separation.

## Requirements

- PHP 8.2+
- Apache with `mod_rewrite` (XAMPP recommended) or Nginx
- MySQL/MariaDB (optional for current static content phase)

## Quick Start (XAMPP)

1. Clone/copy the project into your XAMPP htdocs directory.
2. Copy environment file:
   ```bash
   cp .env.example .env
   ```
3. Update `APP_URL` in `.env` to match your local URL, for example:
   ```env
   APP_URL=http://localhost/stitch_agnes_kagure_foundation_portal
   ```
4. Ensure Apache `mod_rewrite` is enabled.
5. Visit: **http://localhost/stitch_agnes_kagure_foundation_portal/**

No `/public` in the URL — the root `index.php` and `.htaccess` route requests internally.

### Recommended Apache VirtualHost (production)

Point the document root to the **project root** (not `public/`):

```apache
DocumentRoot "/Applications/XAMPP/xamppfiles/htdocs/stitch_agnes_kagure_foundation_portal"
<Directory "/Applications/XAMPP/xamppfiles/htdocs/stitch_agnes_kagure_foundation_portal">
    AllowOverride All
    Require all granted
</Directory>
```

Alternatively, point DocumentRoot to `public/` and set `APP_URL` without `/public` — both work.

Then set:

```env
APP_URL=http://akfo.local
```

## Project Architecture

```
/
├── app/
│   ├── Controllers/       # Route handlers
│   ├── Core/              # Router, Controller base, View renderer
│   ├── Helpers/           # Global helper functions
│   └── Services/          # Business logic (forms, future DB services)
├── config/                # App and database config
├── public/                # Web root (index.php, assets)
├── resources/
│   ├── data/              # Static content arrays (navigation, news, site settings)
│   └── views/
│       ├── components/    # Header, footer, mobile menu, alerts
│       ├── layouts/       # Main layout shell
│       ├── pages/         # Page wrappers
│       └── partials/stitch/ # Stitch design page content
├── routes/web.php         # Route definitions
├── storage/               # Logs, form submissions, cache
├── google_stitch/         # Original Stitch design source files
└── bootstrap.php          # Application bootstrap
```

## Routing

All requests are routed through `public/index.php`. URLs do **not** expose `.php` extensions.

| Route | Page |
|-------|------|
| `/` | Home |
| `/about` | About Us |
| `/programs` | Our Programs |
| `/impact` | Our Impact |
| `/news` | Stories of Change |
| `/news/{slug}` | News article detail |
| `/partners` | Partners & Alliances |
| `/contact` | Contact Us |
| `/donate` | Donate |
| `/get-involved` | Get Involved |
| `/events` | Events & Opportunities |
| `/gallery` | Impact Gallery |
| `/privacy` | Privacy Policy |
| `/terms` | Terms of Service |
| `/robots.txt` | Robots file |
| `/sitemap.xml` | XML sitemap |

## Design System

Visual fidelity is maintained using:

- Google Stitch HTML extracted into `resources/views/partials/stitch/`
- Shared Tailwind configuration aligned with `google_stitch/agnes_kagure_foundation/DESIGN.md`
- Supplemental CSS in `public/assets/css/`
- EB Garamond + Plus Jakarta Sans typography
- Material Symbols icons

Re-extract Stitch content after design updates:

```bash
php scripts/extract-stitch-content.php
```

## Adding a New Page

1. Add route in `routes/web.php`
2. Create controller in `app/Controllers/`
3. Add page wrapper in `resources/views/pages/`
4. Add Stitch partial (or custom view content)
5. Update `resources/data/navigation.php` if needed
6. Add entry to sitemap in `SeoController`

## Adding a Reusable Component

Create a file in `resources/views/components/` and render it with:

```php
<?= view('components.my-component', ['data' => $value]) ?>
```

## Content Management

Static content lives in `resources/data/`:

- `site.php` – organization settings
- `navigation.php` – menus
- `news.php` – news articles

This structure is ready to migrate to MySQL via PDO services later.

## Forms

Forms include:

- Server-side validation
- CSRF protection
- Input sanitization/output escaping
- JSON storage in `storage/messages/` (database-ready)

Supported forms:

- Contact (`POST /contact`)
- Partnership inquiry (`POST /partners`)
- Donation intent (`POST /donate`)
- Volunteer inquiry (`POST /get-involved`)

## Database (Future)

`config/database.php` and `.env` are prepared for PDO/MySQL integration. Suggested tables:

- `pages`, `programs`, `news`, `events`, `team`, `gallery`, `contact_messages`, `site_settings`

## Security

- `.env` is not web-accessible
- `storage/` denied via `.htaccess`
- CSRF tokens on all POST forms
- Security headers in `public/index.php` and Apache config
- Production: set `APP_DEBUG=false`

## Performance

- Static asset caching headers in `public/.htaccess`
- Gzip-compatible compression config
- Lazy-loading friendly markup
- Minimal JavaScript modules

## QA / Smoke Test

```bash
php scripts/smoke-test.php
php scripts/seo-audit.php
```

See **[SEO-CHECKLIST.md](SEO-CHECKLIST.md)** for the full pre-launch and production SEO workflow.

## Deployment Checklist

1. Set document root to `public/`
2. Copy `.env.example` → `.env` and configure production values
3. Set `APP_ENV=production` and `APP_DEBUG=false`
4. Ensure write permissions on `storage/logs` and `storage/messages`
5. Enable HTTPS and update `APP_URL`
6. Verify `/sitemap.xml` and `/robots.txt`

## Source Designs

Original Google Stitch exports are preserved in `google_stitch/` and should remain the visual source of truth when updating page content.
