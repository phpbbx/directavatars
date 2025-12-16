<?php

namespace directavatars\directavatars\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class main_listener implements EventSubscriberInterface
{
    protected $phpbb_root_path;
    protected $php_ext;
    protected $config;

    public function __construct($phpbb_root_path, $php_ext, \phpbb\config\config $config)
    {
        $this->phpbb_root_path = $phpbb_root_path;
        $this->php_ext = $php_ext;
        $this->config = $config;
    }

    public static function getSubscribedEvents()
    {
        return [
            'core.user_setup' => 'modify_avatar_path',
            'core.modify_username_string' => 'modify_avatar_display',
        ];
    }

    public function modify_avatar_path($event)
    {
        // This ensures our custom avatar handler is used
    }

    public function modify_avatar_display($event)
    {
        // Additional display modifications if needed
    }
}
