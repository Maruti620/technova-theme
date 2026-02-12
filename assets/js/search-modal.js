(() => {
  const openBtn = document.getElementById('searchToggle');
  const modal = document.getElementById('searchModal');
  const closeBtn = document.getElementById('searchClose');
  const input = document.getElementById('searchInput');
  const results = document.getElementById('searchResults');
  if (!modal || !openBtn || !closeBtn || !input || !results) return;

  const open = () => {
    modal.classList.remove('hidden', 'opacity-0');
    modal.classList.add('opacity-100');
    openBtn.setAttribute('aria-expanded', 'true');
    input.focus();
  };
  const close = () => {
    modal.classList.add('opacity-0');
    setTimeout(() => modal.classList.add('hidden'), 150);
    openBtn.setAttribute('aria-expanded', 'false');
  };

  openBtn.addEventListener('click', open);
  closeBtn.addEventListener('click', close);
  modal.addEventListener('click', (e) => {
    if (e.target === modal) close();
  });
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') close();
  });

  let debounceTimer;
  const renderResults = (items) => {
    results.innerHTML = '';
    if (!items.length) {
      results.innerHTML = '<li class="py-3 text-sm text-slate-500 text-center">No results</li>';
      return;
    }
    items.forEach(item => {
      const li = document.createElement('li');
      li.className = 'border-b border-slate-200 dark:border-slate-800 last:border-none';
      li.innerHTML = `
        <a class="block px-4 py-3 hover:bg-slate-100 dark:hover:bg-slate-800 transition" href="${item.url}">
          <div class="text-sm text-slate-500 mb-1">${item.type || 'Post'}</div>
          <div class="font-semibold text-slate-900 dark:text-white">${item.title.rendered}</div>
        </a>
      `;
      results.appendChild(li);
    });
  };

  const search = (query) => {
    if (!query || query.length < 2) {
      results.innerHTML = '<li class="py-3 text-sm text-slate-500 text-center">Type to search…</li>';
      return;
    }
    fetch(`${technova_search.rest}wp/v2/search?search=${encodeURIComponent(query)}&per_page=6`)
      .then(res => res.json())
      .then(renderResults)
      .catch(() => {
        results.innerHTML = '<li class="py-3 text-sm text-red-500 text-center">Error loading results</li>';
      });
  };

  input.addEventListener('input', (e) => {
    clearTimeout(debounceTimer);
    debounceTimer = setTimeout(() => search(e.target.value), 250);
  });
})();
