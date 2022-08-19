<html>
<head>
	<title>test</title>
</head>
<body>

    <form method="POST" action="<?= base_url('TestUpload/aksi_upload/'); ?>" enctype="multipart/form-data">
 
	<input type="file" name="berkas" />
 
	<br /><br />
 
	<input type="submit" value="upload" />
 
</form>
 
</body>
</html>