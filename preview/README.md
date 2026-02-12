# TechNova Static Preview

This folder lets you view the theme without WordPress.

## Build CSS (if you change Tailwind)
```sh
npm install
npm run build   # or: npm run dev --watch
```

## View the mock
- Open `preview/index.html` directly in your browser, **or**
- Run a tiny server from this folder:
  - `npx serve .`  *(if `serve` is installed)*  
  - `python -m http.server 3000`

## What’s mocked
- Header, mobile menu, dark mode, progress bar, TOC use the real JS.
- “Load more” uses in-memory sample posts; no AJAX/WordPress needed.
- Content is hardcoded sample text; comments and real WP data are omitted.

## Troubleshooting
- If styles look missing, rebuild `assets/css/main.css`.
- If JS errors reference `technova_ajax`, reload; the preview defines a dummy global before scripts run.
