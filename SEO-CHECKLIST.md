# SEO Checklist — Agnes Kagure Foundation

**Live site:** https://agneskagurefoundation.org  
**Local site:** http://localhost/stitch_agnes_kagure_foundation_portal  
**Last reviewed:** August 2026

---

## Progress at a glance

| Area | Status |
|------|--------|
| Codebase SEO (meta, schema, sitemap, robots) | ✅ Done |
| Local smoke + SEO audit | ✅ Passing |
| Image `alt` / `aria-label` on views | ✅ Done |
| HTTP 200 fix for Apache rewrites | ✅ Done (deploy required) |
| Deploy package script | ✅ `scripts/deploy-package.sh` |
| Search verification meta tags | ✅ Ready (`GOOGLE_SITE_VERIFICATION`, `BING_SITE_VERIFICATION`) |
| Legacy `og-default.jpg` redirect | ✅ Done in `.htaccess` |
| Production automated SEO audit | ✅ Passing (`php scripts/seo-audit.php --production`) |
| Production `.env` on server | ⬜ **You** — confirm `.env` matches `.env.production.example` |
| Redeploy after future code changes | Use `bash scripts/deploy-package.sh` |
| Cloudflare SSL (Full / Full strict) | ⬜ **You** — check dashboard |
| Google Search Console | ⬜ **You** |
| Bing Webmaster Tools | ⬜ **You** |
| Social preview tests | ⬜ **You** |
| PageSpeed / mobile-friendly tests | ⬜ **You** |

---

## Quick commands

```bash
# Local — run before every deploy
php scripts/smoke-test.php
php scripts/seo-audit.php

# Production — after deploy (checks live HTML + HTTP status)
php scripts/seo-audit.php --production

# Build upload zip for cPanel
bash scripts/deploy-package.sh

# Full post-deploy verification
bash scripts/post-deploy-verify.sh
```

---

## ✅ Done (in codebase)

### Technical SEO
- [x] Unique titles & meta descriptions per page (`resources/data/seo.php`)
- [x] Canonical URLs with subdirectory fix (`app/Services/SeoService.php`)
- [x] Open Graph + Twitter Card tags (`resources/views/components/seo-head.php`)
- [x] JSON-LD: NGO organization on all pages
- [x] JSON-LD: WebSite + SearchAction on homepage
- [x] JSON-LD: BreadcrumbList on inner pages
- [x] JSON-LD: NewsArticle on `/news/{slug}`
- [x] `noindex, nofollow` on 404 / 403 / 500
- [x] Dynamic `/robots.txt` and `/sitemap.xml` (19 URLs)
- [x] Favicon (`public/assets/images/favicon.svg`)
- [x] `lang="en-KE"` on `<html>`
- [x] Title/description length tuned (audit passes locally)
- [x] `.htaccess` without HTTPS redirect loop (Cloudflare-safe)
- [x] Apache front-controller returns HTTP 200 (`app/Core/Router.php`)

### Content & on-page
- [x] One `<h1>` per page
- [x] No placeholder `href="#"` links in views
- [x] `<img>` tags use `alt` (converted from Stitch `data-alt`)
- [x] Background hero divs use `role="img"` + `aria-label`
- [x] Donate & Contact meta descriptions include CTAs
- [x] 6 news articles with slugs, dates, categories, excerpts
- [x] All 13 public routes in sitemap + navigation
- [x] Visible breadcrumbs on news article pages

### Tooling
- [x] `scripts/smoke-test.php` — route health check
- [x] `scripts/seo-audit.php` — local meta/schema audit
- [x] `scripts/seo-audit.php --production` — live site audit (HTTP status + meta)
- [x] `scripts/deploy-package.sh` — creates `dist/akfo-portal-deploy-latest.zip`
- [x] `scripts/post-deploy-verify.sh` — smoke + production SEO audit
- [x] `.env.production.example` — copy to server as `.env` (includes sample `APP_KEY`)
- [x] Google/Bing verification meta tags via env vars

### Local environment
- [x] Local `.env` configured for XAMPP subdirectory
- [x] `php scripts/smoke-test.php` — all routes pass
- [x] `php scripts/seo-audit.php` — all checks pass

---

## ⬜ To do (manual — search engines & performance)

### 1. Production environment (confirm once)

Automated SEO checks **pass on live site** (HTTP 200, meta, schema, sitemap). Confirm server config:

- [ ] `.env` on server has `APP_URL=https://agneskagurefoundation.org` and `APP_DEBUG=false`
- [ ] `storage/` writable (`chmod 775 storage storage/logs storage/messages`)
- [ ] Document root = project root (where root `index.php` lives)

**Future deploys:**

```bash
bash scripts/deploy-package.sh
# Upload dist/akfo-portal-deploy-latest.zip → cPanel extract → purge Cloudflare cache
bash scripts/post-deploy-verify.sh
```

### 2. Cloudflare

- [ ] SSL/TLS mode: **Full** or **Full (strict)** (not Flexible)
- [ ] Do not add HTTPS redirect in `.htaccess` (already removed)
- [ ] Purge cache after deploy: **Caching → Purge Everything**

### 3. Google Search Console

- [ ] Add property: `https://agneskagurefoundation.org`
- [ ] Verify via DNS TXT (recommended on Cloudflare) **or** HTML meta tag:
  - Copy verification code into server `.env`: `GOOGLE_SITE_VERIFICATION=your-code-here`
  - Redeploy / purge cache; confirm meta tag appears in page source
