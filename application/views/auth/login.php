<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>Modal Ajax Login Form</title>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>

<script type="text/javascript" src="javascript/jquery.simplemodal.js"></script>
<script type="text/javascript" src="javascript/init.js"></script>

<link type='text/css' href='style/stylesheet.css' rel='stylesheet' media='screen' />

<link type='text/css' href='style/basic.css' rel='stylesheet' media='screen' />

</head>

<body>

Click the login link to launch the modal box:<br />

<span style="font-size: 15px;">
<a id="login_link" href="#">LOGIN</a> | MEMBERS AREA</a>

</span>


<div id="login_form" style='display:none'>

<div id="status" align="left" style="margin-top: 20px; width: 310px;">

<center><h1><img src="images/key.png" align="absmiddle">&nbsp;LOGIN</h1>

<div id="login_response"><!-- spanner --></div> </center>

<form id="login" action="javascript:alert('success!');">
<input type="hidden" name="action" value="user_login">
<input type="hidden" name="module" value="login">

<label>E-Mail</label><input type="text" name="email"><br />  
<label>Password</label><input type="password" name="password"><br />  

<label>&nbsp;</label><input value="Login" name="Login" id="submit" class="big" type="submit" />

<div id="ajax_loading">
<img align="absmiddle" src="images/spinner.gif">&nbsp;Processing...
</div>

</form>

 </div>

</div>

</body>
</html>