<footer class="site-footer">


    <div class="container-fluid bg-light">
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-center align-items-center">
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
        </div>
        <div class="row">
            <div class="col-lg-5 offset-5 justify-content-center">
        <p><?php bloginfo('name'); ?> - &copy; <?php echo date('Y'); ?> </p>
        </div>
        </div>
    </div>
    


</footer>

<?php wp_footer(); ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</html>