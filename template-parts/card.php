<article class="group relative bg-white dark:bg-slate-800 rounded-2xl overflow-hidden shadow-md hover:shadow-2xl transition duration-500 hover:-translate-y-2">

<div class="relative overflow-hidden">

<?php if(has_post_thumbnail()): ?>
  <?php the_post_thumbnail('medium_large',[
    'class'=>'w-full h-56 object-cover group-hover:scale-110 transition duration-700'
  ]); ?>
<?php endif; ?>

<div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>

<span class="absolute bottom-4 left-4 bg-gradient-to-r from-indigo-600 to-cyan-500 text-white text-xs px-4 py-1 rounded-full shadow-lg">
  <?php echo get_the_category()[0]->name ?? ''; ?>
</span>

</div>

<div class="p-6">

<h2 class="text-xl font-bold group-hover:text-indigo-600 transition">
  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
</h2>

<p class="mt-3 text-sm text-slate-600 dark:text-slate-400">
  <?php echo wp_trim_words(get_the_excerpt(),20); ?>
</p>

</div>

</article>
<article class="group border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 rounded-xl p-6 shadow-sm hover:-translate-y-1 hover:shadow-lg transition">
  <a href="<?php the_permalink(); ?>" class="block mb-4 overflow-hidden rounded-lg aspect-[16/9] bg-slate-100 dark:bg-slate-800">
    <?php if (has_post_thumbnail()): ?>
      <?php the_post_thumbnail('card-thumb', ['class' => 'w-full h-full object-cover transition duration-300 group-hover:scale-[1.02]', 'loading'=>'lazy', 'decoding'=>'async']); ?>
    <?php else: ?>
      <div class="w-full h-full flex items-center justify-center text-slate-400 text-sm">No image</div>
    <?php endif; ?>
  </a>

  <div class="flex items-center gap-3 text-xs uppercase tracking-wide text-indigo-600 mb-3">
    <?php $cats = get_the_category(); ?>
    <?php if ($cats): ?>
      <a class="font-semibold hover:underline" href="<?php echo esc_url(get_category_link($cats[0])); ?>">
        <?php echo esc_html($cats[0]->name); ?>
      </a>
    <?php endif; ?>
    <span class="text-slate-400">•</span>
    <span class="text-slate-500"><?php echo esc_html(get_the_date()); ?></span>
  </div>

  <h2 class="text-xl font-semibold mb-2">
    <a class="group-hover:text-indigo-600 transition" href="<?php the_permalink(); ?>">
      <?php the_title(); ?>
    </a>
  </h2>

  <p class="text-slate-600 dark:text-slate-300 mb-4"><?php echo wp_kses_post(get_the_excerpt()); ?></p>

  <div class="flex items-center justify-between text-sm">
    <div class="flex flex-wrap gap-2 text-indigo-600">
      <?php $tags = get_the_tags(); ?>
      <?php if ($tags): foreach ($tags as $tag): ?>
        <a class="px-2 py-1 rounded-full bg-indigo-50 dark:bg-indigo-900/40 hover:bg-indigo-100" href="<?php echo esc_url(get_tag_link($tag)); ?>">
          #<?php echo esc_html($tag->name); ?>
        </a>
      <?php endforeach; endif; ?>
    </div>
    <a class="inline-flex items-center gap-1 text-indigo-600 hover:gap-2 transition" href="<?php the_permalink(); ?>">
      Read more <span aria-hidden="true">→</span>
    </a>
  </div>
</article>
