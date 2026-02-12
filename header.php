<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="max-image-preview:large">
<?php wp_head(); ?>
</head>

<body <?php body_class('bg-slate-50 dark:bg-slate-950 text-slate-900 dark:text-slate-100'); ?>>

<div id="progressBar" class="fixed top-0 left-0 h-1 bg-gradient-to-r from-brand-500 to-accent z-50"></div>

<header class="sticky top-0 z-50 backdrop-blur-lg bg-white/80 dark:bg-slate-900/80 border-b border-slate-200/70 dark:border-slate-800/70 shadow-sm">
  <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

    <a href="<?php echo home_url(); ?>" class="text-2xl font-bold bg-gradient-to-r from-brand-500 to-accent bg-clip-text text-transparent">
      <?php bloginfo('name'); ?>
    </a>

    <nav id="primaryNav" class="hidden absolute top-full left-0 w-full bg-white/95 dark:bg-slate-900/95 p-4 md:p-0 md:static md:w-auto md:bg-transparent md:dark:bg-transparent md:flex">
      <?php wp_nav_menu([
        'theme_location'=>'primary',
        'container'=>false,
        'menu_class'=>'flex flex-col md:flex-row gap-4 md:gap-8 font-medium items-center'
      ]); ?>
    </nav>
    
    <div class="flex items-center gap-3">
      <button id="searchToggle" class="hidden md:inline-flex items-center gap-2 px-3 py-2 rounded-xl bg-slate-100 dark:bg-slate-800 text-sm hover:-translate-y-0.5 transition focus:outline-none focus:ring-2 focus:ring-brand-400" aria-expanded="false" aria-controls="searchModal">Search</button>
      <button id="darkToggle" class="text-xl w-10 h-10 rounded-full border border-slate-200 dark:border-slate-700 flex items-center justify-center hover:bg-slate-100 dark:hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-brand-400" aria-label="Toggle dark mode">☾</button>
      <button id="mobileMenuBtn" class="md:hidden text-2xl w-10 h-10 rounded-full border border-slate-200 dark:border-slate-700 flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-brand-400" aria-label="Toggle menu">☰</button>
    </div>

  </div>
</header>

<!-- Search Modal -->
<div id="searchModal" class="hidden opacity-0 fixed inset-0 z-50 bg-black/50 backdrop-blur-sm transition">
  <div class="absolute inset-0" aria-hidden="true"></div>
  <div class="relative max-w-2xl mx-auto mt-24 bg-white dark:bg-slate-900 rounded-2xl shadow-2xl overflow-hidden">
    <div class="flex items-center gap-3 px-4 py-3 border-b border-slate-200 dark:border-slate-800">
      <input id="searchInput" type="search" placeholder="Search articles..." class="flex-1 bg-transparent outline-none text-lg py-2" autocomplete="off" />
      <button id="searchClose" class="w-9 h-9 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center text-xl">×</button>
    </div>
    <ul id="searchResults" class="max-h-96 overflow-y-auto divide-y divide-slate-200 dark:divide-slate-800">
      <li class="py-3 text-sm text-slate-500 text-center">Type to search…</li>
    </ul>
  </div>
</div>
