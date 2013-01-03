=== WP-Markdown-Syntax-Sugar ===
Contributors: dwhitevisoft
Donate link: http://www.visoftinc.com/
Tags: markdown, highlight.js, syntax, code, pre, highlight
Requires at least: 3.1
Tested up to: 3.5
Stable tag: 0.1.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

WP Markdown Syntax Sugar is a simple plugin that works in conjunction with Markdown code blocks and highlight.js to
properly format code.

== Description ==

WP Markdown Syntax Sugar work in conjunction with plugins such as [wp-markdown](http://wordpress.org/extend/plugins/wp-markdown/)
and [wp-highlight.js](http://wordpress.org/extend/plugins/wp-highlightjs/). Markdown is fantastic markup for easily
writing blogs, and [highlight.js](http://softwaremaniacs.org/soft/highlight/en/) is an extremely easy way to highlight
code examples. In most cases, highlight.js automatically detects the proper language for a block of code. In certain
cases, primarily if your code example is short, highlight.js could improperly detect the language that you are using;
that is where this plugin comes into play. By adding one line to your code blocks, you can explicitly set the language
that you are using, allowing highlight.js to properly format your code.

The concept is inspired by the [wp-markdown-syntax-highlight](https://github.com/spjwebster/wp-markdown-syntax-highlight)
plugin.

The usage is extremely simple. Just add a shebang as the first line of your code example with the language you are using.

    #!ruby
    class Foo < Bar
      def hello
        puts "Hello World!"
      end
    end

The shebang is removed, and the code is outputted as:

    <pre><code class="language-ruby">class Foo < Bar
      def hello
        puts "Hello World!"
      end
    end</code></pre>

Now the code block is properly formatted for highlight.js to do its magic, and the code snippet will be properly
highlighted.

== Installation ==

Installation is standard and straight forward.

1. Upload the `wp-markdown-syntax-sugar` folder (and all it's contents) to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Modify improperly formatted code blocks with a shebang.

== Changelog ==

= 0.1.0 =
* Initial release
= 0.1.1 =
* Modified output to use the HTML5 recommended syntax highlighting class names, e.g. `language-ruby`. For more information, see [the HTML5 spec](http://www.w3.org/html/wg/drafts/html/master/text-level-semantics.html#the-code-element)
