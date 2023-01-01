<?php
include('rudraksha_common.html');

?>
<?php
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
$qry = "SELECT unit_data_entry.row_name, unit_data_entry.unit_sn, rudrakshaid.SN,data_entry.rudtype_id, unit_data_entry.ID, round(unit_data_entry.length,2) as length,data_entry.vendor_information,data_entry.price_per_unit,data_entry.comid,data_entry.ssp ,round(unit_data_entry.weight,2) as weight, unit_data_entry.file,data_entry.rudraksha ,data_entry.size FROM `unit_data_entry`,`data_entry`,`rudrakshaid` where data_entry.rudtype_id=" . $_GET['rudtype_id'] . " AND data_entry.category='rudraksha' AND data_entry.size='Collector' AND unit_data_entry.bulk_id=data_entry.SN AND data_entry.rudtype_id=rudrakshaid.SN  GROUP BY `id` ORDER BY `unit_data_entry`.`unit_sn` ASC; ";
if ($stock_query = mysqli_query($mysqli, $qry)) {
    $stock_rs = mysqli_fetch_assoc($stock_query);
}
;

$query = "SELECT unit_data_entry.row_name, unit_data_entry.unit_sn, rudrakshaid.SN,data_entry.rudtype_id, unit_data_entry.ID, round(unit_data_entry.length,2) as length,data_entry.vendor_information,data_entry.price_per_unit,data_entry.comid,data_entry.ssp ,round(unit_data_entry.weight,2) as weight, unit_data_entry.file,data_entry.rudraksha ,data_entry.size FROM `unit_data_entry`,`data_entry`,`rudrakshaid` where data_entry.rudtype_id=" . $_GET['rudtype_id'] . " AND data_entry.category='rudraksha' AND data_entry.size='Medium' AND unit_data_entry.bulk_id=data_entry.SN AND data_entry.rudtype_id=rudrakshaid.SN GROUP BY `id` ORDER BY `unit_data_entry`.`unit_sn` ASC; ";
if ($stock_query1 = mysqli_query($mysqli, $query)) {
    $stock_rs1 = mysqli_fetch_assoc($stock_query1);
}
;


