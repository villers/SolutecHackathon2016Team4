<!DOCTYPE html>
<html>
<head>
	<title>Laravel</title>
</head>
<body>
	<form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ url('/upload') }}">
		{!! csrf_field() !!}
		<div class="form-group">
			<label class="col-md-4 control-label">Upload</label>
			<div class="col-md-6">
				<input type="text" name="base64">
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-6 col-md-offset-4">
				<button type="submit" class="btn btn-primary">
					<i class="fa fa-btn fa-user"></i>Add
				</button>
			</div>
		</div>
	</form>
</body>
</html>
