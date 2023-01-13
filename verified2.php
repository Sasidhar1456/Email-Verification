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
    require_once 'phpmailer/PHPMailerAutoload.php';
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
        return true;
    }
    else{
        return false;
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
return true;
} /*
* checking , if domain exist or not in DNS.
*/ elseif (!in_array($domain, $dispose_domain) && !fopen("http://$domain", 'r')) {
return true;
}
/*
* Checking the domains of all possible disposable emails providers.
*/ elseif (preg_match("/(ThrowAwayMail|DeadAddress|10MinuteMail|20MinuteMail|AirMail|Dispostable|Email Sensei|EmailThe|FilzMail|Guerrillamail|IncognitoEmail|Koszmail|Mailcatch|Mailinator|Mailnesia|MintEmail|MyTrashMail|NoClickEmail|
SpamSpot|Spamavert|Spamfree24|TempEmail|Thrashmail.ws|Yopmail|EasyTrashMail|Jetable|MailExpire|MeltMail|Spambox|empomail|33Mail|
E4ward|GishPuppy|InboxAlias|MailNull|Spamex|Spamgourmet|BloodyVikings|SpamControl|MailCatch|Tempomail|EmailSensei|Yopmail|
Trasmail|Guerrillamail|Yopmail|boximail|ghacks|Maildrop|MintEmail|fixmail|gelitik.in|ag.us.to|mobi.web.id
|fansworldwide.de|privymail.de|gishpuppy|spamevader|uroid|tempmail|soodo|deadaddress|trbvm)/i", $domain)) {
return true;
} else {
return false;
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
return true;
}
else{
return false;
} 
}
        

   
        function isSMTP($email){
            require_once 'VerifyEmail.class.php'; 

            // Initialize library class
            $mail = new VerifyEmail();
            
            // Set the timeout value on stream
            $mail->setStreamTimeoutWait(1);
            
            // Set debug output mode
            $mail->Debug= FALSE; 
            $mail->Debugoutput= 'html'; 
            
            // Set email address for SMTP request
            $mail->setEmailFrom('from@email.com');
            
            // Email to check
             
            
            // Check if email is valid and exist
            if($mail->check($email)){ 
                return true; 
            }
            else{ 
                return false; 
            }        
          }
          $fileName = $_FILES['file']['name'];
    $fileLoc  = $_FILES['file']['tmp_name'];
    
    
    if (($open = fopen($fileLoc, "r")) !== FALSE) 
  {
  
    while (($data = fgetcsv($open, 1000, ",")) !== FALSE) 
    {        
      $array[] = $data; 
    }
  
    fclose($open);
  }
  $newarr = [];
  $e2 = $array[0][0];
    $e1 = substr($e2, 3, strlen($e2)-3);
  
  //To display array data
  
    

    
 
    
     
    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    
    <?php
    include "includes/head_links.php";
    ?>
</head>

