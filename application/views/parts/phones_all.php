<!DOCTYPE html>
<html lang="en">
<head>
<title>Телефонный справочник ТД НКМЗ</title>
<?php 
foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
 
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
 
    <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>

	<?php $this->load->view('/parts/main_header');?>
	<?php $this->load->view('parts/phones_sidebar'); ?>
<br>
<br>
<br>
            <div class="col-md-9 col-md-offset-3 content">
                        <?php echo $output; ?>
            </div>


		
</body>
</html>