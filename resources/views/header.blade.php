<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Football Championship</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link href="{{asset('bootstrap3/css/bootstrap.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/ct-paper.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets/css/demo.css')}}" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>

</head>
<body>
<nav class="navbar navbar-ct-transparent" role="navigation-demo" id="demo-navbar">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="">
           <div class="logo-container">
                <div class="logo">
                    <img src="{{asset('assets/paper_img/logoo.png')}}" alt="Tim Logo">
                </div>
                <div class="brand">
                    Football XYZ
                </div>
            </div>
      </a>
    </div>

    <div class="collapse navbar-collapse" id="navigation-example-2">
      <ul class="nav navbar-nav navbar-right">
          <li>
            <a href="/" class="btn btn-danger btn-simple">Home</a>
          </li>
          <li>
            <a href="/tim" class="btn btn-danger btn-simple">Tim</a>
          </li>
          <!-- <li>
            <a href="/pemain" class="btn btn-danger btn-simple">Pemain</a>
          </li>
          <li>
            <a href="/pertandingan" class="btn btn-danger btn-simple">Pertandingan</a>
          </li> -->
       </ul>
    </div>
  </div>
</nav>
