<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<table>
		<tr><td>Cher {{ $name }}</td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>Veuillez cliquer sur le lien ci-dessous pour activer votre compte loukaawa :</td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td><a href="{{ url('/user/confirm/'.$code) }}">Confirmer le compte</a></td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>&nbsp;</td></tr>
		<tr><td>Merci & Cordialement,</td></tr>
		<tr><td>loukaawa</td></tr>
	</table>
</body>
</html>
