<?php
/*
Plugin Name: wp-markdown-syntax-sugar
Plugin URI: http://www.visoftinc.com
Description: This WordPress plugin works to enhance the handling of code blocks in markdown syntax.
Version: 0.1.0
Author: Damien White (Visoft, Inc.)
Author URI: http://www.visoftinc.com
License: GPLv2 or later
*/

/*
  Copyright 2012 Visoft, Inc. <info@visoftinc.com>

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
add_filter('the_content',       'process_markdown', 7);
add_filter('the_content_rss',   'process_markdown', 7);
add_filter('get_the_excerpt',   'process_markdown', 7);

function process_markdown( $text ) {
    return preg_replace( '|<pre><code>#!([^\\n]+)\n(.*?)</code></pre>|se', 'process_language(\'$2\',\'$1\');', $text);
}

function process_language( $code, $language) {
    $code = stripslashes( trim( htmlspecialchars_decode( $code, ENT_NOQUOTES ) ) );
    return '<pre><code class="'. $language . '">' . $code . '</code></pre>';
}