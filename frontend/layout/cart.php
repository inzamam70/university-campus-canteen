<?php include_once($_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'config.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Home page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous" >
     <link rel="stylesheet" href="../global_assets/css/cart.css">
</head>
<body style="background-color: rgb(219, 226, 226);">

<?php include_once($partialfrontend.'navfrontend.php'); ?>

<section class=" mx-5 my-4 pt-5 ">
    <div class="container-fluid ">
        <div class="card mx-auto mt-5 shadow-lg rounded-0" style="width: 40rem;">
            <div class="card-header">
                Cart
            </div>
            <div class="card-body">
                <table class="table table-primary">
                    <thead>
                        <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Item</th>
                        <th>Price</th>
                        <th class="text-center">Quantity</th>
                        <th>Manage</th>
                    </tr>
                    </thead>
                    <tbody class="table-light">
                        <tr>
                            <td>1</td>
                            <td><img src="../global_assets/img/product1.jpg" class="" style="width: 30px;"></td>
                            <td>Corn Shup</td>
                            <td>
                                ৳<span class="price">10</span>
                                <input type="hidden" name="txtPrice" value=10>
                                <input type="hidden" name="totalTxtPrice" value=0>
                            </td>
                            <td class="text-center">
                                <i class="bi bi-cart-dash"></i>&nbsp;<input name="item" value=0 size="2">&nbsp<i class="bi bi-cart-plus-fill text-primary"></i>
                                <input type="hidden" name="txtItem" class="text-center" value=0>
                            </td>
                            <td><i class="fa-solid fa-trash-can ps-lg-3 " style="color: red;"></i></td>

                        </tr>

                        <tr>
                            <td>2</td>
                            <td><img src="../global_assets/img/product2.jpg" style="width: 30px;"></td>
                            <td>Rice</td>
                            <td>
                                ৳<span class="price">15</span>
                                <input type="hidden" name="txtPrice" value=15>
                                <input type="hidden" name="totalTxtPrice" value=0>
                            </td>
                            <td class="text-center">
                                <i class="bi bi-cart-dash"></i>&nbsp;<input name="item" value=0 size="2">&nbsp;<i class="bi bi-cart-plus-fill text-primary"></i>
                                <input type="hidden" name="txtItem" class="text-center" value=0>
                            </td>
                            <td><i class="fa-solid fa-trash-can ps-lg-3 " style="color: red;"></i></td>
                        </tr>
                        <tr >
                            <td colspan="3" class="text-end">Total Amount : </td>
                            <td>৳<span class="totalAmount">0</span></td>
                            <td colspan="3" class="text-center">Total quantity :  <span class="totalQuantity">0</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </section>




              
          




     <?php include_once($partialfrontend.'footer.php');?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous" ></script>



</body>
</html>