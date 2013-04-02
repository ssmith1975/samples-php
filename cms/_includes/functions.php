<?php



/* -------------- SUBJECTS ---------------- */
/** 
 * Select all subjects
 * @return $result
 */
 
function get_all_subjects() {
    global $conn;
    
    $query = "SELECT * FROM subjects ORDER BY position ASC";
    
    $result = mysql_query($query, $conn);
    
    if ($result) {
        return $result; 
    } else {
        return NULL;
    }
   
}


/** 
 * Select subject by id
 * @param $sid subject id
 * @return $result
 */
function get_subject_id($id) {
    global $conn;
    
   $query = "SELECT * FROM subjects ";
   $query .= "WHERE id={$id};";
    $result = mysql_query($query, $conn) or die("Unable to update subject positions. ". mysql_error());
   
    if ($result) {
        
        return $result; 
    } else {
        return NULL;
    }
   
}
 
/**
 * Insert subject fields into database
 * @param string $subject
 * @param integer $position
 * @param  string $description
 * @return boolean
 */
function add_subject($subject, $position, $description) {
    global $conn;
    
    // Shift position
    insert_position($position, 'subjects');
    
    $query = "INSERT INTO subjects (subject, position, description) ";
    $query .= "VALUES('{$subject}', {$position}, '{$description}');";
    
    //echo $query;
    $result = mysql_query($query, $conn);
    if (mysql_affected_rows()==1) {
        
        return true; 
    } else {
        return false;
    }
}



 /**
  * Update a single record in subjects
  * @param integer $id - Record id
  * @param string $subject - Subject name
  * @param integer $position - Position
  * @param string $description - Description
  * @return boolean
  */
function update_subject($id, $subject, $position, $currentPosition, $description)  {
    global $conn;
    
    if($position != $currentPosition) {
        update_position($position, $currentPosition,'subjects');
    }
    
    
    $query = "UPDATE subjects SET subject='{$subject}', position={$position}, 
        description='{$description}' WHERE id={$id};";
    
    $result = mysql_query($query, $conn);  
    
    if (mysql_affected_rows()==1) {
        
        return true; 
    } else {
        return false;
    }   
        
 }
 
  /**
  * Delete a single record in subjects
  * @param integer $id - Record id
  * @return boolean
  */
 function delete_subject($id) {
     global $conn;
     
    // Get position
    $queryPosition = "SELECT position FROM subjects WHERE id = {$id}";
    $resultPosition = mysql_query($queryPosition, $conn);
    
    if (mysql_num_rows($resultPosition) > 0) {
        $pos = $resultPosition['position'];
   
    }   else {
        return false;
    }     
     
   // Set up DELETE query for a single subject  
    $query = "DELETE FROM subjects WHERE id = {$id}";    
    $result = mysql_query($query, $conn);  
    
    if (mysql_affected_rows()==1) {

        // Adjust subject positions       
        remove_position($pos, 'subjects');
        delete_subject_pages($id);
        
        return true; 
    } else {
        return false;
    }       
     
 }



/** 
 * Display a list of subjects
 * 
 */
  
function display_subjects() {
    global $sel_subj;
    
    $subject_set = get_all_subjects();
    
    // Accessing Data
      
     
     if ($subject_set) {
         if (mysql_num_rows($subject_set) > 0) {
                 
             echo "<ul>";
             
             while( $row = mysql_fetch_array($subject_set) ) {
                 $subject = sanitizeSQL($row['subject']);
                 $id = urlencode($row['id']);
                 
                 $selected = "";
              
                 if($sel_subj == $row['id']) {
                    $selected = "class=\"selected\" ";  
                     
                    echo "<li><a {$selected} href=\"content.php?sid={$id} \">{$subject}</a></li>";
                     
                    // Display page sublist for this subject 
                    display_pages(); 
                    
                    //echo "<li><a href=\"edit_subject.php?sid={$id} \">+ Edit Subject</a></li>";
                    //echo "<li><a href=\"delete_subject.php?sid={$id} \">+ Delete Subject</a></li>"; 
                    //echo "<li><a href=\"add_page.php?sid={$id} \">+ Add Page</a></li>";    
                 } else {
                     
                     echo "<li><a href=\"content.php?sid={$id} \">{$subject}</a></li>";
                 }
                 
                 
                 
             }
             
             //echo "<li><a href=\"add_subject.php \">+ Add Subject</a></li>"; 
              
             echo "</ul>";
             
         } else {
             echo "<p>No subjects available.</p>";
         }
         
         
     }  else {
         echo "<p>Database query failed. </p><p>" . mysql_error() . "</p>";
     }    
}

