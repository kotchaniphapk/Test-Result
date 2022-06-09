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

	<table class="table">
		<thead>
			<tr>
				<td style="text-align: center; width: 200px;">Role</td>
				<td style="text-align: center;">Menu</td>
				<?php
				    foreach ($permissionList as $permission) {
						echo "<td>$permission[permission_name]</td>";
					}
				?>
			</tr>		
		</thead>
		<tbody>
			<?php

				foreach ($roleList as $role){
					echo "
						<tr> 
						<th>$role[role_name]<th>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						</tr>";

					foreach ($menuList as $menu) {
						echo "
						<tr>
							<td></td>
							<td>$menu[menu_name]</td>
							<td><input type=\"checkbox\" class=\"check_lang\" id=\"fullcheck-$role[role_id]-$menu[menu_id]\"></td>
							<td><input type=\"checkbox\" class=\"check_lang\" id=\"view-$role[role_id]-$menu[menu_id]\"></td>
							<td><input type=\"checkbox\" class=\"check_lang\" id=\"add-$role[role_id]-$menu[menu_id]\"></td>
							<td><input type=\"checkbox\" class=\"check_lang\" id=\"edit-$role[role_id]-$menu[menu_id]\" ></td>
							<td><input type=\"checkbox\" class=\"check_lang\" id=\"exportP-$role[role_id]-$menu[menu_id]\"></td>
							<td><input type=\"checkbox\" class=\"check_lang\" id=\"exportE-$role[role_id]-$menu[menu_id]\"></td>
						</tr>";
						
					}
				}
			
			?>
					
		</tbody>
	</table>

	<input type="button" class="btn btn-primary" value="Save" id="saveBtn"><br/><br/>

<!--	<h2>Database table for permissions</h2>
	<p1><strong>Id</strong>- unique key<br></p1>
	<p2><strong>user_Id</strong>-referent-User<br></p2>
	<p3><strong>role_name</strong> -string/json<br></p3>
	<p4><strong>permissions</strong> -string/json<br>
	default :<br>
		{
  	“order”: [“”],<br>
  	“accounting”: [“”],<br>
  	“user”: [“”],<br>
  	“setting”: [“”, “”],<br>
	}
	</p4>	-->
	<table class="table">
		<thead>
			<tr>
				<th>Id</th> 
				<th>user_Id</th>
				<th>role_name</th>
				<th>permission</th>
		</thead>
		<tbody>
			<tr>
				<td>1</td> 
				<td>21</td>
				<td>Sales</td>
				<td> {
					“order”: [“fullcheck”],<br>
					“accounting”: [“add”],<br>
					“user”: [“edit”],<br>
					“setting”: [“exportP”],<br>
					}</td>
			</tr>
			<tr>
				<td>2</td> 
				<td>21</td>
				<td>Accountant</td>
				<td> {
					“order”: ["exportE"],<br>
					“accounting”: [],<br>
					“user”: [],<br>
					“setting”: [],<br>
					}</td>
			</tr>
		</tbody>
	</table>

<div>

