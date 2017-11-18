<?php



            if(isset($_POST['submit'])){
                $uploaderror='';
                            $target_dir = "uploads/";
                            $target_music_file = $target_dir . basename($_FILES["userfile"]["name"]);
							$musicUploadOk = 1;
                            //$file_size = $_FILES['userfile']['size'];
                            $file_name = $_FILES['userfile']['name'];
                            $temp_dir = $_FILES["userfile"]["tmp_name"];
                            $ext_str = "mp3,mp4,wav";
                            $ext = substr($file_name, strrpos($file_name, '.') + 1);
                            $allowed_extensions=explode(',',$ext_str);
							$musicFileType = pathinfo($target_music_file,PATHINFO_EXTENSION);
							
							
							
							if($musicFileType == "mp3" || $musicFileType == "mp4" || $musicFileType == "wav"
							) {
								
								$musicUploadOk = 1;
							} else {
								
								$musicUploadOk = 0;
							}
							
							if ($_FILES["userfile"]["size"] > 50000000000) {
							echo "Sorry, your file is too large.";
							$musicUploadOk = 0;
							}
							
							if ($musicUploadOk == 0) {
								echo "Sorry, only MP3, MP4, WAV files are allowed.";
							} else{
								
								if (move_uploaded_file($temp_dir, $target_music_file)){

								 echo "The file ". basename( $_FILES["userfile"]["name"]). " has been uploaded.";
								}
								else {
									echo "Sorry, there was an error uploading your file.";
								}
								
							}
							
							
						


                            

                        //
						
						
						$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
						$uploadOk = 1;
						$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
						// Check if image file is a actual image or fake image
						if(isset($_POST["submit"])) {
							$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
							if($check !== false) {
								echo "File is an image - " . $check["mime"] . ".";
								$uploadOk = 1;
							} else {
								echo "File is not an image.";
								$uploadOk = 0;
							}

						}
						// Check if file already exists
						if (file_exists($target_file)) {
							echo "Sorry, file already exists.";
							$uploadOk = 0;
						}
						// Check file size
						if ($_FILES["fileToUpload"]["size"] > 50000000) {
							echo "Sorry, your file is too large.";
							$uploadOk = 0;
						}
						// Allow certain file formats
						if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
						&& $imageFileType != "gif" ) {
							echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
							$uploadOk = 0;
						}
						// Check if $uploadOk is set to 0 by an error
						if ($uploadOk == 0) {
							echo "Sorry, your file was not uploaded.";
						// if everything is ok, try to upload file
						} else {
							if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
								echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
							} else {
								echo "Sorry, there was an error uploading your file.";
							}
						}
									
									
									
									
			}

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="LargerScreens1024.css">
    <link rel="stylesheet" href="MediumScreen769And1023.css">
    <link rel="stylesheet" href="SmallScreen768version2.css">
    <link rel="stylesheet" href="SmallScreen768version2device.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>

<body>

