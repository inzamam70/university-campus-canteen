<?php include_once($_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.'config.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous" >
     <link rel="stylesheet" href="../global_assets/css/contact.css">
</head>
<body>

<?php include_once($partialfrontend.'navfrontend.php'); ?>


      <section class="form mx-5 my-4 pt-5 ">
        <div class="container ">
            <div class="row d-flex justify-content-center">
               
                <div class="col-lg-7 px-5 pt-5 ">
                    <h1 class="font-weight-bold py-3 d-flex justify-content-center" style="color: white;">Campus Canteen</h1>
                    <h4 class="d-flex justify-content-center" style="color: white;">Contact Us</h4>
                    <form action="">

                        <div class="col-md-12">
                            <div class="mb-3">
                                <input type="email" placeholder="Email-Address" class="form-control my-2 p-2">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <input type="email" placeholder="Email-Address" class="form-control my-2 p-2">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                              <textarea rows="3" required class="form-control" placeholder="Your Text Here.."></textarea>
                            </div>
                          </div>
                       
                          <button type="button" class="btn1 mt-3 mb-5">Send Now</button>
                       
                    </form>
                </div>
            </div>
        </div>
    </section>

              
          




    <?php include_once($partialfrontend.'footer.php');?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous" ></script>



</body>
</html>