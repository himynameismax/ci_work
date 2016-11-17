<!DOCTYPE html>
<html lang="en">
<head>
<title>Управление компаниями</title>
<?php 
foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
 
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
 
    <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>

	<?php $this->load->view('/parts/main_header');?>
            <div class="container">
                
                        <?php echo $output; ?>
            </div>


		
</body>
</html>