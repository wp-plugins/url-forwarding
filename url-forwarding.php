<?php
/*
Plugin Name: Legacy URL Forwarding
Plugin URI: http://code.olib.co.uk/2011/04/25/wordpress-plugin-forwarding-redirecting-campaign-legacy-urls/
Description: Allows you to have old URLs redirected the correct post/page of Wordpress
Version: 1.1
Author: OllyBenson
Author URI: http://code.olib.co.uk
License: GPL2
    Copyright 2011  Olly Benson  (email : ollybenson@googlemail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
/*
To function call this function: doUrlForwarding(); at the first line of code on the 404.php page.
*/
function doUrlForwarding() {
  $filename = strtolower(str_replace(get_home_url()."/","","http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']));
  $query = new WP_Query( array('meta_key' => 'legacy-url', 'meta_value'=>$filename));
 if (!empty($query->post->ID)) $id = $query->post->ID;
    else {
      $query2 = new WP_Query( array('meta_key' => 'legacy-url', 'meta_value'=>$filename, 'post_type'=>'page'));
      if (!empty($query2->post->ID)) $id = $query2->post->ID;  
      } 
if (isset($id)) {
    header('Location:'.get_permalink($id));
    exit;
    }
}
?>