<?php
/**
 * Plugin Name: 2FA Enforcer
 * Description: Enforces Two-Factor Authentication for admin-level users (those with the manage_options capability). Requires the official Two-Factor plugin.
 * Version: 1.0.1
 * Author: Marc Chiroiu
 * License: GPL2+
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Show admin notice if the Two-Factor plugin is not active.
 */
add_action( 'admin_init', function() {

    if ( function_exists( 'is_plugin_active' ) && is_plugin_active( 'two-factor/two-factor.php' ) ) {
        return;
    }

    add_action( 'admin_notices', function() {
        ?>
        <div class="notice notice-error">
            <p><strong>2FA Enforcer:</strong> The required <em>Two-Factor</em> plugin is not active. Please install and activate it.</p>
        </div>
        <?php
    });
});

/**
 * Enforce 2FA for admin-level users (capability-based).
 */
add_filter( 'authenticate', function( $user, $username ) {

    // If previous authentication errors exist, stop here.
    if ( is_wp_error( $user ) ) {
        return $user;
    }

    // Ensure Two-Factor plugin classes are available.
    if ( ! class_exists( 'Two_Factor_Core' ) ) {
        return $user;
    }

    // Enforce 2FA for users with admin-level capabilities.
    // 'manage_options' is a capability only administrators have in standard WP setups.
    if ( user_can( $user, 'manage_options' ) ) {

        $enabled = Two_Factor_Core::is_user_using_two_factor( $user->ID );

        if ( ! $enabled ) {
            return new WP_Error(
                '2fa_required',
                __( 'Two-Factor Authentication is required for administrators. Please contact a site administrator to enable access.', '2fa-enforcer' )
            );
        }
    }

    return $user;

}, 20, 2 );
