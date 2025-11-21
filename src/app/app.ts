import {Component, HostListener, Inject, OnInit, PLATFORM_ID} from '@angular/core';
import {CommonModule, DOCUMENT, isPlatformBrowser} from '@angular/common';
import {Meta, Title} from '@angular/platform-browser';

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

interface RentalImage {
  src: string;
  thumbSrc: string;
  alt: string;
}

interface SectionMeta {
  title: string;
  description: string;
}

@Component({
  selector: 'app-root',
  standalone: true,
  imports: [CommonModule],
  templateUrl: './app.html',
  styleUrl: './app.scss'
})
export class App implements OnInit {
  currentYear = new Date().getFullYear();
  currentHeroImage = 0;
  mobileMenuOpen = false;
  rentalGalleryOpen = false;
  currentRentalImage = 0;
  heroImages: HeroImage[] = [
    { src: '/assets/images/hero/outdoor_adventure.jpeg', alt: 'Avontuurlijke uitstap met prachtig uitzicht' },
    {src: '/assets/images/hero/flour_face_hero.jpeg', alt: 'Plezier maken tijdens spelletjes op kamp'},
    {src: '/assets/images/hero/golden_hour_sunset.jpeg', alt: 'Chiroleden bij zonsondergang tijdens activiteit'},
  ];
  private currentSection = 'home';
  private baseUrl = 'https://chirojongens.chiroelzestraat.be';
  private sectionMeta: Record<string, SectionMeta> = {
    'home': {
      title: 'Chirojongens Elzestraat | Jeugdbeweging Sint-Katelijne-Waver',
      description: 'Chirojongens Elzestraat - Jeugdbeweging voor jongens van 6 tot 18 jaar in Sint-Katelijne-Waver. Elke zondag plezier en avontuur.'
    },
    'groepen': {
      title: 'Groepen | Chirojongens Elzestraat',
      description: 'Ontdek onze leeftijdsgroepen: Speelclub, Rakkers, Toppers, Kerels en Aspiranten. Voor jongens van 6 tot 18 jaar.'
    },
    'verhuur': {
      title: 'Verhuur Lokalen | Chirojongens Elzestraat',
      description: 'Huur onze lokalen in Sint-Katelijne-Waver. Volledig uitgeruste keuken, grote zaal en tuin. €250 per weekend.'
    },
    'tprogram': {
      title: 'Programma | Chirojongens Elzestraat',
      description: 'Download het programma en kampboekje van Chirojongens Elzestraat. Bekijk alle geplande activiteiten.'
    },
    'faq': {
      title: 'Veelgestelde Vragen | Chirojongens Elzestraat',
      description: 'Antwoorden op veelgestelde vragen over lidmaatschap, activiteiten en beleid van Chirojongens Elzestraat.'
    },
    'contact': {
      title: 'Contact | Chirojongens Elzestraat',
      description: 'Neem contact op met Chirojongens Elzestraat. Vind noodcontacten en algemene contactinformatie.'
    }
  };

