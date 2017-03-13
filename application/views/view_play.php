<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>BlueAds | Web System</title>
        <link rel="shortcut icon" href="<?= base_url("ba/images/logo.png"); ?>"/>
        <link rel="stylesheet" href="<?= base_url("ba/css/videojs.css"); ?>"/>

        <script src="<?= base_url("ba/js/videojs_one.js"); ?>"></script>

        <style type="text/css">


            .my-video-dimensions
            {
                position:absolute;
                height:100%;
                width:100%;
                overflow: hidden;
            }

            .my-video-dimensions video
            {
                position: absolute;
                min-width: 100%;
                min-height: 100%;
                top: 0%;
                left: 0%;
                transform: translate(0%, 0%);
            }

        </style>
    </head>
    <body style="margin:  0px" id="b" class="videoContainer" onload="">



        <video id="my-video" class="video-js" controls preload="auto" data-setup="{}">
        </video>
        
        <script type = "text/javascript">
            
            document.getElementById("b").onload = function () {
                
                var v_element = document.getElementById('my-video_html5_api');
                if(v_element === null){
                    location.reload();
                }
                



                var videos = [<?php
foreach ($vplay as $vplay_row):$vp_id = $vplay_row->mediaid;
    $vp_stored = $this->Crud->get_stored_as($vp_id);
    ?>"http://localhost/scr/crescent/Xibo/<?php echo $vp_stored; ?>",<?php endforeach; ?>];
                        var all_videos = videos.length;
                var source = document.createElement('source');
                function addSourceToVideo(element, src, type) {
                    source.src = src;
                    source.type = type;
                    element.appendChild(source);
                }
                


                var video = document.getElementById('my-video_html5_api');
                video.muted = 1;
                video.height = 165;
                video.width = 510.5;

                if (all_videos === 1) {
                    addSourceToVideo(video, videos[0], 'video/mp4');
                    video.play();
                    video.loop = !0;
                } else {
                    var i = 0;
                    addSourceToVideo(video, videos[i], 'video/mp4');
                    video.play();
                    video.addEventListener('ended', function () {
                        if (i < all_videos - 1) {
                            i++
                        } else if (i === all_videos - 1) {
                            i = 0
                        }
                        video.pause();
                        source.src = videos[i];
                        video.load();
                        video.play()
                    }, !1)
                }
            }
            ;
        </script>




        <script src="<?= base_url("ba/js/videojs.js"); ?>"></script>

    </body>
</html>