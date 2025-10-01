<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Authentication Routing ---- Removed 
$routes->match(['get', 'post'], 'auth-login', 'AuthController::login');
$routes->match(['get', 'post'], 'auth-register', 'AuthController::register');
$routes->match(['get', 'post'], 'auth-recoverpw', 'AuthController::recoverpw');
$routes->match(['get', 'post'], 'auth-updatepw', 'AuthController::updatepw');
// $routes->get('auth-logout', 'AuthController::logout');

$routes->get('/', 'Front::index');
$routes->get('/home', 'Front::index', ['filter' => 'loginRequired']); // Home route protected by login filter

//Dashbboard section routing
$routes->get('dashboard-saas', 'Front::show_dashboard_saas');
$routes->get('dashboard-crypto', 'Front::show_dashboard_crypto');
$routes->get('dashboard-blog', 'Front::show_dashboard_blog');
$routes->get('dashboard-job', 'Front::show_dashboard_job');

//Multi-language functionality 
$routes->get('/lang/{locale}', 'Language::index');

//Layout section routing
$routes->get('layouts-horizontal', 'Front::show_layouts_horizontal');
$routes->get('layouts-vertical', 'Front::show_layouts_vertical');
$routes->get('layouts-light-sidebar', 'Front::show_layouts_light_sidebar');
$routes->get('layouts-compact-sidebar', 'Front::show_layouts_compact_sidebar');
$routes->get('layouts-icon-sidebar', 'Front::show_layouts_icon_sidebar');
$routes->get('layouts-boxed', 'Front::show_layouts_boxed');
$routes->get('layouts-preloader', 'Front::show_layouts_preloader');
$routes->get('layouts-colored-sidebar', 'Front::show_layouts_colored_sidebar');
$routes->get('layouts-scrollable', 'Front::show_layouts_scrollable');

//Horizontal Layout option section routing
$routes->get('layouts-hori-topbar-light', 'Front::show_layouts_hori_topbar_light');
$routes->get('layouts-hori-boxed-width', 'Front::show_layouts_hori_boxed_width');
$routes->get('layouts-hori-preloader', 'Front::show_layouts_hori_preloader');
$routes->get('layouts-hori-colored-header', 'Front::show_layouts_hori_colored_header');
$routes->get('layouts-hori-scrollable', 'Front::show_layouts_hori_scrollable');

//App section routing
$routes->get('calendar', 'AppController::show_calendar');
$routes->get('calendar-full', 'AppController::show_fullcalendar');
$routes->get('chat', 'AppController::show_chat');
$routes->get('apps-filemanager', 'AppController::show_apps_filemanager');

$routes->get('ecommerce-products', 'AppController::show_ecommerce_products');
$routes->get('ecommerce-product-detail', 'AppController::show_ecommerce_product_detail');
$routes->get('ecommerce-orders', 'AppController::show_ecommerce_orders');
$routes->get('ecommerce-customers', 'AppController::show_ecommerce_customers');
$routes->get('ecommerce-cart', 'AppController::show_ecommerce_cart');
$routes->get('ecommerce-checkout', 'AppController::show_ecommerce_checkout');
$routes->get('ecommerce-shops', 'AppController::show_ecommerce_shops');
$routes->get('ecommerce-add-product', 'AppController::show_ecommerce_add_product');

$routes->get('crypto-wallet', 'AppController::show_crypto_wallet');
$routes->get('crypto-buy-sell', 'AppController::show_crypto_buy_sell');
$routes->get('crypto-exchange', 'AppController::show_crypto_exchange');
$routes->get('crypto-lending', 'AppController::show_crypto_lending');
$routes->get('crypto-orders', 'AppController::show_crypto_orders');
$routes->get('crypto-kyc-application', 'AppController::show_crypto_kyc_application');
$routes->get('crypto-ico-landing', 'AppController::show_crypto_ico_landing');