- [ ] Submit sitemap: `https://agneskagurefoundation.org/sitemap.xml`
- [ ] Request indexing:

| URL | Priority |
|-----|----------|
| `/` | Highest |
| `/donate` | High |
| `/programs` | High |
| `/about` | High |
| `/contact` | High |
| `/news` | Medium |

- [ ] Review **Pages** report after 1–2 weeks

### 4. Bing Webmaster Tools

- [ ] Register at [bing.com/webmasters](https://www.bing.com/webmasters)
- [ ] Import from Google Search Console or verify manually
- [ ] Optional: set `BING_SITE_VERIFICATION=your-code` in production `.env`
- [ ] Submit sitemap URL

### 5. Social sharing

Verify footer links, then test previews:

| Platform | URL |
|----------|-----|
| Facebook | https://www.facebook.com/AKFOorg |
| X | https://x.com/itsagneskagure |
| Instagram | https://www.instagram.com/akfoorg/ |

- [ ] [Facebook Sharing Debugger](https://developers.facebook.com/tools/debug/) — scrape homepage + `/news/gbv-campaign-nairobi-2024`
- [ ] Confirm OG image, title, and description appear correctly

### 6. Performance

- [ ] [Mobile-Friendly Test](https://search.google.com/test/mobile-friendly)
- [ ] [PageSpeed Insights](https://pagespeed.web.dev/) — homepage mobile
- [ ] [Rich Results Test](https://search.google.com/test/rich-results) — homepage, `/programs`, one news article

---

## Release checklist (copy per deploy)

```
Pre-deploy
[x] php scripts/smoke-test.php
[x] php scripts/seo-audit.php
[ ] APP_URL correct for target environment
[ ] APP_DEBUG=false on production

Deploy
[ ] Upload full project + .env
[ ] storage/ writable

Post-deploy
[x] php scripts/seo-audit.php --production  (passing on live site)
[x] Homepage HTTP 200 (not 404)
[x] /robots.txt and /sitemap.xml reachable
[ ] Rich Results Test on homepage
[ ] Search Console sitemap submitted (first time only)
[ ] Facebook Debugger scrape
```

---

## Per-page SEO reference

Edit in `resources/data/seo.php`:

| Path | Title | Priority |
|------|-------|----------|
| `/` | AKFO \| Turning Potentials into Possibilities | 1.0 |
| `/about` | About Us \| … | 0.9 |
| `/programs` | Our Programs \| … | 0.9 |
| `/donate` | Donate \| … | 0.9 |
| `/impact` | Our Impact \| … | 0.8 |
| `/news` | Stories of Change \| … | 0.8 |
| `/contact` | Contact Us \| … | 0.8 |
| `/get-involved` | Get Involved \| … | 0.8 |
| `/partners` | Partners & Alliances \| … | 0.7 |
| `/events` | Events & Opportunities \| … | 0.7 |
| `/gallery` | Impact Gallery \| … | 0.6 |
| `/privacy` | Privacy Policy \| … | 0.3 |
| `/terms` | Terms of Service \| … | 0.3 |

News: `/news/{slug}` — `resources/data/news.php`

---

## Adding a new page

1. Route in `routes/web.php`
2. Controller + view
3. Entry in `resources/data/seo.php`
4. Link in `resources/data/navigation.php`
5. `php scripts/smoke-test.php && php scripts/seo-audit.php`

## Adding a news story

1. Add entry to `resources/data/news.php` (slug, title, excerpt ≤160 chars, date, category, image)
2. Sitemap updates automatically
3. Re-run SEO audit

---

## Key files

| Purpose | File |
|---------|------|
| Page SEO copy | `resources/data/seo.php` |
| News content | `resources/data/news.php` |
| SEO logic & JSON-LD | `app/Services/SeoService.php` |
| Meta tags | `resources/views/components/seo-head.php` |
| Sitemap & robots | `app/Controllers/SeoController.php` |
| Production env template | `.env.production.example` |
| Deploy zip builder | `scripts/deploy-package.sh` |
| Post-deploy checks | `scripts/post-deploy-verify.sh` |
| Local audit | `scripts/seo-audit.php` |
| Production audit | `scripts/seo-audit.php --production` |

---

## Troubleshooting

| Symptom | Fix |
|---------|-----|
| `ERR_TOO_MANY_REDIRECTS` | Cloudflare → Full SSL; no HTTPS in `.htaccess` |
| HTTP 404 but page renders | Redeploy with latest `Router.php` (200 reset fix) |
| HTTP 404 on all pages | Wrong document root; missing `index.php` / `.htaccess` |
| Old meta tags on live site | Redeploy latest code; purge Cloudflare cache |
| Broken assets | Check `APP_URL`; verify `/assets/css/base.css` loads |
| Sitemap 404 | Ensure latest code deployed; check `mod_rewrite` |

---

## Ongoing maintenance

| Task | Frequency |
|------|-----------|
| Run `seo-audit.php` before deploy | Every release |
| Add news stories | When published |
| Search Console crawl errors | Monthly |
| Update descriptions in `seo.php` | Quarterly |
| Rich results re-test | After major changes |

---

## External links

- [Google Search Console](https://search.google.com/search-console)
- [Rich Results Test](https://search.google.com/test/rich-results)
- [PageSpeed Insights](https://pagespeed.web.dev/)
- [Mobile-Friendly Test](https://search.google.com/test/mobile-friendly)
- [Facebook Sharing Debugger](https://developers.facebook.com/tools/debug/)
- [Bing Webmaster Tools](https://www.bing.com/webmasters)
