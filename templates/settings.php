<?php $language = strstr( GAOO_LOCALE, '_', true ); ?>

<div class="wrap" id="gaoo">
    <h1><?php esc_html_e( 'Settings' ); ?> &rsaquo; Opt-Out for Google Analytics</h1>

	<div class="gaoo-rate-wrap">
        <?php esc_html_e( 'Please rate this plugin if it helped you:', 'opt-out-for-google-analytics' ); ?>
		<a href='https://wordpress.org/support/plugin/opt-out-for-google-analytics/reviews/?rate=5#new-post' target='_blank'>
			<i class='gaoo-rate-stars'>
	            <svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-star'><polygon points='12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2' /></svg>
	            <svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-star'><polygon points='12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2' /></svg>
	            <svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-star'><polygon points='12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2' /></svg>
	            <svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-star'><polygon points='12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2' /></svg>
	            <svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-star'><polygon points='12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2' /></svg>
            </i>
		</a>
	</div>

    <?php $this->messages->render( true ); ?>

	<p>
		<?php printf( esc_html__( "Use this shortcode on every page or post you want, to display the GA Opt Out: %s", 'opt-out-for-google-analytics' ), '<code title="' . esc_attr__( 'Click to copy the shortcode!', 'opt-out-for-google-analytics' ) . '">' . esc_html( GAOO_SHORTCODE ) . '</code>' ); ?>
		<span class="gaoo-clipboard dashicons dashicons-admin-page" title="<?php esc_attr_e( 'Click to copy the shortcode!', 'opt-out-for-google-analytics' ); ?>" data-copy="<?php echo esc_attr( GAOO_SHORTCODE ); ?>"></span>
        <br />

		<small><?php esc_html_e( "Do you have a data processing agreement for Google Analytics?", 'opt-out-for-google-analytics' ); ?>
			&nbsp;<?php printf( "<a href='%s' target='_blank'>%s</a>", esc_url( 'https://support.google.com/analytics/answer/3379636?hl=' . ( empty( $language ) ?: $language ) ), esc_html__( 'More infos.', 'opt-out-for-google-analytics' ) ); ?></small>
    </p>

    <?php GAOO_Utils::render_checklist( $form_data ); ?>

    <?php GAOO_Promo::render( false, true ); ?>

	<form method="post">
        <table class="form-table">
            <tbody>
            <tr>
                <th scope="row">
                    <label><?php esc_html_e( "Status", 'opt-out-for-google-analytics' ); ?></label>
                </th>
                <td>
                    <label for="gaoo-status">
                        <input type="checkbox" name="gaoo[status]" id="gaoo-status" value="on" <?php checked( true, ( $status == 'on' || empty( $status ) ) ); ?> />
                        <?php esc_html_e( "Enable Opt-Out function", 'opt-out-for-google-analytics' ); ?>
                    </label>
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label><?php esc_html_e( "Tracking ID", 'opt-out-for-google-analytics' ); ?></label>
                </th>
                <td>
                    <fieldset>
						<?php $is_manual = ( $ga_plugin == 'manual' || empty( $ga_plugin ) ); ?>

	                    <label for="ga-plugin-manual">
                            <input type="radio" name="gaoo[ga_plugin]" id="ga-plugin-manual" value="manual" <?php checked( true, $is_manual ); ?> />
                            <?php esc_html_e( 'Enter manually', 'opt-out-for-google-analytics' ); ?>
                        </label>

                        <div <?php echo $is_manual ? '' : 'class="hide"'; ?>>
                            <input type="text" id="gaoo-ua-code" name="gaoo[ua_code]" class="regular-text" placeholder="<?php esc_attr_e( 'G-XXXXXXXXXX or UA-XXXXXX-Y', 'opt-out-for-google-analytics' ); ?>" value="<?php echo esc_attr( $ua_code ); ?>" /><br>

	                        <p>
			                    <small><?php esc_html_e( "Searching for your code?", 'opt-out-for-google-analytics' ); ?>
				                    &nbsp;<?php printf( "<a href='%s' target='_blank'>%s</a>", esc_url( 'https://support.google.com/analytics/answer/9539598?hl=' . ( empty( $language ) ?: $language ) ), esc_html__( 'More infos.', 'opt-out-for-google-analytics' ) ); ?></small>
							</p>

                            <textarea id="ga-plugin-tracking-code" class="regular-text" rows="10" name="gaoo[tracking_code]" placeholder="<?php esc_attr_e( 'Enter here your tracking code for Google Analytics to insert it on your whole website. Leave empty if you do not want it.', 'opt-out-for-google-analytics' ); ?>"><?php echo stripslashes( $tracking_code ); ?></textarea>
                        </div>
                        <br />

                        <?php foreach ( $ga_plugins as $key => $info ): ?>
		                    <label for="ga-plugin-<?php echo $key; ?>">
                                <input type="radio" name="gaoo[ga_plugin]" id="ga-plugin-<?php echo esc_attr( $key ); ?>" value="<?php echo esc_attr( $key ); ?>" <?php echo ( ! isset( $info[ 'is_active' ] ) || $info[ 'is_active' ] ) ? '' : 'disabled="disabled"'; ?> <?php checked( $key, $ga_plugin ); ?> />
                                <?php echo esc_html( $info[ 'label' ] ); ?>

                                <?php
                                    $link_text = null;

                                    if ( isset( $info[ 'is_active' ] ) && ! $info[ 'is_active' ] ):
                                        $link_text = esc_html__( 'Not activated', 'opt-out-for-google-analytics' );
                                        $url       = esc_url( $info[ 'url_activate' ] );
                                    endif;

                                    if ( isset( $info[ 'is_active' ] ) && ! $info[ 'is_installed' ] ):
                                        $link_text = esc_html__( 'Not installed', 'opt-out-for-google-analytics' );
                                        $url       = esc_url( $info[ 'url_install' ] );
                                    endif;
                                ?>

                                <?php if ( ! empty( $link_text ) ): ?>
				                    <small>(<a href="<?php echo $url; ?>" target="<?php echo isset( $info[ 'target' ] ) ? esc_attr( $info[ 'target' ] ) : '_self'; ?>"><?php echo $link_text; ?></a>)</small>
                                <?php endif; ?>
                            </label>
		                    <br />
                        <?php endforeach; ?>
                    </fieldset>
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label><?php esc_html_e( "Status check", 'opt-out-for-google-analytics' ); ?></label>
                </th>
                <td>
                    <fieldset>
                        <label>
							<?php esc_html_e( "Run the status check", 'opt-out-for-google-analytics' ); ?>
	                        <select name="gaoo[status_intervall]">
                                <option value="daily" <?php selected( $status_intervall, 'daily' ); ?>><?php esc_html_e( 'daily', 'opt-out-for-google-analytics' ); ?></option>
                                <option value="weekly" <?php selected( $status_intervall, 'weekly' ); ?>><?php esc_html_e( 'weekly', 'opt-out-for-google-analytics' ); ?></option>
                                <option value="monthly" <?php selected( $status_intervall, 'monthly' ); ?>><?php esc_html_e( 'monthly', 'opt-out-for-google-analytics' ); ?></option>
                            </select>
                        </label>
                        <br>

                        <label>
							<?php esc_html_e( "Send mail if the status check failed, to", 'opt-out-for-google-analytics' ); ?>
	                        <input type="text" class="regular-text" name="gaoo[status_mails]" id="gaoo-status-mails" value="<?php echo esc_attr( $status_mails ); ?>" title="<?php esc_attr_e( "Leave empty to disable.", 'opt-out-for-google-analytics' ); ?>" placeholder="<?php esc_attr_e( "e.g. admin@example.org", 'opt-out-for-google-analytics' ); ?>" <?php echo empty( $status_mails_sync ) ?: 'readonly'; ?>>
                        </label>
						<br>

                        <label>
                            <input type="checkbox" name="gaoo[status_mails_sync]" value="1" id="gaoo-status-mails-sync" <?php checked( $status_mails_sync, 1 ); ?> data-mail="<?php echo esc_attr( $wp_admin_mail ); ?>">
                            <?php esc_html_e( "synchronize with WordPress admin mail", 'opt-out-for-google-analytics' ); ?>
	                        <a href="<?php echo esc_url( admin_url( 'options-general.php' ) ); ?>" target="_blank" title="<?php esc_html_e( "Go to settings", 'opt-out-for-google-analytics' ); ?>" class="dashicons dashicons-external"></a></label>
	                    </label>
	                    <br>

                        <label for="gaoo-disable-monitoring"><input type="checkbox" name="gaoo[disable_monitoring]" value="1" id="gaoo-disable-monitoring" <?php checked( $disable_monitoring, 1 ); ?>> <?php esc_html_e( "Suppress the message in the dashboard if the settings are not data protection compliant.", 'opt-out-for-google-analytics' ); ?></label>
                    </fieldset>
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label><?php esc_html_e( "Force reload", 'opt-out-for-google-analytics' ); ?></label>
                </th>
                <td>
                    <label for="gaoo-force-reload"><input type="checkbox" name="gaoo[force_reload]" value="1" id="gaoo-force-reload" <?php checked( $force_reload, 1 ); ?>> <?php esc_html_e( "Force page reload after the click on the link.", 'opt-out-for-google-analytics' ); ?></label>
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label for="gaoo-privacy-page"><?php esc_html_e( "Privacy Policy Page", 'opt-out-for-google-analytics' ); ?></label>
                </th>
                <td>
					<?php wp_dropdown_pages( array( 'selected' => empty( $privacy_page_id ) ? 0 : $privacy_page_id, 'id' => 'gaoo-privacy-page', 'name' => 'gaoo[privacy_page_id]', 'show_option_none' => esc_html__( "— Select —", 'opt-out-for-google-analytics' ), 'option_none_value' => 0, 'post_status' => 'publish,draft', ) ); ?>

	                <a href="<?php echo esc_url( admin_url( 'post.php?action=edit&post=' . $privacy_page_id ) ); ?>" class="<?php echo empty( $privacy_page_id ) ? 'hide' : ''; ?> gaoo-edit-link dashicons dashicons-welcome-write-blog" target="_blank" title="<?php esc_html_e( 'Edit selected page', 'opt-out-for-google-analytics' ); ?>"></a>

                    <p>
                        <small><?php esc_html_e( "Select the page, where you will use this shortcode, for the monitoring.", 'opt-out-for-google-analytics' ); ?></small>
                    </p>

                    <?php if ( version_compare( get_bloginfo( 'version' ), '4.9.6', '>=' ) ): ?>
		                <p>
                            <label for="gaoo-wp-privacy-page"><input type="checkbox" name="gaoo[wp_privacy_page]" value="1" id="gaoo-wp-privacy-page" data-id="<?php echo esc_attr( $wp_privacy_page_id ); ?>" <?php checked( $wp_privacy_page, 1 ); ?>> <?php esc_html_e( "Synchronize with WordPress Privacy Policy page.", 'opt-out-for-google-analytics' ); ?>
	                            <a href="<?php echo esc_url( admin_url( 'options-privacy.php' ) ); ?>" target="_blank" title="<?php esc_html_e( "Go to settings", 'opt-out-for-google-analytics' ); ?>" class="dashicons dashicons-external"></a></label>
                        </p>
                    <?php endif; ?>
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label for="gaoo-link-deactivate"><?php esc_html_e( "Text of link for deactivate", 'opt-out-for-google-analytics' ); ?></label>
                </th>
                <td>
                    <input type="text" id="gaoo-link-deactivate" name="gaoo[link_deactivate]" class="regular-text" value="<?php echo esc_attr( $link_deactivate ); ?>" />
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label for="gaoo-popup-deactivate"><?php esc_html_e( "Popup Text for deactivate", 'opt-out-for-google-analytics' ); ?>
                    </label>
                </th>
                <td>
                    <input type="text" id="gaoo-popup-deactivate" name="gaoo[popup_deactivate]" class="regular-text" value="<?php echo esc_attr( $popup_deactivate ); ?>" /> <span class="gaoo-empty-popup <?php echo empty( $popup_deactivate ) ? 'empty' : ''; ?>" title="<?php esc_attr_e( 'Click to empty field, to disable the popup.', 'opt-out-for-google-analytics' ); ?>">&#10006;</span>
                    <p>
                        <small><?php esc_html_e( "Leave empty to disable popup", 'opt-out-for-google-analytics' ); ?></small>
                    </p>
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label for="gaoo-link-activate"><?php esc_html_e( "Text of link for activate", 'opt-out-for-google-analytics' ); ?></label>
                </th>
                <td>
                    <input type="text" id="gaoo-link-activate" name="gaoo[link_activate]" class="regular-text" value="<?php echo esc_attr( $link_activate ); ?>" />
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label for="gaoo-popup-activate"><?php esc_html_e( "Popup Text for activate", 'opt-out-for-google-analytics' ); ?></label>
                </th>
                <td>
                    <input type="text" id="gaoo-popup-activate" name="gaoo[popup_activate]" class="regular-text" value="<?php echo esc_attr( $popup_activate ); ?>" /> <span class="gaoo-empty-popup <?php echo empty( $popup_activate ) ? 'empty' : ''; ?>" title="<?php esc_attr_e( 'Click to empty field, to disable the popup.', 'opt-out-for-google-analytics' ); ?>">&#10006;</span>
                    <p>
                        <small><?php esc_html_e( "Leave empty to disable popup", 'opt-out-for-google-analytics' ); ?></small>
                    </p>
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label><?php esc_html_e( "Keep data after uninstall", 'opt-out-for-google-analytics' ); ?></label>
                </th>
                <td>
	                <label>
	                    <input type="checkbox" id="gaoo-uninstall-keep-data" name="gaoo[uninstall_keep_data]" value="on" <?php checked( 'on', $uninstall_keep_data ); ?> />
                        <?php esc_html_e( "If the settings and language files of this plugin should be kept after uninstallation, activate this checkbox. By default, all settings will be irrevocably deleted.", 'opt-out-for-google-analytics' ); ?>
	                </label>
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label><?php esc_html_e( "Dasboard widget", 'opt-out-for-google-analytics' ); ?></label>
                </th>
                <td>
	                <label>
	                    <input type="checkbox" id="gaoo-disable-dashboard" name="gaoo[disable_dashboard]" value="on" <?php checked( 'on', $disable_dashboard ); ?> />
                        <?php esc_html_e( "Disable the dashboard widget for this plugin.", 'opt-out-for-google-analytics' ); ?>
	                </label>
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label for="gaoo-custom-css"><?php esc_html_e( "Add custom css", 'opt-out-for-google-analytics' ); ?></label>
                </th>
                <td>
                    <table>
                        <tr>
                            <td>
                                <textarea id="gaoo-custom-css" name="gaoo[custom_css]" class="regular-text" rows="15"><?php echo wp_strip_all_tags( $custom_css ); ?></textarea>
                                <p>
                                    <small><?php esc_html_e( "This CSS is only inserted where the shortcode is used.", 'opt-out-for-google-analytics' ); ?></small>
                                </p>
                            </td>
                            <td class="valign-top">
                                <p><strong><?php esc_html_e( 'Overview CSS classes', 'opt-out-for-google-analytics' ); ?></strong></p>

                                <hr>

                                <p>
                                    <pre>#gaoo-link { }</pre>
                                <?php esc_html_e( 'The link itselfs.', 'opt-out-for-google-analytics' ); ?>
	                            </p>

	                            <p>&nbsp;</p>

                                <p>
                                    <pre>.gaoo-link-activate { }</pre>
                                <?php esc_html_e( 'If the user has DISALLOWED tracking and wants to allow it again.', 'opt-out-for-google-analytics' ); ?>
	                            </p>

	                            <p>&nbsp;</p>

                                <p>
                                    <pre>.gaoo-link-deactivate { }</pre>
                                <?php esc_html_e( 'If the user has ALLOWED tracking and wants to diallow it again.', 'opt-out-for-google-analytics' ); ?>
	                            </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            </tbody>
        </table>

        <?php wp_nonce_field( 'gaoo-settings' ); ?>

		<p class="submit">
            <input type="submit" name="submit" id="submit" class="button button-primary" value="<?php esc_html_e( "Save Changes" ); ?>">
        </p>
    </form>
</div>