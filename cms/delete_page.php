<?php
// Delete Page
// Delete a single page from the database

   require_once "_includes/db_connection.php";
   require_once "_includes/functions.php";  
   require_once "_includes/header.php"; 
   
   $isAdmin = true;
   
   // Capture subject id values from querystring 
   if( checkQueryString($_GET['sid']) || !empty($_GET['sid'] ) ) {
       
        $sel_subj = mysql_prep($_GET['sid']) ;
        $subject_id = $sel_subj;
   }  else {
       redirect_to("index.php");
   }
 /* */ 
    // Capture page id values from querystring 
   if( checkQueryString($_GET['pid']) || !empty($_GET['pid'] ) ) {
       
       $sel_page = sanitize($_GET['pid']) ;
       $id = $sel_page;
   }  else {
       redirect_to("content.php?sid={$sel_subj}");
   }  

// Query datbase

    if(delete_page($id) ) {
        //$message = "Subject submitted successfully.." ;
        
        // Return to content page
        redirect_to("content.php?sid={$sel_subj}");
        
                       
        
    } else {
        $message ="Error: page not deleted from database. " . mysql_error();
    } 



?>


                        <div id="main">
                            <div class="content-inner">
                                
                                    <h1>Database</h1>
                                    
                                    <h2>Delete Page</h2>
                                    <?php
                                        if(!empty($message)) {
                                            echo "<p class=\"message\">{$message}</p>" ;
                                            
                                        }
                                    ?>
               
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