$routes->get('email-inbox', 'AppController::show_email_inbox');
$routes->get('email-read', 'AppController::show_email_read');
$routes->get('email-template-basic', 'AppController::show_email_template_basic');
$routes->get('email-template-alert', 'AppController::show_email_template_alert');
$routes->get('email-template-billing', 'AppController::show_email_template_billing');

$routes->get('invoices-list', 'AppController::show_invoices_list');
$routes->get('invoices-detail', 'AppController::show_invoices_detail');

$routes->get('projects-grid', 'AppController::show_projects_grid');
$routes->get('projects-list', 'AppController::show_projects_list');
$routes->get('projects-overview', 'AppController::show_projects_overview');
$routes->get('projects-create', 'AppController::show_projects_create');

$routes->get('tasks-list', 'AppController::show_tasks_list');
$routes->get('tasks-kanban', 'AppController::show_tasks_kanban');
$routes->get('tasks-create', 'AppController::show_tasks_create');

$routes->get('contacts-grid', 'AppController::show_contacts_grid');
$routes->get('contacts-list', 'AppController::show_contacts_list');
$routes->get('contacts-profile', 'AppController::show_contacts_profile');

$routes->get('blog-list', 'AppController::show_blog_list');
$routes->get('blog-grid', 'AppController::show_blog_grid');
$routes->get('blog-details', 'AppController::show_blog_details');


$routes->get('job-list', 'AppController::show_job_list');
$routes->get('job-grid', 'AppController::show_job_grid');
$routes->get('job-apply', 'AppController::show_job_apply');
$routes->get('job-details', 'AppController::show_job_details');
$routes->get('job-categories', 'AppController::show_job_categories');


$routes->get('candidate-list', 'AppController::show_candidate_list');
$routes->get('candidate-overview', 'AppController::show_candidate_overview');




//Pages section routing
$routes->get('auth-login', 'PageController::show_login');
$routes->get('auth-login-2', 'PageController::show_login_2');
$routes->get('auth-register', 'PageController::show_register');
$routes->get('auth-register-2', 'PageController::show_register_2');
$routes->get('auth-recoverpw', 'PageController::show_auth_recoverpw');
$routes->get('auth-recoverpw-2', 'PageController::show_auth_recoverpw_2');
$routes->get('auth-lock-screen', 'PageController::show_auth_lock_screen');
$routes->get('auth-lock-screen-2', 'PageController::show_auth_lock_screen_2');
$routes->get('auth-confirm-mail', 'PageController::show_auth_confirm_mail');
$routes->get('auth-confirm-mail-2', 'PageController::show_auth_confirm_mail_2');
$routes->get('auth-email-verification', 'PageController::show_auth_email_verification');
$routes->get('auth-email-verification-2', 'PageController::show_auth_email_verification_2');
$routes->get('auth-two-step-verification', 'PageController::show_auth_two_step_verification');
$routes->get('auth-two-step-verification-2', 'PageController::show_auth_two_step_verification_2');

$routes->get('pages-starter', 'PageController::show_pages_starter');
$routes->get('pages-maintenance', 'PageController::show_pages_maintenance');
$routes->get('pages-comingsoon', 'PageController::show_pages_comingsoon');
$routes->get('pages-timeline', 'PageController::show_pages_timeline');
$routes->get('pages-faqs', 'PageController::show_pages_faqs');
$routes->get('pages-pricing', 'PageController::show_pages_pricing');
$routes->get('pages-404', 'PageController::show_pages_404');
$routes->get('pages-500', 'PageController::show_pages_500');