/**
 * Display subject position in combobox
 * @param integer $pos
 */
 
 function display_subject_positions($pos="") {
     $subject_set = get_all_subjects();

     echo "<select name=\"position\">";
   
      if ($subject_set) {
          
          $count = 1 ; 
          $count += mysql_num_rows($subject_set);
         
         // Set selected index and max index 
         if( empty($pos) ) {
             // Set selected index equal to last for new items
             $selected_index = $count;
             $max_index = $count + 1;
         } else {
             
             $selected_index = $pos;
             $max_index = $count;
         }
         
         // Populate combobox, if subjects exists 
         if (mysql_num_rows($subject_set) > 0) {
             
            for($i=1; $i<$max_index; $i++) {
                echo "<option value\"{$i}\"". (($i==$selected_index)?" selected=\"selected\"":""). ">{$i} </option>";
            }    
                
          } else {
               // Display at least 1 row
                echo "<option value=\"1\" selected=\"selected\">1</option>";
          }
   
     }  else {
           // Display at least 1 row
            echo "<option value=\"1\" selected=\"selected\">1</option>";         
         
         //echo "<p>Database query failed. </p><p>" . mysql_error() . "</p>";
     }  
     
     echo "</select>";    
 }
 
 

 
 /* -------------- PAGES -------------------- */
 /** 
 * Select all pages for a specific subject
  * @param integer $subject_id
 *  @return resultset $result
 */
 
function get_subject_pages($subject_id) {
    global $conn;
    
    $query = "SELECT * FROM pages WHERE subject_id={$subject_id} ORDER BY position ASC";
    
    $result = mysql_query($query, $conn);
    
    if ($result) {
        return $result; 
    } else {
        return NULL;
    }
   
}

/** 
 * Select page by id
 * @param $sid subject id
 * @return resultset $result
 */
function get_page_id($id) {
    global $conn;
    
   $query = "SELECT * FROM pages ";
   $query .= "WHERE id={$id};";
    $result = mysql_query($query, $conn) or die("Unable to get page by id. ". mysql_error());
   
    if ($result) {
        
        return $result; 
    } else {
        return NULL;
    }
   
}


/** 
 * Display a list of subjects
 * 
 */
  
function display_pages() {
    global $sel_page;
    global $sel_subj;
    
    $pages_set = get_subject_pages($sel_subj);
    
    // Accessing Data
      
     
     if ($pages_set) {
         if (mysql_num_rows($pages_set) > 0) {
                 
             echo "<ul class=\"page\">";
             
             while( $row = mysql_fetch_array($pages_set) ) {
                 $page_menu_name = sanitize($row['menu_name']);
                 $page_id = urlencode($row['id']);
                 
                 $selected = "";
              
                 // Give selected page special styling
                 if($sel_page == $page_id) {
                    $selected = "class=\"selected_page\" ";  
                    // Display selected menu name
                    echo "<li><a {$selected} href=\"page.php?sid={$sel_subj}&pid={$page_id }\">{$page_menu_name}</a></li>"; 
                    //echo "<li><a href=\"edit_page.php?sid={$sel_subj}&pid={$page_id }\">+ Edit Page</a></li>"; 
                   // echo "<li><a href=\"delete_page.php?sid={$sel_subj}&pid={$page_id }\">+ Delete Page</a></li>";    
                 } else {
                     
                    // Display menu name
                 echo "<li><a {$selected} href=\"page.php?sid={$sel_subj}&pid={$page_id }\">{$page_menu_name}</a></li>"; 
                 }
  
             }
             
             echo "</ul>";
             
         } else {
             echo "<p>No pages available for this subject.</p>";
             
             
             
         }

     }  else {
         echo "<p>Database query failed. </p><p>" . mysql_error() . "</p>";
     }    
}

