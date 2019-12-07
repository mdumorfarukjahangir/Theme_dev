
<?php
/**
 * Template Name: Contact Us  Page template
 */


the_post();
get_header();
 
?>

<!-- s-content
    ================================================== -->
<section class="s-content s-content--narrow s-content--no-padding-bottom">

    <article class="row format-standard">

        <div class="s-content__header col-full">
            <h1 class="s-content__header-title">
                <?php
                the_title();
                ?>
            </h1>
        </div> <!-- end s-content__header -->
        <?php 
          if(is_active_sidebar('contact-us-map')){
             dynamic_sidebar('contact-us-map');
          }
        ?> 
        <div class="col-full s-content__main">

            <?php
            the_content();
            ?>
        </div>

        <div class="s-content__header col-full">
        <?php 
          if(is_active_sidebar('contact-us-section')){
             dynamic_sidebar('contact-us-section');
          }
        ?>  
             
        </div>  
        <h3 class="text-center"><?php _e( "Say Hello","philosophy")?></h3>
         
        <div>
            <?php 
              if(get_field("contact_form_shortcode")){
                 echo do_shortcode(get_field("contact_form_shortcode"));
              }
            ?>
        </div>
           

        
    </article>
</section> <!-- s-content -->

<?php
get_footer();
?>