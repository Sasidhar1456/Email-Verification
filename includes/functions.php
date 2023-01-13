<?php
function isValidEmail($email) {
            return filter_var($email, FILTER_VALIDATE_EMAIL) 
                && preg_match('/@.+\./', $email);
        }
        function isMX($email){

            list($name, $domain)=explode('@',$email);
 
            if(!checkdnsrr($domain,'MX'))
 
                return false;
 
            else
 
                return true;
      
        }
        

          function isSent($email){
            require 'phpmailer/PHPMailerAutoload.php';
            $c=1;
            
            $mail = new PHPMailer;
            //$mail->isSMTP();
            $mail->Host = 'smpt.gmail.com';
            $mail->Port=465;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure='tls';
            $mail->Username = 'psstudy23@gmail.com';
            $mail->Password = 'Sasi@123';
            $mail->setFrom('psstudy23@gmail.com','Wolf');
            $mail->addAddress($email);
            $mail->addReplyTo('psstudy23@gmail.com');
            $mail->isHTML(true);
            $mail->Subject='Verify';
            $mail->Body='Verify';

            if(!$mail->send()){
                $c = 0;
                
            }
            else{
                
                
            }


            $mail = new PHPMailer;
            //$mail->isSMTP();
            $mail->Host = 'smpt.gmail.com';
            $mail->Port=587;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure='tls';
            $mail->Username = 'psstudy23@gmail.com';
            $mail->Password = 'Sasi@123';
            $mail->setFrom('psstudy23@gmail.com','Wolf');
            $mail->addAddress($email);
            $mail->addReplyTo('psstudy23@gmail.com');
            $mail->isHTML(true);
            $mail->Subject='Verify';
            $mail->Body='Verify';

            if(!$mail->send()){
                $c = 0;
                
            }
            else{
                
                
            }
            if($c){
                echo "true";
            }
            else{
                echo "false";
            }
          }
     function isDis($email){
        $domain = substr(strrchr($email, "@"), 1);
$dispose_domain = array();
/*
* fetching disposable emails from text file to array.
*/
$handle = fopen("dispose.txt", "r");
while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
$dispose_domain[$data[0]] = $data[0];
}
fclose($handle);
/*
* checking disposable email addresses which are stored in text file dispos1.txt
*/
if (in_array($domain, $dispose_domain)) {
echo "true";
} /*
* checking , if domain exist or not in DNS.
*/ elseif (!in_array($domain, $dispose_domain) && !fopen("http://$domain", 'r')) {
echo "true";
}
/*
* Checking the domains of all possible disposable emails providers.
*/ elseif (preg_match("/(ThrowAwayMail|DeadAddress|10MinuteMail|20MinuteMail|AirMail|Dispostable|Email Sensei|EmailThe|FilzMail|Guerrillamail|IncognitoEmail|Koszmail|Mailcatch|Mailinator|Mailnesia|MintEmail|MyTrashMail|NoClickEmail|
SpamSpot|Spamavert|Spamfree24|TempEmail|Thrashmail.ws|Yopmail|EasyTrashMail|Jetable|MailExpire|MeltMail|Spambox|empomail|33Mail|
E4ward|GishPuppy|InboxAlias|MailNull|Spamex|Spamgourmet|BloodyVikings|SpamControl|MailCatch|Tempomail|EmailSensei|Yopmail|
Trasmail|Guerrillamail|Yopmail|boximail|ghacks|Maildrop|MintEmail|fixmail|gelitik.in|ag.us.to|mobi.web.id
|fansworldwide.de|privymail.de|gishpuppy|spamevader|uroid|tempmail|soodo|deadaddress|trbvm)/i", $domain)) {
echo 'true';
} else {
echo "false";
}

     }
     function isRole($email){
        $em = explode('@',$email);
        $em1 = $em[0];
        $dispose_domain = array();
    
    $handle = fopen("role.txt", "r");
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
    $dispose_domain[$data[0]] = $data[0];
    }
    fclose($handle);
    
    if (in_array($em1, $dispose_domain)) {
    echo "true";
    }
    else{
        echo "false";
    } 
     }