<?php
   // Edit Subject
   require_once "_includes/db_connection.php";
   require_once "_includes/functions.php";
   require_once "_includes/header.php";  
?>
<?php


   // Initialize selected menu item
   $sel_subj = "";
   $sel_page = "";   
   //$isAdmin = true;
   
   // Capture id values from querystring 
   if( checkQueryString($_GET['sid']) || !empty($_GET['sid'] ) ) {
       
        $sel_subj = mysql_prep($_GET['sid']) ;

   }  else {
       redirect_to("index.php");
   }
   
    // On cancel
    if ( $_POST['cancel'] == "Cancel" ) {
        redirect_to("content.php?sid={$sel_subj}");
    }

    // On form submission
    if ( $_POST['submit'] == "Submit" ) {
       
        $message = "";
    
        //Validate form fields
        $required_fields = array("subject");
        $fields_with_length = array("subject"=>30);
        
        $errors = array();
        
        
        
        // Validatng required fields          
        foreach($required_fields as $field) {
            /*
            if( !isset($_POST[$field]) || empty($_POST[$field])  ){
                //echo "{$field}<br />";
                $errors['{$field}'] = "- Required field: {$field}";    
            } 
            */
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
    
               
      /*  
         if (strlen(trim($_POST['subject'])) > 30) {
              $errors['subject'] = "- Subject must contain less than 30 characters.";
         }
        */
        
        if ( count($errors) == 0){
            // If no errors found, insert new record into subject
            
            // Get row database from POST  
            $id =  mysql_prep(trim($_POST['id']));   
            $subject =  mysql_prep(trim($_POST['subject']));
            $position = mysql_prep(trim($_POST['position'])); // possibly new position
            $currentPosition = mysql_prep(trim($_POST['currentPosition'])); // position as supplied in the database            
            $description = mysql_prep(trim($_POST['description']));

            
            if(update_subject($id, $subject, $position, $currentPosition,  $description) ) {
                //$message = "Subject submitted successfully.." ;
                
                // Return to content page
                redirect_to("content.php?sid={$id}");
                
                               
                
            } else {
                $message ="Subject not added to database. " . mysql_error();
            }           
           
            
        } else {
            // Dsplay error messasge
           
            $message .= "Errors occurred."; 
            
            $id =  sanitize(trim($_POST['id']));   
            $subject =  sanitize(trim($_POST['subject']));
            $position = sanitize(trim($_POST['position']));
            $curentPosition = sanitize(trim($_POST['currentPosition']));            
            $description = sanitize(trim($_POST['description']));                     

            //$message .= join("<br />", $errors);
            //unset($errors);                 
        }
        
    
    } else {
        
       // Populate fields: Get row data from datatabase       
        $result = get_subject_id( $sel_subj);       
        
        if (mysql_num_rows($result) > 0 ) {
           $subject_row = mysql_fetch_array( $result ); 
            
            //echo "Populating fields";
            $id = $subject_row['id'];
            $subject = sanitize($subject_row['subject']);
            $description = sanitize($subject_row['description']);
            $position = sanitize($subject_row['position']);
            
            // Set current position
            $currentPosition = $position;
        } else {
            //redirect_to("index.php");
        }
       /* */ 
    }
    
    
    
?>

                        <div id="main">
                            <div class="content-inner">
                                
                                    <h1>Database</h1>
                                    
                                    <h2>Edit Subject</h2>
                                    <?php 
                                        if(!empty($message)) {echo "<p class=\"message\">{$message}</p>";}
                                    ?>
                                    <form name="edit_subject" method="POST" action="<?php echo $_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'] ; ?>">
                                        <input name="id" type="hidden"  value="<?php echo $id; ?>" />
                                        <input type="hidden" name="currentPosition" value="<?php echo $currentPosition; ?>" />
                                        
                                        <table class="form-table" border="0" cellpadding="0" cellspacing="0">
                                                                                       
                                            <tr>
                                                <td><label for="subject">Subject:</label></td>
                                                <td><input name="subject" type="text" size="30" maxlength="30" value="<?php echo $subject; ?>" /><span class="required">*</span>&nbsp;&nbsp;
                                                    <?php if(!empty($errors['subject'])) {
                                                        echo "<span class=\"error\">{$errors['subject']}</span>";
                                                    }
                                                     ?>
                                                </td>
                                            </tr>
                                             <tr>
                                                <td><label for="position">Position:</label></td>
                                                <td><?php
                                                        // Display position
                                                        display_subject_positions($position);
                                                    ?>
                                                    
                                                    
                                                </td>
                                            </tr> 
                                            <tr>
                                                <td><label for="description">Description:</label></td>
                                                <td><textarea name="description" cols="40" rows="8"><?php echo $description; ?></textarea> </td>
                                            </tr>   
                                            <!--<tr>
                                                <td><label for="visible">Visible:</label></td>
                                                <td>
                                                    <input name="visible" type="radio" value="1" checked="checked" />&nbsp;Yes&nbsp;&nbsp;
                                                    <input name="visible" type="radio" value="0" />&nbsp; No 
                                                </td>
                                            </tr> -->
                                            <tr>
                                                <td colspan="2"><input name="submit" type="submit" value="Submit" />&nbsp;&nbsp;<input name="cancel" type="submit" value="Cancel" /><td>
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