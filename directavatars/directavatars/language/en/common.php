<?php

if (!defined('IN_PHPBB'))
{
    exit;
}

if (empty($lang) || !is_array($lang))
{
    $lang = [];
}

$lang = array_merge($lang, [
    'DIRECT_AVATARS_EXTENSION' => 'Direct Avatars',
    'DIRECT_AVATARS_DESCRIPTION' => 'Provides direct links to avatar images for improved performance',
]);
