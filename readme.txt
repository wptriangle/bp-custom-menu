=== Custom Profile Menu for BuddyPress ===
Contributors: nfmohit
Donate link: https://www.patreon.com/nfmohit
Tags: buddypress, profile, custom, menu, wordpress
Requires at least: 4.0
Tested up to: 5.5
Stable tag: 1.0.3
Requires PHP: 5.6
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Create custom BuddyPress profile menu pages, gracefully.

== Description ==

Ever wished you could add custom pages to the BuddyPress profile menu? Here's a plugin for that. Simply install and activate the plugin, add your custom menu page(s). That's it, Bingo!

The **Custom Profile Menu for BuddyPress** plugin lets you add custom *static* pages to the BuddyPress profile menu. Extend the extremely limited BuddyPress profile menu by adding your desired number of custom pages to it, with your desired content along with the built-in *Home*, *Activity*, *Profile*, *Notifications*, and *Settings* items.

### Use Cases
The major use case of this plugin would be adding custom sections to the BuddyPress profile, e.g. a *terms & conditions page* or static pages with *shortcodes for forms, appointment bookings, WooCommerce products, and other infinite possibilities*.

### Core Features
The core features of the plugin include the abilities to:
* Add custom static pages to the BuddyPress profile menu
* Add submenu pages by assigning a parent menu page
* Set a default submenu page for a parent submenu page
* Re-order the menu items.

### Installation
Installation of the **Custom Profile Menu for BuddyPress** plugin is very simple. Follow along with the installation procedure in the dedicated [**Installation** tab](#installation).

### Usage
1. [Install](#installation) and activate the plugin
2. Go to your *WordPress Dashboard→BP Custom Menu*
3. Add a new page, enter your content, and publish. It will automatically show up as a menu item in the BuddyPress profile.
4. In order to create a **submenu page**, please specify a **"Parent"** under the **"Menu Page Options"** in the right sidebar of the edit screen.
5. In order to specify a **default submenu** for a parent page, select a submenu page in the **"Set Default Submenu"** selection under the **"Menu Page Options"** in the right sidebar of the edit screen.
6. In order to re-order the menu items, enter an index in the **"Order"** field under the **"Menu Page Options"** in the right sidebar of the edit screen. A higher index means a higher level in the menu.

### Support
If the above usage steps don't answer your question(s), if you want to report an issue or if something is not working as expected, please create a topic in the [Support Forum](https://wordpress.org/support/plugin/bp-custom-menu/).

### Contribute
If you want to contribute to the plugin by reporting issues, implementing new features and so on, [here's its development repository on Github](https://github.com/nfmohit-wpmudev/bp-custom-menu).

### Sponsor
You can sponsor this project and support my open-source development by [becoming a Patron](https://www.patreon.com/nfmohit)!

== Installation ==

### Requirements
This plugin requires the [BuddyPress plugin](https://wordpress.org/plugins/buddypress/) to be installed and activated to work.

### Install
#### Automatic Installation
1. Go to your *WordPress Dashboard→Plugins→Add New*.
2. Search for **"Custom Profile Menu for BuddyPress"**.
3. Click on **"Install"**.
4. Once installed, click on **"Activate"**.

#### Manual Installation
1. Download the plugin *.zip* folder using the download button on this page.
2. Go to your *WordPress Dashboard→Plugins→Add New*.
3. Click on the **"Upload Plugin"** button.
4. Upload the downloaded *.zip* file.
5. Activate it.

### Usage
1. [Install](#installation) and activate the plugin
2. Go to your *WordPress Dashboard→BP Custom Menu*
3. Add a new page, enter your content, and publish. It will automatically show up as a menu item in the BuddyPress profile.
4. In order to create a **submenu page**, please specify a **"Parent"** under the **"Menu Page Options"** in the right sidebar of the edit screen.
5. In order to specify a **default submenu** for a parent page, select a submenu page in the **"Set Default Submenu"** selection under the **"Menu Page Options"** in the right sidebar of the edit screen.
6. In order to re-order the menu items, enter an index in the **"Order"** field under the **"Menu Page Options"** in the right sidebar of the edit screen. A higher index means a higher level in the menu.

== Frequently Asked Questions ==

= Is this plugin free? =

Definitely! Custom Profile Menu for BuddyPress is free and always will be.

= How many pages can I add to the menu? =

Unlimited.

== Screenshots ==

1. The Custom Profile Menu for BuddyPress page list.
2. Edit screen for a parent menu page.
3. Edit screen for a submenu page.
4. View of a parent menu page in the BuddyPress profile.
5. View of a submenu page as a default submenu item of the parent menu page.

== Changelog ==

= 1.0.3 =
* Fixes minor PHP warnings and notices.

= 1.0.2 =
* Fixes issue where the plugin was adding an additional dropdown to the Page Attributes metabox (props to [@honoluluman](https://profiles.wordpress.org/honoluluman/) for reporting it)

= 1.0.1 =
* Fixes the image and shortcode not rendering issue.

= 1.0 =
* Initial Release

== Upgrade Notice ==

= 1.0.3 =
* Fixes minor PHP warnings and notices.

= 1.0.2 =
* Bug Fix: An additional dropdown was being added to the Page Attributes metabox

= 1.0.1 =
* Bug Fix: Image and shortcodes were not rendering.

= 1.0 =
* Initial Release
