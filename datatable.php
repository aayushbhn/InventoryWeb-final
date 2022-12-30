<?php
include('rudraksha_common.html');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>General Info</title>

    <link rel="stylesheet" href="css/formstyle.css" />

    <link rel="shortcut icon" type="image/png" href="img/fav.png" />
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">


    <script src="js/filter.js">   </script>

    <style>
        label{
            margin-left: 5% ;
        }
        input{
            margin-left: 10px;
        }
        .img-btn{
            height: 20px;
            width: 20px;
        }
        .btn-success{
            border: none;
        }
        td[data-href]{
            cursor: pointer;
        }
        .table {
            

            height: 450px;
            width: 1450px;
            margin: auto;
            position: absolute;
            /* border-collapse: collapse; */
            overflow: scroll;
            margin-top: 20px;
            margin-left:5%;

        }

        .search {
            margin-bottom: 10px;
            
            position: absolute;
        }
    </style>

</head>

<body>

    <div class="whole" >
    <label>Search </label>
        <input type="text" name="search" id="search" placeholder="Search By Name" class="search">

       
        <table class="table" id="table-data" style="overflow-x:auto;">
             <!--Create a Search bar -->
        


            <thead>
            
                <tr>
                    
                    <th col-index=1>S.N</th>
                    <th col-index=2>Category
                        <select class="table-filter" onchange="filter_rows()">
                            <option value="all"></option>
                        </select>
                    </th>
                    <th col-index=3>Type
                        <select class="table-filter" onchange="filter_rows()">
                            <option value="all"></option>
                        </select>
                    </th>


                    <th col-index=4>Size
                        <select class="table-filter" onchange="filter_rows()">
                            <option value="all"></option>
                        </select>
                    </th>
                    <th col-index=5>Available</th>
                    <th col-index=6>Quality</th>
                    <th col-index=7>Total Cost</th>
                    <th col-index=8>Average Price Per Unit</th>
                    <th col-index=9>Suggested Selling Price</th>
                    <th col-index=10>Website Price</th>
                    <th col-index=11>Action</th>
                    
                </tr>
            </thead>

            <tbody>
                <?php
                use LDAP\Result;

                @include('config.php');

                //read all row from database table
                $sql = "SELECT category,rudraksha, sum(quantity) AS quantity, sum(total_cost) as  total_cost,round(avg (price_per_unit),2) as price_per_unit,website_price,size,ssp,sspi,quality FROM `data_entry` where 1 GROUP BY rudraksha , category,size  ORDER BY `data_entry`.`rudraksha` asc,`category`desc,`size` desc ;  ";

                // $sql = "SELECT data_entry.category,rtype.rudraksha_type, sum(data_entry.quantity) AS quantity, sum(data_entry.total_cost) as total_cost,avg (data_entry.price_per_unit) as price_per_unit,data_entry.website_price,rsize.rudraksha_size ,data_entry.comment,data_entry.quality,data_entry.vendor_information,data_entry.ssp FROM `data_entry` ,`rsize`,`rtype` where data_entry.size=rsize.SN AND data_entry.rudraksha=rtype.SN GROUP BY `size`,`category`,`rudraksha` ORDER BY `data_entry`.`rudraksha` asc,`category` asc,`size` asc;";
                // $sql = " SELECT  * FROM data_entry  ";

                $result = $conn->query($sql);
                //data-href='http://www.google.com'

                $sl = 0;
                //read data of each row
                while ($row = $result->fetch_assoc()) {
                    $sl++;
                    echo "  <tr
                    >
                    
                    <td  >" . $sl . "</td>
                    
                    <td  >" . $row["category"] . "</td>
                    <td data-href='display_table.php' >" . $row["rudraksha"] . "</td>
                    
                    <td  data-href='display_table.php'>" . $row["size"] . "</td>
                    <td  >" . $row["quantity"] . "</td>
                    <td >" . $row["quality"] . "</td>
                    <td  >" . $row["total_cost"] . "</td>
                    <td >" . $row["price_per_unit"] . "</td>
                    <td  >" . $row["ssp"] . "</td>
                    
                    <td  >" . $row["website_price"] . "</td>
                    
                    <td><button type='button' class='btn-success'> <img class='img-btn' src='Assets/Img/addicon.png' > </button></td>

                </tr>";
                }
                
            

                ?>
                
            </tbody>
            
            
        </table>
        
        <script>
            document.addEventListener("DOMContentLoaded",()=>{
                const rows = document.querySelectorAll("td[data-href]");
                rows.forEach(row => {
                    row.addEventListener("click",() =>{
                        window.location.href = row.dataset.href;
                    });
                });
            });
        </script>
        <script>
            window.onload = () => {
                console.log(document.querySelector("#table-data > tbody > tr:nth-child(1) > td:nth-child(2)").innerHTML);
            };

            getUniqueValuesFromColumn();
        </script>






    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#search').keyup(function () {
                search_table($(this).val());
            });
            function search_table(value) {
                $('#table-data tr').each(function () {
                    var found = 'false';
                    $(this).each(function () {
                        if ($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0) {
                            found = 'true';
                        }
                    });
                    if (found == 'true') {
                        $(this).show();
                    }
                    else {
                        $(this).hide();
                    }
                });
            }


        });

    </script>
</body>

</html>