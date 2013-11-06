<?php

/**
* Process, maintain and display
* files (including images)
**/

class images_controller extends base_controller {

   public function _construct() {
      parent::_construct;

      # Make sure user is logged in if they want to use anything in this controller
      if (!$this->user) {
         Router::redirect('/users/login');
      }
   }

   public function p_add_photo($profile_id = null) {

      # see if file sleected
      if ( !isset($_FILES['imageFile']['type']) ) {

         die('No file selected');

      }

      // Check if correct file uploaded
      if ( !preg_match( '/gif|png|x-png|jpeg/', $_FILES['imageFile']['type']) ) {

         die('Only the following types are allowed: gif, png, x-png, jpeg');

      } else if ( $_FILES['imageFile']['size'] > 15000 ){

         die('File too large');

      } else if ( !($handle = fopen ($_FILES['imageFile']['tmp_name'], "r")) ) {

         die('temporary file could not be opened');

      } else if ( !($image = fread ($handle, filesize($_FILES['imageFile']['tmp_name']))) ) {
      
         die('temporary file could not be read');

      } else {

      fclose ($handle);

         $q['image'] = mysql_real_escape_string($image);
         $q['profile_id'] = $profile_id;

         $profile_id = DB::instance(DB_NAME)->insert("profile_images", $q);

      }
   }

   public function render($profile_id = null) {

      $q = 'SELECT image
            FROM profile_images
            WHERE profile_id = '.$profile_id;

      $image = DB::instance(DB_NAME)->select_field($q);

      # render image ... #
   }
}
?>