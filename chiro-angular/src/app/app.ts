import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterOutlet } from '@angular/router';

interface Group {
  name: string;
  ageRange: string;
  time: string;
}

interface NavItem {
  label: string;
  href: string;
  external?: boolean;
}

@Component({
  selector: 'app-root',
  standalone: true,
  imports: [CommonModule, RouterOutlet],
  templateUrl: './app.html',
  styleUrl: './app.scss'
})
export class App {
  currentYear = new Date().getFullYear();

  navItems: NavItem[] = [
    { label: 'Home', href: '#section-home' },
    { label: 'Groepen', href: '#section-groepen' },
    { label: 'Verhuur', href: '#section-verhuur' },
    { label: 'Program', href: '#section-tprogram' },
    { label: 'Webshop', href: 'https://shop.chiroelzestraat.be/', external: true },
    { label: 'Contact', href: '#section-contact' }
  ];

  groups: Group[] = [
    {
      name: 'Speelclub',
      ageRange: '1e - 3e leerjaar',
      time: '14h - 17h'
    },
    {
      name: 'Rakkers',
      ageRange: '4e - 6e leerjaar',
      time: '14h - 17:30h'
    },
    {
      name: 'Toppers',
      ageRange: '1e - 2e middelbaar',
      time: '14h - 18:30h'
    },
    {
      name: 'Kerels',
      ageRange: '3e - 4e middelbaar',
      time: '14h - 19h'
    },
    {
      name: 'Aspiranten',
      ageRange: '5e - 6e middelbaar',
      time: '14h - 19:30h'
    }
  ];

  stats = [
    { value: 62, label: 'Leden' },
    { value: 11, label: 'Leiders' },
    { value: 71, label: 'Jaar Chiro Elzestraat' }
  ];

  scrollToSection(href: string): void {
    if (href.startsWith('#')) {
      const element = document.querySelector(href);
      if (element) {
        element.scrollIntoView({ behavior: 'smooth' });
      }
    }
  }
}
