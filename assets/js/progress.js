window.addEventListener('scroll', () => {
    const h = document.documentElement;
    const sc = (h.scrollTop) / (h.scrollHeight - h.clientHeight) * 100;
    document.getElementById('progressBar').style.width = sc + '%';
});
