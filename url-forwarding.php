<?php
/*
Plugin Name: Legacy URL Forwarding
Plugin URI: http://code.olib.co.uk/redirect
Description: Allows you to have old URLs redirected the correct post/page of Wordpress
Version: 1.3
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
	$filename = substr(sprintf("http://%s%s",$_SERVER['HTTP_HOST'],$_SERVER['REQUEST_URI']),(strlen(get_home_url()."/"))); // remove the ."/" after get_home_url if your legacy_urls start with /
	$query = new WP_Query(array('post_type'=>'any','meta_query' => array(array('key' => 'legacy-url','value' =>$filename))));
	if (!empty($query->post->ID)) wp_redirect(get_permalink($query->post->ID),'301'); // Change 301 if you wante a different redirect type;
	}

add_action('404_template','doUrlForwarding');

?>