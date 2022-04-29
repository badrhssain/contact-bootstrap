<?php 
/**
 * @package Hello_World
 * @version 1.4.3
 */
/*
Plugin Name: Contact page
Plugin URI: http://wordpress.org/plugins/Formlairedecontact/
Description: nicepage .
Author: badrhssain
Version: 1.4.3
Author URI: http://badrhssain/
*/

function my_setup_page(){
    add_menu_page( 'Setup Form', 'Contact menu', 'manage_options', 'test-plugin','wp_setup');
}
add_action('admin_menu', 'my_setup_page');


function wp_setup(){
    $fname_check = "";
    $lname_check = "";
    $email_check = "";
    $message_check = "";
    if(get_option('fname')){
        $fname_check = "checked";
    }
    if(get_option('lname')){
        $lname_check = "checked";
    }
    if(get_option('email')){
        $email_check = "checked";
    }
    if(get_option('message')){
        $message_check = "checked";
    }
    echo '<form method="POST" action="">
                <div style="display:flex; flex-direction: column; align-items: flex-start">
                    <Label><input type="checkbox" name="fname" '. $fname_check .'>First Name</Label>
                    <Label><input type="checkbox" name="lname" '. $lname_check .'>Last Name</Label>
                    <Label><input type="checkbox" name="email" '. $email_check .'>Email</Label>
                    <Label><input type="checkbox" name="message" '. $message_check .'>Message</Label>
                    <input type="submit" name="submit_btn">
                </div>
        </form>';
}

if(isset($_POST["submit_btn"])){
    $list["fname"] = 0;
    $list["lname"] = 0;
    $list["email"] = 0;
    $list["message"] = 0;
    if(isset($_POST["fname"])){
        $list["fname"] = 1;
        
    }
    if(isset($_POST["lname"])){
        $list["lname"] = 1;
        
    }
    if(isset($_POST["email"])){
        $list["email"] = 1;
        
    }
    if(isset($_POST["message"])){
        $list["message"] = 1;

    }

    update_option('fname', $list["fname"]);
    update_option('lname', $list["lname"]);
    update_option('email', $list["email"]);
    update_option('message', $list["message"]);
    
    
}

// Form
function add_form(){
    $form_added = false;
    if(get_option("fname")){
        echo '<label>First Name<input type="text"></label>';
        $form_added = true;
    }
    if(get_option("lname")){
        echo '<label>Last Name<input type="text"></label>';
        $form_added = true;
    }
    if(get_option("email")){
        echo '<label>Email<input type="text"></label>';
        $form_added = true;
    }
    if(get_option("message")){
        echo '<label>Message:<textarea name="message" cols="30" rows="10"></textarea></label>';
        $form_added = true;
    }
    if($form_added){
        echo '<input type="submit" value="Submit">';
    }
}
add_shortcode('input','add_form');

?>