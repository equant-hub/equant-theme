<?php

/**************************************************
CSSファイルの読み込み
**************************************************/
function my_enqueue_styles() {
  wp_enqueue_style('ress', '//unpkg.com/ress/dist/ress.min.css', array(), false, 'all');
  wp_enqueue_style('style', get_stylesheet_uri(), array('ress'), false, 'all');
}
add_action('wp_enqueue_scripts', 'my_enqueue_styles');

/**************************************************
アイキャッチを有効化
**************************************************/
add_theme_support('post-thumbnails');


/**************************************************
ページネーション new
**************************************************/
function my_paging_nav() {
  //グローバル変数を宣言
  global $wp_query , $wp_rewrite; 

  // ページ数が2より小さかったらページネーションを表示しない
  if ( $wp_query->max_num_pages < 2 ) {
      return;
  }
  // ページがあればページ数を取得、なければ1を入れる
  $paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
  // パーマリンクの設定をしていたら、それに従い表示する。デフォルトなら「?paged=%#%」で表示する
  $format  = $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';

  //ページネーションの設定
  $links = paginate_links( array(
      'base'     => get_pagenum_link() . '%_%', //URLのベース
      'format'   => $format, //ページネーションのリンクの構造
      'total'    => $wp_query->max_num_pages, //ページ数（全ページを指定）
      'current'  => $paged, //現在のページの位置
      'mid_size' => 1, //現在のページの両側に表示する数
      'prev_text' => 'Next',
      'next_text' => 'Pre',
  ) );

  if ( $links ) :

  ?>
  <!-- 表示されるHTML -->
  <nav role="navigation">
      <ul class="page-numbers">
          <li><?php echo $links; ?></li>
      </ul>
  </nav>
  <?php endif; 
}

/**************************************************
サイドバーウィジェット
**************************************************/
if (function_exists('register_sidebar')) {
  register_sidebar(array(
    'name' => 'サイドバー',
    'id' => 'sidebar',
    'description' => 'サイドバーウィジェット',
    'before_widget' => '<div>',
    'after_widget' => '</div>',
    'before_title' => '<h3 class="side-title">',
    'after_title' => '</h3>'
 ));
}

//  ウィジットアーカイブに年の文字を追加
function my_get_archives_link($html) {
  return preg_replace ( ' /<\/a>/', '年</a>', $html );
  }
  add_filter('get_archives_link' ,'my_get_archives_link');

/**************************************************
サイト内検索の対象を「投稿」のみにする
**************************************************/
function search_filter($query) {
  if ($query -> is_search) {
    $query -> set('post_type', 'post');
  }
  return $query;
}
add_filter('pre_get_posts', 'search_filter');

/**************************************************
ログイン画面カスタマイズ
**************************************************/
function my_login_stylesheet() {
  wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/style-login.css' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );

function my_login_logo_url() {
  return home_url();
  }
  add_filter( 'login_headerurl', 'my_login_logo_url' );

  /* 【管理画面】管理画面にもファビコンを表示 */
function admin_favicon() {
  echo '<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />';
 }
 add_action('admin_head', 'admin_favicon');

 /**************************************************
パンくず設定
**************************************************/
function custom_breadcrumbs() {
  // ホームページのリンクを追加
  $breadcrumbs = '<a class="home" href="' . home_url() . '">' . 'HOME' . '</a>';

  // ページがカスタム投稿タイプの場合
  if (is_singular('custom_post_type')) {
      // カスタム投稿タイプのアーカイブページへのリンクを追加
      $breadcrumbs .= ' <span class="arrow"></span> <a href="' . get_post_type_archive_link('custom_post_type') . '">' . 'カスタム投稿タイプアーカイブ' . '</a>';

      // カスタム投稿タイプのタームがあれば表示
      $post_terms = get_the_terms(get_the_ID(), 'custom_taxonomy');
      if ($post_terms) {
          $post_term = array_pop($post_terms);
          $breadcrumbs .= ' <span class="arrow"></span> <a href="' . get_term_link($post_term) . '">' . $post_term->name . '</a>';
      }

      // 投稿のタイトルを追加
      $breadcrumbs .= ' <span class="arrow"></span> ' . get_the_title();
  }

  // カスタム投稿タイプのアーカイブページの場合
  elseif (is_post_type_archive('custom_post_type')) {
      // カスタム投稿タイプの名前を表示
      $post_type = get_post_type_object(get_post_type());
      $breadcrumbs .= ' <span class="arrow"></span> ' . $post_type->labels->singular_name;
  }

  // ページがカスタムタクソノミーのアーカイブページの場合
  elseif (is_tax('custom_taxonomy')) {
      // タームの情報を取得して追加
      $term = get_queried_object();
      $breadcrumbs .= ' <span class="arrow"></span> ' . $term->name;
  }

  // ページが通常の投稿ページの場合
  elseif (is_single()) {
      // カテゴリー情報を取得して追加
      $category = get_the_category();
      if ($category) {
          $breadcrumbs .= ' <span class="arrow"></span> <a href="' . get_category_link($category[0]->term_id) . '">' . $category[0]->cat_name . '</a>';
      }

      // 投稿のタイトルを追加
      $breadcrumbs .= ' <span class="arrow"></span> ' . get_the_title();
  }

  // 固定ページの場合
  elseif (is_page()) {

      // 固定ページのタイトルを追加
      $breadcrumbs .= ' <span class="arrow"></span> ' . get_the_title();
  }

  // ページがカテゴリーページの場合
  elseif (is_category()) {
      $category = get_the_category();
      if ($category) {
          $breadcrumbs .= ' <span class="arrow"></span> ' . $category[0]->cat_name;
      }
  }

  // ページがアーカイブページの場合
  elseif (is_archive()) {
      // タイトルを表示
      $breadcrumbs .= ' <span class="arrow"></span> ' . get_the_archive_title();
  }

  // ページが検索結果ページの場合
  elseif (is_search()) {
      if(get_search_query()){
        $breadcrumbs .= ' <span class="arrow"></span> ' . get_search_query();
      } else {
        $breadcrumbs .= ' <span class="arrow"></span> ' . 'キーワードなし';
      }
  }

  // 404エラーページの場合
  elseif (is_404()) {
      // 404ページのタイトルを表示
      $breadcrumbs .= ' <span class="arrow"></span> ' . '404 Not Found';
  }

  // パンくずリストを返す
  return '<div class="breadcrumbsWrap"><div class="breadcrumbs">' . $breadcrumbs . '</div></div>';
}