<script>
	$(document).ready(function() {
		
		function viewCheckClicked(roleId, menuId, checked){
			console.log("view checked role id " + roleId + " and menu id " + menuId );
			if ($("#add-"+roleId + "-" + menuId).is(":checked")
				&& $("#edit-"+roleId + "-" + menuId).is(":checked")
				&& $("#exportP-"+roleId + "-" + menuId).is(":checked") 
				&& $("#exportE-"+roleId + "-" + menuId).is(":checked")
				&& checked
			){
				$("#fullcheck-"+roleId + "-" + menuId).prop("checked", true)	
			} 
			else { 
				$("#fullcheck-"+roleId + "-" + menuId).prop("checked",false)
			}
		}

		function addCheckClicked(roleId, menuId, checked) {
			console.log("add checked role id " + roleId + " and menu id " + menuId );
			if ($("#view-"+roleId + "-" + menuId).is(":checked")
				&& $("#edit-"+roleId + "-" + menuId).is(":checked")
				&& $("#exportP-"+roleId + "-" + menuId).is(":checked") 
				&& $("#exportE-"+roleId + "-" + menuId).is(":checked")
				&& checked
				){	
				$("#fullcheck-"+roleId + "-" + menuId).prop("checked", true)
			}
			else { 
				$("#fullcheck-"+roleId + "-" + menuId).prop("checked",false)
			}

			if (checked) {
				$("#view-"+roleId + "-" + menuId).prop("checked", true)
			}
			
		}

		function editCheckClicked(roleId, menuId,checked) {
			console.log("edit checked role id " + roleId + " and menu id " + menuId );
			if ($("#view-"+roleId + "-" + menuId).is(":checked")
				&& $("#add-"+roleId + "-" + menuId).is(":checked")
				&& $("#exportP-"+roleId + "-" + menuId).is(":checked") 
				&& $("#exportE-"+roleId + "-" + menuId).is(":checked")
				&& checked
				){	
				$("#fullcheck-"+roleId + "-" + menuId).prop("checked", true)	
			}
			else { 
				$("#fullcheck-"+roleId + "-" + menuId).prop("checked",false)
			}

			if (checked) {
				$("#view-"+roleId + "-" + menuId).prop("checked", true) 
			}

		}

		function exportPCheckClicked(roleId, menuId, checked) {
			console.log("exportPDF checked role id " + roleId + " and menu id " + menuId );
			if ($("#view-"+roleId + "-" + menuId).is(":checked")
				&& $("#add-"+roleId + "-" + menuId).is(":checked")
				&& $("#edit-"+roleId + "-" + menuId).is(":checked") 
				&& $("#exportE-"+roleId + "-" + menuId).is(":checked")
				&& checked
				){	
				$("#fullcheck-"+roleId + "-" + menuId).prop("checked", true)
			}
			else { 
				$("#fullcheck-"+roleId + "-" + menuId).prop("checked",false)
			}
			if (checked) {
				$("#view-"+roleId + "-" + menuId).prop("checked", true)
			}	
		}

		function exportECheckClicked(roleId, menuId, checked) {
			console.log("exportExcel checked role id " + roleId + " and menu id " + menuId );
			if ($("#view-"+roleId + "-" + menuId).is(":checked")
				&& $("#add-"+roleId + "-" + menuId).is(":checked")
				&& $("#edit-"+roleId + "-" + menuId).is(":checked") 
				&& $("#exportP-"+roleId + "-" + menuId).is(":checked")
				&& checked 
				){	
				$("#fullcheck-"+roleId + "-" + menuId).prop("checked", true)	
			}
			else { 
				$("#fullcheck-"+roleId + "-" + menuId).prop("checked",false)
			}
			if (checked) {
				$("#view-"+roleId + "-" + menuId).prop("checked", true)
			}
		}
		
		// if clicked fullcheck everything else get the same state and state can be checked or unchecked.  
		function fullCheckClicked(roleId, menuId, checked) {
			console.log("full checked role id " + roleId + " and menu id " + menuId );
			$("#view-"+roleId + "-" + menuId).prop('checked',checked); 
			$("#add-"+roleId + "-" + menuId).prop('checked', checked);
			$("#edit-"+roleId + "-" + menuId).prop('checked', checked)
			$("#exportP-"+roleId + "-" + menuId).prop('checked', checked);
			$("#exportE-"+roleId + "-" + menuId).prop('checked', checked);	
		}

		$('input.check_lang').each(function() {
			var inputId = $(this).attr("id"); // /input ID ,use attr to return id 

			 if (inputId.indexOf("fullcheck") > -1) { // find full check inputId  ,if a fullcheck input has been found
				$("#" + inputId).click(function() {
					var id = $(this).attr("id"); //element has been clicked get id from element, fullcheck-1-1
					var rowDetails = id.split("-"); // ['fullcheck', '1', '1'];
					fullCheckClicked(rowDetails[1], rowDetails[2],$(this).is(':checked'));// pass parameter
				});
			}
			
			if (inputId.indexOf("view") > -1) {
				$("#" + inputId).click(function() {
				var id =$(this).attr("id");
				var rowDetails= id.split("-");//
				viewCheckClicked(rowDetails[1], rowDetails[2],$(this).is(':checked'));		
				}) 
			
			}
			if (inputId.indexOf("add") > -1) {
				$("#" + inputId).click(function() {
				var id =$(this).attr("id");
				var rowDetails= id.split("-");//
				addCheckClicked(rowDetails[1], rowDetails[2],$(this).is(':checked'));		
				}) 
			
			}
			if (inputId.indexOf("edit") > -1) {
				$("#" + inputId).click(function() {
				var id =$(this).attr("id");
				var rowDetails= id.split("-");//
				editCheckClicked(rowDetails[1], rowDetails[2],$(this).is(':checked'));		
				}) 
			
			}
			if (inputId.indexOf("exportP") > -1) {
				$("#" + inputId).click(function() {
				var id =$(this).attr("id");
				var rowDetails= id.split("-");//
				exportPCheckClicked(rowDetails[1], rowDetails[2],$(this).is(':checked'));		
				}) 
			
			}
			if (inputId.indexOf("exportE") > -1) {
				$("#" + inputId).click(function() {
				var id =$(this).attr("id");
				var rowDetails= id.split("-");//
				exportECheckClicked(rowDetails[1], rowDetails[2],$(this).is(':checked'));		
				}) 
			
			}
		});
		

		
	});

//Write Javascript to prepare data to save after clicking the button "Save" do not need to post it to Server
var permissions = {
			"1": {
				"1": ["fullcheck"],
				"2": ["add"],
				"3": ["edit"],
				"4": ["exportP"],
			}, 
			"2": {
				"1": ["exportE"],
				"2": [],
				"3": [],
				"4": [],
			},
			"3": {
				"1": [],
				"2": [],
				"3": [],
				"4": [],
			},
		}

		$('#saveBtn').click(function(){
			var jsonData = "";
			console.log(jsonData);
		});







</script>