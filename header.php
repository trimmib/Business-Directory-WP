<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
        $site_title = get_bloginfo('name');
        echo $site_title;
        ?>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        .navbar-nav .nav-link .no-decoration {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <header id="masthead" class="site-header bg-light" role="banner">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 d-flex align-items-center">
                    <div id="site-branding" class="mr-3">
                        <a class="logo" href="<?php echo esc_url(home_url('/')); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/2cd216103829407.5f560402aa8e0.png" alt="Logo" width="100" height="50">
                        </a>
                    </div>
                </div>

                <div class="col-lg-6 d-flex justify-content-center align-items-center">
                    <nav id="site-navigation" class="main-navigation navbar navbar-expand-lg navbar-light bg-light">
                        <?php
                        // Display the primary navigation menu
                        wp_nav_menu(
                            array(
                                'theme_location' => 'primary',
                                'menu_id' => 'primary-menu',
                                'container' => 'div',
                                'container_class' => '',
                                'container_id' => 'navbarNav',
                                'menu_class' => 'navbar-nav ms-auto gap-3',
                                'fallback_cb' => '__return_false',
                                'items_wrap' => '<ul id="%1$s" class="%2$s ">%3$s</ul>',
                                'link_before' => '<span class="nav-link-text ">',
                                'link_after' => '</span>',
                            )
                        );
                        ?>
                    </nav>
                </div>
                <div class="col-lg-3 d-flex justify-content-end align-items-center">
                    <nav class="navbar navbar-light bg-light" style="background-color: #e3f2fd;">
                        <div class="container-fluid">
                            <form role="search" method="get" class="search-form d-flex" action="<?php echo esc_url(home_url('/')); ?>">
                                <label>
                                    <input type="search" class="search-field form-control me-2" placeholder="<?php echo esc_attr_x('Search...', 'placeholder', 'business-directory'); ?>" value="<?php echo get_search_query(); ?>" name="s" aria-label="Search" />
                                    <input type="hidden" name="post_type" value="business" />
                                    <!-- Add this line to set the post type to "business" -->
                                </label>
                                <input type="submit" class="search-submit btn btn-outline-success" value="<?php echo esc_attr_x('Search', 'submit button', 'business-directory'); ?>" />
                            </form>
                        </div>
                    </nav>
                </div>
            </div>
        </div>

    </header>