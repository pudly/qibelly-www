<?php
/*
Template Name: Classes
*/
?>

<?php get_header(); ?>

<?php 

//fix the plugin activation
//get the title
//times aren't populating properly

$options = get_option('plugin_options');
$options = array_filter($options);
//echo 'stuff<pre>';
//print_r($options);
//echo '</pre>';
?>
 <?php
  $args = array( 'post_type'=> 'class');//, 'category_name'=>'most-popular', 'posts_per_page' => '5');
  
  if($_GET['cat'] != 1)
  {
    
      $args["cat"] = $_GET['cat'];
      $page_cat = get_category( $_REQUEST['cat']);
      $parent_cat = get_category( $page_cat->parent);
  }
  
  $post = get_post($id);
  //echo '<h2>'.get_the_title($id).'</h2>';
  //echo '<p>'.$post->post_content.'</p>';
  
  
  ?>

<main class="site-content" role="main">
      <section class="widget widget-classes">
        <h2>Classes</h2>
        
              
<?php
  
  
//  echo "<ul>";
$lastdayofweek = "";

foreach($options as $key => &$option)
{

              
    if($option != null)
    {
        $is_new_day = false;
        $dayofweek =  strstr($key, "_", true);
        $num = substr ( $key, strrpos ( $key , "_" )+1 , 2) ;
        $correspondingtime = $options[$dayofweek . '_time_'.$num];
        
        //echo "lastdayofweek ". $lastdayofweek ."<br/>";
        if($lastdayofweek != $dayofweek)
        {
//            echo "<h1>" . $dayofweek . "s</h1>";
            $is_new_day = true;
        }
          
        if($is_new_day)
        {
            echo "
        <nav class='day'>
          <h3>$dayofweek</h3>
          <ul>         
";
        }
       // echo "<li><a href='#" . $option ."'> " . $key . " " . $option . " TIME: " . $correspondingtime. " </a></li>";
        echo "
           <li><a href='#$option'>
              $option
              <em>$correspondingtime</em>
            </a></li>  "; 
        
        unset($options[$dayofweek . '_time_'.$num]);
        $lastdayofweek = $dayofweek;
//        
//        echo "<br/>unset$dayofweek . '_time_'.$num<pre>";
//        print_r($options);
//        echo '</pre>';
    }
}

if($is_new_day)
        {
            ?>
              
          </ul>
        </nav>
              <?php
        }
?>
        
        
         
      </section><!-- .widget-classes -->
      
     
      <section class="widget widget-classlist">
        <ul>
<?php 
        query_posts( $args ); 
        if ( have_posts() ) : while ( have_posts() ) : the_post(); 
        
        $post_categories = wp_get_post_categories( get_the_ID() );
        
        $cat_slug_string = "";
        foreach($post_categories as $c){
            $cat = get_category( $c );
            $cat_slug_string .= $cat->slug." "; 
        }
?>
          
          <li data-filter="<?php echo $cat_slug_string; ?>">

<?php
        $day=get_post_meta(get_the_ID(), 'day', true);
        $time=get_post_meta(get_the_ID(), 'time', true);
        $price=get_post_meta(get_the_ID(), 'price', true);
        $locations_str=get_post_meta(get_the_ID(), 'class-locations', true);
        $locations = explode(",", str_replace(" ", "", $locations_str));
        $experience_level=get_post_meta(get_the_ID(), 'experience-level', true);
        $bodytag = str_replace("%body%", "black", "<body text='%body%'>");
?>            
            
            <?php the_title('<h3>','</h3>');?>
            
            <p><?php the_excerpt(); ?></p>

<?php
        if ($post_categories) {
?>
            <ul class="tags">
<?php
          foreach($post_categories as $c){
            $cat = get_category( $c );
?>
              <li><?php echo $cat->name." "; ?></li>
<?php
            $cats[] = array( 'name' => $cat->name, 'slug' => $cat->slug ); 
          }
?>
            </ul>
<?php
        }
?>
            
<?php   if($price){ ?>
            <span class="price"><?php echo $price; ?></span>
<?php } ?>

<?php   if($experience_level) { ?>
            <span class="experience"><?php echo $experience_level;//false if you want an array?></span>	
<?php } ?>
            <a href="<?php echo get_permalink($post->ID); ?>" title="<?php the_title();?>">Read more</a>
            
          </li>
<?php endwhile; ?>
        </ul><!-- // .widget-classlist ul -->
      </section><!-- .widget-classlist -->


<?php else: ?>

      <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>

<?php endif; ?>
    </main>

<?php get_footer(); ?>