/**
 * Efek scroll landing page Himawari.
 *
 * Atribut yang dipakai di markup:
 *  data-reveal="up|down|left|right|zoom|rotate|flip"  muncul saat masuk layar
 *  data-delay="150"                                    jeda reveal (ms)
 *  data-stagger="120"                                  (di parent) jeda bertingkat untuk anak [data-reveal]
 *  data-speed="0.2"                                    parallax vertikal (negatif = berlawanan arah)
 *  data-speed-x="0.1"                                  parallax horizontal
 *  data-rotate="0.1"                                   berputar mengikuti scroll
 *  data-marquee="1|-1"                                 teks berjalan mengikuti scroll
 *  data-hscroll                                        galeri horizontal yang digerakkan scroll vertikal
 *  data-count="10"                                     angka yang menghitung naik
 *  data-carousel (+ -track, -prev, -next, -progress)   deretan kartu yang bisa digeser (swipe, drag, tombol)
 */

const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

function setupReveal() {
    document.querySelectorAll('[data-stagger]').forEach((parent) => {
        const step = Number(parent.dataset.stagger) || 120;
        parent.querySelectorAll('[data-reveal]').forEach((child, index) => {
            if (!child.dataset.delay) {
                child.dataset.delay = String(index * step);
            }
        });
    });

    const revealItems = document.querySelectorAll('[data-reveal], .draw-line');
    revealItems.forEach((item) => {
        if (item.dataset.delay) {
            item.style.setProperty('--reveal-delay', `${item.dataset.delay}ms`);
        }
    });

    if (prefersReducedMotion || !('IntersectionObserver' in window)) {
        revealItems.forEach((item) => item.classList.add('is-visible'));
        return;
    }

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.15, rootMargin: '0px 0px -60px 0px' },
    );

    revealItems.forEach((item) => observer.observe(item));
}

function setupCounters() {
    const counters = document.querySelectorAll('[data-count]');

    const runCounter = (element) => {
        const target = Number(element.dataset.count);
        const duration = 1600;
        const start = performance.now();

        const tick = (now) => {
            const progress = Math.min((now - start) / duration, 1);
            const eased = 1 - Math.pow(1 - progress, 3);
            element.textContent = Math.round(target * eased).toString();
            if (progress < 1) {
                requestAnimationFrame(tick);
            }
        };

        requestAnimationFrame(tick);
    };

    if (prefersReducedMotion || !('IntersectionObserver' in window)) {
        counters.forEach((element) => (element.textContent = element.dataset.count));
        return;
    }

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    runCounter(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.6 },
    );

    counters.forEach((element) => observer.observe(element));
}