/**
 *  Add page
 *  @param integer $subject_id
 *  @param string $menu_name - short menu title for page
 *  @param string $title - long title name for page
 *  @param string $content - page content
 *  @param integer $position - position within the list of pages
 *  @param boolean $visible - page visibility
 *  @return boolean (0 or 1)
 */
 
 function add_page($subject_id, $menu_name, $title, $content, $position, $visible) {
    global $conn;
    
     // Shift position
    insert_position($position, 'pages');
    
    $query = "INSERT INTO pages (subject_id, menu_name, title, content, position, visible) ";
    $query .= "VALUES({$subject_id}, '{$menu_name}', '{$title}', '{$content}', {$position}, {$visible});";
    
    //echo $query;
    $result = mysql_query($query, $conn);
    if (mysql_affected_rows()==1) {
        
        return true; 
    } else {
        return false;
    }    
 }
 
 
/**
 *  Edit page
 *  @param integer $id
 *  @param integer $subject_id
 *  @param string $menu_name - short menu title for page
 *  @param string $title - long title name for page
 *  @param string $content - page content
 *  @param integer $position - position within the list of pages
 *  @param boolean $visible - page visibility
 *  @return boolean (0 or 1)
 * 
 */
function update_page($id, $subject_id, $menu_name, $title, $content, $position, $currentPosition, $visible) {
    global $conn;
    
    if ($position != $currentPosition){
        echo "Current Position: {$currentPosition}<br />";
         // Shift position
        update_position($position, $currentPosition, "pages",  "subject_id={$subject_id}");      
    } 

    
    $query = "UPDATE pages SET ";
   // $query .= "subject_id='({$subject_id}', "; 
    $query .= "menu_name='{$menu_name}', "; 
    $query .= "title='{$title}', "; 
    $query .= "content='{$content}', "; 
    $query .= "position={$position}, "; 
    $query .= "visible={$visible} "; 
    $query .= "WHERE id= {$id};";
        

    //echo $query;
    $result = mysql_query($query, $conn);
    if (mysql_affected_rows()==1) {
        
        return true; 
    } else {
        return false;
    } 
}


/**
 * Delete page 
 *  @param integer $id
 *  @return boolean 
 */
 function delete_page($id) {
    global $conn;
    global $sel_subj;
    
    // Get position
    $queryPosition = "SELECT position FROM pages WHERE id = {$id}";
    $resultPosition = mysql_query($queryPosition, $conn) or die("Position Request (delete_page): " . mysql_error());

    
    if (mysql_num_rows($resultPosition) > 0) {
        $row = mysql_fetch_assoc($resultPosition);
        $pos = $row['position'];
        //$subject_id = $resultPosition['subject_id'];
        
        // Set up DELETE query for a single subject  
        $query = "DELETE FROM pages WHERE id = {$id}"; 
           
        $result = mysql_query($query, $conn);  
        
        if (mysql_affected_rows()==1) {
    
            // Adjust subject positions       
            remove_position($pos, "pages", "subject_id={$sel_subj}");
            
            
            return true; 
        } else {
            return false;
        }   
   
   
   
    }   else {
        return false;
    }     
     
      
 }
 
 
/**
 * Delete pages belonging to a particular subject 
 *  @param integer subject_$id
 *  @return boolean 
 */
function delete_subject_pages($subject_id){
    $query = "DELETE FROM pages WHERE subject_id = {$subject_id}";    
    $result = mysql_query($query, $conn);     
}
 
 
 
