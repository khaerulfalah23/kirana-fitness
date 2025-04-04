<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>404 Page Not Found</title>
	<!-- General CSS Files -->
  <link rel="stylesheet" type="text/css" href="http://localhost/project/assets/dashboard/css/app.min.css">
	<!-- Template CSS -->
  <link rel="stylesheet" type="text/css" href="http://localhost/project/assets/dashboard/css/style.css">
  <link rel="stylesheet" type="text/css" href="http://localhost/project/assets/dashboard/css/components.css">
	<!-- Custom style CSS -->
  <link rel="stylesheet" type="text/css" href="http://localhost/project/assets/dashboard/css/custom.css">
	<link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="page-error">
          <div class="page-inner">
            <h1>404</h2>
            <div class="page-description">
							page not found
							<?php echo $message; ?>
            </div>
            <div class="page-search">
              <div class="mt-3">
                <a href="http://localhost/kirana-fitness">Back to Home</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="http://localhost/project/assets/dashboard/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="http://localhost/project/assets/dashboard/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="http://localhost/project/assets/dashboard/js/custom.js"></script>
</body>

</html>