function setupScrollEffects() {
    const header = document.getElementById('site-header');
    const progressBar = document.getElementById('scroll-progress');
    const backToTop = document.getElementById('back-to-top');
    const parallaxItems = [...document.querySelectorAll('[data-speed], [data-speed-x], [data-rotate]')];
    const marquees = [...document.querySelectorAll('[data-marquee]')];
    const horizontalSections = [...document.querySelectorAll('[data-hscroll]')];
    const scrollPaths = [...document.querySelectorAll('[data-scroll-path]')];

    scrollPaths.forEach((path) => {
        const length = path.getTotalLength();
        path.style.strokeDasharray = `${length}`;
        path.style.strokeDashoffset = `${length}`;
        path.dataset.length = String(length);
    });

    let lastScrollY = window.scrollY;
    let ticking = false;

    const update = () => {
        const scrollY = window.scrollY;
        const viewportHeight = window.innerHeight;
        const maxScroll = document.documentElement.scrollHeight - viewportHeight;

        // Header: mengecil setelah scroll, sembunyi saat scroll turun, muncul saat scroll naik
        if (header) {
            header.classList.toggle('is-scrolled', scrollY > 40);
            const menuOpen = document.body.classList.contains('menu-open');
            header.classList.toggle('is-hidden', !menuOpen && scrollY > 400 && scrollY > lastScrollY);
        }

        if (progressBar) {
            progressBar.style.transform = `scaleX(${maxScroll > 0 ? scrollY / maxScroll : 0})`;
        }

        if (backToTop) {
            backToTop.classList.toggle('opacity-0', scrollY < 700);
            backToTop.classList.toggle('pointer-events-none', scrollY < 700);
        }

        if (!prefersReducedMotion) {
            parallaxItems.forEach((item) => {
                const rect = item.getBoundingClientRect();
                if (rect.bottom < -300 || rect.top > viewportHeight + 300) {
                    return;
                }
                const offset = rect.top + rect.height / 2 - viewportHeight / 2;
                const speedY = Number(item.dataset.speed || 0);
                const speedX = Number(item.dataset.speedX || 0);
                const rotate = Number(item.dataset.rotate || 0);
                item.style.transform = `translate3d(${-offset * speedX}px, ${-offset * speedY}px, 0) rotate(${scrollY * rotate}deg)`;
            });

            marquees.forEach((marquee) => {
                const direction = Number(marquee.dataset.marquee) || 1;
                const rect = marquee.getBoundingClientRect();
                const shift = (rect.top - viewportHeight) * 0.35 * direction;
                marquee.style.transform = `translate3d(${shift - (direction > 0 ? 400 : 0)}px, 0, 0)`;
            });

            scrollPaths.forEach((path) => {
                const container = path.closest('[data-scroll-path-container]') ?? path.ownerSVGElement;
                const rect = container.getBoundingClientRect();
                const progress = Math.min(Math.max((viewportHeight * 0.75 - rect.top) / rect.height, 0), 1);
                path.style.strokeDashoffset = `${Number(path.dataset.length) * (1 - progress)}`;
            });
        }

        horizontalSections.forEach((section) => {
            const track = section.querySelector('[data-hscroll-track]');
            if (!track) {
                return;
            }
            const rect = section.getBoundingClientRect();
            const scrollable = section.offsetHeight - viewportHeight;
            const progress = Math.min(Math.max(-rect.top / scrollable, 0), 1);
            const distance = track.scrollWidth - track.parentElement.clientWidth;
            track.style.transform = `translate3d(${-distance * progress}px, 0, 0)`;

            const bar = section.querySelector('[data-hscroll-bar]');
            if (bar) {
                bar.style.transform = `scaleX(${progress})`;
            }
        });

        lastScrollY = scrollY;
        ticking = false;
    };

    const requestUpdate = () => {
        if (!ticking) {
            requestAnimationFrame(update);
            ticking = true;
        }
    };

    window.addEventListener('scroll', requestUpdate, { passive: true });
    window.addEventListener('resize', requestUpdate);
    update();
}

function setupMouseParallax() {
    const hero = document.getElementById('home');
    if (!hero || prefersReducedMotion || window.matchMedia('(pointer: coarse)').matches) {
        return;
    }

    const layers = [...hero.querySelectorAll('[data-mouse]')];

    hero.addEventListener('mousemove', (event) => {
        const x = event.clientX / window.innerWidth - 0.5;
        const y = event.clientY / window.innerHeight - 0.5;
        layers.forEach((layer) => {
            const depth = Number(layer.dataset.mouse);
            layer.style.translate = `${x * depth}px ${y * depth}px`;
        });
    });
}

function setupScrollSpy() {
    const links = [...document.querySelectorAll('.nav-link[data-section]')];

    if (!links.length || !('IntersectionObserver' in window)) {
        return;
    }

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    links.forEach((link) => {
                        const owns = (link.dataset.sections || link.dataset.section).split(',');
                        link.classList.toggle('is-active', owns.includes(entry.target.id));
                    });
                }
            });
        },
        { rootMargin: '-45% 0px -50% 0px' },
    );

    document.querySelectorAll('section[id]').forEach((section) => observer.observe(section));
}

