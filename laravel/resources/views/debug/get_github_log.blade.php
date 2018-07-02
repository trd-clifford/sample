<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Get_GithubLog</title>
<style>
input { width: 700px; }
</style>
</head>
<body>
<h1>Get_GithubLog</h1>
<form action="/api/get" method="post" enctype="multipart/form-data">
	{{ csrf_field() }}
	<table>
		<tr>
			<td>ctl</td>
			<td><input type="text" name="ctl" value="GithubLogController"></td>
		</tr>
		<tr>
			<td>where_in[id]</td>
			<td><input type="text" name="where_in[id]" value="6,7"></td>
		</tr>
		<tr>
			<td>where[id]</td>
			<td><input type="text" name="where[id]" value="<>, 1"></td>
		</tr>
		<tr>
			<td>order[created_at]</td>
			<td><input type="text" name="order[created_at]" value="desc"></td>
		</tr>
		<tr>
			<td>offset</td>
			<td><input type="text" name="offset" value="0"></td>
		</tr>
		<tr>
			<td>limit</td>
			<td><input type="text" name="limit" value="20"></td>
		</tr>
	</table>
	<input type="submit">
</form>
</body>
</html>