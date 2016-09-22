<html>
<head>
  <title>Anime Tracker</title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script>
    $(document).ready(function() {
      $("input#submit").click(function(){
        $.ajax({
          type: "POST",
          url: "add.php", 
          data: $('form.addform').serialize(),
          success: function(msg){
            $("#submit").html(msg)
            $("#addModal").modal('hide');
          },
          error: function(){
            alert("failure");
          }
        });
      });
    });
  </script>
</head>
<?php include 'functions.php'; ?>
<?php include 'header.php'; ?>
<body>
<br>
<br>
<br>
<br>
<?php 
   if(!empty($_POST['atitle']) && !empty($_POST['episodenum']) && !empty($_POST['arating']))
   {
     insertShow();
   }
?>
  <div class="row">
    <div class="col-md-1 col-md-offset-2">
      <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#addModal">
        Add Show
      </button>
      <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labeledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4>Add Anime to Database</h4>
            </div>
            <div class="modal-body">
              <form class="form" id="addform" action="view.php" method="post">
                <div class="row">
                  <div class="col-md-8 col-md-offset-2">
                    <div class="form-group">
                      <label for="atitle" id="animetitle" >Anime Name:</label>
                      <input type="text" id="atitle" name="atitle" class="form-control" required="yes">
                    </div>
                    <div class="form-group">
                      <label for="episodenum" id="episodes">Num of Episodes:</label>
                      <input type="number" id="episodenum" class="form-control" name="episodenum" required="yes">
                    </div>
                    <div class="form-group">
                      <label for="rating" id="arating">Rating(1 being lowest):</label>
                      <select name="arating" class="form-control" id="arating">
                        <option value=1>1 - Didn't like it</option>
                        <option value=2>2 - It was OK</option>
                        <option value=3>3 - Liked it</option>
                        <option value=4>4 - Really liked it</option>
                        <option value=5>5 - Loved it</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="notes" id="noteslabel">Notes:</label>
                      <textarea id="notes" name="anotes" class="form-control" rows="4"></textarea>
                    </div>
                  </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <div id="apost"><input class="btn btn-success" type="submit" value="Add" id="animepost"></div>
                <!--<button id="apost" type="submit" class="btn btn-primary" formmethod="post" formaction="view.php" data-dismiss="modal">Add</button>-->
            </div>
          </form>
          </div><!-- -->
        </div>
      </div>
    </div>
  </div>
  <br>
  <br>
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
       <?php createList(); ?>
    </div>
  </div>

</body>
<?php include 'footer.php'; ?> 
</html>
