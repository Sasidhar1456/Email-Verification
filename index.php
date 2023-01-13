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
                        
                        <div class="form-row">
                            <div class="name">Email</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="email" name="email" required>
                                </div>
                            </div>
                        </div>
                        
                        
                        
                            <button class="btn btn--radius-2 btn--red" type="submit">Verify</button><br><br><br>
                            <b>(or)</b><br><br><br>
                            <a href="bulk_verify.php"><b>Click here for Bulk Verification</b></a> 
                    
                    
                           
                        </div>
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
