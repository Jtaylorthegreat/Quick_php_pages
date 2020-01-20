<?php
	require 'confs.php';

	if(isset($_POST['upsubmit'])) { 
	  
	    //$file_queue = $config['agentfilequeuefolder'];
		//$script_folder = $file_queue;
	    // Define maxsize for files  
	    //$maxsize = 300 * MB;  
	  
	    if(!empty(array_filter($_FILES['files']['name']))) { 
	  
	        foreach ($_FILES['files']['tmp_name'] as $key => $value) { 
	              
	            $file_tmpname = $_FILES['files']['tmp_name'][$key]; 
	            $file_name = $_FILES['files']['name'][$key]; 
	            $file_size = $_FILES['files']['size'][$key]; 
	            $file_ext = pathinfo($file_name, PATHINFO_EXTENSION); 
	  
	            $filepath = $directory_served.$file_name; 
	  
	                //if ($file_size > $maxsize)          
	                //    echo "Error: File size is larger than the allowed limit.";  
	  
	                if(file_exists($filepath)) { 
	                    $filepath = $directory_served.time().$file_name; 
	                      
	                    if( move_uploaded_file($file_tmpname, $filepath)) { 
	                        echo "{$file_name} successfully uploaded <br />"; 
	                    }  
	                    else {  
	                        echo "Error uploading {$file_name} <br />";  
	                    } 
	                } 
	                else { 
	                  
	                    if( move_uploaded_file($file_tmpname, $filepath)) { 
	                        $successredirect = "files.php";
	                        header("location: $successredirect");
	                    } 
	                    else {                      
	                        echo "Error uploading {$file_name} <br />";  
	                    } 
	                } 
	        } 
	    }  
	    else { 
	          
	        echo "No files selected."; 
	    } 
	} 

?>