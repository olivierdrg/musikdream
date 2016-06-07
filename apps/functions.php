<?php    
    function checked( $checked, $current ) {
        if ( $checked == $current ) return 'checked';
            else return '';
    }

    function selected( $checked, $current ) {
        if ( $checked == $current ) return 'selected';
            else return '';
    }

?>    