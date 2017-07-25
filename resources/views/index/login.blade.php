<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>login</title>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
   <title>Aplikasi Agenda</title>

   <!-- Bootstrap -->
   <link href="http://localhost:8000/css/bootstrap.min.css" rel="stylesheet">
   <link href="http://localhost:8000/css/custom.css" rel="stylesheet">
   <link rel="stylesheet" href="http://localhost:8000/font-awesome/css/font-awesome.min.css">

   <!-- Google Fonts -->
   <link href="https://fonts.googleapis.com/css?family=Roboto|Cabin" rel="stylesheet">

   <!-- JQuery DataTable Css -->
   <link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">
   <link href="https://cdn.datatables.net/rowreorder/1.2.0/css/rowReorder.dataTables.min.css" rel="stylesheet">
   <link href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.dataTables.min.css" rel="stylesheet">

   <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
   <!--[if lt IE 9]>
     <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
     <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
   <![endif]-->
  </head>
  <body style="background-color: #565C63;">
    <div class="logo">
        <a href="javascript:void(0);">Aplikasi <b>Agenda</b></a>
    </div>
    <div class="kartu">
      <form id="kartu" action="{{url('/login')}}" method="post">
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1"><i class="fa fa-user-o fa-fw fa-lg" aria-hidden="true"></i></span>
          <input type="text" name="name"class="form-control" placeholder="Username"><br>
        </div>
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1"><i class="fa fa-lock fa-fw fa-lg" aria-hidden="true"></i></span>
          <input type="password" name="pass" class="form-control" placeholder="Password"><br>
        </div>
        <div class="btn">
        {{ csrf_field() }}
        <input class="btn btn-success" type="submit" name="kirim" value="MASUK">
      </div>
      </form>
    </div>

    <div class="logo">
            <small>© Copyright 2017 | Created by DEKA magang Team</small>
        </div>
  </body>
</html>
