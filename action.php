<?php
use LDAP\Result;

$servername = "localhost";
$username = "root";
$password = "";
$database = "user_db";

//crate connection 
$connection = new mysqli($servername, $username, $password, $database);
//check connection 
if ($connection->connect_error) {
    die("Connection Failed : " . $connection->connect_error);
}
$output='';
if(isset($_POST['query'])){
	$search=$_POST['query'];
	$stmt=$connection->prepare("SELECT * FROM data_entry where size like 
	CONCAT('%',?,' %') OR rudraksha like CONCAT('%',?,' %')");
	$stmt->bind_param("ss",$search,$search);
}
else{
	$stmt=$connection->prepare("SELECT * FROM data_entry");
}
$stmt->execute();
$result=$stmt->get_result();

if($result->num_rows>0){
	$output="<thead>
            <tr>
                <th>S.N</th>
                <th>Category</th>
                <th>Type</th>

                <th>ID</th>
                <th>Size</th>
                <th>Available</th>
                <th>Quality</th>
                <th>Price</th>
                <th>Price Per Unit</th>
                <th>Suggested Selling Price</th>
            </tr>
        </thead> <tbody>
";
while ($row=$result->fetch_assoc()) {
	$output .="
	<tr>
	<td>" . $row["category"] . "</td>
                    <td>" . $row["rudraksha"] . "</td>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["size"] . "</td>
                    <td>" . $row["quantity"] . "</td>
                    <td>" . $row["quality"] . "</td>
                    <td>" . $row["total_cost"] . "</td>
                    <td>" . $row["price_per_unit"] . "</td>
                    <td>" . $row["ssp"] . "</td>
	</tr>
	";
}
$output.="</tbody>";
echo $output;

}
else{
	echo"<h3>No Records Found</h3>";
}

?>