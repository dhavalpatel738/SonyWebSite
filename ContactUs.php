<?php
    /**
    * Encode an email address to display on your website
    */
    function encode_email_address( $email ) {
     $output = '';
     for ($i = 0; $i < strlen($email); $i++)
     {
          $output .= '&#'.ord($email[$i]).';';
     }
     return $output;
    }

    $error = ""; $successMessage = "";

    if ($_POST) {

        if (!$_POST["email"]) {

            $error .= "An email address is required.<br>";

        }

        if (!$_POST["content"]) {

            $error .= "The message field is required.<br>";

        }


        if ($_POST['email'] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {

            $error .= "The email address is invalid.<br>";

        }

        if ($error != "") {

            $error = '<div class="alert alert-danger" role="alert"><p>There were error(s) in your form:</p>' . $error . '</div>';

        } else {

            $emailTo = "office@sonyceramics.com";

            $subject = $_POST['name'];

            $content = $_POST['content'];

            $headers = "From: ".$_POST['email'];

            if (mail($emailTo, $subject, $content, $headers)) {

                $successMessage = '<div class="alert alert-success" role="alert">Your message was sent, we\'ll get back to you ASAP!</div>';


            } else {

                $error = '<div class="alert alert-danger" role="alert"><p><strong>Your message couldn\'t be sent - please try again later</div>';

            }
        }
    }

?>

<!doctype html>
<html lang="en">
  <head>

      <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-113301141-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-113301141-1');
    </script>

      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="Sony ceramics wall tiles manufacturing plant is located at Matel Road, Dhuva.">
      <meta name="keywords" content="ceramic wall tiles, wall tiles, ceramic tiles, tiles, kitchen tiles, bathroom tiles, parking tiles">

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

      <link rel="stylesheet" href="Images/font-awesome/css/font-awesome.min.css">
      <link rel="stylesheet" href="css/jquery-ui.css">

      <link rel="shortcut icon" href="Images/favicon.ico"/>
      <title>Sony Ceramics | Contact us</title>

      <style type="text/css">

          #brandImg {
              width: 180px;
              height:  50px;
          }

          .ui-autocomplete {
            max-height: 150px;
            overflow-y: auto;
            overflow-x: hidden;
          }

/*
          body {
            background-color: black;
            color: white;
          }

          .card {
            background-color: black;
          }
*/
      </style>
  </head>
  <body>

      <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #000000;">
      <a class="navbar-brand" href="index.html">
        <img src="Images/logo.jpeg" id="brandImg">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Gallary
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="LightDarkSeries.html">Light Dark Series</a>
                <!--div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">White Series</a-->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="KitchenSeries.html">Kitchen Series</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="ElevationSeries.html">Elevation Series</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="PosterTiles.html">Poster Tiles</a
            </div>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="ContactUs.php">Contact us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="online-catalogue/">View Catalogue</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="search.html" method="get">
          <input id="search" class="form-control mr-sm-2" type="search" placeholder="Search Design" aria-label="Search" name="design">
          <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
      </nav>

      <div class="container-fluid">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3680.1585939927595!2d70.9426583140378!3d22.72234593318581!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395991053cecc553%3A0x1c65fddaf5b3a77d!2sSony+Ceramics!5e0!3m2!1sen!2sin!4v1516529918104" width="100%" height="350px" frameborder="0" style="border:0;" allowfullscreen></iframe>
    </div>

      <!-- Contact Form -->
      <div class="container">
        <h4>We look forward to hearing from you!</h4>

        <div id="error"><?php echo $error.$successMessage; ?></div>
        <h6>Contact form</h6>
        <p>Fields marked with an <span style="color: red;">*</span> are required</p>
      <form method="post">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputName">Name <span style="color: red;">*</span></label>
          <input type="text" class="form-control" id="inputName" name="name" placeholder="Name">
        </div>
        <div class="form-group col-md-6">
            <label for="inputEmail">Email <span style="color: red;">*</span></label>
            <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email">
        </div>
      </div>
      <div class="form-group">
        <label for="inputText">Message <span style="color: red;">*</span></label>
        <textarea class="form-control" id="inputText" name="content" rows="7"></textarea>
      </div>
      <button type="submit" id="contact-form-submit" class="btn btn-dark">Submit</button>
    </form>
  </div><hr>

      <div class="container mt-4 mb-4">
      <div class="card-deck">
      <div class="card">
        <div class="card-body">

            <h5 class="card-title"><i class="fa fa-address-book" aria-hidden="true"></i> Address</h5>
            <p class="card-text"><span style="color: red;"><strong>SONY </strong></span>Ceramics, Matel Road, Dhuva-363622</p>
            <p class="card-text"><i class="fa fa-envelope-open-o" aria-hidden="true"></i>
              <?php
              $encodedEmail = encode_email_address( 'office@sonyceramics.com' );
              printf('%s', $encodedEmail);
              ?>
            </p>

        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">
            Get a copy of Product Catalogue here
          </h5>
          <p class="card-text">
              <a href="Sony ceramics 15x10 catalogue.pdf" class="btn btn-dark btn-lg" download>
                <i class="fa fa-cloud-download"></i>
                Download Now
                <!-- img src="Images/downloadNow.png" -->
              </a>
          </p>

        </div>
      </div>

    </div>
    </div>

      <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #000000;">

        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item">
            <p class="text-secondary">Copyright <i class="fa fa-copyright" aria-hidden="true"></i> 2018 <a href="http://www.sonyceramics.com" style="text-decoration: none;"><span class="text-secondary font-weight-bold">Sony Ceramics</span></a>. All rights reserved.</p>
            <p class="text-secondary">Made with <i class="fa fa-heart" aria-hidden="true"></i> & <i class="fa fa-coffee" aria-hidden="true"></i>  in Morvi, Gujarat</p>
          </li>
        </ul>

    </nav>




    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="js/jquery.js"></script>
      <!--script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-
        KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

      <script src="js/jquery-ui.js"></script>
      <script src="items.js"></script>
      <script src="autocomplete.js"></script>

      <script type="text/javascript">

        $('#contact-form-submit').click(function(e) {
          //e.preventDefault();

              var error = "";

              if ($("#inputEmail").val() == "") {

                  error += "The email field is required.<br>"

              }

              if ($("#inputName").val() == "") {

                  error += "The name field is required.<br>"

              }

              if ($("#inputText").val() == "") {

                  error += "The message field is required.<br>"

              }

              if (error != "") {

                 $("#error").html('<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form:</strong></p>' + error + '</div>');

                  return false;

              } else {

                  $("#error").html();
                  return true;

              }

        });

      </script>

      <!--Start of Tawk.to Script-->
      <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5ae000d25f7cdf4f05339676/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
      </script>
      <!--End of Tawk.to Script-->
  </body>
</html>