/**
 * Display subject position in combobox
 * @param string $subject_id
 * @param integer $pos (optional)
 */
 
 function display_page_positions($subject_id, $pos="") {
     
     // Get all pages for a subject
     $page_set = get_subject_pages($subject_id);
      
     echo "<select name=\"position\">";

      if ($page_set) {
          
          $count = 1 ; 
          $count += mysql_num_rows($page_set);
        
         // Set selected index and max index       
         if( empty($pos) ) {
             // Set selected index equal to last for new items
             $selected_index = $count;
             $max_index = $count + 1;
         } else {
             $selected_index = $pos;
             $max_index = $count;
         }
         
         // Populate combobox, if subjects exists  
         if (mysql_num_rows($page_set) > 0) {
  
            for($i=1; $i<$max_index; $i++) {
                echo "<option value\"{$i}\"". (($i==$selected_index)?" selected=\"selected\"":""). ">{$i} </option>";
            }    
                
          } else {
            // Display at least 1 row
             echo "<option value=\"1\" selected=\"selected\">1</option>";               
          }
         
     }  else {
         // Display at least 1 row
             echo "<option value=\"1\" selected=\"selected\">1</option>";   
         
         //echo "<p>Database query failed. </p><p>" . mysql_error() . "</p>";
     }  
     
     echo "</select>";    
 }
 
/* -------------- USERS -------------------- */

/** Add user
 *  @param string $username
 *  @param string $password
 *  @return integer $id;
 * 
 */
function add_user($username, $password, $role) {
     global $conn;
     
     
     $hashed_password = md5($password);
     
     $query = "INSERT INTO users (username, hashed_password, role) ";
     $query .= " VALUES ('{$username}', '{$hashed_password}', '{$role}' ); ";

     
     $results = mysql_query($query, $conn) or die("Username/password authentication failed. " . mysql_error());
     
     if(mysql_affected_rows() == 1) {
         $row = mysql_fetch_array($results);
         $id= mysql_insert_id();
         return $id;
     } else {
         
         return false;
     }
     
}


