<?php
/**
*
* Stats Permissions. An extension for the phpBB Forum Software package.
*
* @copyright (c) 2019, LukeWCS, https://www.wcsaga.org/
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace lukewcs\disableemojis\acp;

class acp_disableemojis_module
{
	protected $config;
	protected $request;
	protected $template;
	protected $language;
	protected $cache;
	protected $md_manager;

	public function main()
	{
		global $config, $request, $template, $language, $cache, $phpbb_container;

		$this->config = $config;
		$this->request = $request;
		$this->template = $template;
		$this->language = $language;
		$this->cache = $cache;
		$this->md_manager = $phpbb_container->get('ext.manager')->create_extension_metadata_manager('lukewcs/disableemojis');
		$this_meta = $this->md_manager->get_metadata('all');

		$this->language->add_lang(['acp_disableemojis'], 'lukewcs/disableemojis');

		$ext_display_name	= $this_meta['extra']['display-name'];
		$ext_ver			= $this_meta['version'];

		$this->tpl_name = 'acp_disableemojis';
		$this->page_title = $this->language->lang('DISABLEEMOJIS_NAV_TITLE') . ' - ' . $this->language->lang('DISABLEEMOJIS_NAV_CONFIG');

		add_form_key('disableemojis');

		if ($this->request->is_set_post('submit'))
		{
			if (!check_form_key('disableemojis'))
			{
				trigger_error($this->language->lang('FORM_INVALID') . adm_back_link($this->u_action), E_USER_WARNING);
			}
			$delete_cache = ($this->request->variable('disableemojis_save_emoji_token', 0) != $this->config['disableemojis_save_emoji_token']);
			$this->config->set('disableemojis_save_emoji_token'		, $this->request->variable('disableemojis_save_emoji_token', 0));
			$this->config->set('disableemojis_replace_token_mode'	, $this->request->variable('disableemojis_replace_token_mode', 0));
			if ($delete_cache)
			{
				$this->cache->purge();
			}
			trigger_error($this->language->lang('DISABLEEMOJIS_MSG_SAVED_SETTINGS') . adm_back_link($this->u_action));
		}

		$this->template->assign_vars([
			'DISABLEEMOJIS_EXT_NAME'			=> $ext_display_name,
			'DISABLEEMOJIS_EXT_VER'				=> $ext_ver,
			'DISABLEEMOJIS_SAVE_EMOJI_TOKEN'	=> $this->config['disableemojis_save_emoji_token'],
			'DISABLEEMOJIS_REPLACE_TOKEN_MODE'	=> $this->config['disableemojis_replace_token_mode'],
			'U_ACTION'							=> $this->u_action,
		]);
	}
}
