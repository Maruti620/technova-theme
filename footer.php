<footer class="bg-slate-900 text-slate-300 mt-24">

<div class="max-w-7xl mx-auto px-6 py-16 grid md:grid-cols-4 gap-10">

  <div>
    <h4 class="font-bold text-white mb-4">About</h4>
    <p>Bold tech insights covering AI, software, automation and startups.</p>
  </div>

  <div>
    <h4 class="font-bold text-white mb-4">Quick Links</h4>
    <ul class="space-y-2">
      <li><a href="/about-us">About</a></li>
      <li><a href="/contact">Contact</a></li>
      <li><a href="/write-for-us">Write for Us</a></li>
    </ul>
  </div>

  <div>
    <h4 class="font-bold text-white mb-4">Legal</h4>
    <ul class="space-y-2">
      <li><a href="/privacy-policy">Privacy Policy</a></li>
      <li><a href="/terms">Terms</a></li>
    </ul>
  </div>

  <div>
    <h4 class="font-bold text-white mb-4">Categories</h4>
    <ul class="space-y-2">
      <li><a href="/category/artificial-intelligence">AI</a></li>
      <li><a href="/category/tutorials-how-to">Tutorials</a></li>
      <li><a href="/category/technology-news">Tech News</a></li>
    </ul>
  </div>

</div>

<div class="border-t border-slate-700 py-6 text-center text-sm">
  © <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.
</div>

<?php wp_footer(); ?>
</footer>
</body>
</html>
<footer class="mt-12 border-t border-slate-200 dark:border-slate-800 bg-white/70 dark:bg-slate-900/70 backdrop-blur py-10 relative">
  <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row items-center justify-between gap-4 text-sm text-slate-500">
    <span>© <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Built with TechNova.</span>
    <div class="flex gap-4">
      <a class="hover:text-brand-600 focus:outline-none focus:ring-2 focus:ring-brand-400 rounded" href="<?php echo esc_url( home_url('/privacy-policy') ); ?>">Privacy</a>
      <a class="hover:text-brand-600 focus:outline-none focus:ring-2 focus:ring-brand-400 rounded" href="<?php echo esc_url( home_url('/contact') ); ?>">Contact</a>
      <a class="hover:text-brand-600 focus:outline-none focus:ring-2 focus:ring-brand-400 rounded" href="<?php echo esc_url( home_url('/about') ); ?>">About</a>
    </div>
  </div>
  <button id="backToTop" class="fixed bottom-6 right-6 md:bottom-8 md:right-8 w-12 h-12 rounded-full bg-brand-600 text-white shadow-glow hover:bg-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-300 transition" aria-label="Back to top">↑</button>
</footer>

<?php wp_footer(); ?>
</body>
</html>
