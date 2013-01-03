<?php
/*
Plugin Name: wp-markdown-syntax-sugar
Plugin URI: https://github.com/visoft/wp-markdown-syntax-sugar
Description: This WordPress plugin works to enhance the handling of code blocks in markdown syntax.
Version: 0.1.1
Author: Damien White (Visoft, Inc.)
Author URI: http://www.visoftinc.com
License: GPLv2 or later
*/

/*
  Copyright 2012-2013 Visoft, Inc. <info@visoftinc.com>

  This file is part of wp-markdown-syntax-sugar

    WP Markdown Syntax Sugar is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    Collapsing Archives is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with Collapsing Archives; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// Install filter to run after markdown (priority 6)
add_filter('the_content',       'wmss_process_markdown', 7);
add_filter('the_content_rss',   'wmss_process_markdown', 7);
add_filter('get_the_excerpt',   'wmss_process_markdown', 7);

function wmss_process_markdown( $text ) {
    return preg_replace( '|<pre><code>#!([^\n]+)\n(.*?)</code></pre>|se', 'wmss_process_language(\'$2\',\'$1\');', $text);
}

function wmss_process_language( $code, $language) {
    if(strcasecmp($language, 'xml') == 0) {
        $code = stripslashes( trim( str_replace(array('&amp;', '&#039;', '&quot;'), array('&','\'','"'), $code) ) );
    } else {
        $code = stripslashes( trim( htmlspecialchars_decode( $code, ENT_NOQUOTES ) ) );
    }
    return '<pre><code class="language-'. $language . '">' . $code . '</code></pre>';
}