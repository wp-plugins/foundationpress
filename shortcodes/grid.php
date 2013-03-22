<?php
//
// Columns Container
//
add_shortcode('fp_grid', 'fp_grid');
function fp_grid($atts, $content)
{
    return '<div class="foundation_press row">' . do_shortcode($content) . '</div>';
}

//
// Column Element
//
add_shortcode('fp_column', 'fp_column');
function fp_column($atts, $content)
{
    // Defining vars
    $size = '';
    // Extracting Attributes
    extract(shortcode_atts(array(
        'size' => '12' // 1 -> 12
    ), $atts));
    return '<div class="foundation_press columns large-' . $size . '">' . do_shortcode($content) . '</div>';
}