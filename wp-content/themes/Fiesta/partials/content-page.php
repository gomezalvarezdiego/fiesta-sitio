
<article id="post-<?php the_ID();?>" <?php post_class( get_post_meta( $post->ID, THEME_SHORT. '_extra_classes', true ) ); ?>>
    <?php the_content( '', false ); ?>
    <?php if( get_post_meta( $post->ID, THEME_SHORT. '_bullet_nav', true ) === 'show' ): ?>
    	<div class="bullet-nav" data-show-tooltips="<?php echo get_post_meta( $post->ID, THEME_SHORT. '_bullet_nav_tooltips', true ); ?>">
            <ul></ul>
        </div>
    <?php endif; ?>
    <?php oxy_atom_author_meta(); ?>
</article>
