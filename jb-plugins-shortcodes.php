<?php
//rework this example to get the relivant html json code from the DB and output it correctly for each recipe post.

// [bartag foo="foo-value"]
function bartag_func( $atts ) {
    $a = shortcode_atts( array(
        'foo' => 'something',
        'bar' => 'something else',
    ), $atts );

    return "foo = {$a['bar']}";
}
add_shortcode( 'bartag', 'bartag_func' );
?>
