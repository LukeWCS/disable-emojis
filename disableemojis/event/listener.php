<?php
/**
*
* Disable Emojis. An extension for the phpBB Forum Software package.
*
* @copyright (c) 2022, LukeWCS, https://www.wcsaga.org/
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace lukewcs\disableemojis\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class listener implements EventSubscriberInterface
{
	protected $config;
	protected $language;

	public function __construct(
		\phpbb\config\config $config,
		\phpbb\language\language $language
	)
	{
		$this->config		= $config;
		$this->language		= $language;

		$language->add_lang('info_acp_disableemojis', 'lukewcs\disableemojis');
		$this->replace_token = [
			'',
			'$1',
			'<I><s>[i]</s><B><s>[b]</s>' . $this->language->lang('DISABLEEMOJIS_MSG_REPLACE_TOKEN_HINT') . '<e>[/b]</e></B><e>[/i]</e></I>',
			'',
		];
	}

	public static function getSubscribedEvents()
	{
		return [
			'core.text_formatter_s9e_configure_after'	=> 'text_formatter_s9e_configure_after',
			'core.text_formatter_s9e_render_before'		=> 'text_formatter_s9e_render_before',
		];
	}

	public function text_formatter_s9e_configure_after($event)
	{
		if (!$this->config['disableemojis_save_emoji_token'])
		{
			$configurator = $event['configurator'];
			unset($configurator->Emoji);
		}
	}

	public function text_formatter_s9e_render_before($event)
	{
		if ($this->config['disableemojis_replace_token_mode'] == 0)
		{
			return;
		}
		$data = $event['xml'];
		$data = preg_replace('/<EMOJI.*?>(.*?)<\/EMOJI>/', $this->replace_token[$this->config['disableemojis_replace_token_mode']], $data);
		$event['xml'] = $data;
	}
}
