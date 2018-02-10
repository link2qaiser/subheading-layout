<?php
   /*
   Plugin Name: Post Sub Heading Design
   Plugin URI: http://dixeam.com
   Description: Simple wordpress plugin that logs all actions on post (add, update, delete, edit) in separate table:
   Version: .1
   Author: Dixeam Developer- Qaiser
   Author URI: http://dixeam.com
   License: GPL2
   */
if (is_admin() ) {
   
}
if (!is_admin() ) {
   function apply_css(){
      $css = '<style type="text/css">div.counter{float:left;background-color:#3949ab;color:#fff;font-size:25px;min-width:48px;text-align:center;padding:20px 0}h3{font-weight:400;font-size:20px;padding:20px 0 20px 12px;margin:0}.art_subhead{border:1px solid #ccc;border-right:0;display:flex}.subdix{margin-top: 0px !important;margin-bottom: 0px !important;}</style>';
      echo $css;
   }
   function apply_design($content){
      //$string  = '<h3>10 “Maglia Francesco” Blackwatch Sports Seat Umbrella – Price: $450</h3>';
      $pattern = '/<h3>(([0-9]+)|([0-9]+\s.)|([0-9]+.))/';
      $content = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $content);

      $content = preg_replace($pattern, '<div class="counter">${1}</div><h3 class="subdix">', $content);
      $content = str_replace('<div class="counter">', '<div class="art_subhead"><div class="counter">', $content);
      $content = str_replace('</h3>', '</h3></div>', $content);
      return $content;
      
   }
   add_action('wp_head', 'apply_css');
   add_filter('the_content','apply_design');
}
add_menu_page( "some_menu", "some_menu", "manage_options", "some_menu","?page=sub_heading_design");
