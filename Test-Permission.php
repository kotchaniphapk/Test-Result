<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<?php
	$roleList = [
		['role_id' => 1, 'role_name' => 'Sales'], 
		['role_id' => 2, 'role_name' => 'Accountant'], 
		['role_id' => 3, 'role_name' => 'Programmer'], 
	];

	$menuList = [
		['menu_id' => 1, 'menu_name' => 'Order'], 
		['menu_id' => 2, 'menu_name' => 'Accounting'], 
		['menu_id' => 3, 'menu_name' => 'User'], 
		['menu_id' => 4, 'menu_name' => 'Setting'], 
	];

	$permissionList = [
		['permission_id' => 1, 'permission_name' => 'Full Control'], 
		['permission_id' => 2, 'permission_name' => 'View'], 
		['permission_id' => 3, 'permission_name' => 'Add'], 
		['permission_id' => 4, 'permission_name' => 'Edit'], 
		['permission_id' => 5, 'permission_name' => 'Export PDF'], 
		['permission_id' => 6, 'permission_name' => 'Export Excel']
	];

	$mockupData = null; // you will need to assign values to this variable according to your database table design.
?>

<div class="container">

	<br/><br/>

	$mockupData = null; // you will need to assign values to this variable according to your database table design.<br/>

	<br/>

	<ol>
		<li>Use the provided PHP array variables above to render a permission table exactly like the "Expected Result" below.</li>
		<li>If have Full Control then automatically can View, Add, Edit, Export PDF and Export Excel</li>
		<li>If can View, Add, Edit, Export PDF and Export Excel then automatically have Full Control</li>
		<li>If can Add then automatically can View</li>
		<li>If can Edit then automatically can View</li>
		<li>If can Export PDF then automatically can View</li>
		<li>If can Export Excel then automatically can View</li>
		<li>Write Javascript to prepare data to save after clicking the button "Save" do not need to post it to Server</li>
		<li>Design a database table to store values that you think it can be used to render the "Expected Result".</li>
		<li>Mockup the data in $mockupData according to your database table and use it to render your table to look exactly like the "Expected Result" below.</li>
	<ol>

	<br/>
	<h2>Expected Result</h2>
	<img src="expected-result.jpg" width="" />

	<br/>
	<br/>
	<br/>
	<h1>Start here</h1>

	<table class="table">
		<thead>
			<tr>
				<td style="text-align: center; width: 200px;">Role</td>
				<td style="text-align: center;">Menu</td>
				<td>permission1</td> <!-- to modify using $permissionList -->
				<td>permission2</td> <!-- to modify using $permissionList -->
				<td>permission3</td> <!-- to modify using $permissionList -->
				<td>permission4</td> <!-- to modify using $permissionList -->
				<td>permission5</td> <!-- to modify using $permissionList -->
				<td>permission16</td> <!-- to modify using $permissionList -->
			</tr>
		</thead>
		<tbody></tbody>
	</table>

	<input type="button" class="btn btn-primary" value="Save" id="saveBtn"><br/><br/>

	<h2>Database table for permissions</h2>

	<table class="table">
		<thead>
			<tr>
				<td>Column1</td> <!-- Create your own column name -->
				<td>Column2</td> <!-- Create your own column name -->
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>data1</td> <!-- Create your own data -->
				<td>data2</td> <!-- Create your own data -->
			</tr>
		</tbody>
	</table>

<div>

<script>

	$(document).ready(function(){


		$('#saveBtn').click(function(){

			var jsonData = "";


			console.log(jsonData);

		});

	});

</script>