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

    <!--  IMPORT CONFIG FILE -->
      <?php include '../config.php'; ?>
      <?php
        echo file_get_contents(HEADER);
      ?>

  </head>
  <body>

    <?php
      echo file_get_contents(HEADER_NAVBAR_REDIRECTS);
    ?>

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
      <button type="submit" id="contact-form-submit" class="btn btn-light">Submit</button>
    </form>
  </div>

      <div class="container mt-4 mb-4">
      <div class="card-deck">
      <div class="card bg-light text-dark">
        <div class="card-body">

            <h5 class="card-text"><i class="fa fa-address-book" aria-hidden="true"></i> Address</h5>
            <hr>
            <p class="card-text"><span style="color: red;"><strong>SONY </strong></span>Ceramics, Matel Road, Dhuva-363622</p>
            <p class="card-text"><i class="fa fa-envelope-open-o" aria-hidden="true"></i>
              <?php
              $encodedEmail = encode_email_address( 'office@sonyceramics.com' );
              printf('%s', $encodedEmail);
              ?>
            </p>

        </div>
      </div>
      <div class="card bg-light text-dark">
        <div class="card-body">
          <h5 class="card-text">
            Get a copy of Product Catalogue here
          </h5>
          <hr>
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

      <?php
        // footer navbar
        echo file_get_contents(FOOTER);
      ?>
  </body>
</html>
