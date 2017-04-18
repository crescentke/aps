
<?php
$media_base_url = "http://localhost/scr/crescent";
?>

<!DOCTYPE html>
<html lang="en" class="app">

    <head> 
        <meta charset="utf-8" /> 
        <title>BlueAds | Web System</title> 
        <meta name="description" content="" /> 

        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
        <link rel="stylesheet" href="<?= base_url("ba/css/app.v1.css"); ?>" type="text/css" /> 
        <link rel="shortcut icon" href="<?= base_url("ba/images/logo.png"); ?>"/>
        <link rel="stylesheet" type="text/css" media="screen" href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript"
                src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js">
        </script>
        <script type="text/javascript"
                src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.pt-BR.js">
        </script>
        <!--[if lt IE 9]> 
        <script src="js/ie/html5shiv.js"></script> 
        <script src="js/ie/respond.min.js"></script> 
        <script src="js/ie/excanvas.js"></script> 
        <![endif]-->
    </head>

    <body id="bo">
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
                                            <li class="">
                                                <a href="<?= base_url(); ?>" class="auto">
                                                    <i class="i i-statistics icon"> </i> 
                                                    <span class="font-bold">Overview</span> 
                                                </a>
                                            </li>
                                            <li class="active">
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

                            <?php
                            foreach ($dgroup as $dgroup_row) {
                                $groupName = $dgroup_row->DisplayGroup;
                                $groupId = $dgroup_row->DisplayGroupID;
                            }
                            ?>

                            <?= $error; ?> 

                            <header class="header bg-light dk">
                                <p>Display Group Feed - <?php echo $groupName; ?></p>
                            </header>


                            <section class="scrollable wrapper">
                                <div class="row">
                                    <div class="col-md-12">

                                        <!-- display groups -->
                                        <section class="panel panel-default pos-rlt clearfix">

                                            <header class="panel-heading">
                                                <?php echo $groupName; ?> Display Group
                                            </header>

                                            <div class="panel-body clearfix" id="schedules">
                                                <div>
                                                    <div class="row">

                                                        <div class="col-md-1">Site Code</div>
                                                        <div class="col-md-3">Media URL</div>
                                                        <div class="col-md-3">Play Date/Time</div>
                                                        <div class="col-md-3">Stop Date/Time</div>
                                                        <div class="col-md-2">Action</div>

                                                    </div>
                                                    <div>
                                                        <?php
                                                        foreach ($vdata as $vdata_row):
                                                            $siteCode = $vdata_row->DisplayGroupID;
                                                            $mediaName = $vdata_row->name;
                                                            $mediaStoredAs = $vdata_row->storedAs;
                                                            $mediaId = $vdata_row->mediaid;
                                                            


                                                            $this->db->where('displayGroup', $siteCode);
                                                            $this->db->where('mediaUrl', "$media_base_url/$mediaStoredAs");
                                                            $play_time = $this->db->get('site_schedule');
                                                            $play_times = $play_time->result();
                                                            
                                                            foreach ($play_times as $play_times_row) {
                                                                $playStart = $play_times_row->playStart;
                                                                $playStop = $play_times_row->playStop;
                                                            }

                                                            if (count($play_times) > 0) {
                                                                $startPlay = $playStart;
                                                                $stopPlay = $playStop;
                                                            } else {
                                                                $startPlay = "";
                                                                $stopPlay = "";
                                                            }
                                                            ?>
                                                            <form method="post" action="<?= base_url("save-schedule"); ?>">
                                                                <input type="hidden" name="site_code" value="<?= $siteCode; ?>"/>
                                                                <input type="hidden" name="media_url" value="<?= "$media_base_url/$mediaStoredAs"; ?>"/>
                                                                <div class="row">
                                                                    <div class="col-md-1"><?= $siteCode; ?></div>
                                                                    <div class="col-md-3"><?= "$media_base_url/$mediaStoredAs"; ?></div>
                                                                    <div class="col-md-3">
                                                                        <div id="datetimepicker2<?= $mediaId; ?>" class="input-append form-group">
                                                                            <input data-format="MM/dd/yyyy HH:mm PP" type="text" placeholder="MM/DD/YYYY HH:mm PP" class="form-control" required="" name="play_start" value="<?= $startPlay; ?>">
                                                                            <span class="add-on">
                                                                                <i data-time-icon="i i-clock2" data-date-icon="i i-calendar"></i>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div id="datetimepicker3<?= $mediaId; ?>" class="input-append form-group">
                                                                            <input data-format="MM/dd/yyyy HH:mm PP" type="text" placeholder="MM/DD/YYYY HH:mm PP" class="form-control" required="" name="play_stop" value="<?= $stopPlay; ?>">
                                                                            <span class="add-on">
                                                                                <i data-time-icon="i i-clock2" data-date-icon="i i-calendar"></i>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <input type="submit" value="Save" class="btn btn-default"/>
                                                                    </div>
                                                                </div>

                                                                <script type="text/javascript">
                                                                    $(function () {
                                                                        $('#datetimepicker2<?= $mediaId; ?>').datetimepicker({
                                                                            language: 'en',
                                                                            pick12HourFormat: true
                                                                        });
                                                                    });

                                                                    $(function () {
                                                                        $('#datetimepicker3<?= $mediaId; ?>').datetimepicker({
                                                                            language: 'en',
                                                                            pick12HourFormat: true
                                                                        });
                                                                    });


                                                                    var dateToday = new Date();


                                                                    $.fn.datetimepicker.defaults = {
                                                                        maskInput: true, // disables the text input mask
                                                                        pickDate: true, // disables the date picker
                                                                        pickTime: true, // disables de time picker
                                                                        pick12HourFormat: false, // enables the 12-hour format time picker
                                                                        pickSeconds: false, // disables seconds in the time picker
                                                                        startDate: dateToday, // set a minimum date
                                                                        endDate: Infinity          // set a maximum date
                                                                    };
                                                                </script>
                                                            </form>
                                                            <?php
                                                        endforeach;
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <!-- / display groups -->

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 portlet ui-sortable">

                                        <section class="panel panel-default portlet-item"> 
                                            <header class="panel-heading"> 
                                                Group Player Demo 
                                            </header> 
                                            <section class="panel-body"> 

                                                <p class="hidden"> 
                                                    <a href="<?= base_url("play?dg=$groupId"); ?>" title="Launch Player" target="_blank">
                                                        <span class="label bg-success">Launch Player</span> 
                                                    </a>
                                                </p>

                                                <div id="demo">

                                                    <script type = "text/javascript">
                                                        var media_base_url = "http://localhost/scr/crescent/Xibo";
                                                        var videos = [<?php
                                                        foreach ($vdata as $vplay_row):
                                                            $vp_id = $vplay_row->mediaid;
                                                            $vp_stored = $this->Crud->get_stored_as($vp_id);
                                                            ?>
                                                                media_base_url + "/<?php echo $vp_stored; ?>",
<?php endforeach; ?>
                                                        ];
                                                        document.getElementById("bo").onload = function () {
                                                            var all_videos = videos.length;
                                                            var source = document.createElement('source');
                                                            function addSourceToVideo(element, src, type) {
                                                                source.src = src;
                                                                source.type = type;
                                                                element.appendChild(source);
                                                            }
                                                            var video = document.createElement('video');
                                                            video.muted = !0;
                                                            video.controls = !1;
                                                            video.height = 165;
                                                            video.width = 300;
                                                            document.getElementById("demo").appendChild(video);
                                                            if (all_videos === 1) {
                                                                addSourceToVideo(video, videos[0], 'video/mp4');
                                                                video.loop = !0;
                                                                video.play();
                                                            } else {
                                                                var i = 0;
                                                                addSourceToVideo(video, videos[i], 'video/mp4');
                                                                video.play();
                                                                video.addEventListener('ended', function () {
                                                                    if (i < all_videos - 1) {
                                                                        i++;
                                                                    } else if (i === all_videos - 1) {
                                                                        i = 0;
                                                                    }
                                                                    video.pause();
                                                                    source.src = videos[i];
                                                                    video.load();
                                                                    video.play();
                                                                }, !1);
                                                            }
                                                        };
                                                    </script>


                                                </div>

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


        <div class="">




        </div>





        <!-- Bootstrap --> 
        <!-- App --> 




    </body>

</html>