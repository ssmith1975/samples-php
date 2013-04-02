<?php
    // Edit Page
   require_once "_includes/db_connection.php";
   require_once "_includes/functions.php";
   require_once "_includes/header.php";  
?>
<?php


   // Initialize selected menu item
   $sel_subj = "";
   $sel_page = "";   
   //$isAdmin = true;
   
   // Capture subject id values from querystring 
   if( checkQueryString($_GET['sid']) || !empty($_GET['sid'] ) ) {
       
        $sel_subj = mysql_prep($_GET['sid']) ;
        $subject_id = $sel_subj;
   }  else {
       redirect_to("index.php");
   }
   
    // Capture page id values from querystring 
   if( checkQueryString($_GET['pid']) || !empty($_GET['pid'] ) ) {
       
       $sel_page = sanitize($_GET['pid']) ;
       $id = $sel_page;
   }  else {
       redirect_to("content.php?sid={$sel_subj}");
   }  
   
   
   
    // On cancel
    if ( $_POST['cancel'] == "Cancel" ) {
        redirect_to("page.php?sid={$sel_subj}&pid={$sel_page}");
    }

    // On form submission
    if ( $_POST['submit'] == "Submit" ) {
       
   
        $message = "";
    
        //Validate form fields
        $required_fields = array("menu_name", "title", "content");
        $fields_with_length = array("menu_name"=>30, "title"=>120);
        
        $errors = array();
 
        // Va;idatng required fields          
        foreach($required_fields as $field) {

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
        
        
        if ( count($errors) == 0){
            // If no errors found, insert new record into pages
            $id = mysql_prep($_POST['id']);
            $subject_id = mysql_prep($_POST['subject_id']);
            $menu_name = mysql_prep($_POST['menu_name']);
            $title = mysql_prep($_POST['title']);          
            $content = mysql_prep($_POST['content']);
            $position = mysql_prep($_POST['position']);  
            $currentPosition = mysql_prep($_POST['currentPosition']);       
            $visible = mysql_prep($_POST['visible']);
            

            // Add to database
            if(update_page($id, $subject_id, $menu_name, $title, $content, $position, $currentPosition,  $visible) ) {

                // Redirect to updated page
                redirect_to("page.php?sid={$subject_id}&pid={$id}");
               
               
           } else {
               $message ="Page not added to database. " . mysql_error();
           }          
           
            
        } else {
            // Dsplay error messasge
           
            $message .= "Errors occurred."; 
            
            $id =  sanitize(trim($_POST['id']));  
            $subject_id = sanitize(trim($_POST['subject_id']));
             
            $menu_name =  sanitize(trim($_POST['menu_name']));
            $title =  sanitize(trim($_POST['title']));
            $content = sanitize(trim($_POST['content'])); 
            $position = sanitize(trim($_POST['position']));
            $curentPosition = sanitize(trim($_POST['currentPosition']));            
            $visible = sanitize(trim($_POST['visible']));                     

            //$message .= join("<br />", $errors);
            //unset($errors);           
           
           
        }
        
    
    } else {
        
       // Populate fields: Get row data from datatabase
       
       $page_result = get_page_id(mysql_prep($sel_page)) ;
       
        
        if (mysql_num_rows($page_result) > 0 ) {
            
            $page_row = mysql_fetch_array( $page_result );   
               

            $menu_name =  sanitize($page_row['menu_name']);
            $title =  sanitize($page_row['title']);
            $content = sanitize($page_row['content']); 
            $position = sanitize($page_row['position']);
            //$curentPosition = sanitize($page_row['subject']);            
            $visible = sanitize($page_row['visible']);  


            
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
                                    
                                    <h2>Edit Page</h2>
                                    <?php 
                                        if(!empty($message)) {echo "<p class=\"message\">{$message}</p>";}
                                    ?>
                                    <form name="edit_page" method="POST" action="<?php echo $_SERVER['PHP_SELF']."?".$_SERVER['QUERY_STRING'] ; ?>">
                                        <input name="id" type="hidden" value="<?php echo $id; ?>" />
                                        <input name="subject_id" type="hidden" value="<?php echo $subject_id; ?>" />                                        
                                        <input type="hidden" name="currentPosition" value="<?php echo $currentPosition; ?>" />
                                        
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
                                                <td><label for="content">Content <span class="required">*</span>:</label></td>
                                                <td><textarea name="content" cols="40" rows="8"><?php echo $content; ?></textarea> </td>
                                            </tr>                                              
                                            
                                             <tr>
                                                <td><label for="position">Position:</label></td>
                                                <td><?php
                                                        // Display position
                                                        display_page_positions($subject_id, $position);
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