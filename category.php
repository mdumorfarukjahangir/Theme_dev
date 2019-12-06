<?php
get_header();
?>

<!-- s-content
    ================================================== -->
<section class="s-content">
    
        <div class="row narrow">
            <div class="col-full s-content__header" data-aos="fade-up">
            <?php $current_category = single_cat_title("", false); ?>

                <h1> Category: <?php echo $current_category; ?></h1>

                <p class="lead"> 
                    <?php 
                      echo category_description();
                      
                    ?>
                </p>
            </div>
        </div>

            
        <div class="row narrow">
            <div class="col-full s-content__header" data-aos="fade-up">
                <?php 
                  if(! have_posts()):
                ?>
                <h3>There is no post under <?php echo $current_category; ?> category</h3>
                <?php  
                endif;
                ?>
            </div>
        </div>

         

    <div class="row masonry-wrap">
        <div class="masonry">
          
            <div class="grid-sizer">
                
            </div>

            <?php
            while (have_posts()) {
                the_post();
                get_template_part("/template-parts/posts-format/post", get_post_format());
            }
            ?>

        </div> <!-- end masonry -->
    </div> <!-- end masonry-wrap -->

    <div class="row">
        <div class="col-full">
            <nav class="pgn">
                <?php
                philosophy_home_pagination();
                ?>
            </nav>
        </div>
    </div>

</section> <!-- s-content -->


<?php
get_footer();
?>