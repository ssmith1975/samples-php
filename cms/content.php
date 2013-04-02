<?php

   require_once "_includes/db_connection.php";
   require_once "_includes/functions.php";
   
   require_once "_includes/header.php"; 
   
   // Initialize selected menu item
   $sel_subj = "";
   $sel_page = "";   
   //$isAdmin = true;
   
   // Capture id values from querystring 
    if( checkQueryString($_GET['sid']) ) {
       
        $sel_subj = escape_string($_GET['sid']) ;
       
        // Get row data
        $subject_row = mysql_fetch_array(get_subject_id( $sel_subj  ) );
      
        $subject = sanitize($subject_row['subject']);
        $description = sanitize($subject_row['description']);
       
    
       
   /*} else if (checkQueryString($_GET['pid'])) {
       $sel_page = escape_string($_GET['pid']); */
   } else {
       redirect_to("index.php");
   }
   
?>
                        <div id="main">
                            <div class="content-inner">
                                
                                    <h1><?php echo $subject ?></h1>
                                    <div>
                                        <p><?php echo $description ?></p>
                                        
                                        <?php
                                            display_pages();
                                        ?>
                                    </div>
                                    <p><strong>Content:</strong> Sed placerat accumsan ligula. Aliquam felis magna, congue quis, tempus eu, aliquam vitae, ante. Cras neque justo, ultrices at, rhoncus a, facilisis eget, nisl. Quisque vitae pede. Nam et augue.</p>
                                    <p> Sed a elit. Ut vel massa. Suspendisse nibh pede, ultrices vitae, ultrices nec, mollis non, nibh. In sit amet pede quis leo vulputate hendrerit. Cras laoreet leo et justo auctor condimentum. Integer id enim. Suspendisse egestas, dui ac egestas mollis, libero orci hendrerit lacus, et malesuada lorem neque ac libero. Morbi tempor pulvinar pede. Donec vel elit.</p>                 
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
                                            
