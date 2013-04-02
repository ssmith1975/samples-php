<?php
    // Display Page
   require_once "_includes/db_connection.php";
   require_once "_includes/functions.php";
   
   require_once "_includes/header.php"; 
   
   // Initialize selected menu item
   $sel_subj = "";
   $sel_page = "";   
   //$isAdmin = true;
   
   // Capture id values from querystring 
    if( checkQueryString($_GET['sid']) ) {
       
        $sel_subj = sanitize($_GET['sid']) ;
       
        // Get subject row data
        $subject_row = mysql_fetch_array(get_subject_id( mysql_prep($sel_subj)  ) );
      
        $subject = sanitize($subject_row['subject']);
        $description = sanitize($subject_row['description']);
   
   }  else {
       redirect_to("index.php");
   }
   
   
    // Capture id values from querystring 
    if( checkQueryString($_GET['pid']) ) {
       
        $sel_page = sanitize($_GET['pid']);
       
        $page_result = get_page_id(mysql_prep($sel_page)) ;
  
        if (mysql_num_rows($page_result) > 0) {
            // Get page row data
            $page_row = mysql_fetch_array( $page_result) ;    
            
            //$page_menu_name = sanitize($page_row['menu_name']);
            $page_title = sanitize($page_row['title']);
            $page_content = sanitize($page_row['content']);
        } else {
            
            $page_title = "Untitled";
            $page_content = "No content exists";            
        }
      
       
   }  else {
       redirect_to("content.php?sid={$sel_subj}");
   }  
   
   
   
?>
                        <div id="main">
                            <div class="content-inner">
                                
                                    <h1><?php echo $page_title ?></h1>
                                    <div>
                                        <p><?php echo $page_content ?></p>
                                    </div>
                
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
                                            
