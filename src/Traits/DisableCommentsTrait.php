<?php
/**
 * Trait to disable comments on all post types.
 */
namespace ProcyonWP\Traits;

trait DisableCommentsTrait {
    /**
     * Disable comments on all post types.
     */
    public function disableCommentsPostTypes() {
        // Disable support for comments and trackbacks in post types
        foreach (get_post_types() as $postType) {
            remove_post_type_support($postType, 'comments');
            remove_post_type_support($postType, 'trackbacks');
        }
    }

    /**
     * Close comments on the front-end.
     *
     * @param bool $open Whether the current post is open for comments.
     * @param int $postId The post ID.
     * @return bool Always false.
     */
    public function disableCommentsStatus($open, $postId) {
        return false;
    }

    /**
     * Hide existing comments.
     *
     * @param array $comments Array of comments.
     * @param int $postId The post ID.
     * @return array Empty array.
     */
    public function disableCommentsHideExistingComments($comments, $postId) {
        return [];
    }

    /**
     * Remove comments page in menu.
     */
    public function disableCommentsAdminMenu() {
        remove_menu_page('edit-comments.php');
    }

    /**
     * Redirect any user trying to access comments page.
     */
    public function disableCommentsAdminMenuRedirect() {
        global $pagenow;
        if ($pagenow === 'edit-comments.php') {
            wp_redirect(admin_url());
            exit;
        }
    }

    /**
     * Remove comments metabox from dashboard.
     */
    public function disableCommentsDashboard() {
        remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
    }

    /**
     * Remove comments links from admin bar.
     */
    public function disableCommentsAdminBar() {
        if (is_admin_bar_showing()) {
            remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
        }
    }

    /**
     * Initialize hooks for disabling comments.
     */
    public function initDisableComments() {
        add_action('init', [$this, 'disableCommentsPostTypes']);
        add_filter('comments_open', [$this, 'disableCommentsStatus'], 10, 2);
        add_filter('pings_open', [$this, 'disableCommentsStatus'], 10, 2);
        add_filter('comments_array', [$this, 'disableCommentsHideExistingComments'], 10, 2);
        add_action('admin_menu', [$this, 'disableCommentsAdminMenu']);
        add_action('admin_init', [$this, 'disableCommentsAdminMenuRedirect']);
        add_action('admin_init', [$this, 'disableCommentsDashboard']);
        add_action('init', [$this, 'disableCommentsAdminBar']);
    }
}
