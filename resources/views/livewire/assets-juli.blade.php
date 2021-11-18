<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="MrDotS Dashboard">
<meta name="keywords" content="admin,dashboard">
<meta name="author" content="stacks">
<!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

<!-- Styles -->
<link href="https://fonts.googleapis.com/css?family=Lato:400,700,900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
<link href="{{url('backend/dashboard/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{url('backend/dashboard/assets/plugins/font-awesome/css/all.min.css')}}" rel="stylesheet">


<!-- Theme Styles -->
<link href="{{url('backend/dashboard/assets/css/connect.min.css')}}" rel="stylesheet">
<link href="{{url('backend/dashboard/assets/css/dark_theme.css')}}" rel="stylesheet">
<link href="{{url('backend/dashboard/assets/css/custom.css')}}" rel="stylesheet">

<style>
  .required:after {
    content:" *";
    color: red;
  }

.fileName {
    font-family: Arial;
    font-size:14px;
}

</style>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->