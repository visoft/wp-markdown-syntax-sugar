WP Markdown Syntax Sugar works in conjunction with plugins such as [wp-markdown](http://wordpress.org/extend/plugins/wp-markdown/)
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
