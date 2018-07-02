<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Update_GithubLog</title>
<style>
input { width: 400px; }
</style>
</head>
<body>
<h1>Update_GithubLog</h1>
<form action="/api/update" method="post" enctype="multipart/form-data">
	{{ csrf_field() }}
	<table>
		<tr>
			<td>ctl</td>
			<td><input type="text" name="ctl" value="GithubLogController"></td>
		</tr>
	</table>
	<hr>
	<table>
		<tr>
			<td>p[0][id]</td>
			<td><input type="text" name="p[0][id]" value="2"></td>
		</tr>
		<tr>
			<td>p[0][recoded]</td>
			<td><input type="text" name="p[0][recoded]" value=""></td>
		</tr>
		<tr>
			<td>p[0][repository_owner]</td>
			<td><input type="text" name="p[0][repository_owner]" value=""></td>
		</tr>
		<tr>
			<td>p[0][repository_name]</td>
			<td><input type="text" name="p[0][repository_name]" value=""></td>
		</tr>
		<tr>
			<td>p[0][issue_id]</td>
			<td><input type="text" name="p[0][issue_id]" value=""></td>
		</tr>
		<tr>
			<td>p[0][issue_url]</td>
			<td><input type="text" name="p[0][issue_url]" value=""></td>
		</tr>
		<tr>
			<td>p[0][assignees]</td>
			<td><input type="text" name="p[0][assignees]" value=""></td>
		</tr>
		<tr>
			<td>p[0][labels]</td>
			<td><input type="text" name="p[0][labels]" value=""></td>
		</tr>
	</table>
	<hr>

	<input type="submit">
</form>
</body>
</html>