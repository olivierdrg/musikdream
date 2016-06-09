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
        $nb = intval($nb);
        if($nb < 1 || $nb > 5){
            $nb = 0;
        }
        return str_repeat(STAR, $nb );
    }

    function sql_2_date( $sql ){
        return date( 'd/m/Y', strtotime( $sql ) );
    }

    function date_2_sql( $date ){
        $date = str_replace( '/', '-', $date );
        return date( 'Y-m-d', strtotime( $date ) );
    }

    function is_date_valide( $date ) {
        $age = time() - strtotime( date_2_sql( $date ) );

        if ( $age < 0 ) return false;
            else return true;
    }
?>    