# Quick Start Guide
## Get Your Modern Angular Website Running in 15 Minutes

---

## Prerequisites

Make sure you have these installed:
- **Node.js** (v18 or higher): https://nodejs.org/
- **npm** (comes with Node.js)
- **Git** (optional): https://git-scm.com/

Check your versions:
```bash
node --version  # Should be v18+
npm --version   # Should be 8+
```

---

## Step 1: Install Angular CLI (2 minutes)

```bash
npm install -g @angular/cli@latest
```

Verify installation:
```bash
ng version
```

---

## Step 2: Create Your Project (3 minutes)

```bash
# Create new Angular project
ng new chiro-elzestraat-angular \
  --routing=true \
  --style=scss \
  --ssr=false \
  --standalone=true \
  --package-manager=npm

# Navigate to project
cd chiro-elzestraat-angular
```

When prompted:
- "Would you like to add Angular routing?" → **Yes**
- "Which stylesheet format would you like to use?" → **SCSS**

---

## Step 3: Set Up Design System (2 minutes)

### Create styles directory structure:
```bash
mkdir -p src/styles
touch src/styles/_variables.scss
touch src/styles/_mixins.scss
touch src/styles/_typography.scss
```

### Copy the styles from IMPLEMENTATION_GUIDE.md:
1. Open `IMPLEMENTATION_GUIDE.md`
2. Copy content from each style file
3. Paste into corresponding files in `src/styles/`

### Update `src/styles/styles.scss`:
```scss
@use './variables' as *;
@use './mixins' as *;
@use './typography';

// ... rest of the global styles
```

---

## Step 4: Update index.html (1 minute)

Replace `src/index.html` content with:

```html
<!doctype html>
<html lang="nl">
<head>
  <meta charset="utf-8">
  <title>Chiro Elzestraat</title>
  <base href="/">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Chiro Elzestraat - Youth organization">
  <meta name="theme-color" content="#4A90E2">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@600;700&display=swap" rel="stylesheet">

  <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>
<body>
  <app-root></app-root>
</body>
</html>
```

---

## Step 5: Create Components (3 minutes)

### Generate Home Component:
```bash
ng generate component features/home --standalone
```

### Generate Navigation Card Component:
```bash
ng generate component shared/components/navigation-card --standalone
```

---

## Step 6: Add Component Code (3 minutes)

### Copy code from IMPLEMENTATION_GUIDE.md for:

1. **Home Component** (`src/app/features/home/`)
   - Copy TypeScript code to `home.component.ts`
   - Copy HTML to `home.component.html`
   - Copy SCSS to `home.component.scss`

2. **Navigation Card Component** (`src/app/shared/components/navigation-card/`)
   - Copy TypeScript code to `navigation-card.component.ts`
   - Copy HTML to `navigation-card.component.html`
   - Copy SCSS to `navigation-card.component.scss`

3. **App Routes** (`src/app/app.routes.ts`)
   - Replace with routing code from guide

---

## Step 7: Start Development Server (1 minute)

```bash
ng serve --open
```

Your browser should open automatically to `http://localhost:4200`

---

## Troubleshooting

### Port already in use?
```bash
ng serve --port 4201
```

### Missing dependencies?
```bash
npm install
```

### TypeScript errors?
```bash
# Clear cache and rebuild
rm -rf node_modules
npm install
```

### Can't find modules?
Make sure all imports use correct paths:
```typescript
import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
```

---

## Next Steps

### Customize Your Site:
1. Update URLs in `home.component.ts`
2. Change colors in `src/styles/_variables.scss`
3. Modify text content in `home.component.html`
4. Add your logo to `src/assets/images/`

### Build for Production:
```bash
ng build --configuration production
```

Output will be in `dist/chiro-elzestraat-angular/browser/`

### Deploy:
- **Netlify**: Drag and drop the `dist/` folder
- **Vercel**: Run `vercel --prod`
- **GitHub Pages**: Run `ngh --dir=dist/chiro-elzestraat-angular/browser`

---

## File Structure Reference

```
chiro-elzestraat-angular/
├── src/
│   ├── app/
│   │   ├── features/
│   │   │   └── home/
│   │   │       ├── home.component.ts
│   │   │       ├── home.component.html
│   │   │       └── home.component.scss
│   │   ├── shared/
│   │   │   └── components/
│   │   │       └── navigation-card/
│   │   │           ├── navigation-card.component.ts
│   │   │           ├── navigation-card.component.html
│   │   │           └── navigation-card.component.scss
│   │   ├── app.component.ts
│   │   ├── app.component.html
│   │   ├── app.component.scss
│   │   └── app.routes.ts
│   ├── styles/
│   │   ├── _variables.scss
│   │   ├── _mixins.scss
│   │   ├── _typography.scss
│   │   └── styles.scss
│   └── index.html
├── angular.json
└── package.json
```

---

## Getting Help

### Documentation:
- **Angular Docs**: https://angular.dev
- **Design Spec**: See `DESIGN_SPECIFICATION.md`
- **Full Guide**: See `IMPLEMENTATION_GUIDE.md`

### Common Issues:
- Check Node.js version (needs v18+)
- Clear browser cache
- Run `npm install` to ensure dependencies
- Check console for errors (F12 in browser)

---

## Success Checklist

- [ ] Angular CLI installed
- [ ] Project created
- [ ] Development server running
- [ ] Home page displays correctly
- [ ] Navigation cards clickable
- [ ] Responsive on mobile
- [ ] No console errors

---

**Estimated Time: 15 minutes**

Once complete, you'll have a modern, fast, and beautiful Angular website! 🎉
