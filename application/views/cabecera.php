<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?= esco_base_url(); ?>favicon.ico">
  <title>ESCO Panel de control</title>
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/fa/css/font-awesome.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/custom.css') ?>">
  <script src="<?= base_url('assets/js/jquery.js') ?>"></script>
  <script src="<?= base_url('assets/js/bootstrap.js') ?>"></script>
  <title></title>
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?= site_url('Dashboard/home') ?>"><img src="<?= esco_base_url(); ?>/favicon.ico" height="100%"></a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="font-size: 18px;">
      <ul class="nav navbar-nav">
        <li><a href="<?= site_url('Dashboard') ?>"><i class="fa fa-area-chart"></i> &nbsp; Lecturas de medidor</a></li>
        <li><a href="<?= site_url('Facturacion') ?>"><i class="fa fa-file-pdf-o"></i> &nbsp; Estado de cuenta</a></li>
        <li><a href="<?= site_url('Dashboard/home') ?>"><i class="fa fa-building-o"></i> &nbsp; Centros de carga</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?= site_url('Welcome') ?>"><i class="fa fa-power-off"></i> Salir</a></li>
      </ul>
    </div>
  </div>
</nav>


<div id="div_load_page" style="
  position: absolute;
  width: 100%;
  height: 100%;
  background: white;
  opacity: 0.8;
  z-index: 200;
  padding-top: 20%;
" hidden></div>