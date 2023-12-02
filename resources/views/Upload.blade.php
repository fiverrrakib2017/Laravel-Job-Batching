<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CSV File Upload</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>


<div class="container">
	<div class="row mt-5">
		<div class="col-md-7 m-auto">
			<div class="card" >
			  <div class="card-header bg-info text-white"><h4>Upload Your File</h4></div>
			  <div class="card-body">
			    <form action="{{route('upload')}}" method="POST" enctype="multipart/form-data">
			    	@csrf
			    	<div class="form-group mb-3">
			    		<input type="file" name="file" class="form-control">
			    	</div>
			    	<div class="form-group">
			    		<button type="submit" class="btn btn-success">Upload Now</button>
			    	</div>

			    </form>
			  </div>
			</div>
		</div>
	</div>
</div>
</body>
</html>