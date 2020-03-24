<?php

class booking{
    
    public $selectedHotel, $totalCost, $refNumber, $firstname, $surname, $email, $indate, $outdate, $hotel1, $hotel2;
    
    function __construct($n0, $n1, $n2, $n3, $n4, $n5, $n6){
        $this->firstname= $n0;
        $this->surname= $n1;
        $this->email= $n2;
        $this->indate= $n3;
        $this->outdate= $n4;
        $this->hotel1= $n5;
        $this->hotel2= $n6;
    }
    
    //PHPMailer send email to user
    function sendEmail($param, $param2){
        //true is real server false is via mailtrap
       
            //
            try {
                //Server settings
                $param->SMTPDebug = 0;                    // Enable verbose debug output
                $param->isSMTP();                         // Set mailer to use SMTP
                $param->Host       = 'smtp.mailtrap.io';  // Specify main and backup SMTP servers
                $param->SMTPAuth   = true;                // Enable SMTP authentication
                $param->Username   = 'bfb9212b37d350';    // SMTP username
                $param->Password   = 'd638d03ac22af5';    // SMTP password
                $param->SMTPSecure = 'TLS';               // Enable TLS encryption, `ssl` also accepted
                $param->Port       = 2525;                // TCP port to connect to


                //Recipients
                $param->setFrom('from@example.com', 'Mailer');
                $param->addAddress('joe@example.net', 'Joe User');     // Add a recipient
                $param->addAddress('ellen@example.com');               // Name is optional
                $param->addReplyTo('info@example.com', 'Information');
                $param->addCC('cc@example.com');
                $param->addBCC('bcc@example.com');

                // Content
                $param->isHTML(true);                                  // Set email format to HTML
                $param->Subject = 'Hotel Booking';
                $param->Body    = 
                "Hi ".$this->firstname." ".$this->surname. " <br> 
                Please see details of your booking below <br>
                Hotel name: <b>".$this->selectedHotel->name."</b> <br>
                From : ".$this->indate." to : ".$this->outdate. "<br>
                The cost of the total stay is ". $this->totalCost . "<br>
                Please deposit funds into the following account<br>
                Hotel Booking, Standard Bank, 5409098790, 1092, Cheque <br>
                Using reference Number " .$this->refNumber."<br>
                Any further queries you have can be directed to <br>
                admin@thehotelbookingteam.co.za<br>
                Thanks for your bussiness and we look forward to hearning back from you<br>
                <br>The Hotel Bookings Team";
                $param->AltBody = 'This is the body in plain text for non-HTML mail clients';
                $param->send();
                echo '<h3>Message has been sent</h3>';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$param->ErrorInfo}";
            }
        }//end if my server or mailtrap
    }//endsendEmail
//} end Class


?>