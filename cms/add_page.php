
<?php
   // Add page
   require_once "_includes/db_connection.php";
   require_once "_includes/functions.php";
   require_once "_includes/header.php";  
?>
<?php

    $sel_subj = "";
    $isAdmin = true;
    
   // Capture id values from querystring 
   if( checkQueryString($_GET['sid']) || !empty($_GET['sid'] ) ) {
       
        $subject_id = sanitize($_GET['sid']) ;
       $sel_subj = $subject_id;
   }  else {
       redirect_to("index.php");
   }

    // On cancel
    if ( $_POST['cancel'] == "Cancel" ) {
        redirect_to("content.php?sid={$ubject_id}");
    }

    // On submit
    if ( $_POST['submit'] == "Submit" ) { // On form submission
   
        $message = "";
    
        //Validate form fields
        $required_fields = array("menu_name", "title", "content");
        $fields_with_length = array("menu_name"=>30, "title"=>120);
        
        $errors = array();
 
        // Va;idatng required fields          
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

            if( (strlen(trim($_POST[$field])) > $maxlength) ) {
             
                $errors[$field] = "Maximum number of characters exceeds {$maxlength}";
            }
            
              
        } 
        
        
        if (empty($errors) ){
         // If no errors found, insert new record into subject
             
         // $subject_id =  mysql_prep($_POST['subject_id']);
          $menu_name = mysql_prep($_POST['menu_name']);
          $title = mysql_prep($_POST['title']);          
          $content = mysql_prep($_POST['content']);
          $position = mysql_prep($_POST['position']);         
          $visible = mysql_prep($_POST['visible']);



           if(add_page($subject_id, $menu_name, $title, $content, $position, $visible) ) {
                   
               // Capture new page id            
               $id = get_insert_id();
               
               // Redirect to thisnew page
               redirect_to("page.php?sid={$subject_id}&pid={$id}");
               
               
           } else {
               $message ="Page not added to database. " . mysql_error();
           }
 

            
        } else {
            // Dsplay error messasge
            $message .= "Please fix the following errors:  <br />";
            
            //$message .= join("<br />", $errors);
            //unset($errors);
            
            $subject_id =  isset($_POST['subject_id'])?sanitize($_POST['subject_id']):"";
            $menu_name = isset($_POST['menu_name'])?sanitize($_POST['menu_name']):"";   
            $title = isset($_POST['title'])?sanitize($_POST['title']):"";           
            $content = isset($_POST['content'])?sanitize($_POST['content']):""; 
            $position = isset($_POST['position'])?sanitize($_POST['position']):"";         
            $visible = isset($_POST['visible'])?sanitize($_POST['visible']):1;          
            
                   
        }
        
    
    } else {
        // Initialize fields
        $visible_yes = "checked";
        $visible_no = "";
        
        $visible = 1;
        
    }
?>

                        <div id="main">
                            <div class="content-inner">
                                
                                    <h1>Database</h1>
                                    
                                    <h2>Add Page</h2>
                                    <?php 
                                        if(!empty($message)) {echo "<p class=\"message\">{$message}</p>";}
                                    ?>
                                    <form name="add_page" method="POST" action="<?php echo $_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'] ; ?>">
                                        <input name="subject_id" type="hidden" value="<?php echo $subject_id; ?>" />
                                        <table class="form-table" border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td><label for="menu_name">Menu Name:</label></td>
                                                <td><input name="menu_name" type="text" size="30" maxlength="30" value="<?php echo $menu_name; ?>" /><span class="required">*</span>&nbsp;&nbsp;
                                                    <?php if(!empty($errors['menu_name'])) {
                                                        echo "<span class=\"error\">{$errors['menu_name']}</span>";
                                                    }
                                                     ?>
                                                    
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td><label for="title">Title</label></td>
                                                <td><input name="title" type="text" size="30" maxlength="120" value="<?php echo $title; ?>" /><span class="required">*</span>&nbsp;&nbsp;
                                                    <?php if(!empty($errors['title'])) {
                                                        echo "<span class=\"error\">{$errors['title']}</span>";
                                                    }
                                                     ?>
                                                    
                                                </td>
                                            </tr>                                            
                                            <tr>
                                                <td><label for="content">Content:<span class="required">*</span></label></td>
                                                <td><textarea name="content" cols="40" rows="8"><?php echo $content; ?></textarea> </td>
                                            </tr>                                              
                                            
                                             <tr>
                                                <td><label for="position">Position:</label></td>
                                                <td><?php
                                                        // Display position
                                                        display_page_positions($subject_id);
                                                    ?>
                                                    
                                                    
                                                </td>
                                            </tr> 
 
                                            <tr>
                                                <td><label for="visible">Visible:</label></td>
                                                <td>
                                                    
                                                    <input name="visible" type="radio" value="1" <?php  echo (($visible==1)? "checked": "");  //echo $visible_yes; ?> />&nbsp;Yes&nbsp;&nbsp;
                                                    <input name="visible" type="radio" value="0" <?php echo (($visible==0)? "checked": "")   //echo $visible_no;  ?> />&nbsp; No 
                                                </td>
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
