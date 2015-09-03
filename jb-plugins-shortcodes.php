<?php
//rework this example to get the relivant html json code from the DB and output it correctly for each recipe post.

// [bartag foo="foo-value"]
function recipetag_func( $atts ) {
    $a = shortcode_atts( array(
        'foo' => 'json string from DB',
        'bar' => 'something else',
    ), $atts );

    return "{$a['foo']}";
}
add_shortcode( 'recipetag', 'recipetag_func' );
?>
