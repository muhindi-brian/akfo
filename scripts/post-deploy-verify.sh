#!/usr/bin/env bash
# Run after uploading to production.
set -euo pipefail

ROOT="$(cd "$(dirname "$0")/.." && pwd)"
cd "$ROOT"

echo "=== Smoke test (local routes) ==="
php scripts/smoke-test.php

echo ""
echo "=== SEO audit (production) ==="
php scripts/seo-audit.php --production

echo ""
echo "=== Manual checks ==="
echo "  • https://agneskagurefoundation.org/sitemap.xml"
echo "  • https://agneskagurefoundation.org/robots.txt"
echo "  • Google Search Console → add property → submit sitemap"
echo "  • https://developers.facebook.com/tools/debug/ → scrape homepage URL"
