
<?php
@include 'config.php';

if (isset($_POST['saveimg'])) { // Since method=”post” in the form
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



<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    
    <meta charset="UTF-8">
    
    <title> Single Data Entry </title>
    <link rel="stylesheet" href="css/formstyles.css">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
       @import url("https://fonts.googleapis.com/css2?family=Lato&family=josefin+Sans");
       body {
   
    
   

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
            color: #000000ad;
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
            color: #000000ad;
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

       



    <div class="container">
        <div class="title"> Image Upload</div>
        <div class="content">

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <form method="post" action=""  enctype="multipart/form-data">
                <div class="row">
                    

                        <div  class="input-box">
                        <br>
                            <input type="file" style="padding: 2px;" name="file[]" placeholder="Upload" multiple >
                        </div>
                        <div class="input-box" style="visibility:visible;height: 0px;">
                        <span class="details"  > Image ID</span>
                            <?php 
                                $rudquery = "SELECT AUTO_INCREMENT -1 as CurrentId FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'user_db' AND TABLE_NAME = 'unit_data_entry';";
                                $res = mysqli_query($conn,$rudquery);
                                if(mysqli_num_rows($res)>0){
                                    while($row = $res->fetch_assoc()){
                                        ?>
                                        <input  type="int" style="padding: 2px;"
                                        value='<?php echo" ". $row["CurrentId"] .""; ?>'
                                        
                                        name="imgid[]" placeholder="Rudraksha Id" required>
                                        <?php
                                        
                                    };
                                }
                            ?>
                           
                            
                        </div>
                        

                        
                        <div class="button">
                            <input type="submit" id="submit" name="saveimg" value="Submit">
                           
                        </div>

                    </div>



            </form>
        </div>
    </div>

  
     



</body>

</html>








