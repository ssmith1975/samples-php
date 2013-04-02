<?php
    // Logout
   require_once "_includes/db_connection.php";
   require_once "_includes/functions.php";
   require_once "_includes/header.php";
?>
  
  <?php
    if($_SESSION['isLoggedIn']) {
        session_unset();
        session_destroy();
        
        redirect_to("login.php");
    }
  
  ?> 
                        <div id="main">
        <div class="content-inner">
            
                <h1>Database</h1>
                <h2>Logout</h2>
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
                   // display_admin()
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
                        
