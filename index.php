<?php
$target_dir="uploads/";//specifies the directory where the file is going to be placed
  $target_file=$target_dir . basename($_FILES["file"]["name"]);//$target_file specifies the path of the file to be uploaded
  $uploadok=1;
  $imagefiletype=pathinfo($target_file,PATHINFO_EXTENSION);
  // Check if image file is a actual image or fake image
if(isset($_POST["up"])) {
	
    $check = getimagesize($_FILES["file"]["tmp_name"]);
	
    if($check !== false) {
		
		//check file move to uploads directory
		if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
			
			//directory file and path info displayed.
        echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
		
		//if you use database to store file then database query and code write here
		//..................
    } else {
		
        echo "Sorry, there was an error uploading your file.";
    }
        //echo "File is an image - " . $check["mime"] . ".";
		//rest of the code successfully execute then file $uploadok=1;
        $uploadok = 1;
		
    } else {
        echo "File is not an image.";
        $uploadok = 0;
    }
}

//full file upload in sql
/*$target_dir="uploads/";
$target_file=$target_dir. basename($_FILES["file"]["name"]);
$ok=1;
$filetype=pathinfo($target_file,PATHINFO_EXTENSION);
if(isset($_POST["up"]))
{
	 $check = getimagesize($_FILES["file"]["tmp_name"]);
	 if($check !==getimagesize($_FILES["file"]["tmp_name"]))
	 {
		 echo "Image is ready to upload";
		 $ok=1;
		 
	 }
	 else
	 {
		 echo "Fire OUt";
		 $ok=0;
	 }
	
}*/
?>


<html>
<header><title>Index||File Upload</title></header>
<body>
<center><h3>File Upload Form</h3>
  <form action="" method="post" enctype="multipart/form-data">
   <input type="file" name="file"></br>
   <input type="submit" name="up" value="upload file">
  </form>

</center>

</body>
</html>