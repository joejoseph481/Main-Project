<?php
   $title=$_POST['posttitle'];
	 $category=$_POST['category'];
	  $subcategory=$_POST['subcategory'];
   $date=$_POST['date'];
	   $postimage=$_POST['PostImage'];
	
	   $postdetails=$_POST['postdetails'];
	   ?><!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" src="stylesheet.css">
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script>
			$(document).ready(function() {
				print();
			});
		</script>
	</head>
	<body>
		<div id="main">
	

		<h1 id="name"><?php echo $title;?></h1>
		</div>
			
		
			
		<div class="table">
		<h2 id="heading"></h2>
			
				<p>Category : <?php echo "$category"?> | Sub Category : <?php echo "$subcategory" ?> | Posted On: <?php $date ?>  
				
				 </p>
				
		</div>
		
		</div>
		
		<div class="table" >
	
				
					
					
		
					
					<tr>
						<td><img  width="50%" align="center" src="admin/postimages/<?php echo $postimage ?>"</td>
						
					</tr>
					
					
				</table>
		</div>		
		
		
			   
			   
			
		<div class="table">
		<tr>
		<td><p><?php echo $postdetails ?></p></td>
						
					</tr>
					
					
				</table>
				
		</div>
		
			
	</body>
</html>	
	