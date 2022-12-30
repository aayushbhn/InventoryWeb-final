<?php
@include('common_layout.html')
    ?>


<?php
require_once('PageDb.class.php');
use LDAP\Result;

@include 'configure.php';
// $servername = "localhost";
// $username = "root";
// $password = "";
// $database = "user_db";

// //crate connection 
// $mysqli = new mysqli($servername, $username, $password, $database);
if ($mysqli->errno)
    die("Connection Failed" . $mysqli->connect_error);

$sql = "SELECT unit_data_entry.ID, unit_data_entry.file,data_entry.rudraksha  FROM `unit_data_entry`,`data_entry` where data_entry.category='Rudraksha' and unit_data_entry.bulk_id=data_entry.SN GROUP BY `rudraksha`; ";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>


    <link rel="stylesheet" href="css/style.css" />
    <link rel="shortcut icon" type="image/png" href="img/fav.png" />
    <style>
        div .container {
            display: inline;

            

        }
        div .desc{
            color: black;
        }
    </style>

</head>

<body>
    <?php
    $cat_sql = "SELECT data_entry.SN,data_entry.rudtype_id, unit_data_entry.ID, unit_data_entry.file,data_entry.rudraksha  FROM `unit_data_entry`,`data_entry` where data_entry.category='Rudraksha'  and unit_data_entry.bulk_id=data_entry.SN  GROUP BY `rudraksha`; ";
    
    $cat_query = mysqli_query($mysqli, $cat_sql);
    $cat_rs = mysqli_fetch_assoc($cat_query);
    ?>
    <?php
    do { ?>
    <a href="info-table.php?page=data_entry&rudtype_id=<?php echo $cat_rs['rudtype_id']?? ""; ?>">
        <?php echo " 

                <div class='container' style=' display:'inline'; '>

                    <center>
                        <img height='130px' width='130px'  src= 'upload/" . $cat_rs['file']. " ' >
                    </center>
  
                <div class='middle'>
                <div class='text'>" . $cat_rs["rudraksha"] ."</div>
                </div>

                <div class='desc'>" . $cat_rs["rudraksha"] . "</div>
                     
    
                </div>
"; ?>
    </a>

    <?php
    } while ($cat_rs = mysqli_fetch_assoc($cat_query))
    ?>

    <!-- <div class="disp">
        <div class="reg"> -->


    <?php

            // if ($mysqli->multi_query($sql)) {
            //     do {
            
            //         $result = $mysqli->store_result();
            
            //         echo "<br>";
            
            //         $id = [];
            //         while ($row = $result->fetch_assoc()) {
            
            //             if (!array_key_exists($row["ID"], $id)) {
            //                 // $quantity[$row["quantity"]].
            //                 $size[$row["ID"]] = [
            //                     'rudraksha' => $row["rudraksha"],
            



            //                 ];
            
            //             }
            
            //             echo " 
            
            //                 <div class='container' style=' display:'inline'; '>
            
            //                 <center>
            //                     <img height='130px' width='130px'  src= 'upload/" . $row['file'] . " ' >
            //                 </center>
            
            //                   <div class='middle'>
            //                     <div class='text'>" . $row["rudraksha"] . "</div>
            //                   </div>
            
            //                 <div class='desc'>" . $row["rudraksha"] . "</div>
            

            //                </div>
            //                ";
            



            //         }
            

            // } while ($mysqli->more_results() && $mysqli->next_result());
            //}
            // echo"<hr>";
            ?>
    <!-- </div>

    </div>
    <br> -->




    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const rows = document.querySelectorAll(".idm[data-href]");
            rows.forEach(row => {
                row.addEventListener("click", () => {
                    window.location.href = row.dataset.href;
                });
            });
        });
    </script>




</body>



</html>