<?php
/**
 * Portfolio shortcode
 *
 * @package Omega
 * @subpackage Admin
 * @since 0.1
 *
 * @copyright (c) 2014 Oxygenna.com
 * @license **LICENSE**
 * @version 1.7.6
 */
?>
<?php if( !empty( $show_filters ) ) : ?>
<div class="row">
    <div class="col-md-12">
        <div class="portfolio-header clearfix">
            <?php if( in_array( 'categories', $show_filters ) ) : ?>

            <h3 class="portfolio-title pull-left">
                <strong>
                    <?php _e( 'Noticias ', 'omega-td' );  ?> <i class="fa fa-angle-right"></i>
                </strong>
                <span>
                    <?php _e( 'Todas', 'omega-td' ); ?>
                </span>
            </h3>

            <?php endif; ?>
            <div class="portfolio-filters pull-right">
                <?php if( in_array( 'sort', $show_filters ) ) : ?>
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle btn-icon-right btn-sm" data-toggle="dropdown">
                            <b><?php _e( 'Filtro', 'omega-td' ); ?></b>
                            <span>
                                <i class="fa fa-angle-down"></i>
                            </span>
                        </button>
                        <ul class="dropdown-menu pull-right" role="menu">
                            <li><a class="portfolio-sort" data-sort="default"><?php _e( 'Por defecto', 'omega-td' ); ?></a></li>
                            <li><a class="portfolio-sort" data-sort="title"><?php _e( 'Titulo', 'omega-td' ); ?></a></li>
                            <li><a class="portfolio-sort" data-sort="date"><?php _e( 'Fecha', 'omega-td' ); ?></a></li>
                            <li><a class="portfolio-sort" data-sort="comments"><?php _e( 'Numero de comentarios', 'omega-td' ); ?></a></li>
                        </ul>
                    </div>
                <?php endif; ?>
                <?php if( in_array( 'order', $show_filters ) ) : ?>
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle btn-icon-right btn-sm" data-toggle="dropdown">
                            <b><?php _e( 'Orden', 'omega-td' ); ?></b>
                            <span>
                                <i class="fa fa-angle-down"></i>
                            </span>
                            <span>
                                <i class="fa fa-angle-down"></i>
                            </span>
                        </button>
                        <ul class="dropdown-menu pull-right" role="menu">
                            <li><a class="portfolio-order" data-value="true"><?php _e( 'Ascendente', 'omega-td' ); ?></a></li>
                            <li><a class="portfolio-order" data-value="false"><?php _e( 'Descendente', 'omega-td' ); ?></a></li>
                        </ul>
                    </div>
                <?php endif; ?>
                <?php if( in_array( 'categories', $show_filters ) ) : ?>
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle btn-icon-right btn-sm" data-toggle="dropdown">
                            <b><?php _e( 'Filtrar noticias por tema', 'omega-td' ); ?></b>
                            <span>
                                <i class="fa fa-angle-down"></i>
                            </span>
                        </button>
                        <ul class="dropdown-menu pull-right" role="menu">
                            <li><a class="portfolio-filter" data-filter="*"><?php _e( 'Todos', 'omega-td' ); ?></a></li>
                            <?php foreach( $filters as $filter ) : ?>
                                <li><a class="portfolio-filter" data-filter=".filter-<?php echo $filter->slug; ?>"><?php echo $filter->name; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>