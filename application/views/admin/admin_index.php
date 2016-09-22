<!doctype html>
<html class="no-js fixed-layout">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>后台管理 - 首页</title>
  <meta name="description" content="这是一个 index 页面">
  <meta name="keywords" content="index">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <base href="<?php echo site_url();?>">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <link rel="apple-touch-icon-precomposed" href="assets/img/app-icon72x72@2x.png">
  <meta name="apple-mobile-web-app-title" content="Amaze UI" />
  <link rel="stylesheet" href="assets/css/amazeui.min.css"/>
  <link rel="stylesheet" href="assets/css/admin.css">
</head>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，Amaze UI 暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
  以获得更好的体验！</p>
<![endif]-->

<?php include 'admin_header.php';?>

<div class="am-cf admin-main">
  <?php include 'admin_sidebar.php';?>
  <!-- content start -->
     <div class="admin-content">
      <div class="admin-content-body">
        <div class="am-cf am-padding am-padding-bottom-0">
          <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">最新文章</strong></div>
        <div class="am-g">
          <div class="am-u-sm-12">
            <form class="am-form">
              <table class="am-table am-table-striped am-table-hover table-main">
                <thead>
                <tr>
                  <th class="table-check"><input type="checkbox" /></th><th class="table-id">编号</th><th class="table-title">标题</th><th class="table-type">访问量</th><th class="table-type">时间</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  foreach($blogs as $blog){
                ?>
                    <tr>
                      <td><input type="checkbox" data-id="<?php echo $blog->blog_id;?>"/></td>
                      <td><?php echo $blog->blog_id;?></td>
                      <td><a href="admin/blog_detial?blog_id=<?php echo $blog->blog_id;?>"><?php echo $blog->title;?></a></td>
                      <td><?php echo $blog->clicked;?></td>
                      <td><?php echo $blog->date;?></td>
                    </tr>
                <?php
                  }
                ?>
                </tbody>
              </table>
              <hr />
            </form>
          </div>

        </div>
      </div>

    </div>
  <!-- content end -->

</div>

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>

<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="assets/js/amazeui.ie8polyfill.min.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="assets/js/jquery.min.js"></script>
<!--<![endif]-->
<script src="assets/js/amazeui.min.js"></script>
<script src="assets/js/app.js"></script>
</body>
</html>
