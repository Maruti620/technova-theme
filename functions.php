<?php

/* =========================
   THEME SETUP
========================= */
add_action('after_setup_theme', function () {

  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('custom-logo');
  add_image_size('card-thumb', 800, 450, true);

  add_theme_support('html5', [
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
    'style',
    'script'
  ]);

  register_nav_menus([
    'primary' => 'Primary Menu'
  ]);
});

/* =========================
   CONTENT HELPERS
========================= */
add_filter('excerpt_length', function () { return 22; });

function technova_breadcrumbs() {
  if (is_home() || is_front_page()) return;
  $items = [];
  $items[] = ['label' => 'Home', 'url' => home_url('/')];

  if (is_single()) {
    $cats = get_the_category();
    if ($cats) {
      $primary = $cats[0];
      $items[] = ['label' => $primary->name, 'url' => get_category_link($primary)];
    }
    $items[] = ['label' => get_the_title(), 'url' => get_permalink()];
  } elseif (is_category()) {
    $items[] = ['label' => single_cat_title('', false), 'url' => ''];
  } elseif (is_page()) {
    $items[] = ['label' => get_the_title(), 'url' => get_permalink()];
  }

  echo '<nav class="text-sm text-slate-500 flex items-center gap-2" aria-label="Breadcrumb">';
  foreach ($items as $index => $item) {
    if ($index > 0) echo '<span class="text-slate-400">/</span>';
    if (!empty($item['url'])) {
      echo '<a class="hover:text-indigo-600" href="'.esc_url($item['url']).'">'.esc_html($item['label']).'</a>';
    } else {
      echo '<span>'.esc_html($item['label']).'</span>';
    }
  }
  echo '</nav>';
}

/* =========================
   ENQUEUE ASSETS
========================= */
add_action('wp_enqueue_scripts', function () {

  wp_enqueue_style(
    'technova-style',
    get_template_directory_uri() . '/assets/css/main.css',
    [],
    filemtime(get_template_directory() . '/assets/css/main.css')
  );

  wp_enqueue_script('dark-mode',
    get_template_directory_uri() . '/assets/js/dark-mode.js',
    [], null, true);

  wp_enqueue_script('progress',
    get_template_directory_uri() . '/assets/js/progress.js',
    [], null, true);

  wp_enqueue_script('toc',
    get_template_directory_uri() . '/assets/js/toc.js',
    [], null, true);

  wp_enqueue_script('mobile-menu',
    get_template_directory_uri() . '/assets/js/mobile-menu.js',
    [], null, true);

  wp_enqueue_script('search-modal',
    get_template_directory_uri() . '/assets/js/search-modal.js',
    ['jquery'], null, true);

  wp_enqueue_script('ui',
    get_template_directory_uri() . '/assets/js/ui.js',
    [], null, true);

  wp_enqueue_script('loadmore',
    get_template_directory_uri() . '/assets/js/loadmore.js',
    ['jquery'], null, true);

  global $wp_query;
  wp_localize_script('loadmore','technova_ajax',[
    'ajaxurl'   => admin_url('admin-ajax.php'),
    'nonce'     => wp_create_nonce('technova-loadmore-nonce'),
    'max_pages' => $wp_query->max_num_pages
  ]);

  wp_localize_script('search-modal','technova_search',[
    'rest' => esc_url_raw( get_rest_url() ),
  ]);
});

/* =========================
   READING TIME
========================= */
function technova_reading_time(){
  $words = str_word_count(strip_tags(get_the_content()));
  return ceil($words/200) . ' min read';
}

/* =========================
   RELATED POSTS
========================= */
function technova_related_posts(){

  $related = get_posts([
    'posts_per_page' => 3,
    'post__not_in'   => [get_the_ID()],
    'category__in'   => wp_get_post_categories(get_the_ID())
  ]);

  if($related){
    echo '<h3 class="mt-12 text-2xl font-bold">Related Reading</h3><ul class="mt-4 space-y-2">';
    foreach($related as $r){
      echo '<li><a class="text-indigo-600 hover:underline" href="'.get_permalink($r).'">'.$r->post_title.'</a></li>';
    }
    echo '</ul>';
  }
}

/* =========================
   AJAX LOAD MORE
========================= */
function technova_loadmore(){

  check_ajax_referer('technova-loadmore-nonce','nonce');

  $paged = isset($_POST['page']) ? absint($_POST['page']) + 1 : 1;
  if ($paged < 1) $paged = 1;

  $query = new WP_Query([
    'post_type'=>'post',
    'paged'=>$paged
  ]);

  if($query->have_posts()):
    while($query->have_posts()): $query->the_post();
      get_template_part('template-parts/card');
    endwhile;
  endif;
  wp_reset_postdata();

  wp_die();
}
add_action('wp_ajax_loadmore','technova_loadmore');
add_action('wp_ajax_nopriv_loadmore','technova_loadmore');

/* =========================
   ARTICLE SCHEMA
========================= */
add_action('wp_head',function(){
  if(!is_single()) return;

  $logo = get_theme_mod('custom_logo');
  $logo_src = $logo ? wp_get_attachment_image_src($logo,'full') : null;
  $image = get_the_post_thumbnail_url(get_the_ID(),'full');
  $desc = wp_strip_all_tags(get_the_excerpt());

  echo '<script type="application/ld+json">'.json_encode([
    "@context"=>"https://schema.org",
    "@type"=>"BlogPosting",
    "@id"=>get_permalink().'#article',
    "mainEntityOfPage"=>get_permalink(),
    "url"=>get_permalink(),
    "headline"=>get_the_title(),
    "description"=>$desc,
    "datePublished"=>get_the_date('c'),
    "dateModified"=>get_the_modified_date('c'),
    "author"=>["@type"=>"Person","name"=>get_the_author()],
    "publisher"=>["@type"=>"Organization","name"=>get_bloginfo('name'),
      "logo"=>["@type"=>"ImageObject","url"=>$logo_src[0] ?? '']
    ],
    "image"=>$image ?: ($logo_src[0] ?? '')
  ]).'</script>';
},30);

/* =========================
   META TAGS & PRELOAD
========================= */
add_action('wp_head', function () {
  // Preconnect for fonts (used in Tailwind config)
  echo '<link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>'."\n";
  echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>'."\n";
  // Open Graph / Twitter basics
  if (is_singular()) {
    $title = wp_get_document_title();
    $url = get_permalink();
    $desc = wp_strip_all_tags(get_the_excerpt());
    $img = get_the_post_thumbnail_url(get_the_ID(),'large');
    echo '<meta property="og:type" content="article">'."\n";
    echo '<meta property="og:title" content="'.esc_attr($title).'">'."\n";
    echo '<meta property="og:url" content="'.esc_url($url).'">'."\n";
    if ($desc) echo '<meta property="og:description" content="'.esc_attr($desc).'">'."\n";
    if ($img) echo '<meta property="og:image" content="'.esc_url($img).'">'."\n";
    echo '<meta name="twitter:card" content="summary_large_image">'."\n";
    echo '<meta name="twitter:title" content="'.esc_attr($title).'">'."\n";
    if ($desc) echo '<meta name="twitter:description" content="'.esc_attr($desc).'">'."\n";
    if ($img) echo '<meta name="twitter:image" content="'.esc_url($img).'">'."\n";
  }
},5);
