<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
</head>
<body>

<div class='form-content form-div'>
<select id="prn" name="inputInfo" >
    <?php
		foreach($data as $each)
			{
    		?>
    		<option value="<?=$each['name']?>"><?=$each['name']?></option>
    <?php
}
?>
</select>

<?php echo $name; ?>
</div>
    <div style='height:20px; margin-top: 50px'></div>  
    <div>
    </div>
</body>
</html>