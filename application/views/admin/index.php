<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Water is life</title>

  <!-- Reset -->
  <link rel="stylesheet" type="text/css" href="./assets/css/reset.css">

  <!-- Bootstrap -->
  <link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- Fontawesome -->
  <link rel="stylesheet" type="text/css" href="./assets/fontawesome/css/fontawesome.min.css">
  <link rel="stylesheet" type="text/css" href="./assets/fontawesome/css/regular.min.css">
  <link rel="stylesheet" type="text/css" href="./assets/fontawesome/css/solid.min.css">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Animate -->
  <link rel="stylesheet" type="text/css" href="./assets/css/animate.css">

  <!-- Owl Carousel -->
  <link rel="stylesheet" type="text/css" href="./assets/css/owl.carousel.min.css">
  <link rel="stylesheet" type="text/css" href="./assets/css/owl.theme.default.min.css">

  <!-- Validator Theme -->
  <link rel="stylesheet" type="text/css" href="./assets/css/theme-default.min.css">

  <!-- Skitter -->
  <link rel="stylesheet" type="text/css" href="./assets/css/skitter.css">

  <!-- Custom styles for this template-->
  <link href="./assets/css/admin.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
      <?php include 'includes/sidebar.php'; ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
          <?php include 'includes/topbar.php'; ?>
        <!-- End of Topbar -->


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <?php 

            switch ($page) {
              case 'home':
                include_once 'includes/home.php';
                break;

              case 'about':
                include_once 'includes/about.php';
                break;

              case 'contact':
                include_once 'includes/contact.php';
                break;

              case 'products':
                include_once 'includes/products.php';
                break;

              case 'newsletter':
                include_once 'includes/newsletter.php';
                break;

              case 'policy':
                include_once 'includes/policy.php';
                break;

              case 'testimonials':
                include_once 'includes/testimonials.php';
                break;

              case 'admin':
                include_once 'includes/admin.php';
                break;

              case 'orders': 
                include_once 'includes/orders.php';
                break;

              default:
                include_once 'includes/404.php';
                break;
            }
          ?>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


      <!-- Footer -->
      <?php include_once 'includes/footer.php'; ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

<!-- JQuery -->
<script type="text/javascript"  src="./assets/js/jquery.min.js"></script>

<!-- Bootstrap JS -->
<script type="text/javascript" src="./assets/js/bootstrap.bundle.min.js"></script>

<!-- JQuery Datatable -->
<script type="text/javascript"  src="./assets/js/jquery.dataTables.min.js"></script>

<!-- Bootstrap Datatable -->
<script type="text/javascript"  src="./assets/js/dataTables.bootstrap4.min.js"></script>

<!-- Owl Carousel -->
<script type="text/javascript" src="./assets/js/owl.carousel.min.js"></script>

<!-- JQuery Easing -->
<script type="text/javascript" src="./assets/js/jquery.easing.js"></script>

<!-- JQuery Skitter -->
<script type="text/javascript" src="./assets/js/jquery.skitter.min.js"></script>

<!-- Validator JS -->
<script type="text/javascript" src="./assets/js/jquery.form-validator.min.js"></script>

<!-- Custom Script -->
<script type="text/javascript" src="./assets/js/script.js"></script>
</body>

</html>