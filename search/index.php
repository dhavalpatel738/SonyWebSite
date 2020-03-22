<!doctype html>
<html lang="en">
  <head>
    <!--  IMPORT CONFIG FILE -->
      <?php include '../config.php'; ?>
      <?php
        echo file_get_contents(HEADER);
      ?>


      <script type="text/javascript">
        //include the   'async':false   parameter or the object data won't get captured when loading
        var json = $.getJSON({'url': '/items.json', 'async': false});

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
          console.log("Designs " + designs);

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
                  if(design == items[key].label) {
                    temp = items[key];
                    console.log('Path ' + temp.image_url);
                    $("#card"+index).html(function() {
                       var htmlString = '<a class="image-popup-no-margins" id="img-lg" href="/' + temp.image_url +'">' +
                                          '<img class="card-img-top" id="img-sm" alt="Card image cap" src="/' + temp.image_url +'">' +
                                        '</a>' +
                            '<h5 class="card-title" style="text-align: center;" id="label">' + design + '</h5>';
                        return htmlString;
                    });
                    index++;
                  }
              }

            }
          });

        </script>
  </head>

  <body>
      <!-- header navbar-->
      <?php
        echo file_get_contents(HEADER_NAVBAR_REDIRECTS);
      ?>

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


      <?php
        // footer navbar
        echo file_get_contents(FOOTER);
      ?>
  </body>
