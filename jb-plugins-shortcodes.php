<?php
//rework this example to get the relivant html json code from the DB and output it correctly for each recipe post.

// [bartag foo="foo-value"]    [recipetag theme="default" json="null"]
function recipetag_func( $atts ) {
    extract(shortcode_atts( array('theme' => 'default','json' => 'default'), $atts ));
    return "<div>theme:".$theme." / json:".$json."</div>";
}
add_shortcode( 'recipetag', 'recipetag_func' );
?>
