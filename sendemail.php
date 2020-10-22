<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Austin Cornell | About</title>

<!--Import Google Icon Font-->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cantarell">
<link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@700&display=swap" rel="stylesheet">
<!--Set Icon-->
<link rel="icon" href="images/austinLogoBlack.png">
<!--Import materialize.css-->
<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
<link rel="stylesheet" href="index.css"/>

<!--Let browser know website is optimized for mobile-->
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>

<!--Navbar-->
<div class="navbar-fixed">
  <nav>
    <div class="nav-wrapper red darken-4 z-depth-4">
        <a class="brand-logo" href="index.html" style="text-transform: none">
          <div class="text">
            <div class="typewrite" data-period="2000" data-type='[ "Austin Cornell", "Informatics", "Business", "Computer Science" ]' style="font-family: 'Source Code Pro', monospace; font-size: min(4vw,28px); "></div>
          </div>
        </a>
		<a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="education.html" class="hvr-underline-from-center"><i class="material-icons left">local_library</i>education</a></li>
        <li><a href="work_history.html" class="hvr-underline-from-center"><i class="material-icons left">info</i>about me</a></li>
        <li><a href="work_history.html" class="hvr-underline-from-center"><i class="material-icons left">mode_edit</i>work history</a></li>
        <li><a href="contact.html" class="hvr-pulse waves-effect waves-red btn white red-text text-darken-4 modal-trigger"><i class="material-icons left">email</i>contact me</a></li>
      </ul>
    </div>
  </nav>
</div>

<ul class="sidenav" id="mobile-demo">
	<li><a class="hvr-underline-from-center-red" href="index.html"><i class="material-icons left">home</i>home</a></li>
<li><a class="hvr-underline-from-center-red" href="education.html"><i class="material-icons left">local_library</i>education</a></li>
        <li><a class="hvr-underline-from-center-red" href="about.html"><i class="material-icons left">info</i>about me</a></li>
        <li><a class="hvr-underline-from-center-red" href="work_history.html"><i class="material-icons left">mode_edit</i>work history</a></li>
        <li class="white-text"><a href="contact.html" class="hvr-pulse white-text waves-effect waves-red btn red darken-4">contact me</a></li>
  </ul>

<!--Body of webpage-->
<div class="section white">
  <div class="row container ">
    <div class="col s12 m12">
      <h2 class="header">Thanks for reaching out, <?php echo $_POST["fullname"];?>.</h2>
		<hr/>
      <p class="grey-text text-darken-3">I'll try to get back to you ASAP. The email I'll reach out to is <b><?php echo $_POST["email"]; ?></b>. Below is the full copy of your responses:</p>
      <hr/>

    </div>

  </div>

  <div class="container">
      <div class="row">
          <div class="col s12 m6">
              <h5 class="header">Name </h5>
          </div>
          <div class="col s12 m6">
              <p><?php echo $_POST["fullname"]; ?></p>
          </div>

      </div>
      <div class="row">
          <div class="col s12 m6">
              <h5 class="header">Email </h5>
          </div>
          <div class="col s12 m6">
              <p><?php echo $_POST["email"]; ?></p>
          </div>

      </div>
      <div class="row">
          <div class="col s12 m6">
              <h5 class="header">Company </h5>
          </div>
          <div class="col s12 m6">
              <p><?php echo $_POST["company"]; ?></p>
          </div>

      </div>
      <div class="row">
          <div class="col s12 m6">
              <h5 class="header">Response </h5>
          </div>
          <div class="col s12 m6">
              <p><?php echo $_POST["response"]; ?></p>
          </div>

      </div>
      <hr/>
      <br/><br/><br/>
      <center>
      <img width="200px" src="images/greencheck.gif" alt="greencheck" class="circle"/>
    </center>
    <?php
    $today = date("F j, Y, g:i a");
    $to = $_POST["email"];
    $name = $_POST["fullname"];
    $company = $_POST["company"];
    $response = $_POST["response"];


    $subject = "Thanks for contacting me, " . $name;
    $headers = "From: Austin Cornell <www-data@test-instance-1.us-central1-a.c.inspiring-ring-281403.internal>" . PHP_EOL . "Reply-To: Austin Cornell <www-data@test-instance-1.us-central1-a.c.inspiring-ring-281403.internal>" . PHP_EOL . "X-Mailer: PHP/" . phpversion() . PHP_EOL;
    $headers .= "MIME-Version: 1.0" . PHP_EOL;
    $headers .= "Content-type:text/html;charset=UTF-8" . PHP.EOL;
    $message = "
                <html>
                <head>
                <title>Thanks for reaching out...</title>
                </head>
                <body>
                <h3 style='color: darkred;'> Thanks for reaching out. </h3>
                <p style='color: grey;'><i>Here is a copy of your responses. Please do not reply to this email: </i></p>
                <h4>Name</h4>
                <p style='color: grey;'>{$name}</p>
                <hr/>
                <h4>Email</h4>
                <p style='color: grey;'>{$to}</p>
                <hr/>
                <h4>Company</h4>
                <p style='color: grey;'>{$company}</p>
                <hr/>
                <h4>Response</h4>
                <p style='color: grey;'>{$response}</p>
                <br/><hr/>
                <p style='color: grey;'><i>This email is automated. I will attempt to respond as quickly as possible. Generated on {$today} </i></p>
                </body>
                </html>
                ";

    mail($to, $subject, $message, $headers);
    mail("richardmcornell@gmail.com","{$name} has emailed you.", $message, $headers)

       ?>


  </div>


<!--Extra Scripts-->
<script type="text/javascript" src="js/materialize.min.js"></script>
<script src="js/dist/clipboard.min.js"></script>
<script src="js/animate.js"></script>
<script>
	 document.addEventListener('DOMContentLoaded', function() {
	var elems4 = document.querySelectorAll('.sidenav');
    var instances4 = M.Sidenav.init(elems4);
    var elems = document.querySelectorAll('.materialboxed');
    var instances = M.Materialbox.init(elems);
	var elems2 = document.querySelectorAll('.collapsible');
    var instances2 = M.Collapsible.init(elems2);
	var elems3 = document.querySelectorAll('.modal');
    var instances3 = M.Modal.init(elems3);
    var elems5 = document.querySelectorAll('.slider');
    var instances5 = M.Slider.init(elems5);
  });


	</script>

</body>
</html>
