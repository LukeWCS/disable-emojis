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
	protected object $language;
	protected object $template;
	protected object $request;
	protected object $config;
	protected object $cache;
	protected object $ext_manager;

	public    string $u_action;
	protected array  $metadata;

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

		$this->metadata		= $this->ext_manager->create_extension_metadata_manager('lukewcs/disableemojis')->get_metadata('all');
	}

	public function module_settings()
	{
		$this->language->add_lang(['acp_disableemojis'], 'lukewcs/disableemojis');
		$this->set_meta_template_vars('DISABLEEMOJIS', 'LukeWCS');

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
			'DISABLEEMOJIS_SAVE_EMOJI_TOKEN'				=> $this->config['disableemojis_save_emoji_token'],
			'DISABLEEMOJIS_REPLACE_TOKEN_MODE_OPTIONS'		=> $this->select_struct($this->config['disableemojis_replace_token_mode'], [
				'DISABLEEMOJIS_REPLACE_TOKEN_DO_NOTHING' 	=> '0',
				'DISABLEEMOJIS_REPLACE_TOKEN_KEEP_CODE' 	=> '1',
				'DISABLEEMOJIS_REPLACE_TOKEN_SHOW_HINT' 	=> '2',
			]),
			'U_ACTION'										=> $this->u_action,
		]);

		add_form_key('disableemojis');
	}

	public function set_page_url($u_action): void
	{
		$this->u_action = $u_action;
	}

	private function set_meta_template_vars(string $tpl_prefix, string $copyright): void
	{
		$template_vars = [
			'ext_name'		=> $this->metadata['extra']['display-name'],
			'ext_ver'		=> $this->language->lang($tpl_prefix . '_VERSION_STRING', $this->metadata['version']),
			'ext_copyright'	=> $copyright,
			'class'			=> strtolower($tpl_prefix) . '_footer',
		];
		$template_vars += $this->language->is_set($tpl_prefix . '_LANG_VER') ? [
			'lang_desc'		=> $this->language->lang($tpl_prefix . '_LANG_DESC'),
			'lang_ver'		=> $this->language->lang($tpl_prefix . '_VERSION_STRING', $this->language->lang($tpl_prefix . '_LANG_VER')),
			'lang_author'	=> $this->language->lang($tpl_prefix . '_LANG_AUTHOR'),
		] : [];

		$this->template->assign_vars([$tpl_prefix . '_METADATA' => $template_vars]);
	}

	private function select_struct($cfg_value, array $options): array
	{
		$options_tpl = [];

		foreach ($options as $opt_key => $opt_value)
		{
			if (!is_array($opt_value))
			{
				$opt_value = [$opt_value];
			}
			$options_tpl[] = [
				'label'		=> $opt_key,
				'value'		=> $opt_value[0],
				'bold'		=> $opt_value[1] ?? false,
				'selected'	=> is_array($cfg_value) ? in_array($opt_value[0], $cfg_value) : $opt_value[0] == $cfg_value,
			];
		}

		return $options_tpl;
	}
}
