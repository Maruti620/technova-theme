<?php get_header(); ?>

<main class="max-w-4xl mx-auto px-6 py-16 space-y-10">

  <?php technova_breadcrumbs(); ?>

  <header class="space-y-3">
    <div class="flex flex-wrap items-center gap-3 text-sm text-slate-500">
      <span><?php echo esc_html(get_the_date()); ?></span>
      <span class="text-slate-400">•</span>
      <span><?php echo esc_html(technova_reading_time()); ?></span>
      <?php $cats = get_the_category(); if ($cats): ?>
        <span class="text-slate-400">•</span>
        <?php foreach ($cats as $cat): ?>
          <a class="px-2 py-1 rounded-full bg-indigo-50 text-indigo-700 dark:bg-indigo-900/40 dark:text-indigo-100 text-xs font-semibold" href="<?php echo esc_url(get_category_link($cat)); ?>">
            <?php echo esc_html($cat->name); ?>
          </a>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
    <h1 class="text-4xl font-bold leading-tight"><?php the_title(); ?></h1>
  </header>

  <?php if (has_post_thumbnail()): ?>
    <figure class="rounded-2xl overflow-hidden shadow-lg">
      <?php the_post_thumbnail('large', ['class'=>'w-full h-auto object-cover', 'loading'=>'lazy', 'decoding'=>'async']); ?>
    </figure>
  <?php endif; ?>

  <div id="toc" class="mb-6 p-6 bg-slate-100 dark:bg-slate-800 rounded-xl"></div>

  <article class="prose dark:prose-invert max-w-none">
    <?php the_content(); ?>
  </article>

  <section class="flex flex-wrap items-center gap-3 text-sm">
    <?php the_tags('<div class="flex flex-wrap gap-2 items-center"><span class="text-slate-500">Tags:</span>',' ','</div>'); ?>
    <div class="ml-auto flex gap-3 text-indigo-600">
      <?php $share_url = urlencode(get_permalink()); $share_title = urlencode(get_the_title()); ?>
      <a class="hover:underline" href="https://twitter.com/intent/tweet?url=<?php echo $share_url; ?>&text=<?php echo $share_title; ?>" target="_blank" rel="noopener">Share on X</a>
      <a class="hover:underline" href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo $share_url; ?>" target="_blank" rel="noopener">LinkedIn</a>
    </div>
  </section>

  <section class="border-t border-slate-200 dark:border-slate-800 pt-8">
    <div class="flex flex-col md:flex-row justify-between gap-4 text-sm">
      <div>
        <?php $prev = get_previous_post(); if ($prev): ?>
          <p class="text-slate-500 mb-1">Previous</p>
          <a class="font-semibold text-indigo-600 hover:underline" href="<?php echo get_permalink($prev); ?>">
            <?php echo esc_html(get_the_title($prev)); ?>
          </a>
        <?php endif; ?>
      </div>
      <div class="text-right">
        <?php $next = get_next_post(); if ($next): ?>
          <p class="text-slate-500 mb-1">Next</p>
          <a class="font-semibold text-indigo-600 hover:underline" href="<?php echo get_permalink($next); ?>">
            <?php echo esc_html(get_the_title($next)); ?> →
          </a>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <?php technova_related_posts(); ?>

  <?php
    if ( comments_open() || get_comments_number() ) :
      comments_template();
    endif;
  ?>

</main>

<?php get_footer(); ?>
