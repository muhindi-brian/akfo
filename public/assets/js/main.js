document.addEventListener('DOMContentLoaded', () => {
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* ── Mobile menu ── */
    const header = document.getElementById('site-header');
    const mobileMenu = document.getElementById('mobile-menu');
    const openBtn = document.getElementById('mobile-menu-toggle');
    const closeBtn = document.getElementById('mobile-menu-close');
    const backdrop = document.getElementById('mobile-menu-backdrop');
    const panel = mobileMenu?.querySelector('.mobile-menu__panel');

    const setMenuOpen = (open) => {
        if (!mobileMenu) return;
        mobileMenu.classList.toggle('is-open', open);
        mobileMenu.setAttribute('aria-hidden', open ? 'false' : 'true');
        document.body.classList.toggle('mobile-menu-open', open);
        openBtn?.setAttribute('aria-expanded', open ? 'true' : 'false');

        if (open) {
            closeBtn?.focus();
        } else {
            openBtn?.focus();
        }
    };

    openBtn?.addEventListener('click', () => setMenuOpen(true));
    closeBtn?.addEventListener('click', () => setMenuOpen(false));
    backdrop?.addEventListener('click', () => setMenuOpen(false));

    panel?.querySelectorAll('a').forEach((link) => {
        link.addEventListener('click', () => setMenuOpen(false));
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && mobileMenu?.classList.contains('is-open')) {
            setMenuOpen(false);
        }
    });

    /* ── Header scroll state ── */
    window.addEventListener('scroll', () => {
        if (!header) return;
        header.classList.toggle('is-scrolled', window.scrollY > 50);
    }, { passive: true });

    /* ── Image alt fallback ── */
    document.querySelectorAll('img[data-alt]').forEach((img) => {
        if (!img.getAttribute('alt')) {
            img.setAttribute('alt', img.getAttribute('data-alt') || '');
        }
    });

    if (prefersReducedMotion) return;

    /* ── Scroll reveal (marketing sections, cards — occasional frequency) ── */
    const revealSelectors = [
        'main section',
        'main .card-hover',
        'main .hover-lift',
        'main .impact-card-hover',
        'main .glass-panel',
        '[data-reveal]',
    ].join(', ');

    const revealTargets = document.querySelectorAll(revealSelectors);

    revealTargets.forEach((el, index) => {
        el.classList.add('motion-reveal');
        el.style.setProperty('--motion-delay', `${Math.min(index % 6, 5) * 60}ms`);
    });

    const revealObserver = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    revealObserver.unobserve(entry.target);
                }
            });
        },
        { rootMargin: '-40px 0px', threshold: 0.08 },
    );

    revealTargets.forEach((el) => revealObserver.observe(el));

    /* ── Hero entrance on page load (rare, first-view delight) ── */
    document.querySelectorAll('main header h1, main > header .font-display-lg, main > header .font-display-lg-mobile').forEach((hero, i) => {
        if (i === 0 && !hero.classList.contains('animate-fade-in-up')) {
            hero.classList.add('animate-fade-in-up');
        }
    });
});
