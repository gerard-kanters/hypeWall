<?php

$entity = elgg_extract('entity', $vars);
$user = elgg_get_page_owner_entity();

echo '<div>';
echo '<label>' . elgg_echo('wall:usersettings:river_access_id') . '</label>';
echo '<div class="elgg-text-help">' . elgg_echo('wall:usersettings:river_access_id:help') . '</div>';

$user_write_access = get_write_access_array();
unset($user_write_access[ACCESS_PUBLIC]);
unset($user_write_access[ACCESS_LOGGED_IN]);

echo elgg_view('input/access', array(
	'name' => 'params[river_access_id]',
	'value' => elgg_get_plugin_user_setting('river_access_id', $user->guid, 'hypeWall'),
	'options_values' => $user_write_access,
));
echo '</div>';

if (hypeWall()->config->third_party_wall) {
	echo '<div>';
	echo '<label>' . elgg_echo('wall:usersettings:third_party_wall') . '</label>';
	echo elgg_view('input/access', array(
		'name' => 'params[third_party_wall]',
		'value' => elgg_get_plugin_user_setting('third_party_wall', $user->guid, 'hypeWall'),
		'options_values' => array(
			0 => elgg_echo('option:no'),
			1 => elgg_echo('option:yes'),
		)
	));
	echo '</div>';
}