<?php
/*
Plugin Name: Comments Counter
Plugin URI: https://markmemayank.com
Description: Displays the number of comments in different categories and adds a widget to the WordPress dashboard.
Version: 1.0
Author: Mayank Kumar
Author URI: https://markmemayank.com/
*/

function comment_counter_display() {
    $comment_counts = wp_count_comments(); // Get comment counts

    $total_comments = $comment_counts->total_comments;
    $approved_comments = $comment_counts->approved;
    $pending_comments = $comment_counts->moderated;
    $spam_comments = $comment_counts->spam;
    $trash_comments = $comment_counts->trash;

    echo '<div class="comment-counter">';
    echo '<h3>' . esc_html__('Comment Counts') . '</h3>';
    echo '<ul>';
    echo '<li>' . esc_html__('All Comments:') . ' ' . esc_html($total_comments) . '</li>';
    echo '<li>' . esc_html__('Approved Comments:') . ' ' . esc_html($approved_comments) . '</li>';
    echo '<li>' . esc_html__('Pending Comments:') . ' ' . esc_html($pending_comments) . '</li>';
    echo '<li>' . esc_html__('Spam Comments:') . ' ' . esc_html($spam_comments) . '</li>';
    echo '<li>' . esc_html__('Trash Comments:') . ' ' . esc_html($trash_comments) . '</li>';
    echo '</ul>';
    echo '</div>';
}

function comment_counter_widget() {
    wp_add_dashboard_widget(
        'comment_counter_widget',
        esc_html__('Comment Counter'),
        'comment_counter_display'
    );
}

add_action('wp_dashboard_setup', 'comment_counter_widget');
