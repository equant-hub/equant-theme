<!DOCTYPE html>
<html lang="ja">

<head>
  <!-- 手動gtag.jsを貼る位置   -->

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php if (is_category()) : ?>
        <title><?php single_cat_title(); ?> | <?php bloginfo('name'); ?></title>
    <?php elseif (is_archive()) : ?>
        <title>記事一覧 | <?php bloginfo('name'); ?></title>
    <?php else : ?>
        <title>EQUANT| Tips <?php wp_title('|', true, 'right'); ?></title>
    <?php endif; ?>

  <meta name="description" content="<?php bloginfo('description'); ?>">
  <meta name="google-site-verification" content="so2Pb6jH5NxmzPozPictTGLIW4KKlv8-VUv4gKtfINk" />
  <link rel="icon" href="<?php echo esc_url(get_theme_file_uri('img/favicon.ico')); ?>">
  <?php wp_head(); ?>

  <?php if (has_post_thumbnail()) : ?>
<meta property="og:image" content="<?php the_post_thumbnail_url(); ?>" />
<?php else: ?>
<meta property="og:image" content="https://equant.awe.jp/wp-content/themes/equant-theme/screenshot.png" />
<?php endif; ?>

</head>


<body id="top">
  <header>
    <section class="blog-header">
    </section>
    <div class="main-menu">
      <div class="pc-menu">
        <ul>
          <li>
            <a href="<?php echo esc_url(home_url()); ?>">
              <i class="fa-solid fa-bars mr-8"></i>Home</a></li>
          <li>
            <a  href="<?php echo esc_url(home_url('/category/tips-page/')); ?>">
              <i class="fa-solid fa-bars mr-8"></i>Tips</a>
          </li>
          <li>
            <a href="<?php echo esc_url(home_url('/category/podcast-page/')); ?>">
              <i class="fa-solid fa-bars mr-8"></i>Podcast</a>
          </li>
          <li>
            <a href="<?php echo esc_url(home_url('/style')); ?>">
              <i class="fa-solid fa-bars mr-8"></i>Theme</a>
          </li>
        </ul>
      </div>
      <div class="sp-menu">
        <input type="checkbox" id="sp-menu__check">
        <label for="sp-menu__check" class="sp-menu__box">
          <span></span>
        </label>
        <div class="sp-menu__content">
          <ul class="sp-menu__list">
            <li class="sp-menu__item">
              <a class="sp-menu__link" href="<?php echo esc_url(home_url()); ?>"><i class="mr-8"></i>Home</a>
            </li>
            <li class="sp-menu__item">
              <a class="sp-menu__link" href="<?php echo esc_url(home_url('/category/tips-page')); ?>"><i class="mr-8"></i>Tips</a></a>
            </li>
            <li class="sp-menu__item">
              <a class="sp-menu__link" href="<?php echo esc_url(home_url('/category/podcast-page')); ?>"><i class="mr-8"></i>Podcast</a>
            </li>
            <li class="sp-menu__item">
              <a class="sp-menu__link" href="<?php echo esc_url(home_url('/style')); ?>"><i class="mr-8"></i>Theme</a>
            </li>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <?php echo custom_breadcrumbs(); ?>

  </header>
