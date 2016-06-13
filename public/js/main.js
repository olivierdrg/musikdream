jQuery(document).ready(function(){
    
    jQuery('#js-panier-status').change(function(){
        var value = jQuery(this).val();
        window.location.href = '?page=admin_commandes&status=' + value;
    });

    jQuery('#js-search').keyup(function(e){
    	var s = jQuery(this).val();

    	if ( s.length == 0 ) {
    		jQuery('#js-result').html('');
    		return;
    	}
    
    	if ( s.length < 3 ) return;
    	console.log(s);

        jQuery.ajax({
            url: 'index.php',
            type:'GET',
            data: {
            	'ajax' : true,
            	'page' : 'recherches',
                'action' : 'recherche',
                's' : s,
            },
            success:function(data) {
                jQuery('#js-result').html(data);
            },
            error: function(errorThrown){
                console.log(errorThrown);
            }
        });

        return false;
	});
    
});