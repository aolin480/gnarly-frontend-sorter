Gnarly Frontend Sorter
======================

** Still in development ** - Gives user the ability to order pages on the front end of wordpress.

There are some backend plugins that do this, but I recently had a project that had about 30 parent pages, and those had sub-pages, and the sub-pages had sub-pages. We needed to find an alternative solution on the frontend because the majority of the plugins were drag and drop on the admin screen. This fixed this problem.

Before you start
======================

This is the code I used to list the child pages on a parent page. I changed the <strong>sort_column</strong> to <strong>menu_order</strong> instead of the default post_title, and the <strong>sort_order</strong> is asc.

```PHP
		global $post;

		$args = array(			
			'hierarchical' 	=> 0,						
			'child_of' 		=> 0,
			'parent' 		=> $post->ID,			
			'number' 		=> '',
			'sort_order'	=>	'asc',
			'sort_column'	=>	'menu_order'
		);
		
		$child_pages = get_pages( $args );	
```

With the Child pages, I then created a custom loop (an example will be included later on in a separate file. I made 2 functions to spit out the pages of the parent page). From there I can add the gnarly tags to the parent container and the child items.

Installation
======================

When you install the plugin, just find the template that controls your pages loop and make the following modifications. This example uses Twenty-Fourteen as an example.

```
	<!-- Wordpress Twenty-Fourteen Theme Example -->

	<div role="main" class="site-content" id="content" data-gnarly-sort='true'>

	    <article data-gnarly-id="58" class="page-58 page" id="page-58">
	        <div class="entry-content">
	        	<h2>Your Page Title</h2>
	        </div>
	        <!-- .entry-content -->
	    </article>
	    <!-- #page-## -->    

	    <article data-gnarly-id="57" class="page-57 page" id="page-57">
	        <div class="entry-content">
	        	<h2>Your Page Title</h2>
	        </div>
	        <!-- .entry-content -->
	    </article>
	    <!-- #page-## -->    
	    
	    <article data-gnarly-id="56" class="page-56 page" id="page-56">
	        <div class="entry-content">
	        	<h2>Your Page Title</h2>
	        </div>
	        <!-- .entry-content -->
	    </article>
	    <!-- #page-## -->    

	    <article data-gnarly-id="55" class="page-55 page" id="page-55">
	        <div class="entry-content">
	        	<h2>Your Page Title</h2>
	        </div>
	        <!-- .entry-content -->
	    </article>
	    <!-- #page-## -->    

	</div>
```

Explanation
======================
Notice the following code:
```

	<div role="main" class="site-content" id="content" data-gnarly-sort="true">

```

The <strong>data-gnarly-sort='true'</strong> attribute tag. This tells the plug-in that it is the parent element of the sorter.

On each of the pages that get spit out, you must include the <strong>data-gnarly-id="58"</strong> in order to tell the sorter that it is a page item that will be drag and drop sorted using the page ID. This attribute is important because it tells wordpress what position it's in when you drag and drop each element by using the page ID. You can echo out the page ID by using the following PHP pre in the loop.

```PHP
	<article data-gnarly-id="<?php the_ID(); ?>" class="page-58 page" id="page-58">	
```
