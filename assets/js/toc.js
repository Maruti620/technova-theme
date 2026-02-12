document.addEventListener('DOMContentLoaded', () => {
    const toc = document.getElementById('toc');
    if (!toc) return;
    document.querySelectorAll('h2').forEach(h => {
        const id = h.innerText.replace(/\s+/g, '-').toLowerCase();
        h.id = id;
        toc.innerHTML += `<a class="block text-blue-600" href="#${id}">${h.innerText}</a>`;
    });
});
