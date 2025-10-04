<?php
/**
 * Template Name: プライバシーポリシー
 */
?>


<?php get_header(); ?>

<div id="container" class="wrapper">
  <main>
    <?php if (have_posts()): while (have_posts()): the_post(); ?>
        <article>
          <h1 class="article-title"><?php the_title(); ?></h1>

          <p>「DEVMILK ローコストハウツー」（以下、「当サイト」と言います。）では、お客様からお預かりする個人情報の重要性を強く認識し、個人情報の保護に関する法律、その他の関係法令を遵守すると共に、以下に定めるプライバシーポリシーに従って、個人情報を安全かつ適切に取り扱うことを宣言いたします。</p>

          <h2 class="wp-block-heading">個人情報の定義</h2>
          <p>本プライバシーポリシーにおいて、個人情報とは生存する個人に関する情報であって、氏名、生年月日、住所、電話番号、メールアドレス等、特定の個人を識別することができるものをいいます。</p>

          <h2 class="wp-block-heading">個人情報の管理</h2>
          <p>お客様からお預かりした個人情報は、不正アクセス、紛失、漏えい等が起こらないよう、慎重かつ適切に管理します。</p>

          <h2 class="wp-block-heading">個人情報の利用目的</h2>
          <p>当サイトでは、お客様からのお問い合わせやサービスへのお申し込み等を通じて、お客様の氏名、生年月日、住所、電話番号、メールアドレス等の個人情報をご提供いただく場合があります。<br>その場合は、以下に示す利用目的のために、適正に利用するものと致します。</p>
          <p>・お客様からのお問い合わせ等に対応するため。<br>・お客様からお申し込みいただいたサービス等の提供のため。<br>・メールマガジン等の配信、セミナーやイベントのご案内等のため。<br>・当サイトが実施するアンケートへのご協力のお願いのため。<br>・当サイトのサービス向上・改善、新サービスを検討するための分析等を行うため。<br>・個人を識別できない形で統計データを作成し、当サイトおよびお客様の参考資料とするため。</p>


          <h2 class="wp-block-heading">個人情報の第三者提供</h2>
          <p>お客様からお預かりした個人情報を、個人情報保護法その他の法令に基づき開示が認められる場合を除き、ご本人様の同意を得ずに第三者に提供することはありません。</p>

          <h2 class="wp-block-heading">個人情報の開示・訂正・削除について</h2>
          <p>お客様からお預かりした個人情報の開示・訂正・削除をご希望の場合は、ご本人様よりお申し出ください。適切な本人確認を行った後、速やかに対応させていただきます。</p>

          <h2 class="wp-block-heading">Cookie（クッキー）について</h2>
          <p>Cookie（クッキー）とは、お客様のサイト閲覧履歴を、お客様のコンピュータにデータとして保存しておく仕組みです。</p>
          <p>当サイトでは、第三者配信事業者である「Googleアドセンス」を利用しておりますが、Cookieを使用することにより、お客様の過去のアクセス情報に基づいて、適切な広告を配信する場合があります。</p>
          <p>お客様は<a rel="noreferrer noopener" target="_blank" href="https://adssettings.google.com/authenticated">Google広告設定</a>から、Cookieを使用したパーソナライズ広告を無効にすることができます。なお、Cookieに保存されている情報からお客様個人を特定することはできません。</p>

          <h2 class="wp-block-heading">アクセス解析ツールについて</h2>
          <p>当サイトは、Googleが提供するアクセス解析ツール「Googleアナリティクス」を利用しています。Googleアナリティクスは、Cookieを使用することでお客様のトラフィックデータを収集しています。</p>
          <p>お客様はブラウザの設定でCookieを無効にすることで、トラフィックデータの収集を拒否することができます。なお、トラフィックデータからお客様個人を特定することはできません。詳しくは<a rel="noreferrer noopener" target="_blank" href="https://marketingplatform.google.com/about/analytics/terms/jp/">Googleアナリティクス利用規約</a>をご確認ください。</p>

          <h2 class="wp-block-heading">本ポリシーの変更</h2>
          <p>当サイトは、法令の制定、改正等により、本ポリシーを適宜見直し、予告なく変更する場合があります。本ポリシーの変更は、変更後の本ポリシーが当サイトに掲載された時点、またはその他の方法により変更後の本ポリシーが閲覧可能となった時点で有効になります。</p>
        </article>

    <?php endwhile;
    endif; ?>

    <!-- 前の記事　次の記事 -->
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
