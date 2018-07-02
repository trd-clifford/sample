<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Update_RemindStatus</title>
<style>
input { width: 400px; }
</style>
</head>
<body>
<h1>Update_RemindStatus</h1>
<form action="/api/update" method="post" enctype="multipart/form-data">
	{{ csrf_field() }}
	<table>
		<tr>
			<td>ctl</td>
			<td><input type="text" name="ctl" value="RemindStatusController"></td>
		</tr>
	</table>
	<hr>
	<table>
		<tr>
			<td>p[0][id]</td>
			<td><input type="text" name="p[0][id]" value="2"></td>
		</tr>
		<tr>
			<td>p[0][title]</td>
			<td><input type="text" name="p[0][title]" value=""></td>
		</tr>
		<tr>
			<td>p[0][sort]</td>
			<td><input type="text" name="p[0][sort]" value=""></td>
		</tr>

	</table>
	<hr>

	<input type="submit">
</form>
</body>
</html>