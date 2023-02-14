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

class acp_disableemojis_module
{
	public $page_title;
	public $tpl_name;
	public $u_action;

	public function main($id, $mode)
	{
		global $phpbb_container;

		$language = $phpbb_container->get('language');

		$this->page_title = $language->lang('DISABLEEMOJIS_NAV_TITLE') . ' - ' . $language->lang('DISABLEEMOJIS_NAV_CONFIG');
		$acp_controller = $phpbb_container->get('lukewcs.disableemojis.controller.acp');

		$this->tpl_name = 'acp_disableemojis_settings';
		$acp_controller->set_page_url($this->u_action);
		$acp_controller->module_settings();
	}
}
