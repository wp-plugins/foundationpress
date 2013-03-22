<?php
//
// Alerts
//
add_shortcode('fp_alert', 'fp_alert');
function fp_alert($atts, $content)
{
    // Defining vars
    $color = '';
    $corner = '';
    // Extracting attributes
    extract(shortcode_atts(array(
        'color' => '', // null, success, alert, secondary
        'corner' => '' // null, round
    ), $atts));
    return '<div data-alert class="alert-box ' . $color . ' ' . $corner . '">
    ' . do_shortcode($content) . '
  <a href="#" class="close">&times;</a>
</div>';
}

//
// Tooltips
//
add_shortcode('fp_tooltip', 'fp_tooltip');
function fp_tooltip($atts, $content)
{
    // Defining vars
    $placement = '';
    $tooltip = '';
    // Extracting Attributes
    extract(shortcode_atts(array(
        'placement' => 'top', // null, top, bottom, left, right
        'tooltip' => '' // User input
    ), $atts));
    return '<span data-tooltip class="foundation_press has-tip tip-' . $placement . '" title="' . $tooltip . '">' . do_shortcode($content) . '</span>';
}

//
// Tabs
//
add_shortcode('fp_tabs', 'fp_tabs');
function fp_tabs($atts, $content)
{
    return '<div class="section-container tabs" data-section>' . do_shortcode($content) . '</div>';
}

//
// Accordion
//

add_shortcode('fp_accordion', 'fp_accordion');
function fp_accordion($atts, $content)
{
    return '<div class="section-container" data-section>' . do_shortcode($content) . '</div>';
}

add_shortcode('fp_tab', 'fp_tab');
function fp_tab($atts, $content)
{
    // Defining vars
    $title = '';
    // Extracting attributes
    extract(shortcode_atts(array(
        'title' => '' // User input
    ), $atts));
    return '<section class="section">
    <p class="title"><a href="#">' . $title . '</a></p>
    <div class="content">
      <p>' . do_shortcode($content) . '</p>
    </div>
  </section>';
}