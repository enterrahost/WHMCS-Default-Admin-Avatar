/*
|--------------------------------------------------------------------------
| WHMCS Admin Area Avatar Customization Hook
|--------------------------------------------------------------------------
| This is for WHMCS and has been tested on version 8.12.x
|
| This hook replaces the default Gravatar avatar in the admin area.
| If a user does not have an avatar set, the default "mystery person"
| avatar from Gravatar is replaced with a custom avatar.
| 
| Place this in /included/hooks/
|
| You can use this logic to replace Gravatar avatars with your own custom
| avatar or implement other avatar-related customizations in the admin panel.
|
| — Enterrahost
*/

<?php

add_hook('AdminAreaHeaderOutput', 1, function($vars) {
    $customDefault = 'https://URL/templates/TEMPLATENAME/img/avatar.png'; // Replace URL with your site address and TEMPLATENAME with your template name and avatar.png with your preferred avatar image file.
    return <<<HTML
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll("img[src*='gravatar.com']").forEach(img => {
                if (img.src.includes("d=mp")) {
                    img.src = img.src.replace("d=mp", "d=" + encodeURIComponent("{$customDefault}"));
                }
            });
        });
    </script>
HTML;
});
