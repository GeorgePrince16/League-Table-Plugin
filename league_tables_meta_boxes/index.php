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

function wpb_add_custom_meta_boxes() {
	add_meta_box(
		'league_table',
		'League Table',
		'league_table_callback',
		'page'
	);
}


add_action ( 'add_meta_boxes', 'wpb_add_custom_meta_boxes' );

function league_table_callback() {
	?>

			<div class="meta-row">
				<div class="meta-labels">
					<table>
						<tr>
							<td><input id="row-1-team" name="row-1-team" placeholder="Team Name" type="text" maxlength="20" size="25"></td>
			                <td><input id="row-1-played" name="row-1-played" placeholder="P" type="text" size="2"></td>
			                <td><input id="row-1-won" name="row-1-won" placeholder="W" type="text" size="2"></td>
			                <td><input id="row-1-lost" name="row-1-lost" placeholder="L" type="text" size="2"></td>
			                <td><input id="row-1-tie" name="row-1-tie" placeholder="T" type="text" size="2"></td>
			                <td><input id="row-1-nr" name="row-1-nr" placeholder="NR" type="text" size="2"></td>
			                <td><input id="row-1-void" name="row-1-void" placeholder="V" type="text" size="2"></td>
			                <td><input id="row-1-points" name="row-1-points" placeholder="PTS" type="text" size="2"></td>
			            </tr>
			            <tr>
							<td><input id="row-2-team" name="row-2-team" placeholder="Team Name" type="text" maxlength="20" size="25"></td>
			                <td><input id="row-2-played" name="row-2-played" placeholder="P" type="text" size="2"></td>
			                <td><input id="row-2-won" name="row-2-won" placeholder="W" type="text" size="2"></td>
			                <td><input id="row-2-lost" name="row-2-lost" placeholder="L" type="text" size="2"></td>
			                <td><input id="row-2-tie" name="row-2-tie" placeholder="T" type="text" size="2"></td>
			                <td><input id="row-2-nr" name="row-2-nr" placeholder="NR" type="text" size="2"></td>
			                <td><input id="row-2-void" name="row-2-void" placeholder="V" type="text" size="2"></td>
			                <td><input id="row-2-points" name="row-2-points" placeholder="PTS" type="text" size="2"></td>
			            </tr>
			            <tr>
							<td><input id="row-3-team" name="row-3-team" placeholder="Team Name" type="text" maxlength="20" size="25"></td>
			                <td><input id="row-3-played" name="row-3-played" placeholder="P" type="text" size="2"></td>
			                <td><input id="row-3-won" name="row-3-won" placeholder="W" type="text" size="2"></td>
			                <td><input id="row-3-lost" name="row-3-lost" placeholder="L" type="text" size="2"></td>
			                <td><input id="row-3-tie" name="row-3-tie" placeholder="T" type="text" size="2"></td>
			                <td><input id="row-3-nr" name="row-3-nr" placeholder="NR" type="text" size="2"></td>
			                <td><input id="row-3-void" name="row-3-void" placeholder="V" type="text" size="2"></td>
			                <td><input id="row-3-points" name="row-3-points" placeholder="PTS" type="text" size="2"></td>
			            </tr>
			            <tr>
							<td><input id="row-4-team" name="row-4-team" placeholder="Team Name" type="text" maxlength="20" size="25"></td>
			                <td><input id="row-4-played" name="row-4-played" placeholder="P" type="text" size="2"></td>
			                <td><input id="row-4-won" name="row-4-won" placeholder="W" type="text" size="2"></td>
			                <td><input id="row-4-lost" name="row-4-lost" placeholder="L" type="text" size="2"></td>
			                <td><input id="row-4-tie" name="row-4-tie" placeholder="T" type="text" size="2"></td>
			                <td><input id="row-4-nr" name="row-4-nr" placeholder="NR" type="text" size="2"></td>
			                <td><input id="row-4-void" name="row-4-void" placeholder="V" type="text" size="2"></td>
			                <td><input id="row-4-points" name="row-4-points" placeholder="PTS" type="text" size="2"></td>
			            </tr>
			            <tr>
							<td><input id="row-5-team" name="row-5-team" placeholder="Team Name" type="text" maxlength="20" size="25"></td>
			                <td><input id="row-5-played" name="row-5-played" placeholder="P" type="text" size="2"></td>
			                <td><input id="row-5-won" name="row-5-won" placeholder="W" type="text" size="2"></td>
			                <td><input id="row-5-lost" name="row-5-lost" placeholder="L" type="text" size="2"></td>
			                <td><input id="row-5-tie" name="row-5-tie" placeholder="T" type="text" size="2"></td>
			                <td><input id="row-5-nr" name="row-5-nr" placeholder="NR" type="text" size="2"></td>
			                <td><input id="row-5-void" name="row-5-void" placeholder="V" type="text" size="2"></td>
			                <td><input id="row-5-points" name="row-5-points" placeholder="PTS" type="text" size="2"></td>
			            </tr>
			            <tr>
							<td><input id="row-6-team" name="row-6-team" placeholder="Team Name" type="text" maxlength="20" size="25"></td>
			                <td><input id="row-6-played" name="row-6-played" placeholder="P" type="text" size="2"></td>
			                <td><input id="row-6-won" name="row-6-won" placeholder="W" type="text" size="2"></td>
			                <td><input id="row-6-lost" name="row-6-lost" placeholder="L" type="text" size="2"></td>
			                <td><input id="row-6-tie" name="row-6-tie" placeholder="T" type="text" size="2"></td>
			                <td><input id="row-6-nr" name="row-6-nr" placeholder="NR" type="text" size="2"></td>
			                <td><input id="row-6-void" name="row-6-void" placeholder="V" type="text" size="2"></td>
			                <td><input id="row-6-points" name="row-6-points" placeholder="PTS" type="text" size="2"></td>
			            </tr>
			            <tr>
							<td><input id="row-7-team" name="row-7-team" placeholder="Team Name" type="text" maxlength="20" size="25"></td>
			                <td><input id="row-7-played" name="row-7-played" placeholder="P" type="text" size="2"></td>
			                <td><input id="row-7-won" name="row-7-won" placeholder="W" type="text" size="2"></td>
			                <td><input id="row-7-lost" name="row-7-lost" placeholder="L" type="text" size="2"></td>
			                <td><input id="row-7-tie" name="row-7-tie" placeholder="T" type="text" size="2"></td>
			                <td><input id="row-7-nr" name="row-7-nr" placeholder="NR" type="text" size="2"></td>
			                <td><input id="row-7-void" name="row-7-void" placeholder="V" type="text" size="2"></td>
			                <td><input id="row-7-points" name="row-7-points" placeholder="PTS" type="text" size="2"></td>
			            </tr>
			            <tr>
							<td><input id="row-8-team" name="row-8-team" placeholder="Team Name" type="text" maxlength="20" size="25"></td>
			                <td><input id="row-8-played" name="row-8-played" placeholder="P" type="text" size="2"></td>
			                <td><input id="row-8-won" name="row-8-won" placeholder="W" type="text" size="2"></td>
			                <td><input id="row-8-lost" name="row-8-lost" placeholder="L" type="text" size="2"></td>
			                <td><input id="row-8-tie" name="row-8-tie" placeholder="T" type="text" size="2"></td>
			                <td><input id="row-8-nr" name="row-8-nr" placeholder="NR" type="text" size="2"></td>
			                <td><input id="row-8-void" name="row-8-void" placeholder="V" type="text" size="2"></td>
			                <td><input id="row-8-points" name="row-8-points" placeholder="PTS" type="text" size="2"></td>
			            </tr>
			            <tr>
							<td><input id="row-9-team" name="row-9-team" placeholder="Team Name" type="text" maxlength="20" size="25"></td>
			                <td><input id="row-9-played" name="row-9-played" placeholder="P" type="text" size="2"></td>
			                <td><input id="row-9-won" name="row-9-won" placeholder="W" type="text" size="2"></td>
			                <td><input id="row-9-lost" name="row-9-lost" placeholder="L" type="text" size="2"></td>
			                <td><input id="row-9-tie" name="row-9-tie" placeholder="T" type="text" size="2"></td>
			                <td><input id="row-9-nr" name="row-9-nr" placeholder="NR" type="text" size="2"></td>
			                <td><input id="row-9-void" name="row-9-void" placeholder="V" type="text" size="2"></td>
			                <td><input id="row-9-points" name="row-9-points" placeholder="PTS" type="text" size="2"></td>
			            </tr>
			            <tr>
							<td><input id="row-10-team" name="row-10-team" placeholder="Team Name" type="text" maxlength="20" size="25"></td>
			                <td><input id="row-10-played" name="row-10-played" placeholder="P" type="text" size="2"></td>
			                <td><input id="row-10-won" name="row-10-won" placeholder="W" type="text" size="2"></td>
			                <td><input id="row-10-lost" name="row-10-lost" placeholder="L" type="text" size="2"></td>
			                <td><input id="row-10-tie" name="row-10-tie" placeholder="T" type="text" size="2"></td>
			                <td><input id="row-10-nr" name="row-10-nr" placeholder="NR" type="text" size="2"></td>
			                <td><input id="row-10-void" name="row-10-void" placeholder="V" type="text" size="2"></td>
			                <td><input id="row-10-points" name="row-10-points" placeholder="PTS" type="text" size="2"></td>
			            </tr>
			        </table>
				</div>

	<?php
}
