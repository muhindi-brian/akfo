#!/usr/bin/env bash
# Build a production upload zip (excludes dev-only files).
set -euo pipefail

ROOT="$(cd "$(dirname "$0")/.." && pwd)"
OUT_DIR="$ROOT/dist"
STAMP="$(date +%Y%m%d-%H%M%S)"
ARCHIVE="$OUT_DIR/akfo-portal-deploy-${STAMP}.zip"
LATEST="$OUT_DIR/akfo-portal-deploy-latest.zip"

mkdir -p "$OUT_DIR"

cd "$ROOT"

zip -r "$ARCHIVE" . \
  -x "*.git*" \
  -x "*node_modules/*" \
  -x "*vendor/*" \
  -x ".env" \
  -x ".cursor/*" \
  -x "google_stitch/*" \
  -x "dist/*" \
  -x "storage/logs/*" \
  -x "storage/cache/*" \
  -x "*.DS_Store" \
  -x "agent-transcripts/*" \
  -x ".agents/*"

cp -f "$ARCHIVE" "$LATEST"

echo ""
echo "Created: $ARCHIVE"
echo "Latest:  $LATEST"
echo ""
echo "Upload to cPanel, extract at domain root, then:"
echo "  1. cp .env.production.example .env  (edit APP_KEY if needed)"
echo "  2. chmod 755 storage storage/logs public/uploads"
echo "  3. Purge Cloudflare cache"
echo "  4. php scripts/seo-audit.php --production  (from SSH, or run locally)"
