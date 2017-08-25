<?php
get_header(); ?>

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-fixed-top navbar-custom">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only"><?php _e( 'Toggle navigation', 'freelancer' ); ?></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand navbar-custom-brand navbar-shrink" href="<?php echo esc_url( home_url() ); ?>" img resposive=""><?php _e( 'Harold Pine', 'freelancer' ); ?> </a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden">
                            <a href="#page-top"></a>
                        </li>
                        <li class="page-scroll">
                            <a href="#portfolio"><?php _e( 'Portfolio', 'freelancer' ); ?></a>
                        </li>
                        <li class="page-scroll">
                            <a href="#about"><?php _e( 'About', 'freelancer' ); ?></a>
                        </li>
                        <li class="page-scroll">
                            <a href="#contact"><?php _e( 'Contact', 'freelancer' ); ?></a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>
        <?php if ( have_posts() ) : ?>
            <div class="">
                <header>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <?php the_post_thumbnail( null, array(
                                        'class' => 'img-responsive'
                                ) ); ?>
                                <div class="intro-text">
                                    <span class="name"><?php bloginfo( 'name' ); ?></span>
                                    <hr class="star-primary">
                                    <span class="skills"><?php bloginfo( 'description' ); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <?php
                    $portfolio_args = array(
                        'post_type' => 'portfolio_item',
                        'post_status' => 'publish',
                        'nopaging' => true,
                        'order' => 'ASC',
                        'orderby' => 'menu_order'
                    )
                ?>
                <?php $portfolio = new WP_Query( $portfolio_args ); ?>
                <?php if ( $portfolio->have_posts() ) : ?>
                    <section id="portfolio">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <h2><?php _e( 'Portfolio 1', 'freelancer' ); ?></h2>
                                    <hr class="star-primary">
                                </div>
                            </div>
                            <div class="row">
                                <?php while ( have_posts() ) : the_post(); ?>
                                    <?php $portfolio_item_number = 0; ?>
                                    <?php while ( $portfolio->have_posts() ) : $portfolio->the_post(); ?>
                                        <div class="col-sm-4 portfolio-item">
                                            <a href="<?php echo '#portfolioModal-'.get_the_ID() ?>" class="portfolio-link" data-toggle="modal">
                                                <div class="caption">
                                                    <div class="caption-content">
                                                        <i class="fa fa-search-plus fa-3x"></i>
                                                    </div>
                                                </div>
                                                <?php
                                                    if ( has_post_thumbnail() ) {
                                                        the_post_thumbnail( 'cover', array(
                                                        'class' => 'img-responsive'
                                                    ) );
                                                    }
                                                 ?>
                                            </a>
                                        </div>
                                        <?php $portfolio_item_number++; ?>
                                        <?php if( $portfolio_item_number % 3 == 0 ) echo '<div class="clearfix visible-sm-block visible-md-block visible-lg-block"></div>'; ?>
                                    <?php endwhile; ?>
                                    <?php wp_reset_postdata(); ?>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </section>
                <?php endif; ?>
                <?php
                    $portfolio2_args = array(
                        'post_type' => 'portfolio_item2',
                        'post_status' => 'publish',
                        'nopaging' => true,
                        'order' => 'ASC',
                        'orderby' => 'menu_order'
                    )
                ?>
                <?php $portfolio2 = new WP_Query( $portfolio2_args ); ?>
                <?php if ( $portfolio2->have_posts() ) : ?>
                    <section id="portfolio">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 text-center">
                                    <h2><?php _e( 'Portfolio 2', 'freelancer' ); ?></h2>
                                    <hr class="star-primary" />
                                </div>
                            </div>
                            <div class="row">
                                <?php while ( $portfolio2->have_posts() ) : $portfolio2->the_post(); ?>
                                    <div class="col-sm-4 portfolio-item">
                                        <a class="portfolio-link" href="<?php echo '#portfolioModal2-'.get_the_ID() ?>" data-toggle="modal">
                                            <div class="caption">
                                                <div class="caption-content">
                                                    <i class="fa fa-search-plus fa-3x"></i>
                                                </div>
                                            </div>
                                            <?php the_post_thumbnail( '', array(
                                                    'class' => 'img-responsive'
                                            ) ); ?>
                                        </a>
                                    </div>
                                <?php endwhile; ?>
                                <?php wp_reset_postdata(); ?>
                            </div>
                        </div>
                    </section>
                <?php endif; ?>
                <section class="success" id="about">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <h2><?php the_title(); ?></h2>
                                <hr class="star-primary">
                            </div>
                        </div>
                        <?php
                            //take the content and split it into array
                            $columns = explode( "<hr />", get_the_content() );

                            //if at least one column set $column_1 variable
                            if(count($columns) > 0) {
                            	$column_1 = $columns[0];
                            }

                            //if the second column is set, put it into the $column_2 variable
                            if(count($columns) > 1) {
                            	$column_2 = $columns[1];
                            }
                        ?>
                        <div class="row">
                            <div class="col-lg-4 col-lg-offset-2">
                                <?php echo $column_1 ?>
                            </div>
                            <div class="col-lg-4">
                                <?php echo $column_2 ?>
                            </div>
                            <?php
                                $attachments_args = array(
                                    'category_name' => 'resume',
                                    'post_type' => 'attachment',
                                    'post_status' => 'any',
                                    'nopaging' => true
                                )
                            ?>
                            <?php $attachments = new WP_Query( $attachments_args ); ?>
                            <?php if ( $attachments->have_posts() ) : ?>
                                <?php while ( $attachments->have_posts() ) : $attachments->the_post(); ?>
                                    <div class="col-lg-8 col-lg-offset-2 text-center">
                                        <a href="<?php echo esc_url( wp_get_attachment_url( get_the_ID() ) ); ?>" class="btn btn-lg btn-outline"><i class="fa fa-download"></i> <?php _e( 'Download My Resume', 'freelancer' ); ?></a>
                                    </div>
                                <?php endwhile; ?>
                                <?php wp_reset_postdata(); ?>
                            <?php else : ?>
                                <p><?php _e( 'Sorry, no posts matched your criteria.', 'freelancer' ); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>
                <section id="contact">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <h2><?php _e( 'Contact Me', 'freelancer' ); ?></h2>
                                <hr class="star-primary">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2">
                                <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                                <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                                <form name="sentMessage" id="contactForm" novalidate action="<?php echo esc_url( get_template_directory_uri() ); ?>/mail/contact_me.php">
                                    <div class="row control-group">
                                        <div class="form-group col-xs-12 floating-label-form-group controls">
                                            <label>
                                                <?php _e( 'Name', 'freelancer' ); ?>
                                            </label>
                                            <input type="text" class="form-control" placeholder="Name" id="name" required data-validation-required-message="Please enter your name.">
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>
                                    <div class="row control-group">
                                        <div class="form-group col-xs-12 floating-label-form-group controls">
                                            <label>
                                                <?php _e( 'Email Address', 'freelancer' ); ?>
                                            </label>
                                            <input type="email" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address.">
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>
                                    <div class="row control-group">
                                        <div class="form-group col-xs-12 floating-label-form-group controls">
                                            <label>
                                                <?php _e( 'Phone Number', 'freelancer' ); ?>
                                            </label>
                                            <input type="tel" class="form-control" placeholder="Phone Number" id="phone" required data-validation-required-message="Please enter your phone number.">
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>
                                    <div class="row control-group">
                                        <div class="form-group col-xs-12 floating-label-form-group controls">
                                            <label>
                                                <?php _e( 'Message', 'freelancer' ); ?>
                                            </label>
                                            <textarea rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                            <p class="help-block text-danger"></p>
                                        </div>
                                    </div>
                                    <br>
                                    <div id="success"></div>
                                    <div class="row">
                                        <div class="form-group col-xs-12">
                                            <button type="submit" class="btn btn-success btn-lg">
                                                <?php _e( 'Send', 'freelancer' ); ?>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        <?php else : ?>
            <p><?php _e( 'Sorry, no posts matched your criteria.', 'freelancer' ); ?></p>
        <?php endif; ?>
        <!-- Header -->
        <!-- Portfolio Grid Section -->
        <!-- About Section -->
        <!-- Contact Section -->
        <!-- Footer -->
        <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
        <footer class="text-center">
            <div class="footer-above">
                <div class="container">
                    <div class="row">
                        <div class="footer-col col-md-4">
                            <h3><?php echo get_post_meta( get_the_ID(), 'footer1_title', true ); ?></h3>
                            <p><?php echo get_post_meta( get_the_ID(), 'footer1_text', true ); ?></p>
                        </div>
                        <div class="footer-col col-md-4">
                            <h3><?php echo get_post_meta( get_the_ID(), 'footer2_title', true ); ?></h3>
                            <ul class="list-inline">
                                <?php if ( get_post_meta( get_the_ID(), 'social_facebook', true ) ) : ?>
                                    <li>
                                        <a href="<?php echo get_post_meta( get_the_ID(), 'social_facebook', true ); ?>" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                                    </li>
                                <?php endif; ?>
                                <?php if ( get_post_meta( get_the_ID(), 'social_google', true ) ) : ?>
                                    <li>
                                        <a href="<?php echo get_post_meta( get_the_ID(), 'social_google', true ); ?>" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                                    </li>
                                <?php endif; ?>
                                <?php if ( get_post_meta( get_the_ID(), 'social_twitter', true ) ) : ?>
                                    <li>
                                        <a href="<?php echo get_post_meta( get_the_ID(), 'social_twitter', true ); ?>" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                                    </li>
                                <?php endif; ?>
                                <?php if ( get_post_meta( get_the_ID(), 'social_twitter', true ) ) : ?>
                                    <li>
                                        <a href="<?php echo get_post_meta( get_the_ID(), 'social_linkedin', true ); ?>" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                                    </li>
                                <?php endif; ?>
                                <?php if ( get_post_meta( get_the_ID(), 'social_dribbble', true ) ) : ?>
                                    <li>
                                        <a href="<?php echo get_post_meta( get_the_ID(), 'social_dribbble', true ); ?>" class="btn-social btn-outline"><i class="fa fa-fw fa-dribbble"></i></a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <div class="footer-col col-md-4">
                            <h3><?php echo get_post_meta( get_the_ID(), 'footer3_title', true ); ?></h3>
                            <p><?php echo get_post_meta( get_the_ID(), 'footer3_text', true ); ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-below">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php _e( 'Copyright &copy;', 'freelancer' ); ?> 
                            <?php bloginfo( 'name' ); ?> 
                            <?php echo date( 'Y' ) ?>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <div class="scroll-top page-scroll visible-xs visble-sm">
            <a class="btn btn-primary" href="#page-top"><i class="fa fa-chevron-up"></i></a>
        </div>
        <!-- Portfolio Modals -->
        <?php
            $modals_args = array(
                'post_type' => 'portfolio_item',
                'post_status' => 'publish',
                'nopaging' => true,
                'order' => 'ASC',
                'orderby' => 'menu_order'
            )
        ?>
        <?php $modals = new WP_Query( $modals_args ); ?>
        <?php if ( $modals->have_posts() ) : ?>
            <?php while ( $modals->have_posts() ) : $modals->the_post(); ?>
                <div class="portfolio-modal modal fade" id="portfolioModal-<?php the_ID(); ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-content">
                        <div class="close-modal" data-dismiss="modal">
                            <div class="lr">
                                <div class="rl">
