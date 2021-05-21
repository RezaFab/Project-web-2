<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title><?= $title ?></title>
 
    <!-- Favicon  -->
    <link rel="icon" href="<?= base_url('assets/img/icon.png') ?>" type="image/png">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/user/css/core-style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/user/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/user/css/style.css') ?>">
    <link href="<?= base_url('assets/user/jquery.gScrollingCarousel.css') ?>" rel="stylesheet" />
    

</head>

<body>
    <!-- ##### Header Area Start ##### -->
    <header class="header_area">
        <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
            <!-- Classy Menu -->
            <nav class="classy-navbar" id="essenceNav">
                <a class="nav-brand" href="#"><img style="width: 100px;" src="<?= base_url('assets/img/logo-kartuidcard-blue.png') ?>" alt="..."></a>
            </nav>

            <!-- Header Meta Data -->
            <div class="header-meta d-flex clearfix justify-content-end">
                <!-- Search Area -->
                
                <!-- Favourite Area -->
                <div class="favourite-area create">
                </div>
                    <div class="cart-area">
                    <?php if(isset($_GET['key'])): ?>
                  <div class="search-area"> 
                  <form class="search_form" action="<?= base_url('Search') ?>" method="get">
                        <input type="search" class="search" name="key" id="headerSearch" placeholder="Type for search">
                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>
                <?php else: ?>
                  <div id="cari" style="display: none;" class="search-area">
                  <form class="search_form" action="<?= base_url('Search') ?>" method="get">
                        <input type="search" class="search" name="key" id="headerSearch" placeholder="Type for search">
                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>
                <?php endif ?>
                </div>
            </div>

        </div>
    </header>
    <!-- ##### Header Area End ##### -->


<script>
function myFunction() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
</script>