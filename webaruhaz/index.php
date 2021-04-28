<?php
ob_start();
session_start();
require_once "Database/config.php";

?>
<!DOCTYPE html>
<html lang="hu">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>MagmaTech Számítástechnikai Webáruház</title>
<link rel="icon" href="logo/logo.png">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="Style/style.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</head>

<body>
<?php include "Navbars/nav.php"; ?>    
<div class="wrapper">
    <?php
        
        
            if(isset($_GET['page'])){
                include $_GET['page'];
            }else if(isset($_GET['categ'])){    
                    include "Products/products.php";  
            }else include "home.php";

        
            ?> 
          <div class="push"></div>
</div>

<?php include "Navbars/footer.php";?>

</body>
</html>