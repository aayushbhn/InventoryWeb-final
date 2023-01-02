<?php

@include 'config.php';

if (isset($_POST['save'])) { // Since method=”post” in the form

  $category = mysqli_real_escape_string($conn, $_POST['category']);
  $rudraksha = mysqli_real_escape_string($conn, $_POST['rudraksha']);
  $size = mysqli_real_escape_string($conn, $_POST['size']);

  $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
  $total_cost = mysqli_real_escape_string($conn, $_POST['total_cost']);
  $website_price = mysqli_real_escape_string($conn, $_POST['website_price']);
  $price_per_unit = mysqli_real_escape_string($conn, $_POST['price_per_unit']);

  $quality = mysqli_real_escape_string($conn, $_POST['quality']);
  $comment = mysqli_real_escape_string($conn, $_POST['comment']);
  $vendor_information = mysqli_real_escape_string($conn, $_POST['vendor_information']);
  $rudtype_id = mysqli_real_escape_string($conn, $_POST['rudtype_id']);
  $ssp = mysqli_real_escape_string($conn, $_POST['ssp']);
  $sspi = mysqli_real_escape_string($conn, $_POST['sspi']);

  mysqli_query(
    $conn,
    "INSERT INTO 
 data_entry(`category`, `rudraksha`,`size`, `quantity`,`total_cost`,`website_price`,`price_per_unit`,`quality`,`comment`,`vendor_information`,`ssp`,`rudtype_id`,`sspi`) 
 VALUES('$category','$rudraksha','$size','$quantity','$total_cost','$website_price','$price_per_unit','$quality','$comment','$vendor_information','$ssp','$rudtype_id' ,'$sspi')"
  );

  header('location:unitentry.php');
}
;
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
  <div class=" heading">

    <h1 style=" color: coral; font-family: cursive;">
      <center> NEPA RUDRAKSHA</center>
    </h1>

    <h2 style=" color: coral; font-family: cursive;">
      <center> Inventory website</center>
    </h2>
    <br>
  </div>

  <meta charset="UTF-8">
  <title> Bulk data entry </title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/themes/smoothness/jquery-ui.css">
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
  <link rel="stylesheet" href="css/formstyles.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <script src="js/custom.js">   </script>
  <script>


    function div(value) {
      var a = document.getElementById('qnty').value;
      var b = document.getElementById('tc').value;
      var x = (b / a);
      var y = 0.6 * x;
      var z = (x + y) / 130;
      var x = parseFloat(x).toFixed(2);
      var z = parseFloat(z).toFixed(2);
      var d = (x + y) / 1.6;
      var e = d.toFixed(2);
      document.getElementById('result').value = x;
      document.getElementById('result1').value = z;
      document.getElementById('result2').value = e;

    }

  </script>
  <style>
    .topnav {
      overflow: hidden;
      background-color: #d0632d;
      border-radius: 50px;
    }

    .topnav a {
      float: left;
      display: block;
      color: #000000ad;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
      font-size: 17px;
    }

    .topnav a:hover {
      background-color: #db4f0a;
      color: #000000ad;
    }

    .topnav a.active {

      color: #000000ad;
    }

    .topnav .icon {
      display: none;
    }

    @media screen and (max-width: 600px) {
      .topnav a:not(:first-child) {
        display: none;
      }

      .topnav a.icon {
        float: right;
        display: block;
      }
    }

    @media screen and (max-width: 600px) {
      .topnav.responsive {
        position: relative;
      }

      .topnav.responsive .icon {
        position: absolute;
        right: 0;
        top: 0;
      }

      .topnav.responsive a {
        float: none;
        display: block;
        text-align: left;
      }
    }

    /* @import url("https://fonts.googleapis.com/css2?family=Lato&family=josefin+Sans"); */
    form .category label .dot {
      height: 18px;
      width: 18px;
      border-radius: 50%;
      margin-right: 60px;
      background: #d9d9d9;
      border: 5px solid transparent;
      transition: all 0.3s ease;
    }

    form .unitdata {
      height: 100%;
      margin-left: 39%;

      width: 15%;
      border-radius: 5px;
      border: none;
      color: #000000ad;
      font-size: 15px;
      font-weight: 500;
      letter-spacing: 1px;
      cursor: pointer;
      transition: all 0.3s ease;
      background: linear-gradient(135deg, #ce845f, #db4f0a);
    }

    form .unitdata:hover {
      /* transform: scale(0.99); */
      background: linear-gradient(-135deg, #ce845f, #db4f0a);
    }

    form .unitdata a {
      font-size: 15px;

      color: #000000ad;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;

    }


    form .button {



      margin-left: 40%;
    }
  </style>


</head>

<body>

  <div class="topnav" id="myTopnav">
    <a class="active" href="inven_main.php"> Home </a>
    <a href="datatable.php"> Rudraksha </a>
    <a href="singlepage/index.php"> Gallery</a>
    <a href="About.php"> Add Additional Info </a>
    <a style="float: right;" href="logout.php" class="btn">Logout</a>
    <a style="float: right;" href="unitentry.php" class="btn">Admin</a>

    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
      <i class="fa fa-bars"></i>
    </a>
  </div>

  <br><br>
  <script>
    function myFunction() {
      var x = document.getElementById("myTopnav");
      if (x.className === "topnav") {
        x.className += " responsive";
      } else {
        x.className = "topnav";
      }
    }
  </script>



  <div class="container">
    <div class="title">Bulk Entry</div>
    <div class="content">


      <form method="post" action="">
        <div class="rudraksha-details">
          <div class="input-box">

            <span class="details">Select Category</span>


            <select class="chosen" name="category" onchange="if($(this).val()=='Custom')showCustomInput('category')"
              onkeyup="cat(this.value)" id="cat" data-dropdown>
              <option value="" selected enabled></option>

              <option value="Custom">Custom</option>
              <option value="Rudraksha">Rudraksha</option>
              <option value="Siddha Mala">Siddha Mala</option>
              <option value="Shaligram">Shaligram</option>
              <option value="Japa Mala">Japa Mala</option>
              <option value="Indra Mala">Indra Mala</option>
              <option value="Kantha Mala">Kantha Mala</option>
              <option value="Murti">Murti</option>
              <option value="Yantra">Yantra</option>
              <option value="Pooja">Pooja</option>


            </select>

            <input name="category" id="cat" style="display:none;" disabled="disabled"
              onblur="if($(this).val()=='')showOptions('category')">
            <!-- <script type="text/javascript">
                $(".chosen").chosen();

              </script> -->





          </div>
          <div class="input-box">
            <span class="details">Select Rudraksha</span>
            <select class="rudraksha_search" name="rudraksha" onkeyup="rud(this.value)"
              onchange="if($(this).val()=='Custom')showCustomInput('rudraksha')" id="rudraksha" required>
              <option value="" selected enabled></option>
              <option value="Custom">Custom</option>
              <!--Put value as relativve to its id -->
              <option value="0 Mukhi">0 Mukhi</option>
              <option value="1 Mukhi-Moon">1 Mukhi-Moon</option>
              <option value="1 Mukhi-Round">1 Mukhi-Round</option>
              <option value="1 Mukhi-Savar">1 Mukhi-Savar</option>
              <option value="2 Mukhi">2 Mukhi</option>
              <option value="3 Mukhi">3 Mukhi</option>
              <option value="4 Mukhi">4 Mukhi</option>
              <option value="5 Mukhi">5 Mukhi</option>
              <option value="6 Mukhi">6 Mukhi</option>
              <option value="7 Mukhi">7 Mukhi</option>
              <option value="8 Mukhi">8 Mukhi</option>
              <option value="9 Mukhi">9 Mukhi</option>
              <option value="10 Mukhi">10 Mukhi</option>
              <option value="11 Mukhi">11 Mukhi</option>
              <option value="12 Mukhi">12 Mukhi</option>
              <option value="13 Mukhi">13 Mukhi</option>
              <option value="14 Mukhi">14 Mukhi</option>
              <option value="15 Mukhi">15 Mukhi</option>
              <option value="16 Mukhi">16 Mukhi</option>
              <option value="17 Mukhi">17 Mukhi</option>
              <option value="18 Mukhi">18 Mukhi</option>
              <option value="19 Mukhi">19 Mukhi</option>
              <option value="20 Mukhi">20 Mukhi</option>
              <option value="21 Mukhi">21 Mukhi</option>
              <option value="22 Mukhi">22 Mukhi</option>
              <option value="23 Mukhi">23 Mukhi</option>
              <option value="24 Mukhi">24 Mukhi</option>
              <option value="25 Mukhi">25 Mukhi</option>
              <option value="26 Mukhi">26 Mukhi</option>

            </select>
            <input name="rudraksha" id="rudraksha" style="display:none;" disabled="disabled"
              onblur="if($(this).val()=='')showOptions('rudraksha')">




          </div>

          <div class="input-box">
            <span class="details">Select Size</span>
            <select name="size" id="size" onchange="if($(this).val()=='Custom')showCustomInput('size')"
              onkeyup="rud(this.value)">

              <option></option>
              <option value="Regular">Regular</option>
              <option value="Medium">Medium</option>
              <option value="Collector">Collector</option>
              <option value="Custom">Custom</option>


            </select><input name="size" style="display:none;" id="size" disabled="disabled"
              onblur="if($(this).val()=='')showOptions('size')">
          </div>




          <div class="input-box">
            <span class="details"> Quantity</span>
            <input type="float" id="qnty" name="quantity" placeholder="Enter Quantity" onkeyup="div(this.value)"
              required>
          </div>
          <div class="input-box">
            <span class="details"> Cost Price (NRS)</span>
            <input type="float" id="tc" name="total_cost" placeholder="Enter Cost Price in NRS"
              onkeyup="div(this.value)" required>
          </div>
          <div class="input-box">
            <span class="details">Website Price ($)</span>
            <input type="float" name="website_price" placeholder="Enter Website Price" required>
          </div>
          <div class="input-box">
            <span class="details">Price Per Unit (NRS)</span>
            <input type="float" id="result" name="price_per_unit" placeholder="Price Per Unit in NRS" readonly>
          </div>

          <div class="input-box" style="visibility:hidden ;height: 0px;">
            <span class="details">Suggested Selling Price ($)</span>
            <input type="float" id="result1" name="ssp" placeholder="Suggested Selling Price in $" readonly>
          </div>
          <div class="input-box" style="visibility:hidden ;height: 0px;">
            <span class="details">Type ID</span>
            <input type="float" id="type_id" name="rudtype_id" placeholder="Rudraksha Type ID" readonly>
          </div>
          <div class="input-box" style="visibility:hidden ;height: 0px;">
            <span class="details">Suggested Selling Price (INR)</span>
            <input type="float" id="result2" name="sspi" placeholder="Suggested Selling Price in INR" readonly>
          </div>



        </div>




        <div class="input-box">
          <input type="radio" name="quality" value="Premium" id="dot-1">
          <input type="radio" name="quality" value="Wholesale" id="dot-2">

          <span name="quality" class="quality-title">Quality</span>

          <div class="category">

            <label name="quality" for="dot-1">
              <span class="dot one"></span>
              <span class="quality">Premium</span>
            </label>

            <label name="quality" for="dot-2">
              <span class="dot two"></span>
              <span class="quality">WholeSale</span>
            </label>

          </div><br>

        </div>
        <div class="rudraksha-details">
          <div class="comment">
            <span class="details">
              <h3>Vendor Information </h3>
            </span>
            <input type="varchar" name="vendor_information" placeholder="Enter Vendor Information" required>
          </div><br>
          <div class="comment">
            <span class="details">
              <h3>Comment </h3>
            </span>
            <input type="varchar" name="comment" placeholder="Enter Comment" required>
          </div><br><br>
        </div>




        <div class="button">

          <input type="submit" name="save" value="Submit">
        </div>


      </form>

    </div>
  </div>
  <script>
    const selectField = document.getElementById("rudraksha");
    const inputField = document.getElementById("type_id");

    selectField.addEventListener('change', () => {
      switch (selectField.value) {
        case '0 Mukhi':
          inputField.value = 1;
          break;
        case '1 Mukhi-Savar':
          inputField.value = 2;
          break;
        case '1 Mukhi-Round':
          inputField.value = 3;
          break;
        case '1 Mukhi-Moon':
          inputField.value = 4;
          break;
        case '2 Mukhi':
          inputField.value = 5;
          break;
        case '3 Mukhi':
          inputField.value = 6;
          break;
        case '4 Mukhi':
          inputField.value = 7;
          break;
        case '5 Mukhi':
          inputField.value = 8;
          break;
        case '6 Mukhi':
          inputField.value = 9;
          break;
        case '7 Mukhi':
          inputField.value = 10;
          break;
        case '8 Mukhi':
          inputField.value = 11;
          break;
        case '9 Mukhi':
          inputField.value = 12;
          break;
        case '10 Mukhi':
          inputField.value = 13;
          break;
        case '11 Mukhi':
          inputField.value = 14;
          break;
        case '12 Mukhi':
          inputField.value = 15;
          break;
        case '13 Mukhi':
          inputField.value = 16;
          break;
        case '14 Mukhi':
          inputField.value = 17;
          break;
        case '15 Mukhi':
          inputField.value = 18;
          break;
        case '16 Mukhi':
          inputField.value = 19;
          break;
        case '17 Mukhi':
          inputField.value = 20;
          break;
        case '18 Mukhi':
          inputField.value = 21;
          break;
        case '19 Mukhi':
          inputField.value = 22;
          break;
        case '20 Mukhi':
          inputField.value = 23;
          break;
        case '21 Mukhi':
          inputField.value = 24;
          break;
        case '22 Mukhi':
          inputField.value = 25;
          break;
        case '23 Mukhi':
          inputField.value = 26;
          break;
        case '24 Mukhi':
          inputField.value = 27;
          break;
        case '25 Mukhi':
          inputField.value = 28;
          break;
        case '26 Mukhi':
          inputField.value = 29;
          break;
        case 'Custom':
          inputField.value = 30;
          break;
        default:
          inputField.value = '';
      }
    });
  </script>
</body>


</html>