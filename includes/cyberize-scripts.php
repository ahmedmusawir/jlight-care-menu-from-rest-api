<?php

// Conditionally load JS on plugin settings pages only
function jlight_admin_scripts($hook)
{

 wp_register_script(
  'jlight-admin',
  CG_JLIGHT_URL . 'admin/assets/dist/js/admin.min.js',
  ['jquery'],
  time()
 );

 /* HOOK HERE IS THE NAME OF THE ADMIN PAGE URL. THIS WAY THE SCRIPT CAN BE LOADED WHEN
  * A SPECIFIC PAGE IS ACCESSED ON THE WP ADMIN SIDE THIS CAN BE USED TO LIMIT THE CSS ALSO
  */

 wp_localize_script('jlight-admin', 'wpplugin', [
  'hook' => $hook
 ]);

 if ('toplevel_page_analytics-default-settings' == $hook) {
  wp_enqueue_script('jlight-admin');
 }
}

// add_action('admin_enqueue_scripts', 'jlight_admin_scripts');

// Conditionally load JS on single post pages
function jlight_frontend_scripts()
{

 wp_register_script(
  'jlight-frontend',
  CG_JLIGHT_URL . 'frontend/assets/dist/js/frontend.min.js',
  [],
  time()
 );

 /* THIS SCRIPT ONLY LOADS ON WP FRONTEND FOR SINGLE BLOG POST OR CPT SINGLE ONLY */
 if (!is_single()) {
  wp_enqueue_script('jlight-frontend');
 }
}

add_action('wp_enqueue_scripts', 'jlight_frontend_scripts', 100);