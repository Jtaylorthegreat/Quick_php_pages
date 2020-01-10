<?php 
	echo "<head><title>Video Indexed Page</title></head>";
	echo "<body>";
	         $file_queue = "my_videos/";
            $video_files = scandir($file_queue);
            foreach($video_files as $file) {
              if (!in_array($file,array(".",".."))){
                   echo "<pre><font color='black'> " . $file . "</font><br>";
                   echo "<video width='600' controls>";
                   echo "<source src='" . $file_queue . $file . "' type='video/mp4'>";
                   echo "</video></pre>";
                }
            }
    echo "</body></html>";
?>




