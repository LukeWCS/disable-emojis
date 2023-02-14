<?php
/**
*
* Disable Emojis. An extension for the phpBB Forum Software package.
*
* @copyright (c) 2023, LukeWCS, https://www.wcsaga.org/
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace lukewcs\disableemojis\controller;

class acp_disableemojis_controller
{
	protected $language;
	protected $template;
	protected $request;
	protected $config;
	protected $cache;
	protected $ext_manager;
	public $u_action;

	public function __construct(
		\phpbb\language\language $language,
		\phpbb\template\template $template,
		\phpbb\request\request $request,
		\phpbb\config\config $config,
		\phpbb\cache\driver\driver_interface $cache,
		\phpbb\extension\manager $ext_manager
	)
	{
		$this->language		= $language;
		$this->template		= $template;
		$this->request		= $request;
		$this->config		= $config;
		$this->cache		= $cache;
		$this->ext_manager	= $ext_manager;
	}

	public function module_settings()
	{
		$this->language->add_lang(['acp_disableemojis'], 'lukewcs/disableemojis');

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

		add_form_key('disableemojis');

		$md_manager = $this->ext_manager->create_extension_metadata_manager('lukewcs/disableemojis');
		$this_meta = $md_manager->get_metadata('all');

		$ext_display_name	= $this_meta['extra']['display-name'];
		$ext_ver			= $this_meta['version'];

		$this->template->assign_vars([
			'DISABLEEMOJIS_EXT_NAME'			=> $ext_display_name,
			'DISABLEEMOJIS_EXT_VER'				=> $ext_ver,
			'DISABLEEMOJIS_SAVE_EMOJI_TOKEN'	=> $this->config['disableemojis_save_emoji_token'],
			'DISABLEEMOJIS_REPLACE_TOKEN_MODE'	=> $this->config['disableemojis_replace_token_mode'],
			'U_ACTION'							=> $this->u_action,
		]);
	}

	public function set_page_url($u_action): void
	{
		$this->u_action = $u_action;
	}
}