  rentalImages: RentalImage[] = [
    {
      src: '/assets/images/verhuur/IMG_6925.jpg',
      thumbSrc: '/assets/images/verhuur/IMG_6925-min.jpg',
      alt: 'Lokaal overzicht'
    },
    {
      src: '/assets/images/verhuur/IMG_6926.jpg',
      thumbSrc: '/assets/images/verhuur/IMG_6926-min.jpg',
      alt: 'Grote zaal'
    },
    {src: '/assets/images/verhuur/IMG_6928.jpg', thumbSrc: '/assets/images/verhuur/IMG_6928-min.jpg', alt: 'Keuken'},
    {
      src: '/assets/images/verhuur/IMG_6929.jpg',
      thumbSrc: '/assets/images/verhuur/IMG_6929-min.jpg',
      alt: 'Vergaderzaal'
    },
    {src: '/assets/images/verhuur/IMG_6930.jpg', thumbSrc: '/assets/images/verhuur/IMG_6930-min.jpg', alt: 'Sanitair'},
    {
      src: '/assets/images/verhuur/IMG_6931.jpg',
      thumbSrc: '/assets/images/verhuur/IMG_6931-min.jpg',
      alt: 'Extra ruimte'
    },
    {src: '/assets/images/verhuur/IMG_6932.jpg', thumbSrc: '/assets/images/verhuur/IMG_6932-min.jpg', alt: 'Tuin'},
    {src: '/assets/images/verhuur/IMG_6933.jpg', thumbSrc: '/assets/images/verhuur/IMG_6933-min.jpg', alt: 'Speeltuig'},
    {
      src: '/assets/images/verhuur/IMG_6934.jpg',
      thumbSrc: '/assets/images/verhuur/IMG_6934-min.jpg',
      alt: 'Buitenzicht'
    },
    {src: '/assets/images/verhuur/IMG_6935.jpg', thumbSrc: '/assets/images/verhuur/IMG_6935-min.jpg', alt: 'Parking'},
    {src: '/assets/images/verhuur/IMG_6936.jpg', thumbSrc: '/assets/images/verhuur/IMG_6936-min.jpg', alt: 'Omgeving'},
    {src: '/assets/images/verhuur/IMG_6937.jpg', thumbSrc: '/assets/images/verhuur/IMG_6937-min.jpg', alt: 'Toegang'},
    {src: '/assets/images/verhuur/IMG_6938.jpg', thumbSrc: '/assets/images/verhuur/IMG_6938-min.jpg', alt: 'Ingang'},
    {
      src: '/assets/images/verhuur/IMG_6939.jpg',
      thumbSrc: '/assets/images/verhuur/IMG_6939-min.jpg',
      alt: 'Vooraanzicht'
    }
  ];

