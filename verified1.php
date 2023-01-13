<?php

        $e1 = $_POST['email'];
        include "includes/functions.php";
        

   
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
                                if(!isValidEmail($e1)){?>
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
                                ?>
                                
                                <td>1<td>
                                <td style="padding:5px"><?php echo $e1;?><td>
                                <td style="padding:5px">true</td>
                                <td style="padding:5px">true</td>
                                <td style="padding:5px">true</td>
                                <td style="padding:5px"><?php isSent($e1);?></td>
                                <td style="padding:5px"><?php isRole($e1);?></td>
                                <td style="padding:5px"> <?php isDis($e1);?></td>
                                <?php }?>
                            </tr>
                        </table>

                        <br><br>
                        <a class="btn btn--radius-2 btn--red" href="index.php" style="text-decoration:none">Verify Again</a>
                        
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