<!DOCTYPE html>
<html lang="en" class="app">

    <head> 
        <meta charset="utf-8" /> 
        <title>BlueAds | Web System</title> 
        <meta name="description" content="" /> 

        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
        <link rel="stylesheet" href="<?= base_url("ba/css/app.v1.css"); ?>" type="text/css" /> 
        <link rel="shortcut icon" href="<?= base_url("ba/images/logo.png"); ?>"/>
        <!--[if lt IE 9]> 
        <script src="js/ie/html5shiv.js"></script> 
        <script src="js/ie/respond.min.js"></script> 
        <script src="js/ie/excanvas.js"></script> 
        <![endif]-->
    </head>

    <body class="">
        <section class="vbox">
            <header class="bg-white header header-md navbar navbar-fixed-top-xs box-shadow">
                <div class="navbar-header aside-md dk">
                    <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html">
                        <i class="fa fa-bars"></i> 
                    </a>
                    <a href="<?= base_url(); ?>" class="navbar-brand">
                        <img src="<?= base_url('ba/images/logo.png'); ?>" class="m-r-sm" alt="ba">
                        <span class="hidden-nav-xs">BlueAds</span> 
                    </a>
                    <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user"> 
                        <i class="fa fa-cog"></i> 
                    </a>
                </div>

                <ul class="nav navbar-nav hidden-xs">
                    <li class="dropdown">
                        <a href="<?= current_url(); ?>#" class="dropdown-toggle" data-toggle="dropdown"> 
                            <i class="i i-grid"></i> 
                        </a>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user user">
                    <li class="dropdown">
                        <a href="<?= current_url(); ?>#" class="dropdown-toggle" data-toggle="dropdown"> 
                            <span class="thumb-sm avatar pull-left"> 
                                <img src="<?= base_url('ba/images/a0.png'); ?>" alt="..."> 
                            </span> 
                            <?php
                            $session_data = $this->session->userdata('adsuser');
                            echo $session_data['adsu_name'];
                            ?>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight">
                            <li> 
                                <a href="<?= base_url('logout'); ?>">Logout</a> 
                            </li>
                        </ul>
                    </li>
                </ul>
            </header>


            <section>
                <section class="hbox stretch">
                    <!-- .aside -->
                    <aside class="bg-black aside-md hidden-print hidden-xs" id="nav">
                        <section class="vbox">
                            <section class="w-f scrollable">
                                <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">

                                    <!-- nav -->
                                    <nav class="nav-primary hidden-xs">
                                        <div class="text-muted text-sm hidden-nav-xs padder m-t-sm m-b-sm">Menu</div>
                                        <ul class="nav nav-main" data-ride="collapse">
                                            <li class="active">
                                                <a href="<?= base_url(); ?>" class="auto">
                                                    <i class="i i-statistics icon"> </i> 
                                                    <span class="font-bold">Overview</span> 
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="<?= base_url("feed"); ?>" class="auto">
                                                    <i class="i  i-stats  icon"> </i> 
                                                    <span class="font-bold">Feed</span> 
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="line dk hidden-nav-xs"></div>
                                        <div class="text-muted text-xs hidden-nav-xs padder m-t-sm m-b-sm"> Player Lables</div>
                                        <ul class="nav">
                                            <li>
                                                <a title="Active player label color"> 
                                                    <i class="i i-circle-sm text-success-dk"></i> 
                                                    <span>Active</span> 
                                                </a>
                                            </li>
                                            <li>
                                                <a title="Disapled player label color"> 
                                                    <i class="i i-circle-sm text-danger-dk"></i> 
                                                    <span>Disabled</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                    <!-- / nav -->
                                </div>
                            </section>
                            <footer class="footer hidden-xs no-padder text-center-nav-xs">
                                <a href="http:://bluewave.co.ke" target="_blank" class="btn btn-icon icon-muted btn-inactive m-l-xs m-r-xs">                                     
                                    &copy;2017 BlueAds
                                </a>
                            </footer>
                        </section>
                    </aside>
                    <!-- /.aside -->


                    <section id="content">
                        <section class="vbox">


                            <header class="header bg-light dk">
                                <p>Display Groups</p>
                            </header>


                            <section class="scrollable wrapper">
                                <div class="row">
                                    <div class="col-lg-6">

                                        <!-- display groups -->
                                        <section class="panel panel-default pos-rlt clearfix">

                                            <header class="panel-heading">
                                                Media Display Groups
                                            </header>

                                            <div class="panel-body clearfix">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-left">ID</th>
                                                            <th class="text-left">Name</th>
                                                            <th class="text-left">Description</th>
                                                            <th class="text-right">View more</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($displayg as $displayg_row):
                                                            $d_id = $displayg_row->DisplayGroupID;
                                                            $d_name = $displayg_row->DisplayGroup;
                                                            $d_description = $displayg_row->Description;
                                                            ?>
                                                            <tr>
                                                                <td align="left"><?= $d_id; ?></td>
                                                                <td align="left"><?= $d_name; ?></td>
                                                                <td align="left"><?= $d_description; ?></td>
                                                                <td align="right">
                                                                    <a href="<?= base_url("viewgroup/$d_id"); ?>">
                                                                        <button class="btn btn-default btn-icon btn-rounded btn-sm" type="button">Go</button>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                        endforeach;
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </section>
                                        <!-- / display groups -->

                                    </div>

                                    <div class="col-sm-6 portlet ui-sortable">
                                        
                                        <section class="panel panel-default portlet-item"> 
                                            <header class="panel-heading"> 
                                                Quick Guide  
                                            </header> 
                                            <section class="panel-body"> 
                                                <article class="media"> 
                                                    <div class="pull-left">
                                                        <span class="i i-stack">
                                                            <i class="i i-circle-sm"></i> 
                                                        </span> 
                                                    </div> 
                                                    <div class="media-body"> 
                                                        <a class="h4">Display Groups</a> 
                                                        <small class="block m-t-xs">
                                                            This is a list of the display groups created in the main Xibo CMS.
                                                            They are used to group the different media files to be played.
                                                        </small> 
                                                    </div> 
                                                </article> 
                                                <div class="line pull-in"></div> 
                                                <article class="media"> 
                                                    <div class="pull-left"> 
                                                        <span class="i i-stack">
                                                            <i class="i i-circle-sm"></i> 
                                                        </span> 
                                                    </div> 
                                                    <div class="media-body"> 
                                                        <a class="h4">View Media Files</a> 
                                                        <small class="block m-t-xs">
                                                            The media files are grouped with respect to the different display groups. To view files in a given group,
                                                            click <kbd>Go</kbd> on the <code>Display Group</code> table.
                                                        </small>
                                                    </div> 
                                                </article> 
                                                <div class="line pull-in"></div> 
                                                <article class="media"> 
                                                    <div class="pull-left"> 
                                                        <span class="i i-stack">
                                                            <i class="i i-circle-sm"></i> 
                                                        </span> 
                                                    </div> 
                                                    <div class="media-body"> 
                                                        <a class="h4">Launch Player</a> 
                                                        <small class="block m-t-xs">
                                                            Each <code>Display Group</code> has it's own web player. To view the player, click <kbd>Go</kbd>
                                                            on the <code>Display Group</code> table and select <kbd>Launch Player</kbd>
                                                        </small> 
                                                    </div> 
                                                </article> 
                                            </section> 
                                        </section> 
                                        
                                    </div>
                                </div>
                            </section>
                        </section>
                        <a href="<?= current_url(); ?>#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
                    </section>
                </section>
            </section>
        </section>


        <!-- Bootstrap --> 
        <!-- App --> 
        <script src="<?= base_url("ba/js/app.v1.js"); ?>"></script> 
        <script src="<?= base_url("ba/js/app.plugin.js"); ?>"></script>
    </body>

</html>