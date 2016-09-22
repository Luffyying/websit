<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Blog Lists</title>
	<meta name='viewport' content='width=device-width,initial-scale=1.0'/>
	<base href="<?php echo site_url();?>">
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bloglist.css">
</head>
<body>
	<!--start header-->
    <?php include 'header.php';?>
    <!--end header-->
    <!-- start content  -->
    <div id="content">
    	<div class="wrapper">
    		<ul class='lists'>
    		<?php foreach ($blogs as $blog) {?>
    			<li>
    				<img src="<?php echo $blog->img?>" alt="">
    				<p><?php echo $blog->title?></p>
    				<button class='read'><a href='welcome/blog_detial?id=<?php echo $blog->blog_id?>' style='
    				color:#fff'>READ</a></button>
    			</li>
    		<?php }?>
    		</ul>

    	</div>
	<input id='more' class='send' type="submit" value="MORE" style='margin-bottom: 10px'/>
    </div>
    <!-- end content -->
    <?php include 'footer.php';?>
    <?php include 'gotop.php';?> 
	<script src='js/require.js' data-main='js/bloglist.js'></script>
  
</body>
</html>