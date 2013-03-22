<?php
//
// Table element
//
add_shortcode('fp_table', 'fp_table');
function fp_table($atts, $content)
{
    return '<table class="foundation_press table">' . do_shortcode($content) . '</table>';
}

//
// Table Body
//
add_shortcode('fp_body', 'fp_body');
function fp_body($atts, $content)
{
    return '<tbody class="foundation_press">' . do_shortcode($content) . '</tbody>';
}

//
// Table Head
//
add_shortcode('fp_head', 'fp_head');
function fp_head($atts, $content)
{
    return '<thead class="foundation_press">' . do_shortcode($content) . '</thead>';
}


//
// Row element
//
add_shortcode('fp_row', 'fp_row');
function fp_row($atts, $content)
{
    return '<tr class="foundation_press">' . do_shortcode($content) . '</tr>';
}

//
// Cell element
//
add_shortcode('fp_cell', 'fp_cell');
function fp_cell($atts, $content)
{
    return '<td class="foundation_press">' . do_shortcode($content) . '</td>';
}

//
// Pricing Table
//
add_shortcode('fp_pricing_table', 'fp_pricing_table');
function fp_pricing_table($atts, $content)
{
    // Defining vars
    $title = '';
    $price = '';
    $description = '';
    $cta = '';
    // Extracting attributes
    extract(shortcode_atts(array(
        'title' => '', // User input
        'price' => '', // User input
        'description' => '', // User input
        'cta' => '' // User input
    ), $atts));
    return '<ul class="pricing-table">
              <li class="title">' . $title . '</li>
              <li class="price">' . $price . '</li>
              <li class="description">' . $description . '</li>' .
        do_shortcode($content)
        . '<li class="cta-button"><a class="button" href="#">' . $cta . '</a></li>
            </ul>';
}

//
// Pricing Table Item
//
add_shortcode('fp_pricing_item', 'fp_pricing_item');
function fp_pricing_item($atts, $content)
{
    return '<li class="bullet-item">' . do_shortcode($content) . '</li>';
}