/** Authenticate user
 *  @param string $username
 *  @param string $password
 *  @return integer $id;
 * 
 */
 
 function authenticate_user($username, $password) {
     global $conn;
     
     
     $hashed_password = md5($password);
     
     $query = "SELECT id FROM users ";
     $query .= "WHERE username = '{$username}' ";
     $query .= "AND hashed_password='{$hashed_password}'; ";
     
     $results = mysql_query($query, $conn) or die("Username/password authentication failed. " . mysql_error());
     
     if(mysql_num_rows($results) > 0) {
         $row = mysql_fetch_array($results);
         $id= $row['id'];
         return $id;
     } else {
         
         return false;
     }
     
     
 }
 
  /** Get all users
 *  
 *  @return result
 * 
 */
 function get_all_users() {
     global $conn;
     
     $query = "SELECT id, username, role FROM users;";
     
     $results = mysql_query($query, $conn) or die(mysql_error());
     
     if(mysql_num_rows($results) > 0) {
         //$row = mysql_fetch_array($results);
        
         return $results;
     } else {
         
         return false;
     }     
 }
 
 
 /** Get user by id
 *  @param integer $id
 *  @return result
 * 
 */
 function get_user_by_id($id) {
     global $conn;
     
     $query = "SELECT id, username, role FROM users WHERE id={$id};";
     
     $results = mysql_query($query, $conn) or die(mysql_error());
     
     if(mysql_num_rows($results) > 0) {
         $row = mysql_fetch_array($results);
        
         return $row;
     } else {
         
         return false;
     }     
 }
 
 
   /** Change user password
 *  @param string $uid - user id
 *  @param string $newPassword - new password
 *  @return boolean
 * 
 */
 function change_password($uid, $password) {
     global $conn;
     
     $hashed_password = md5($password);
     
     $query = "UPDATE users SET hashed_password = '{$hashed_password}' ";
     $query .= "WHERE id={$uid};";
     
     $result = mysql_query($query, $conn) or die('Password update has failed. ' . mysql_error());
     
     if(mysql_affected_rows() == 1){
         return true;
     } else {
         return false;
     }
 }
 
 /**
 * Delete user 
 *  @param integer $id
 *  @return boolean 
 */
 function delete_user($id) {
    global $conn;
    
    $query = "DELETE FROM users WHERE id = {$id};"; 
           
    $result = mysql_query($query, $conn);  
        
    if (mysql_affected_rows()==1) {      
        return true; 
    } else {
        return false;
    }   
  
 }
 
 
  /** Check Admin status
 *  @param string role
 *  @return boolean
 * 
 */
 
 function checkIsAdmin($role) {
     
   $status = in_array($role, array("Admin", "Contributor")) ;
   
    if ($status){
        return true;
    } else {
    
        return false; 
    } 
 }
 
 
 /** Display all users
  * 
  */
  
 function display_users() {
     
     $users_set = get_all_users();
     
     if(mysql_num_rows($users_set) > 0) {
         //$users_result = mysql_fetch_array($users_set);
         
         echo "<table class=\"list-table\">";
         echo "<tr><th>Username</th><th>User Role</th><th class=\"action\">Action</th></tr>";
         while($user = mysql_fetch_array($users_set)) {
            echo "<tr><td>{$user['username']} </td><td> {$user['role']}</td>
            <td class=\"action\"><a href=\"edit_user.php?uid={$user['id']}\">Edit</a> | <a href=\"delete_user.php?member_id={$user['id']}\">Delete</a></td></tr>";    
         }
         
         echo "</table>";
     }
     
     
 }
 /* -------------- UTILITIES ---------------- */
 /** Display Admin
  
 */
 
 function display_admin() {
    global $sel_subj;
    global $sel_page;
     
    // Display admin
    echo "<div class=\"admin\">";
    echo "<h3>Admin</h3>";
    echo "<ul class=\"admin_list\">";
    
    // Subject Related
    echo "<li class=\"add_16\"><a href=\"add_subject.php \">Add Subject</a></li>"; // Add Subject
    
    if(isset($sel_subj) && ($sel_subj > 0)) {
        echo "<li class=\"edit_16\"><a href=\"edit_subject.php?sid={$sel_subj} \">Edit Subject</a></li>"; // Edit Subject
        echo "<li class=\"delete_16\"><a href=\"delete_subject.php?sid={$sel_subj} \">Delete Subject</a></li>"; // Delete Subject                                                                                               
    }
    
    echo "</ul>";
   
    // Page related
    echo "<ul class=\"admin_list\">";
    
    if(isset($sel_subj) && ($sel_subj > 0)) {
        echo "<li class=\"add_16\"><a href=\"add_page.php?sid={$sel_subj} \">Add Page</a></li>"; // Add Page
    }
    
    
    if(isset($sel_page) && ($sel_page > 0)) {
        
        echo "<li class=\"edit_16\"><a href=\"edit_page.php?sid={$sel_subj}&pid={$sel_page }\">Edit Page</a></li>"; // Edit Page 
        echo "<li class=\"delete_16\"><a href=\"delete_page.php?sid={$sel_subj}&pid={$sel_page }\">Delete Page</a></li>"; // Delete Page                                            
    }   
                                                                   
    echo "</ul>";
    
    // User related
    echo "<ul class=\"admin_list\">";
    //echo "<li><a href=\"\">List Users</a></li>";
    echo "<li class=\"add_16\"><a href=\"add_user.php\">Add User</a></li>";
    echo "<li class=\"edit_16\"><a href=\"manage_users.php\">Manage Users</a></li>";
    echo "</ul>"; 
           
    echo "</div>";                                  
}
/**
 * Adjust positions that follows on insert of a new record
 *  @param integer $pos - position number
 */
 
function insert_position($pos, $tableName, $filter="") {
    global $conn;
    
            // Check for duplicate
           /* $queryPosition = "SELECT position FROM {$tableName} WHERE position = {$pos}";
            
            if(!empty($filter)) {
                $queryPosition .= "AND {$filter}";    
            }            
            
            $resultPosition = mysql_query($queryPosition, $conn);
            */
            //if (mysql_num_rows($queryPosition) > 0) {
                $query = "UPDATE {$tableName} SET position = (position + 1) WHERE position >= {$pos} ";
                
                if(!empty($filter)) {
                    $query .= " AND {$filter}";    
                }                
                $result = mysql_query($query, $conn) or die("Error: position insert - " . mysql_error()); 
           
            //}    else {
               
           // }     
 
}
/**
 *  Adjust positions between old and new selected position
 *  @param integer $pos - new position
 *  @param integer $currentPos - old position
 *  @param string $tableName - table name
 */
