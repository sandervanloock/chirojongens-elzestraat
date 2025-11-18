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

interface RentalFeature {
  text: string;
}

interface ProgramItem {
  title: string;
  url: string;
}

interface FAQItem {
  question: string;
  answer: string;
  expanded?: boolean;
}

interface HeroImage {
  src: string;
  alt: string;
}

interface GalleryImage {
  src: string;
  alt: string;
  category: string;
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
  currentHeroImage = 0;

  heroImages: HeroImage[] = [
    { src: '/assets/images/hero/golden_hour_sunset.jpeg', alt: 'Chiroleden bij zonsondergang tijdens activiteit' },
    { src: '/assets/images/hero/costume_bonfire_1.jpeg', alt: 'Chiroleden in kostuum bij kampvuur' },
    { src: '/assets/images/hero/stage_performance.jpeg', alt: 'Toneelvoorstelling door chiroleden' },
    { src: '/assets/images/hero/costume_bonfire_2.jpeg', alt: 'Groepsfoto bij kampvuur' }
  ];

  groupImages: GalleryImage[] = [
    { src: '/assets/images/groups/group_games.jpeg', alt: 'Groepsspellen tijdens activiteit', category: 'groups' },
    { src: '/assets/images/groups/fun_together.jpeg', alt: 'Plezier maken samen', category: 'groups' },
    { src: '/assets/images/groups/group_exploration.jpeg', alt: 'Samen op verkenning', category: 'groups' },
    { src: '/assets/images/groups/messy_play.jpeg', alt: 'Stoeiende kinderen tijdens spel', category: 'groups' },
    { src: '/assets/images/groups/flour_face_fun.jpeg', alt: 'Spelletjes met meel', category: 'groups' }
  ];

  communityImages: GalleryImage[] = [
    { src: '/assets/images/community/facilities_1.jpeg', alt: 'Ons chirolokaal van buiten', category: 'community' },
    { src: '/assets/images/community/facilities_2.jpeg', alt: 'Ons buitenterrein met speeltoestellen', category: 'community' },
    { src: '/assets/images/community/cooking_crew.jpeg', alt: 'Koken tijdens activiteit', category: 'community' },
    { src: '/assets/images/community/food_service.jpeg', alt: 'Samen eten', category: 'community' }
  ];

  navItems: NavItem[] = [
    { label: 'Home', href: '#section-home' },
    { label: 'Groepen', href: '#section-groepen' },
    { label: 'Verhuur', href: '#section-verhuur' },
    { label: 'Programma', href: '#section-tprogram' },
    { label: 'FAQ', href: '#section-faq' },
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

  rentalInfrastructure: RentalFeature[] = [
    { text: '1 grote zaal' },
    { text: '4 kleine zaaltjes' },
    { text: 'Volledig uitgeruste keuken' },
    { text: 'Materiaal (tafels, stoelen, kookgerei)' },
    { text: 'Koelkast en diepvriezer' },
    { text: 'Verwarming' },
    { text: 'Sanitair' },
    { text: 'Grote tuin met speeltuigen' }
  ];

  rentalSurroundings: RentalFeature[] = [
    { text: 'Zwembad op 100 meter' },
    { text: 'Park op 100 meter' },
    { text: 'Winkels op 200 meter' },
    { text: 'Gratis parking' }
  ];

  programs: ProgramItem[] = [
    { title: 'Kampboekje 2025', url: '/assets/kampboekje-2025.pdf' },
    { title: 'Programma April-Juni 2025', url: '/assets/program-april-juni-2025.pdf' }
  ];

  faqs: FAQItem[] = [
    {
      question: 'Wat is de minimumleeftijd om lid te worden?',
      answer: 'Kinderen kunnen lid worden vanaf het 1e leerjaar (ongeveer 6 jaar oud). We hebben verschillende leeftijdsgroepen, zodat elk kind bij leeftijdsgenoten zit.',
      expanded: false
    },
    {
      question: 'Wanneer zijn de activiteiten?',
      answer: 'Onze activiteiten vinden plaats op zondag. De tijden verschillen per leeftijdsgroep, van 14u tot 17u voor de jongsten tot 14u tot 19u30 voor de oudsten.',
      expanded: false
    },
    {
      question: 'Hoeveel kost het lidgeld?',
      answer: 'Het lidgeld wordt jaarlijks vastgesteld. Dit omvat alle activiteiten gedurende het werkjaar. Neem contact op voor het exacte bedrag voor dit jaar.',
      expanded: false
    },
    {
      question: 'Wat is het beleid rond roken, vapen en drugs?',
      answer: 'Wij hanteren een streng beleid. Roken, vapen en drugs zijn ten strengste verboden op alle activiteiten en op het terrein. Voor meer informatie, bekijk ons <a href="https://www.chiroelzestraat.be/documenten/Roken-Vapen-Drugs%20beleid.pdf" target="_blank" rel="noopener">volledige beleid</a>.',
      expanded: false
    },
    {
      question: 'Moet mijn kind iets meebrengen?',
      answer: 'We raden aan om steeds weer- en windbestendige kledij aan te doen, want we gaan vaak buiten. Voor specifieke activiteiten krijgen ouders vooraf bericht via e-mail of sociale media.',
      expanded: false
    }
  ];

  toggleFAQ(index: number): void {
    this.faqs[index].expanded = !this.faqs[index].expanded;
  }

  scrollToSection(href: string): void {
    if (href.startsWith('#')) {
      const element = document.querySelector(href);
      if (element) {
        element.scrollIntoView({ behavior: 'smooth' });
      }
    }
  }

  nextHeroImage(): void {
    this.currentHeroImage = (this.currentHeroImage + 1) % this.heroImages.length;
  }

  prevHeroImage(): void {
    this.currentHeroImage = this.currentHeroImage === 0
      ? this.heroImages.length - 1
      : this.currentHeroImage - 1;
  }

  setHeroImage(index: number): void {
    this.currentHeroImage = index;
  }
}
