<?php get_header(); ?>

<main class="max-w-7xl mx-auto px-6 py-16 space-y-14">

  <section class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-brand-600 via-indigo-500 to-accent text-white px-8 py-12 shadow-glow">
    <div class="absolute inset-0 opacity-30 blur-3xl pointer-events-none" style="background-image: radial-gradient(circle at 10% 20%, rgba(255,255,255,0.25), transparent 25%), radial-gradient(circle at 80% 0%, rgba(255,255,255,0.2), transparent 20%), radial-gradient(circle at 50% 80%, rgba(255,255,255,0.15), transparent 20%);"></div>
    <div class="relative flex flex-col md:flex-row md:items-center md:justify-between gap-8">
      <div class="space-y-3">
        <p class="text-sm uppercase tracking-[0.2em] text-white/80">TechNova</p>
        <h1 class="text-4xl md:text-5xl font-bold leading-tight">Modern tech stories with crisp UX.</h1>
        <p class="text-white/80 max-w-2xl">Deep dives, product teardowns, and engineering notes. Smooth navigation, polished typography, and dark mode out of the box.</p>
        <div class="flex flex-wrap gap-3 pt-2">
          <a href="#post-container" class="btn-primary">Browse posts</a>
          <a href="<?php echo esc_url( home_url('/?s=') ); ?>" class="btn-ghost border-white/50">Search site</a>
        </div>
      </div>
      <div class="card bg-white/15 dark:bg-slate-900/30 text-white max-w-sm">
        <p class="text-sm uppercase tracking-wide mb-2">Highlight</p>
        <h3 class="text-2xl font-semibold mb-3">Three-column grid with cards, tags, and lazy load.</h3>
        <p class="text-white/80 text-sm">Built with Tailwind and WordPress template parts. Hover states, shadows, and gradients tuned for a product-grade feel.</p>
      </div>
    </div>
  </section>

  <section class="space-y-6">
    <div class="flex items-center justify-between">
      <h2 class="text-2xl font-bold">Latest Posts</h2>
      <?php if (get_terms('category')): ?>
        <div class="hidden md:flex gap-2 text-sm text-slate-600 dark:text-slate-300">
          <?php wp_list_categories(['title_li'=>'', 'style'=>'list', 'separator'=>'', 'hide_empty'=>true, 'show_option_all'=>'']); ?>
        </div>
      <?php endif; ?>
    </div>

    <div id="post-container" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
      <?php if(have_posts()):
        while(have_posts()): the_post();
          get_template_part('template-parts/card');
        endwhile;
      endif; ?>
    </div>

    <div class="mt-10 flex flex-col items-center gap-3">
      <button id="loadmore" class="btn-primary">
        Load more posts
      </button>
      <div class="text-sm text-slate-500">
        <?php the_posts_pagination(['prev_text'=>'← Previous','next_text'=>'Next →']); ?>
      </div>
    </div>
  </section>

</main>

<?php get_footer(); ?>
