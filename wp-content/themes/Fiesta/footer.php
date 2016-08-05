        <?php
        $footer_padding = oxy_get_option( 'footer_height' );
        $upper_footer_padding = oxy_get_option( 'upper_footer_height' );
        ?>
        </div>
<!--         <footer id="footer" role="contentinfo" class="mde-footer">
            <?php if(is_active_sidebar('upper-footer-middle') || is_active_sidebar('upper-footer-right') || is_active_sidebar('upper-footer-left') || is_active_sidebar('upper-footer-middle-left') || is_active_sidebar('upper-footer-middle-right')): ?>
            <section class="section <?php oxy_upper_footer_section_classes(); ?>">
                <div class="container">
                    <div class="row element-<?php echo $upper_footer_padding?>-top element-<?php echo $upper_footer_padding?>-bottom">
                    <?php   $columns = oxy_get_option('upper_footer_columns');
                    $span = $columns == false? 'col-md-12' : 'col-md-' . (12/$columns);
                        if( $columns == 1){ ?>
                            <div class="<?php echo $span; ?> text-center"><?php dynamic_sidebar('upper-footer-middle'); ?></div><?php
                        }
                        else if( $columns == 2){ ?>
                            <div class="<?php echo $span; ?>"><?php dynamic_sidebar('upper-footer-left'); ?></div>
                            <div class="<?php echo $span; ?> text-right"><?php dynamic_sidebar('upper-footer-right'); ?></div><?php
                        }
                        else if( $columns == 3){ ?>
                            <div class="<?php echo $span; ?>"><?php dynamic_sidebar('upper-footer-left'); ?></div>
                            <div class="<?php echo $span; ?> text-left"><?php dynamic_sidebar('upper-footer-middle'); ?></div>
                            <div class="<?php echo $span; ?> text-left"><?php dynamic_sidebar('upper-footer-right'); ?></div><?php
                        }
                        else if ( $columns == 4){ ?>
                            <div class="<?php echo $span; ?>"><?php dynamic_sidebar('upper-footer-left'); ?></div>
                            <div class="<?php echo $span; ?>"><?php dynamic_sidebar('upper-footer-middle-left'); ?></div>
                            <div class="<?php echo $span; ?>"><?php dynamic_sidebar('upper-footer-middle-right'); ?></div>
                            <div class="<?php echo $span; ?>"><?php dynamic_sidebar('upper-footer-right'); ?></div><?php
                        }?>
                    </div>
                </div>
            </section>
            <?php endif; ?>
            <?php if(is_active_sidebar('footer-middle') || is_active_sidebar('footer-right') || is_active_sidebar('footer-left') || is_active_sidebar('footer-middle-left') || is_active_sidebar('footer-middle-right')): ?>
            <section class="section <?php oxy_footer_section_classes();?>">
                <div class="container">
                    <div class="row element-<?php echo $footer_padding?>-top element-<?php echo $footer_padding?>-bottom">
                    <?php   $columns = oxy_get_option('footer_columns');
                    $span = $columns == false? 'col-md-12':'col-md-'.(12/$columns);
                        if( $columns == 1){ ?>
                            <div class="<?php echo $span; ?> text-center"><?php dynamic_sidebar('footer-middle'); ?></div><?php
                        }
                        else if( $columns == 2){ ?>
                            <div class="<?php echo $span; ?>"><?php dynamic_sidebar('footer-left'); ?></div>
                            <div class="<?php echo $span; ?> text-right"><?php dynamic_sidebar('footer-right'); ?></div><?php
                        }
                        else if( $columns == 3){ ?>
                            <div class="<?php echo $span; ?>"><?php dynamic_sidebar('footer-left'); ?></div>
                            <div class="<?php echo $span; ?> text-left"><?php dynamic_sidebar('footer-middle'); ?></div>
                            <div class="<?php echo $span; ?> text-left"><?php dynamic_sidebar('footer-right'); ?></div><?php
                        }
                        else if ( $columns == 4){ ?>
                            <div class="<?php echo $span; ?>"><?php dynamic_sidebar('footer-left'); ?></div>
                            <div class="<?php echo $span; ?>"><?php dynamic_sidebar('footer-middle-left'); ?></div>
                            <div class="<?php echo $span; ?>"><?php dynamic_sidebar('footer-middle-right'); ?></div>
                            <div class="<?php echo $span; ?>"><?php dynamic_sidebar('footer-right'); ?></div><?php
                        }?>
                    </div>
                </div>
            </section>
            <?php endif; ?>
        </footer>

 --> 

<!--     Replace footer for a revolution slider (Client request) -->
        <section id="home-slider">  
            <?php putRevSlider( "footer" ); ?>        
        </section>

    </div>
        <!-- Fixing the Back to top button -->

         <?php if( oxy_get_option('back_to_top') === 'enable' ) : ?>
            <a href="javascript:void(0)" class="go-top go-top-<?php echo oxy_get_option('back_to_top_shape')?>">
                <i class="fa fa-angle-up"></i>
            </a>
        <?php endif; ?>

            <script>
              (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
              (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
              m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
              })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
              ga('create',  'UA-43607200-1', 'auto');
              ga('send', 'pageview');
            </script>
            
        <script type="text/javascript">
          WebFontConfig = {
            google: { families: [ 'Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800:latin' ] }
          };
          (function() {
            var wf = document.createElement('script');
            wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
              '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
            wf.type = 'text/javascript';
            wf.async = 'true';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(wf, s);
          })(); </script>
        
        <?php wp_footer(); ?>
    </body>
</html>