<?php get_header(); ?>

<main class="max-w-3xl mx-auto px-6 py-20 text-center space-y-6">
  <p class="text-sm uppercase tracking-[0.2em] text-slate-500">Error 404</p>
  <h1 class="text-4xl font-bold">Page not found</h1>
  <p class="text-slate-600 dark:text-slate-300">The page you’re looking for doesn’t exist. Try searching or head back home.</p>
  <div class="flex items-center justify-center gap-4">
    <a class="px-5 py-3 rounded-lg bg-indigo-600 text-white font-semibold hover:bg-indigo-500 transition" href="<?php echo esc_url(home_url('/')); ?>">Go home</a>
    <a class="px-5 py-3 rounded-lg border border-slate-200 dark:border-slate-700 hover:bg-slate-100 dark:hover:bg-slate-800 transition" href="<?php echo esc_url(home_url('/?s=')); ?>">Search</a>
  </div>
</main>

<?php get_footer(); ?>
