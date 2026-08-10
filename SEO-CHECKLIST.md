# SEO Checklist — Agnes Kagure Foundation

**Live site:** https://agneskagurefoundation.org  
**Local site:** http://localhost/stitch_agnes_kagure_foundation_portal

Use this document before launch, after every content release, and monthly in production.

---

## Quick start (run these first)

```bash
# From project root
php scripts/smoke-test.php    # All routes return expected HTTP codes
php scripts/seo-audit.php     # Title, description, canonical, JSON-LD, sitemap
```

`seo-audit.php` exits with code **0** when all automated checks pass, **1** when warnings need fixing in `resources/data/seo.php` or views.

Optional JSON output for CI:

```bash
php scripts/seo-audit.php --json
```

---

## Status overview

### Implemented in codebase (no manual setup needed)

| Feature | Location |
|---------|----------|
| Unique titles & meta descriptions per page | `resources/data/seo.php` |
| Canonical URLs | `app/Services/SeoService.php` |
| Open Graph + Twitter Cards | `resources/views/components/seo-head.php` |
| JSON-LD: NGO organization | All pages |
| JSON-LD: WebSite + SearchAction | Homepage |
| JSON-LD: BreadcrumbList | Inner pages |
| JSON-LD: NewsArticle | `/news/{slug}` |
| `noindex` on 404 / 403 / 500 | `app/Controllers/ErrorController.php` |
| `/robots.txt` | `app/Controllers/SeoController.php` |
| `/sitemap.xml` (19 URLs) | Auto from pages + news articles |
| Favicon | `public/assets/images/favicon.svg` |
| `lang="en-KE"` | `resources/views/layouts/main.php` |
| One `<h1>` per page | Stitch partials |
| No placeholder `href="#"` links | Verified in views |

### You must do manually (production)

- [ ] Set production `.env` (see §1)
- [ ] Deploy files to hosting
- [ ] Fix Cloudflare SSL mode (see §1)
- [ ] Google Search Console setup (see §4)
- [ ] Bing Webmaster Tools (see §5)
- [ ] Social sharing preview tests (see §6)
- [ ] PageSpeed / mobile-friendly tests (see §7)

---

## 1. Production environment

- [ ] `.env` on the live server:

```env
APP_NAME="Agnes Kagure Foundation"
APP_URL="https://agneskagurefoundation.org"
APP_ENV=production
APP_DEBUG=false
APP_TIMEZONE=Africa/Nairobi
APP_LOCALE=en
APP_KEY=<generate with: openssl rand -hex 16>
```

- [ ] Site loads at https://agneskagurefoundation.org (not 404, not redirect loop)
- [ ] Cloudflare **SSL/TLS → Full** or **Full (strict)** — not Flexible
- [ ] Do **not** force HTTPS in `.htaccess` if Cloudflare terminates SSL (causes `ERR_TOO_MANY_REDIRECTS`)
- [ ] `.htaccess` uploaded to web root; `mod_rewrite` + `AllowOverride All` enabled
- [ ] `storage/` folder writable by PHP

### Production troubleshooting

| Symptom | Likely cause | Fix |
|---------|--------------|-----|
| `ERR_TOO_MANY_REDIRECTS` | HTTPS rule in `.htaccess` + Cloudflare Flexible SSL | Remove HTTPS redirect from `.htaccess`; set Cloudflare to Full |
| HTTP 404 on all pages | Wrong document root or files not uploaded | Point docroot to project root; ensure `index.php` + `.htaccess` present |
| Broken CSS/assets | Wrong `APP_URL` or missing `public/assets/` | Set `APP_URL` to exact public URL; verify `/assets/css/base.css` loads |
| Double path in links | `APP_URL` includes extra path segment | Match `APP_URL` to how users access the site exactly |

### Verify production URLs

```bash
curl -sI https://agneskagurefoundation.org/
curl -s https://agneskagurefoundation.org/robots.txt
curl -s https://agneskagurefoundation.org/sitemap.xml | head -30
```

---

## 2. Automated technical SEO

Run locally before every deploy:

```bash
php scripts/seo-audit.php
```

