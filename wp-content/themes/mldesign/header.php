<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MLDesign
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<header id="masthead" class="site-header">
		<nav id="site-navigation" class="main-navigation navbar navbar-expand-xl">
            <div class="navbar-inner">
                <button type="button" class="navbar-toggler hamburger hamburger--spin js-hamburger" aria-controls="primary-menu" aria-expanded="false">
                    <span class="d-none"><?php esc_html_e( 'Primary Menu', 'mldesign' ); ?></span>
                    <span class="hamburger-box"><span class="hamburger-inner"></span></span>
                </button>
                <?php
                $site_logo = get_theme_mod('custom_logo');
                $site_logo_url = wp_get_attachment_image_url($site_logo, 'full');
                echo '<a href="'.home_url().'" class="navbar-brand d-xl-none"><span class="d-none">Home</span><img src="'.$site_logo_url.'" class="img-fluid w-100"/></a>';
                ?>
                <?php
                $locations = get_nav_menu_locations();
                $menu_id = $locations['menu-1'];
                $menu_items = wp_get_nav_menu_items($menu_id);
                $total_items = count($menu_items);
                $middle_index = floor($total_items / 2);
                wp_nav_menu([
                    'theme_location' => 'menu-1',
                    'container_class' => 'navbar-collapse collapse',
                    'container_id' => 'main-navigation',
                    'menu_class' => 'nav navbar-nav navbar-breakpoint-'.$middle_index,
                    'menu_id' => 'navbar-nav',
                    'walker'         => new MLD_Custom_Nav_Walker(),
                    'total_items'     => $total_items
                ]);
                ?>
            </div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
