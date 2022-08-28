<?php

// Conditionally load CSS on plugin settings pages only
function cg_jlight_admin_styles($hook)
{
 // LOADING BOOTSTRAP 4 ON THE WP ADMIN SIDE
 wp_register_style(
  'wpplugin-admin-bootstrap',
  'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css',
  [],
  time()
 );

 wp_enqueue_style('wpplugin-admin-bootstrap');

 // LOADING MAIN PLUGIN ADMIN SIDE STYLES
 wp_register_style(
  'jlight-admin',
  CG_JLIGHT_URL . 'admin/assets/dist/css/admin.min.css',
  [],
  time()
 );

 wp_enqueue_style('jlight-admin');
}

// add_action('admin_enqueue_scripts', 'cg_jlight_admin_styles');

// Load CSS on the frontend
function cg_jlight_frontend_styles()
{

// LOADING BOOTSTRAP 4 ON THE WP ADMIN SIDE
 wp_register_style(
  'wpplugin-frontend-bootstrap',
  'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css',
  [],
  time()
 );

 wp_enqueue_style('wpplugin-frontend-bootstrap');

 // LOADING CUSTOM FRONEND STYLES
 wp_register_style(
  'jlight-frontend',
  CG_JLIGHT_URL . 'frontend/assets/dist/css/frontend.min.css',
  [],
  time()
 );

 wp_enqueue_style('jlight-frontend');
}

add_action('wp_enqueue_scripts', 'cg_jlight_frontend_styles', 100);