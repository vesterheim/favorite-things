<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- Le styles -->
    <style type="text/css">
body {
  padding-bottom: 40px;
}	
.dl-horizontal dt {
 text-align:left;
 width:6em;
}
.dl-horizontal dd {
 margin-left:6em;
}
legend {
  border:0;
  color: #333;  
  display: block;
  font-size: 15px;
  font-weight: bold;
  line-height: 20px;
  margin-bottom:7px;
  padding: 0;
  width: 100%;
}
.rating_radio,
.rating_radio_label {
 padding:0 .5em;
}
    </style>

  </head>

  <body>

<?php $this->load->view('_partials/navigation'); ?>
    <div class="container">  
<?php $this->load->view('_partials/alerts'); ?>        
<?php $this->load->view($subview); ?>
    </div>

<?php $this->load->view('_partials/footer'); ?>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/assets/js/bootstrap.min.js"></script>
    <script>
      var _gaq=[['_setAccount','UA-1653553-1'],['_trackPageview']];
      (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
      g.src='//www.google-analytics.com/ga.js';
      s.parentNode.insertBefore(g,s)}(document,'script'));
    </script>    
  </body>
</html>