### What the audit checks

| Check | Target |
|-------|--------|
| Title length | ≤ 60 characters (warning if longer) |
| Meta description | 70–160 characters |
| Canonical URL | Present; no duplicated base path |
| Open Graph tags | `og:title`, `og:description`, `og:url`, `og:image` |
| `lang="en-KE"` | On `<html>` |
| JSON-LD blocks | ≥ 1 on public pages; 3 on articles |
| `<h1>` count | Exactly 1 per page |
| 404 page | `noindex, nofollow` |
| `robots.txt` | Allows `/`, blocks internals, links sitemap |
| `sitemap.xml` | 13 pages + 6 news articles = 19 URLs |

### Per-page SEO reference

Edit titles/descriptions in `resources/data/seo.php`.

| Path | Title | Sitemap priority |
|------|-------|------------------|
| `/` | AKFO \| Turning Potentials into Possibilities | 1.0 |
| `/about` | About Us \| Agnes Kagure Foundation | 0.9 |
| `/programs` | Our Programs \| … | 0.9 |
| `/impact` | Our Impact \| … | 0.8 |
| `/news` | Stories of Change \| … | 0.8 |
| `/donate` | Donate \| … | 0.9 |
| `/contact` | Contact Us \| … | 0.8 |
| `/get-involved` | Get Involved \| … | 0.8 |
| `/partners` | Partners & Alliances \| … | 0.7 |
| `/events` | Events & Opportunities \| … | 0.7 |
| `/gallery` | Impact Gallery \| … | 0.6 |
| `/privacy` | Privacy Policy \| … | 0.3 |
| `/terms` | Terms of Service \| … | 0.3 |

News articles: `/news/{slug}` — metadata from `resources/data/news.php` (`title`, `excerpt`, `date`, `image`).

### Rich results validation (manual, after deploy)

