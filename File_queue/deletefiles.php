<?php
  require 'confs.php';

  echo "<link rel='stylesheet' type='text/css' href='stylesheet.css'/>";


  echo "<head><meta http-equiv='content-type' content='text/html; charset=UTF-8'><link rel='shortcut icon' type='image/x-icon' href='" . $custom_page_icon . "' /><title>" . $page_title . "</title></head>";
  //echo "<body style='background-color:#647F94'>";
  echo "<body>";
  echo "<header>" . $page_header . "</header>";
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
	  echo "<form method ='post'><select name = 'pickedfile[]' multiple size = $num_of_files>";
	  foreach($served_files as $file) {
	        if (!in_array($file,array(".",".."))) {
	        	echo "<option value = '$file' >" . $file . "</option>";
	        }
	  }
	  echo "</select>";
	  echo "<input type = 'submit' name = 'submitdelete' value = Submit>";
	  echo "</form>";
	  if(isset($_POST["submitdelete"])) { 
	    if(isset($_POST["pickedfile"])) { 
	       foreach ($_POST['pickedfile'] as $pickedfile) {  
	           $removefile = $directory_served . $pickedfile;
	           $delfile = fopen($removefile, 'w') or die("can't open file");
	           fclose($delfile);
	           if (!unlink($removefile)) {
	              echo ("Error deleting $pickedfile<br>");
	           }
	           else {
	              echo ("Deleted: $pickedfile <br>");
	           }
	        }
	    } 
	    else
	      echo "Please select a file for removal"; 
	    }
   }
  echo "</body></html>";
?>