<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>首页</title>
	<meta name='viewport' content='width=device-width,initial-scale=1.0'/>
	<base href="<?php echo site_url();?>">
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/index.css">
     <script>
        window.addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);
        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
</head>
<body>
<!--start header-->
    <?php include 'header.php';?> 
<!--end header-->
<!--start banner-->
    <div id='banner'>
        <div class="wrapper">
             <img src="img/me.png" alt="">
        </div>
    </div> 
<!--end header-->
<!-- startt blogs -->
    <div id="myblogs">
         <div class="wrapper">
                <h2>Latest Blogs</h2>
                 <div class="study">
                     <div class="col" style='text-align: center;padding: 10px 50px'>
                         <ul>
                            <?php foreach ($blogs as $blog) {?>
                               <li>
                                <a href='welcome/blog_detial?id=<?php echo $blog->blog_id?>'><?php echo $blog->title?> <label>( <?php echo $blog->date?> )</label></a>
                              </li>
                            <?php }?>
                            </ul>
                    </div>
                     <div class="col" style='width:40%'>
                        <h4 style="margin-top:15px">html</h4>
                        <div class="progress">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                <span class="sr-only">40% Complete (success)</span>
                            </div>
                        </div>
                        <h4>css</h4>
                        <div class="progress">
                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                <span class="sr-only">20% Complete</span>
                            </div>
                        </div>
                        <h4>js</h4>
                        <div class="progress">
                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                <span class="sr-only">60% Complete (warning)</span>
                            </div>
                        </div>
                        <h4>php<h4>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                        <span class="sr-only">80% Complete (danger)</span>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <a href='welcome/moreblog' class='send' >MORE</a>
         </div>

    </div> 
<!-- end blogs -->
<!--start works-->
    <div id='works'>
        <div class="wrapper">
            <div id="nav">
                    <h2>Demos</h2>
                    <ul id="lists">
                        <li><a href='javascript:;' 
                        class='active'>all</a></li>
                        <?php
                            foreach($categories as $category){
                        ?>
                          <li><a href="javascript:;" data-id="<?php echo $category->cate_id;?>"><?php echo $category->cate_name;?></a></li>
                           <?php
                            }
                        ?>                  
                    </ul>
                </div>
        </div>
        <ul id="blog-list">
                <?php
                    foreach($shows as $show){
                ?>
                        <li class="blogs">
                            <a href="#">
                                <img src="<?php echo $show->img;?>" alt="">
                                <div class="blog">
                                    <p class="blog-title"><?php echo $show->title;?></p>
                                </div>
                                <div class="mask">
                                    <a href='<?php echo $show->url;?>' class="mask-btn">VIEW DETIAL</a><br/>
                                </div>
                            </a>
                        </li>
                <?php
                    }
                ?> 
        </ul>
        <input id='more' class='send' type="submit" value="MORE"/>
    </div> 
<!-- end works -->
<!--start about-->
    <div id="about">
        <div class="wrapper">
             <h2>About Me</h2>
             <div id="special">
                 <img src="img/p5.jpg" alt="">
             </div>
        </div>
    </div>
<!--end about-->
<!--startt footer-->
  
 <?php include 'footer.php';?> 
 <?php include 'gotop.php';?> 

<script src='js/require.js' data-main='js/index.js'></script>
  
</body>
</html>