<form class="form-horizontal form-label-left" method="post" action="" enctype="multipart/form-data" role="form">

	 Select image to upload:<br>
    <input type="file" name="fileToUpload" id="fileToUpload"><br>

                 <br>
				 
				 <div class="UploadNewSongAreaTitle">
			<div class="GroupsInformation-Title">
				Title:<br/>
				<textarea maxlength="50" name="TitleSongSample" placeholder="Place your title here.."><?php if(isset($TitleSongSample)){echo $TitleSongSample; }?></textarea>
			</div><br>

		</div>
		
		

             <label for="fullname">Upload Music</label><br>
                  <input type="file" class="form-control" name="userfile" id="userfile" />

                 <br>
                  <div class="ln_solid"></div>
                  <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
					
					
					<br>Is this a song or sample?
							<div class="checkbox">
							  <label><input type="radio" value="1" name="music_check" checked>Music</label>
							  <label><input type="radio" value="0" name="music_check">Sample</label>
							</div><br>
							
							
							
					
					<span class='music_global_upload_title_style'>
						Genre(s)
					</span>

					<table style="left: 0; right: 0; margin: 0 auto;">
						<tr>
							<td class="td_style_global"><input class="input_checkbox_style_music_global_create" type="checkbox" name="g_pop" value="1"><span class="categories_label_music_global_uploading">Pop</span></td>
							<td class="td_style_global"><input class="input_checkbox_style_music_global_create" type="checkbox" name="g_rnb" value="1"><span class="categories_label_music_global_uploading">RNB</span></td>
							<td class="td_style_global"><input class="input_checkbox_style_music_global_create" type="checkbox" name="g_rock" value="1"><span class="categories_label_music_global_uploading">Rock</span></td>
						</tr>
							<td class="td_style_global"><input class="input_checkbox_style_music_global_create" type="checkbox" name="g_punk" value="1"><span class="categories_label_music_global_uploading">Punk</span></td>
							<td class="td_style_global"><input class="input_checkbox_style_music_global_create" type="checkbox" name="g_jazz" value="1"><span class="categories_label_music_global_uploading">Jazz</span></td>
							<td class="td_style_global"><input class="input_checkbox_style_music_global_create" type="checkbox" name="g_metal" value="1"><span class="categories_label_music_global_uploading">Metal</span></td>
						</tr>
						<tr>
							<td class="td_style_global"><input class="input_checkbox_style_music_global_create" type="checkbox" name="g_funk" value="1"><span class="categories_label_music_global_uploading">Funk</span></td>
							<td class="td_style_global"><input class="input_checkbox_style_music_global_create" type="checkbox" name="g_country" value="1"><span class="categories_label_music_global_uploading">Country</span></td>
							<td class="td_style_global"><input class="input_checkbox_style_music_global_create" type="checkbox" name="g_edm" value="1"><span class="categories_label_music_global_uploading">EDM</span></td>
						</tr>
						<tr>
							<td class="td_style_global"><input class="input_checkbox_style_music_global_create" type="checkbox" name="g_classical" value="1"><span class="categories_label_music_global_uploading">Classical</span></td>
						</tr>
					<table>
					
					
					
					
					<span class='music_global_upload_title_style'>
						Instrument(s)
					</span>

					<table style="left: 0; right: 0; margin: 0 auto;">
						<tr>
							<td class="td_style_global"><input class="input_checkbox_style_music_global_create" type="checkbox" name="g_guitar" value="1"><span class="categories_label_music_global_uploading">Guitar</span></td>
							<td class="td_style_global"><input class="input_checkbox_style_music_global_create" type="checkbox" name="g_bass" value="1"><span class="categories_label_music_global_uploading">Bass</span></td>
							<td class="td_style_global"><input class="input_checkbox_style_music_global_create"type="checkbox" name="g_synth" value="1"><span class="categories_label_music_global_uploading">Synth</span></td>
						</tr>
						<tr>
							<td class="td_style_global"><input class="input_checkbox_style_music_global_create" type="checkbox" name="g_pads" value="1"><span class="categories_label_music_global_uploading">Pads</span></td>
							<td class="td_style_global"><input class="input_checkbox_style_music_global_create" type="checkbox" name="g_woodwind" value="1"><span class="categories_label_music_global_uploading">Woodwind</span></td>
							<td class="td_style_global"><input class="input_checkbox_style_music_global_create" type="checkbox" name="g_drums" value="1"><span class="categories_label_music_global_uploading">Drums</span></td>
						</tr>
						<tr>
							<td class="td_style_global"><input class="input_checkbox_style_music_global_create" type="checkbox" name="g_strings" value="1"><span class="categories_label_music_global_uploading">Strings</span></td>
							<td class="td_style_global"><input class="input_checkbox_style_music_global_create" type="checkbox" name="g_brass" value="1"><span class="categories_label_music_global_uploading">Brass</span></td>

						</tr>
					</table>
			
			
					
					
                      <button type="" class="btn btn-primary">Cancel</button><br>
					  
                     <button type="submit" class="btn btn-success" name="submit">Submit</button>
                    </div>
                  </div>
				  

                </form>
<!--
<form action="uploads.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
	
	
	
	
	
	
	
	
	
	
	
    <input type="submit" value="Upload Image" name="submit">
</form>
-->





</body>
</html>
