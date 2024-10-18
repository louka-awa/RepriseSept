<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<tr><td>Cher/Chère {{ $name }} !</td></tr>
	<tr><td>&nbsp;<br></td></tr>
	<tr><td>Veuillez cliquer sur le lien ci-dessous pour confirmer votre compte vendeur :</td></tr>
	<tr><td><a href="{{ url('vendor/confirm/'.$code) }}">{{ url('vendor/confirm/'.$code) }}</a></td></tr>
	<tr><td>&nbsp;<br></td></tr>
	<tr><td>Merci et cordialement,</td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr><td>loukaawa</td></tr>
</body>
</html>
