<?php
   // function.php
	function download_file($filepath)
	{
		if (!is_file($filepath))
		   {
			 echo("404 File not found!"); // file not found to download
			 exit();
		   }


			$len = filesize($filepath); // get size of file
			$filename = basename($filepath); // get name of file only
			$file_extension = strtolower(pathinfo($filename,PATHINFO_EXTENSION));
			//Set the Content-Type to the appropriate setting for the file
			switch( $file_extension )
				 {
					case "pdf": $ctype="application/pdf"; break;
					case "exe": $ctype="application/octet-stream"; break;
					case "zip": $ctype="application/zip"; break;
					case "doc": $ctype="application/msword"; break;
					case "xls": $ctype="application/vnd.ms-excel"; break;
					case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
					case "gif": $ctype="image/gif"; break;
					case "png": $ctype="image/png"; break;
					case "jpeg":
					case "jpg": $ctype="image/jpg"; break;
					default: $ctype="application/force-download";
				}
				ob_clean();
				//Begin writing headers
				header("Pragma: public");
				header("Expires: 0");
				header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
				header("Cache-Control: public");
				header("Content-Description: File Transfer");
				//Use the switch-generated Content-Type
				header("Content-Type: $ctype");
				//Force the download
				$header="Content-Disposition: attachment; filename=".$filename.";";
				header($header );
				header("Content-Transfer-Encoding: binary");
				header("Content-Length: ".$len);
				@readfile($filepath);
				exit;
		}

    $filepath = "files/".$_GET['file']."";
    	download_file($filepath);
?>
