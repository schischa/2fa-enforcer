# 2FA Enforcer

**Requires:** WordPress + the official Two-Factor plugin  
**Version:** 1.0.1  
**Author:** Marc Chiroiu  
**License:** GPL2+

## Description

2FA Enforcer adds mandatory Two-Factor Authentication (2FA) for admin-level users in WordPress.  
Instead of checking for a role (which WordPress does not support reliably), the plugin uses the capability **manage_options**, which is only available to administrators in a default WordPress installation.

This makes the enforcement more accurate, more flexible and better suited for installations that use custom roles or role editors.

The plugin requires the official Two-Factor plugin and will show an admin notice if it is not active.

## Features

- Forces 2FA for users with the `manage_options` capability (typically administrators).
- Blocks login for admin-level users without 2FA configured.
- Gracefully handles missing dependencies.
- Lightweight and focused on a single task.
- Ready for future role-based policy extensions.

## Planned Features

- Role-based 2FA selection
- Grace period options
- Per-role provider restrictions
- Settings UI

## Notes

- Admin users without 2FA configured will be unable to log in, which is intentional.
- The plugin does not affect users below admin level unless you later change the capability check.

## Installation

1. Install and activate the official **Two-Factor** plugin.
2. Upload the `2fa-enforcer` folder to `/wp-content/plugins/`.
3. Activate *2FA Enforcer* inside the WordPress admin.

The plugin will start enforcing 2FA immediately.
