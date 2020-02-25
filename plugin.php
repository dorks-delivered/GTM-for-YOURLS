<?php
/*
Plugin Name: GoogleTagManager for YOURLS
Plugin URI: https://tanner.technology/GTM
Description: Adds google tag manager tracking to every clicked link
Version: 0.1
Author: Tanner Anderson
Author URI: https://tanner.technology/
*/

if( !defined( 'YOURLS_ABSPATH' ) ) die();

yourls_add_action( 'pre_redirect', 'gtm_add_tracking' );

function gtm_add_tracking( $args ) {
    $url = $args[0];
    $code = $args[1];
    $tagid = "GTM-XXXXXX1"; // SET TAGID HERE

    echo "<html>";
    echo "<head>";
    echo "<!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','$tagid');</script>
    <!-- End Google Tag Manager -->";
    echo "</head>";

    echo "<body>";
    echo "<!-- Google Tag Manager (noscript) -->
    <noscript><iframe src=\"https://www.googletagmanager.com/ns.html?id=$tagid\"
    height=\"0\" width=\"0\" style=\"display:none;visibility:hidden\"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->";
    echo "<p>Please <a href='$url'>click here</a> if you are not automatically redirected.</p>";
    echo "</body>";
    echo "</html>";
}