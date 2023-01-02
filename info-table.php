<?php
include('rudraksha_common.html');

?>
<?php
use LDAP\Result;

@include 'configure.php';

if ($mysqli->errno)
    die("Connection Failed" . $mysqli->connect_error);


$query = "SELECT category,rudraksha,  sum(quantity) AS quantity, sum(total_cost) as  total_cost,round(avg (price_per_unit),2) as price_per_unit,avg (website_price) as website_price,size,comment,vendor_information,round(avg (ssp),2) as ssp,round(avg (sspi),2) as sspi FROM `data_entry`  where rudraksha='0 Mukhi' GROUP BY size  ORDER BY `data_entry`.`size` DESC;  ";


// $query = "SELECT data_entry.category,rtype.rudraksha, sum(data_entry.quantity) AS quantity, sum(data_entry.total_cost) as total_cost,avg (data_entry.price_per_unit) as price_per_unit,data_entry.website_price,rsize.size,data_entry.comment,data_entry.vendor_information,data_entry.ssp FROM `data_entry` , `rsize` ,`rtype` where data_entry.size=rsize.SN AND data_entry.rudraksha=rtype.SN AND data_entry.rudraksha='1' GROUP BY size ORDER BY `data_entry`.`size` asc; ";


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Info-Table</title>


    <link rel="stylesheet" href="css/base.css" />
    <link rel="shortcut icon" type="image/png" href="img/fav.png" />
    
</head>

<body>


    <ul class="breadcrumbs">
        <li class="breadcrumbs_items">
            <a href="inven_main.php" class="breadcrumbs_link">Home</a>

        </li>
        <li class="breadcrumbs_items">
            <a href="info-table.php?page=data_entry&SN=<?php echo $stock_rs['SN']; ?>"
                class="breadcrumbs_link breadcrumbs_link-active">Info-Table</a>

        </li>
    </ul>
    <?php
        // $stock_sql = "SELECT rudrakshaid.SN, data_entry.rudtype_id,data_entry.category,data_entry.rudraksha,  sum(quantity) AS quantity, sum(total_cost) as  total_cost,round(avg (price_per_unit),2) as price_per_unit,avg (website_price) as website_price,`size`,`comment`,vendor_information,round(avg (ssp),2) as ssp,round(avg (sspi),2) as sspi FROM data_entry,rudrakshaid  WHERE  data_entry.rudraksha=" . $_GET['rudraksha'] . " AND data_entry.rudtype_id=rudrakshaid.SN GROUP BY `size` ORDER BY `data_entry`.`size` DESC;";
    
    $stock_sql =  "SELECT  rudtype_id,category,rudraksha,  sum(quantity) AS quantity, sum(total_cost) as  total_cost,round(avg (price_per_unit),2) as price_per_unit,avg (website_price) as website_price,`size`,`comment`,vendor_information,round(avg (ssp),2) as ssp,round(avg (sspi),2) as sspi FROM data_entry  WHERE  rudraksha='" . $_GET['rudraksha']. "' GROUP BY size ORDER BY size DESC;";
    
        if ($stock_query = mysqli_query($mysqli, $stock_sql)) {
            $stock_rs = mysqli_fetch_assoc($stock_query);
        }

        ?>
    <center>
        <h2>
            <?php echo $stock_rs['rudraksha'] ?? ""; ?>

        </h2>

    </center>

    
    <div class="table_body">
        <table class="table">
            <thead>

                <tr>

                    <th>Size</th>



                    <th>Available</th>

                    <th> Cost Price (NRS)</th>

                    <th> Average Price Per Unit (NRS)</th>

                    <th>Suggested Selling Price ($)</th>

                    <th>Suggested Selling Price (INR)</th>

                    <th>Website Price ($)</th>


                </tr>

            </thead>

            <tbody>

                <?php


            if ($mysqli->multi_query($stock_sql)) {
                do {
                    $result = $mysqli->store_result();



                    $size = [];
                    while ($stock_rs = $result->fetch_assoc()) {

                        if (!array_key_exists($stock_rs["size"], $size)) {

                            $size[$stock_rs["size"]] = [


                                'quantity' => $stock_rs["quantity"],
                                'total_cost' => $stock_rs["total_cost"],
                                'price_per_unit' => $stock_rs["price_per_unit"],
                                'ssp' => $stock_rs["ssp"],
                                'website_price' => $stock_rs["website_price"],
                            ];

                        }



                        echo "   <tr> <th data-href='individualImage.php?page=data_entry&rudtype_id=" . $stock_rs['rudtype_id'] . "' > " . $stock_rs["size"] . "</th>
        
                                    
                                    <td>" . $stock_rs["quantity"] . "</td> 
                                    <td>" . $stock_rs["total_cost"] . "</td>  
                                    <td>" . $stock_rs["price_per_unit"] . "</td>
                                    <td>" . $stock_rs["ssp"] . "</td>
                                    <td>" . $stock_rs["sspi"] . "</td>
                                    <td>" . $stock_rs["website_price"] . "</td></tr>";

                    }




                } while ($mysqli->more_results() && $mysqli->next_result());



            }


                    ?>

            </tbody>


        </table>
        

    </div>




        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const rows = document.querySelectorAll("th[data-href]");
                rows.forEach(row => {
                    row.addEventListener("click", () => {
                        window.location.href = row.dataset.href;
                    });
                });
            });
        </script>
        <script src="jquery/"> </script>

    </div>

</body>

</html>