  constructor(
    private titleService: Title,
    private metaService: Meta,
    @Inject(DOCUMENT) private document: Document,
    @Inject(PLATFORM_ID) private platformId: object
  ) {
  }

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
    { text: '1 groot heem' },
    { text: '4 kleine hemen' },
    { text: 'Volledig uitgeruste keuken (bestek, borden, kookpotten, etc.)' },
    { text: 'Materiaal (tafels, stoelen, kookgerei)' },
    { text: 'Koelkast en diepvriezer' },
    { text: 'Verwarming' },
    { text: 'Sanitair & douche' },
    { text: 'Grote tuin met speeltuigen' }
  ];

  rentalSurroundings: RentalFeature[] = [
    { text: 'Zwembad' },
    { text: 'Park, basketpleintje' },
    { text: 'Spar, bakker, frietkot' },
    { text: 'Colruyt (5 minuten met wagen)' },
    { text: 'Gratis parking' }
  ];

  programs: ProgramItem[] = [
    {title: '\'t Program september - december 2025', url: '/assets/tprogram/Program-Sep-Dec.2025.pdf'},
    {title: 'Kampboekje 2025', url: '/assets/tprogram/kampboekje2025.pdf'}
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
      answer: 'Wij hanteren een streng beleid. Roken, vapen en drugs zijn ten strengste verboden op alle activiteiten en op het terrein. Voor meer informatie, bekijk ons <a href="https://docs.google.com/document/d/1wAZEWRUqxB2IpmUwKgUxwfvjvoU_3fP9" target="_blank" rel="noopener">volledige beleid</a>.',
      expanded: false
    },
    {
      question: 'Moet mijn kind iets meebrengen?',
      answer: 'We raden aan om steeds weer- en windbestendige kledij aan te doen, want we gaan vaak buiten. Voor specifieke activiteiten krijgen ouders vooraf bericht via e-mail of sociale media.',
      expanded: false
    }
  ];

  ngOnInit(): void {
    this.addStructuredData();
    this.addCanonicalTag();
    this.setupScrollObserver();
  }

  private addStructuredData(): void {
    if (!isPlatformBrowser(this.platformId)) return;

    // Organization Schema
    const organizationSchema = {
      '@context': 'https://schema.org',
      '@type': 'Organization',
      'name': 'Chirojongens Elzestraat',
      'url': this.baseUrl,
      'logo': `${this.baseUrl}/assets/images/logo.png`,
      'contactPoint': {
        '@type': 'ContactPoint',
        'email': 'contact@chiroelzestraat.be',
        'contactType': 'customer service'
      },
      'sameAs': [
        'https://www.facebook.com/Chirojongens-Elzestraat-234251636629703/'
      ]
    };

    // LocalBusiness Schema
    const localBusinessSchema = {
      '@context': 'https://schema.org',
      '@type': 'LocalBusiness',
      'name': 'Chirojongens Elzestraat - Verhuur',
      'description': 'Verhuur van lokalen voor jeugdbewegingen en groepsactiviteiten',
      'address': {
        '@type': 'PostalAddress',
        'streetAddress': 'Clemenceaustraat 111E',
        'addressLocality': 'Sint-Katelijne-Waver',
        'postalCode': '2860',
        'addressCountry': 'BE'
      },
      'priceRange': '€250 per weekend',
      'email': 'contact@chiroelzestraat.be'
    };

    // FAQPage Schema
    const faqSchema = {
      '@context': 'https://schema.org',
      '@type': 'FAQPage',
      'mainEntity': this.faqs.map(faq => ({
        '@type': 'Question',
        'name': faq.question,
        'acceptedAnswer': {
          '@type': 'Answer',
          'text': faq.answer.replace(/<[^>]*>/g, '')
        }
      }))
    };

    this.addJsonLd(organizationSchema, 'organization-schema');
    this.addJsonLd(localBusinessSchema, 'local-business-schema');
    this.addJsonLd(faqSchema, 'faq-schema');
  }

  private addJsonLd(schema: object, id: string): void {
    const existing = this.document.getElementById(id);
    if (existing) existing.remove();

    const script = this.document.createElement('script');
    script.id = id;
    script.type = 'application/ld+json';
    script.text = JSON.stringify(schema);
    this.document.head.appendChild(script);
  }

  private addCanonicalTag(): void {
    if (!isPlatformBrowser(this.platformId)) return;

    let canonical = this.document.querySelector('link[rel="canonical"]') as HTMLLinkElement;
    if (!canonical) {
      canonical = this.document.createElement('link');
      canonical.rel = 'canonical';
      this.document.head.appendChild(canonical);
    }
    canonical.href = this.baseUrl;
  }

  private setupScrollObserver(): void {
    if (!isPlatformBrowser(this.platformId)) return;

    const sections = ['home', 'groepen', 'verhuur', 'tprogram', 'faq', 'contact'];
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            const sectionId = entry.target.id.replace('section-', '');
            if (sectionId !== this.currentSection && this.sectionMeta[sectionId]) {
              this.currentSection = sectionId;
              this.updateMetaTags(sectionId);
            }
          }
        });
      },
      {threshold: 0.3}
    );

    sections.forEach(section => {
      const element = this.document.getElementById(`section-${section}`);
      if (element) observer.observe(element);
    });
  }

  private updateMetaTags(section: string): void {
    const meta = this.sectionMeta[section];
    if (!meta) return;

    this.titleService.setTitle(meta.title);
    this.metaService.updateTag({name: 'description', content: meta.description});
    this.metaService.updateTag({property: 'og:title', content: meta.title});
    this.metaService.updateTag({property: 'og:description', content: meta.description});
  }

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

  toggleMobileMenu(): void {
    this.mobileMenuOpen = !this.mobileMenuOpen;
  }

  closeMobileMenu(): void {
    this.mobileMenuOpen = false;
  }

  openRentalGallery(index: number): void {
    this.currentRentalImage = index;
    this.rentalGalleryOpen = true;
  }

  closeRentalGallery(): void {
    this.rentalGalleryOpen = false;
  }

  nextRentalImage(): void {
    this.currentRentalImage = (this.currentRentalImage + 1) % this.rentalImages.length;
  }

  prevRentalImage(): void {
    this.currentRentalImage = this.currentRentalImage === 0
      ? this.rentalImages.length - 1
      : this.currentRentalImage - 1;
  }

  @HostListener('window:keydown', ['$event'])
  handleKeyboardEvent(event: KeyboardEvent): void {
    // Only handle arrow keys when hero section is in view or focused
    if (event.key === 'ArrowLeft') {
      this.prevHeroImage();
      event.preventDefault();
    } else if (event.key === 'ArrowRight') {
      this.nextHeroImage();
      event.preventDefault();
    }
  }
}
