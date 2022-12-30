<?php

@include 'rudraksha_common.html';

?>
<?php
if (isset($_GET['file'])) {
  $file = $_GET['file'];
  if (file_exists($file)) {
    header('Content-Description:File Transfer');
    header('Content-Type:application/image');
    header('Content-Disposition:attachment;filename="' . basename($file) . '"');
    readfile($file);
  }
}

?>


<?php
use LDAP\Result;

@include 'configure.php';



$sql = "SELECT data_entry.comment, unit_data_entry.unit_sn, unit_data_entry.ID, unit_data_entry.length,data_entry.vendor_information,data_entry.comid,data_entry.price_per_unit,data_entry.ssp ,unit_data_entry.weight, unit_data_entry.file,data_entry.rudraksha ,data_entry.size FROM `unit_data_entry`,`data_entry`,`imgfiles` where  data_entry.category='rudraksha' AND  unit_data_entry.unit_sn=" . $_GET['unit_sn'] . "  AND imgfiles.imgID=unit_data_entry.unit_sn AND data_entry.SN=unit_data_entry.bulk_id GROUP BY data_entry.size;  ";
?>

<?php
@include 'config.php';
function make_query($conn)
{
  $query = "SELECT imgfiles.file, imgfiles.imgID FROM `imgfiles`,`unit_data_entry` where unit_data_entry.unit_sn=" . $_GET['unit_sn'] . " AND imgfiles.imgID=unit_data_entry.unit_sn ;";
  $result = mysqli_query($conn, $query);
  return $result;
}

function make_slide_indicators($conn)
{
  $output = '';
  $count = 0;
  $result = make_query($conn);
  while ($row = mysqli_fetch_array($result)) {
    if ($count == 0) {
      $output .= '
   <li data-target="#dynamic_slide_show" data-slide-to="' . $count . '" class="active"></li>
   ';
    } else {
      $output .= '
   <li data-target="#dynamic_slide_show" data-slide-to="' . $count . '"></li>
   ';
    }
    $count = $count + 1;
  }
  return $output;
}

function make_slides($conn)
{
  $output = '';
  $count = 0;
  $result = make_query($conn);
  while ($row = mysqli_fetch_array($result)) {
    if ($count == 0) {
      $output .= '<div class="item active">';
    } else {
      $output .= '<div class="item">';
    }
    $output .= '
    
    <img class="carousel-image" style= "max-height:60%;width:70%;  padding-left:20% ;"  src="upload1/' . $row["file"] . '" alt="" />
   
   
   
  </div>
  ';
    $count = $count + 1;
  }
  return $output;
}

?>
<!DOCTYPE html>
<html>

<head>
  <title>Individual Display</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style>
    button {
      margin-top: 20px;
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

    .breadcrumbs {
      padding: 10px;

    }

    .carousel-control.left,.carousel-control.right{
      background: none;
    }

    .breadcrumbs_items {
      display: inline-block;

    }

    .breadcrumbs_items:not(:last-of-type)::after {
      content: '>';
      margin: 0 5px;
      color: #cccccc;

    }

    button a {
      color: white;
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

    .txt {
      position: relative;
      font-size: 40px;
      margin-left: 20px;
    }

    h3 {
      font-family: cursive;
      color: coral;


      font-size: 40px;
    }

    .container1 {
      position: absolute;
      background-color: antiquewhite;
      margin-left: 1100px;
    }


    .container3 {
      position: absolute;
      height: 600px;
      width: 1000px;
      background-color: white;

    }

    
    
  </style>

</head>

<body>
  <ul class="breadcrumbs">
    <li class="breadcrumbs_items">
      <a href="inven_main.php" class="breadcrumbs_link">Home</a>

    </li>
    <li class="breadcrumbs_items">
      <a href="info-table.php" class="breadcrumbs_link">Info-Table</a>

    </li>
    <li class="breadcrumbs_items">
      <a href="individualImage.php" class="breadcrumbs_link">All Info</a>

    </li>
    <li class="breadcrumbs_items">
      <a href="#" class="breadcrumbs_link breadcrumbs_link-active">Individual Display</a>

    </li>

  </ul>
  <div  class="container1">
    <center>
      <h3>Details</h3>
    </center>
    <?php

    if ($mysqli->multi_query($sql)) {
      do {

        $result1 = $mysqli->store_result();

        echo "<br>";

        $id = [];
        while ($row = $result1->fetch_assoc()) {

          if (!array_key_exists($row["ID"], $id)) {
            // $quantity[$row["quantity"]].
            $size[$row["ID"]] = [
              'length' => $row["length"],
              'weight' => $row["weight"],
              'file' => $row["file"],
              'ssp' => $row["ssp"],
              'total_cost' => $row["price_per_unit"],
              'vendor_information' => $row["vendor_information"],
              'comment' => $row["comment"],



            ];

          }

          echo " 


<div class='txt' >
<u><b>ID</b></u> :" . $row["comid"] . "" . $row["ID"] . "<br>

<u><b>Length</b></u> :" . $row["length"] . "<br>
<u><b>Weight</b></u> :" . $row["weight"] . "<br>
<u><b>SSP</b> </u>:" . $row["ssp"] . "<br>
<u><b>Cost</b></u> :" . $row["price_per_unit"] . "<br>
<u><b>Vendor</b></u> :" . $row["vendor_information"] . "<br>
<u><b>Comment</b></u> :" . $row["comment"] . "<br>
</div>



";

          echo "<br>";


        }


      } while ($mysqli->more_results() && $mysqli->next_result());
    }
    // echo"<hr>";
    ?>
  </div>


  <br />
  <div class="container3">


    <div id="dynamic_slide_show" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <?php echo make_slide_indicators($conn); ?>
      </ol>

      <div class="carousel-inner">
        <?php echo make_slides($conn); ?>
      </div>
      <a class="left carousel-control" href="#dynamic_slide_show" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="right carousel-control" href="#dynamic_slide_show" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>

    </div>
    <div class="card-footer">
      <button id="save-all-button" style="margin-left: 40% ;">Save All Images </button>

    </div>

  </div>
  <script>
    // Select the save all button
const saveAllButton = document.querySelector('#save-all-button');

// Bind a click event handler to the button
saveAllButton.addEventListener('click', function() {
  // Select all the images in the carousel
  const images = document.querySelectorAll('.carousel-image');

  // Iterate over the images
  images.forEach(function(image) {
    // Get the image URL
    const imageUrl = image.src;

    // Create a new <a> element
    const link = document.createElement('a');

    // Set the href and download attributes of the <a> element
    link.href = imageUrl;
    link.download = 'image.jpg';

    // Append the <a> element to the DOM and trigger a click event on it
    document.body.appendChild(link);
    link.click();

    // Remove the <a> element from the DOM
    document.body.removeChild(link);
  });
});

  </script>
  <!-- <script>
    // Select the save all button
const saveAllButton = document.querySelector('#save-all-button');

// Bind a click event handler to the button
saveAllButton.addEventListener('click', function() {
  // Select all the images in the carousel
  const images = document.querySelectorAll('.carousel-image');

  // Iterate over the images
  images.forEach(function(image) {
    // Get the image URL
    const imageUrl = image.src;

    // Create a new <a> element
    const link = document.createElement('a');

    // Set the href and download attributes of the <a> element
    link.href = imageUrl;
    link.download = 'image.jpg';

    // Append the <a> element to the DOM and trigger a click event on it
    document.body.appendChild(link);
    link.click();

    // Remove the <a> element from the DOM
    document.body.removeChild(link);
  });
});
  </script> -->
</body>

</html>