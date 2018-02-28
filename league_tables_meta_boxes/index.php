<?php
/*
Plugin Name: League Tables Meta Boxes
Plugin URI: 
Description: Meta Boxes to display League Tables in individual team pages
Version: 1.0
Author: George Prince
*/
function add_style() {
	wp_enqueue_style( 'add_style', plugin_dir_url( __FILE__ ) . '/css/style.css' );
}
add_action( 'admin_print_styles', 'add_style' );

/* REFERENCING - https://wordpress.stackexchange.com/questions/29286/can-i-limit-this-meta-box-to-a-particular-page - IF statements limit the meta box to appear for only the relevant page ID's (i.e the specific team pages) */

function wpb_add_custom_meta_boxes() {
	global $post;
	if ('134' == $post -> ID) { 
		add_meta_box(
			'league_table',
			'League Table',
			'league_table_callback',
			'page'
		);
	}

	if ('136' == $post -> ID) { 
		add_meta_box(
			'league_table',
			'League Table',
			'league_table_callback',
			'page'
		);
	}

	if ('138' == $post -> ID) { 
		add_meta_box(
			'league_table',
			'League Table',
			'league_table_callback',
			'page'
		);
	}
}

add_action ( 'add_meta_boxes', 'wpb_add_custom_meta_boxes' );

/* REFERENCING - https://www.youtube.com/watch?v=waS0gCkuLeM&list=PLIjMj0-5C8TI7Jwell1rTvv5XXyrbKDcy&index=10 - Part 11: Securely saving data entered into the database from this form only using wp_nonce */

