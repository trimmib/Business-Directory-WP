<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <header class="page-header">
            <h1 class="page-title"><?php printf('Search Results for: %s', get_search_query()); ?></h1>
        </header>

        <?php
            $businesses = new WP_Query(
                array(
                    'post_type' => 'business',
                    'posts_per_page' => 10,
                )
            );
            if ($businesses->have_posts()) :
                while ($businesses->have_posts()) :
                    $businesses->the_post();

                    // Get the ACF image field value
                    $image = get_field('image');
                    $description = get_field('description');
                    $limited_description = substr($description, 0, 200); // Limit description to 200 characters
                    $location = get_field('location');
                    $phone_number = get_field('phone_number');
                    $email = get_field('email');
                    $business_type = get_field('business_type');

            ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('col-md-6 p-3'); ?>>

                        <?php if ($image) : ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="rounded p-1" width="300" height="300">
                        <?php else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/img/exclamation-mark-in-a-circle.png" alt="Logo" width="300" height="300">
                        <?php endif; ?>



                        <div class="">
                            <header class="entry-header">

                                <figure>
                                    <blockquote class="blockquote">
                                        <h2 class="entry-title color-black"><a href="<?php the_permalink(); ?>" style="--bs-link-hover-color-rgb: 25, 135, 84; text-decoration: none;"><?php the_title(); ?></a></h2>
                                    </blockquote>
                                    <figcaption class="blockquote-footer">
                                        <p><?php
                                            echo esc_html($location);
                                            ?></p>
                                    </figcaption>
                                </figure>
                            </header>

                            <div class="entry-content">
                                <?php if ($limited_description) : ?>
                                    <p>
                                        <?php echo esc_html($limited_description); ?>...
                                    </p>
                                <?php endif; ?>
                                <?php the_excerpt(); ?>
                            </div>
                            <a class="icon-link icon-link-hover" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0); --bs-link-hover-color-rgb: 25, 135, 84; text-decoration: none;" href="tel:<?php echo $phone_number ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                                    <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"></path>
                                </svg>
                                <?php
                                echo 'Call';
                                ?>
                            </a>
                            <a class="icon-link icon-link-hover ps-3 no-decoration" style="--bs-icon-link-transform: translate3d(0, -.125rem, 0); --bs-link-hover-color-rgb: 25, 135, 84; text-decoration: none;" href="mailto:<?php echo $email ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-at" viewBox="0 0 16 16">
                                    <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z"></path>
                                    <path d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648Zm-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z"></path>
                                </svg>
                                <?php
                                echo 'Email';
                                ?>
                            </a>
                        </div>
                    </article>

            <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo 'No businesses found.';
            endif;
            ?>

    </main>
</div>

<?php get_footer(); ?>

<script>
    // Add category filtering functionality
    (function ($) {
        $(document).ready(function () {
            $('.searchandfilter').on('change', 'select[name^="saf"]', function () {
                $('.searchandfilter').submit();
            });
        });
    })(jQuery);
</script>
