<?php
  require 'confs.php';

  echo "<link rel='stylesheet' type='text/css' href='stylesheet.css'/>";


  echo "<head><meta http-equiv='content-type' content='text/html; charset=UTF-8'><link rel='shortcut icon' type='image/x-icon' href='" . $custom_page_icon . "' /><title>" . $page_title . "</title></head>";
  echo "<body>";
  echo "<header id='header'>" . $page_header . "</header>";
  echo "<br>";
  echo "&nbsp&nbsp<a href='files.php'><img src='home-icon.png' alt='home' style='width:28px;height:28px;border:0'></a>&nbsp&nbsp";
  echo "&nbsp&nbsp<a href='up.php'><img src='upload-icon.png' alt='home' style='width:28px;height:28px;border:0'></a>&nbsp&nbsp";
  echo "&nbsp&nbsp<a href='deletefiles.php'><img src='delete-icon.png' alt='home' style='width:28px;height:28px;border:0'></a>&nbsp&nbsp";

  echo "<hr>";
  
  $served_files = scandir($directory_served);
  $num_of_files = count($served_files);
  if ($num_of_files <= 2 ){
    echo "File Queue Empty";
  }
  else {
    echo "<table class='a'><tr class='a'><th class='a'>File Name</th><th class='a'>Size</th><th class='a'>Date Created</th></tr>";

    foreach($served_files as $file) {
   	if ((!in_array($file,array(".",".."))) && is_file($directory_served.$file)) {
        
          $indexed_file_size = filesize($directory_served.$file);
          $indexed_file_mod_date = date ("Y-d-m H:i:s", filemtime($directory_served.$file));
          //$indexed_file_extension = pathinfo($directory_served.$file, PATHINFO_EXTENSION);

          echo "<tr class='a'>";
          if ( $indexed_file_size >= GB){
            $indexed_file_rsize =  round($indexed_file_size / GB, 3);
            echo "<td class='a'>" . $file . "</td>";
            echo "<td class='a'>" . $indexed_file_rsize . ' GB </td>';
            echo "<td class='a'>" . $indexed_file_mod_date . "</td>";
            echo "</tr>";
            continue;
          }
          if ( $indexed_file_size >= MB){
            $indexed_file_rsize =  round($indexed_file_size / MB, 3);
            echo "<td class='a'>" . $file . "</td>";
            echo "<td class='a'>" . $indexed_file_rsize . ' MB </td>';
            echo "<td class='a'>" . $indexed_file_mod_date . "</td>";
            echo "</tr>";
            continue;
          }
          if ( $indexed_file_size >= kB){
            $indexed_file_rsize =  round($indexed_file_size / kB, 3);
            echo "<td class='a'>" . $file . "</td>";
            echo "<td class='a'>" . $indexed_file_rsize . ' kB </td>';
            echo "<td class='a'>" . $indexed_file_mod_date . "</td>";
            echo "</tr>";
            continue;
          }
          else {
            echo "<td class='a'>" . $file . "</td>";
            echo "<td class='a'>" . $indexed_file_size . ' bytes </td>';
            echo "<td class='a'>" . $indexed_file_mod_date . "</td>";
            echo "</tr>";
            continue;
          }
   	}
    }
    echo "</table>";
  }
  echo "</body></html>";
?>
