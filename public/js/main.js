jQuery(document).ready(function(){
    
    jQuery('#js-panier-status').change(function(){
        var value = jQuery(this).val();
        window.location.href = '?page=admin_commandes&status=' + value;
    });
    
});