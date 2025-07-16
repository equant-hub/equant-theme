<?php get_header(); ?>

<div id="container" class="wrapper">
  <main>
    <?php if(have_posts()):while(have_posts()):the_post(); ?>
      <article>
        <h1 class="article-title"><?php the_title(); ?></h1>
        <?php the_post_thumbnail(); ?>
        <div class="text"><?php the_content(); ?></div>
      </article>
     
    <?php endwhile;endif; ?>

    <!-- 前の記事  次の記事 -->
    <div class="navigation">
    <ul class="page-numbers">
    <li class="navileft"><?php next_post_link('« %link', 'Nex', TRUE, ''); ?></li>
    <li class="naviright"><?php previous_post_link('%link »', 'Pre', TRUE, ''); ?></li>
    </ul>
    </div>

  </main>

  <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
