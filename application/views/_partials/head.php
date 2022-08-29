<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b2/Bootstrap_logo.svg/512px-Bootstrap_logo.svg.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">


    <!-- <link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.css') ?>">  -->
    
    <!-- Flickity  -->
    <!-- <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css"> -->

    <!-- Manual CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/mdb5/css/mdb.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/mdb5/js/mdb.min.js') ?>">
    
    <link rel="stylesheet" href="<?= base_url('assets/multiselect-20/css/chosen.css') ?>">
    
    <!-- Style -->
    <link rel="stylesheet" href="<?= base_url('assets/multiselect-20/css/style.css') ?>">
    
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css"> -->
    <link rel="stylesheet" href="<?= base_url('assets/style.css') ?>">
    <link src="<?= base_url('assets/flickity.min.css') ?>"></link>
    <link src="<?= base_url('assets/dataTables.min.css') ?>"></link>
    <link src="<?= base_url('assets/dataTables.bootstrap5.min.css') ?>"></link>


  </head>
  <style>
    body{
      font-family: monospace;
    }
    @media print {
  body * {
    visibility: hidden;
  }
  #print{
    visibility: visible;
  }
}

    .shadow-box{
  box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
}
    .sidebar{
      width:200px;
      transition:ease 1s ;
    }
    .sidebar2{
      width:75px;
    }

    .side_drop{
      display: none;
    }

    .side_drop1{
      display: block;
    }
    
    .caret{
      transition: transform 1s;
    }
    .caret1{
      transition: transform 1s;
      transform: rotate(-180deg);
    }

    .side_caret{
      display: none;
    }

    .side_caret1{
      display: block;
    }
    
    .caret_laporan{
      transition: transform 1s;
    }
    .caret_laporan1{
      transition: transform 1s;
      transform: rotate(-180deg);
    }

    .p1{
      transition: transform 1s;
    }
    .p2{
      transition: transform 1s;
      transform: rotate(-180deg);
    }

    .h1{
      display: none;
    }

    .h2{
      display: block;
    }
  </style>
<body>
