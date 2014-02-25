<?php
/*
Template Name: Custom Home Page
*/

get_header(); ?>
    <div class="hero">
      <ul class="hero-items">
        <li id="hero-1">
          <div>
            <h2>A no-nonsense approach to health and wellbeing</h2>  
<!--        <h2>The Art of<br> Health &amp; Longevity</h2>  -->
          </div>
          <a href="" class="hero-cta">sign up for<br>a <strong>Free</strong> class</a>
        </li>
      </ul>
      <nav class="hero-control">
        <a href="#hero-1" title="Jump to Slide 1">Slide 1</a>
        <a href="#hero-2" title="Jump to Slide 2">Slide 2</a>
        <a href="#hero-3" title="Jump to Slide 3">Slide 3</a>
      </nav>
    </div><!-- .hero -->

    <main class="site-content" role="main">
      <section class="widget widget-classes">
        <h2>Classes</h2>
        
        <nav class="day">
          <h3>Tuesdays</h3>
          <ul>
            <li><a href="">
              Privates &amp; Treatments
              <em>7:30AM - 5:00PM</em>
            </a></li>
            <li><a href="">
              Tai Chi &amp; Qi-Gong
              <em>6:00PM - 7:00PM</em>
            </a></li>
            <li><a href="">
              Happy Hour <small>(Meditation/Reiki)</small>
              <em>7:15PM - 8:15PM</em>
            </a></li>
          </ul>
        </nav>

        <nav class="day">
          <h3>Wednesdays</h3>
          <ul>
            <li><a href="">
              Privates &amp; Treatments
              <em>7:30AM - 8:00PM</em>
            </a></li>
          </ul>
        </nav>

        <nav class="day">
          <h3>Thursdays</h3>
          <ul>
            <li><a href="">
              Privates &amp; Treatments
              <em>7:30AM - 12:00PM</em>
            </a></li>
            <li><a href="">
              Tai Chi &amp; Qi-Gong
              <em>12:00PM - 1:00PM</em>
            </a></li>
            <li><a href="">
              Push Hands
              <em>1:00PM - 2:00PM</em>
            </a></li>
            <li><a href="">
              Privates &amp; Treatments
              <em>2:30PM - 6:30PM</em>
            </a></li>
          </ul>
        </nav>

        <nav class="day">
          <h3>Saturdays</h3>
          <ul>
            <li><a href="">
              Privates &amp; Treatments
              <em>7:30AM - 11:00AM</em>
            </a></li>
            <li><a href="">
              Tai Chi &amp; Qi-Gong
              <em>11:00AM - 12:00PM</em>
            </a></li>
            <li><a href="">
              Privates &amp; Treatments
              <em>1:00PM - 8:00PM</em>
            </a></li>
          </ul>
        </nav>       
      </section><!-- .widget-classes -->
      
      <section class="widget widget-videos">
        <h2>Videos</h2>
        
        <ul class="thumbs">
          <li>
            <a href="">
              <span class="thumb-video">
                <img src="http://placehold.it/640x360">
              </span>
              <h3>Take your Meditation to the Streets <em>Part 2 - Tai Chi</em></h3>
            </a>
          </li>
          <li>
            <a href="">
              <span class="thumb-video">
                <img src="http://placehold.it/640x360">
              </span>
              <h3>Take your Meditation to the Streets <em>Part 2 - Tai Chi</em></h3>
            </a>
          </li>
        </ul>
      </section><!-- .widget-videos -->
      
      <section class="widget widget-location">
        <h2>Find us</h2>
        <div class="map">
          <img src="http://maps.googleapis.com/maps/api/staticmap?center=1273A+Queen+Street+West+,+toronto,+ON&zoom=16&scale=2&size=640x360&maptype=roadmap&sensor=false&format=png&visual_refresh=true" class="map">
        </div>
        <address>
          <h3>Parkdale Prana Room</h3>
          <span class="adr-street">1273A Queen Street West</span>
          <span class="adr-unit">(2nd Floor)</span>
        </address>
        <ul class="contact">
          <li><a href="tel:4168774206" class="phone">(416) 877-4106</a></li>
          <li><a href="mailto:paul@qibelly.com" class="email">paul@qibelly.com</a></li>
        </ul>
        <ul class="widget-social">
          <li><a href="" class="facebook">Facebook</a></li>
          <li><a href="" class="twitter">Twitter</a></li>
          <li><a href="" class="youtube">Youtube</a></li>
        </ul>
      </section><!-- .widget-location -->
      
      <section class="widget widget-blog">
        <h2>From the Blog</h2>
        
          <?php query_posts('showposts=1&orderby=title&order=ASC'); ?>

          <?php while ( have_posts() ) : the_post(); ?>

              <?php get_template_part( 'content', 'single' ); ?>

          <?php endwhile; // end of the loop. ?>
        
      </section><!-- .widget-blog -->
    </main>
<?php get_footer(); ?>