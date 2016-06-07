jQuery(document).ready(function(){
    jQuery('#j-panier-type').change(function(){
        var value = jQuery(this).val();
        window.location.href = '?page=admin_commandes&type=' + value;
    });
    
});