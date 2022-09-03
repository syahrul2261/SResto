<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <link rel="icon" href="<?= base_url('assets/image/icon.png') ?>">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    
    <!-- Flickity CSS -->
    <link src="<?= base_url('assets/flickity.min.css') ?>"></link>
    
    <!-- Material Desain Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/mdb5/css/mdb.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/mdb5/js/mdb.min.js') ?>">

    <!-- Multi Select -->
    <link rel="stylesheet" href="<?= base_url('assets/multiselect-20/css/chosen.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/multiselect-20/css/style.css') ?>">
    
    <!-- DataTables -->
    <link src="<?= base_url('assets/dataTables.min.css') ?>"></link>
    <link src="<?= base_url('assets/dataTables.bootstrap5.min.css') ?>"></link>
    
    <!-- Manual CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/style.css') ?>">
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
    
    .side_caret_s{
      display: none;
    }
    
    .side_caret_s1{
      display: block;
    }
    
    .caret_laporan_s{
      transition: transform 1s;
    }
    .caret_laporan_s1{
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