<!doctype html>
<html>
    <head>
		<meta charset="utf-8">
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>bordel visuel</title>
    <link rel="stylesheet" href="css/style.css" />
   	</head>
    <body>

    <?php

 $handle = new upload($_FILES['image_field']);
  if ($handle->uploaded) {
      $handle->allowed = array('image/*');
      $handle->process('./files');

      if ($handle->processed) {
          echo '<span><p>Votre image a bien été mise en ligne</p></span>';
          $handle->clean();

      } else {
          echo '<span><p>error : ' . $handle->error;
          echo '</p></span>' ;
      }

  }
  
?>

<?php
      $files = [];
      $dir = './files';
      $files = scandir($dir);
  
      foreach ($files as $file) {
        $file_del = substr($file, 0, 1);
        if($file_del != '.'){
          echo "<a href='./files/$file' target='_blank'>
                  <img src='./files/$file' height='105px' width='179px'>
                </a>";
        }
      }
      

?>

    	<?php include 'inc/class.upload.php'; ?>
	
		    <form enctype="multipart/form-data" method="post" action="#">
		          
		          <input class="custom-file-input" id="file" type="file" name="image_field" value="" required >
		        
		          <input class="submit" type="submit" name="Submit" value="POSTER">
		        
		    </form>
		





    </body>
</html>