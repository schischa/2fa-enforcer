# 2FA Enforcer

**Requires:** WordPress + the official [Two-Factor](https://wordpress.org/plugins/two-factor/) plugin  
**Version:** 1.0.0  
**Author:** Marc Chiroiu  
**License:** GPL2+

## Description

2FA Enforcer adds mandatory Two-Factor Authentication (2FA) enforcement for WordPress administrator users.

This plugin does not add any 2FA methods itself — it relies on the official **Two-Factor** plugin. If the Two-Factor plugin is not active, a clear admin notice will be displayed.

## Features

- Requires administrator users to have 2FA enabled.
- Blocks login for admins who do not have 2FA configured.
- Gracefully handles missing dependencies (no fatal errors).
- No settings required — activates and works immediately.
- Clean foundation prepared for future role-based enforcement options.

## Planned Features

- Role-based 2FA policy configuration
- Optional grace periods
- More granular enforcement rules
- UI for selecting which roles must use 2FA

## Notes

- If an administrator does not have 2FA configured at the time this plugin is activated, they will be unable to log in. This is intentional behavior.
- Other user roles are not affected.

## Installation

1. Install and activate the **Two-Factor** plugin.
2. Upload the `2fa-enforcer` folder to `/wp-content/plugins/`.
3. Activate *2FA Enforcer* in **Plugins → Installed Plugins**.

The plugin works immediately — no configuration needed.
