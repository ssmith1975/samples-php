<?php
   require_once "_includes/db_connection.php";
   require_once "_includes/functions.php";
   require_once "_includes/header.php";
   
   //$isAdmin = true;
    
?>
                        <div id="main">
                            <div class="content-inner">
                                
                                <h1>Database</h1>
                                <h2>Manage Users</h2>
                                <p class="add_user_link"><span class="add_16"></span><a href="add_user.php">Add User</a></span></p> 
                                <?php
                                    // Display all users
                                    display_users();
                                ?>
                                <p class="add_user_link"><span class="add_16"></span><a href="add_user.php">Add User</a></span></p>  
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
                                            
