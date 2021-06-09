<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Austin Cornell | Contact</title>
  <?php session_start();
  if (!isset($_SESSION["email"])) {
    header("Location: contact.html");
    exit();
  }
  ?>
  <!--Import Google Font-->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Ramabhadra&family=Roboto&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!--Set Icon-->
  <link rel="icon" href="images/austinLogoBlack.png">

  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />

  <!--CSS-->
  <link rel="stylesheet" href="css/styles.css" />

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>

  <!--Nav bar-->
  <div class="navbar-fixed">
    <nav>
      <div class="nav-wrapper red darken-4 z-depth-4">
        <a href="#" data-target="mobile-demo" class="sidenav-trigger">
          <i class="material-icons">menu</i>
        </a>
        <a class="show-on-medium-and-down center" href="index.html" style="display: none; width: 200px; margin: 0 auto;"><img width="90px" src="images/logo-white.png" style="margin-top: 15px;"></a>
        <div class="flex hide-on-med-and-down">
          <a class="hvr-underline-from-center" href="education.html"><i class="material-icons left">local_library</i>education</a>
          <a class="hvr-underline-from-center" href="work_history.html"><i class="material-icons left">mode_edit</i>work history</a>
          <a class="hvr-underline-from-center" href="index.html"><img width="90px" src="images/logo-white.png" style="margin-top: 15px"></a>
          <a class="hvr-underline-from-center" href="about.html"><i class="material-icons left">info</i>about me</a>
          <a class="hvr-underline-from-center" href="contact.html"><i class="material-icons left">email</i>contact</a>
        </div>
      </div>
    </nav>
  </div>

  <!--Mobile Menu-->
  <ul class="sidenav" id="mobile-demo">
    <li class="active"><a class="hvr-underline-from-center-red" href="index.html"><i class="material-icons left">home</i>home</a></li>
    <li><a class="hvr-underline-from-center-red" href="education.html"><i class="material-icons left">local_library</i>education</a></li>
    <li><a class="hvr-underline-from-center-red" href="about.html"><i class="material-icons left">info</i>about me</a></li>
    <li><a class="hvr-underline-from-center-red" href="work_history.html"><i class="material-icons left">mode_edit</i>work history</a></li>
    <li class="white-text"><a href="contact.html" class="hvr-pulse white-text waves-effect waves-red btn red darken-4">contact me</a></li>
  </ul>

  <!--Body of webpage-->
  <div class="parallax-container">
    <div class="parallax"><img style="opacity: 1;" src="images/email-image.png" alt="Email Image"></div>
  </div>
  <div class="section white">
    <div class="row container ">
      <div class="col s12 m12">
        <h2 class="header">Thanks for reaching out, <?php echo $_SESSION["fullname"]; ?>.</h2>
        <div class="style-line"></div>
        <p class="grey-text text-darken-3">I'll try to get back to you ASAP. The email I'll reach out to is <b><?php echo $_SESSION["email"]; ?></b>. Below is the full copy of your responses:</p>

      </div>

    </div>

    <div class="container">
      <div class="row">
        <div class="col s12 m6">
          <h5 class="header">Name </h5>
        </div>
        <div class="col s12 m6">
          <p><?php echo $_SESSION["fullname"]; ?></p>
        </div>

      </div>
      <div class="row">
        <div class="col s12 m6">
          <h5 class="header">Email </h5>
        </div>
        <div class="col s12 m6">
          <p><?php echo $_SESSION["email"]; ?></p>
        </div>

      </div>
      <div class="row">
        <div class="col s12 m6">
          <h5 class="header">Company </h5>
        </div>
        <div class="col s12 m6">
          <p><?php echo $_SESSION["company"]; ?></p>
        </div>

      </div>
      <div class="row">
        <div class="col s12 m6">
          <h5 class="header">Response </h5>
        </div>
        <div class="col s12 m6">
          <p><?php echo $_SESSION["response"]; ?></p>
        </div>

      </div>
      
        <img style="width: 200px; margin: 0 auto; display: block; margin-top: 50px; margin-bottom: 50px;" src="images/greencheck.gif" alt="greencheck" class="circle" />
      
      <?php


      $today = date("F j, Y, g:i a");
      $to = $_SESSION["email"];
      $name = $_SESSION["fullname"];
      $company = $_SESSION["company"];
      $response = $_SESSION["response"];

      // Import PHPMailer classes into the global namespace
      // These must be at the top of your script, not inside a function
      use PHPMailer\PHPMailer\PHPMailer;
      use PHPMailer\PHPMailer\Exception;

      // If necessary, modify the path in the require statement below to refer to the
      // location of your Composer autoload.php file.
      require 'vendor/autoload.php';
      require 'private_info.php';


      // The subject line of the email
      $subject = "{$name} has emailed you.";

      // The plain-text body of the email
      $bodyText =  "{$name},{$to},{$company},{$response},{$today}";

      // The HTML-formatted body of the email
      $bodyHtml = "
                <html>
                <head>
                <title>Thanks for reaching out...</title>
                </head>
                <body>
                <h3 style='color: darkred;'> Thanks for reaching out. </h3>
                <p style='color: grey;'><i>Here is a copy of their responses. Please do not reply to this email: </i></p>
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
                <p style='color: grey;'><i>This email is automated. Generated on {$today} </i></p>
                </body>
                </html>
                ";

      $mail = new PHPMailer(true);

      try {
        // Specify the SMTP settings.
        $mail->isSMTP();
        $mail->setFrom(SENDER, SENDER_NAME);
        $mail->Username   = USERNAME_SMTP;
        $mail->Password   = PASSWORD_SMTP;
        $mail->Host       = HOST;
        $mail->Port       = PORT;
        $mail->SMTPAuth   = true;
        $mail->SMTPSecure = 'tls';
        $mail->addCustomHeader('X-SES-CONFIGURATION-SET', $configurationSet);

        // Specify the message recipients.
        $mail->addAddress(RECIEPIENT);
        // You can also add CC, BCC, and additional To recipients here.

        // Specify the content of the message.
        $mail->isHTML(true);
        $mail->Subject    = $subject;
        $mail->Body       = $bodyHtml;
        $mail->AltBody    = $bodyText;
        $mail->Send();
      } catch (phpmailerException $e) {
        echo "An error occurred. {$e->errorMessage()}", PHP_EOL; //Catch errors from PHPMailer.
      } catch (Exception $e) {
        echo "Email not sent. {$mail->ErrorInfo}", PHP_EOL; //Catch errors from Amazon SES.
      }
      session_unset();
      session_destroy();



      ?>


    </div>
  </div>
  <div class="parallax-container">
    <div class="parallax"><img style="opacity: 1;" src="images/email-image.png" alt="Email Image"></div>
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
      var elems6 = document.querySelectorAll('.parallax');
      var instances6 = M.Parallax.init(elems6);
    });
  </script>

</body>

</html>