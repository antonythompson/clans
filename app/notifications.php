<?php

namespace App;

class Notifications extends Controller {

  function get( $f3 ) {

    
    if( $this->_checkPerm( $f3 ) === FALSE) {
      return;
    }
      
    
    
    // set so nav menu shows correct selected item
    $f3->set( 'selected_page', 'notifications' );

    // page content
    $f3->set('main_content_template', '_notifications.htm');  
  }
  
  
  # TODO: make global
  private function _checkPerm( $f3 ) {
    // check user is logged in 
    if( !$f3->get( 'logged_in_username' ) ) {
      $this->setup_template_access_error( $f3, 'You must be logged in to access this page' );
      return false;
    }
    return true;
  } 
  
  # TODO: make dynamic
    private function setup_template_access_error( $f3, $msg ) {
  
    $f3->set( 'my_clan_error_message', $msg );

     // set to nav menu shows correct selected item
    $f3->set( 'selected_page', 'create_clan' );

    // page content
    $f3->set('main_content_template', '_my_clan_access_error.htm'); 
    
  }
}