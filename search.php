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
      <meta name="description" content="Product search for wall tiles including light dark series, kitchen tiles and elevation series">
      <meta name="keywords" content="ceramic wall tiles, wall tiles, ceramic tiles, tiles, kitchen tiles, bathroom tiles, parking tiles">

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

      <link rel="stylesheet" href="/images/font-awesome/css/font-awesome.min.css">
      <link rel="stylesheet" href="/assets/css/jquery-ui.css">

      <link rel="stylesheet" href="/assets/css/magnific-popup.css">


      <link rel="shortcut icon" href="/assets/images/favicon.ico"/>
      <title>Sony Ceramics | Gallary</title>

      <style type="text/css">

          body{
              background-color: black;
          }

          #brandImg {
              width: 180px;
              height:  50px;
          }

          #searchResult {

          }

          #img-sm {
              max-width: : 120px;
              max-height: 400px;
              margin-top: 20px;
          }

          #alertDialog {
              display: none;
          }

          .mfp-no-margins img.mfp-img {
            padding: 0;
          }

          .mfp-no-margins .mfp-figure:after {
            top: 0;
            bottom: 0;
          }

          .mfp-no-margins .mfp-container {
            padding: 0;
          }

          .card {
              background-color: black;
          }

          .card-title {
              color: floralwhite;
          }

          .ui-autocomplete {
            max-height: 150px;
            overflow-y: auto;
            overflow-x: hidden;
          }

      </style>

      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <!--script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script-->
      <script src="/assets/js/jquery.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

      <script src="/assets/js/jquery.magnific-popup.js"></script>
      <script src="/assets/js/jquery-ui.js"></script>
      <script src="autocomplete.js"></script>

      
      <script type="text/javascript">
        //include the   'async':false   parameter or the object data won't get captured when loading
        var json = $.getJSON({'url': "items.json", 'async': false});

        //The next line of code will filter out all the unwanted data from the object.
        var items = JSON.parse(json.responseText);

      </script>
      <script type="application/javascript">
          $("#alertDialog").hide();
          var url_string = window.location.href;
          var url = new URL(url_string);
          var design = url.searchParams.get("design");

          var designs = [];
          for(var key in items) {
            designs.push(items[key].label);
          }
          console.log(designs);

          var isFound = false;
          var item;
          $.each(designs, function(index, value) {
              if(design == value) {
                  isFound = true;
                  item = items[index];
              }
          });


          $(document).ready(function() {
          if(!isFound) {
              console.log("Not found");
              $("#searchResult").css("display", "none");
              //$("#exampleModal").css("display", "block");
              $('#exampleModal').modal('show');
              $("#goBackButton").click(function() {
                window.history.back();
              });
              //window.history.back();
          } else {
            console.log("Found");

          var index = 0;
              for(var key in items) {
                  var temp;
                  console.log(items[key]);
              if(design == items[key].label) {
              temp = items[key];
              $("#card"+index).html(function() {
                 var htmlString = '<a class="image-popup-no-margins" id="img-lg" href="' + temp.image_url + '">' +
                                    '<img class="card-img-top" id="img-sm" alt="Card image cap" src="' + temp.image_url + '">' +
                                  '</a>' +
                      '<h5 class="card-title" style="text-align: center;" id="label">' + design + '</h5>';
                  return htmlString;
              });

                  index++;
            }
          }

              $('.image-popup-no-margins').magnificPopup({
                type: 'image',
                closeOnContentClick: true,
                closeBtnInside: false,
                fixedContentPos: true,
                mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
                image: {
                    verticalFit: true
                },
                gallery: {
                    enabled: true,
                    navigateByImgClick: true,
                    preload: [0,1] // Will preload 0 - before current, and 1 after the current image
                },
                zoom: {
                    enabled: true,
                    duration: 300 // don't foget to change the duration also in CSS
                }
              });
          }
            });


      </script>

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
          <li class="nav-item dropdown active">
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
          <li class="nav-item">
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

      <div class="container">
      <div class="row" id="searchResult">
          <div class="card-deck">
              <div class="col-sm-2">
                  <div class="card" id="card0">

                  </div>
              </div>
              <div class="col-sm-2">
                  <div class="card" id="card1">

                  </div>
              </div>
              <div class="col-sm-2">
                  <div class="card" id="card2">

                  </div>
              </div>
              <div class="col-sm-2">
                  <div class="card" id="card3">

                  </div>
              </div>
              <div class="col-sm-2">
                  <div class="card" id="card4">

                  </div>
              </div>
              <div class="col-sm-2">
                  <div class="card" id="card5">

                  </div>
              </div>
              </div>
          </div>
      </div>

      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-danger" id="exampleModalLabel">Not Found!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body text-secondary">
            We are not able to find what you're looking for.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-secondary" id="goBackButton">Go back</button>
          </div>
        </div>
      </div>
    </div>





      <nav class="navbar navbar-expand-lg navbar-dark fixed-bottom" style="background-color: #000000;">

        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item">
            <p class="text-secondary">Copyright <i class="fa fa-copyright" aria-hidden="true"></i> 2018 <a href="http://www.sonyceramics.com" style="text-decoration: none;"><span class="text-secondary font-weight-bold">Sony Ceramics</span></a>. All rights reserved.</p>
            <p class="text-secondary">Made with <i class="fa fa-heart" aria-hidden="true"></i> & <i class="fa fa-coffee" aria-hidden="true"></i>  in Morvi, Gujarat</p>
          </li>
        </ul>

    </nav>

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
