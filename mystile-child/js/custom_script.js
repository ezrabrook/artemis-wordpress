jQuery( document ).ready( function( $ ) {
    $( '#container' ).masonry( { 
		itemSelector: '.brick',
	} );
	 $( '#contains_also' ).masonry( { 
		itemSelector: '.brick',
	} );
	 $( '.related.products' ).masonry( { 
		itemSelector: '.brick',
	} );
	 $( '.gridlist-toggle ul.products' ).masonry( { 
		itemSelector: '.brick',
	} );
	$( '.grid' ).masonry( { 
		itemSelector: '.brick',
	} );
	
	$('body :not(script)').contents().filter(function() {
    return this.nodeType === 3;
	}).replaceWith(function() {
    return this.nodeValue.replace(/[�]/g, '<sup>&trade;</sup>');
	});

		
	
	
} );