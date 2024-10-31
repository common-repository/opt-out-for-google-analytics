<?php if ( ! $popup ): ?>
    <div class="gaoo-promotion-wrap">
<?php endif; ?>

<?php foreach ( $promo as $item ): ?>

    <?php
    if ( GAOO_Promo::should_hide( $item[ 'hide_if_active' ] ) ):
        continue;
    endif;
    ?>

    <div class="gaoo-promotion-box">

        <?php if ( $popup ): ?>
            <h2 class="clearfix"><?php echo esc_html( $item[ 'title' ] ); ?>
                <a href="<?php echo esc_url( add_query_arg( 'gaoo_promo', 1 ) ); ?>" title="<?php esc_attr_e( 'Close it for ever', 'opt-out-for-google-analytics' ); ?>">X</a>
            </h2>
        <?php endif; ?>

        <div class="gaoo-promotion-box-body">

            <?php if ( ! empty( $item[ 'link' ] ) ): ?>
            <a href="<?php echo esc_url( $item[ 'link' ] ); ?>" target="_blank" class="gaoo-promotion-link" title="<?php esc_attr_e( 'Opens in new tab', 'opt-out-for-google-analytics' ); ?>">
                <?php endif; ?>

                <?php if ( ! empty( $item[ 'image' ] ) ): ?>
                    <img src="<?php echo esc_url( $item[ 'image' ] ); ?>" alt="<?php echo empty( $item[ 'title' ] ) ? '' : esc_attr( $item[ 'title' ] ); ?>">
                <?php endif; ?>

                <?php if ( ! empty( $item[ 'link' ] ) ): ?>
            </a>
        <?php endif; ?>

            <?php if ( ! empty( $item[ 'desc' ] ) ): ?>
                <div class="gaoo-promotion-description">
                    <?php echo wp_kses_post( $item[ 'desc' ] ); ?>
                </div>
            <?php endif; ?>
        </div>

    </div>

<?php endforeach; ?>

<?php if ( ! $popup ): ?>
    </div>
<?php endif; ?>