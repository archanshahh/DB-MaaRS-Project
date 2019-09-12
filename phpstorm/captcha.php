<html>
<body> <!-- the body tag is required or the CAPTCHA may not show on some browsers -->
<!-- your HTML content -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<form action="" method="POST">
    <div class="g-recaptcha" data-sitekey="6LeHU1EUAAAAAL7WZDn2Jx7fMB16SPTSNrbLGgRw" ></div>
    <input type="submit" name="submit" value="SUBMIT">
</form>

<!-- more of your HTML content -->
</body>
</html>
<?php

if(isset($_POST['submit']) && !empty($_POST['submit'])):
    if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])):
        //your site secret key
        $secret = '6LeHU1EUAAAAAOQjQoSUZg_xFU8Qp4479ezxdBlE';
        //get verify response data
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        if($responseData->success):

            echo "hi";
            //contact form submission code
//            $name = !empty($_POST['name'])?$_POST['name']:'';
//            $email = !empty($_POST['email'])?$_POST['email']:'';
//            $message = !empty($_POST['message'])?$_POST['message']:'';
//
//            $to = 'contact@codexworld.com';
//            $subject = 'New contact form have been submitted';
//            $htmlContent = "
//                <h1>Contact request details</h1>
//                <p><b>Name: </b>".$name."</p>
//                <p><b>Email: </b>".$email."</p>
//                <p><b>Message: </b>".$message."</p>
//            ";
//            // Always set content-type when sending HTML email
//            $headers = "MIME-Version: 1.0" . "\r\n";
//            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
//            // More headers
//            $headers .= 'From:'.$name.' <'.$email.'>' . "\r\n";
//            //send email
//            @mail($to,$subject,$htmlContent,$headers);
//
//            $succMsg = 'Your contact request have submitted successfully.';
        else:
            $errMsg = 'Robot verification failed, please try again.';
        endif;
    else:
        $errMsg = 'Please click on the reCAPTCHA box.';
    endif;
else:
    $errMsg = '';
    $succMsg = '';
endif;
?>