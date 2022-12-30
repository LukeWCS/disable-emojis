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
	'DISABLEEMOJIS_CONFIG_TITLE'				=> 'Emojis deaktivieren',
	'DISABLEEMOJIS_CONFIG_DESC'					=> 'Hier können Sie die Einstellungen für die Erweiterung <strong>%s</strong> ändern.',

	'DISABLEEMOJIS_SETTINGS_TITLE'				=> 'Einstellungen',

	'DISABLEEMOJIS_SAVE_EMOJI_TOKEN'			=> 'Emoji Token in Datenbank schreiben',
	'DISABLEEMOJIS_SAVE_EMOJI_TOKEN_EXP'		=> 'Legt fest, ob beim Anlegen eines neuen Beitrags oder beim Ändern eines bestehenden Beitrags das Emoji Token in die Datenbank geschrieben werden soll. Das Token ist dafür verantwortlich, dass beim Laden eines Beitrags aus der Datenbank ein Emoji erkannt wird und bei der Anzeige dann von einer externen Quelle eingebunden wird. Eine Änderung dieses Schalters erfordert die Löschung des Caches, das geschieht automatisch.<br><strong>Hinweis: Wer Emojis zu einem späteren Zeitpunkt wieder erlauben will, sollte diesen Schalter aktiviert lassen.</strong>',

	'DISABLEEMOJIS_REPLACE_TOKEN_TYPE'			=> 'Behandlung eines Emoji in bestehenden Beiträgen',
	'DISABLEEMOJIS_REPLACE_TOKEN_TYPE_EXP'		=> 'Hier kann ausgewählt werden, was mit Emojis in bereits vorhandenen Beiträgen geschehen soll. Der Emoji Code ist eine Sequenz aus einem oder mehreren Zeichen, mit der ein Emoji in einem Beitrag eingefügt wird. Das Emoji Token dagegen, ist nur in der Datenbank sichtbar und dient phpBB als Erkennungsmerkmal.<br><strong>Hinweis: Der Schalter hat keinen Einfluss auf die Datenbank, nur auf die Anzeige.</strong>',

	'DISABLEEMOJIS_REPLACE_TOKEN_DO_NOTHING'	=> 'Nichts ändern',
	'DISABLEEMOJIS_REPLACE_TOKEN_KEEP_CODE'		=> 'Emoji Code belassen, aber Token entfernen.',
	'DISABLEEMOJIS_REPLACE_TOKEN_SHOW_HINT'		=> 'Alles entfernen und Hinweis anzeigen',

	'DISABLEEMOJIS_MSG_SAVED_SETTINGS'			=> 'Emojis deaktivieren: Einstellungen erfolgreich gespeichert.',
]);