//Component section routing
$routes->get('ui-alerts', 'ComponentController::show_ui_alerts');
$routes->get('ui-buttons', 'ComponentController::show_ui_buttons');
$routes->get('ui-cards', 'ComponentController::show_ui_cards');
$routes->get('ui-carousel', 'ComponentController::show_ui_carousel');
$routes->get('ui-dropdowns', 'ComponentController::show_ui_dropdowns');
$routes->get('ui-grid', 'ComponentController::show_ui_grid');
$routes->get('ui-images', 'ComponentController::show_ui_images');
$routes->get('ui-lightbox', 'ComponentController::show_ui_lightbox');
$routes->get('ui-modals', 'ComponentController::show_ui_modals');
$routes->get('ui-offcanvas', 'ComponentController::show_ui_offcanvas');
$routes->get('ui-rangeslider', 'ComponentController::show_ui_rangeslider');
$routes->get('ui-session-timeout', 'ComponentController::show_ui_session_timeout');
$routes->get('ui-progressbars', 'ComponentController::show_ui_progressbars');
$routes->get('ui-placeholders', 'ComponentController::show_ui_placeholders');
$routes->get('ui-toasts', 'ComponentController::show_ui_toasts');
$routes->get('ui-sweet-alert', 'ComponentController::show_ui_sweet_alert');
$routes->get('ui-tabs-accordions', 'ComponentController::show_ui_tabs_accordions');
$routes->get('ui-typography', 'ComponentController::show_ui_typography');
$routes->get('ui-video', 'ComponentController::show_ui_video');
$routes->get('ui-general', 'ComponentController::show_ui_general');
$routes->get('ui-colors', 'ComponentController::show_ui_colors');
$routes->get('ui-rating', 'ComponentController::show_ui_rating');
$routes->get('ui-notifications', 'ComponentController::show_ui_notifications');
$routes->get('ui-utilities', 'ComponentController::show_ui_utilities');


$routes->get('form-elements', 'ComponentController::show_form_elements');
$routes->get('form-layouts', 'ComponentController::show_form_layouts');
$routes->get('form-validation', 'ComponentController::show_form_validation');
$routes->get('form-advanced', 'ComponentController::show_form_advanced');
$routes->get('form-editors', 'ComponentController::show_form_editors');
$routes->get('form-uploads', 'ComponentController::show_form_uploads');
$routes->get('form-xeditable', 'ComponentController::show_form_xeditable');
$routes->get('form-repeater', 'ComponentController::show_form_repeater');
$routes->get('form-wizard', 'ComponentController::show_form_wizard');
$routes->get('form-mask', 'ComponentController::show_form_mask');

$routes->get('tables-basic', 'ComponentController::show_tables_basic');
$routes->get('tables-datatable', 'ComponentController::show_tables_datatable');
$routes->get('tables-responsive', 'ComponentController::show_tables_responsive');
$routes->get('tables-editable', 'ComponentController::show_tables_editable');

$routes->get('charts-apex', 'ComponentController::show_charts_apex');
$routes->get('charts-echart', 'ComponentController::show_charts_echart');
$routes->get('charts-chartjs', 'ComponentController::show_charts_chartjs');
$routes->get('charts-flot', 'ComponentController::show_charts_flot');
$routes->get('charts-knob', 'ComponentController::show_charts_knob');
$routes->get('charts-sparkline', 'ComponentController::show_charts_sparkline');
$routes->get('charts-tui', 'ComponentController::show_charts_tui');

$routes->get('icons-unicons', 'ComponentController::show_icons_unicons');
$routes->get('icons-boxicons', 'ComponentController::show_icons_boxicons');
$routes->get('icons-materialdesign', 'ComponentController::show_icons_materialdesign');
$routes->get('icons-dripicons', 'ComponentController::show_icons_dripicons');
$routes->get('icons-fontawesome', 'ComponentController::show_icons_fontawesome');

$routes->get('maps-google', 'ComponentController::show_maps_google');
$routes->get('maps-vector', 'ComponentController::show_maps_vector');
$routes->get('maps-leaflet', 'ComponentController::show_maps_leaflet');

/*
 * --------------------------------------------------------------------
 * Custom Routing
 * --------------------------------------------------------------------
 * Created by me to override the default routing behavior.
 */
$routes->get('profile', 'AppController::profile');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
