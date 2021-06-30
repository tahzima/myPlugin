<?php
/**
 * Plugin Name: ContactUS
* Description: this is a contactUS plugin that sends the users messages to your mail and save them in the database
*/

//creation de la table contact en paraléle avec l'activation de plugin
function create_table(){

    $connection = mysqli_connect('localhost','root','');
    mysqli_select_db($connection,"wordpress2");
  
    $sql = "CREATE TABLE ContactUs(id int NOT NULL PRIMARY KEY AUTO_INCREMENT, fullname varchar(255) NOT NULL, email varchar(55) NOT NULL,subjecte varchar(55) NOT NULL, content varchar(255) NOT NULL)";
    $result = mysqli_query($connection, $sql);
    return $result;
  
  }
  register_activation_hook(__FILE__,'create_table');

//supprission de la table contact en paraléle avec l'activation de plugin

function Drop_table(){

    $connection = mysqli_connect('localhost','root','');
    mysqli_select_db($connection,"wordpress2");
  
    $sql = "DROP TABLE `contactus`";
    $result = mysqli_query($connection, $sql);
    return $result;
  
  }

  register_uninstall_hook( __FILE__,'Drop_table');



function Plugin_Form_ContactUs(){
  include_once('form.php');
}

add_shortcode('Form_ContactUs','Plugin_Form_ContactUs');


function admin_dashbord(){
    add_menu_page('forms','Contact','manage_options','contact-dashbord','dashbord_admin_contact','dashicons-email',4);
}
add_action('admin_menu','admin_dashbord');
function dashbord_admin_contact(){
    require_once('dashbord.php');
}