function league_table_callback( $post ) {
	wp_nonce_field( basename( __FILE__ ), 'league_table_nonce' ); // wp nonce field valudates the data entered is from current site & not elsewhere
	$league_table_stored_meta = get_post_meta( $post -> ID ); // get post meta, queries the database and grabs the content created from the form from the relevant post id
	?>

	<!-- REFERENCING - https://www.youtube.com/watch?v=y3SvtpOk4UI&index=9&list=PLIjMj0-5C8TI7Jwell1rTvv5XXyrbKDcy - Part 10: Creating custom fields -->

			<div class="meta-row">
				<div class="meta-labels">
					<!-- REFERENCING - https://www.youtube.com/watch?v=waS0gCkuLeM&list=PLIjMj0-5C8TI7Jwell1rTvv5XXyrbKDcy&index=10 - PHP code that checks the database to see if there is a value & if there is display it. [0] means that we are grabbing the most recent value entered in for each input -->
					<table>
						<!-- Row 1 -->
						<tr>
							<td><input id="row-1-team" name="row-1-team" placeholder="Team Name" type="text" maxlength="20" size="25" value="<?php if ( ! empty ( $league_table_stored_meta['row-1-team'] ) ) echo esc_attr( $league_table_stored_meta['row-1-team'][0]); ?>"></td>

			                <td><input id="row-1-played" name="row-1-played" placeholder="P" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-1-played'] ) ) echo esc_attr( $league_table_stored_meta['row-1-played'][0]); ?>"></td>

			                <td><input id="row-1-won" name="row-1-won" placeholder="W" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-1-won'] ) ) echo esc_attr( $league_table_stored_meta['row-1-won'][0]); ?>"></td>

			                <td><input id="row-1-lost" name="row-1-lost" placeholder="L" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-1-lost'] ) ) echo esc_attr( $league_table_stored_meta['row-1-lost'][0]); ?>"></td>

			                <td><input id="row-1-tie" name="row-1-tie" placeholder="T" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-1-tie'] ) ) echo esc_attr( $league_table_stored_meta['row-1-tie'][0]); ?>"></td>

			                <td><input id="row-1-nr" name="row-1-nr" placeholder="V" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-1-nr'] ) ) echo esc_attr( $league_table_stored_meta['row-1-nr'][0]); ?>"></td>

			                <td><input id="row-1-points" name="row-1-points" placeholder="PTS" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-1-points'] ) ) echo esc_attr( $league_table_stored_meta['row-1-points'][0]); ?>"></td>

			                <td><input id="row-1-run-rate" name="row-1-run-rate" placeholder="NRR" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-1-run-rate'] ) ) echo esc_attr( $league_table_stored_meta['row-1-run-rate'][0]); ?>"></td>

			            </tr>

			            <!-- Row 2 -->

			            <tr>
							<td><input id="row-2-team" name="row-2-team" placeholder="Team Name" type="text" maxlength="20" size="25" value="<?php if ( ! empty ( $league_table_stored_meta['row-2-team'] ) ) echo esc_attr( $league_table_stored_meta['row-2-team'][0]); ?>"></td>

			                <td><input id="row-2-played" name="row-2-played" placeholder="P" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-2-played'] ) ) echo esc_attr( $league_table_stored_meta['row-2-played'][0]); ?>"></td>

			                <td><input id="row-2-won" name="row-2-won" placeholder="W" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-2-won'] ) ) echo esc_attr( $league_table_stored_meta['row-2-won'][0]); ?>"></td>

			                <td><input id="row-2-lost" name="row-2-lost" placeholder="L" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-2-lost'] ) ) echo esc_attr( $league_table_stored_meta['row-2-lost'][0]); ?>"></td>

			                <td><input id="row-2-tie" name="row-2-tie" placeholder="T" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-2-tie'] ) ) echo esc_attr( $league_table_stored_meta['row-2-tie'][0]); ?>"></td>

			                <td><input id="row-2-nr" name="row-2-nr" placeholder="V" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-2-nr'] ) ) echo esc_attr( $league_table_stored_meta['row-2-nr'][0]); ?>"></td>

			                <td><input id="row-2-points" name="row-2-points" placeholder="PTS" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-2-points'] ) ) echo esc_attr( $league_table_stored_meta['row-2-points'][0]); ?>"></td>

			                <td><input id="row-2-run-rate" name="row-2-run-rate" placeholder="NRR" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-2-run-rate'] ) ) echo esc_attr( $league_table_stored_meta['row-2-run-rate'][0]); ?>"></td>
			            </tr>

			            <!-- Row 3 -->

			            <tr>
							<td><input id="row-3-team" name="row-3-team" placeholder="Team Name" type="text" maxlength="20" size="25" value="<?php if ( ! empty ( $league_table_stored_meta['row-3-team'] ) ) echo esc_attr( $league_table_stored_meta['row-3-team'][0]); ?>"></td>

			                <td><input id="row-3-played" name="row-3-played" placeholder="P" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-3-played'] ) ) echo esc_attr( $league_table_stored_meta['row-3-played'][0]); ?>"></td>

			                <td><input id="row-3-won" name="row-3-won" placeholder="W" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-3-won'] ) ) echo esc_attr( $league_table_stored_meta['row-3-won'][0]); ?>"></td>

			                <td><input id="row-3-lost" name="row-3-lost" placeholder="L" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-3-lost'] ) ) echo esc_attr( $league_table_stored_meta['row-3-lost'][0]); ?>"></td>

			                <td><input id="row-3-tie" name="row-3-tie" placeholder="T" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-3-tie'] ) ) echo esc_attr( $league_table_stored_meta['row-3-tie'][0]); ?>"></td>

			                <td><input id="row-3-nr" name="row-3-nr" placeholder="V" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-3-nr'] ) ) echo esc_attr( $league_table_stored_meta['row-3-nr'][0]); ?>"></td>

			                <td><input id="row-3-points" name="row-3-points" placeholder="PTS" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-3-points'] ) ) echo esc_attr( $league_table_stored_meta['row-3-points'][0]); ?>"></td>

			                <td><input id="row-3-run-rate" name="row-3-run-rate" placeholder="NRR" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-3-run-rate'] ) ) echo esc_attr( $league_table_stored_meta['row-3-run-rate'][0]); ?>"></td>
			            </tr>

			            <!-- Row 4 -->

			            <tr>
							<td><input id="row-4-team" name="row-4-team" placeholder="Team Name" type="text" maxlength="20" size="25" value="<?php if ( ! empty ( $league_table_stored_meta['row-4-team'] ) ) echo esc_attr( $league_table_stored_meta['row-4-team'][0]); ?>"></td>

			                <td><input id="row-4-played" name="row-4-played" placeholder="P" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-4-played'] ) ) echo esc_attr( $league_table_stored_meta['row-4-played'][0]); ?>"></td>

			                <td><input id="row-4-won" name="row-4-won" placeholder="W" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-4-won'] ) ) echo esc_attr( $league_table_stored_meta['row-4-won'][0]); ?>"></td>

			                <td><input id="row-4-lost" name="row-4-lost" placeholder="L" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-4-lost'] ) ) echo esc_attr( $league_table_stored_meta['row-4-lost'][0]); ?>"></td>

			                <td><input id="row-4-tie" name="row-4-tie" placeholder="T" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-4-tie'] ) ) echo esc_attr( $league_table_stored_meta['row-4-tie'][0]); ?>"></td>

			                <td><input id="row-4-nr" name="row-4-nr" placeholder="V" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-4-nr'] ) ) echo esc_attr( $league_table_stored_meta['row-4-nr'][0]); ?>"></td>

			                <td><input id="row-4-points" name="row-4-points" placeholder="PTS" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-4-points'] ) ) echo esc_attr( $league_table_stored_meta['row-4-points'][0]); ?>"></td>

			                <td><input id="row-4-run-rate" name="row-4-run-rate" placeholder="NRR" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-4-run-rate'] ) ) echo esc_attr( $league_table_stored_meta['row-4-run-rate'][0]); ?>"></td>
			            </tr>

			            <!-- Row 5 -->

			            <tr>
							<td><input id="row-5-team" name="row-5-team" placeholder="Team Name" type="text" maxlength="20" size="25" value="<?php if ( ! empty ( $league_table_stored_meta['row-5-team'] ) ) echo esc_attr( $league_table_stored_meta['row-5-team'][0]); ?>"></td>

			                <td><input id="row-5-played" name="row-5-played" placeholder="P" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-5-played'] ) ) echo esc_attr( $league_table_stored_meta['row-5-played'][0]); ?>"></td>

			                <td><input id="row-5-won" name="row-5-won" placeholder="W" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-5-won'] ) ) echo esc_attr( $league_table_stored_meta['row-5-won'][0]); ?>"></td>

			                <td><input id="row-5-lost" name="row-5-lost" placeholder="L" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-5-lost'] ) ) echo esc_attr( $league_table_stored_meta['row-5-lost'][0]); ?>"></td>

			                <td><input id="row-5-tie" name="row-5-tie" placeholder="T" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-5-tie'] ) ) echo esc_attr( $league_table_stored_meta['row-5-tie'][0]); ?>"></td>

			                <td><input id="row-5-nr" name="row-5-nr" placeholder="V" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-5-nr'] ) ) echo esc_attr( $league_table_stored_meta['row-5-nr'][0]); ?>"></td>

			                <td><input id="row-5-points" name="row-5-points" placeholder="PTS" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-5-points'] ) ) echo esc_attr( $league_table_stored_meta['row-5-points'][0]); ?>"></td>

			                <td><input id="row-5-run-rate" name="row-5-run-rate" placeholder="NRR" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-5-run-rate'] ) ) echo esc_attr( $league_table_stored_meta['row-5-run-rate'][0]); ?>"></td>
			            </tr>

			            <!-- Row 6 -->

			            <tr>
							<td><input id="row-6-team" name="row-6-team" placeholder="Team Name" type="text" maxlength="20" size="25" value="<?php if ( ! empty ( $league_table_stored_meta['row-6-team'] ) ) echo esc_attr( $league_table_stored_meta['row-6-team'][0]); ?>"></td>

			                <td><input id="row-6-played" name="row-6-played" placeholder="P" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-6-played'] ) ) echo esc_attr( $league_table_stored_meta['row-6-played'][0]); ?>"></td>

			                <td><input id="row-6-won" name="row-6-won" placeholder="W" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-6-won'] ) ) echo esc_attr( $league_table_stored_meta['row-6-won'][0]); ?>"></td>

			                <td><input id="row-6-lost" name="row-6-lost" placeholder="L" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-6-lost'] ) ) echo esc_attr( $league_table_stored_meta['row-6-lost'][0]); ?>"></td>

			                <td><input id="row-6-tie" name="row-6-tie" placeholder="T" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-6-tie'] ) ) echo esc_attr( $league_table_stored_meta['row-6-tie'][0]); ?>"></td>

			                <td><input id="row-6-nr" name="row-6-nr" placeholder="V" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-6-nr'] ) ) echo esc_attr( $league_table_stored_meta['row-6-nr'][0]); ?>"></td>

			                <td><input id="row-6-points" name="row-6-points" placeholder="PTS" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-6-points'] ) ) echo esc_attr( $league_table_stored_meta['row-6-points'][0]); ?>"></td>

			                <td><input id="row-6-run-rate" name="row-6-run-rate" placeholder="NRR" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-6-run-rate'] ) ) echo esc_attr( $league_table_stored_meta['row-6-run-rate'][0]); ?>"></td>
			            </tr>

			            <!-- Row 7 -->

			            <tr>
							<td><input id="row-7-team" name="row-7-team" placeholder="Team Name" type="text" maxlength="20" size="25" value="<?php if ( ! empty ( $league_table_stored_meta['row-7-team'] ) ) echo esc_attr( $league_table_stored_meta['row-7-team'][0]); ?>"></td>

			                <td><input id="row-7-played" name="row-7-played" placeholder="P" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-7-played'] ) ) echo esc_attr( $league_table_stored_meta['row-7-played'][0]); ?>"></td>

			                <td><input id="row-7-won" name="row-7-won" placeholder="W" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-7-won'] ) ) echo esc_attr( $league_table_stored_meta['row-7-won'][0]); ?>"></td>

			                <td><input id="row-7-lost" name="row-7-lost" placeholder="L" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-7-lost'] ) ) echo esc_attr( $league_table_stored_meta['row-7-lost'][0]); ?>"></td>

			                <td><input id="row-7-tie" name="row-7-tie" placeholder="T" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-7-tie'] ) ) echo esc_attr( $league_table_stored_meta['row-7-tie'][0]); ?>"></td>

			                <td><input id="row-7-nr" name="row-7-nr" placeholder="V" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-7-nr'] ) ) echo esc_attr( $league_table_stored_meta['row-7-nr'][0]); ?>"></td>

			                <td><input id="row-7-points" name="row-7-points" placeholder="PTS" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-7-points'] ) ) echo esc_attr( $league_table_stored_meta['row-7-points'][0]); ?>"></td>

			                <td><input id="row-7-run-rate" name="row-7-run-rate" placeholder="NRR" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-7-run-rate'] ) ) echo esc_attr( $league_table_stored_meta['row-7-run-rate'][0]); ?>"></td>
			            </tr>

			            <!-- Row 8 -->

			            <tr>
							<td><input id="row-8-team" name="row-8-team" placeholder="Team Name" type="text" maxlength="20" size="25" value="<?php if ( ! empty ( $league_table_stored_meta['row-8-team'] ) ) echo esc_attr( $league_table_stored_meta['row-8-team'][0]); ?>"></td>

			                <td><input id="row-8-played" name="row-8-played" placeholder="P" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-8-played'] ) ) echo esc_attr( $league_table_stored_meta['row-8-played'][0]); ?>"></td>

			                <td><input id="row-8-won" name="row-8-won" placeholder="W" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-8-won'] ) ) echo esc_attr( $league_table_stored_meta['row-8-won'][0]); ?>"></td>

			                <td><input id="row-8-lost" name="row-8-lost" placeholder="L" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-8-lost'] ) ) echo esc_attr( $league_table_stored_meta['row-8-lost'][0]); ?>"></td>

			                <td><input id="row-8-tie" name="row-8-tie" placeholder="T" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-8-tie'] ) ) echo esc_attr( $league_table_stored_meta['row-8-tie'][0]); ?>"></td>

			                <td><input id="row-8-nr" name="row-8-nr" placeholder="V" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-8-nr'] ) ) echo esc_attr( $league_table_stored_meta['row-8-nr'][0]); ?>"></td>

			                <td><input id="row-8-points" name="row-8-points" placeholder="PTS" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-8-points'] ) ) echo esc_attr( $league_table_stored_meta['row-8-points'][0]); ?>"></td>

			                <td><input id="row-8-run-rate" name="row-8-run-rate" placeholder="NRR" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-8-run-rate'] ) ) echo esc_attr( $league_table_stored_meta['row-8-run-rate'][0]); ?>"></td>
			            </tr>

			            <!-- Row 9 -->

			            <tr>
							<td><input id="row-9-team" name="row-9-team" placeholder="Team Name" type="text" maxlength="20" size="25" value="<?php if ( ! empty ( $league_table_stored_meta['row-9-team'] ) ) echo esc_attr( $league_table_stored_meta['row-9-team'][0]); ?>"></td>

			                <td><input id="row-9-played" name="row-9-played" placeholder="P" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-9-played'] ) ) echo esc_attr( $league_table_stored_meta['row-9-played'][0]); ?>"></td>

			                <td><input id="row-9-won" name="row-9-won" placeholder="W" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-9-won'] ) ) echo esc_attr( $league_table_stored_meta['row-9-won'][0]); ?>"></td>

			                <td><input id="row-9-lost" name="row-9-lost" placeholder="L" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-9-lost'] ) ) echo esc_attr( $league_table_stored_meta['row-9-lost'][0]); ?>"></td>

			                <td><input id="row-9-tie" name="row-9-tie" placeholder="T" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-9-tie'] ) ) echo esc_attr( $league_table_stored_meta['row-9-tie'][0]); ?>"></td>

			                <td><input id="row-9-nr" name="row-9-nr" placeholder="V" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-9-nr'] ) ) echo esc_attr( $league_table_stored_meta['row-9-nr'][0]); ?>"></td>

			                <td><input id="row-9-points" name="row-9-points" placeholder="PTS" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-9-points'] ) ) echo esc_attr( $league_table_stored_meta['row-9-points'][0]); ?>"></td>

			                <td><input id="row-9-run-rate" name="row-9-run-rate" placeholder="NRR" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-9-run-rate'] ) ) echo esc_attr( $league_table_stored_meta['row-9-run-rate'][0]); ?>"></td>
			            </tr>

			            <!-- Row 10 -->

			            <tr>
							<td><input id="row-10-team" name="row-10-team" placeholder="Team Name" type="text" maxlength="20" size="25" value="<?php if ( ! empty ( $league_table_stored_meta['row-10-team'] ) ) echo esc_attr( $league_table_stored_meta['row-10-team'][0]); ?>"></td>

			                <td><input id="row-10-played" name="row-10-played" placeholder="P" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-10-played'] ) ) echo esc_attr( $league_table_stored_meta['row-10-played'][0]); ?>"></td>

			                <td><input id="row-10-won" name="row-10-won" placeholder="W" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-10-won'] ) ) echo esc_attr( $league_table_stored_meta['row-10-won'][0]); ?>"></td>

			                <td><input id="row-10-lost" name="row-10-lost" placeholder="L" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-10-lost'] ) ) echo esc_attr( $league_table_stored_meta['row-10-lost'][0]); ?>"></td>

			                <td><input id="row-10-tie" name="row-10-tie" placeholder="T" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-10-tie'] ) ) echo esc_attr( $league_table_stored_meta['row-10-tie'][0]); ?>"></td>

			                <td><input id="row-10-nr" name="row-10-nr" placeholder="V" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-10-nr'] ) ) echo esc_attr( $league_table_stored_meta['row-10-nr'][0]); ?>"></td>

			                <td><input id="row-10-points" name="row-10-points" placeholder="PTS" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-10-points'] ) ) echo esc_attr( $league_table_stored_meta['row-10-points'][0]); ?>"></td>

			                <td><input id="row-10-run-rate" name="row-10-run-rate" placeholder="NRR" type="text" size="2" value="<?php if ( ! empty ( $league_table_stored_meta['row-10-run-rate'] ) ) echo esc_attr( $league_table_stored_meta['row-10-run-rate'][0]); ?>"></td>
			            </tr>
			        </table>
				</div>

	<?php
}

