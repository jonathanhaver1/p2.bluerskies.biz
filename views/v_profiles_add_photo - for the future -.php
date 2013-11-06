<form action="/images/p_add_photo/<?=$profile_id?>" method="post" enctype="multipart/form-data" style = "margin-top: 200px">

	<fieldset>

		<legend>Image Upload</legend>
		<label for="imageFile">Small image to upload: </label>
		<input type="file" size="50" name="imageFile" id="imageFile"/><br><br>

		<input type="submit" value="Upload File" />

	</fieldset>

</form>