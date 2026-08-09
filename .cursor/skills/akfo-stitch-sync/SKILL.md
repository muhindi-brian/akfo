---
name: akfo-stitch-sync
description: >-
  Sync Google Stitch designs into the AKFO PHP website. Use when updating layouts
  from google_stitch/, extracting HTML, matching DESIGN.md tokens, or fixing visual
  drift between Stitch exports and live pages.
---

# AKFO Stitch Design Sync

## Source of truth

- Designs: `google_stitch/*_agnes_kagure_foundation/code.html`
- Design system: `google_stitch/agnes_kagure_foundation/DESIGN.md`
- Live markup: `resources/views/partials/stitch/{slug}.php`

## Page map

| Stitch folder | Partial slug |
|---------------|--------------|
| home_agnes_kagure_foundation | home |
| about_us_agnes_kagure_foundation | about |
| our_programs_agnes_kagure_foundation | programs |
| our_impact_agnes_kagure_foundation | impact |
| news_stories_agnes_kagure_foundation | news |
| partners_alliances_agnes_kagure_foundation | partners |
| contact_us_agnes_kagure_foundation | contact |
| donate_agnes_kagure_foundation | donate |
| get_involved_agnes_kagure_foundation | get-involved |
| events_calendar_agnes_kagure_foundation | events |
| image_video_gallery_agnes_kagure_foundation | gallery |

## Extraction workflow

```bash
php scripts/extract-stitch-content.php
```

This extracts body content (between sticky header and footer) into `resources/views/partials/stitch/`.

**After extraction, manually verify:**

1. **Forms** — contact, donate, partners, get-involved need CSRF, POST action, input names
2. **No duplicate footers** — partners page historically included an extra footer
3. **No `/public` in URLs** — run bulk fix if needed:
   ```bash
   php -r '$d="resources/views/partials/stitch"; foreach(glob("$d/*.php") as $f){$c=file_get_contents($f); $n=str_replace("/public/","/",$c); if($n!==$c) file_put_contents($f,$n);}'
   ```
4. **News article links** on home — wrap in `<a href="<?= url('/news/{slug}') ?>">`
5. **Buttons → links** for Donate, navigation CTAs using `url()`

## Visual fidelity

- Typography: EB Garamond (headlines), Plus Jakarta Sans (body)
- Colors from `resources/data/design-colors.php` / Tailwind config in `layouts/main.php`
- Use Stitch image URLs unless local assets are added to `public/assets/images/`
- Preserve glass effects, card hover states, responsive breakpoints from Stitch HTML
- Do not redesign UI unless Stitch lacks content — structure for missing org info instead

## Shared chrome

Header, footer, mobile menu live in `resources/views/components/` — **never** re-extract nav/footer into Stitch partials.

## Design tokens (quick reference)

- Primary: `#00512b`
- Primary container: `#0e6b3d`
- Secondary / gold: `#735c00`, `#fed65b`
- Container max: 1280px
- Section padding: 120px

See `DESIGN.md` for full typography and elevation rules.