</div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8 col-lg-offset-2">
                                    <div class="modal-body">
                                        <h2><?php the_title(); ?></h2>
                                        <hr class="star-primary">
                                        <?php the_post_thumbnail( null, array(
                                                'class' => 'img-responsive img-centered'
                                        ) ); ?>
                                        <?php the_content(); ?>
                                        <ul class="list-inline item-details">
                                            <li>
                                                <?php _e( 'Client:', 'freelancer' ); ?>
                                                <strong><a href="http://startbootstrap.com"><?php _e( 'Start Bootstrap', 'freelancer' ); ?></a></strong>
                                            </li>
                                            <li>
                                                <?php _e( 'Date:', 'freelancer' ); ?>
                                                <strong><a href="http://startbootstrap.com"><?php _e( 'April 2014', 'freelancer' ); ?></a></strong>
                                            </li>
                                            <li>
                                                <?php _e( 'Service:', 'freelancer' ); ?>
                                                <strong><a href="http://startbootstrap.com"><?php _e( 'Web Development', 'freelancer' ); ?></a></strong>
                                            </li>
                                        </ul>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">
                                            <i class="fa fa-times"></i> 
                                            <?php _e( 'Close', 'freelancer' ); ?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>
        <?php
            $modals_args = array(
                'post_type' => 'portfolio_item2',
                'post_status' => 'publish',
                'nopaging' => true,
                'order' => 'ASC',
                'orderby' => 'menu_order'
            )
        ?>
        <?php $modals = new WP_Query( $modals_args ); ?>
        <?php if ( $modals->have_posts() ) : ?>
            <?php while ( $modals->have_posts() ) : $modals->the_post(); ?>
                <div class="portfolio-modal modal fade" id="portfolioModal2-<?php the_ID(); ?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-content">
                        <div class="close-modal" data-dismiss="modal">
                            <div class="lr">
                                <div class="rl">
