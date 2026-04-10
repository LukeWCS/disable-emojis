<?php
/**
*
* Disable Emojis. An extension for the phpBB Forum Software package.
*
* @copyright (c) 2023, LukeWCS, https://www.wcsaga.org/
* @license GNU General Public License, version 2 (GPL-2.0)
*
*/

namespace lukewcs\disableemojis\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class listener implements EventSubscriberInterface
{
	public function __construct(
		protected \phpbb\config\config $config,
		protected \phpbb\language\language $language,
	)
	{
		$language->add_lang('s9e_disableemojis', 'lukewcs/disableemojis');
		$this->replace_token = [
			'',
			'$1',
			'<I><s>[i]</s><B><s>[b]</s>' . $this->language->lang('DISABLEEMOJIS_MSG_REPLACE_TOKEN_HINT') . '<e>[/b]</e></B><e>[/i]</e></I>',
		];
	}

	public static function getSubscribedEvents(): array
	{
		return [
			'core.text_formatter_s9e_configure_after'	=> 'text_formatter_s9e_configure_after',
			'core.text_formatter_s9e_render_before'		=> 'text_formatter_s9e_render_before',
		];
	}

	public function text_formatter_s9e_configure_after($event): void
	{
		if (!$this->config['disableemojis_save_emoji_token'])
		{
			$configurator = $event['configurator'];
			unset($configurator->Emoji);
		}
	}

	public function text_formatter_s9e_render_before($event): void
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
