<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Blog Detial</title>
	<meta name='viewport' content='width=device-width,initial-scale=1.0'/>
	<base href="<?php echo site_url();?>">
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/blogdetial.css">
</head>
<body>
	<!--start header-->
    <?php include 'header.php';?>
    <!--end header-->
    <!--start banner-->
    <div id='banner'>
      <div class='contain'>  	
    		<img src="<?php echo $blog->img?>" alt="">
      </div>
    </div>
     <!--end banner-->
    <!--start content-->
    <div id="content">
     	<div class='contain'>  	
	    	<h2>《 <?php echo $blog->title?> 》</h2><br/><hr />
	    	<p><?php echo $blog->content?></p>
	    	<div id='tag'>
    		<hr style='color:green'/>
    		<span><?php echo $blog->date?></span>
    	</div>
    	</div>
    </div>
     <!--end content-->
    <!--start comment-->
    <div id="comment">
    	<div class="contain">
	    	<ul class='comlist'>
	    		<?php foreach ($comments as $comment){?> 
    		
    		<li><img src='<?php echo $comment->por?>'/>
    		<span><?php echo $comment->date?></span><p><?php echo $comment->content?></p></li>
    	     <?php }?>
	    	</ul>
    	</div>
    	<div id='leavecomment'>
    		<div class="contain">
    			<h1>Leave comment</h1>
    			<div id='infor'>
                    <input type="text" name='name1' value="Name" onfocus="this.value=''" onblur="if (this.value == '') {this.value = this.defaultValue;}">
                    <input type="text" name='email1' value="Email"  onfocus="this.value=''" onblur="if (this.value == '') {this.value =this.defaultValue;}">
                    <input type="text" name='phone1' value="Phone"  onfocus="this.value=''" onblur="if (this.value == '') {this.value = this.defaultValue;}">
                    <textarea value="Message" name='message1' onfocus="this.value = '';" onblur="if (this.value == '') {this.value = this.defaultValue;}">Message</textarea>
                    <button id='leavemessage'>send</button>
                    <input name='bgid' type="hidden" value='<?php echo $blog->blog_id?>'/>
                </div>
    			</div>
    		</div>
    	</div>
    </div>
     <!--end comment-->
    <!--start footer-->
    <?php include 'footer.php';?> 
 	<?php include 'gotop.php';?> 
    <script src='js/require.js' data-main='js/blogdetial.js'></script>
</body>
</html>