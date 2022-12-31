<?php
/**
*
* Disable Emojis. An extension for the phpBB Forum Software package.
*
* @copyright (c) 2022, LukeWCS, https://www.wcsaga.org/
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = [];
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
//
// Some characters you may want to copy&paste:
// ’ « » “ ” … „ “
//
$lang = array_merge($lang, [
	'DISABLEEMOJIS_CONFIG_TITLE'				=> 'Disable Emojis',
	'DISABLEEMOJIS_CONFIG_DESC'					=> 'Here you can change the settings for the <strong>%s</strong> extension.',

	'DISABLEEMOJIS_SETTINGS_TITLE'				=> 'Settings',

	'DISABLEEMOJIS_SAVE_EMOJI_TOKEN'			=> 'Write emoji tokens to database',
	'DISABLEEMOJIS_SAVE_EMOJI_TOKEN_EXP'		=> 'Determines whether the emoji token should be written to the database when creating a new post or changing an existing post. The token is responsible for recognizing an emoji when loading a contribution from the database and then integrating it from an external source when it is displayed. Changing this switch requires clearing the cache, which happens automatically.<br><strong>Note: If you only want to deactivate emojis temporarily, you should leave this switch activated.</strong>',

	'DISABLEEMOJIS_REPLACE_TOKEN_MODE'			=> 'Handling emojis in existing posts',
	'DISABLEEMOJIS_REPLACE_TOKEN_MODE_EXP'		=> 'Here you can choose what to do with emojis in existing posts. The emoji code is a sequence of one or more characters used to insert an emoji into a post. The emoji token, on the other hand, is only visible in the database and serves as an identifier for phpBB.<br><strong>Note: The switch has no effect on the database, only on the display.</strong>',
	'DISABLEEMOJIS_REPLACE_TOKEN_DO_NOTHING'	=> 'Change nothing',
	'DISABLEEMOJIS_REPLACE_TOKEN_KEEP_CODE'		=> 'Leave the emoji code but remove the token',
	'DISABLEEMOJIS_REPLACE_TOKEN_SHOW_HINT'		=> 'Remove everything and show hint',

	'DISABLEEMOJIS_MSG_SAVED_SETTINGS'			=> 'Disable emojis: Settings saved successfully.',
]);
