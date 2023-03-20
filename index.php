<?php

	require 'vendor/autoload.php';

	use thiagoalessio\TesseractOCR\TesseractOCR;

	$message = '';
	$read_file ='';

	if($_SERVER['REQUEST_METHOD']=='POST'){

		if(isset($_FILES['file_upload'])){

			$file_name = $_FILES['file_upload']['name'];
			$tmp_name = $_FILES['file_upload']['tmp_name'];

			$new_file_name = date('dmY')."_".time()."_".strtolower($file_name);

			if(move_uploaded_file($tmp_name, 'uploads/'.$new_file_name)){

				$message = "File Uploaded Successfully";

				try{

					$read_file = (new TesseractOCR('uploads/'.$new_file_name))
								->setLanguage('eng')
								->run();
				}
				catch(Exception $e){

					$message = $e->getMessage();
				}

			}
			else{
				$message = "File Not Uploaded Successfully";
			}
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Simple Optical Carecter Reader(OCR)</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
	<div class="container mt-12">
		<div class="row mt-12" >
			<div class="col-sm-12 max-auto">
				<div class="jumbotorn">
					<h1 class="display-4">Upload Simple File</h1>
					<p class="lead">
						<?php echo $read_file;?>
					</p>
					<hr class="my-4" />
				</div>
			</div>
		</div>
		<div class="row col-sm-12 max-auto" >
			<div class="card mt-12">
				<div class="card-body">
					<form method="post" action="" enctype="multipart/form-data">
						<div class="form-group">
							<label for="file_upload">Choose Upload File</label>
							<input type="file" id="file_upload" name="file_upload" class="form-control-file" />
							<button class="btn btn-success">Upload File</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<p>
			<?php echo $message;?>
		</p>
	</div>
	<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
</body>
</html>