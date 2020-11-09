<?php
require_once('inc.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "vendor/autoload.php";

$_flag = $_REQUEST['flag'];
if( $_flag == '1' ) {
    $username = $_REQUEST['username'];
    $weburl = $_REQUEST['weburl'];
    $email = $_REQUEST['email'];
    $telephone = $_REQUEST['telephone'];
    $comment = $_REQUEST['comment'];

    // sending mail process
    $mail = new PHPMailer(true);
                               
    //Set PHPMailer to use SMTP.
    $mail->isSMTP();            
    //Set SMTP host name                          
    $mail->Host = HOST;
    //Set this to true if SMTP host requires authentication to send email
    $mail->SMTPAuth = true;                          
    //Provide username and password     
    $mail->Username = HOST_USERNAME;                 
    $mail->Password = HOST_PASSWORD;                           
    //If SMTP requires TLS encryption then set it
    $mail->SMTPSecure = HOST_SECURE;                           
    //Set TCP port to connect to
    $mail->Port = HOST_PORT;                                   

    $mail->From = EMAIL_FROM;
    $mail->FromName = FROM_NAME;

    $mail->addAddress($email, $username);

    $mail->isHTML(true);

    $mail->Subject = "Subject Text";
    $mail->Body = "<i>Mail body in HTML</i>";
    $mail->AltBody = "This is the plain text version of the email content";

    try {
        $mail->send();
        echo "Message has been sent successfully";
    } catch (Exception $e) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    }
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" />
    <script type="text/javascript" src="jquery-1.11.3.js"></script>
</head>
<body>
    <div class="formBox">
        <form id="mainForm" action="#" method="post">
            <input type="hidden" name="flag" value="1" />
            <div class="Form">
                <h3 class="formHeader">Um welche Art von Webseite geht es bei Ihnen?</h3>
                <div class="inlineFormStyle">
                    <div class="optionsBx">
                        <div class="check">
                            <i class="fa fa-check" aria-hidden="true"></i>
                        </div>
                        <input type="radio" id="unternehmenseite" name="Form1" value="Unternehmenseite" class="customNextBtn">
                        <label for="Unternehmenseite"><h4>Unternehmenseite</h4><i class="fa fa-battery-quarter" aria-hidden="true"></i></label>
                    </div>
                    
                    <div class="optionsBx">
                        <div class="check">
                            <i class="fa fa-check" aria-hidden="true"></i>
                        </div>
                        <input type="radio" id="onlineShop" name="Form1" value="Online Shop" class="customNextBtn">
                        <label for="onlineShop"><h4>Online Shop</h4><i class="fa fa-battery-half" aria-hidden="true"></i></label>
                    </div>

                    <div class="optionsBx">
                        <div class="check">
                            <i class="fa fa-check" aria-hidden="true"></i>
                        </div>
                        <input type="radio" id="blog" name="Form1" value="Blog" class="customNextBtn">
                        <label for="Blog"><h4>Blog</h4><i class="fa fa-battery-three-quarters" aria-hidden="true"></i></label>
                    </div>

                    <div class="optionsBx">
                        <div class="check">
                            <i class="fa fa-check" aria-hidden="true"></i>
                        </div>
                        <input type="radio" id="individualle" name="Form1" value="Individualle" class="customNextBtn">
                        <label for="Individualle"><h4>Portal / Individualle Projektanfrage</h4><i class="fa fa-battery-full" aria-hidden="true"></i></label>
                    </div>
                </div>
            </div>

            <div class="Form">
                <i class="fa fa-arrow-left BackBtn" aria-hidden="true"></i>
                <h3 class="formHeader">Wie hoch ist ihr (einmaliges) Budget Für <br>die Entwicklung Ihres Projektes?</h3>

                <div class="inlineFormStyle">
                    <div class="optionsBx">
                        <div class="check">
                            <i class="fa fa-check" aria-hidden="true"></i>
                        </div>
                        <input type="radio" id="under2500eur" name="Form2" value="under2500eur" class="customNextBtn">
                        <label for="under2500eur"><h4>1.500 - 2.500 EUR</h4><i class="fa fa-battery-quarter" aria-hidden="true"></i></label>
                    </div>
                    
                    <div class="optionsBx">
                        <div class="check">
                            <i class="fa fa-check" aria-hidden="true"></i>
                        </div>
                        <input type="radio" id="under5000eur" name="Form2" value="under5000eur" class="customNextBtn">
                        <label for="under5000eur"><h4>2.500 - 5.000 EUR</h4><i class="fa fa-battery-half" aria-hidden="true"></i></label>
                    </div>

                    <div class="optionsBx">
                        <div class="check">
                            <i class="fa fa-check" aria-hidden="true"></i>
                        </div>
                        <input type="radio" id="under10000eur" name="Form2" value="under10000eur" class="customNextBtn">
                        <label for="under10000eur"><h4>5.000 - 10.000 EUR</h4><i class="fa fa-battery-three-quarters" aria-hidden="true"></i></label>
                    </div>

                    <div class="optionsBx">
                        <div class="check">
                            <i class="fa fa-check" aria-hidden="true"></i>
                        </div>
                        <input type="radio" id="over10000eur" name="Form2" value="over10000eur" class="customNextBtn">
                        <label for="over10000eur"><h4>>10.000 EUR</h4><i class="fa fa-battery-full" aria-hidden="true"></i></label>
                    </div>
                </div>
            </div>

            <div class="Form">
                <i class="fa fa-arrow-left BackBtn" aria-hidden="true"></i>
                <h3 class="formHeader">Wie hoch ist Ihr monatliches Budget Für SEO, Wartung und Pflege Ihres Projektes?</h3>
        
                <div class="inlineFormStyle">
                    <div class="optionsBx">
                        <div class="check">
                            <i class="fa fa-check" aria-hidden="true"></i>
                        </div>
                        <input type="radio" id="400eur" name="Form3" value="400eur" class="customNextBtn">
                        <label for="400eur"><h4>200 - 400 EUR</h4><i class="fa fa-battery-quarter" aria-hidden="true"></i></label>
                    </div>
                    
                    <div class="optionsBx">
                        <div class="check">
                            <i class="fa fa-check" aria-hidden="true"></i>
                        </div>
                        <input type="radio" id="600eur" name="Form3" value="600eur" class="customNextBtn">
                        <label for="600eur"><h4>400 - 600 EUR</h4><i class="fa fa-battery-half" aria-hidden="true"></i></label>
                    </div>

                    <div class="optionsBx">
                        <div class="check">
                            <i class="fa fa-check" aria-hidden="true"></i>
                        </div>
                        <input type="radio" id="1000eur" name="Form3" value="1000eur" class="customNextBtn">
                        <label for="1000eur"><h4>600 - 1.000 EUR</h4><i class="fa fa-battery-three-quarters" aria-hidden="true"></i></label>
                    </div>

                    <div class="optionsBx">
                        <div class="check">
                            <i class="fa fa-check" aria-hidden="true"></i>
                        </div>
                        <input type="radio" id="2500eur" name="Form3" value="2500eur" class="customNextBtn">
                        <label for="2500eur"><h4>1.000 - 2.500 EUR</h4><i class="fa fa-battery-full" aria-hidden="true"></i></label>
                    </div>
                </div>
            </div>

            <div class="Form">
                <i class="fa fa-arrow-left BackBtn" aria-hidden="true"></i>
                <h3 class="formHeader">Bis wann soll das Projekt spätestens online sein?</h3>
        
                <div class="inlineFormStyle">
                    <div class="optionsBx">
                        <div class="check">
                            <i class="fa fa-check" aria-hidden="true"></i>
                        </div>
                        <input type="radio" id="34wochen" name="Form4" value="3-4wochen" class="customNextBtn">
                        <label for="3-4wochen"><h4>in 3 - 4 Wochen</h4><i class="fa fa-battery-quarter" aria-hidden="true"></i></label>
                    </div>
                    
                    <div class="optionsBx">
                        <div class="check">
                            <i class="fa fa-check" aria-hidden="true"></i>
                        </div>
                        <input type="radio" id="48wochen" name="Form4" value="4-8wochen" class="customNextBtn">
                        <label for="4-8wochen"><h4>in 4 - 8 Wochen</h4><i class="fa fa-battery-half" aria-hidden="true"></i></label>
                    </div>

                    <div class="optionsBx">
                        <div class="check">
                            <i class="fa fa-check" aria-hidden="true"></i>
                        </div>
                        <input type="radio" id="812wochen" name="Form4" value="8-12wochen" class="customNextBtn">
                        <label for="8-12wochen"><h4>in 8 - 12 Wochen</h4><i class="fa fa-battery-three-quarters" aria-hidden="true"></i></label>
                    </div>

                    <div class="optionsBx">
                        <div class="check">
                            <i class="fa fa-check" aria-hidden="true"></i>
                        </div>
                        <input type="radio" id="36monaten" name="Form4" value="3-6monaten" class="customNextBtn">
                        <label for="3-6monaten"><h4>in 3 - 6 Monaten</h4><i class="fa fa-battery-full" aria-hidden="true"></i></label>
                    </div>
                </div>
            </div>

            <div id="Form5" class="Form">
                <div class="formRowFirst">
                    <i class="fa fa-arrow-left BackBtn" aria-hidden="true"></i>
                    <h3 class="formHeader"><i class="fa fa-check-square-o" aria-hidden="true"></i> Relaunch | Eine bestehende Webseite erneuern</h3>
                </div>
                
                <div class="formRow">
                    <div class="inputBox">
                        <input type="text" required="required" name="username">
                        <span>Name</span>
                    </div>
                    <div class="inputBox">
                        <input type="text" required="required" name="weburl">
                        <span>bestehende Webseite</span>
                    </div>
                </div>

                <div class="formRow">
                    <div class="inputBox">
                        <input type="email" required="required" name="email">
                        <span>Email</span>
                    </div>
                    <div class="inputBox">
                        <input type="number" required="required" name="telephone">
                        <span>Telefonnummer</span>
                    </div>
                </div>
                
                <div class="formRow">
                    <div class="inputBox2">
                        <textarea id="comment" name="comment" rows="2">Persönliche Nacheicht</textarea>
                    </div>
                </div>
                
                <div class="formRow">
                    <div class="inputBox2">
                        <input type="submit" value="kostenlose Projektanfrage abschicken">
                    </div>
                </div>
                <div class="lastRow">
                    <span><i class="fa fa-check" aria-hidden="true"></i> Unverbindlich und kostenlos</span>
                    <span><i class="fa fa-check" aria-hidden="true"></i> Beratung zur Entwicklung und Optimierung</span>
                    <span><i class="fa fa-check" aria-hidden="true"></i> 10 Jahre Erfahrung</span>
                </div>
            </div>
        </form>

        <div id="step-row">
            <div id="progress"></div>
            <div class="step-col">
              <small style="left:0%">0%</small>
            </div>
        </div>
    </div>

    <script>
        jQuery(document).ready(function($) {
            var progress = 0;
            $('.Form').first().css('left', '0');
            function setProgress() {
                $('#progress').css('width', progress + '%');
                $('#step-row .step-col small').css('left', progress / 2 + '%');
                $('#step-row .step-col small').html(progress + '%');
            }
            $('#mainForm .optionsBx .customNextBtn').on('click', function() {
                $(this).parents('.Form').css('left', '-100%');
                $(this).parents('.Form').next('.Form').css('left', '0');
                progress += 25;
                setProgress();
            });
            $('.BackBtn').on('click', function() {
                $(this).parents('.Form').css('left', '-100%');
                $(this).parents('.Form').prev('.Form').css('left', '0');
                progress -= 25;
                setProgress();
            });
        });
    </script>
</body>
</html>