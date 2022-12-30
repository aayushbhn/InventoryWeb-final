<?php
$conn = mysqli_connect('localhost', 'root', '', 'user_db');
if (isset($_POST['submit'])) { // Since method=”post” in the form

    
    $id = $_POST['ID'];
    $bulk_id = $_POST['bulk_id'];
    $length = $_POST['length'];
    // $rudraksha = $_POST['rudraksha'];
    // $size = $_POST['size'];
    $weight = $_POST['weight'];
    $row_name = $_POST['row_name'];
    foreach ($files = $_FILES['file']['name'] as $key => $val) {
        move_uploaded_file($_FILES['file']['tmp_name'][$key], 'upload/' . $val);
    }
    header('location:unitentry.php');


    foreach ($bulk_id as $key => $value ) {
        mysqli_query( 
            $conn, "INSERT INTO 
    unit_data_entry(`bulk_id`,`ID`,`length`,`weight`,`row_name`,`file`) 
    VALUES('" . $value . "','" . $id[$key] . "','" . $length[$key] . "','" . $weight[$key] . "','" . $row_name[$key] . "','" . $files[$key] . "')" );
       
        

    }
}
;

?>

<?php
@include 'config.php';

if (isset($_POST['submit'])) { // Since method=”post” in the form
    $img_id = $_POST['imgid'];
 
  
    
$imageCount = count($_FILES['file']['name']);
for($i=0;$i<$imageCount;$i++){
   $imageName= $_FILES['file']['name'][$i];
    $imageTempname = $_FILES['file']['tmp_name'][$i];
    $targetPath = "./upload1/".$imageName;
    if(move_uploaded_file($imageTempname,$targetPath)){
        foreach ($img_id as $key => $value ) {
            mysqli_query( 
                $conn, "INSERT INTO 
        imgfiles(`imgid`,`file`) 
        VALUES('" . $value . "','".$imageName."')" );

    }
    header('location:unitentry.php');
   
    }
}

    
    
}

?>