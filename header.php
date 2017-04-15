<!doctype html>
<head>
  <meta charset="utf-8">
  <title><?php wp_title('|',1,'right'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">

  <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

  <?php wp_enqueue_script("jquery"); ?>
  <?php wp_head(); ?>
</head>
<body>

  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Rozwiń nawigację</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
          </button>
        <a class="navbar-brand" href="<?php echo site_url(); ?>">
          <?php bloginfo('name'); ?>
        </a>


        <p class="blog-description">
          <svg height="25" width="25">
            <line x1="25" y1="0" x2="0" y2="25" style="stroke:rgb(255,0,0);stroke-width:1" />
            Sorry, your browser does not support inline SVG.
          </svg>

          <?php bloginfo('description'); ?></p>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <?php
          wp_nav_menu( array(
            'menu' => 'Primary Menu',
            'items_wrap' => '<ul id="%1$s" class="nav navbar-nav navbar-right %2$s">%3$s</ul>'
          ) );
          ?>
      </div>
    </div>
  </nav>
