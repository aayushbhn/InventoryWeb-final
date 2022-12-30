
<?php
$conn = mysqli_connect('localhost', 'root', '', 'user_db');
if (isset($_POST['submit'])) { // Since method=”post” in the form


    $id = $_POST['ID'];
    $bulk_id = $_POST['bulk_id'];
    $length = $_POST['length'];
    // $rudraksha = $_POST['rudraksha'];
    // $size = $_POST['size'];
    $weight = $_POST['weight'];
    foreach ($files = $_FILES['file']['name'] as $key => $val) {
        move_uploaded_file($_FILES['file']['tmp_name'][$key], 'upload/' . $val);
    }
    header('location:unitentry.php');


    foreach ($id as $key => $value ) {
        mysqli_query( 
            $conn, "INSERT INTO 
    unit_data_entry(`ID`,`bulk_id`,`length`,`weight`,`file`) 
    VALUES('" . $value . "','" . $bulk_id[$key] . "','" . $length[$key] . "','" . $weight[$key] . "','" . $files[$key] . "')" );
       
        

    }
}
;

?>



<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <div class=" heading">
        <h1>
            <center> NEPA RUDRAKSHA</center>
        </h1>
        <h2>
            <center> Inventory website</center>
        </h2>
    </div>

    <meta charset="UTF-8">
    
    <title> Additional Entry </title>
    <link rel="stylesheet" href="css/formstyles.css">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
       @import url("https://fonts.googleapis.com/css2?family=Lato&family=josefin+Sans");
       body {
    /* font-family: 'Gill Sans', 'Gill Sans MT', 'Calibri', 'Trebuchet MS', sans-serif; */
    
   

}

        form .button {

            width: 50%;

            margin-left: 38%;
        }

        form .rudraksha-details .input-box {
            margin-bottom: 10px;
            width: calc(100% / 2 - 20px);
        }       

        form .button input {
            height: 100%;

            width: 25%;
            border-radius: 5px;
            border: none;
            color: #fff;
            font-size: 18px;
            font-weight: 500;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: linear-gradient(135deg, #ce845f, #db4f0a);
        }

        form .button .add_item_btn {
            height: 100%;
            margin-left: 10px;
overflow: hidden;
            width:25%;
            border-radius: 5px;
            border: none;
            color: black;
            font-size: 15px;
            font-weight: 500;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: linear-gradient(135deg, rgb(183, 220, 108), rgb(100, 150, 0));
        }

        form .button .add_item_btn:hover {
            /* transform: scale(0.99); */
            background: linear-gradient(-135deg, rgb(183, 220, 108), rgb(100, 150, 0));
        }

        form .button .remove_item_btn {
            height: 100%;
            margin-left: 5px;
            width: 20%;
            border-radius: 5px;
            border: none;
            color: black;
            font-size: 15px;
            font-weight: 500;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: linear-gradient(135deg, rgba(237, 96, 96, 0.902), rgba(173, 0, 0, 0.902));
        }

        form .button .remove_item_btn:hover {
            /* transform: scale(0.99); */
            background: linear-gradient(-135deg, rgba(237, 96, 96, 0.902), rgba(173, 0, 0, 0.902));
        }
    </style>

    </script>


</head>

<body>

        <div class="nav_bar">
            <ul>
                <div class="inl">
                    <li><a class="active" href="inven_main.php"> Home </a> </li>
                    <li><a href="datatable.php"> Rudraksha </a></li>
                    <li><a href="singlepage/index.php"> Gallery </a></li>
                    <li><a href="About.php"> Add Additional Info </a></li>
                    <li style="float: right;"><a href="logout.php" class="btn">Logout</a></li>
                    <li style="float: right;"><a href="unitentry.php" class="btn">Admin</a></li>

                </div>

            </ul>
        </div>



    <div class="container">
        <div class="title"> Unit Entry</div>
        <div class="content">

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <form method="post" action="#" id="unit_entry" enctype="multipart/form-data">
                <div class="row">
                    <div class="rudraksha-details" id="show_item">
                        <div class="input-box">
                            <span class="details">ID</span>
                            <input type="varchar" name="ID[]" placeholder="ID" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Length</span>
                            <input type="int" name="length[]" placeholder="Enter Length" required>
                        </div>
                        <div class="input-box">
                            <span class="details">Weight</span>
                            <input type="int" name="weight[]" placeholder="Enter Weight" required>
                        </div><br><br>

                        <div class="input-box">
                            <span class="details"  > Upload Image</span>
                            <input  type="file" style="padding: 2px;" name="file[]" placeholder="Upload" required>
                        </div>
                        <div class="input-box" style="visibility: hidden;height: 0px;">
                        <span class="details"  > Bulk ID</span>
                            <?php 
                                $rudquery = "SELECT AUTO_INCREMENT -1 as CurrentId FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'user_db' AND TABLE_NAME = 'data_entry';";
                                $res = mysqli_query($conn,$rudquery);
                                if(mysqli_num_rows($res)>0){
                                    while($row = $res->fetch_assoc()){
                                        ?>
                                        <input  type="int" style="padding: 2px;"
                                        value='<?php echo" ". $row["CurrentId"] .""; ?>'
                                        
                                        name="bulk_id[]" placeholder="Bulk ID" readonly>
                                        <?php
                                        
                                    };
                                }
                            ?>
                           
                            
                        </div>
                        

                        
                        <div class="button">
                            <input type="submit" id="submit" name="submit" value="Submit">
                            <button class=" add_item_btn"> Add More</button>

                        </div>

                    </div>



            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".add_item_btn").click(function (e) {
                e.preventDefault();
                $("#show_item").prepend(`<div class="row append_item" >
                <div class="rudraksha-details" id="show_item">
                    <div class="input-box">
                        <span class="details">ID</span>
                        <input type="varchar" name="ID[]" placeholder="ID" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Length</span>
                        <input type="int" name="length[]" placeholder="Enter Length" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Weight</span>
                        <input type="int" name="weight[]" placeholder="Enter Weight" required>
                    </div><br>

                    <div class="input-box">
                            <span class="details"  > Upload Image</span>
                            <input  type="file"  style="padding: 2px;" name="file[]" placeholder="Upload" required>
                        </div>
                        <div class="input-box" style="visibility: hidden;height: 0px;">
                        <span class="details"  > Bulk ID</span>
                            <?php 
                                $rudquery = "SELECT AUTO_INCREMENT -1 as CurrentId FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'user_db' AND TABLE_NAME = 'data_entry';";
                                $res = mysqli_query($conn,$rudquery);
                                if(mysqli_num_rows($res)>0){
                                    while($row = $res->fetch_assoc()){
                                        ?>
                                        <input  type="int" style="padding: 2px;"
                                        value='<?php echo" ". $row["CurrentId"] .""; ?>'
                                        
                                        name="bulk_id[]" placeholder="Bulk ID" readonly>
                                        <?php
                                        
                                    };
                                }
                            ?>
                           
                            
                        </div>
                        
                 
                    <div class="button">
                       <button class=" remove_item_btn"> Remove</button>
                    </div>
                   `);

            });
            $(document).on('click', '.remove_item_btn', function (e) {
                e.preventDefault();
                let row_item = $(this).parent().parent();
                $(row_item).remove();
            });

            
        });
    </script>
    </div>
<?php
@include('mulimg.php');
?>

</body>

</html>
