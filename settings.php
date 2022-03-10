<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * @package   theme_edubs
 * @copyright 2018 - 2020 Marcin Czaja - Rosea Themes
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {
    $settings = new theme_edubs_admin_settingspage_tabs('themesettingedubs', get_string('configtitle', 'theme_edubs'));
    $page = new admin_settingpage('theme_edubs_general', get_string('generalsettings', 'theme_edubs'));

    /***
     *
     *    Login page settings
     *
     ***/

    $page = new admin_settingpage('theme_edubs_loginpage', get_string('loginpagesettings', 'theme_edubs'));

    $name = 'theme_edubs/showlbg';
    $title = get_string('showlbg', 'theme_edubs');
    $description = get_string('showlbg_desc', 'theme_edubs');
    $default = 0;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/loginbg';
    $title = get_string('loginbg', 'theme_edubs');
    $description = get_string('loginbg_desc', 'theme_edubs');
    $opts = array('accepted_types' => array('.png', '.jpg', '.gif', '.webp', '.tiff', '.svg'));
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'loginbg', 0, $opts);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);

    /***
     *
     *    Front page settings
     *
     ***/
    $page = new admin_settingpage('theme_edubs_frontpage', get_string('frontpagesettings', 'theme_edubs'));

    /***
     *
     *   Top Bar
     *
     ***/
    $page = new admin_settingpage('theme_edubs_topbar', get_string('topbarsettings', 'theme_edubs'));

    $name = 'theme_edubs/topbarstyle';
    $title = get_string('topbarstyle', 'theme_edubs');
    $description = get_string('topbarstyle_desc', 'theme_edubs');
    $choices = array(
        "topbarstyle-1" => "Style 1",
        "topbarstyle-2" => "Style 2",
        "topbarstyle-3" => "Style 3",
        "topbarstyle-4" => "Style 4",
        "topbarstyle-5" => "Style 5",
        "topbarstyle-6" => "Style 6"
    );
    $setting = new admin_setting_configselect($name, $title, $description, 'topbarstyle-1', $choices);
    $page->add($setting);

    $settings->add($page);


    /***
     *
     *   Footer Settings
     *
     ***/
    $page = new admin_settingpage('theme_edubs_footer', get_string('footersettings', 'theme_edubs'));

    // Custom Nav
    $name = 'theme_edubs/footercustomnav';
    $title = get_string('footercustomnav', 'theme_edubs');
    $description = get_string('footercustomnav_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $page->add($setting);


    // Website.
    $name = 'theme_edubs/website';
    $title = get_string('website', 'theme_edubs');
    $description = get_string('website_desc', 'theme_edubs');
    $default = 'Moodle Themes';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    // Website.
    $name = 'theme_edubs/cwebsiteurl';
    $title = get_string('cwebsiteurl', 'theme_edubs');
    $description = get_string('cwebsiteurl_desc', 'theme_edubs');
    $default = 'http://rosea.io';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    // Mobile.
    $name = 'theme_edubs/mobile';
    $title = get_string('mobile', 'theme_edubs');
    $description = get_string('mobile_desc', 'theme_edubs');
    $default = 'Mobile : +55 (18) 00123-45678';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    // Mail.
    $name = 'theme_edubs/mail';
    $title = get_string('mail', 'theme_edubs');
    $description = get_string('mail_desc', 'theme_edubs');
    $default = 'sample@mail.com';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    // Custom Text
    $name = 'theme_edubs/CustomFooterText';
    $title = get_string('CustomFooterText', 'theme_edubs');
    $description = get_string('CustomFooterText_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $page->add($setting);

    // Custom Copyright Text
    $name = 'theme_edubs/copyrightText';
    $title = get_string('copyrightText', 'theme_edubs');
    $description = get_string('copyrightText_desc', 'theme_edubs');
    $default = 'All rights reserved';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    // Facebook url setting.
    $name = 'theme_edubs/facebook';
    $title = get_string('facebook', 'theme_edubs');
    $description = get_string('facebook_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    // Twitter url setting.
    $name = 'theme_edubs/twitter';
    $title = get_string('twitter', 'theme_edubs');
    $description = get_string('twitter_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    // Googleplus url setting.
    $name = 'theme_edubs/googleplus';
    $title = get_string('googleplus', 'theme_edubs');
    $description = get_string('googleplus_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    // Linkdin url setting.
    $name = 'theme_edubs/linkedin';
    $title = get_string('linkedin', 'theme_edubs');
    $description = get_string('linkedin_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    // Youtube url setting.
    $name = 'theme_edubs/youtube';
    $title = get_string('youtube', 'theme_edubs');
    $description = get_string('youtube_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    // Instagram url setting.
    $name = 'theme_edubs/instagram';
    $title = get_string('instagram', 'theme_edubs');
    $description = get_string('instagram_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);


    $settings->add($page);
}