Test live URLs in [Google Rich Results Test](https://search.google.com/test/rich-results):

- [ ] https://agneskagurefoundation.org/
- [ ] https://agneskagurefoundation.org/programs
- [ ] https://agneskagurefoundation.org/news/gbv-campaign-nairobi-2024

---

## 3. Content & on-page SEO

### When adding a news story

Edit `resources/data/news.php`:

- [ ] Unique `slug` (lowercase, hyphens, no spaces)
- [ ] Clear `title` (becomes `<h1>` and page title)
- [ ] `excerpt` ~120–155 characters (becomes meta description)
- [ ] Accurate `date` (sitemap `lastmod` + article schema)
- [ ] Relevant `category`
- [ ] Public `image` URL (HTTPS, loads without login)

Sitemap updates automatically — no XML edit needed.

### When adding a new public page

1. [ ] Route in `routes/web.php`
2. [ ] Controller + view
3. [ ] Entry in `resources/data/seo.php` → `pages` array
4. [ ] Navigation link in `resources/data/navigation.php`
5. [ ] Run `php scripts/smoke-test.php` and `php scripts/seo-audit.php`

### Content quality checklist

- [ ] Each page has exactly one `<h1>`
- [ ] Images use descriptive `alt` text
- [ ] Internal links use `url('/path')` — no `href="#"`
- [ ] Donate & Contact pages have clear calls to action in meta descriptions
- [ ] Copy mentions Nairobi / Kenya / AKFO where natural (avoid keyword stuffing)

---

## 4. Google Search Console

- [ ] Add property: `https://agneskagurefoundation.org`
- [ ] Verify ownership (DNS TXT record recommended for Cloudflare domains)
- [ ] Submit sitemap: `https://agneskagurefoundation.org/sitemap.xml`
- [ ] Request indexing for priority pages:

| URL | Priority |
|-----|----------|
| `/` | Highest |
| `/donate` | High |
| `/programs` | High |
| `/about` | High |
| `/contact` | High |
| `/news` | Medium |

- [ ] After 1–2 weeks: review **Pages** → fix crawl errors and soft 404s
- [ ] Monitor **Performance** for branded queries: "Agnes Kagure Foundation", "AKFO"

---

## 5. Bing & other search engines

- [ ] Register at [Bing Webmaster Tools](https://www.bing.com/webmasters)
- [ ] Import from Google Search Console (fastest) or verify manually
- [ ] Submit sitemap: `https://agneskagurefoundation.org/sitemap.xml`

---

## 6. Social & sharing

### Profiles (verify links in footer)

| Platform | URL |
|----------|-----|
| Facebook | https://www.facebook.com/AKFOorg |
| X (Twitter) | https://x.com/itsagneskagure |
| Instagram | https://www.instagram.com/akfoorg/ |
| Email | info@akfo.org |

### Preview testing

- [ ] [Facebook Sharing Debugger](https://developers.facebook.com/tools/debug/) — scrape homepage + one article
- [ ] Share homepage on Facebook / X / Instagram — confirm image, title, description
- [ ] Share `/news/gbv-campaign-nairobi-2024` — confirm article image appears

If previews are stale after a deploy, use "Scrape Again" in Facebook Debugger to clear cache.

---

## 7. Performance (ranking factor)

- [ ] [Mobile-Friendly Test](https://search.google.com/test/mobile-friendly) — homepage passes
- [ ] [PageSpeed Insights](https://pagespeed.web.dev/) — review LCP, CLS, INP on mobile
- [ ] Hero images load in reasonable time (consider smaller assets in future)
- [ ] Site is responsive (see `public/assets/css/responsive.css`)

---

## 8. Local development (XAMPP)

- [ ] `.env` uses local URL:

```env
APP_URL="http://localhost/stitch_agnes_kagure_foundation_portal"
APP_ENV=local
APP_DEBUG=true
```

- [ ] After SEO changes:

```bash
php scripts/smoke-test.php
php scripts/seo-audit.php
```

- [ ] Do **not** submit localhost URLs to search engines

---

## 9. Release checklist (copy before each deploy)

```
Pre-deploy
[ ] php scripts/smoke-test.php — all pass
[ ] php scripts/seo-audit.php — all pass
[ ] APP_URL set for target environment
[ ] APP_DEBUG=false on production

Deploy
[ ] Upload all files including .htaccess, .env, public/assets/
[ ] storage/ writable

Post-deploy
[ ] Homepage loads over HTTPS
[ ] /robots.txt and /sitemap.xml reachable
[ ] View source: canonical uses agneskagurefoundation.org
[ ] Rich Results Test on homepage
[ ] Search Console: submit sitemap (first deploy only)
[ ] Facebook Debugger: scrape homepage
```

---

## 10. Ongoing maintenance

| Task | Frequency |
|------|-----------|
| Add news to `resources/data/news.php` | When published |
| Run `php scripts/seo-audit.php` | Every release |
| Review Search Console crawl/index reports | Monthly |
| Refresh page descriptions in `seo.php` if programmes change | Quarterly |
| Re-test rich results after major template changes | After redesign |
| Check broken links on key pages | Quarterly |

---

## Key files

| Purpose | File |
|---------|------|
| Page titles, descriptions, sitemap hints | `resources/data/seo.php` |
| News content & article SEO | `resources/data/news.php` |
| SEO logic & JSON-LD | `app/Services/SeoService.php` |
| Meta tags in `<head>` | `resources/views/components/seo-head.php` |
| Sitemap & robots | `app/Controllers/SeoController.php` |
| Site contact & social | `resources/data/site.php` |
| Base URL | `.env` → `APP_URL` |
| URL rewriting | `.htaccess` |
| Automated audit | `scripts/seo-audit.php` |
| Route health check | `scripts/smoke-test.php` |

---

## Useful external links

- [Google Search Console](https://search.google.com/search-console)
- [Google Rich Results Test](https://search.google.com/test/rich-results)
- [PageSpeed Insights](https://pagespeed.web.dev/)
- [Mobile-Friendly Test](https://search.google.com/test/mobile-friendly)
- [Facebook Sharing Debugger](https://developers.facebook.com/tools/debug/)
- [Bing Webmaster Tools](https://www.bing.com/webmasters)

---

*Last updated: August 2026 — automated audit: `php scripts/seo-audit.php`*
