# wordpress-theme-and-plugin-development
This is my final project for the course WordPress for developers in Softuni

It contains a custom WordPress theme and plugin. For the theme I'm using free html template designed by TemplateMo.
There are separate templates for Home, Blog, Contact, Related Posts and Related Games pages.
There are also different templates for Blogs Archive, Games Archive, Blog single view, and Games single view using the native WP_Query() for looping (The_Loop()) to loop trough the archives.
The theme has separate files for header and footer, where in the header it has dynamic title and the necessary scripts and styles are enqueued in the header and the footer. 
The Homepage is dynamically pulling out the latest 8 posts and the latest 6 games dynamically using wp query. The hero section titles can be changed dynamically from the theme options using custom options. The body titles can be also changed dynamically from the page options using ACF. 
The theme has a registered menu and sidebar in the footer for the copyright. It also has a hook in the functions.php which changes the archive games title to Games.
The custom theme options also provide an option to import all the necessary pages and set their templates using Ajax.
The theme also has a child theme.

The plugin registers a custom post type Games using native wordpress functions.
Games custom post type have one attached custom taxonomy called: Genre.
The Games CPT has option to change the game prices in the single view via metabox which works with the post meta using native WP functions. It also has e description metabox registered with ACF which sets dynamically the additional information about the game.
The plugin has a custom option to change the text inside the fallback SVG for the  posts/games that do not have featured image yet.
The games archive has a load more functionality instead of pagination using Ajax.
The plugin registers a shortcode which accepts 3 attributes for day / month / year and displays a gif of a hourglass followed by text: "Sale ends on: {the date from attributes}"


@To do:
Think of appropriate function in the child theme functions.php
Figure out how to set category featured images and dynamically loop the categories on the homepage
Dynamize the subscribe section on the homepage and the entire contact page
Deploy the project on a server




<h1>Individual Project Assignment</h1>
This is the Individual Project Assignment for the <strong>Web project based on WordPress - November 2023 @SoftUni</strong>.

These requirements and evaluations are<strong> only for the practical exam</strong> (the theoretical exam is not included in this assignment)
<h2>1.   Web project for a WordPress website with a custom theme and custom plugin/plugins</h2>
<h3>General requirements</h3>
Your project <strong>must</strong> have all this functionality to pass the final examination.
<ul>
 	<li>The project must be implemented using the <strong>WordPress platform</strong></li>
 	<li>The project must have one <strong>custom theme</strong>, <em>built from scratch</em>, using a free HTML/CSS/JS template of your choice. As a rule of thumb, you should use a GPL-licence template <strong>(up to 42 points)</strong>
<ul>
 	<li>The theme must be using the native WP_Query() for looping (The_Loop()) different items in the corresponding templates - <strong>6 points</strong></li>
 	<li>The theme must have at least one file for the header part, including the dynamic &lt;title&gt; field, providing the option to enqueue scripts and styles and dynamically populate the HTML attributes - <strong>3 points</strong></li>
 	<li>The theme must have at least one file for the footer part, providing the option to enqueue scripts and styles - <strong>2 points</strong></li>
 	<li>The theme must have a page template for the homepage with most of the dynamic of the section (pulling information from blog posts, pages, custom post types, options pages, etc) - <strong>7 points</strong></li>
 	<li>The theme must have a template for the single view for blog posts - <strong>3 points</strong></li>
 	<li>The theme must have a template for the single view of one of the Custom Post Types - <strong>3 points</strong></li>
 	<li>The theme must have at least one custom page template for listing all posts from the custom post type - <strong>3 points</strong></li>
 	<li>The theme must have all styles and scripts enqueued, using the proper native WP functions - <strong>3 points</strong>
<ul>
 	<li>Exception for 3rd party (external) scripts and styles are allowed</li>
</ul>
</li>
 	<li>The theme must have a dedicated archive template for the date archive of blog posts - <strong>3 points</strong></li>
 	<li>The theme must have a dedicated archive template for the author's archive of blog posts - <strong>3 points</strong></li>
 	<li>The theme must have registered at least one WordPress menu - <strong>3 points</strong></li>
 	<li>The theme must have at least one sidebar area registered and display a few widgets there - <strong>3 points</strong></li>
</ul>
</li>
 	<li>The project must have at least one <strong>custom WordPress plugin</strong>, <em>built from scratch</em> <strong>(up to 42 points)</strong>
<ul>
 	<li>The plugin must have at least one registered Custom Post Type - <strong>2 points</strong></li>
 	<li>The plugin must have at least one register custom taxonomy, attached to the custom post type from above - <strong>2 points</strong></li>
 	<li>The plugin must have at least one metabox build using native WP functions (not with ACF or any other plugin). The metabox must have a custom option that works with the post-meta - <strong>5 points</strong></li>
 	<li>The plugin must have at least one metabox/dashboard field registered with ACF (or a similar plugin) that works with the post-meta - <strong>3 points</strong></li>
 	<li>The plugin must have an Options Page and have at least one custom option (it might be showing/hiding an element, allowing or disabling a functionality, etc) - <strong>6 points</strong></li>
 	<li>The plugin must implement an AJAX functionality for a dynamic section of the project. This can be a filter, sorting, or a click event that tracks user activity. - <strong>10 points</strong></li>
 	<li>The plugin must have functionality separated into different well-described functions, instead of combining everything in a function or two - <strong>6 points</strong></li>
 	<li>The plugin must register a shortcode, accept attributes and display information from the custom post type - <strong>3 points</strong></li>
 	<li>The plugin must have at least one filter manipulating a native WordPress element - the title, the content, or anything else of the blog posts or custom post type. Up to the student to decide which one - <strong>5 points</strong></li>
</ul>
</li>
 	<li>The project must be using a popper <strong>debug</strong> methodology enabled. This means no PHP warnings or errors coming from the custom code. The user input/output should be validated, and sanitized, using native WordPress and PHP functions <strong>(up to 5 points)</strong>
<ul>
 	<li>Even if wp-config.php will be part of the .gitignore file, no warnings or errors will be accepted</li>
</ul>
</li>
 	<li>The project must be following the <a href="https://developer.wordpress.org/coding-standards/wordpress-coding-standards/">WordPress Coding Standards</a> - <strong>(up to 4 points)</strong></li>
 	<li><a href="https://github.com/metodiew/softuni-jobs/blob/master/.gitignore">.gitignore file</a> is <strong>mandatory</strong> to exclude all sensitive data, database credentials, caches, WordPress Core files and etc<strong>. (up to 2 points)</strong></li>
 	<li>The project must have a README.md file with a short description of the project and notable functionality and items <strong>(up to 3 points)</strong></li>
 	<li>The project must have at least a few commits in the Git repository, preferably separating the functionality in phases <strong>(up to 2 points)</strong></li>
</ul>
<h3>Bonuses</h3>
<ul>
 	<li>The project can be uploaded to a source control system – GitHub is preferred with a public repository</li>
 	<li>The project can be uploaded to a server for the demo</li>
 	<li>Having a Sass setup for the styles would be considered a bonus</li>
 	<li>Having at least one Class, following the OOP structure in the plugin would be considered a bonus</li>
 	<li>Creating a child theme of the custom theme, and modifying a functionality/template would be considered a bonus</li>
</ul>
<strong>Bonuses – up to 15%</strong>
