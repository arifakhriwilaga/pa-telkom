<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo base_url('assets/images/home/header/logo-icon.png'); ?>" rel="shortcut icon"/>
    <title>KESDIKA | <?php echo $page_title; ?></title>

  <style type="text/css">
    @font-face {
      font-family: 'robotoregular';
      src : <?php echo base_url('/assets/fonts/roboto-regular.woff') ?>;
      font-weight: normal;
      font-style: normal;
    }

    html { font-family: Helvetica; }

    @page {
      margin-top: 3cm;
      margin-left: 3cm;
      margin-right: 3cm;
      margin-bottom: 3cm;
    }

    #outtable{
      padding: 20px;
      border:1px solid #e3e3e3;
      width:600px;
      border-radius: 5px;
    }
 
    .short{
      width: 50px;
    }
 
    .normal{
      width: 150px;
    }
 
    table{
      border-collapse: collapse;
      font-family: 'robotoregular';
    }

    thead th{
      text-align: left;
      padding: 10px;
    }
 
    tbody td{
      border-top: 1px solid #e3e3e3;
      padding: 10px;
    }
 
    tbody tr:nth-child(even){
    }
 
    tbody tr:hover{
    }
    .pull-right {
      float: right !important;
    }
  </style>
</head>
<body>
    <section class="main-content">
        <?php $this->load->view($_content); ?>
    </section>
</body>
</html>
