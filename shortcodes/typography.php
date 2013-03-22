<?php
//
// Headlines
//
add_shortcode('fp_h1', 'fp_h1');
function fp_h1($atts, $content)
{
    return '<h1 class="foundation_press">' . do_shortcode($content) . '</h1>';
}

add_shortcode('fp_h2', 'fp_h2');
function fp_h2($atts, $content)
{
    return '<h2 class="foundation_press">' . do_shortcode($content) . '</h2>';
}

add_shortcode('fp_h3', 'fp_h3');
function fp_h3($atts, $content)
{
    return '<h3 class="foundation_press">' . do_shortcode($content) . '</h3>';
}

add_shortcode('fp_h4', 'fp_h4');
function fp_h4($atts, $content)
{
    return '<h4 class="foundation_press">' . do_shortcode($content) . '</h4>';
}

add_shortcode('fp_h5', 'fp_h5');
function fp_h5($atts, $content)
{
    return '<h5 class="foundation_press">' . do_shortcode($content) . '</h5>';
}

add_shortcode('fp_h6', 'fp_h6');
function fp_h6($atts, $content)
{
    return '<h6 class="foundation_press">' . do_shortcode($content) . '</h6>';
}

//
// Block quotes
//
add_shortcode('fp_blockquote', 'fp_blockquote');
function fp_blockquote($atts, $content)
{
    return '<blockquote class="foundation_press">' . do_shortcode($content) . '</blockquote>';
}

//
// Labels
//
add_shortcode('fp_label', 'fp_label');
function fp_label($atts, $content)
{
    // Defining Vars
    $corner = '';
    $color = '';
    // Extracting attributes
    extract(shortcode_atts(array(
        'corner' => '', // null, radius, round
        'color' => '' // null, secondary, alert, success
    ), $atts));
    return '<span class="foundation_press label ' . $corner . ' ' . $color . ' ">' . $content . '</span>';
}

//
// Keystrokes
//
add_shortcode('fp_keystroke', 'fp_keystroke');
function fp_keystroke($atts, $content)
{
    return '<kbd class="foundation_press">' . $content . '</kbd>';
}

//
// Buttons
//
add_shortcode('fp_button', 'fp_button');
function fp_button($atts, $content)
{
    // Defining vars
    $link = '';
    $size = '';
    $color = '';
    $corner = '';
    $state = '';
    // Extracting attributes
    extract(shortcode_atts(array(
        'link' => '', // User input
        'size' => '', // null, tiny, small, medium, large
        'color' => '', // null, secondary, alert, success
        'corner' => '', // null, radius, round
        'state' => '' // null, disabled
    ), $atts));
    return '<a href="' . $link . '" class="foundation_press button ' . $size . ' ' . $color . ' ' . $corner . ' ' . $state . '">' . $content . '</a>';
}

//
// Panels
//
add_shortcode('fp_panel', 'fp_panel');
function fp_panel($atts, $content)
{
    // Defining vars
    $type = '';
    $corner = '';
    // Extracting attributes
    extract(shortcode_atts(array(
        'type' => '', // null, callout
        'corner' => '' // null, radius
    ), $atts));

    return '<div class="foundation_press panel ' . $type . ' ' . $corner . '">' . $content . '</div>';
}