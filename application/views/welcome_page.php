<!DOCTYPE html>
<html lang="en" class=" ">
    <head> 
        <meta charset="utf-8" /> 
        <title>BlueAds | Web System</title> 
        <meta name="description" content="" /> 

        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
        <link rel="stylesheet" href="<?= base_url("ba/css/app.v1.css"); ?>" type="text/css" /> 
        <link rel="shortcut icon" href="<?= base_url("ba/images/logo.png");?>"/>
        <!--[if lt IE 9]> 
        <script src="js/ie/html5shiv.js"></script> 
        <script src="js/ie/respond.min.js"></script> 
        <script src="js/ie/excanvas.js"></script> 
        <![endif]-->
    </head>
    <body class="" > 
        <section id="content" class="m-t-lg wrapper-md animated fadeInUp"> 
            <div class="container aside-xl"> 
                <a class="navbar-brand block" href="<?= base_url();?>">BlueAds</a>
                <section class="m-b-lg">
                    <header class="wrapper text-center">
                        <strong>Sign in to get in touch</strong> 
                        
                    </header> 
                    
                    <?php echo validation_errors(); ?>
                    
                    <form action="<?php echo base_url("login"); ?>" method="post"> 
                        <div class="list-group"> 
                            <div class="list-group-item">
                                <input type="text" placeholder="Username" name="uname" required="" class="form-control no-border"> 
                            </div> 
                            <div class="list-group-item"> 
                                <input type="password" placeholder="Password" name="upassword" required="" class="form-control no-border"> 
                            </div> 
                        </div> 
                        <button type="submit" class="btn btn-lg btn-primary btn-block">Sign in</button>
                        
                        
                        <div class="line line-dashed">

                        </div> 
                    </form> 
                </section> 
            </div> 
        </section> 
        <!-- footer -->
        <footer id="footer"> 
            <div class="text-center padder">
                <p> 
                    <small>BlueAds &copy; 2017</small>
                </p> 
            </div>
        </footer> 
        <!-- / footer --> 

        <!-- Bootstrap --> 
        <!-- App --> 
        <script src="<?= base_url("ba/js/app.v1.js");?>"></script> 
        <script src="<?= base_url("ba/js/app.plugin.js");?>"></script>
    </body>
</html>