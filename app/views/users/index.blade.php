<!-- app/view/users/index.blade.php -->

<html>
<head>
	<meta charset="utf-8">
	<title>Welcome to Eskwelahan v0.0.1</title>
</head>

<body>

<!-- para sa login pagka unya---->
<section class="container">	
	<div class="login">
		Login:<br />
		<p><input type="text" name="login" value="" placeholder="Username"></p>
		<p><input type="password" name="password" value="" placeholder="password"></p>
		<p class="submit"><input type="submit" name="loginNow" value="Login"></p>
	</div>
</section>
<!----    ---->

<div class="container">
<h1>CREATE AN ACCOUNT</h1>
	<a href="{{URL:to('users/create')}}"> CREATE ACCOUNT!!</a>
</div>
		
</body>
</html>