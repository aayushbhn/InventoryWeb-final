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


    <link rel="stylesheet" href="css/formstyle.css" />
    <link rel="shortcut icon" type="image/png" href="img/fav.png" />
    <style>
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

        th[data-href] {
            cursor: pointer;
        }
        tr:nth-of-type(odd) { 
  background: #eee; 
}
th { 
  background: #333; 
  
  font-weight: bold; 
}
td, th { 
  padding: 6px; 
  border: 1px solid #ccc; 
  text-align: left; 
}

        table {



            
            width: 100%; 
  border-collapse: collapse; 

        }

        @media 
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {

	/* Force table to not be like tables anymore */
	table, thead, tbody, th, td, tr { 
		display: block; 
	}
	
	/* Hide table headers (but not display: none;, for accessibility) */
	thead tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
	
	tr { border: 1px solid #ccc; }
	
	td { 
		/* Behave  like a "row" */
		border: none;
		border-bottom: 1px solid #eee; 
		position: relative;
		padding-left: 50%; 
	}
	
	td:before { 
		/* Now like a table header */
		position: absolute;
		/* Top/left values mimic padding */
		top: 6px;
		left: 6px;
		width: 45%; 
		padding-right: 10px; 
		white-space: nowrap;
	}
	
	/*
	Label the data
	*/
	
	th:nth-of-type(2):before { content: "Available"; }
	th:nth-of-type(3):before { content: "Cost Price(NRS)"; }
	th:nth-of-type(4):before { content: "Avg Price(NRS)"; }
	th:nth-of-type(5):before { content: "Suggested Selling Price ($)"; }
	th:nth-of-type(6):before { content: "Suggested Selling Price (INR)"; }
	th:nth-of-type(7):before { content: "Website Price"; }
	
}
    </style>

</head>

<body>


    <ul class="breadcrumbs">
        <li class="breadcrumbs_items">
            <a href="inven_main.php" class="breadcrumbs_link">Home</a>

        </li>
        <li class="breadcrumbs_items">
            <a href="info-table.php?page=data_entry&SN=<?php echo $stock_rs['SN']; ?>" class="breadcrumbs_link breadcrumbs_link-active">Info-Table</a>

        </li>
        <?php
        $stock_sql = "SELECT rudrakshaid.SN, data_entry.rudtype_id,data_entry.category,data_entry.rudraksha,  sum(quantity) AS quantity, sum(total_cost) as  total_cost,round(avg (price_per_unit),2) as price_per_unit,avg (website_price) as website_price,`size`,`comment`,vendor_information,round(avg (ssp),2) as ssp,round(avg (sspi),2) as sspi FROM data_entry,rudrakshaid  WHERE  data_entry.rudtype_id=" . $_GET['rudtype_id'] . " AND data_entry.rudtype_id=rudrakshaid.SN GROUP BY `size` ORDER BY `data_entry`.`size` DESC;";
        if ($stock_query = mysqli_query($mysqli, $stock_sql)) {
            $stock_rs = mysqli_fetch_assoc($stock_query);
        }

        ?>
        <center>
            <h2>
                <?php echo $stock_rs['rudraksha']?? ""; ?>
                
            </h2>

        </center>

        <?php do { ?>
        <div class="table_body">
            <table class="table">
                <thead>

                    <tr>

                        <th>Size</th>

                        

                        <th>Available</th>

                        <th> Cost Price (NRS)</th>

                        <th> Avg Price(NRS)</th>

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

                    echo ("");

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
            <?php
        } while ($stock_rs = mysqli_fetch_assoc($stock_query))
            ?>



    </ul>


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