<aside id="sidebar">
  <section class="author">
    <img src="<?php echo esc_url(get_theme_file_uri('img/auther.svg')); ?>" alt="作者プロフィール">
    <h3 class="side-title">Auther</h3>
    <p class="profile">
    星と歴史が好きな普通の会社員です。オリジナルテーマをデザイン＆コーディングしながら記事を書いています。
    </p>
    <ul>
    <li>
     <a href="https://note.com/equant">
      <img src="<?php echo get_theme_file_uri('img/note-btn.png'); ?>" alt="note">
     </a>
      </li>
      <li>
     <a href="https://x.com/devcosmo_luna">
      <img src="<?php echo get_theme_file_uri('img/x-btn.png'); ?>" alt="X">
     </a>
      </li>
    </ul>
   
  </section>

  <section class="archive">
  <?php get_search_form(); ?>
  </section>

  <section class="archive">
    <?php dynamic_sidebar('sidebar'); ?>
  </section>

  <section class="archive">
  <h3 class="side-title">Privacy Policy</h3>
  <a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>">
      プライバシーポリシー
     </a>
  </section>

</aside>


