<?php

include 'config.php';

$data = json_decode(file_get_contents("php://input"));

## Values
$search = mysqli_real_escape_string($con,$data->searchText);	// Search value
$sortColumn = $data->sortColumn;	// Sort Column name
$sortOrder = $data->sortOrder; // Boolean value

$sortBy = "asc";
if($sortOrder){
	$sortBy = "desc";
}

## Select query
$select_stu = "select * from student where 1 ";

if($search != ''){
	$select_stu .= " and (name like '%".$search."%' OR 
		regno like '%".$search."%' OR
		phone like '%".$search."%' OR
		email like '%".$search."%')";
}

$select_stu .= " order by ".$sortColumn." ".$sortBy;

## Fetch records
$fetchRecords = mysqli_query($con,$select_emp);
$data = array();

while ($row = mysqli_fetch_array($fetchRecords)) {
	$data[] = array("name" => $row['name'],
	    "regno" => $row['regno'],
	    "dob" => $row['dob'],
	    "address" => $row['address'],
	    "department" => $row['department'],
"yoa" => $row['yoa'],
"phone" => $row['phone'],
"email" => $row['email']
	);
}

echo json_encode($data);
