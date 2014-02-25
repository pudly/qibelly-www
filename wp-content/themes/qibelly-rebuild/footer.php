<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package qibelly-rebuild
 */
?>

    <footer class="page-footer" role="contentinfo">
      <main class="footer-content">
        <section class="widget widget-twitter">
          <h2>Latest tweets</h2>
          <ul class="tweets">
            <li>
              <a href="">
                <img src="http://placehold.it/50x50" class="tweets-avatar">
                <p>11 hour shift and stronger energetically then when I started. How is this possible? Answer: Intent. <em>#internalstrengthtraining</em></p>
              </a>
            </li>
            <li>
              <a href="">
                <img src="http://placehold.it/50x50" class="tweets-avatar">
                <p>11 hour shift and stronger energetically then when I started. How is this possible? Answer: Intent. <em>#internalstrengthtraining</em></p>
              </a>
            </li>
          </ul>
        </section><!-- .widget-twitter -->
        <section class="widget widget-location">
          <address>
            <h3>Parkdale Prana Room</h3>
            <span class="adr-street">1273A Queen Street West</span>
            <span class="adr-unit">(2nd Floor)</span>
          </address>
          <ul class="contact">
            <li><a href="tel:4168774206" class="phone">(416) 877-4106</a></li>
            <li><a href="mailto:paul@qibelly.com" class="email">paul@qibelly.com</a></li>
          </ul>
        </section><!-- .widget-location -->
        <section class="widget widget-sitemap">
          <nav>
            <h2>Sitemap</h2>
            <ul>
              <li><a href="">Some link</a></li>
              <li><a href="">Some link</a></li>
              <li><a href="">Some link</a></li>
              <li><a href="">Some link</a></li>
              <li><a href="">Some link</a></li>
              <li><a href="">Some link</a></li>
              <li><a href="">Some link</a></li>
              <li><a href="">Some link</a></li>
              <li><a href="">Some link</a></li>
            </ul>
          </nav>
          <ul class="widget-social">
            <li><a href="" class="facebook">Facebook</a></li>
            <li><a href="" class="twitter">Twitter</a></li>
            <li><a href="" class="youtube">Youtube</a></li>
          </ul>
        </section><!-- .widget-location -->
      </main>
    </footer>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="assets/components/jquery.js"><\/script>');</script>
    <script src="assets/js/scripts.min.js"></script>

    <script> // google analytics
      (function(f,i,r,e,s,h,l){i['GoogleAnalyticsObject']=s;f[s]=f[s]||function(){
      (f[s].q=f[s].q||[]).push(arguments)},f[s].l=1*new Date();h=i.createElement(r),
      l=i.getElementsByTagName(r)[0];h.async=1;h.src=e;l.parentNode.insertBefore(h,l)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-XXXXXXXX-XX');
      ga('send', 'pageview');
    </script>
    
    <script> // temporary
      
      // sticky header after 40px of scroll
      var header = document.querySelector('.site-header');
      function onScroll(e) {
        window.scrollY >= 40 ? header.classList.add('sticky') : header.classList.remove('sticky');
      }
      document.addEventListener('scroll', onScroll);    

    </script>

<?php wp_footer(); ?>

</body>
</html>