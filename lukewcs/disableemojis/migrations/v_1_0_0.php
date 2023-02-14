<?php
/**
*
* Disable Emojis. An extension for the phpBB Forum Software package.
*
* @copyright (c) 2023, LukeWCS, https://www.wcsaga.org/
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace lukewcs\disableemojis\migrations;

class v_1_0_0 extends \phpbb\db\migration\migration
{
	public static function depends_on()
	{
		return ['\phpbb\db\migration\data\v32x\v3210'];
	}

	public function update_data()
	{
		return [
			['config.add', ['disableemojis_save_emoji_token', 1]],
			['config.add', ['disableemojis_replace_token_mode', 0]],
			['module.add', [
				'acp',
				'ACP_CAT_DOT_MODS',
				'DISABLEEMOJIS_NAV_TITLE'
			]],
			['module.add', [
				'acp',
				'DISABLEEMOJIS_NAV_TITLE', [
					'module_basename'	=> '\lukewcs\disableemojis\acp\acp_disableemojis_module',
					'module_langname'	=> 'DISABLEEMOJIS_NAV_CONFIG',
					'module_mode'		=> 'overview',
					'module_auth'		=> 'ext_lukewcs/disableemojis && acl_a_board',
				],
			]],
		];
	}
}
