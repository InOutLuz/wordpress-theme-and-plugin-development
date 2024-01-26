# wordpress-theme-and-plugin-development
This is my final project for the course WordPress for developers in Softuni

Web project for a WordPress site
Individual Project Assignment
This is the Individual Project Assignment for the Web project based on WordPress - November 2023 @SoftUni.
These requirements and evaluations are only for the practical exam (the theoretical exam is not included in this assignment)
1.	Web project for a WordPress website with a custom theme and custom plugin/plugins
General requirements
Your project must have all this functionality to pass the final examination.
●	The project must be implemented using the WordPress platform
●	The project must have one custom theme, built from scratch, using a free HTML/CSS/JS template of your choice. As a rule of thumb, you should use a GPL-licence template  (up to 42 points)
o	The theme must be using the native WP_Query() for looping (The_Loop()) different items in the corresponding templates - 6 points
o	The theme must have at least one file for the header part, including the dynamic <title> field, providing the option to enqueue scripts and styles and dynamically populate the HTML attributes - 3 points
o	The theme must have at least one file for the footer part, providing the option to enqueue scripts and styles - 2 points
o	The theme must have a page template for the homepage with most of the dynamic of the section (pulling information from blog posts, pages, custom post types, options pages, etc) - 7 points
o	The theme must have a template for the single view for blog posts - 3 points
o	The theme must have a template for the single view of one of the Custom Post Types - 3 points
o	The theme must have at least one custom page template for listing all posts from the custom post type - 3 points
o	The theme must have all styles and scripts enqueued, using the proper native WP functions  - 3 points
▪	Exception for 3rd party (external) scripts and styles are allowed
o	The theme must have a dedicated archive template for the date archive of blog posts - 3 points
o	The theme must have a dedicated archive template for the author's archive of blog posts - 3 points
o	The theme must have registered at least one WordPress menu - 3 points
o	The theme must have at least one sidebar area registered and display a few widgets there - 3 points
●	The project must have at least one custom WordPress plugin, built from scratch (up to 42 points)
o	The plugin must have at least one registered Custom Post Type - 2 points
o	The plugin must have at least one register custom taxonomy, attached to the custom post type from above - 2 points
o	The plugin must have at least one metabox build using native WP functions (not with ACF or any other plugin). The metabox must have a custom option that works with the post-meta - 5 points
o	The plugin must have at least one metabox/dashboard field registered with ACF (or a similar plugin) that works with the post-meta - 3 points
o	The plugin must have an Options Page and have at least one custom option (it might be showing/hiding an element, allowing or disabling a functionality, etc) - 6 points
o	The plugin must implement an AJAX functionality for a dynamic section of the project. This can be a filter, sorting, or a click event that tracks user activity.  - 10 points
o	The plugin must have functionality separated into different well-described functions, instead of combining everything in a function or two - 6 points
o	The plugin must register a shortcode, accept attributes and display information from the custom post type - 3 points
o	The plugin must have at least one filter manipulating a native WordPress element - the title, the content, or anything else of the blog posts or custom post type. Up to the student to decide which one - 5 points
●	The project must be using a popper debug methodology enabled. This means no PHP warnings or errors coming from the custom code. The user input/output should be validated, and sanitized, using native WordPress and PHP functions (up to 5 points)
o	Even if wp-config.php will be part of the .gitignore file, no warnings or errors will be accepted
●	The project must be following the WordPress Coding Standards - (up to 4 points)
●	.gitignore file is mandatory to exclude all sensitive data, database credentials, caches, WordPress Core files and etc. (up to 2 points)
●	The project must have a README.md file with a short description of the project and notable functionality and items (up to 3 points)
●	The project must have at least a few commits in the Git repository, preferably separating the functionality in phases (up to 2 points)
Bonuses
●	The project can be uploaded to a source control system – GitHub is preferred with a public repository
●	The project can be uploaded to a server for the demo
●	Having a Sass setup for the styles would be considered a bonus
●	Having at least one Class, following the OOP structure in the plugin would be considered a bonus
●	Creating a child theme of the custom theme, and modifying a functionality/template would be considered a bonus
Bonuses – up to 15%
