(() => {
    const btn = document.getElementById('darkToggle');
    const html = document.documentElement;
    if (localStorage.theme === 'dark') html.classList.add('dark');
    btn?.setAttribute('aria-pressed', html.classList.contains('dark') ? 'true' : 'false');
    btn?.addEventListener('click', () => {
        html.classList.toggle('dark');
        const isDark = html.classList.contains('dark');
        localStorage.theme = isDark ? 'dark' : 'light';
        btn.setAttribute('aria-pressed', isDark ? 'true' : 'false');
    });
})();
