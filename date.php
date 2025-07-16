<?php get_header(); ?>

<div id="container" class="wrapper">
  <main>
    <h1 class="page-title">
      <?php echo get_query_var('year').'年'; ?>
    </h1>

    <?php
      if (have_posts()):
        get_template_part('loop');

        if (function_exists("pagination")) {
          pagination($wp_query->max_num_pages);
        }
      endif;
    ?>
     <!-- ナビゲーション -->
     <?php my_paging_nav(); ?>

  </main>

  <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>