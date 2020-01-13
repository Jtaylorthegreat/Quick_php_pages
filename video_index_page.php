<?php 
	echo "<head><title>Video Indexed Page</title></head>";
	echo "<body style='background-color:#000099'>";
  	echo "<br>";
        $file_queue = "my_videos/";
        $video_files = scandir($file_queue);
        foreach($video_files as $file) {
              if (!in_array($file,array(".",".."))){
		   echo "<hr><br>";
                   echo "<pre><font color='white'><b> " . $file . "</b></font><br>";
                   echo "<video width='600' controls>";
                   echo "<source src='" . $file_queue . $file . "' type='video/mp4'>";
                   echo "</video></pre>";
                }
        }
    	echo "</body></html>";
?>




