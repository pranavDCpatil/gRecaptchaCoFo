<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <title>Contact Form</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
    <div class="form-container">
        <form id="contact" action="" method="post">

            <h3>Drop message to us</h3>
            <h4>Contact us for custom quote</h4>

            <fieldset>
                <input placeholder="Your Name" type="text" name="name" tabindex="1" required autofocus />
            </fieldset>

            <fieldset>
                <input placeholder="Company Name" type="text" name="company_name" tabindex="3" required />
            </fieldset>

            <fieldset>
                <input placeholder="Your Email Address" type="email" name="email" tabindex="4" required />
            </fieldset>

            <fieldset>
                <input placeholder="Your Contact Number" type="tel" name="contact_number" tabindex="5" required />
            </fieldset>

            <fieldset>
                <input placeholder="Enquiry" type="text" name="enquiry" tabindex="6" required />
            </fieldset>

            <fieldset>
                <textarea placeholder="Description..." tabindex="7" name="description" required></textarea>
            </fieldset>

            <!-- <fieldset>
            <div class="g-recaptcha" data-sitekey="6LfGR4ceAAAAAOBTQ_0XmJbXWRyFxT-hJlVlTmFp"></div>
            </fieldset> -->

            <fieldset>
                <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">
                    Submit
                </button>
            </fieldset>

            <div class="status">


    <?php
        if(isset($_POST['submit'])) {
            $user_name = $_POST['name'];
            $company_name = $_POST['company_name'];
            $email = $_POST['email'];
            $contact_number = $_POST['contact_number'];
            $enquiry = $_POST['enquiry'];
            $description = $_POST['description'];

            $email_from = "prnvpatil700@gmail.com";
            $email_subject = 'Form Submission';
            $email_body = "Name: $user_name.\n".
                          "Company Name: $company_name.\n".
                          "Email: $email.\n".
                          "Contact No.: $contact_number.\n".
                          "Enquiry: $enquiry.\n".
                          "Description: $description.\n";


                    
             $to_email = "firewateramalgam@gmail.com"; 
             $headers = "From: $email_from";
             $headers .= "Reply-To: $email\r\n";    
             
             
             $secretKey = "6LfGR4ceAAAAAHy86SpvlCBKwuaKgleT0BBAOo2s";
             $responseKey = $_POST['g-recaptcha-response'];
             $UserIP = $_SERVER['REMOTE_ADDR'];
             $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$UserIP";

             $response = file_get_contents($url);
             $response = json_decode($response);

             if ($response->success) {
                 mail($to_email, $email_subject, $email_body, $headers );
                 echo "Message sent successfully";
             } else {
                 echo "Invalid Captcha, Please Try Again.";
             }
        }
    ?>


        </div>

        </form>    

    </div>

    <!-- Warning: mail(): Failed to connect to mailserver at "localhost" port 25, verify your "SMTP" and "smtp_port" setting in php.ini or use ini_set() in C:\xampp\htdocs\CoFo\index.php on line 93
Message sent successfully


$var .= "value";
It's the concatenating assignment operator. It works similarly to:
$var = $var . "value"; -->
</body>

</html>