</div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8 col-lg-offset-2">
                                    <div class="modal-body">
                                        <h2><?php the_title(); ?></h2>
                                        <hr class="star-primary">
                                        <?php the_post_thumbnail( null, array(
                                                'class' => 'img-responsive img-centered'
                                        ) ); ?>
                                        <?php the_content(); ?>
                                        <ul class="list-inline item-details">
                                            <li>
                                                <?php _e( 'Client:', 'freelancer' ); ?>
                                                <strong><a href="http://startbootstrap.com"><?php _e( 'Start Bootstrap', 'freelancer' ); ?></a></strong>
                                            </li>
                                            <li>
                                                <?php _e( 'Date:', 'freelancer' ); ?>
                                                <strong><a href="http://startbootstrap.com"><?php _e( 'April 2014', 'freelancer' ); ?></a></strong>
                                            </li>
                                            <li>
                                                <?php _e( 'Service:', 'freelancer' ); ?>
                                                <strong><a href="http://startbootstrap.com"><?php _e( 'Web Development', 'freelancer' ); ?></a></strong>
                                            </li>
                                        </ul>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">
                                            <i class="fa fa-times"></i> 
                                            <?php _e( 'Close', 'freelancer' ); ?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php endif; ?>
        <!-- jQuery -->
        <!-- Bootstrap Core JavaScript -->
        <!-- Plugin JavaScript -->
        <!-- Contact Form JavaScript -->
        <!-- Custom Theme JavaScript -->        

<?php get_footer(); ?>