/* REFERENCING - https://www.youtube.com/watch?v=waS0gCkuLeM&list=PLIjMj0-5C8TI7Jwell1rTvv5XXyrbKDcy&index=10 - Saving the data entered & determining if its an autosave or from revisions */

function league_table_meta_save( $post_id ) {
	$is_autosave = wp_is_post_autosave( $post_id ); // wp_is_post_autosave - saves data into variable if autosave
	$is_revision = wp_is_post_revision( $post_id ); // wp_is_post_revision - saves data into variable if revision
	$is_valid_nonce = ( isset( $_POST[ 'league_table_nonce' ] ) && wp_verify_nonce( $_POST[ 'league_table_nonce' ],basename(__FILE__) ) ) ? 'true' : 'false'; // Checks when submitting form and if nonce present & matches the name then its added

	// If any of these don't have data to update then exit 
	if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
		return;
	}

	/* REFERENCING - https://www.youtube.com/watch?v=waS0gCkuLeM&list=PLIjMj0-5C8TI7Jwell1rTvv5XXyrbKDcy&index=10 - If data inside each of these inputs, update post meta updates the data in the database */

	/* sanitize text field - cleans data entered in inputs */

	// Row 1
	if ( isset( $_POST['row-1-team'] ) ) {
		update_post_meta( $post_id, 'row-1-team', sanitize_text_field($_POST['row-1-team'] ) );
	}

	if ( isset( $_POST['row-1-played'] ) ) {
		update_post_meta( $post_id, 'row-1-played', sanitize_text_field($_POST['row-1-played'] ) );
	}

	if ( isset( $_POST['row-1-won'] ) ) {
		update_post_meta( $post_id, 'row-1-won', sanitize_text_field($_POST['row-1-won'] ) );
	}

	if ( isset( $_POST['row-1-lost'] ) ) {
		update_post_meta( $post_id, 'row-1-lost', sanitize_text_field($_POST['row-1-lost'] ) );
	}

	if ( isset( $_POST['row-1-tie'] ) ) {
		update_post_meta( $post_id, 'row-1-tie', sanitize_text_field($_POST['row-1-tie'] ) );
	}

	if ( isset( $_POST['row-1-nr'] ) ) {
		update_post_meta( $post_id, 'row-1-nr', sanitize_text_field($_POST['row-1-nr'] ) );
	}

	if ( isset( $_POST['row-1-points'] ) ) {
		update_post_meta( $post_id, 'row-1-points', sanitize_text_field($_POST['row-1-points'] ) );
	}

	if ( isset( $_POST['row-1-run-rate'] ) ) {
		update_post_meta( $post_id, 'row-1-run-rate', sanitize_text_field($_POST['row-1-run-rate'] ) );
	}

	// Row 2
	if ( isset( $_POST['row-2-team'] ) ) {
		update_post_meta( $post_id, 'row-2-team', sanitize_text_field($_POST['row-2-team'] ) );
	}

	if ( isset( $_POST['row-2-played'] ) ) {
		update_post_meta( $post_id, 'row-2-played', sanitize_text_field($_POST['row-2-played'] ) );
	}

	if ( isset( $_POST['row-2-won'] ) ) {
		update_post_meta( $post_id, 'row-2-won', sanitize_text_field($_POST['row-2-won'] ) );
	}

	if ( isset( $_POST['row-2-lost'] ) ) {
		update_post_meta( $post_id, 'row-2-lost', sanitize_text_field($_POST['row-2-lost'] ) );
	}

	if ( isset( $_POST['row-2-tie'] ) ) {
		update_post_meta( $post_id, 'row-2-tie', sanitize_text_field($_POST['row-2-tie'] ) );
	}

	if ( isset( $_POST['row-2-nr'] ) ) {
		update_post_meta( $post_id, 'row-2-nr', sanitize_text_field($_POST['row-2-nr'] ) );
	}

	if ( isset( $_POST['row-2-points'] ) ) {
		update_post_meta( $post_id, 'row-2-points', sanitize_text_field($_POST['row-2-points'] ) );
	}

	if ( isset( $_POST['row-2-run-rate'] ) ) {
		update_post_meta( $post_id, 'row-2-run-rate', sanitize_text_field($_POST['row-2-run-rate'] ) );
	}

	// Row 3
	if ( isset( $_POST['row-3-team'] ) ) {
		update_post_meta( $post_id, 'row-3-team', sanitize_text_field($_POST['row-3-team'] ) );
	}

	if ( isset( $_POST['row-3-played'] ) ) {
		update_post_meta( $post_id, 'row-3-played', sanitize_text_field($_POST['row-3-played'] ) );
	}

	if ( isset( $_POST['row-3-won'] ) ) {
		update_post_meta( $post_id, 'row-3-won', sanitize_text_field($_POST['row-3-won'] ) );
	}

	if ( isset( $_POST['row-3-lost'] ) ) {
		update_post_meta( $post_id, 'row-3-lost', sanitize_text_field($_POST['row-3-lost'] ) );
	}

	if ( isset( $_POST['row-3-tie'] ) ) {
		update_post_meta( $post_id, 'row-3-tie', sanitize_text_field($_POST['row-3-tie'] ) );
	}

	if ( isset( $_POST['row-3-nr'] ) ) {
		update_post_meta( $post_id, 'row-3-nr', sanitize_text_field($_POST['row-3-nr'] ) );
	}

	if ( isset( $_POST['row-3-points'] ) ) {
		update_post_meta( $post_id, 'row-3-points', sanitize_text_field($_POST['row-3-points'] ) );
	}

	if ( isset( $_POST['row-3-run-rate'] ) ) {
		update_post_meta( $post_id, 'row-3-run-rate', sanitize_text_field($_POST['row-3-run-rate'] ) );
	}

	// Row 4
	if ( isset( $_POST['row-4-team'] ) ) {
		update_post_meta( $post_id, 'row-4-team', sanitize_text_field($_POST['row-4-team'] ) );
	}

	if ( isset( $_POST['row-4-played'] ) ) {
		update_post_meta( $post_id, 'row-4-played', sanitize_text_field($_POST['row-4-played'] ) );
	}

	if ( isset( $_POST['row-4-won'] ) ) {
		update_post_meta( $post_id, 'row-4-won', sanitize_text_field($_POST['row-4-won'] ) );
	}

	if ( isset( $_POST['row-4-lost'] ) ) {
		update_post_meta( $post_id, 'row-4-lost', sanitize_text_field($_POST['row-4-lost'] ) );
	}

	if ( isset( $_POST['row-4-tie'] ) ) {
		update_post_meta( $post_id, 'row-4-tie', sanitize_text_field($_POST['row-4-tie'] ) );
	}

	if ( isset( $_POST['row-4-nr'] ) ) {
		update_post_meta( $post_id, 'row-4-nr', sanitize_text_field($_POST['row-4-nr'] ) );
	}

	if ( isset( $_POST['row-4-points'] ) ) {
		update_post_meta( $post_id, 'row-4-points', sanitize_text_field($_POST['row-4-points'] ) );
	}

	if ( isset( $_POST['row-4-run-rate'] ) ) {
		update_post_meta( $post_id, 'row-4-run-rate', sanitize_text_field($_POST['row-4-run-rate'] ) );
	}

	// Row 5
	if ( isset( $_POST['row-5-team'] ) ) {
		update_post_meta( $post_id, 'row-5-team', sanitize_text_field($_POST['row-5-team'] ) );
	}

	if ( isset( $_POST['row-5-played'] ) ) {
		update_post_meta( $post_id, 'row-5-played', sanitize_text_field($_POST['row-5-played'] ) );
	}

	if ( isset( $_POST['row-5-won'] ) ) {
		update_post_meta( $post_id, 'row-5-won', sanitize_text_field($_POST['row-5-won'] ) );
	}

	if ( isset( $_POST['row-5-lost'] ) ) {
		update_post_meta( $post_id, 'row-5-lost', sanitize_text_field($_POST['row-5-lost'] ) );
	}

	if ( isset( $_POST['row-5-tie'] ) ) {
		update_post_meta( $post_id, 'row-5-tie', sanitize_text_field($_POST['row-5-tie'] ) );
	}

	if ( isset( $_POST['row-5-nr'] ) ) {
		update_post_meta( $post_id, 'row-5-nr', sanitize_text_field($_POST['row-5-nr'] ) );
	}

	if ( isset( $_POST['row-5-points'] ) ) {
		update_post_meta( $post_id, 'row-5-points', sanitize_text_field($_POST['row-5-points'] ) );
	}

	if ( isset( $_POST['row-5-run-rate'] ) ) {
		update_post_meta( $post_id, 'row-5-run-rate', sanitize_text_field($_POST['row-5-run-rate'] ) );
	}

	// Row 6
	if ( isset( $_POST['row-6-team'] ) ) {
		update_post_meta( $post_id, 'row-6-team', sanitize_text_field($_POST['row-6-team'] ) );
	}

	if ( isset( $_POST['row-6-played'] ) ) {
		update_post_meta( $post_id, 'row-6-played', sanitize_text_field($_POST['row-6-played'] ) );
	}

	if ( isset( $_POST['row-6-won'] ) ) {
		update_post_meta( $post_id, 'row-6-won', sanitize_text_field($_POST['row-6-won'] ) );
	}

	if ( isset( $_POST['row-6-lost'] ) ) {
		update_post_meta( $post_id, 'row-6-lost', sanitize_text_field($_POST['row-6-lost'] ) );
	}

	if ( isset( $_POST['row-6-tie'] ) ) {
		update_post_meta( $post_id, 'row-6-tie', sanitize_text_field($_POST['row-6-tie'] ) );
	}

	if ( isset( $_POST['row-6-nr'] ) ) {
		update_post_meta( $post_id, 'row-6-nr', sanitize_text_field($_POST['row-6-nr'] ) );
	}

	if ( isset( $_POST['row-6-points'] ) ) {
		update_post_meta( $post_id, 'row-6-points', sanitize_text_field($_POST['row-6-points'] ) );
	}

	if ( isset( $_POST['row-6-run-rate'] ) ) {
		update_post_meta( $post_id, 'row-6-run-rate', sanitize_text_field($_POST['row-6-run-rate'] ) );
	}

	// Row 7
	if ( isset( $_POST['row-7-team'] ) ) {
		update_post_meta( $post_id, 'row-7-team', sanitize_text_field($_POST['row-7-team'] ) );
	}

	if ( isset( $_POST['row-7-played'] ) ) {
		update_post_meta( $post_id, 'row-7-played', sanitize_text_field($_POST['row-7-played'] ) );
	}

	if ( isset( $_POST['row-7-won'] ) ) {
		update_post_meta( $post_id, 'row-7-won', sanitize_text_field($_POST['row-7-won'] ) );
	}

	if ( isset( $_POST['row-7-lost'] ) ) {
		update_post_meta( $post_id, 'row-7-lost', sanitize_text_field($_POST['row-7-lost'] ) );
	}

	if ( isset( $_POST['row-7-tie'] ) ) {
		update_post_meta( $post_id, 'row-7-tie', sanitize_text_field($_POST['row-7-tie'] ) );
	}

	if ( isset( $_POST['row-7-nr'] ) ) {
		update_post_meta( $post_id, 'row-7-nr', sanitize_text_field($_POST['row-7-nr'] ) );
	}

	if ( isset( $_POST['row-7-points'] ) ) {
		update_post_meta( $post_id, 'row-7-points', sanitize_text_field($_POST['row-7-points'] ) );
	}

	if ( isset( $_POST['row-7-run-rate'] ) ) {
		update_post_meta( $post_id, 'row-7-run-rate', sanitize_text_field($_POST['row-7-run-rate'] ) );
	}

	// Row 8
	if ( isset( $_POST['row-8-team'] ) ) {
		update_post_meta( $post_id, 'row-8-team', sanitize_text_field($_POST['row-8-team'] ) );
	}

	if ( isset( $_POST['row-8-played'] ) ) {
		update_post_meta( $post_id, 'row-8-played', sanitize_text_field($_POST['row-8-played'] ) );
	}

	if ( isset( $_POST['row-8-won'] ) ) {
		update_post_meta( $post_id, 'row-8-won', sanitize_text_field($_POST['row-8-won'] ) );
	}

	if ( isset( $_POST['row-8-lost'] ) ) {
		update_post_meta( $post_id, 'row-8-lost', sanitize_text_field($_POST['row-8-lost'] ) );
	}

	if ( isset( $_POST['row-8-tie'] ) ) {
		update_post_meta( $post_id, 'row-8-tie', sanitize_text_field($_POST['row-8-tie'] ) );
	}

	if ( isset( $_POST['row-8-nr'] ) ) {
		update_post_meta( $post_id, 'row-8-nr', sanitize_text_field($_POST['row-8-nr'] ) );
	}

	if ( isset( $_POST['row-8-points'] ) ) {
		update_post_meta( $post_id, 'row-8-points', sanitize_text_field($_POST['row-8-points'] ) );
	}

	if ( isset( $_POST['row-8-run-rate'] ) ) {
		update_post_meta( $post_id, 'row-8-run-rate', sanitize_text_field($_POST['row-8-run-rate'] ) );
	}

	// Row 9
	if ( isset( $_POST['row-9-team'] ) ) {
		update_post_meta( $post_id, 'row-9-team', sanitize_text_field($_POST['row-9-team'] ) );
	}

	if ( isset( $_POST['row-9-played'] ) ) {
		update_post_meta( $post_id, 'row-9-played', sanitize_text_field($_POST['row-9-played'] ) );
	}

	if ( isset( $_POST['row-9-won'] ) ) {
		update_post_meta( $post_id, 'row-9-won', sanitize_text_field($_POST['row-9-won'] ) );
	}

	if ( isset( $_POST['row-9-lost'] ) ) {
		update_post_meta( $post_id, 'row-9-lost', sanitize_text_field($_POST['row-9-lost'] ) );
	}

	if ( isset( $_POST['row-9-tie'] ) ) {
		update_post_meta( $post_id, 'row-9-tie', sanitize_text_field($_POST['row-9-tie'] ) );
	}

	if ( isset( $_POST['row-9-nr'] ) ) {
		update_post_meta( $post_id, 'row-9-nr', sanitize_text_field($_POST['row-9-nr'] ) );
	}

	if ( isset( $_POST['row-9-points'] ) ) {
		update_post_meta( $post_id, 'row-9-points', sanitize_text_field($_POST['row-9-points'] ) );
	}

	if ( isset( $_POST['row-9-run-rate'] ) ) {
		update_post_meta( $post_id, 'row-9-run-rate', sanitize_text_field($_POST['row-9-run-rate'] ) );
	}

	// Row 10
	if ( isset( $_POST['row-10-team'] ) ) {
		update_post_meta( $post_id, 'row-10-team', sanitize_text_field($_POST['row-10-team'] ) );
	}

	if ( isset( $_POST['row-10-played'] ) ) {
		update_post_meta( $post_id, 'row-10-played', sanitize_text_field($_POST['row-10-played'] ) );
	}

	if ( isset( $_POST['row-10-won'] ) ) {
		update_post_meta( $post_id, 'row-10-won', sanitize_text_field($_POST['row-10-won'] ) );
	}

	if ( isset( $_POST['row-10-lost'] ) ) {
		update_post_meta( $post_id, 'row-10-lost', sanitize_text_field($_POST['row-10-lost'] ) );
	}

	if ( isset( $_POST['row-10-tie'] ) ) {
		update_post_meta( $post_id, 'row-10-tie', sanitize_text_field($_POST['row-10-tie'] ) );
	}

	if ( isset( $_POST['row-10-nr'] ) ) {
		update_post_meta( $post_id, 'row-10-nr', sanitize_text_field($_POST['row-10-nr'] ) );
	}

	if ( isset( $_POST['row-10-points'] ) ) {
		update_post_meta( $post_id, 'row-10-points', sanitize_text_field($_POST['row-10-points'] ) );
	}

	if ( isset( $_POST['row-10-run-rate'] ) ) {
		update_post_meta( $post_id, 'row-10-run-rate', sanitize_text_field($_POST['row-10-run-rate'] ) );
	}
}

// Creating the add action to save the data entered
add_action( 'save_post', 'league_table_meta_save' );

