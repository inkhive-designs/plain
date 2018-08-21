<?php
/**
 * @package Plain
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col-md-12 col-sm-12 grid plain'); ?>>
	
	
	<div class="featured-thumb col-md-6 col-sm-6">
        <?php if (has_post_thumbnail()) : ?>
            <a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><?php the_post_thumbnail('plain-featured'); ?></a>
        <?php else: ?>
            <a href="<?php the_permalink() ?>" title="<?php the_title_attribute() ?>"><img src="<?php echo get_template_directory_uri()."/imports/img/placeholder1.jpg"; ?>"></a>
        <?php endif; ?>
    </div><!--.featured-thumb-->
    

    <div class="thumb-content col-md-6 col-sm-6">
        <header class="entry-header">
            <h1 class="entry-title title-font"><a class="hvr-underline-reveal" href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
            <div class="postedon"><?php plain_posted_on(); ?></div>
            <span class="entry-excerpt"><?php the_excerpt(); ?></span>
            <span class="readmore"><a class="hvr-underline-from-center" href="<?php the_permalink() ?>"><?php _e('Continue Reading','plain'); ?></a></span>
        </header><!-- .entry-header -->
    </div><!--.out-thumb-->

</article><!-- #post-## -->