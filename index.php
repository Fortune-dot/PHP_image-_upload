
<!DOCTYPE html>
<html>
<head>
  <title>Multiple image Upload in PHP😋😋🚀🚀</title>
</head>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
<style type="text/css">
	*{
		font-family: sans-serif;
	}
	
</style>
<body class="bg-dark">
	  <div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-5 bg-light mt-4 px-4 p-2 rounded">
			   <h2 class="text-center text-info pb-2">Multiple image Upload in PHP😋😋🚀🚀</h2>
			   <form action="" method="POST" enctype="multipart/form-data" id="image_upload">
			   	<div class="form-group">
			   		<div class="custom-file">
			   			<input type="file" name="images[]" 
			   			class="custom-file-input" id="image" multiple>
			   			<label for="image" class="custom-file-label">		Choose Image
			   			</label>
			   		</div>
			   	</div>
			   	<div class="form-group">
			   		<input type="submit" name="submit" class="btn btn-info btn-block" value="UPLOAD ">
			   	</div>
			   	<h5 class="text-center text-success" id="result"> </h5>
			   </form>	
			</div>
		</div>
         <div class="row justify-content-center">
         	<div class="col-lg-10 mt-4">
         		<div class="row p-2" id="images_preview">
                 <!--Images will be displayed dynamically here-->
         		</div>
         	</div>
         </div>
	 </div>
<script type="text/javascript" src="bootstrap/js/jquery-3.4.0.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
        $("#image").on('change',function(){
          var filename = $(this).val();
          $(".custom-file-label").html(filename);
        });
        $("#image_upload").submit(function(e){
        	e.preventDefault();
        	$.ajax({
                url:'insert.php',
                method:'post',
                processData:false,
                contentType:false,
                cache:false,
                data: new FormData(this),
                success:function(response){
                	$("#result").html(response);
                    load_images();
                }
        	});
        });
        load_images();
        function load_images(){
        	$.ajax({
        		url:'load.php',
        		method:'get',
        		success:function(data){
                   $("#images_preview").html(data);
        		}
        	});
        }
	});
</script>
</body>
</html>