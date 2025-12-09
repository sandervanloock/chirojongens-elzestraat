#!/usr/bin/env python3
"""
Image Processing Script for Chirojongens Elzestraat Website

This script processes images from the base images folder, allowing interactive
sorting into 'hero' or 'verhuur' directories with automatic cropping, resizing,
and web optimization.

Usage:
    python3 process_images.py [--auto-hero | --auto-verhuur]

Options:
    --auto-hero     Automatically process all images as hero images
    --auto-verhuur  Automatically process all images as verhuur images
    (no option)     Interactive mode - prompts for each image
"""

import os
import sys
from PIL import Image
from pathlib import Path

# Configuration
IMAGES_BASE_DIR = Path(__file__).parent.parent / "public" / "assets" / "images"
HERO_DIR = IMAGES_BASE_DIR / "hero"
VERHUUR_DIR = IMAGES_BASE_DIR / "verhuur"

# Hero image settings (wide format for full-width banners)
HERO_CONFIG = {
  "width": 1920,
  "height": 1080,
  "aspect_ratio": 16 / 9,
  "quality": 85,
  "suffix": "",
}

# Verhuur image settings (gallery images)
VERHUUR_CONFIG = {
  "width": 1200,
  "height": 800,
  "aspect_ratio": 3 / 2,
  "quality": 85,
  "suffix": "-min",
}

# Supported image extensions
SUPPORTED_EXTENSIONS = {".jpg", ".jpeg", ".png", ".webp"}


def get_images_to_process() -> list[Path]:
  """Get all images in the base images directory (not in subdirectories)."""
  images = []
  for file in IMAGES_BASE_DIR.iterdir():
    if file.is_file() and file.suffix.lower() in SUPPORTED_EXTENSIONS:
      images.append(file)
  return sorted(images)