function setupMobileMenu() {
    const toggle = document.getElementById('menu-toggle');
    const panel = document.getElementById('mobile-menu');
    if (!toggle || !panel) {
        return;
    }

    const setOpen = (open) => {
        document.body.classList.toggle('menu-open', open);
        document.body.classList.toggle('overflow-hidden', open);
        toggle.setAttribute('aria-expanded', String(open));
        panel.classList.toggle('opacity-0', !open);
        panel.classList.toggle('-translate-y-6', !open);
        panel.classList.toggle('invisible', !open);
    };

    toggle.addEventListener('click', () => setOpen(!document.body.classList.contains('menu-open')));
    panel.querySelectorAll('a, [data-menu-close]').forEach((element) => element.addEventListener('click', () => setOpen(false)));
    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            setOpen(false);
        }
    });

    panel.querySelectorAll('[data-submenu-toggle]').forEach((button) => {
        button.addEventListener('click', () => {
            const submenu = button.nextElementSibling;
            const open = submenu.classList.toggle('hidden') === false;
            button.setAttribute('aria-expanded', String(open));
            button.querySelector('svg')?.classList.toggle('rotate-180', open);
        });
    });
}

function setupFaq() {
    document.querySelectorAll('.faq-item').forEach((item) => {
        const button = item.querySelector('button');
        button.addEventListener('click', () => {
            const open = !item.classList.contains('is-open');
            document.querySelectorAll('.faq-item.is-open').forEach((other) => {
                other.classList.remove('is-open');
                other.querySelector('button').setAttribute('aria-expanded', 'false');
            });
            item.classList.toggle('is-open', open);
            button.setAttribute('aria-expanded', String(open));
        });
    });
}

function setupCarousels() {
    document.querySelectorAll('[data-carousel]').forEach((carousel) => {
        const track = carousel.querySelector('[data-carousel-track]');
        const prevButton = carousel.querySelector('[data-carousel-prev]');
        const nextButton = carousel.querySelector('[data-carousel-next]');
        const progress = carousel.querySelector('[data-carousel-progress]');

        if (!track) {
            return;
        }

        const updateState = () => {
            const maxScroll = track.scrollWidth - track.clientWidth;
            const ratio = maxScroll > 0 ? track.scrollLeft / maxScroll : 1;
            if (progress) {
                progress.style.transform = `scaleX(${Math.max(ratio, 0.08)})`;
            }
            if (prevButton) {
                prevButton.disabled = track.scrollLeft <= 4;
            }
            if (nextButton) {
                nextButton.disabled = track.scrollLeft >= maxScroll - 4;
            }
        };

        const scrollByPage = (direction) => {
            track.scrollBy({ left: direction * track.clientWidth * 0.7, behavior: prefersReducedMotion ? 'auto' : 'smooth' });
        };

        prevButton?.addEventListener('click', () => scrollByPage(-1));
        nextButton?.addEventListener('click', () => scrollByPage(1));
        track.addEventListener('scroll', updateState, { passive: true });
        window.addEventListener('resize', updateState);

        // Geser dengan mouse (drag); di layar sentuh pakai swipe bawaan browser
        let startX = 0;
        let startScroll = 0;
        let isDragging = false;
        let hasMoved = false;

        track.addEventListener('pointerdown', (event) => {
            if (event.pointerType !== 'mouse') {
                return;
            }
            isDragging = true;
            hasMoved = false;
            startX = event.clientX;
            startScroll = track.scrollLeft;
        });

        window.addEventListener('pointermove', (event) => {
            if (!isDragging) {
                return;
            }
            const distance = event.clientX - startX;
            if (!hasMoved && Math.abs(distance) > 5) {
                hasMoved = true;
                track.classList.add('is-dragging');
            }
            if (hasMoved) {
                track.scrollLeft = startScroll - distance;
            }
        });

        window.addEventListener('pointerup', () => {
            isDragging = false;
            track.classList.remove('is-dragging');
        });

        updateState();
    });
}

// Saat ganti bahasa, tetap di section yang sama
function setupLanguageLinks() {
    document.querySelectorAll('[data-lang-link]').forEach((link) => {
        link.addEventListener('click', () => {
            if (window.location.hash) {
                link.href = link.href.split('#')[0] + window.location.hash;
            }
        });
    });
}

document.addEventListener('DOMContentLoaded', () => {
    setupLanguageLinks();
    setupCarousels();
    setupReveal();
    setupCounters();
    setupScrollEffects();
    setupMouseParallax();
    setupScrollSpy();
    setupMobileMenu();
    setupFaq();
});
