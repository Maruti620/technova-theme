(() => {
    const menuButton = document.getElementById('mobileMenuBtn');
    const primaryNav = document.getElementById('primaryNav');

    if (menuButton && primaryNav) {
        menuButton.setAttribute('aria-expanded', 'false');
        menuButton.addEventListener('click', () => {
            primaryNav.classList.toggle('hidden');
            const expanded = primaryNav.classList.contains('hidden') ? 'false' : 'true';
            menuButton.setAttribute('aria-expanded', expanded);
        });
    }
})();
