<?php get_header();

$monday = get_field('monday');
$tuesday = get_field('tuesday');
$wednesday = get_field('wednesday');
$thursday = get_field('thursday');
$friday = get_field('friday');
$saturday = get_field('saturday');
$sunday = get_field('sunday');

$image = get_field('image');
$location = get_field('location');
$phone_number = get_field('phone_number');
$email = get_field('email');
$business_type = get_field('business_type');
$description = get_field('description');
?>

<div id="primary" class="content container">
    <main id="main" class="site-main" role="main">

        <?php
        while (have_posts()) :
            the_post();
        ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <?php if ($image) : ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="img-fluid mx-auto d-block">
                <?php else : ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/img/exclamation-mark-in-a-circle.png" alt="Logo" width="300" height="300">
                <?php endif; ?>

                <div class="row">
                    <header class="entry-header">
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                    </header>

                    <div class="entry-content">
                        <?php if ($location) : ?>
                            <figure>
                                <figcaption class="blockquote-footer">
                                    <p><?php
                                        echo esc_html($location);
                                        ?></p>
                                </figcaption>
                            </figure>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="row">
                    <hr>
                    <div class="col-lg-2">
                        <h3>Working Hours</h3>
                    </div>
                    <div class="col-lg-5">
                        <?php
                        echo '<ul>';
                        echo '<li>Monday: ' . $monday . '</li>';
                        echo '<li>Tuesday: ' . $tuesday . '</li>';
                        echo '<li>Wednesday: ' . $wednesday . '</li>';
                        echo '<li>Thursday: ' . $thursday . '</li>';
                        echo '<li>Friday: ' . $friday . '</li>';
                        echo '<li>Saturday: ' . $saturday . '</li>';
                        echo '<li>Sunday: ' . $sunday . '</li>';
                        echo '</ul>';
                        ?>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-3">
                        <p><strong>Phone Number:</strong> <a href="tel:<?php echo $phone_number; ?>"> <?php echo $phone_number; ?></a></p>
                    </div>
                    <div class="col-lg-3">
                        <p><strong>Email:</strong> <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></p>
                    </div>
                    <div class="col-lg-3">
                        <p><strong>Type of Business:</strong> <?php echo $business_type; ?></p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <h2>Description: </h2>
                    <p><?php echo $description; ?></p>
                    <?php the_content(); ?>
                </div>
</div>
</article>

<?php
        endwhile;
?>

</main>
</div>

<?php get_footer(); ?>