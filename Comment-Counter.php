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

    $total_comments = esc_html($comment_counts->total_comments);
    $approved_comments = esc_html($comment_counts->approved);
    $pending_comments = esc_html($comment_counts->moderated);
    $spam_comments = esc_html($comment_counts->spam);
    $trash_comments = esc_html($comment_counts->trash);

    echo '<div class="comment-counter">';
    echo '<h3>Comment Counts</h3>';
    echo '<ul>';
    echo '<li>All Comments: ' . $total_comments . '</li>';
    echo '<li>Approved Comments: ' . $approved_comments . '</li>';
    echo '<li>Pending Comments: ' . $pending_comments . '</li>';
    echo '<li>Spam Comments: ' . $spam_comments . '</li>';
    echo '<li>Trash Comments: ' . $trash_comments . '</li>';
    echo '</ul>';
    echo '</div>';
}


function comment_counter_widget() {
    wp_add_dashboard_widget(
        'comment_counter_widget',
        'Comment Counter',
        'comment_counter_display'
    );
}

add_action('wp_dashboard_setup', 'comment_counter_widget');
