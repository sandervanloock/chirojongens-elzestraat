#!/usr/bin/env python3
"""
Generate Image Manifest for Dynamic Loading

This script scans the hero and verhuur image directories and generates
a JSON manifest file that the Angular app uses to dynamically load images.

Usage:
    python3 scripts/generate_manifest.py

Run this script after adding or removing images to update the manifest.
"""

import json
import re
from pathlib import Path

# Configuration
PROJECT_ROOT = Path(__file__).parent.parent
IMAGES_DIR = PROJECT_ROOT / "public" / "assets" / "images"
HERO_DIR = IMAGES_DIR / "hero"
VERHUUR_DIR = IMAGES_DIR / "verhuur"
OUTPUT_FILE = IMAGES_DIR / "manifest.json"

# Supported image extensions
IMAGE_EXTENSIONS = {".jpg", ".jpeg", ".png", ".webp"}


def get_hero_images() -> list[dict]:
  """Scan hero directory and return image list."""
  images = []
  if not HERO_DIR.exists():
    return images

  for file in sorted(HERO_DIR.iterdir()):
    if file.is_file() and file.suffix.lower() in IMAGE_EXTENSIONS:
      # Generate alt text from filename
      name = file.stem.replace("_", " ").replace("-", " ").title()
      images.append({
        "src": f"/assets/images/hero/{file.name}",
        "alt": f"Chiro activiteit - {name}"
      })

  return images


def get_verhuur_images() -> list[dict]:
  """Scan verhuur directory and return image list with thumbnails."""
  images = []
  if not VERHUUR_DIR.exists():
    return images

  # Find all non-thumbnail images (those without -min suffix)
  full_images = {}
  thumbnails = {}

  for file in VERHUUR_DIR.iterdir():
    if file.is_file() and file.suffix.lower() in IMAGE_EXTENSIONS:
      stem = file.stem
      if stem.endswith("-min"):
        # This is a thumbnail
        base_name = stem[:-4]  # Remove -min
        thumbnails[base_name] = file
      else:
        full_images[stem] = file

  # Match full images with their thumbnails
  for name, full_file in sorted(full_images.items()):
    thumb_file = thumbnails.get(name)

    # Generate alt text from filename
    alt_text = re.sub(r'^IMG_\d+', 'Lokaal', name).replace("_", " ").title()

    if thumb_file:
      images.append({
        "src": f"/assets/images/verhuur/{full_file.name}",
        "thumbSrc": f"/assets/images/verhuur/{thumb_file.name}",
        "alt": alt_text
      })
    else:
      # No thumbnail, use full image for both
      images.append({
        "src": f"/assets/images/verhuur/{full_file.name}",
        "thumbSrc": f"/assets/images/verhuur/{full_file.name}",
        "alt": alt_text
      })

  return images


def main():
  print("Generating image manifest...")

  hero_images = get_hero_images()
  verhuur_images = get_verhuur_images()

  manifest = {
    "hero": hero_images,
    "verhuur": verhuur_images
  }

  # Write manifest
  with open(OUTPUT_FILE, "w", encoding="utf-8") as f:
    json.dump(manifest, f, indent=2, ensure_ascii=False)

  print(f"Manifest generated: {OUTPUT_FILE}")
  print(f"  Hero images: {len(hero_images)}")
  print(f"  Verhuur images: {len(verhuur_images)}")


if __name__ == "__main__":
  main()
