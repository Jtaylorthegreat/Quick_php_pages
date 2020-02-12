<?php 
  require 'library_confs.php';
  echo "<head><title>Internal Library</title></head>";
  echo "<body style='background-color:#000099'>";
  echo "<br>";
  $book_files = scandir($book_queue);
  $book_covers = scandir($book_cover_queue);

  foreach($book_files as $book){

    if (!in_array($book,array(".",".."))) {

      $file_data = pathinfo($book, PATHINFO_FILENAME);
      $image_name = $file_data . ".jpg";
      $image_file = $book_cover_queue . $file_data . ".jpg";

    echo "<img src='" . $image_file . "' alt='" . $image_name . "' style='width:82px;height:82px;border:0'>";
    echo "<a href='download_book.php?file=" . $book . "'><font color='white'>" . $file_data . "</font></a><br>";
    }
  }
  echo "</body></html>";
?>
