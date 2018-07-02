<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Update_WarnigManage</title>
<style>
input { width: 400px; }
</style>
</head>
<body>
<h1>Update_WarnigManage</h1>
<form action="/api/update" method="post" enctype="multipart/form-data">
	{{ csrf_field() }}
	<table>
		<tr>
			<td>ctl</td>
			<td><input type="text" name="ctl" value="WarningManageController"></td>
		</tr>
	</table>
	<hr>
	<table>
		<tr>
			<td>p[0][id]</td>
			<td><input type="text" name="p[0][id]" value="2"></td>
		</tr>
		<tr>
			<td>p[0][from_user_id]</td>
			<td><input type="text" name="p[0][from_user_id]" value=""></td>
		</tr>
		<tr>
			<td>p[0][to_user_id]</td>
			<td><input type="text" name="p[0][to_user_id]" value=""></td>
		</tr>
		<tr>
			<td>p[0][title]</td>
			<td><input type="text" name="p[0][title]" value=""></td>
		</tr>
		<tr>
			<td>p[0][memo]</td>
			<td><input type="text" name="p[0][memo]" value=""></td>
		</tr>
		<tr>
			<td>p[0][status]</td>
			<td><input type="text" name="p[0][status]" value=""></td>
		</tr>
		<tr>
			<td>p[0][log]</td>
			<td><input type="text" name="p[0][log]" value=""></td>
		</tr>

	</table>
	<hr>

	<input type="submit">
</form>
</body>
</html>