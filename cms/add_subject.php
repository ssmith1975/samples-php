<?php
    // Add Subject
   require_once "_includes/db_connection.php";
   require_once "_includes/functions.php";
   require_once "_includes/header.php";  
?>
<?php
    //$isAdmin = true;
    
    // On cancel
    if ( $_POST['cancel'] == "Cancel" ) {
        redirect_to("index.php");
    }

    // On submit
    if ( $_POST['submit'] == "Submit" ) { // On form submission
       
       
        $message = "";
    
        //Validate form fields
        $required_fields = array("subject");
        $fields_with_length = array("subject"=>30);
        
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

            if( (strlen(trim($_POST[$field])) > $maxlength) && !isset($errors[$field])) {
             
                $errors[$field] = "Maximum number of characters exceeds {$maxlength}";
            }        
        } 
        
        
        if (empty($errors) ){
         // If no errors found, insert new record into subject
             
          $subject =  mysql_prep($_POST['subject']);
          $position = mysql_prep($_POST['position']);
          $description = mysql_prep($_POST['description']);
          

           if(add_subject($subject, $position, $description) ) {
               // $message = "Subject submitted successfully.." ;
               // Return to content page
               
               $id = get_insert_id();
               
               redirect_to("content.php?sid={$id}");
               
               
           } else {
               $message ="Subject not added to database. " . mysql_error();
           }
 

            
        } else {
            // Dsplay error messasge
            $message .= "Error: <br />";
            
            $message .= join("<br />", $errors);
            unset($errors);
           
        }
        
    
    }
?>
                        <div id="main">
                            <div class="content-inner">
                                
                                    <h1>Database</h1>
                                    
                                    <h2>Add Subject</h2>
                                    <?php 
                                        if(!empty($message)) {echo "<p class=\"message\">{$message}</p>";}
                                    ?>
                                    <form name="add_subject" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                        <table class="form-table" border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td><label for="subject">Subject:</label></td>
                                                <td><input name="subject" type="text" size="30" value="" /><span class="required">*</span>&nbsp;&nbsp;
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
                                                        display_subject_positions();
                                                    ?>
                                                    
                                                    
                                                </td>
                                            </tr> 
                                            <tr>
                                                <td><label for="description">Description:</label></td>
                                                <td><textarea name="description" cols="40" rows="8"></textarea> </td>
                                            </tr>   

                                            <tr>
                                                <td colspan="2">  <input name="reset" type="reset" value="Reset" />&nbsp;<input name="submit" type="submit" value="Submit" />&nbsp;&nbsp;<input name="cancel" type="submit" value="Cancel" /></td>
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