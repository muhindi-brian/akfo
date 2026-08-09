document.addEventListener('DOMContentLoaded', () => {
    const counters = document.querySelectorAll('[data-count]');

    if (!('IntersectionObserver' in window) || counters.length === 0) {
        return;
    }

    const observer = new IntersectionObserver((entries, obs) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) return;

            const counter = entry.target;
            const target = parseInt(counter.getAttribute('data-count'), 10);
            let current = 0;
            const increment = Math.max(target / 50, 1);

            const tick = () => {
                current += increment;
                if (current < target) {
                    counter.textContent = `${Math.ceil(current).toLocaleString()}${target > 100 ? '+' : ''}`;
                    requestAnimationFrame(tick);
                } else {
                    counter.textContent = `${target.toLocaleString()}${target > 100 ? '+' : ''}`;
                }
            };

            tick();
            obs.unobserve(counter);
        });
    }, { threshold: 0.5 });

    counters.forEach((counter) => observer.observe(counter));
});
