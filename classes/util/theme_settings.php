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
 * Edubs theme.
 *
 * @package    theme_edubs
 * @copyright  2022 Brain Station 23 Ltd.
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


namespace theme_edubs\util;

use theme_config;

defined('MOODLE_INTERNAL') || die();

/**
 * Helper to load a theme configuration.
 *
 * @package    theme_edubs
 *
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class theme_settings {

    /**
     * Get config theme footer items
     *
     * @return array
     */
    public function sidebar_custom_block() {
        $theme = theme_config::load('edubs');

        $templatecontext = [];
        $sidebaritems = [
            'SidebarCustomBox', 'SidebarCustomNav', 'showmycourses', 'hiddensidebar', 'showsidebarlogo', 'SidebarCustomHTML', 'SidebarCustomNavigationLinks', 'customrooturl'
        ];

        foreach ($sidebaritems as $setting) {
            if (!empty($theme->settings->$setting)) {
                $templatecontext[$setting] = $theme->settings->$setting;
            }
        }

        $sidebaritemshtml = [
            'SidebarCustomHeading', 'SidebarCustomText', 'SidebarCustomNavTitle', 'SidebarButtonIconOpen', 'SidebarButtonIconClose'
        ];

        foreach ($sidebaritemshtml as $setting) {
            if (!empty($theme->settings->$setting)) {
                $templatecontext[$setting] = format_text(($theme->settings->$setting),FORMAT_HTML, array('noclean' => true));
            }
        }

        if (!empty($theme->setting_file_url('customlogosidebar', 'customlogosidebar'))) {
            $templatecontext['customlogosidebar'] = $theme->setting_file_url('customlogosidebar', 'customlogosidebar');
        }

        return $templatecontext;
    }

    public function login_block() {
        $theme = theme_config::load('edubs');

        $templatecontext = [];

        $loginfiles = [
            'loginbg'
        ];

        foreach ($loginfiles as $setting) {
            if (!empty($theme->setting_file_url($setting, $setting))) {
                $templatecontext[$setting] = $theme->setting_file_url($setting,$setting);
            }
        }

        $loginitems = [
            'showlbg'
        ];

        foreach ($loginitems as $setting) {
            if (!empty($theme->settings->$setting)) {
                $templatecontext[$setting] = $theme->settings->$setting;
            }
        }

        return $templatecontext;
    }


    /**
     * Get config theme Custom Nav and urls
     *
     * @return array
     */
    public function customnav() {
        $theme = theme_config::load('edubs');

        $templatecontext = [];

        $customnav = [
            'CustomNavIcon', 'ShowCustomNav'
        ];

        foreach ($customnav as $setting) {
            if (!empty($theme->settings->$setting)) {
                $templatecontext[$setting] = $theme->settings->$setting;
            }
        }

        $customnavhtml = [
            'CustomNavHTML', 'ExtraCustomNavHTML'
        ];

        foreach ($customnavhtml as $setting) {
            if (!empty($theme->settings->$setting)) {
                $templatecontext[$setting] = format_text(($theme->settings->$setting),FORMAT_HTML, array('noclean' => true));
            }
        }

        return $templatecontext;
    }


    public function top_bar_custom_block() {
        $theme = theme_config::load('edubs');

        $templatecontext = [];
        $topbarcustomblock = [
            'ShowTopBarUserName'
        ];

        foreach ($topbarcustomblock as $setting) {
            if (!empty($theme->settings->$setting)) {
                $templatecontext[$setting] = $theme->settings->$setting;
            }
        }

        $topbarcustomblockhtml = [
            'TopBarText', 'customtopnavhtml', 'topBarOffsetTop'
        ];

        foreach ($topbarcustomblockhtml as $setting) {
            if (!empty($theme->settings->$setting)) {
                $templatecontext[$setting] = format_text(($theme->settings->$setting),FORMAT_HTML, array('noclean' => true));
            }
        }

        if (!empty($image = $theme->setting_file_url('customlogotopbar', 'customlogotopbar'))) {
            $templatecontext['customlogotopbar'] = $image;
        }

        if (!empty($image = $theme->setting_file_url('mobiletopbarlogo', 'mobiletopbarlogo'))) {
            $templatecontext['mobiletopbarlogo'] = $image;
        }

        return $templatecontext;
    }

    public function frontpage_elements() {
        $theme = theme_config::load('edubs');

        $templatecontext = [];
        $headelements = [
            'displaynavdrawerfp'
        ];

        foreach ($headelements as $setting) {
            if (!empty($theme->settings->$setting)) {
                $templatecontext[$setting] = $theme->settings->$setting;
            }
        }

        return $templatecontext;
    }

    public function head_elements() {
        $theme = theme_config::load('edubs');

        $templatecontext = [];
        $headelements = [
            'googlefonturl', 'googlefontname', 'ShowLoader', 'CustomWebFont', 'CustomWebFontSH', 'CustomWebFontHTML',
            'customfontregularname', 'customfontlightname', 'customfontmediumname', 'customfontboldname', 'showauthorinfo', 'additionalheadhtml', 'additionalcustomfont'
        ];

        foreach ($headelements as $setting) {
            if (!empty($theme->settings->$setting)) {
                $templatecontext[$setting] = $theme->settings->$setting;
            }
        }

        $fontshead = [
            'customfontregulareot', 'customfontregularwoff', 'customfontregularwoff2',
            'customfontregularttf', 'customfontregularsvg', 'customfontlighteot', 'customfontlightwoff',
            'customfontlightwoff2', 'customfontlightttf', 'customfontlightsvg', 'customfontmediumeot',
            'customfontmediumwoff', 'customfontmediumwoff2', 'customfontmediumttf', 'customfontmediumsvg',
            'customfontboldeot', 'customfontboldwoff', 'customfontboldwoff2', 'customfontboldttf', 'customfontboldsvg'
        ];

        foreach ($fontshead as $setting) {
            if (!empty($theme->setting_file_url($setting, $setting))) {
                $templatecontext[$setting] = $theme->setting_file_url($setting,$setting);
            }
        }

        return $templatecontext;
    }


    /**
     * Get config theme footer itens
     *
     * @return array
     */
    public function footer_items() {
        $theme = theme_config::load('edubs');

        $templatecontext = [];

        $footersettings = [
            'showsociallist', 'facebook', 'twitter', 'googleplus', 'linkedin', 'youtube', 'instagram',
            'cwebsiteurl', 'website', 'mobile', 'mail', 'customsocialicon', 'CustomAlert', 'additionalfooterhtml', 'CustomModal', 'CustomModalContentHTML'
        ];

        foreach ($footersettings as $setting) {
            if (!empty($theme->settings->$setting)) {
                $templatecontext[$setting] = $theme->settings->$setting;
            }
        }

        $footersettingshtml = [
            'footercustomnav', 'CustomFooterText', 'copyrightText', 'CustomAlertContent', 'CustomAlertButton', 'CustomModalContent'
        ];

        foreach ($footersettingshtml as $setting) {
            if (!empty($theme->settings->$setting)) {
                $templatecontext[$setting] = format_text(($theme->settings->$setting),FORMAT_HTML, array('noclean' => true));
            }
        }

        return $templatecontext;
    }


    public function fonts() {
        $theme = theme_config::load('edubs');

        $templatecontext = [];

        $fonts = [
            'morefonts'
        ];

        foreach ($fonts as $setting) {
            if (!empty($theme->settings->$setting)) {
                $templatecontext[$setting] = $theme->settings->$setting;
            }
        }

        $fontcount = $theme->settings->fontcount;

        for ($i = 1, $j = 0; $i <= $fontcount; $i++, $j++) {
            $langcode = "langcode{$i}";
            $additionalfontname = "additionalfontname{$i}";

            if (!empty($theme->settings->$langcode)) {
                $templatecontext['fonts'][$j]['langcode'] = $theme->settings->$langcode;
            }

            if (!empty($theme->settings->$additionalfontname)) {
                $templatecontext['fonts'][$j]['additionalfontname'] = $theme->settings->$additionalfontname;
            }

        }

        return $templatecontext;
    }

}
