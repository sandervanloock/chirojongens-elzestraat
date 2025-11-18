# Angular Website Implementation Guide
## Chiro Elzestraat - Step-by-Step Code Examples

---

## Table of Contents
1. [Initial Setup](#initial-setup)
2. [Project Configuration](#project-configuration)
3. [Design System](#design-system)
4. [Component Implementation](#component-implementation)
5. [Routing Setup](#routing-setup)
6. [Build & Deployment](#build--deployment)

---

## Initial Setup

### 1. Install Angular CLI

```bash
# Install latest Angular CLI globally
npm install -g @angular/cli@latest

# Verify installation
ng version
```

### 2. Create New Project

```bash
# Create Angular project in new directory
ng new chiro-elzestraat-angular \
  --routing=true \
  --style=scss \
  --ssr=false \
  --standalone=true \
  --package-manager=npm

# Navigate to project
cd chiro-elzestraat-angular

# Start development server
ng serve
```

Visit `http://localhost:4200` to see the default Angular app.

---

## Project Configuration

### 1. Update `angular.json`

Add build optimizations:

```json
{
  "projects": {
    "chiro-elzestraat-angular": {
      "architect": {
        "build": {
          "configurations": {
            "production": {
              "optimization": true,
              "outputHashing": "all",
              "sourceMap": false,
              "namedChunks": false,
              "extractLicenses": true,
              "vendorChunk": false,
              "buildOptimizer": true,
              "budgets": [
                {
                  "type": "initial",
                  "maximumWarning": "500kb",
                  "maximumError": "1mb"
                },
                {
                  "type": "anyComponentStyle",
                  "maximumWarning": "2kb",
                  "maximumError": "4kb"
                }
              ]
            }
          }
        }
      }
    }
  }
}
```

### 2. Update `index.html`

```html
<!doctype html>
<html lang="nl">
<head>
  <meta charset="utf-8">
  <title>Chiro Elzestraat</title>
  <base href="/">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Chiro Elzestraat - Youth organization for boys and girls">
  <meta name="theme-color" content="#4A90E2">

  <!-- Preconnect to Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@600;700&display=swap" rel="stylesheet">

  <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>
<body>
  <app-root></app-root>
</body>
</html>
```

---

## Design System

### 1. Create SCSS Structure

Create these files in `src/styles/`:

**`src/styles/_variables.scss`**
```scss
// ============================================
// COLOR PALETTE
// ============================================

// Primary Colors
$primary-blue: #4A90E2;
$vibrant-orange: #FF6B35;
$warm-beige: #F5E6D3;
$deep-navy: #2C3E50;

// Section Colors
$boys-blue: #5DADE2;
$girls-coral: #EC7063;

// Neutrals
$white: #FFFFFF;
$light-gray: #F8F9FA;
$medium-gray: #6C757D;
$dark-gray: #343A40;
$black: #000000;

// Semantic Colors
$success: #28A745;
$warning: #FFC107;
$error: #DC3545;
$info: #17A2B8;

// ============================================
// SPACING
// ============================================

$spacing-xs: 0.25rem;   // 4px
$spacing-sm: 0.5rem;    // 8px
$spacing-md: 1rem;      // 16px
$spacing-lg: 1.5rem;    // 24px
$spacing-xl: 2rem;      // 32px
$spacing-2xl: 3rem;     // 48px
$spacing-3xl: 4rem;     // 64px
$spacing-4xl: 6rem;     // 96px

// ============================================
// TYPOGRAPHY
// ============================================

// Font Families
$font-primary: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
$font-display: 'Poppins', sans-serif;

// Font Sizes
$font-size-xs: 0.75rem;    // 12px
$font-size-sm: 0.875rem;   // 14px
$font-size-base: 1rem;     // 16px
$font-size-lg: 1.125rem;   // 18px
$font-size-xl: 1.25rem;    // 20px
$font-size-2xl: 1.5rem;    // 24px
$font-size-3xl: 2rem;      // 32px
$font-size-4xl: 2.5rem;    // 40px
$font-size-5xl: 3.5rem;    // 56px

// Font Weights
$font-weight-light: 300;
$font-weight-regular: 400;
$font-weight-medium: 500;
$font-weight-semibold: 600;
$font-weight-bold: 700;

// Line Heights
$line-height-tight: 1.2;
$line-height-normal: 1.5;
$line-height-relaxed: 1.8;

// ============================================
// BREAKPOINTS
// ============================================

$breakpoint-xs: 0;
$breakpoint-sm: 576px;
$breakpoint-md: 768px;
$breakpoint-lg: 1024px;
$breakpoint-xl: 1440px;

// ============================================
// BORDERS & RADIUS
// ============================================

$border-radius-sm: 0.25rem;
$border-radius-md: 0.5rem;
$border-radius-lg: 1rem;
$border-radius-xl: 1.5rem;
$border-radius-full: 9999px;

// ============================================
// SHADOWS
// ============================================

$shadow-sm: 0 1px 2px rgba(0, 0, 0, 0.05);
$shadow-md: 0 4px 6px rgba(0, 0, 0, 0.1);
$shadow-lg: 0 10px 15px rgba(0, 0, 0, 0.1);
$shadow-xl: 0 20px 25px rgba(0, 0, 0, 0.15);

// ============================================
// TRANSITIONS
// ============================================

$transition-fast: 150ms ease;
$transition-base: 250ms ease;
$transition-slow: 350ms ease;

// ============================================
// Z-INDEX
// ============================================

$z-index-dropdown: 1000;
$z-index-sticky: 1020;
$z-index-fixed: 1030;
$z-index-modal-backdrop: 1040;
$z-index-modal: 1050;
$z-index-popover: 1060;
$z-index-tooltip: 1070;
```

**`src/styles/_mixins.scss`**
```scss
@use './variables' as *;

// ============================================
// RESPONSIVE BREAKPOINTS
// ============================================

@mixin mobile-only {
  @media (max-width: $breakpoint-md - 1) {
    @content;
  }
}

@mixin tablet {
  @media (min-width: $breakpoint-md) and (max-width: $breakpoint-lg - 1) {
    @content;
  }
}

@mixin tablet-up {
  @media (min-width: $breakpoint-md) {
    @content;
  }
}

@mixin desktop {
  @media (min-width: $breakpoint-lg) {
    @content;
  }
}

@mixin desktop-xl {
  @media (min-width: $breakpoint-xl) {
    @content;
  }
}

// ============================================
// FLEXBOX UTILITIES
// ============================================

@mixin flex-center {
  display: flex;
  justify-content: center;
  align-items: center;
}

@mixin flex-between {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

@mixin flex-column {
  display: flex;
  flex-direction: column;
}

// ============================================
// CARD EFFECTS
// ============================================

@mixin card-hover {
  transition: transform $transition-base, box-shadow $transition-base;

  &:hover {
    transform: translateY(-8px);
    box-shadow: $shadow-xl;
  }
}

@mixin card-base {
  background: $white;
  border-radius: $border-radius-lg;
  padding: $spacing-xl;
  box-shadow: $shadow-md;
}

// ============================================
// TEXT UTILITIES
// ============================================

@mixin text-truncate {
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
}

@mixin text-clamp($lines: 2) {
  display: -webkit-box;
  -webkit-line-clamp: $lines;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

// ============================================
// GRADIENTS
// ============================================

@mixin gradient-blue {
  background: linear-gradient(135deg, $primary-blue 0%, $boys-blue 100%);
}

@mixin gradient-coral {
  background: linear-gradient(135deg, $vibrant-orange 0%, $girls-coral 100%);
}

@mixin gradient-warm {
  background: linear-gradient(135deg, $warm-beige 0%, lighten($warm-beige, 5%) 100%);
}

// ============================================
// ANIMATIONS
// ============================================

@mixin fade-in($duration: $transition-base) {
  animation: fadeIn $duration ease-in;

  @keyframes fadeIn {
    from {
      opacity: 0;
    }
    to {
      opacity: 1;
    }
  }
}

@mixin slide-up($duration: $transition-base) {
  animation: slideUp $duration ease-out;

  @keyframes slideUp {
    from {
      opacity: 0;
      transform: translateY(20px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
}

// ============================================
// ACCESSIBILITY
// ============================================

@mixin sr-only {
  position: absolute;
  width: 1px;
  height: 1px;
  padding: 0;
  margin: -1px;
  overflow: hidden;
  clip: rect(0, 0, 0, 0);
  white-space: nowrap;
  border-width: 0;
}

@mixin focus-visible {
  &:focus-visible {
    outline: 2px solid $primary-blue;
    outline-offset: 2px;
  }
}
```

**`src/styles/_typography.scss`**
```scss
@use './variables' as *;

// ============================================
// BASE TYPOGRAPHY
// ============================================

body {
  font-family: $font-primary;
  font-size: $font-size-base;
  font-weight: $font-weight-regular;
  line-height: $line-height-normal;
  color: $dark-gray;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

// ============================================
// HEADINGS
// ============================================

h1, h2, h3, h4, h5, h6 {
  font-family: $font-display;
  font-weight: $font-weight-bold;
  line-height: $line-height-tight;
  margin: 0;
  color: $deep-navy;
}

h1 {
  font-size: $font-size-5xl;

  @media (max-width: $breakpoint-md - 1) {
    font-size: $font-size-4xl;
  }
}

h2 {
  font-size: $font-size-4xl;

  @media (max-width: $breakpoint-md - 1) {
    font-size: $font-size-3xl;
  }
}

h3 {
  font-size: $font-size-3xl;

  @media (max-width: $breakpoint-md - 1) {
    font-size: $font-size-2xl;
  }
}

h4 {
  font-size: $font-size-2xl;
}

h5 {
  font-size: $font-size-xl;
}

h6 {
  font-size: $font-size-lg;
}

// ============================================
// TEXT ELEMENTS
// ============================================

p {
  margin: 0 0 $spacing-md;

  &:last-child {
    margin-bottom: 0;
  }
}

a {
  color: $primary-blue;
  text-decoration: none;
  transition: color $transition-fast;

  &:hover {
    color: darken($primary-blue, 10%);
  }

  &:focus-visible {
    outline: 2px solid $primary-blue;
    outline-offset: 2px;
  }
}

strong, b {
  font-weight: $font-weight-bold;
}

em, i {
  font-style: italic;
}

// ============================================
// UTILITY CLASSES
// ============================================

.text-center {
  text-align: center;
}

.text-left {
  text-align: left;
}

.text-right {
  text-align: right;
}

.text-primary {
  color: $primary-blue;
}

.text-secondary {
  color: $medium-gray;
}

.text-muted {
  color: $medium-gray;
}
```

**`src/styles/styles.scss`**
```scss
@use './variables' as *;
@use './mixins' as *;
@use './typography';

// ============================================
// GLOBAL RESET
// ============================================

*,
*::before,
*::after {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

html {
  font-size: 16px;
  scroll-behavior: smooth;
}

body {
  min-height: 100vh;
  background-color: $light-gray;
}

// ============================================
// UTILITY CLASSES
// ============================================

.container {
  width: 100%;
  max-width: 1280px;
  margin: 0 auto;
  padding: 0 $spacing-lg;

  @include mobile-only {
    padding: 0 $spacing-md;
  }
}

.section {
  padding: $spacing-4xl 0;

  @include mobile-only {
    padding: $spacing-3xl 0;
  }
}

// Spacing utilities
.mt-sm { margin-top: $spacing-sm; }
.mt-md { margin-top: $spacing-md; }
.mt-lg { margin-top: $spacing-lg; }
.mt-xl { margin-top: $spacing-xl; }

.mb-sm { margin-bottom: $spacing-sm; }
.mb-md { margin-bottom: $spacing-md; }
.mb-lg { margin-bottom: $spacing-lg; }
.mb-xl { margin-bottom: $spacing-xl; }

// Display utilities
.d-none { display: none; }
.d-block { display: block; }
.d-flex { display: flex; }
.d-grid { display: grid; }

// ============================================
// ANIMATIONS
// ============================================

@keyframes fadeIn {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}

@keyframes slideUp {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes float {
  0%, 100% {
    transform: translateY(0);
  }
  50% {
    transform: translateY(-10px);
  }
}

.fade-in {
  animation: fadeIn 0.5s ease-in;
}

.slide-up {
  animation: slideUp 0.5s ease-out;
}
```

---

## Component Implementation

### 1. App Component

**`src/app/app.component.ts`**
```typescript
import { Component } from '@angular/core';
import { RouterOutlet } from '@angular/router';

@Component({
  selector: 'app-root',
  standalone: true,
  imports: [RouterOutlet],
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.scss']
})
export class AppComponent {
  title = 'Chiro Elzestraat';
}
```

**`src/app/app.component.html`**
```html
<main>
  <router-outlet></router-outlet>
</main>
```

**`src/app/app.component.scss`**
```scss
main {
  min-height: 100vh;
  display: flex;
  flex-direction: column;
}
```

### 2. Home Component

Create the component:
```bash
ng generate component features/home --standalone
```

**`src/app/features/home/home.component.ts`**
```typescript
import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { NavigationCardComponent } from '../../shared/components/navigation-card/navigation-card.component';

interface NavigationCard {
  title: string;
  subtitle: string;
  icon: string;
  url: string;
  color: 'blue' | 'coral';
}

@Component({
  selector: 'app-home',
  standalone: true,
  imports: [CommonModule, NavigationCardComponent],
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss']
})
export class HomeComponent {
  navigationCards: NavigationCard[] = [
    {
      title: 'Chirojongens',
      subtitle: 'Elzestraat',
      icon: 'male',
      url: 'http://chirojongens.chiroelzestraat.be',
      color: 'blue'
    },
    {
      title: 'Chiromeisjes',
      subtitle: 'Elzestraat',
      icon: 'female',
      url: 'https://chiromeisjeselzestraat.be/',
      color: 'coral'
    }
  ];
}
```

**`src/app/features/home/home.component.html`**
```html
<div class="home">
  <div class="hero">
    <div class="hero__content">
      <h1 class="hero__title fade-in">Chiro Elzestraat</h1>
      <p class="hero__subtitle slide-up">Welkom bij onze jeugdbeweging</p>
    </div>
  </div>

  <div class="navigation">
    <div class="navigation__container">
      <h2 class="navigation__heading">Ga verder naar</h2>

      <div class="navigation__cards">
        <app-navigation-card
          *ngFor="let card of navigationCards; let i = index"
          [title]="card.title"
          [subtitle]="card.subtitle"
          [icon]="card.icon"
          [url]="card.url"
          [color]="card.color"
          [animationDelay]="i * 150"
        ></app-navigation-card>
      </div>
    </div>
  </div>

  <footer class="footer">
    <p class="footer__text">© {{ currentYear }} Chiro Elzestraat. Alle rechten voorbehouden.</p>
  </footer>
</div>
```

**`src/app/features/home/home.component.scss`**
```scss
@use '../../../styles/variables' as *;
@use '../../../styles/mixins' as *;

.home {
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  background: linear-gradient(135deg, $warm-beige 0%, lighten($warm-beige, 5%) 100%);
}

// ============================================
// HERO SECTION
// ============================================

.hero {
  @include flex-center;
  min-height: 40vh;
  padding: $spacing-3xl $spacing-lg;

  @include mobile-only {
    min-height: 30vh;
    padding: $spacing-2xl $spacing-md;
  }

  &__content {
    text-align: center;
    max-width: 800px;
  }

  &__title {
    font-size: $font-size-5xl;
    font-weight: $font-weight-bold;
    color: $deep-navy;
    margin-bottom: $spacing-lg;
    animation: fadeIn 0.8s ease-in;

    @include mobile-only {
      font-size: $font-size-4xl;
    }
  }

  &__subtitle {
    font-size: $font-size-xl;
    color: $medium-gray;
    font-weight: $font-weight-regular;
    animation: slideUp 0.8s ease-out 0.2s both;

    @include mobile-only {
      font-size: $font-size-lg;
    }
  }
}

// ============================================
// NAVIGATION SECTION
// ============================================

.navigation {
  flex: 1;
  display: flex;
  align-items: center;
  padding: $spacing-2xl $spacing-lg;

  @include mobile-only {
    padding: $spacing-xl $spacing-md;
  }

  &__container {
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
  }

  &__heading {
    text-align: center;
    font-size: $font-size-3xl;
    color: $deep-navy;
    margin-bottom: $spacing-3xl;

    @include mobile-only {
      font-size: $font-size-2xl;
      margin-bottom: $spacing-2xl;
    }
  }

  &__cards {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: $spacing-2xl;

    @include mobile-only {
      grid-template-columns: 1fr;
      gap: $spacing-xl;
    }
  }
}

// ============================================
// FOOTER
// ============================================

.footer {
  padding: $spacing-xl;
  text-align: center;
  background-color: rgba($white, 0.5);

  &__text {
    color: $medium-gray;
    font-size: $font-size-sm;
  }
}
```

Update the component TypeScript to include the current year:
```typescript
export class HomeComponent {
  currentYear = new Date().getFullYear();

  navigationCards: NavigationCard[] = [
    // ... cards
  ];
}
```

### 3. Navigation Card Component

Create the component:
```bash
ng generate component shared/components/navigation-card --standalone
```

**`src/app/shared/components/navigation-card/navigation-card.component.ts`**
```typescript
import { Component, Input } from '@angular/core';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-navigation-card',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './navigation-card.component.html',
  styleUrls: ['./navigation-card.component.scss']
})
export class NavigationCardComponent {
  @Input() title: string = '';
  @Input() subtitle: string = '';
  @Input() icon: string = '';
  @Input() url: string = '';
  @Input() color: 'blue' | 'coral' = 'blue';
  @Input() animationDelay: number = 0;

  get colorClass(): string {
    return `card--${this.color}`;
  }

  get animationStyle(): { [key: string]: string } {
    return {
      'animation-delay': `${this.animationDelay}ms`
    };
  }

  navigateTo(): void {
    window.location.href = this.url;
  }
}
```

**`src/app/shared/components/navigation-card/navigation-card.component.html`**
```html
<a
  [href]="url"
  class="card"
  [ngClass]="colorClass"
  [ngStyle]="animationStyle"
  target="_self"
  rel="noopener"
>
  <div class="card__icon-wrapper">
    <span class="card__icon" [attr.data-icon]="icon">
      <svg *ngIf="icon === 'male'" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path d="M12 2C9.243 2 7 4.243 7 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5zm0 8c-1.654 0-3-1.346-3-3s1.346-3 3-3 3 1.346 3 3-1.346 3-3 3zm0 2c-4.411 0-8 2.692-8 6v4h16v-4c0-3.308-3.589-6-8-6z"/>
      </svg>
      <svg *ngIf="icon === 'female'" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path d="M12 2C9.243 2 7 4.243 7 7s2.243 5 5 5 5-2.243 5-5-2.243-5-5-5zm0 8c-1.654 0-3-1.346-3-3s1.346-3 3-3 3 1.346 3 3-1.346 3-3 3zm0 2c-4.411 0-8 2.692-8 6v4h16v-4c0-3.308-3.589-6-8-6z"/>
      </svg>
    </span>
  </div>

  <div class="card__content">
    <h3 class="card__title">{{ title }}</h3>
    <p class="card__subtitle">{{ subtitle }}</p>
  </div>

  <div class="card__arrow">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
      <path d="M5 12h14M12 5l7 7-7 7"/>
    </svg>
  </div>
</a>
```

**`src/app/shared/components/navigation-card/navigation-card.component.scss`**
```scss
@use '../../../../styles/variables' as *;
@use '../../../../styles/mixins' as *;

.card {
  @include card-base;
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  padding: $spacing-3xl;
  text-decoration: none;
  position: relative;
  overflow: hidden;
  cursor: pointer;
  transition: all $transition-base;
  animation: slideUp 0.6s ease-out both;

  @include mobile-only {
    padding: $spacing-2xl;
  }

  // Hover effects
  &:hover {
    transform: translateY(-12px) scale(1.02);
    box-shadow: 0 24px 48px rgba(0, 0, 0, 0.2);

    .card__icon-wrapper {
      transform: scale(1.1) rotate(5deg);
    }

    .card__arrow {
      transform: translateX(8px);
      opacity: 1;
    }
  }

  // Color variants
  &--blue {
    background: linear-gradient(135deg, lighten($boys-blue, 20%) 0%, lighten($boys-blue, 25%) 100%);
    border: 2px solid $boys-blue;

    .card__icon-wrapper {
      background: linear-gradient(135deg, $primary-blue 0%, $boys-blue 100%);
    }

    .card__title {
      color: darken($boys-blue, 30%);
    }

    &:hover {
      border-color: $primary-blue;
      box-shadow: 0 24px 48px rgba($boys-blue, 0.3);
    }
  }

  &--coral {
    background: linear-gradient(135deg, lighten($girls-coral, 20%) 0%, lighten($girls-coral, 25%) 100%);
    border: 2px solid $girls-coral;

    .card__icon-wrapper {
      background: linear-gradient(135deg, $vibrant-orange 0%, $girls-coral 100%);
    }

    .card__title {
      color: darken($girls-coral, 30%);
    }

    &:hover {
      border-color: $vibrant-orange;
      box-shadow: 0 24px 48px rgba($girls-coral, 0.3);
    }
  }

  // Icon wrapper
  &__icon-wrapper {
    width: 120px;
    height: 120px;
    border-radius: $border-radius-full;
    @include flex-center;
    margin-bottom: $spacing-xl;
    transition: transform $transition-base;
    box-shadow: $shadow-lg;

    @include mobile-only {
      width: 80px;
      height: 80px;
      margin-bottom: $spacing-lg;
    }
  }

  &__icon {
    svg {
      width: 60px;
      height: 60px;
      color: $white;

      @include mobile-only {
        width: 40px;
        height: 40px;
      }
    }
  }

  // Content
  &__content {
    flex: 1;
    margin-bottom: $spacing-lg;
  }

  &__title {
    font-size: $font-size-3xl;
    font-weight: $font-weight-bold;
    margin-bottom: $spacing-sm;

    @include mobile-only {
      font-size: $font-size-2xl;
    }
  }

  &__subtitle {
    font-size: $font-size-xl;
    color: $medium-gray;
    font-weight: $font-weight-regular;

    @include mobile-only {
      font-size: $font-size-lg;
    }
  }

  // Arrow
  &__arrow {
    width: 32px;
    height: 32px;
    opacity: 0.6;
    transition: all $transition-base;

    svg {
      width: 100%;
      height: 100%;
    }
  }

  // Focus state
  &:focus-visible {
    outline: 3px solid $primary-blue;
    outline-offset: 4px;
  }
}
```

---

## Routing Setup

**`src/app/app.routes.ts`**
```typescript
import { Routes } from '@angular/router';
import { HomeComponent } from './features/home/home.component';

export const routes: Routes = [
  {
    path: '',
    component: HomeComponent,
    title: 'Chiro Elzestraat - Home'
  },
  {
    path: '**',
    redirectTo: ''
  }
];
```

**`src/app/app.config.ts`**
```typescript
import { ApplicationConfig } from '@angular/core';
import { provideRouter } from '@angular/router';
import { routes } from './app.routes';

export const appConfig: ApplicationConfig = {
  providers: [
    provideRouter(routes)
  ]
};
```

---

## Build & Deployment

### 1. Production Build

```bash
# Build for production
ng build --configuration production

# Output will be in dist/chiro-elzestraat-angular/browser/
```

### 2. Test Production Build Locally

```bash
# Install a simple HTTP server
npm install -g http-server

# Serve the built files
cd dist/chiro-elzestraat-angular/browser
http-server -p 8080
```

Visit `http://localhost:8080`

### 3. Deploy to Netlify

```bash
# Install Netlify CLI
npm install -g netlify-cli

# Login to Netlify
netlify login

# Deploy
cd dist/chiro-elzestraat-angular/browser
netlify deploy --prod
```

Or use the Netlify UI:
1. Go to https://app.netlify.com
2. Drag and drop the `dist/chiro-elzestraat-angular/browser` folder
3. Configure custom domain

### 4. Deploy to GitHub Pages

```bash
# Install angular-cli-ghpages
npm install -g angular-cli-ghpages

# Build with correct base href
ng build --configuration production --base-href=/chirojongens-elzestraat/

# Deploy to GitHub Pages
ngh --dir=dist/chiro-elzestraat-angular/browser
```

### 5. Deploy to Vercel

```bash
# Install Vercel CLI
npm install -g vercel

# Deploy
vercel --prod
```

---

## Performance Optimization

### 1. Image Optimization

Create an `assets/images/` directory and optimize images:

```bash
# Install image optimization tool
npm install -D imagemin imagemin-webp

# Convert images to WebP
# (Add to package.json scripts)
```

### 2. Lighthouse Audit

```bash
# Install Lighthouse
npm install -g lighthouse

# Run audit
lighthouse http://localhost:4200 --view
```

Target scores:
- Performance: 95+
- Accessibility: 100
- Best Practices: 100
- SEO: 100

### 3. Bundle Analysis

```bash
# Install webpack-bundle-analyzer
npm install -D webpack-bundle-analyzer

# Analyze bundle
ng build --configuration production --stats-json
npx webpack-bundle-analyzer dist/chiro-elzestraat-angular/browser/stats.json
```

---

## Testing Checklist

- [ ] Visual testing on multiple screen sizes
- [ ] Cross-browser testing (Chrome, Firefox, Safari, Edge)
- [ ] Mobile device testing (iOS, Android)
- [ ] Keyboard navigation
- [ ] Screen reader testing
- [ ] Performance audit (Lighthouse)
- [ ] Link validation
- [ ] SEO check

---

## Final Steps

1. Run production build
2. Test locally
3. Run Lighthouse audit
4. Deploy to hosting platform
5. Configure custom domain
6. Test deployed site
7. Monitor performance

---

**Next:** Run through this guide step-by-step to implement the Angular website.
