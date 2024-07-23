<?php

namespace ProcyonWP\Traits;

trait RemoveNewPostTrait {
	/**
	 * Remove 'New Post' link from the admin bar menu.
	 *
	 * @param WP_Admin_Bar $wp_admin_bar The WP_Admin_Bar instance.
	 */
	private function removeNewPostAdminBar( $wp_admin_bar ): void {
		$wp_admin_bar->remove_node( 'new-post' );
		if ( $node = $wp_admin_bar->get_node( 'new-content' ) ) {
			$node->href = '#';
			$wp_admin_bar->add_node( $node );
		}
	}

	/**
	 * Remove 'New Post' link from the admin bar menu and hide from other areas of the site
	 * @return void
	 */
	public function initRemoveNewPostTrait(): void {
		add_action( 'admin_bar_menu', [ $this, 'removeNewPostAdminBar' ], 999 );
	}
}