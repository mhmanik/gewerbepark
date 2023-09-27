<?php
/**
 * @author  webxpixel
 * @since   1.0
 * @version 1.0
 */

if (post_password_required()) {
    return;
}
?>
 <div id="comments" class="comments-area">
    <?php if (have_comments()): ?>
        <?php
        $gftheme_comment_count = get_comments_number();
        $gftheme_comments_text = number_format_i18n($gftheme_comment_count) . ' ';
        if ($gftheme_comment_count > 1) {
        $gftheme_comments_text .= __('Comments', 'webxpixel');
        } else {
        $gftheme_comments_text .= __('Comment', 'webxpixel');
        }
        ?>
    <h3 class="comments-title"><?php echo esc_html($gftheme_comments_text); ?></h3>
    <?php
        $gftheme_avatar = get_option('show_avatars');
    ?>
    <ul class="comment-list<?php echo empty($gftheme_avatar) ? ' avatar-disabled' : ''; ?>">
        <?php
            wp_list_comments(
            array(
            'style'       => 'ul',
            'callback'    => 'Helper::comments_callback',
            'reply_text'  => esc_html__('Reply', 'webxpixel'),
            'avatar_size' => 70,
            'format'      => 'html5',
            )
        );
        ?>
    </ul>
    <?php if (get_comment_pages_count() > 1 && get_option('page_comments')): // Are there comments to navigate through? ?>
        <nav class="pagination-area comment-navigation">
            <ul>
                <li><?php previous_comments_link(esc_html__('Older Comments', 'webxpixel'));?></li>
                <li><?php next_comments_link(esc_html__('Newer Comments', 'webxpixel'));?></li>
            </ul>
        </nav><!-- #comment-nav-below -->
    <?php endif; // Check for comment navigation.?>
    <?php endif;?>
        <?php if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')): ?>
            <p class="no-comments"><?php esc_html_e('Comments are closed.', 'webxpixel');?></p>
        <?php endif;?>
        <?php
        // Start displaying Comment Form
            $gftheme_commenter = wp_get_current_commenter();
            $gftheme_req       = get_option('require_name_email');
            $gftheme_aria_req  = ($gftheme_req ? " required" : '');
            $gftheme_fields    = array(
            'author' =>
            '<div class="row"><div class="col-sm-6"><div class="form-group comment-form-author"><input type="text" id="author" name="author" value="' . esc_attr($gftheme_commenter['comment_author']) . '" placeholder="' . esc_attr__('Name', 'webxpixel') . ($gftheme_req ? ' *' : '') . '" class="form-control"' . $gftheme_aria_req . '></div></div>',
            'email'  =>
            '<div class="col-sm-6 comment-form-email"><div class="form-group"><input id="email" name="email" type="email" value="' . esc_attr($gftheme_commenter['comment_author_email']) . '" class="form-control" placeholder="' . esc_attr__('Email', 'webxpixel') . ($gftheme_req ? ' *' : '') . '"' . $gftheme_aria_req . '></div></div></div>',
        );
        $gftheme_args = array(
            'class_submit'  => 'submit btn-send',
            'submit_field'  => '<div class="form-group form-submit">%1$s %2$s</div>',
            'comment_field' => '<div class="form-group comment-form-comment"><textarea id="comment" name="comment" required placeholder="' . esc_attr__('Comment *', 'webxpixel') . '" class="textarea form-control" rows="10" cols="40"></textarea></div>',
            'fields'        => apply_filters('comment_form_default_fields', $gftheme_fields),
        );
    ?>
    <div class="reply-separator"></div>
    <?php comment_form($gftheme_args);?>
</div>