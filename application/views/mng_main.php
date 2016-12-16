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

    <?php $this->load->view('/parts/it_header');?>
    

            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <?php echo $output; ?>
                    </div>
                </div>
            </div>


        
</body>
</html>