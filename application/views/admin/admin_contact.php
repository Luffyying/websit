<!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Amaze UI Admin table Examples</title>
  <meta name="description" content="这是一个 table 页面">
  <meta name="keywords" content="table">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <base href="<?php echo site_url();?>">

  <link rel="icon" type="image/png" href="assets/i/favicon.png">
  <link rel="apple-touch-icon-precomposed" href="assets/i/app-icon72x72@2x.png">
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
        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">留言管理</strong></div>
      </div>

      <hr>

      <div class="am-g">
        <div class="am-u-sm-12 am-u-md-6">
          <div class="am-btn-toolbar">
            <div class="am-btn-group am-btn-group-xs">
              <button type="button" class="am-btn am-btn-default" id="btn-delete-selected"><span class="am-icon-trash-o"></span> 删除</button>
            </div>
          </div>
        </div>
      </div>

      <div class="am-g">
        <div class="am-u-sm-12">
          <form class="am-form">
            <table class="am-table am-table-striped am-table-hover table-main">
              <thead>
              <tr>
                <th class="table-check"><input type="checkbox" /></th><th class="table-id">编号</th><th class="table-title">姓名</th><th class="table-type">邮箱</th><th class="table-type">电话</th><th class="table-type">内容</th><th class="table-type">时间</th><th class="table-set">操作</th>
              </tr>
              </thead>
              <tbody>
              <?php
                foreach($contacts as $contact){
              ?>
                  <tr>
                    <td><input type="checkbox" data-id="<?php echo $contact->contact_id;?>"/></td>
                    <td><?php echo $contact->contact_id;?></td>
                    <td><a href="admin/contact_detial?contact_id=<?php echo $contact->contact_id;?>"><?php echo $contact->name;?></a></td>
                    <td><?php echo $contact->email;?></td>
                    <td><?php echo $contact->phone;?></td>
                    <td><?php echo $contact->message;?></td>
                    <td><?php echo $contact->date;?></td>
                    <td>
                      <div class="am-btn-toolbar">
                        <div class="am-btn-group am-btn-group-xs">
                          <button type="button" class="btn-update am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 编辑</button>
                          <button type="button" data-id="<?php echo $contact->contact_id;?>" class="btn-delete am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</button>
                        </div>
                      </div>
                    </td>
                  </tr>
              <?php
                }
              ?>
              </tbody>
            </table>
            <div class="am-cf">
              共 <?php echo count($contacts)?> 条记录
              <div class="am-fr">
                <ul class="am-pagination">
                  <?php echo $this->pagination->create_links();?>
                </ul>
              </div>
            </div>
            <hr />
          </form>
        </div>

      </div>
    </div>

  </div>
  <!-- content end -->
</div>


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
<script>
  $(function(){
    $('.btn-delete').on('click', function(){
      var that = this;
      if(confirm('是否确定删除该记录，可以在回收站中恢复.')){
        var contactId = $(this).data('id');
        $.get('admin/delete_contact', {
          contactId: contactId
        }, function(data){
          if(data == 'success'){
            alert('删除成功!');
            $(that).parents('tr').remove();
          }else{
            alert('删除失败!');
          }
        }, 'text');
      }
    });
    $('#btn-delete-selected').on('click', function(){
      if(confirm('是否确定删除该记录，可以在回收站中恢复.')) {
        var delStr = '';
        var $checked = $(':checked');
        $checked.each(function () {
          delStr += $(this).data('id') + ',';
        });
        delStr = delStr.substring(0, delStr.length - 1);
        $.get('admin/delete_selected_contact', {contactIdStr: delStr}, function (data) {
          if (data == 'success') {
            $checked.parents('tr').remove();
          }
        }, 'text');
      }
    });
  });
</script>
</body>
</html>
