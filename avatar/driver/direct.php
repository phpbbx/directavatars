<?php

namespace directavatars\directavatars\avatar\driver;

class direct extends \phpbb\avatar\driver\upload
{
    /**
     * {@inheritdoc}
     */
    public function get_data($row)
    {
        return [
            'src' => $this->get_avatar_url($row),
            'width' => $row['avatar_width'],
            'height' => $row['avatar_height'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function get_custom_html($user, $row, $alt = '')
    {
        $avatar_url = $this->get_avatar_url($row);

        return '<img class="avatar" src="' . $avatar_url . '" width="' . $row['avatar_width'] . '" height="' . $row['avatar_height'] . '" alt="' . $alt . '" loading="lazy" />';
    }

    /**
     * Get direct avatar URL
     */
    protected function get_avatar_url($row)
    {
        if (empty($row['avatar']))
        {
            return '';
        }

        // Extract user ID and extension from avatar filename
        // Typical format: {hash}_{user_id}.{ext}
        $avatar = $row['avatar'];

        // If avatar is stored with full path, extract filename
        if (strpos($avatar, '/') !== false)
        {
            $avatar = basename($avatar);
        }

        // Generate direct URL: /images/avatars/upload/{avatar}
        $board_url = generate_board_url();
        $avatar_url = $board_url . '/' . $this->config['avatar_path'] . '/' . $avatar;

        return $avatar_url;
    }

    /**
     * {@inheritdoc}
     */
    public function prepare_form($request, $template, $user, $row, &$error)
    {
        return parent::prepare_form($request, $template, $user, $row, $error);
    }
}
