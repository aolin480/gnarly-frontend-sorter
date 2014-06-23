gnarly-frontend-sorter
======================

** Still in development ** - Gives user the ability to order pages on the front end of wordpress

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

On each of the pages that get spit out, you must include the <strong>data-gnarly-id="58"</strong> in order to tell the sorter that it is a page item that will be drag and drop sorted. This attribute is important because it tells wordpress what position it's in when you drag and drop each element. You can echo out the page id by using the following PHP pre in the loop.

```
	<article data-gnarly-id="<?php echo get_the_ID(); ?>" class="page-58 page" id="page-58">	
```