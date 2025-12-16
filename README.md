# PHPBB Direct Avatars Extension

A lightweight PHPBB extension that provides direct links to avatar images, eliminating the need for PHP script processing and reducing server load.

## Features

- **Direct Image URLs**: Serves avatars as static files (e.g., `/images/avatars/upload/avatar_123.gif`) instead of through PHP scripts
- **Improved Performance**: Reduces database queries and server processing
- **Browser Caching**: Enables long-term caching for avatar images
- **Lazy Loading**: Implements lazy loading for better page performance
- **No Configuration Needed**: Works out of the box with default PHPBB avatar settings

## Installation

1. Copy the `direct-avatars` folder to `phpbb/ext/directavatars/`
2. Navigate to your PHPBB Admin Control Panel (ACP)
3. Go to "Customise" → "Manage extensions"
4. Find "Direct Avatars" and click "Enable"
5. Ensure your web server has read access to the avatar directory

## Web Server Configuration

### Apache
The extension includes an `.htaccess` file that:
- Allows direct access to avatar image files
- Enables browser caching (1 month)
- Sets proper cache headers

### Nginx
Add this to your server configuration:

```nginx
location ~* ^/images/avatars/.*\.(gif|jpg|jpeg|png)$ {
    expires 30d;
    add_header Cache-Control "public, immutable";
    access_log off;
}
```

## How It Works

1. Replaces the default avatar driver with a direct URL generator
2. Avatars are served as static files directly by the web server
3. Bypasses `download/file.php` for avatar requests
4. Reduces database queries per page load

## Performance Benefits

- **Reduced Server Load**: No PHP processing for avatar images
- **Faster Page Loads**: Static files served directly by web server
- **Better Caching**: Long-term browser caching reduces bandwidth
- **CDN Ready**: Direct URLs work seamlessly with CDNs

## Compatibility

- PHPBB 3.2.x and later
- PHP 7.1 or higher
- Works with uploaded avatars

## File Structure

```
direct-avatars/
├── composer.json
├── ext.php
├── config/
│   └── services.yml
├── event/
│   └── main_listener.php
├── avatar/
│   └── driver/
│       └── direct.php
├── language/
│   └── en/
│       └── common.php
└── .htaccess
```

## Troubleshooting

**Avatars not displaying:**
- Check that the avatar directory has proper read permissions
- Verify web server configuration allows direct file access
- Clear PHPBB cache in ACP

**404 errors on avatar URLs:**
- Ensure `.htaccess` is in the avatar directory
- Check that mod_rewrite is enabled (Apache)
- Verify file paths match your avatar storage location

## License

GPL-2.0-only (compatible with PHPBB)
