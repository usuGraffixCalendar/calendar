<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
  <link type="text/css" rel="stylesheet" href="/css/calendar2020.css" media="screen" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />

  <title>Calendar 2020</title>
</head>

<?php

include_once "includes/header2020.php";
?>

<?php

include_once "includes/menu.php";
?>

<body>
  <div class="container-fluid page">


    <div class="row heroSection">
      <div class="col-md-12 hero">

        <!-- <div class="heroTextBox">


        </div> -->
        <!-- <div class="heroText">

          <h4>Welcome to <br />Fall Semester</h4>
          <a class="btn btn-primary" href="#" role="button">Browse</a>


        </div> -->
        <div class="heroImage">
          <!-- <img src="/images/calendar2020/fall.png" class="img-fluid " alt=""> -->
        </div>

      </div>
    </div>




    <div class="row">
      <div class="col ml-auto    ">
        <!-- <i class="fa fa-user-circle-o"></i> -->

        <i onclick="toggleSearch()" class="fas fa-search "></i><input class="col-10 form-control" type="text" oninput="search()" placeholder="Search" aria-label="Search">
      </div>
    </div>



    <div class="row monthsSection text-center">
      <div class="col-12 months d-flex mt-5 mb-4">
        <form action="photo-gallery" method="post">

          <h2 class="one pb-3 selected" onclick="switchMonth(this)"> <?php echo date('F') ?> </h2>
          <h2 class=" two pb-3" onclick="switchMonth(this)"> <?php echo date('F', strtotime("+1 Months")) ?></h2>



          <h2 class="three pb-3" onclick="switchMonth(this)"> <?php echo date('F', strtotime("+2 Months")) ?></h2>


          <h2 class="four pb-3" onclick="switchMonth(this)"> <?php echo date('F', strtotime("+3 Months")) ?> </h2>
          <h2 class="five pb-3" onclick="switchMonth(this)"> <?php echo date('F', strtotime("+4 Months")) ?></h2>


          
        </form>
      </div>


      <!-- <div class="col-md-2">July</div>
        <div class="col-md-2">August</div>
        <div class="col-md-2">September</div>
        <div class="col-md-2">October</div>
        <div class="col-md-2">november</div>
        <div class="col-md-2">December</div> -->
    </div>


    <div class="row cardSection justify-content-center">


      <?php
      $currentMonth = date('F');

      ?>
      <div class="col-12  mb-3 text-center">
        <h1 class="currentMonth"><?php echo $currentMonth      ?></h1>
      </div>

      <?php

      include_once "./includes/autoload.php";

      $month = $_POST['month'];

      $bd = mysqli_connect(env('WEB_DB_HOST'), env('DB_USERNAME'), env('DB_PASSWORD')) or die("Could not connect database");
      mysqli_select_db($bd, env('WEB_DB_NAME')) or die("Could not select database");

      $sql = mysqli_query($bd, "SELECT * FROM usuwebdata.calevent where year ='2020' AND quater ='summer'  ORDER BY start ASC");

      $row_count = mysqli_num_rows($sql);

      $date = new DateTime('now');

      ?>





      <?php








      if ($sql->num_rows > 0) {
        // output data of each row
        while ($row = $sql->fetch_assoc()) {
          $eventTime = $row['start'];
          $eventEndTime = $row['end'];
          $eventDate = new DateTime($eventTime);
          $eventEnd = new DateTime($eventEndTime);
          $title = $row['title'];
          $link = $row['location'];
          $description = $row['details'];
          $img = $row['imageURL'];
          $tag = $row['tag'];

          if ($eventEnd > $date) {
            if ($tag == "Series") {





              echo " <div class='col-lg-4 eventCard mb-5 text-center'>
        <img src='" . $img . "' class='img-fluid' alt='Responsive image'>
        <div class='eventCardText mt-4 text-left d-flex flex-column'>
          <h3 class='date'>" . $eventDate->format('m/d  ga') . " to " . $eventEnd->format('m/d  ga') . " </h3>
          <h2 class='title'> " . $title . "</h2>
          <span class='blurb'>" . $description . " </span>
        </div>

      </div>";
            } else {


              echo   " <div class='col-lg-4 eventCard mb-5 text-center'>
        <img src='" . $img . "' class='img-fluid' alt='Responsive image'>
        <div class='eventCardText mt-4 text-left d-flex flex-column'>
          <h3 class='date'>"  . $eventDate->format('m/d  ga') .  " </h3>
          <h2 class='title'> " . $title . "</h2>
          <span class='blurb'>" . $description . " </span>
        </div>

      </div>";
            }
          }
        }
      } else {
        echo "No events right now";
      }

      ?>


    </div>


  </div>
  <?php

  include_once "includes/footer.php";
  ?>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


  <script>
    function toggleSearch() {
      //grad input
      document.querySelector(".form-control").classList.toggle("display");




    }
  </script>


  <script>
    function switchMonth(element) {

      document.getElementsByClassName("currentMonth")[0].innerText = element.innerText;




    }
  </script>



</body>

</html>