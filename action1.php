<?php
$conn = mysqli_connect('localhost', 'root', '', 'user_db');
if (isset($_POST['submit'])) { // Since method=”post” in the form


    $id = $_POST['id'];
    $length = $_POST['length'];
    $weight = $_POST['weight'];
    $image = $_POST['file'];




    foreach ($id as $key => $value) {

        mysqli_query(
            $conn, "INSERT INTO 
    unit_data_entry(`id`,`length`,`weight`,`file`) 
    VALUES('" . $value . "','" . $length[$key] . "','" . $weight[$key] . "','" . $image[$key] . "')"
        );





    }
}
;

echo 'Items Inserted Successfully';
?>