$sql = "SELECT unit_data_entry.row_name, data_entry.comment,unit_data_entry.unit_sn, rudrakshaid.SN,data_entry.rudtype_id, unit_data_entry.ID, round(unit_data_entry.length,2) as length,data_entry.vendor_information,data_entry.price_per_unit,data_entry.comid,data_entry.ssp ,round(unit_data_entry.weight,2) as weight, unit_data_entry.file,data_entry.rudraksha ,data_entry.size FROM `unit_data_entry`,`data_entry`,`rudrakshaid` where data_entry.rudtype_id=" . $_GET['rudtype_id'] . " AND data_entry.category='rudraksha' AND data_entry.size='Regular' AND unit_data_entry.bulk_id=data_entry.SN AND data_entry.rudtype_id=rudrakshaid.SN GROUP BY `id` ORDER BY `unit_data_entry`.`unit_sn` ASC; ";
if ($stock_query2 = mysqli_query($mysqli, $sql)) {
    $stock_rs2 = mysqli_fetch_assoc($stock_query2);
}
;


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>All Info</title>


    <link rel="stylesheet" href="css/formstyle.css" />
    <link rel="shortcut icon" type="image/png" href="img/fav.png" />
    <style>
        @media only screen and (max-width:800px) {

            /* For tablets: */
            .main {
                width: 80%;
                padding: 0;
            }

            .right {
                width: 100%;
            }
        }

        .breadcrumbs {
            padding: 10px;

        }

        .breadcrumbs_items {
            display: inline-block;

        }

        .breadcrumbs_items:not(:last-of-type)::after {
            content: '>';
            margin: 0 5px;
            color: #cccccc;

        }

        .breadcrumbs_link {
            text-decoration: none;
            color: #999999;
            font-size: 15px;
        }

        .breadcrumbs_link-active {
            color: #db4f0a;
            font-weight: 500;
        }

        @media only screen and (max-width:500px) {

            /* For mobile phones: */
            .menu,
            .main,
            .right {
                width: 100%;
            }
        }

        .idm[data-href] {
            cursor: pointer;
        }

        .disp {

            display: grid;





        }

        .reg {

            display: inline;




        }

        .med {

            display: inline;


        }

        .coll {

            display: inline;


        }

        .sold {
            height: 50px;
            width: 50px;
            background-color: #d0632d;
            color: #000000ad;
            border-radius: 50%;
            padding: 1em 0.6em;
            position: absolute;
            left: -1.8em;
            top: -0.5em;
            visibility: hidden;
            transform: rotate(-8deg);
            text-align: center;



        }

        .sold::after,
        .sold::before {
            content: "";
            display: block;
            height: 30px;
            width: 15px;
            background-color: #d0632d;
            transform: rotate(15deg);
        }

        .sold::before {
            transform: rotate(-15deg);
            position: absolute;
            top: 35px;
            left: 25px;


        }

        [type=checkbox]:checked~.sold {
            visibility: visible;
            animation: splash 200ms linear;

        }

        @keyframes splash {
            from {
                opacity: 0;
                transform: scale(10);
            }
        }

        label {
            position: absolute;
            height: 20px;
            width: 100px;
            border-radius: 5px;
            margin-bottom: 2px;
            border: none;
            color: #000000ad;
            text-align: center;
            font-size: 12px;
            font-weight: 500;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: linear-gradient(135deg, rgba(237, 96, 96, 0.902), rgba(173, 0, 0, 0.902));
        }

        label:hover {
            /*transform: scale(0.99); */
            background: linear-gradient(-135deg, rgba(237, 96, 96, 0.902), rgba(173, 0, 0, 0.902));
        }

        div.idm {

            display: block;

            transition: .5s ease;
            backface-visibility: hidden;

            transition: .5s ease;
            opacity: 0;
            height: 450px;
            width: 630px;
            position: relative;
            top: -200px;
            left: 47%;

            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%)
        }

        div.container {
            display: inline-block;
            margin: 14px;
            height: 450px;
            position: relative;
            border: #d0632d;
            float: left;
            width: 630px;
            font-weight: 400;
        }

        div.container2 {

            margin: 10px;
            height: 170px;
            position: relative;
            border: #d0632d;
            float: left;
            width: 180px;
            font-weight: 400;
        }


        div.container:hover .idm {
            opacity: 2;
            color: #000000ad;
            background-color: #d0632d;

        }

        .table {



            margin-left: 5%;
            width: 90%;
            height: 400px;


            position: relative;
            border-collapse: separate;
            border-spacing: 0 1em;
            overflow: scroll;

        }
    </style>

</head>

