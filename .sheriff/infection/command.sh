#!/usr/bin/env bash
set -euo pipefail

CONFIG=".sheriff/infection/infection.json5"

if [ ! -f "$CONFIG" ]; then
  echo "Infection config not found: $CONFIG"
  exit 1
fi

INFECTION_BIN="$(.sheriff/_composer.sh infection)"

exec .sheriff/_skip_if_empty.sh src '*.php' Infection -- \
  env XDEBUG_MODE=coverage \
  "$INFECTION_BIN" \
  --configuration="$CONFIG" \
  --threads=max
