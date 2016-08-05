<div class="container ">
    <div class="row element-normal-top ">
        <div class="col-md-offset-1 col-md-11">
            <?php get_template_part( 'partials/blog/loop','mde' ); ?>
        </div>
    </div>
</div>


<div class="container"> 
    <div class="row">   
        <div class="col-md-offset-1 col-md-7 col-sm-12">
            <?php 
                $allow_comments = oxy_get_option( 'site_comments' );
                if( $allow_comments == 'posts' || $allow_comments == 'all' ) {
                    comments_template( '', true );
                }
            ?>
        </div>
    </div>  
</div>


<div class="container"> 
    <div class="row">
        <div class="col-md-offset-1 col-md-11">
            <?php get_template_part( 'partials/blog/posts/normal/nav', 'single' );  ?>
        </div>
    </div>
</div> 
