<?php

class compare{
    //Compare one hotel with another
    //PROPERTIES//////////////////////////
    
    public $firstname, $surname, $email, $indate, $outdate, $hotel1, $hotel2, $cost1, $cost2;
    //Set public properties
    function __construct($n0, $n1, $n2, $n3, $n4, $n5, $n6){
        $_SESSION['firstname'] = $this->firstname = $n0;
        $_SESSION['surname'] = $this->surname = $n1;
        $_SESSION['email'] = $this->email = $n2;
        $_SESSION['indate'] = $this->indate = $n3;
        $_SESSION['outdate'] = $this->outdate = $n4;
        $_SESSION['hotel1'] = $this->hotel1 = $n5;
        $_SESSION['hotel2'] = $this->hotel2 = $n6;
    }//END CONSTRUCTOR///////////////////
    
    //Number of days for booking/////////
    function daysBooked($param1, $param2){
        //set protected properties
        $this->indate = $param1;
        $this->outdate = $param2;
        //amount of days
        $datetime1 = new DateTime($this->indate);
        $datetime2 = new DateTime($this->outdate);
        $interval = $datetime1->diff($datetime2);
        //returns number of days booked back to main program
        $this->daysBooked = $interval->format('%R%a');
    }//END DAYSBOOKED////////////////////
    
    //Display Info to Guest////////////
    function displayInfo(){
        //Display booking info for user 
        echo "<h2>Step 2: Select hotel</h2>" .
        "<br><h3>Hey " . $this->firstname . " " . $this->surname . "!</h3>" .
        "<br><p>We're so glad that you've chosen <strong>BookIt</strong> to handle your hotel booking needs " . "</p><br>" .
        "Below is the comparison between the <strong>" . $this->hotel1 . "</strong> and <strong>" . $this->hotel2 . "</strong> hotels<br>" .
        "This is from <strong>" . $this->indate . "</strong> to " . "<strong>" . $this->outdate . "</strong> which is " . $this->daysBooked . " days.<br>" .
       
        "Select your Hotel : <br>
        <form role=\"form\" action=";
        echo htmlspecialchars($_SERVER['PHP_SELF']);  
        echo " method=\"post\">
        <input type=\"radio\" name=\"selectHotel\" value=\"".$this->hotel1."\">".$this->hotel1."<br>"."
        <input type=\"radio\" name=\"selectHotel\" value=\"".$this->hotel2."\">".$this->hotel2."<br>";
        
    }//END DISPLAYINFO/////////////////
    
    function compareHotels($param){
        /* echo '
        <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Features</th>
            <th scope="col">' . $this->hotel1 . '</th>
            <th scope="col">' . $this->hotel2 . '</th>
           
          </tr>
        </thead>

        <tbody>
          <tr>
            <th scope="row">Pool</th>
            <td>
               ($param[0]->pool) ? "Yes" : "No"; 
            </td>
            <td>

            </td>
            <td>

            </td>
          </tr>

          <tr>
            <th scope="row">Bar</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
          </tr>
          <tr>
            <th scope="row">Kid Friendly</th>
            <td>Larry</td>
            <td>the Bird</td>
            <td>@twitter</td>
          </tr>
        </tbody>
      </table>'; */


      echo "
          <table>
            <tr>
              <th>Features</th>
              <th>Hotel 1 : ". $param[0]->name."</th>
              <th>Hotel 2: ". $param[1]->name."</th>
            </tr>
            <tr>
              <td>Pool</td>
              <td>"; 
              echo ($param[0]->pool) ? "Yes" : "No"; 
              echo    "</td>
              <td>"; 
              echo ($param[1]->pool) ? "Yes" : "No";
              echo "</tr>
            <tr>
              <td>Bar</td>
              <td>";
              echo ($param[0]->bar) ? "Yes" : "No";
              echo "</td>
              <td>";
              echo ($param[1]->bar) ? "Yes" : "No";  
              echo "</td>
            </tr>
            <tr>
              <td>Kid Friendly</td>
              <td>";
              echo ($param[0]->kidFriendly) ? "Yes" : "No";
              echo "</td>
              <td>";
              echo ($param[1]->kidFriendly) ? "Yes" : "No";
              echo  "</td>
            </tr>
            <tr>
              <td>Spa</td>
              <td>";
              echo ($param[0]->spa) ? "Yes" : "No";    
              echo "</td>
              <td>";
              echo ($param[1]->spa) ? "Yes" : "No";
              echo "</td>
            </tr>
          </table>";
    }//End compareHotels
    
function bookButton(){
        echo "<form class='form-inline' role='form' action=" .  htmlspecialchars($_SERVER["PHP_SELF"]).  
         " method='post'>
         <button type=\"submit\" name=\"selectedHotel\" value=\"book\">Book</button>
         </form><br><br>";
    }//end bookButton    
    
}

?>