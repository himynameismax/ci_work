<html>
<head>
<title>Upload</title>
</head>
<body>

<h3>File upload successfully</h3>

<ul>
<?php foreach($upload_data as $item => $value):?>
<li><?php echo $item;?>: <?php echo $value;?></li>
<?php endforeach; ?>
</Tul>
<?php echo $files ?>
<p><?php echo anchor('/requests/do_upload', 'Upload more files!'); ?></p>

</body>
</html>