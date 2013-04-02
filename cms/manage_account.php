<?php
    // Add user
   require_once "_includes/db_connection.php";
   require_once "_includes/functions.php";
   require_once "_includes/header.php";
   ?>
   
  
<?php

   // On form submission
    if ( $_POST['submit'] == "Change Password" ) {
       
        $message = "";
    
        //Validate form fields
        $required_fields = array( "password");
        $fields_with_length = array();
        
        $errors = array();
        
        
        
        // Validatng required fields          
        foreach($required_fields as $field) {

            if( (  ( is_string($_POST[$field]) && empty($_POST[$field])  ) || is_null($_POST[$field]) )  /*&& !isset($errors[$field])*/) {
                $errors[$field] = "Required field.";
                //echo "{$field} is missing<br />";
            }
            
              
        }
       
        // Validating field length
         foreach($fields_with_length as $field=>$maxlength) {

            if( (strlen(trim($_POST[$field])) > $maxlength) && !isset($errors[$field]) ) {
               
                $errors[$field] = "Maximum number of characters exceeds {$maxlength}";
            }
            
         }    
         
         
         // Check password match
         if(strcmp($_POST['password'], $_POST['password_retype']) != 0) {
             $errors['password_retype'] = "Password does not match.";
         }
         
         // Prepare submission
         if ( count($errors) == 0){
            // If no errors found, insert new record into subject
            
            // Get row database from POST  
            //$username =  mysql_prep(trim($_POST['username']));   
            $password=  mysql_prep(trim($_POST['password']));
            //$role=  mysql_prep(trim($_POST['role']));


            
            if(change_password($uid, $password) ) {
                //$message = "Subject submitted successfully.." ;
                
               /* 
                // Register session variables
                session_register('isLoggedIn');
                session_register('uid');
                session_register('username');
                session_register('role');
                                
                // Set login status to true
                $_SESSION['isLoggedIn'] = true;
                
                // Save user id
                $_SESSION['uid'] = $uid;
                
                $user_set = get_user_by_id($uid);
                
                $_SESSION['username'] = $user_set['username'];
                $_SESSION['role'] = $user_set['role'];
                */
                
                $message .= "Password changed successfully."  ;    
                
                
                // Return to content page
                //redirect_to("index.php");
                
                               
                
            } else {
                $message .="Password changed failed.  -  " . mysql_error();
            }           
           
            
        } else {
            // Dsplay error messasge
           
            $message .= "Errors occurred."; 
            
            //$username =  sanitize(trim($_POST['username']));   
            //$password =  sanitize(trim($_POST['password']));
            //$role =  sanitize(trim($_POST['role']));        
            //$message .= "<br />Role:  {$role}";

            
            //$message .= join("<br />", $errors);
            //unset($errors);                 
        }        
          
      
    } else { // not submitted
        //$username="";
        $password="";
        //$role = "Contributor";
    }
        
             
         
         
?>   
  <div id="main">
        <div class="content-inner">
            
            <h1>Database</h1>
            <h2>Manage Account</h2>
                
                
            <?php 
                if(!empty($message)) {echo "<p class=\"message\">{$message}</p>";}
            ?>
            <p><strong>Username: </strong>&nbsp;<?php echo $username; ?><br />
               <strong>User Role:</strong>&nbsp;<?php echo $role; ?></p>            
            <h3>Change Password:</h3>

            
            <form name="change_password_form" method="POST" action="<?php echo $_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'] ; ?>">

                <table class="form-table" border="0" cellpadding="0" cellspacing="0">
                     <tr>                       
                        <td><label for="password">Password:</label></td>
                        <td><input name="password" type="password" size="30"  value="<?php //echo $password; ?>" /><span class="required">*</span>&nbsp;&nbsp;
                            <?php if(!empty($errors['password'])) {
                                echo "<span class=\"error\">{$errors['password']}</span>";
                            }
                             ?>
                        </td>
                      <tr>
                        <td><label for="password_retype">Retype Password:</label></td>
                        <td><input name="password_retype" type="password" size="30"  value="<?php //echo $password; ?>" />&nbsp;&nbsp;
                            <?php if(!empty($errors['password_retype'])) {
                                echo "<span class=\"error\">{$errors['password_retype']}</span>";
                            }
                             ?>
                        </td>                       

                        <tr>
                            <td colspan="2"><input name="submit" type="submit" value="Change Password" /><td>
                        </tr>                         
                        
                    </tr>                    
                </table> 
            </form>
            
            
      
            
            
        </div>
    </div>
    <div class="table-gutter"></div>
    <div id="sidebar">
        
        <div class="content-inner">
            
            <!-- Begin Menu -->
            <h2>Side bar</h2>
            <div id="nav"> 
                <h3>Subjects</h3>
                
                <?php 
                    // List of subjects
                    display_subjects();
                ?>    
                  <?php if($isAdmin): ?>
                <hr />
  
                                <?php
                    // Display admin
                    display_admin()
                 ?>                                       

                <?php endif; ?>                                      
            </div> 
            <!-- End Menu -->
            
            <div class="block"> 
                <h3>Block 1</h3>
                <p>Conventio augue gilvus wisi ea usitas velit. Fatua, ullamcorper neque appellatio nullus ad eu tation ex commoveo, diam iusto nutus melior. Blandit quod luptatum ut duis natu tincidunt exerci wisi lucidus consequat.</p>
            </div>  
            
            <div class="block"> 
                <h3>Block 2</h3>
                <p>Conventio augue gilvus wisi ea usitas velit. Fatua, ullamcorper neque appellatio nullus ad eu tation ex commoveo, diam iusto nutus melior. Blandit quod luptatum ut duis natu tincidunt exerci wisi lucidus consequat.</p>
            </div>      
        </div>                      
    </div>  
    
<?php
  
   require_once "_includes/footer.php";

?>                        
                        
