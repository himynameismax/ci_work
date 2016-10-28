<!DOCTYPE html>
<html>
<head>
<title>sup</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
</head>
<body>

<p><label for='album'>Select printer: </label>
<select name='id' id='id'>
<?php if (count($it_printers)) {
    foreach ($it_printers as $list) {
        "<option value='". $list['prn_id']."'>'".$list['prn_name']."'</option>";
    }
}
?>
</select><br/>

</body>
</html>