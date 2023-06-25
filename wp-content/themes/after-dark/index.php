<?php get_header(); ?>
<?php if ( is_category() ) : ad_categories_as_breadcrumbs( $cat, true ); endif; ?>
<main id="content" class="wrapper">
  <section class="content-card-wrapper">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <?php $post = get_post(); get_template_part( 'parts/content-card', 'content-card', array( 'post' => $post ) ); ?>
<?php endwhile; else : ?>
      <article class="content-card-message">
        <h2>Sorry, no posts were found!</h2>
      </article>
<?php endif; ?>
  </section>
</main>
<?php get_footer(); ?>
