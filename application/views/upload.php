<html>
<head>
<style type="text/css">
	.top-buffer { margin-top:20px; }
</style>

<title>upload</title>


    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/lightbox/css/lightbox.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/superhero/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
</head>
<body>
<!-- <?php echo $error;?> -->
<form class="form-horizontal" action="/requests/do_upload" method="POST" enctype="multipart/form-data" >

<div class="col-md-4 offset-md-4" style="background-color: #EEEEEE">

<div class="form-group top-buffer">
  <label class="col-md-4 control-label" for="tmc">Наименование ТМЦ</label>  
  <div class="col-md-6">
  <input id="tmc" name="tmc" type="text" placeholder="" class="form-control input-md">
  </div>
</div>

<div class="form-group top-buffer">
  <label class="col-md-4 control-label" for="fio">ФИО</label>  
  <div class="col-md-6">
  <input id="fio" name="fio" type="text" placeholder="" class="form-control input-md">
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="tel">Телефон</label>  
  <div class="col-md-6">
  <input id="tel" name="tel" type="text" placeholder="" class="form-control input-md">
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="nameinput">Прикрепить скан:</label>  
  <div class="col-lg-8 col-sm-8 col-12">
	<div class="input-group">
	  <label class="input-group-btn">
		<span class="btn btn-primary">
		Файл&hellip; <input type="file" name="userfile" style="display: none;">
		</span>
      </label>
   	  <input type="text" class="form-control" readonly>
    </div>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="button1id"></label>
  <div class="col-md-8">
    <input type="submit" name="upload" value="Отправить" class="btn btn-success" />
  </div>
</div>

	
</fieldset>
</form>
</body>
</html>
<script type="text/javascript">
	$(function() {

  // We can attach the `fileselect` event to all file inputs on the page
  $(document).on('change', ':file', function() {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
  });

  // We can watch for our custom `fileselect` event like this
  $(document).ready( function() {
      $(':file').on('fileselect', function(event, numFiles, label) {

          var input = $(this).parents('.input-group').find(':text'),
              log = numFiles > 1 ? numFiles + ' files selected' : label;

          if( input.length ) {
              input.val(log);
          } else {
              if( log ) alert(log);
          }

      });
  });
  
});
</script>