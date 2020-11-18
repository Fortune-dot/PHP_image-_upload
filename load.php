<?php 

    $conn = new mysqli("localhost","root","","multi_images");
   
	$sql = "SELECT * FROM images ORDER BY id DESC";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$result = $stmt->get_result();
	$data = '';
	while ($row = $result->fetch_assoc()) {
		$data .= '<div class="col-lg-4">
			<div class="card-group">
				<div class="card mb-3">
					<a href="'.$row['image_path'].'">
						<img src="'.$row['image_path'].'" 
						class="card-img-top img-fluid" height="150">
					</a>
				</div>
			</div>
		</div>';
	}

 echo $data;

 ?>