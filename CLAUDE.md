  w# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is an Angular 20 standalone application for Chirojongens Elzestraat, a Belgian youth organization. The project is a static website showcasing groups, contact information, and organization details.

## Development Commands

### Running the Application
```bash
npm start          # Start dev server on http://localhost:4200/
ng serve           # Alternative command
```

### Building
```bash
npm run build      # Production build (outputs to dist/)
npm run watch      # Development build with watch mode
```

### Testing
```bash
npm test           # Run unit tests with Karma
ng test            # Alternative command
```

### Code Generation
```bash
ng generate component component-name    # Generate new component
ng generate --help                      # See all available schematics
```

## Architecture

### Standalone Components Architecture
This project uses Angular's modern standalone components architecture (no NgModules). The main app component is `App` in `src/app/app.ts`, which is a self-contained component with all necessary imports declared directly.

### File Naming Convention
- Component class: `app.ts` (not `app.component.ts`)
- Template: `app.html` (not `app.component.html`)
- Styles: `app.scss` (not `app.component.scss`)
- Tests: `app.spec.ts`

This non-standard naming (without `.component` suffix) is intentional for this project.

### Component Structure
The application is currently a single-page application with all sections in the main `App` component:
- **Navigation**: Fixed navbar with smooth scrolling to sections
- **Hero Section**: Full-viewport landing section with gradient background
- **Groups Section**: Cards displaying different age groups (Speelclub, Rakkers, Toppers, Kerels, Aspiranten)
- **Stats Section**: Organization statistics (members, leaders, years active)
- **Contact Section**: Emergency contacts and general contact information
- **Footer**: Social links and copyright

### Design System

The project uses a comprehensive SCSS-based design system located in `src/styles/`:

1. **Variables** (`_variables.scss`):
   - Color palette based on Chiro brand colors (red: #FF5252, blue: #4586ff)
   - 8px-based spacing system ($spacing-xs to $spacing-5xl)
   - Typography system with Inter for body text and Poppins for headings
   - Breakpoints: mobile (<768px), tablet (768px-1024px), desktop (1024px+)
   - Shadows, transitions, z-index layers

2. **Mixins** (`_mixins.scss`):
   - Responsive breakpoint mixins: `mobile-only`, `tablet-up`, `desktop`
   - Layout mixins: `flex-center`, `flex-between`, `container`, `section-padding`
   - Component mixins: `card-base`, `card-hover`, `button-primary`, `button-secondary`
   - Animation mixins: `fade-in`, `slide-up`, `scale-in`, `slide-in-left`, `slide-in-right`
   - Utility mixins: `text-truncate`, `text-clamp`, `gradient-overlay`

3. **Global Styles** (`styles.scss`):
   - Imports design system
   - Global reset and base styles
   - Utility classes for spacing, display, flexbox, grid, backgrounds
   - Animation utilities
   - Smooth scroll behavior

### Styling Approach

- **BEM Methodology**: All components use BEM (Block Element Modifier) naming:
  - `.navbar`, `.navbar__content`, `.navbar__brand`, `.navbar__link`, `.navbar__cta`
  - `.hero`, `.hero__content`, `.hero__title`, `.hero__subtitle`
  - `.group-card`, `.group-card__icon`, `.group-card__name`

- **SCSS @use**: Modern `@use` syntax instead of `@import` for better scoping:
  ```scss
  @use '../styles/variables' as *;
  @use '../styles/mixins' as *;
  ```

- **Component-Scoped Styles**: Each component's styles are in its own `.scss` file using `styleUrl` (not `styleUrls`)

### TypeScript Configuration

The project uses strict TypeScript settings:
- `strict: true`
- `noImplicitOverride: true`
- `noPropertyAccessFromIndexSignature: true`
- `noImplicitReturns: true`
- `noFallthroughCasesInSwitch: true`
- `strictTemplates: true`
- Target: ES2022

### Data Management

All data is currently stored as simple arrays/objects in the component class:
- `navItems`: Navigation menu items with labels, hrefs, and external link flags
- `groups`: Age group information with name, age range, and meeting times
- `stats`: Organization statistics with values and labels

### Smooth Scrolling Implementation

The app implements custom smooth scrolling via the `scrollToSection(href: string)` method that:
1. Checks if href starts with `#`
2. Queries for the element
3. Calls `scrollIntoView({ behavior: 'smooth' })`

This is called from template click handlers with `$event.preventDefault()` to override default anchor behavior.

### Responsive Design

- Mobile-first approach with breakpoints defined in `_variables.scss`
- Navbar menu hidden on mobile (`@include mobile-only { display: none; }`)
- Grid layouts adapt with `grid-template-columns: repeat(auto-fit, minmax(...))`
- Font sizes and spacing reduce on mobile devices

### Package Manager

The project uses **npm** as specified in `angular.json` (`"packageManager": "npm"`).

### Prettier Configuration

Prettier settings are defined in `package.json`:
- Print width: 100
- Single quotes: true
- Special parser for HTML files: "angular"

## Image Assets

### Image Extraction

Images are sourced from PDF and PowerPoint files and need to be extracted before use:

```bash
# One-step extraction (installs dependencies and runs extraction)
./setup_and_extract.sh

# Or manually
pip3 install -r requirements.txt
python3 extract_images.py
```

The extraction script:
- Processes `images-compressed.pdf` and `merged_presentation dianamiddag 2025.pptx`
- Filters for high-quality images (minimum 800px on shortest side)
- Outputs to `public/assets/images/all/`
- Generates `CATEGORIZATION_GUIDE.md` for manual organization

### Image Organization

After extraction, manually categorize images into:
- `public/assets/images/hero/` - High-impact images for headers (pages 186, 194, 89, 9)
- `public/assets/images/groups/` - Action shots for group cards (pages 22, 87, 91, 142, 11, 43)
- `public/assets/images/community/` - Camp life images (pages 216, 220, 12, 13, 4, 5)

See `IMAGE_ANALYSIS.md` for detailed image selection guidance based on content analysis.

### Using Images in Angular

Images in `public/assets/` are referenced as:
```html
<img src="assets/images/hero/filename.jpg" alt="Description" loading="lazy">
```

See `IMAGES_USAGE.md` for complete Angular integration patterns.

## Important Notes

- This is a static website project with no backend or API integrations
- No routing is currently configured (though `RouterOutlet` is imported)
- All external links (Webshop, Inschrijven) point to external domains
- The project uses standalone components exclusively (Angular 20 modern approach)
- Component selector prefix is `app-` as defined in `angular.json`
- Source PDF/PPTX files are gitignored due to large file sizes
