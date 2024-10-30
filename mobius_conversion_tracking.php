<?php
/*
Plugin Name: Mobius Conversion Tracker
Plugin URI: http://www.mobiusmedia.co.uk
Description: Used to implement the Google PPC conversion tracking code into Pages - Usage: [conversion_track id="123" language="en" format="123" color="ffffff" label="123ABC" value="123" remarket="FALSE"]
Version: 1.0.2
Author: Mobius Media
Author URI: http://www.mobiusmedia.co.uk
License: GPL2

Copyright 2013 – 2016  Mobius Media / Josh Reading  (email : hello@mobiusmedia.co.uk)

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

/*-----------------------------------------------------------------------------------*/
/* Conversion Tracking - Mobius Media Ltd - http://www.mobiusmedia.co.uk
/*-----------------------------------------------------------------------------------*/
function conversion_tracking_html($id, $language, $format, $color, $label, $value, $remarket)
{
    echo '
        <script type="text/javascript">
        /* <![CDATA[ */
        var google_conversion_id = '.$id.';
        var google_conversion_language = "'.$language.'";
        var google_conversion_format = "'.$format.'";
        var google_conversion_color = "'.$color.'";
        var google_conversion_label = "'.$label.'";
        var google_conversion_value = '.$value.';
        var google_remarketing_only = '.$remarket.';
        /* ]]> */
        </script>
        <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
        </script>
        <noscript>
        <div style="display:inline;">
        <img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/979694979/?value=10.95&amp;label=0PzcCKWAvggQg-uT0wM&amp;guid=ON&amp;script=0"/>
        </div>
        </noscript>';
}
function conversion_tracking_code($atts, $content = null) 
{
	extract(shortcode_atts(array(  
        "id" => '0',
        "language" => 'en',
        "format" => '3',
        "color" => '666666',
        "label" => '0',
        "value" => '0',
        "remarket" => 'false',
    ), $atts)); 

    echo conversion_tracking_html($id, $language, $format, $color, $label, $value, $remarket);
}

add_shortcode( 'conversion_track', 'conversion_tracking_code' );

?>
