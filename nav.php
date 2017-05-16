<?php

// Get the nav menu based on $menu_name (same as 'theme_location' or 'menu' arg to wp_nav_menu)
// This code based on wp_nav_menu's code to get Menu ID from menu slug

$menu_name = 'primary';


if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {

    $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );

    $menu_items = wp_get_nav_menu_items($menu->term_id);

    $menu_list = '<ul class="nav list-unstyled nav-stacked" role="tablist" id="menu-' . $menu_name . '">';

    foreach ( (array) $menu_items as $key => $menu_item ) {
        $title = $menu_item->title;
        $url = $menu_item->url;

        // condition if the title of the element = something echo the class of my icon
        switch ($title) {
            case 'profile':
                $nav_icon = 'fa-user';
                break;

            case 'resume':
                $nav_icon = 'fa-file';
                break;

            case 'portfolio':
                $nav_icon = 'fa-paint-brush';
                break;

            case 'plans':
                $nav_icon = 'fa-map-signs';
                break;

            case 'blog':
                $nav_icon = 'fa-pencil';
                break;

            case 'faqs':
                $nav_icon = 'fa-question';
                break;

            case 'testimonials':
                $nav_icon = 'fa-quote-left';
                break;

            case 'clients':
                $nav_icon = 'fa-users';
                break;

            case 'contact':
                $nav_icon = 'fa-envelope';
                break;

            // my default icon
            default:
                $nav_icon = 'fa-eercast';
                break;
        }
        // menu list
        $menu_list .= '<li><a href="' . $url . '"><i class="fa '.$nav_icon.'" ></i> ' . $title . '</a></li>';
    }
    $menu_list .= '</ul>';

} else {
    $menu_list = '<ul><li>Menu "' . $menu_name . '" not defined.</li></ul>';
}

// $menu_list now ready to output
echo $menu_list;

?>
