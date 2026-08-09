---
name: akfo-qa
description: >-
  QA and smoke-test the Agnes Kagure Foundation website. Use before marking AKFO
  work complete, after route changes, form updates, or Stitch syncs.
---

# AKFO QA Checklist

## Automated smoke test

```bash
php scripts/smoke-test.php
```

All routes should return HTTP 200 (404 test → 404). Pages should have unique `<title>` tags.

## Manual checks

### Routing
- [ ] No `.php` in browser URLs
- [ ] No `/public` in browser URLs or internal links
- [ ] All nav items resolve to real pages
- [ ] `/news/{slug}` works for each article in `resources/data/news.php`
- [ ] 404 page renders with layout

### Layout & assets
- [ ] Header/footer consistent on every page
- [ ] Mobile menu opens/closes (keyboard Escape)
- [ ] CSS/JS load from `/assets/...` (not `/public/assets/...`)
- [ ] Images load; `data-alt` promoted to `alt` via main.js
- [ ] No horizontal scroll on mobile widths

### Forms
- [ ] POST /contact, /donate, /partners, /get-involved validate empty fields
- [ ] CSRF rejection on missing token
- [ ] Success message after valid submit
- [ ] JSON file created in `storage/messages/`

### SEO
- [ ] Unique title + meta description per page
- [ ] `/robots.txt` and `/sitemap.xml` accessible
- [ ] Canonical and Open Graph tags in layout

### Security
- [ ] `.env` not web-accessible
- [ ] `storage/` blocked
- [ ] No PHP errors displayed when `APP_DEBUG=false`

## Common regressions

| Symptom | Fix |
|---------|-----|
| 404 empty body | Router must `echo` ErrorController response |
| Assets 404 | Check root `.htaccess` `assets/` rewrite |
| Wrong base URL | Update `APP_URL` in `.env` |
| Forms don't submit | Re-apply CSRF/action after Stitch extract |
| `/public` in links | Re-run URL strip or fix `APP_URL` |