<body>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Email Verification</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="verified1.php">
                        <table border="1" >
                            <tr>
                                <th style="padding:5px">S.NO<th>
                                <th style="padding:5px">Email<th>
                                <th style="padding:5px">Format Valid</th>
                                <th style="padding:5px">MX found</th>
                                <th style="padding:5px">SMTP check</th>
                                <th style="padding:5px">Catch all</th>
                                <th style="padding:5px">Role</th>
                                <th style="padding:5px">Diposable email</th>
                            </tr>
                            <tr>
                                <?php
                                
                                if(!isValidEmail($e1)){
                                    $txt= [$e1.",faslse,false,false,false,false"];
                                    $newarr[0] = $txt;
                                    ?>
                                    <td>1<td>
                                <td style="padding:5px"><?php echo $e1;?><td>
                                <td style="padding:5px">false</td>
                                <td style="padding:5px">false</td>
                                <td style="padding:5px">false</td>
                                <td style="padding:5px">false</td>
                                <td style="padding:5px">false</td>
                                <td style="padding:5px">false</td>
                                <?php
                                }
                                else if(!isMX($e1)){
                                    $txt= [$e1.",true,false,false,false,false"];
                                    $newarr[0] = $txt;
                                    ?>
                                    <td>1<td>
                                <td style="padding:5px"><?php echo $e1;?><td>
                                <td style="padding:5px">true</td>
                                <td style="padding:5px">false</td>
                                <td style="padding:5px">false</td>
                                <td style="padding:5px">false</td>
                                <td style="padding:5px">false</td>
                                <td style="padding:5px">false</td>
                                <?php
                                }
                                else if(!isSMTP($e1))
                                {
                                    $txt= [$e1.",true,true,false,false,false"];
                                    $newarr[0] = $txt;
                                    ?>
                                    <td>1<td>
                                <td style="padding:5px"><?php echo $e1;?><td>
                                <td style="padding:5px">true</td>
                                <td style="padding:5px">true</td>
                                <td style="padding:5px">false</td>
                                <td style="padding:5px">false</td>
                                <td style="padding:5px">false</td>
                                <td style="padding:5px">false</td>
                                <?php    
                                }else{
                                
                                
                                $role="";
                                    $dis=""; 
                                    $sent="";
                                    if (isRole($e1)==1){$role="true";}else{$role="false";}
                                    if (isDis($e1)==1){$dis="true";}else{$dis="false";}
                                    if (isSent($e1)==1){$sent="true";}else{$sent="false";}
                                    $txt= [$e1.",true,true,true"."$sent".","."$role".","."$dis"];
                                    $newarr[0] = $txt;
                                    ?>
                                
                                <td><?php echo $i+1;?><td>
                                <td style="padding:5px"><?php echo $array[$i][0];?><td>
                                <td style="padding:5px">true</td>
                                <td style="padding:5px">true</td>
                                <td style="padding:5px">true</td>
                                <td style="padding:5px"><?php echo $sent;?></td>
                                <td style="padding:5px"><?php echo $role;?></td>
                                <td style="padding:5px"> <?php echo $dis;?></td>
                                <?php }?>
                            </tr>
                            
                            <?php
                            for($i=1;$i<sizeof($array);$i++){?>
                            <tr>
                                <?php
                                if(!isValidEmail($array[$i][0])){?>
                                <?php
                                    $txt= [$array[$i][0].",faslse,false,false,false,false"];
                                    $newarr[$i] = $txt;
                                    
                                ?>
                                    <td><?php echo $i+1;?><td>
                                <td style="padding:5px"><?php echo $array[$i][0];?><td>
                                <td style="padding:5px">false</td>
                                <td style="padding:5px">false</td>
                                <td style="padding:5px">false</td>
                                <td style="padding:5px">false</td>
                                <td style="padding:5px">false</td>
                                <td style="padding:5px">false</td>
                                <?php
                                }
                                else if(!isMX($array[$i][0])){
                                    ?>
                                    <?php
                                    $txt= [$array[$i][0].",true,false,false,false,false"];
                                    $newarr[$i] = $txt;
                                    ?>
                                    <td><?php echo $i+1;?><td>
                                <td style="padding:5px"><?php echo $array[$i][0];?><td>
                                <td style="padding:5px">true</td>
                                <td style="padding:5px">false</td>
                                <td style="padding:5px">false</td>
                                <td style="padding:5px">false</td>
                                <td style="padding:5px">false</td>
                                <td style="padding:5px">false</td>
                                <?php
                                }
                                else if(!isSMTP($array[$i][0]))
                                {
                                    ?>
                                    <?php
                                    $txt= [$array[$i][0].",true,true,false,false,false"];
                                    $newarr[$i] = $txt;
                                    ?>
                                    <td><?php echo $i+1;?><td>
                                <td style="padding:5px"><?php echo $array[$i][0];?><td>
                                <td style="padding:5px">true</td>
                                <td style="padding:5px">true</td>
                                <td style="padding:5px">false</td>
                                <td style="padding:5px">false</td>
                                <td style="padding:5px">false</td>
                                <td style="padding:5px">false</td>
                                <?php    
                                }else{
                                ?>
                                <?php
                                    
                                    $role="";
                                    $dis=""; 
                                    $sent="";
                                    if (isRole($array[$i][0])==1){$role="true";}else{$role="false";}
                                    if (isDis($array[$i][0])==1){$dis="true";}else{$dis="false";}
                                    if (isSent($array[$i][0])==1){$sent="true";}else{$sent="false";}
                                    $txt= [$array[$i][0].",true,true,true"."$sent".","."$role".","."$dis"];
                                    $newarr[$i] = $txt;
                                    ?>
                                
                                <td><?php echo $i+1;?><td>
                                <td style="padding:5px"><?php echo $array[$i][0];?><td>
                                <td style="padding:5px">true</td>
                                <td style="padding:5px">true</td>
                                <td style="padding:5px">true</td>
                                <td style="padding:5px"><?php echo $sent;?></td>
                                <td style="padding:5px"><?php echo $role;?></td>
                                <td style="padding:5px"> <?php echo $dis;?></td>
                                <?php }?>
                            </tr>
                            <?php } 
                            $fp = fopen('new.csv', 'w');
  
                            // Loop through file pointer and a line
                            foreach ($newarr as $fields) {
                                fputcsv($fp, $fields);
                            }?>
                        </table>

                        <br><br>
                        <a class="btn btn--radius-2 btn--red" href="bulk_verify.php" style="text-decoration:none">Verify Again</a><b>(or)
                        <a class="btn btn--radius-2 btn--red" href="new.csv" style="text-decoration:none" download>Download</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
    <?php
    include "includes/foot.php";
    ?>

</body>

</html>