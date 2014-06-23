gnarly-frontend-sorter
======================

** Still in development ** - Gives user the ability to order pages on the front end of wordpress

Installation:

When you install the plugin, just find the template that controls your pages loop and make the following modifications. This example uses Twenty-Fourteen as an example.

<code>
	<!-- Wordpress Twenty-Fourteen Theme Example -->

	<div role="main" class="site-content" id="content" data-gnarly-sort='true'>

	    <article data-gnarly-id="58" class="page-58 page type-page status-publish format-standard has-post-thumbnail hentry has-post-thumbnail" id="page-58">
	        <div class="entry-content">
	        	<h2>Your Page Title</h2>
	        </div>
	        <!-- .entry-content -->
	    </article>
	    <!-- #page-## -->    

	    <article data-gnarly-id="57" class="page-57 page type-page status-publish format-standard has-post-thumbnail hentry has-post-thumbnail" id="page-57">
	        <div class="entry-content">
	        	<h2>Your Page Title</h2>
	        </div>
	        <!-- .entry-content -->
	    </article>
	    <!-- #page-## -->    
	    
	    <article data-gnarly-id="56" class="page-56 page type-page status-publish format-standard has-post-thumbnail hentry has-post-thumbnail" id="page-56">
	        <div class="entry-content">
	        	<h2>Your Page Title</h2>
	        </div>
	        <!-- .entry-content -->
	    </article>
	    <!-- #page-## -->    

	    <article data-gnarly-id="55" class="page-55 page type-page status-publish format-standard has-post-thumbnail hentry has-post-thumbnail" id="page-55">
	        <div class="entry-content">
	        	<h2>Your Page Title</h2>
	        </div>
	        <!-- .entry-content -->
	    </article>
	    <!-- #page-## -->    

	</div>
</code>