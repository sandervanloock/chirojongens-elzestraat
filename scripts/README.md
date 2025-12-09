# Image Processing Scripts

Scripts for processing and organizing images for the Chirojongens Elzestraat website.

## Prerequisites

Install the required Python package:

```bash
pip3 install Pillow
```

## process_images.py

Processes images from the base images folder (`public/assets/images/`) and sorts them into either `hero/` or `verhuur/` directories with automatic cropping, resizing, and web optimization.

### Image Specifications

| Type    | Dimensions | Aspect Ratio | Quality | Use Case                 |
|---------|------------|--------------|---------|--------------------------|
| Hero    | 1920x1080  | 16:9         | 85%     | Full-width banner images |
| Verhuur | 1200x800   | 3:2          | 85%     | Gallery/thumbnail images |

### Usage

#### Interactive Mode (default)

Process images one by one with prompts:

```bash
python3 process_images.py
```

You'll be shown each image and asked to choose:

- `h` - Process as hero image (1920x1080, 16:9)
- `v` - Process as verhuur image (1200x800, 3:2)
- `s` - Skip the image
- `q` - Quit

After selecting a destination, you'll be prompted for a **friendly name** (e.g., `kamp_2024`, `groepsfoto`). Press Enter to keep the original filename.

#### Batch Mode

Process all images automatically to a single destination with sequential naming:

```bash
# Process all as hero images -> hero-1.webp, hero-2.webp, ...
python3 scripts/process_images.py --auto-hero

# Process all as verhuur images -> verhuur-1-min.webp, verhuur-2-min.webp, ...
python3 scripts/process_images.py --auto-verhuur
```

Batch mode automatically numbers files sequentially and avoids conflicts with existing files.

### How It Works

1. **Reads** all images from `public/assets/images/` (root level only)
2. **Smart crops** to the target aspect ratio:
  - Centers the crop horizontally
  - Biases crop toward top third vertically (better for people/action shots)
3. **Resizes** to target dimensions using high-quality Lanczos resampling
4. **Converts** to WebP format with 85% quality (better compression than JPEG)
5. **Saves** to the appropriate subdirectory

### Supported Input Formats

- JPEG (.jpg, .jpeg)
- PNG (.png)
- WebP (.webp)

All images are converted to WebP for optimal web performance.

### Example Workflow

1. Drop new images into `public/assets/images/`
2. Run the script: `python3 scripts/process_images.py`
3. For each image, decide if it's a hero or verhuur image
4. Processed images appear in the appropriate subdirectory
5. Original images remain in the base folder (delete manually if needed)

### Output Naming

**Interactive mode:**

- Custom name provided: `{friendly_name}.webp` or `{friendly_name}-min.webp`
- No name provided: Uses original filename (sanitized)

**Batch mode:**

- Hero images: `hero-1.webp`, `hero-2.webp`, ...
- Verhuur images: `verhuur-1-min.webp`, `verhuur-2-min.webp`, ...

Filenames are automatically sanitized (lowercase, spaces replaced with underscores, special characters removed).

## generate_manifest.py

Generates a JSON manifest of all available images for dynamic loading by the Angular app.

### Usage

```bash
python3 scripts/generate_manifest.py
```

### When to Run

Run this script after:

- Adding new images to the `hero/` or `verhuur/` directories
- Removing images from these directories
- Running `process_images.py` to add new images

### Output

Creates `public/assets/images/manifest.json` containing:

- List of hero images (shuffled randomly on page load)
- List of verhuur images with thumbnail references

### Complete Workflow

1. Drop raw images into `public/assets/images/`
2. Process them: `python3 scripts/process_images.py`
3. Generate manifest: `python3 scripts/generate_manifest.py`
4. Build/serve the app to see the changes