function update_position($pos, $currentPos, $tableName, $filter="") {
    global $conn;
    
    // Check for duplicate
    /*$queryPosition = "SELECT position FROM {$tableName} WHERE position = {$pos} ";
    $queryPosition .= "WHERE {$filter}";
    
    if(!empty($filter)) {
        $queryPosition .= "AND {$filter}";    
    }*/
    
    //$resultPosition = mysql_query($queryPosition, $conn);
    
    //if (mysql_num_rows($resultPosition) > 0) {
        //$query = "UPDATE subjects SET position = (position + 1) WHERE position >= {$pos};";
/*        $query = "UPDATE {$tableName} SET position = CASE ";
        $query .= "WHEN (position > {$currentPos}) AND (position <= {$pos}) THEN position - 1 "; // move selected item down, shift other items up
        $query .= "WHEN (position < {$currentPos}) AND (position >= {$pos}) THEN position + 1 "; // move selected item up, shift other items down
        $query .= "ELSE position END ";
           
        if(!empty($filter)) {
            $query .= " WHERE {$filter}";   
            
            //die("filter applied on update...<br />" );
        }   
              
        $result = mysql_query($query, $conn) or die("Error: position update - " . mysql_error() . "<p>{$query}</p>"); 
 */  
   // }   
   
   
   // Shift list items up to rmeove old item
   remove_position($currentPos, 'pages', $filter);
   
   // Shift list items down for new position
   insert_position($pos, 'pages', $filter);  

}

/**
 *  Adjust  positions that follows on delete of an existing record
 * @param integer $pos - position number
 */
 
function remove_position($pos, $tableName, $filter="") {
    global $conn;
    
    $query = "UPDATE {$tableName} SET position = (position - 1) WHERE position >= {$pos} ";
    
        if(!empty($filter)) {
            $query .= "AND {$filter}";    
        }
    $result = mysql_query($query, $conn) or die("Error: position delete - " . mysql_error() . "<p>{$query}</p>");
     
        
}
 
 
 
 
 /**
  *  Get ID of recent record insert
  * @return integer
  */
  
  function get_insert_id() {
      global $conn;
      
      return  mysql_insert_id();
  }
  
  /**
 * Sanitize database input
 * @param string $text Input string from the form
 * @param array $allowed_tags (optional)
 * @return string
 */
 function escape_string($text, $allowed_tags= array()) {
     //$converted_text = addslashes($test);
     //$converted_text = strip_tags($converted_text);
     
    // Strip HTML tags
    $text = strip_tags(trim($text), $allowed_tags);
    
    // Escape quotes 
    if(get_magic_quotes_gpc()) { // Mage quotes on
        
        return $text;
    } else {
        
        if ( function_exists("addslashes") ) {
            return addslashes($text);
        } else {
            return mysql_real_escape_string($text);
       }
        
    }
    
     
 }
 
 function mysql_prep($value) {
     $magic_quotes_active = get_magic_quotes_gpc();
     $new_enough_php = function_exists("mysql_real_escape_string"); // ie PHP >= 4.3.0
     
     if($new_enough_php) {
         if($magic_quotes_active) { $value = stripslashes($value);}
         $value = mysql_real_escape_string($value);
     } else {
         // if no magic quotes, add slashes manually
         if (!magic_quotes_active) { $value = addslashes($value);}
         
         //if magic quotes are active, then the slsashes already exists
     }
     
     return $value;
 }
 
 
 
/**
 * Sanitize database output
 * @param $text Input string from the database
 * @return string 
 */
 function sanitizeSQL($text) {
     $converted_text = stripslashes($text);
     $converted_text = htmlentities($converted_text);
     return $converted_text;
 }
 

/**
 * Sanitize GET and POST fields before displaying it on screen
 * @param string $text Input string from the database
 * @return string 
 */
function sanitize($text) {
    return htmlspecialchars(trim($text));
}

/**
 * Check GET or POST variable
 * @param string $querystring
 * @return boolean 
 */
    function checkQueryString($querystring) {
        if ( isset($querystring) || ( ! empty($querystring) && is_string($querystring) ) )  {
            return true;
        } else {
            return false;
        }
        
        
    }
    
 /**
  * Redirect page to new location
  * @param string $location
  */
  function redirect_to($location) {
     if (isset($location) && !empty($location)) {
         header ("location: " . $location);
         exit;
     }
  }
  
  
 ?>






