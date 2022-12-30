<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>
    <link rel="stylesheet" href='https:/cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.1/css/bootstrap.min.css'/>
</head>
<body class="bg-dark">
    <div class="container" >
        <div class="row my-4">
            <div class="col-lg-10 mx-auto"></div>
            <div class="card shadow">
                <div class="card-header">
                    <h4>Add Items</h4>
                </div>
                <div class="card-body p-4">
                    <form action="#" method="post" id="add_form">
                        <div id="show_item">
                            <div class="row">
                                <div class="col-md-4  mb-3">
                                    <input type="text" name="product_name[]" class="form-control" placeholder="Item Name" required>
                                </div>

                                <div class="col-md-3  mb-3">
                                    <input type="number" name="product_price[]" class="form-control" placeholder="Item Price" required>
                                </div>

                                <div class="col-md-3 mb-3" >
                                    <input type="number" name="product_qty[]" class="form-control" placeholder="Item Quantity" required>
                                </div>

                                <div class="col-md-2 mb-3 d-grid">
                                    <button class="btn btn-success add_item_btn"> Add More</button>
                                </div>

                                

                            </div>
                        </div>
                        <div>
                            <input type="submit" value="Add" class="btn btn-primary w-25" id="add_btn">
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
    <script>
        $(document).ready(function () {
            $(".add_item_btn").click(function (e) {
                e.preventDefault();
                $(#show_item).prepend(`<div class="row">
                <div class="col-md-4  mb-3">
                                    <input type="text" name="product_name[]" class="form-control" placeholder="Item Name" required>
                                </div>

                                <div class="col-md-3  mb-3">
                                    <input type="number" name="product_price[]" class="form-control" placeholder="Item Price" required>
                                </div>

                                <div class="col-md-3 mb-3" >
                                    <input type="number" name="product_qty[]" class="form-control" placeholder="Item Quantity" required>
                                </div>

                                <div class="col-md-2 mb-3 d-grid">
                                    <button class="btn btn-danger remove_item_btn"> Remove</button>
                                </div>

                                

                            </div>`);
            });
        });
    </script>
</body>
</html>