<?php    
    function checked( $checked, $current ) {
        if ( $checked == $current ) return 'checked';
            else return '';
    }

    function selected( $checked, $current ) {
        if ( $checked == $current ) return 'selected';
            else return '';
    }

    // fontawesome fa-star 
    function display_star( $nb = 0 ) {
        return str_repeat(STAR, $nb );
    }

?>    