<body>
    

    <ul class="breadcrumbs">
        <li class="breadcrumbs_items">
            <a href="inven_main.php" class="breadcrumbs_link">Home</a>

        </li>
        <li class="breadcrumbs_items">
        <a href="info-table.php?page=data_entry&rudtype_id=<?php echo $cat_rs['rudtype_id']?? ""; ?>">Info-Table</a>

        </li>
        <li class="breadcrumbs_items">
            <a href="individualImage.php" class="breadcrumbs_link breadcrumbs_link-active">All Info</a>

        </li>


    </ul>
    

    <div class="disp">
        <div class="reg">
            <center>
                <h2>Regular</h2>
                <hr>
            </center>

            <?php

            if ($mysqli->multi_query($sql)) {
                do {

                    $result = $mysqli->store_result();

                    echo "<br>";

                    $id = [];
                    while ($row = $result->fetch_assoc()) {

                        if (!array_key_exists($row["ID"], $id)) {
                            // $quantity[$row["quantity"]].
                            $size[$row["ID"]] = [
                                'row_name' => $row["row_name"],
                                'length' => $row["length"],
                                'weight' => $row["weight"],
                                'file' => $row["file"],
                                'ssp' => $row["ssp"],
                                'total_cost' => $row["price_per_unit"],
                                'vendor_information' => $row["vendor_information"],



                            ];

                        }

                        echo " 
                    <div class='container'>    
                    <div class='sold'>Sold </div>
                    <center>
                        <img   height='390px' width='650px'  src= 'upload/" . $row['file'] . " '></center>

                        <div class='idm' data-href='alldisplay.php?page=unit_data_entry&unit_sn=" . $row['unit_sn'] . "'''>

                            <div class='container'>
                                <u>Row</u> :" . $row["row_name"] . "<br>
                                <u>ID</u> :" . $row["comid"] . "" . $row["ID"] . "<br>
                                <u>Length</u> :" . $row["length"] . "<br>
                                <u>Weight</u> :" . $row["weight"] . "<br>
                                <u>SSP </u>:" . $row["ssp"] . "<br>
                                <u>Cost</u> :" . $row["price_per_unit"] . "<br>
                                <u>Vendor</u> :" . $row["vendor_information"] . "<br>
                                

                            </div>
                            </div>
                            </div>";




                    }


                } while ($mysqli->more_results() && $mysqli->next_result());
            }

            ?>
        </div>

    </div>
    <br>
    <hr>


    <div class="disp">
        <div class="med">
            <center>
                <h2>Medium</h2>
                <hrclass="hr1">
            </center>

            <?php

            if ($mysqli->multi_query($query)) {
                do {

                    $result = $mysqli->store_result();

                    echo "<br>";

                    $id = [];
                    while ($row = $result->fetch_assoc()) {

                        if (!array_key_exists($row["ID"], $id)) {

                            $size[$row["ID"]] = [
                                'row_name' => $row["row_name"],
                                'length' => $row["length"],
                                'weight' => $row["weight"],
                                'file' => $row["file"],
                                'ssp' => $row["ssp"],
                                'total_cost' => $row["price_per_unit"],
                                'vendor_information' => $row["vendor_information"],
                                



                            ];

                        }



                        echo " 
<div class='container' >    
<div class='sold'>Sold </div>
<img   height='390px' width='650px'  src= 'upload/" . $row['file'] . " '>

<div class='idm' data-href='alldisplay.php?page=unit_data_entry&unit_sn=" . $row['unit_sn'] . "'''>

<div class='container' >




<u>Row</u> :" . $row["row_name"] . "<br>
<u>ID</u> :" . $row["comid"] . "" . $row["ID"] . "<br>
<u>Length</u> :" . $row["length"] . "<br>
<u>Weight</u> :" . $row["weight"] . "<br>
<u>SSP </u>:" . $row["ssp"] . "<br>
<u>Cost</u> :" . $row["price_per_unit"] . "<br>
<u>Vendor</u> :" . $row["vendor_information"] . "<br>


</div>
</div>
</div>";




                    }


                } while ($mysqli->more_results() && $mysqli->next_result());
            }

            ?>
        </div>

    </div>
    <br>
    <hr>


    <div class="disp">
        <div class="coll">
            <center>
                <h2>Collector</h2>
                <hr>
            </center>

            <?php

            if ($mysqli->multi_query($qry)) {
                do {

                    $result = $mysqli->store_result();

                    echo "<br>";

                    $id = [];
                    while ($row = $result->fetch_assoc()) {

                        if (!array_key_exists($row["ID"], $id)) {

                            $size[$row["ID"]] = [
                                'row_name' => $row["row_name"],
                                'length' => $row["length"],
                                'weight' => $row["weight"],
                                'file' => $row["file"],
                                'ssp' => $row["ssp"],
                                'total_cost' => $row["price_per_unit"],
                                'vendor_information' => $row["vendor_information"],
                                



                            ];

                        }



                        echo " 
<div class='container'>    
<div class='sold'>Sold </div>
<img   height='390px' width='650px'  src= 'upload/" . $row['file'] . " '>

<div class='idm' data-href='alldisplay.php?page=unit_data_entry&unit_sn=" . $row['unit_sn'] . "'''>

<div class='container'>




<u>Row</u> :" . $row["row_name"] . "<br>
<u >ID</u> :" . $row["comid"] . "" . $row["ID"] . "<br>

<u>Length</u> :" . $row["length"] . "<br>
<u>Weight</u> :" . $row["weight"] . "<br>
<u>SSP </u>:" . $row["ssp"] . "<br>
<u>Cost</u> :" . $row["price_per_unit"] . "<br>
<u>Vendor</u> :" . $row["vendor_information"] . "<br>


</div>
</div>
</div>";




                    }


                } while ($mysqli->more_results() && $mysqli->next_result());
            }

            ?>
        </div>

    </div>
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
<!-- <label for='buy'>Mark as Sold </label>
<input type='checkbox' name='buy' id='buy'><br><br> -->

</html>