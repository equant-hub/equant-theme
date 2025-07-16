<div id="re-top">
  <a href="#top" class="gotop">TOP</a>
</div>
<footer id="footer">
  <div class="content">
    <section class="item">
      <p class="footer-title">Contents</p>
      <a href="<?php echo esc_url(home_url()); ?>"><p><span>-Home-</span></p></a>
      <a href="<?php echo esc_url(home_url()); ?>"><p><span>-Menu1-</span></p></a>
      <a href="<?php echo esc_url(home_url()); ?>"><p><span>-Menu2-</span></p></a>
      <a href="<?php echo esc_url(home_url()); ?>"><p><span>-Menu3-</span></p></a>
    </section>
    <section class="item-tag">
    <p class="footer-title">Tag</p>
    <?php wp_tag_cloud('smallest=10 & largest=10'); ?>
    </section>
    <section class="item">
      <div class="item-logo">
        <a href="#">
        <img src="<?php echo get_theme_file_uri('img/folio.jpg'); ?>" alt="ポートフォリオ" />
        </a>
      </div>
    </section>
  </div>
  <div class="bottom-area">
  <div class="copyright">© EQUANT.AWE.JP</a></div>
  </div>
</footer>
</body>

</html>
<?php wp_footer(); ?>
