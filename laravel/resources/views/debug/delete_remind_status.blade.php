<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Delete_RemindStatus</title>
<style>
input { width: 500px; }
</style>
</head>
<body>
<h1>Delete_RemindStatus</h1>
<form action="/api/delete" method="post" enctype="multipart/form-data">
	{{ csrf_field() }}
	<table>
		<tr>
			<td>ctl</td>
			<td><input type="text" name="ctl" value="RemindStatusController"></td>
		</tr>
		<tr>
			<td>id</td>
			<td><input type="text" name="id" value="2,3"></td>
		</tr>
	</table>
	<input type="submit">
</form>
</body>
</html>