def smart_crop(image: Image.Image, target_aspect: float) -> Image.Image:
  """
  Smart crop an image to the target aspect ratio.
  Centers the crop and tries to preserve the most important parts.
  """
  width, height = image.size
  current_aspect = width / height

  if abs(current_aspect - target_aspect) < 0.01:
    # Already close enough to target aspect ratio
    return image

  if current_aspect > target_aspect:
    # Image is wider than target - crop sides
    new_width = int(height * target_aspect)
    left = (width - new_width) // 2
    return image.crop((left, 0, left + new_width, height))
  else:
    # Image is taller than target - crop top/bottom (bias toward top)
    new_height = int(width / target_aspect)
    # Bias crop toward top third for people/action shots
    top = min((height - new_height) // 3, height - new_height)
    return image.crop((0, top, width, top + new_height))


def sanitize_filename(name: str) -> str:
  """Sanitize a filename by removing/replacing invalid characters."""
  # Replace spaces with underscores
  name = name.replace(" ", "_")
  # Keep only alphanumeric, underscore, and hyphen
  sanitized = "".join(c for c in name if c.isalnum() or c in "_-")
  return sanitized.lower()


def process_image(
  source_path: Path, dest_dir: Path, config: dict, output_name: str | None = None
) -> Path | None:
  """
  Process a single image: crop, resize, and optimize.

  Args:
      source_path: Path to the source image
      dest_dir: Destination directory
      config: Processing configuration dict
      output_name: Custom output filename (without extension). If None, uses original name.

  Returns:
      Path to the processed image, or None if processing failed
  """
  try:
    with Image.open(source_path) as img:
      # Convert to RGB if necessary (for PNG with transparency)
      if img.mode in ("RGBA", "P"):
        img = img.convert("RGB")

      # Smart crop to target aspect ratio
      cropped = smart_crop(img, config["aspect_ratio"])

      # Resize to target dimensions
      resized = cropped.resize(
        (config["width"], config["height"]), Image.Resampling.LANCZOS
      )

      # Generate output filename
      if output_name:
        stem = sanitize_filename(output_name)
      else:
        stem = source_path.stem
        # Remove existing suffixes like -min
        if stem.endswith("-min"):
          stem = stem[:-4]

      output_filename = f"{stem}{config['suffix']}.webp"
      output_path = dest_dir / output_filename

      # Save as WebP for better compression
      resized.save(output_path, "WEBP", quality=config["quality"], method=6)

      return output_path

  except Exception as e:
    print(f"  Error processing {source_path.name}: {e}")
    return None


def get_image_info(image_path: Path) -> str:
  """Get basic info about an image."""
  try:
    with Image.open(image_path) as img:
      width, height = img.size
      size_kb = image_path.stat().st_size / 1024
      aspect = width / height
      return f"{width}x{height} ({aspect:.2f}), {size_kb:.0f}KB"
  except Exception:
    return "Unable to read image info"


def interactive_mode(images: list[Path]) -> None:
  """Process images interactively, asking user for destination and name."""
  print("\n" + "=" * 60)
  print("Interactive Image Processing")
  print("=" * 60)
  print(f"\nFound {len(images)} image(s) to process.\n")
  print("For each image, enter:")
  print("  h = hero (wide banner format, 1920x1080)")
  print("  v = verhuur (gallery format, 1200x800)")
  print("  s = skip (don't process)")
  print("  q = quit\n")

  processed = 0
  skipped = 0

  for i, image in enumerate(images, 1):
    info = get_image_info(image)
    print(f"\n[{i}/{len(images)}] {image.name}")
    print(f"  Info: {info}")

    while True:
      choice = input("  Destination (h/v/s/q): ").strip().lower()

      if choice == "q":
        print(f"\nQuitting. Processed {processed} image(s), skipped {skipped}.")
        return

      if choice == "s":
        print("  Skipped.")
        skipped += 1
        break

      if choice in ("h", "v"):
        # Prompt for friendly name
        friendly_name = input("  Friendly name (e.g. 'kamp_2024', press Enter to skip): ").strip()
        output_name = friendly_name if friendly_name else None

        if choice == "h":
          result = process_image(image, HERO_DIR, HERO_CONFIG, output_name)
        else:
          result = process_image(image, VERHUUR_DIR, VERHUUR_CONFIG, output_name)

        if result:
          print(f"  Saved to: {result.relative_to(IMAGES_BASE_DIR)}")
          processed += 1
        break

      print("  Invalid choice. Enter h, v, s, or q.")

  print(f"\nDone! Processed {processed} image(s), skipped {skipped}.")


def batch_mode(images: list[Path], dest_type: str) -> None:
  """Process all images to a single destination type with sequential naming."""
  if dest_type == "hero":
    dest_dir = HERO_DIR
    config = HERO_CONFIG
    prefix = "hero"
  else:
    dest_dir = VERHUUR_DIR
    config = VERHUUR_CONFIG
    prefix = "verhuur"

  print(f"\nProcessing {len(images)} image(s) as {prefix} images...")

  # Find existing numbered files to avoid conflicts
  existing = list(dest_dir.glob(f"{prefix}-*.webp"))
  if existing:
    numbers = []
    for f in existing:
      try:
        num = int(f.stem.replace(f"{prefix}-", "").replace("-min", ""))
        numbers.append(num)
      except ValueError:
        pass
    start_num = max(numbers) + 1 if numbers else 1
  else:
    start_num = 1

  processed = 0
  for i, image in enumerate(images, start_num):
    output_name = f"{prefix}-{i}"
    print(f"  Processing: {image.name}...", end=" ")
    result = process_image(image, dest_dir, config, output_name)
    if result:
      print(f"OK -> {result.name}")
      processed += 1
    else:
      print("FAILED")

  print(f"\nDone! Processed {processed}/{len(images)} image(s).")


def main():
  # Handle --help before anything else
  if len(sys.argv) > 1 and sys.argv[1].lower() in ("--help", "-h"):
    print(__doc__)
    sys.exit(0)

  # Ensure output directories exist
  HERO_DIR.mkdir(parents=True, exist_ok=True)
  VERHUUR_DIR.mkdir(parents=True, exist_ok=True)

  # Get images to process
  images = get_images_to_process()

  if not images:
    print("No images found in the base images directory.")
    print(f"  Looking in: {IMAGES_BASE_DIR}")
    print(f"  Supported formats: {', '.join(SUPPORTED_EXTENSIONS)}")
    sys.exit(0)

  # Parse command line arguments
  if len(sys.argv) > 1:
    arg = sys.argv[1].lower()
    if arg == "--auto-hero":
      batch_mode(images, "hero")
    elif arg == "--auto-verhuur":
      batch_mode(images, "verhuur")
    else:
      print(f"Unknown option: {arg}")
      print("Use --help for usage information.")
      sys.exit(1)
  else:
    interactive_mode(images)


if __name__ == "__main__":
  main()
