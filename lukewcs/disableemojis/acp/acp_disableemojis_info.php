<?php
/**
*
* Disable Emojis. An extension for the phpBB Forum Software package.
*
* @copyright (c) 2023, LukeWCS, https://www.wcsaga.org/
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace lukewcs\disableemojis\acp;

class acp_disableemojis_info
{
	function module()
	{
		return [
			'filename'	=> '\lukewcs\disableemojis\acp\acp_disableemojis_module',
			'title'		=> 'DISABLEEMOJIS_NAV_TITLE',
			'modes'		=> [
				'settings'	=> [
					'title'	=> 'DISABLEEMOJIS_NAV_CONFIG',
					'auth'	=> 'ext_lukewcs/disableemojis && acl_a_board',
					'cat'	=> ['DISABLEEMOJIS_NAV_TITLE'],
				],
			],
		];
	}
}
