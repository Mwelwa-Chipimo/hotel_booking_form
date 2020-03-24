<?php 
  require_once "class-folder/hotel.php";
  session_start();
?>

<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="form.css">
    </head>

    <body>
      <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <a class="navbar-brand" href="#">Booked</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="#">Log in</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Sign up</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">ZAR</a>
                </li>
              </ul>
            </div>
          </nav>

      <div class="hero">
        <div class="hero-image">
          <div class="hero-text">
            <h1 style="font-size:50px">Booked!</h1>
            <h3>Compare and book your next hotel in<br> simple steps</h3>
            <button>Let's go</button>
          </div>
        </div>
      </div>     

      <?php
      
        //M A I N   P R O G R A M M E

        // Import PHPMailer classes into the global namespace
        // These must be at the top of your script, not inside a function
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;

        // Load Composer's autoloader
        require 'vendor/autoload.php';

        //Include compare and booking classes
        require_once "class-folder/booking.php";
        require_once "class-folder/compare.php";

        //Initialize hotel class
        //Hotel Properties : Name, Daily Rate, Pool, Bar, Kid Friendly,
        $radissonBlu = new hotel("Radisson Blu", 350, true, false, true, false);
        $radissonRed = new hotel("Radisson Red", 500, true, true, false, true);
        $grandblue0 = new hotel("Hotelspace", 450, false, true, true, true);

        $allHotels = array($radissonBlu, $radissonRed, $grandblue0);

        //echo $radissonBlu->name;

      ?>

      <div class="container">

        <form method='post' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="needs-validation" novalidate>
            <h2>Step 1: Fill in form</h2>

            <!--First Name $ Surname-->

            <h4>1.1) Enter your details</h4>
              <div class="form-group">
                <div class="form-row">
                  <div class="col">
                    <input type="text" class="form-control" name="firstname" placeholder="First name" required>
                  </div>
                  <div class="col">
                    <input type="text" class="form-control" name="surname" placeholder="Last name" required>
                  </div>
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
                </div>
              </div>

            <!--Email Address-->

            <div class="form-group">
              <div class="row">        
                  <div class="col">
                      <label for="exampleFormControlInput1">Email address</label>
                      <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="name@example.com" required>
                  </div>
              </div>
            </div>

            <!--Hotel Picker-->

            <h4>1.2) View our hotels</h4>

            <div class="row">
            
            
            <div class="col-sm-12 col-md-4">
            <div class="card" style="width: 18rem;">
              <img class="card-img-top" src="images/rblu.jpg" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title"><?php echo $allHotels[0]->name ?></h5>
                <p class="card-text"></p>
                <a href="#" class="btn btn-primary disabled">View More</a>
              </div>
            </div>
            </div>
            

            <div class="col-sm-12 col-md-4">
            <div class="card" style="width: 18rem;">
              <img class="card-img-top" src="images/rred.jpg" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title"><?php echo $allHotels[1]->name ?></h5>
                <p class="card-text"></p>
                <a href="#" class="btn btn-primary disabled">View More</a>
              </div>
            </div>
            </div>
            

            <div class="col-sm-12 col-md-4">
            <div class="card" style="width: 18rem;">
              <img class="card-img-top" src="images/htlspc.jpeg" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title"><?php echo $allHotels[2]->name ?></h5>
                <p class="card-text"></p>
                <a href="#" class="btn btn-primary disabled">View More</a>
              </div>
            </div>           
            </div>

            </div>
            

            <h4>1.3) Choose 2 hotels to compare</h4>

            <div class="form-row">
              <div class="form-group col-6">
                <label for="inputState">!st Hotel</label>
                <select id="inputState" class="form-control" name="hotel1" required>
                  <option selected>Select first hotel</option>
                  <option value="<?php echo $allHotels[0]->name ?>"><?php echo $allHotels[0]->name ?></option>
                  <option value="<?php echo $allHotels[1]->name ?>"><?php echo $allHotels[1]->name ?></option>
                  <option value="<?php echo $allHotels[2]->name ?>"><?php echo $allHotels[2]->name ?></option>
                </select>
              </div>

              <div class="form-group col-6">
                <label for="inputState">2nd Hotel</label>
                <select id="inputState" class="form-control" name="hotel2" required>
                  <option selected>Select second hotel</option>
                  <option value="<?php echo $allHotels[0]->name ?>"><?php echo $allHotels[0]->name ?></option>
                  <option value="<?php echo $allHotels[1]->name ?>"><?php echo $allHotels[1]->name ?></option>
                  <option value="<?php echo $allHotels[2]->name ?>"><?php echo $allHotels[2]->name ?></option>
                </select>
              </div>
            </div>

             <!--Date Picker-->

             <h4>1.4) Pick your dates</h4>

             <div class="form-group">
              <div class="row">
                  <div class="col-6">
                      <label for="checkin">Check in:</label>
                      <input type="date" id="checkin" name="indate" placeholder="Check in" required>
                  </div>
                  <div class="col-6">
                      <label for="checkout">Check out:</label>
                      <input type="date" id="checkout" name="outdate" placeholder="Check out" required>
                  </div>
              </div>
            </div>
            
            <!--Submit Button-->
            <div class="form-group">
              <div class="row">
                <div class="col-8">  
                      <button type="submit" name="submit" class="btn-lg btn-primary">Compare</button>
                  </div> 
              </div>
            </div>
        </form>
        </div>

        <div class="container">

        <?php

        ///////////M A I N   P R O G R A M M E////////////////
        
        //Retrieve information from the POST superglobal
        
        if (isset($_POST['submit'])){

            $compare = new compare (
              $_POST['firstname'],
              $_POST["surname"],
              $_POST['email'],
              $_POST['indate'],
              $_POST['outdate'],
              $_POST['hotel1'],
              $_POST['hotel2']
            );

            //print_r($_POST);

            //This code sets the number of days the user has booked for.///////
            $compare->daysBooked($_POST['indate'], $_POST['outdate']);

            //Code to display user booking information.
            $compare->displayInfo();

            //Create SESSIONS for costs
            $_SESSION['cost1']= cost($allHotels, "name", $_POST['hotel1'], $compare->daysBooked, "daily");
            $_SESSION['cost2']= cost($allHotels, "name", $_POST['hotel2'], $compare->daysBooked, "daily");

            //Calvulate the total cost
            echo "The cost of the stay at " . $compare->hotel1 . " is " . $_SESSION['cost1'] . "<br>";
            echo "The cost of the stay at " . $compare->hotel2 . " is " . $_SESSION['cost2'];

            //Create SESSIONS for hotel comparison. We set SESSION variable compareHotelArr to the
            // function compareHotelArr.
           $_SESSION['compareHotelArr']= compareHotelsMain($allHotels, $_POST['hotel1'], $_POST['hotel2'], "name");
           $compare->compareHotels($_SESSION['compareHotelArr']);

           //print_r($_SESSION);

           //Button for booking form
           $compare->bookButton();
           unset($_POST['submit']);
        } //End of Comparison section. 

        if(isset($_POST['selectedHotel'])){
          //Instantiation of PHPMailer and passing 'true' enables exception.
          $mail = new PHPMailer(false);
          $email = new Booking(
            $_SESSION['firstname'],
            $_SESSION["surname"],
            $_SESSION['email'],
            $_SESSION['checkin'],
            $_SESSION['chekout'],
            $_SESSION['hotel1'],
            $_SESSION['hotel2'])
            ;
            //Determine the hotel that the user selected to displat correct price total : returns object
            $email->selectedHotel = selectedHotel($_SESSION['compareHotelArr'], "name", $_POST['selectedHotel']);
            //Random ref number for email.

            $email->sendEmail($mail, false);     
        }
       ?>

        <?php

          
          ////////////////////// M A I N    P R O G R A M M E ///////////////////////////

          function cost($param, $param2, $param3, $param4, $param5){
            foreach($param as $var){
              if($var->$param2 === $param3){
                return $var->$param5 * $param4;
              }
            }
          } //E N D  C O S T////////////////

         
          /////// Accepts array of hotels, hotel1, hotel2, property name of Hotel.
          function compareHotelsMain($param, $param1, $param2, $param3){
            $compareHotelArr = array();
            foreach($param as $var){
              if($var->$param3 === $param1 || $var->$param3 === $param2){
                  array_push($compareHotelsArr, $var);
              }
            }
            return $compareHotelArr;
          }//////E N D   C O M P A R E H O T E L S M A I N//////////

          //Compare hotels array, property name of hotel, selected hotel POST.
          function selectedHotel($param, $param2, $param3){
              if($param[0]->$param2 === $param3){
                return $param[0];
              }else{
                return $param[1];
              }
            }

          //Get the total cost for email, 1selected hotel, 2name property, 3hotel for comparison
          function totalCost($param1, $param2, $param3){
            if($param1->$param2 === $param3){
              return $_SESSION['cost1'];
            }else{
              return $_SESSION['cost2'];
            }
          }       
        ?>
        </div>





        <script>
        // Disable form submissions if there are invalid fields
        (function() {
          'use strict';
          window.addEventListener('load', function() {
            // Get the forms we want to add validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
              form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                  event.preventDefault();
                  event.stopPropagation();
                }
                form.classList.add('was-validated');
              }, false);
            });
          }, false);
        })();
        </script>
        <script src="" async defer></script>
    </body>
</html>