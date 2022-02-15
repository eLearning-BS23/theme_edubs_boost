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

    //HR
//    $name = 'theme_edubs/hintro';
//    $heading = get_string('hintro', 'theme_edubs');
//    $setting = new admin_setting_heading($name, $heading, format_text(get_string('hintro_desc', 'theme_edubs'), FORMAT_MARKDOWN));
//    $page->add($setting);

    $name = 'theme_edubs/displaynavdrawerfp';
    $title = get_string('displaynavdrawerfp', 'theme_edubs');
    $description = get_string('displaynavdrawerfp_desc', 'theme_edubs');
    $default = 0;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);

    // Setting to display a hint to the hidden visibility of a course.
    $name = 'theme_edubs/showhintcoursehidden';
    $title = get_string('showhintcoursehiddensetting', 'theme_edubs');
    $description = get_string('showhintcoursehiddensetting_desc', 'theme_edubs');
    $default = 0;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);

    // Setting to display a hint to the guest accessing of a course
    $name = 'theme_edubs/showhintcourseguestaccess';
    $title = get_string('showhintcourseguestaccesssetting', 'theme_edubs');
    $description = get_string('showhintcourseguestaccesssetting_desc', 'theme_edubs');
    $default = 0;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/boostfumblingnav';
    $title = get_string('boostfumblingnav', 'theme_edubs');
    $description = get_string('boostfumblingnav_desc', 'theme_edubs');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $page->add($setting);

    // Show/hide author info
    $name = 'theme_edubs/showauthorinfo';
    $title = get_string('showauthorinfo', 'theme_edubs');
    $description = get_string('showauthorinfo_desc', 'theme_edubs');
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);

    // Favicon setting.
    $name = 'theme_edubs/favicon';
    $title = get_string('favicon', 'theme_edubs');
    $description = get_string('favicon_desc', 'theme_edubs');
    $opts = array('accepted_types' => array('.ico'), 'maxfiles' => 1);
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'favicon', 0, $opts);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Preset.

    //HR
    $name = 'theme_edubs/HR43';
    $heading = get_string('HR43', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR43_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);

    $name = 'theme_edubs/preset';
    $title = get_string('preset', 'theme_edubs');
    $description = get_string('preset_desc', 'theme_edubs');
    $choices['default.scss'] = 'Demo #1';
    $choices['demo2.scss'] = 'Demo #2';
    $choices['demo3.scss'] = 'Demo #3';

    $context = context_system::instance();
    $fs = get_file_storage();
    $files = $fs->get_area_files($context->id, 'theme_edubs', 'preset', 0, 'itemid, filepath, filename', false);

    $choices = [];
    foreach ($files as $file) {
        $choices[$file->get_filename()] = $file->get_filename();
    }
    // These are the built in presets.
    $choices['default.scss'] = 'Demo #1';
    $choices['demo2.scss'] = 'Demo #2';
    $choices['demo3.scss'] = 'Demo #3';

    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Preset files setting.
    $name = 'theme_edubs/presetfiles';
    $title = get_string('presetfiles','theme_edubs');
    $description = get_string('presetfiles_desc', 'theme_edubs');

    $setting = new admin_setting_configstoredfile($name, $title, $description, 'preset', 0,
        array('maxfiles' => 20, 'accepted_types' => array('.scss')));
    $page->add($setting);


    // Cards.
    //HR
    $name = 'theme_edubs/HR40';
    $heading = get_string('HR40', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR40_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);

    $name = 'theme_edubs/cardimgheight';
    $title = get_string('cardimgheight', 'theme_edubs');
    $description = get_string('cardimgheight_desc', 'theme_edubs');
    $setting = new admin_setting_configtext($name, $title, $description,'');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/coursecarddescheight';
    $title = get_string('coursecarddescheight', 'theme_edubs');
    $description = get_string('coursecarddescheight_desc', 'theme_edubs');
    $setting = new admin_setting_configtext($name, $title, $description,'');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);


    //HR
    $name = 'theme_edubs/HR52';
    $heading = get_string('HR52', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR52_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);

    $name = 'theme_edubs/gridbreakpointlg';
    $title = get_string('gridbreakpointlg', 'theme_edubs');
    $description = get_string('gridbreakpointlg_desc', 'theme_edubs');
    $setting = new admin_setting_configtext($name, $title, $description,'');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/gridbreakpointmd';
    $title = get_string('gridbreakpointmd', 'theme_edubs');
    $description = get_string('gridbreakpointmd_desc', 'theme_edubs');
    $setting = new admin_setting_configtext($name, $title, $description,'');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/gridbreakpointsm';
    $title = get_string('gridbreakpointsm', 'theme_edubs');
    $description = get_string('gridbreakpointsm_desc', 'theme_edubs');
    $setting = new admin_setting_configtext($name, $title, $description,'');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);


    //HR
    $name = 'theme_edubs/HR41';
    $heading = get_string('HR41', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR41_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);

    $name = 'theme_edubs/fontsizelg';
    $title = get_string('fontsizelg', 'theme_edubs');
    $description = get_string('fontsizelg_desc', 'theme_edubs');
    $setting = new admin_setting_configtext($name, $title, $description,'');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/fontsizebase';
    $title = get_string('fontsizebase', 'theme_edubs');
    $description = get_string('fontsizebase_desc', 'theme_edubs');
    $setting = new admin_setting_configtext($name, $title, $description,'');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/fontsizesm';
    $title = get_string('fontsizesm', 'theme_edubs');
    $description = get_string('fontsizesm_desc', 'theme_edubs');
    $setting = new admin_setting_configtext($name, $title, $description,'');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/fontsizexs';
    $title = get_string('fontsizexs', 'theme_edubs');
    $description = get_string('fontsizexs_desc', 'theme_edubs');
    $setting = new admin_setting_configtext($name, $title, $description,'');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/h2fontsize';
    $title = get_string('h2fontsize', 'theme_edubs');
    $description = get_string('h2fontsize_desc', 'theme_edubs');
    $setting = new admin_setting_configtext($name, $title, $description,'');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/h3fontsize';
    $title = get_string('h3fontsize', 'theme_edubs');
    $description = get_string('h3fontsize_desc', 'theme_edubs');
    $setting = new admin_setting_configtext($name, $title, $description,'');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/h4fontsize';
    $title = get_string('h4fontsize', 'theme_edubs');
    $description = get_string('h4fontsize_desc', 'theme_edubs');
    $setting = new admin_setting_configtext($name, $title, $description,'');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/h5fontsize';
    $title = get_string('h5fontsize', 'theme_edubs');
    $description = get_string('h5fontsize_desc', 'theme_edubs');
    $setting = new admin_setting_configtext($name, $title, $description,'');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/h6fontsize';
    $title = get_string('h6fontsize', 'theme_edubs');
    $description = get_string('h6fontsize_desc', 'theme_edubs');
    $setting = new admin_setting_configtext($name, $title, $description,'');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);



    // Heading
    $name = 'theme_edubs/HVariable';
    $heading = get_string('HVariable', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('HVariable_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);

    // Variable $body-color.
    // We use an empty default value because the default color should come from the preset.
    $name = 'theme_edubs/bodybg';
    $title = get_string('bodybg', 'theme_edubs');
    $description = get_string('bodybg_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/bodycolor';
    $title = get_string('bodycolor', 'theme_edubs');
    $description = get_string('bodycolor_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/bodycolorsecondary';
    $title = get_string('bodycolorsecondary', 'theme_edubs');
    $description = get_string('bodycolorsecondary_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/bodycolorlight';
    $title = get_string('bodycolorlight', 'theme_edubs');
    $description = get_string('bodycolorlight_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/linkcolor';
    $title = get_string('linkcolor', 'theme_edubs');
    $description = get_string('linkcolor_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/linkhovercolor';
    $title = get_string('linkhovercolor', 'theme_edubs');
    $description = get_string('linkhovercolor_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/bordercolor';
    $title = get_string('bordercolor', 'theme_edubs');
    $description = get_string('bordercolor_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);


    //HR
    $name = 'theme_edubs/HR36';
    $heading = get_string('HR36', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR36_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);

    $name = 'theme_edubs/cardbg';
    $title = get_string('cardbg', 'theme_edubs');
    $description = get_string('cardbg_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/cardtitle';
    $title = get_string('cardtitle', 'theme_edubs');
    $description = get_string('cardtitle_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/cardtext';
    $title = get_string('cardtext', 'theme_edubs');
    $description = get_string('cardtext_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);


    //HR
    $name = 'theme_edubs/HR26';
    $heading = get_string('HR26', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR26_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);

    //Theme Colors
    $name = 'theme_edubs/themecolor1';
    $title = get_string('themecolor1', 'theme_edubs');
    $description = get_string('themecolor1_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/themecolor2';
    $title = get_string('themecolor2', 'theme_edubs');
    $description = get_string('themecolor2_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/themecolor3';
    $title = get_string('themecolor3', 'theme_edubs');
    $description = get_string('themecolor3_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/themecolor4';
    $title = get_string('themecolor4', 'theme_edubs');
    $description = get_string('themecolor4_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/themecolor5';
    $title = get_string('themecolor5', 'theme_edubs');
    $description = get_string('themecolor5_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/themecolor6';
    $title = get_string('themecolor6', 'theme_edubs');
    $description = get_string('themecolor6_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/themecolor7';
    $title = get_string('themecolor7', 'theme_edubs');
    $description = get_string('themecolor7_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/themecolor8';
    $title = get_string('themecolor8', 'theme_edubs');
    $description = get_string('themecolor8_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/themecolor9';
    $title = get_string('themecolor9', 'theme_edubs');
    $description = get_string('themecolor9_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);



    //HR
    $name = 'theme_edubs/HR31';
    $heading = get_string('HR31', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR31_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);

    $name = 'theme_edubs/black';
    $title = get_string('black', 'theme_edubs');
    $description = get_string('black_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/white';
    $title = get_string('white', 'theme_edubs');
    $description = get_string('white_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);


    $name = 'theme_edubs/gray900';
    $title = get_string('gray900', 'theme_edubs');
    $description = get_string('gray900_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/gray800';
    $title = get_string('gray800', 'theme_edubs');
    $description = get_string('gray800_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/gray700';
    $title = get_string('gray700', 'theme_edubs');
    $description = get_string('gray700_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/gray600';
    $title = get_string('gray600', 'theme_edubs');
    $description = get_string('gray600_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/gray500';
    $title = get_string('gray500', 'theme_edubs');
    $description = get_string('gray500_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/gray400';
    $title = get_string('gray400', 'theme_edubs');
    $description = get_string('gray400_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/gray300';
    $title = get_string('gray300', 'theme_edubs');
    $description = get_string('gray300_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/gray200';
    $title = get_string('gray200', 'theme_edubs');
    $description = get_string('gray200_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/gray100';
    $title = get_string('gray100', 'theme_edubs');
    $description = get_string('gray100_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);


    //HR
    $name = 'theme_edubs/HR42';
    $heading = get_string('HR42', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR42_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);

    //Buttons
    $name = 'theme_edubs/borderradius';
    $title = get_string('borderradius', 'theme_edubs');
    $description = get_string('borderradius_desc', 'theme_edubs');
    $setting = new admin_setting_configtext($name, $title, $description,'');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/btnborderwidth';
    $title = get_string('btnborderwidth', 'theme_edubs');
    $description = get_string('btnborderwidth_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/btnborderradius';
    $title = get_string('btnborderradius', 'theme_edubs');
    $description = get_string('btnborderradius_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);



    //HR
    $name = 'theme_edubs/HR32';
    $heading = get_string('HR32', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR32_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);

    // Button primary
    $name = 'theme_edubs/btnprimarybg';
    $title = get_string('btnprimarybg', 'theme_edubs');
    $description = get_string('btnprimarybg_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/btnprimarybghover';
    $title = get_string('btnprimarybghover', 'theme_edubs');
    $description = get_string('btnprimarybghover_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/btnprimaryborder';
    $title = get_string('btnprimaryborder', 'theme_edubs');
    $description = get_string('btnprimaryborder_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/btnprimaryborderhover';
    $title = get_string('btnprimaryborderhover', 'theme_edubs');
    $description = get_string('btnprimaryborderhover_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/btnprimarytext';
    $title = get_string('btnprimarytext', 'theme_edubs');
    $description = get_string('btnprimarytext_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/btnprimarytexthover';
    $title = get_string('btnprimarytexthover', 'theme_edubs');
    $description = get_string('btnprimarytexthover_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/btnprimaryshadow';
    $title = get_string('btnprimaryshadow', 'theme_edubs');
    $description = get_string('btnprimaryshadow_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);


    //HR
    $name = 'theme_edubs/HR33';
    $heading = get_string('HR33', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR33_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);

    //Btn Secondary
    $name = 'theme_edubs/btnsecondarybg';
    $title = get_string('btnsecondarybg', 'theme_edubs');
    $description = get_string('btnsecondarybg_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/btnsecondarybghover';
    $title = get_string('btnsecondarybghover', 'theme_edubs');
    $description = get_string('btnsecondarybghover_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/btnsecondaryborder';
    $title = get_string('btnsecondaryborder', 'theme_edubs');
    $description = get_string('btnsecondaryborder_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/btnsecondaryborderhover';
    $title = get_string('btnsecondaryborderhover', 'theme_edubs');
    $description = get_string('btnsecondaryborderhover_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/btnsecondarytext';
    $title = get_string('btnsecondarytext', 'theme_edubs');
    $description = get_string('btnsecondarytext_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/btnsecondarytexthover';
    $title = get_string('btnsecondarytexthover', 'theme_edubs');
    $description = get_string('btnsecondarytexthover_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/btnsecondaryshadow';
    $title = get_string('btnsecondaryshadow', 'theme_edubs');
    $description = get_string('btnsecondaryshadow_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);



    //HR
    $name = 'theme_edubs/HR34';
    $heading = get_string('HR34', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR34_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);

    //Btn Reset
    $name = 'theme_edubs/btnresetbg';
    $title = get_string('btnresetbg', 'theme_edubs');
    $description = get_string('btnresetbg_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/btnresetbghover';
    $title = get_string('btnresetbghover', 'theme_edubs');
    $description = get_string('btnresetbghover_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/btnresetborder';
    $title = get_string('btnresetborder', 'theme_edubs');
    $description = get_string('btnresetborder_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/btnresetborderhover';
    $title = get_string('btnresetborderhover', 'theme_edubs');
    $description = get_string('btnresetborderhover_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/btnresettext';
    $title = get_string('btnresettext', 'theme_edubs');
    $description = get_string('btnresettext_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/btnresettexthover';
    $title = get_string('btnresettexthover', 'theme_edubs');
    $description = get_string('btnresettexthover_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/btnresetshadow';
    $title = get_string('btnresetshadow', 'theme_edubs');
    $description = get_string('btnresetshadow_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);



    //HR
    $name = 'theme_edubs/HR35';
    $heading = get_string('HR35', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR35_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);

    //Btn Special
    $name = 'theme_edubs/btnspecialbg';
    $title = get_string('btnspecialbg', 'theme_edubs');
    $description = get_string('btnspecialbg_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/btnspecialbghover';
    $title = get_string('btnspecialbghover', 'theme_edubs');
    $description = get_string('btnspecialbghover_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/btnspecialborder';
    $title = get_string('btnspecialborder', 'theme_edubs');
    $description = get_string('btnspecialborder_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/btnspecialborderhover';
    $title = get_string('btnspecialborderhover', 'theme_edubs');
    $description = get_string('btnspecialborderhover_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/btnspecialtext';
    $title = get_string('btnspecialtext', 'theme_edubs');
    $description = get_string('btnspecialtext_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/btnspecialtexthover';
    $title = get_string('btnspecialtexthover', 'theme_edubs');
    $description = get_string('btnspecialtexthover_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/btnspecialshadow';
    $title = get_string('btnspecialshadow', 'theme_edubs');
    $description = get_string('btnspecialshadow_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);




    //HR
    $name = 'theme_edubs/HR47';
    $heading = get_string('HR47', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR47_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);

    $name = 'theme_edubs/dropdownbg';
    $title = get_string('dropdownbg', 'theme_edubs');
    $description = get_string('dropdownbg_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/dropdownshadow';
    $title = get_string('dropdownshadow', 'theme_edubs');
    $description = get_string('dropdownshadow_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/dropdownheadercolor';
    $title = get_string('dropdownheadercolor', 'theme_edubs');
    $description = get_string('dropdownheadercolor_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/dropdowntext';
    $title = get_string('dropdowntext', 'theme_edubs');
    $description = get_string('dropdowntext_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/dropdowndividerbg';
    $title = get_string('dropdowndividerbg', 'theme_edubs');
    $description = get_string('dropdowndividerbg_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/dropdownlinkcolor';
    $title = get_string('dropdownlinkcolor', 'theme_edubs');
    $description = get_string('dropdownlinkcolor_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/dropdownlinkhovercolor';
    $title = get_string('dropdownlinkhovercolor', 'theme_edubs');
    $description = get_string('dropdownlinkhovercolor_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/dropdownlinkhoverbg';
    $title = get_string('dropdownlinkhoverbg', 'theme_edubs');
    $description = get_string('dropdownlinkhoverbg_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/dropdownlinkactivecolor';
    $title = get_string('dropdownlinkactivecolor', 'theme_edubs');
    $description = get_string('dropdownlinkactivecolor_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/dropdownlinkactivebg';
    $title = get_string('dropdownlinkactivebg', 'theme_edubs');
    $description = get_string('dropdownlinkactivebg_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);


    // Calendar
    //HR
    $name = 'theme_edubs/HR51';
    $heading = get_string('HR51', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR51_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);


    $name = 'theme_edubs/caleventglobalcolor';
    $title = get_string('caleventglobalcolor', 'theme_edubs');
    $description = get_string('caleventglobalcolor_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/caleventcategorycolor';
    $title = get_string('caleventcategorycolor', 'theme_edubs');
    $description = get_string('caleventcategorycolor_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/caleventcoursecolor';
    $title = get_string('caleventcoursecolor', 'theme_edubs');
    $description = get_string('caleventcoursecolor_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/caleventgroupecolor';
    $title = get_string('caleventgroupecolor', 'theme_edubs');
    $description = get_string('caleventgroupecolor_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/caleventusercolor';
    $title = get_string('caleventusercolor', 'theme_edubs');
    $description = get_string('caleventusercolor_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);


    /***
     *
     *    Block Order settings
     *
     ***/
    $page = new admin_settingpage('theme_edubs_blockorder', get_string('blockordersettings', 'theme_edubs'));


    //HR
    $name = 'theme_edubs/HR46';
    $heading = get_string('HR46', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR46_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);

    $name = 'theme_edubs/sectionpadding';
    $title = get_string('sectionpadding', 'theme_edubs');
    $description = get_string('sectionpadding_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/sectionpaddingsm';
    $title = get_string('sectionpaddingsm', 'theme_edubs');
    $description = get_string('sectionpaddingsm_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);


    //HR
    $name = 'theme_edubs/HR23';
    $heading = get_string('HR23', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR23_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);


    // BLOCK #13
    $name = 'theme_edubs/slotblock13';
    $title = get_string('slotblock13', 'theme_edubs');
    $description = get_string('slotblock13_desc', 'theme_edubs');
    $choices = array(
        "1" => "1",
        "2" => "2",
        "3" => "3",
        "4" => "4",
        "5" => "5",
        "6" => "6",
        "7" => "7",
        "8" => "8",
        "9" => "9",
        "10" => "10",
        "11" => "11",
        "12" => "12",
        "13" => "13",
        "14" => "14"
    );
    $setting = new admin_setting_configselect($name, $title, $description, '1', $choices);
    $page->add($setting);

    $name = 'theme_edubs/slotblock9';
    $title = get_string('slotblock9', 'theme_edubs');
    $description = get_string('slotblock9_desc', 'theme_edubs');
    $choices = array(
        "1" => "1",
        "2" => "2",
        "3" => "3",
        "4" => "4",
        "5" => "5",
        "6" => "6",
        "7" => "7",
        "8" => "8",
        "9" => "9",
        "10" => "10",
        "11" => "11",
        "12" => "12",
        "13" => "13",
        "14" => "14"
    );
    $setting = new admin_setting_configselect($name, $title, $description, '1', $choices);
    $page->add($setting);

    // BLOCK #13
    $name = 'theme_edubs/slotblock14';
    $title = get_string('slotblock14', 'theme_edubs');
    $description = get_string('slotblock14_desc', 'theme_edubs');
    $choices = array(
        "1" => "1",
        "2" => "2",
        "3" => "3",
        "4" => "4",
        "5" => "5",
        "6" => "6",
        "7" => "7",
        "8" => "8",
        "9" => "9",
        "10" => "10",
        "11" => "11",
        "12" => "12",
        "13" => "13",
        "14" => "14"
    );
    $setting = new admin_setting_configselect($name, $title, $description, '14', $choices);
    $page->add($setting);

    $name = 'theme_edubs/slotblock1';
    $title = get_string('slotblock1', 'theme_edubs');
    $description = get_string('slotblock1_desc', 'theme_edubs');
    $choices = array(
        "1" => "1",
        "2" => "2",
        "3" => "3",
        "4" => "4",
        "5" => "5",
        "6" => "6",
        "7" => "7",
        "8" => "8",
        "9" => "9",
        "10" => "10",
        "11" => "11",
        "12" => "12",
        "13" => "13",
        "14" => "14"
    );
    $setting = new admin_setting_configselect($name, $title, $description, '3', $choices);
    $page->add($setting);

    // Show/hide HR
    $name = 'theme_edubs/showfpblock1hr';
    $title = get_string('showfpblock1hr', 'theme_edubs');
    $description = get_string('showfpblock1hr_desc', 'theme_edubs');
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/slotblock2';
    $title = get_string('slotblock2', 'theme_edubs');
    $description = get_string('slotblock2_desc', 'theme_edubs');
    $choices = array(
        "1" => "1",
        "2" => "2",
        "3" => "3",
        "4" => "4",
        "5" => "5",
        "6" => "6",
        "7" => "7",
        "8" => "8",
        "9" => "9",
        "10" => "10",
        "11" => "11",
        "12" => "12",
        "13" => "13",
        "14" => "14"
    );
    $setting = new admin_setting_configselect($name, $title, $description, '4', $choices);
    $page->add($setting);

    // Show/hide HR
    $name = 'theme_edubs/showfpblock2hr';
    $title = get_string('showfpblock2hr', 'theme_edubs');
    $description = get_string('showfpblock2hr_desc', 'theme_edubs');
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/slotblock3';
    $title = get_string('slotblock3', 'theme_edubs');
    $description = get_string('slotblock3_desc', 'theme_edubs');
    $choices = array(
        "1" => "1",
        "2" => "2",
        "3" => "3",
        "4" => "4",
        "5" => "5",
        "6" => "6",
        "7" => "7",
        "8" => "8",
        "9" => "9",
        "10" => "10",
        "11" => "11",
        "12" => "12",
        "13" => "13",
        "14" => "14"
    );
    $setting = new admin_setting_configselect($name, $title, $description, '8', $choices);
    $page->add($setting);

    $name = 'theme_edubs/slotblock4';
    $title = get_string('slotblock4', 'theme_edubs');
    $description = get_string('slotblock4_desc', 'theme_edubs');
    $choices = array(
        "1" => "1",
        "2" => "2",
        "3" => "3",
        "4" => "4",
        "5" => "5",
        "6" => "6",
        "7" => "7",
        "8" => "8",
        "9" => "9",
        "10" => "10",
        "11" => "11",
        "12" => "12",
        "13" => "13",
        "14" => "14"
    );
    $setting = new admin_setting_configselect($name, $title, $description, '5', $choices);
    $page->add($setting);

    // Show/hide HR
    $name = 'theme_edubs/showfpblock4hr';
    $title = get_string('showfpblock4hr', 'theme_edubs');
    $description = get_string('showfpblock4hr_desc', 'theme_edubs');
    $default = 0;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/slotblock6';
    $title = get_string('slotblock6', 'theme_edubs');
    $description = get_string('slotblock6_desc', 'theme_edubs');
    $choices = array(
        "1" => "1",
        "2" => "2",
        "3" => "3",
        "4" => "4",
        "5" => "5",
        "6" => "6",
        "7" => "7",
        "8" => "8",
        "9" => "9",
        "10" => "10",
        "11" => "11",
        "12" => "12",
        "13" => "13",
        "14" => "14"
    );
    $setting = new admin_setting_configselect($name, $title, $description, '2', $choices);
    $page->add($setting);

    // Show/hide HR
    $name = 'theme_edubs/showfpblock6hr';
    $title = get_string('showfpblock6hr', 'theme_edubs');
    $description = get_string('showfpblock6hr_desc', 'theme_edubs');
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/slotblock7';
    $title = get_string('slotblock7', 'theme_edubs');
    $description = get_string('slotblock7_desc', 'theme_edubs');
    $choices = array(
        "1" => "1",
        "2" => "2",
        "3" => "3",
        "4" => "4",
        "5" => "5",
        "6" => "6",
        "7" => "7",
        "8" => "8",
        "9" => "9",
        "10" => "10",
        "11" => "11",
        "12" => "12",
        "13" => "13",
        "14" => "14"
    );
    $setting = new admin_setting_configselect($name, $title, $description, '9', $choices);
    $page->add($setting);

    // Show/hide HR
    $name = 'theme_edubs/showfpblock7hr';
    $title = get_string('showfpblock7hr', 'theme_edubs');
    $description = get_string('showfpblock7hr_desc', 'theme_edubs');
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/slotblock5';
    $title = get_string('slotblock5', 'theme_edubs');
    $description = get_string('slotblock5_desc', 'theme_edubs');
    $choices = array(
        "1" => "1",
        "2" => "2",
        "3" => "3",
        "4" => "4",
        "5" => "5",
        "6" => "6",
        "7" => "7",
        "8" => "8",
        "9" => "9",
        "10" => "10",
        "11" => "11",
        "12" => "12",
        "13" => "13",
        "14" => "14"
    );
    $setting = new admin_setting_configselect($name, $title, $description, '7', $choices);
    $page->add($setting);

    // Show/hide HR
    $name = 'theme_edubs/showfpblockteamhr';
    $title = get_string('showfpblockteamhr', 'theme_edubs');
    $description = get_string('showfpblockteamhr_desc', 'theme_edubs');
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/slotblock8';
    $title = get_string('slotblock8', 'theme_edubs');
    $description = get_string('slotblock8_desc', 'theme_edubs');
    $choices = array(
        "1" => "1",
        "2" => "2",
        "3" => "3",
        "4" => "4",
        "5" => "5",
        "6" => "6",
        "7" => "7",
        "8" => "8",
        "9" => "9",
        "10" => "10",
        "11" => "11",
        "12" => "12",
        "13" => "13",
        "14" => "14"
    );
    $setting = new admin_setting_configselect($name, $title, $description, '5', $choices);
    $page->add($setting);

    // Show/hide HR
    $name = 'theme_edubs/showfpblock8hr';
    $title = get_string('showfpblock8hr', 'theme_edubs');
    $description = get_string('showfpblock8hr_desc', 'theme_edubs');
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);


    $name = 'theme_edubs/slotblock10';
    $title = get_string('slotblock10', 'theme_edubs');
    $description = get_string('slotblock10_desc', 'theme_edubs');
    $choices = array(
        "1" => "1",
        "2" => "2",
        "3" => "3",
        "4" => "4",
        "5" => "5",
        "6" => "6",
        "7" => "7",
        "8" => "8",
        "9" => "9",
        "10" => "10",
        "11" => "11",
        "12" => "12",
        "13" => "13",
        "14" => "14"
    );
    $setting = new admin_setting_configselect($name, $title, $description, '10', $choices);
    $page->add($setting);

    // Show/hide HR
    $name = 'theme_edubs/showfpblock10hr';
    $title = get_string('showfpblock10hr', 'theme_edubs');
    $description = get_string('showfpblock10hr_desc', 'theme_edubs');
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);

    // BLOCK #11
    $name = 'theme_edubs/slotblock11';
    $title = get_string('slotblock11', 'theme_edubs');
    $description = get_string('slotblock11_desc', 'theme_edubs');
    $choices = array(
        "1" => "1",
        "2" => "2",
        "3" => "3",
        "4" => "4",
        "5" => "5",
        "6" => "6",
        "7" => "7",
        "8" => "8",
        "9" => "9",
        "10" => "10",
        "11" => "11",
        "12" => "12",
        "13" => "13",
        "14" => "14"
    );
    $setting = new admin_setting_configselect($name, $title, $description, '11', $choices);
    $page->add($setting);

    // Show/hide HR
    $name = 'theme_edubs/showfpblock11hr';
    $title = get_string('showfpblock11hr', 'theme_edubs');
    $description = get_string('showfpblock11hr_desc', 'theme_edubs');
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);

    // BLOCK #12
    $name = 'theme_edubs/slotblock12';
    $title = get_string('slotblock12', 'theme_edubs');
    $description = get_string('slotblock12_desc', 'theme_edubs');
    $choices = array(
        "1" => "1",
        "2" => "2",
        "3" => "3",
        "4" => "4",
        "5" => "5",
        "6" => "6",
        "7" => "7",
        "8" => "8",
        "9" => "9",
        "10" => "10",
        "11" => "11",
        "12" => "12",
        "13" => "13",
        "14" => "14"
    );
    $setting = new admin_setting_configselect($name, $title, $description, '12', $choices);
    $page->add($setting);

    // Show/hide HR
    $name = 'theme_edubs/showfpblock12hr';
    $title = get_string('showfpblock12hr', 'theme_edubs');
    $description = get_string('showfpblock12hr_desc', 'theme_edubs');
    $default = 0;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);


    $settings->add($page);

    /***
     *
     *    Login page settings
     *
     ***/
    $page = new admin_settingpage('theme_edubs_loginpage', get_string('loginpagesettings', 'theme_edubs'));

    $name = 'theme_edubs/loginalignment';
    $title = get_string('loginalignment', 'theme_edubs');
    $description = get_string('loginalignment_desc', 'theme_edubs');
    $options = [];
    $options[1] = get_string('loginalignment-left', 'theme_edubs');
    $options[2] = get_string('loginalignment-center', 'theme_edubs');
    $options[3] = get_string('loginalignment-right', 'theme_edubs');
    $setting = new admin_setting_configselect($name, $title, $description, $default, $options);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/customloginlogo';
    $title = get_string('customloginlogo', 'theme_edubs');
    $description = get_string('customloginlogo_desc', 'theme_edubs');
    $opts = array('accepted_types' => array('.png', '.jpg', '.gif', '.svg'));
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'customloginlogo', 0, $opts);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

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

    $name = 'theme_edubs/hideforgotpassword';
    $title = get_string('hideforgotpassword', 'theme_edubs');
    $description = get_string('hideforgotpassword_desc', 'theme_edubs');
    $default = 0;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/logininfobox';
    $title = get_string('logininfobox', 'theme_edubs');
    $description = get_string('logininfobox_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/logininfobox2';
    $title = get_string('logininfobox2', 'theme_edubs');
    $description = get_string('logininfobox2_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
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
     *   Hero
     *
     ***/

    // Enable or disable Hero Image
    $name = 'theme_edubs/heroimgenabled';
    $title = get_string('heroimgenabled', 'theme_edubs');
    $description = get_string('heroimgenabled_desc', 'theme_edubs');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 1);
    $page->add($setting);

    // Show/hide logo
    $name = 'theme_edubs/showherologo';
    $title = get_string('showherologo', 'theme_edubs');
    $description = get_string('showherologo_desc', 'theme_edubs');
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/herofwenabled';
    $title = get_string('herofwenabled', 'theme_edubs');
    $description = get_string('herofwenabled_desc', 'theme_edubs');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $page->add($setting);

    $name = 'theme_edubs/heroimg';
    $title = get_string('heroimg', 'theme_edubs');
    $description = get_string('heroimg_desc', 'theme_edubs');
    $opts = array('accepted_types' => array('.png', '.jpg', '.gif', '.webp', '.tiff', '.svg'), 'maxfiles' => 1);
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'heroimg', 0, $opts);
    $page->add($setting);

    $name = 'theme_edubs/heroimgonly';
    $title = get_string('heroimgonly', 'theme_edubs');
    $description = get_string('heroimgonly_desc', 'theme_edubs');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $page->add($setting);

    $name = 'theme_edubs/HeroHeading';
    $title = get_string('HeroHeading', 'theme_edubs');
    $description = get_string('HeroHeading_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/HeroText';
    $title = get_string('HeroText', 'theme_edubs');
    $description = get_string('HeroText_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/HeroText2';
    $title = get_string('HeroText2', 'theme_edubs');
    $description = get_string('HeroText2_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/HeroLabel';
    $title = get_string('HeroLabel', 'theme_edubs');
    $description = get_string('HeroLabel_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/HeroURL';
    $title = get_string('HeroURL', 'theme_edubs');
    $description = get_string('HeroURL_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/HeroLabel2';
    $title = get_string('HeroLabel2', 'theme_edubs');
    $description = get_string('HeroLabel2_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/HeroURL2';
    $title = get_string('HeroURL2', 'theme_edubs');
    $description = get_string('HeroURL2_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/HeroHTML';
    $title = get_string('HeroHTML', 'theme_edubs');
    $description = get_string('HeroHTML_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/heromtop';
    $title = get_string('heromtop', 'theme_edubs');
    $description = get_string('heromtop_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/herombottom';
    $title = get_string('herombottom', 'theme_edubs');
    $description = get_string('herombottom_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);


    $name = 'theme_edubs/heroimageheightlg';
    $title = get_string('heroimageheightlg', 'theme_edubs');
    $description = get_string('heroimageheightlg_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/heroimageheightmd';
    $title = get_string('heroimageheightmd', 'theme_edubs');
    $description = get_string('heroimageheightmd_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/heroimageheightsm';
    $title = get_string('heroimageheightsm', 'theme_edubs');
    $description = get_string('heroimageheightsm_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    //Shadow
    $name = 'theme_edubs/heroshadow';
    $title = get_string('heroshadow', 'theme_edubs');
    $description = get_string('heroshadow_desc', 'theme_edubs');
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/heroshadowtype';
    $title = get_string('heroshadowtype', 'theme_edubs');
    $description = get_string('heroshadowtype_desc', 'theme_edubs');
    $options = [];
    $options[1] = get_string('gradient', 'theme_edubs');
    $options[2] = get_string('image', 'theme_edubs');
    $setting = new admin_setting_configselect($name, $title, $description, $default, $options);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/heroshadowcolor1';
    $title = get_string('heroshadowcolor1', 'theme_edubs');
    $description = get_string('heroshadowcolor1_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/heroshadowcolor2';
    $title = get_string('heroshadowcolor2', 'theme_edubs');
    $description = get_string('heroshadowcolor2_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/heroshadowgradientdirection';
    $title = get_string('heroshadowgradientdirection', 'theme_edubs');
    $description = get_string('heroshadowgradientdirection_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/heroshadowimg';
    $title = get_string('heroshadowimg', 'theme_edubs');
    $description = get_string('heroshadowimg_desc', 'theme_edubs');
    $opts = array('accepted_types' => array('.png', '.jpg', '.gif', '.webp', '.tiff', '.svg'), 'maxfiles' => 1);
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'heroshadowimg', 0, $opts);
    $page->add($setting);

    $name = 'theme_edubs/heroshadowimgproperties';
    $title = get_string('heroshadowimgproperties', 'theme_edubs');
    $description = get_string('heroshadowimgproperties_desc', 'theme_edubs');
    $default = 'background-position: center; background-repeat: repeat;';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/heroshadowtopmargin';
    $title = get_string('heroshadowtopmargin', 'theme_edubs');
    $description = get_string('heroshadowtopmargin_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/heroshadowheight';
    $title = get_string('heroshadowheight', 'theme_edubs');
    $description = get_string('heroshadowheight_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    //Shadow end

    //Customization
    $name = 'theme_edubs/HR45';
    $heading = get_string('HR45', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR45_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);

    $name = 'theme_edubs/herocolor';
    $title = get_string('herocolor', 'theme_edubs');
    $description = get_string('herocolor_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/heroh1size';
    $title = get_string('heroh1size', 'theme_edubs');
    $description = get_string('heroh1size_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/heroh3size';
    $title = get_string('heroh3size', 'theme_edubs');
    $description = get_string('heroh3size_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/heroh5size';
    $title = get_string('heroh5size', 'theme_edubs');
    $description = get_string('heroh5size_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);


    $settings->add($page);


    $page = new admin_settingpage('theme_edubs_herovideo', get_string('herovideosettings', 'theme_edubs'));
    // Video
    $name = 'theme_edubs/HR44';
    $heading = get_string('HR44', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR44_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);

    $name = 'theme_edubs/herovideoenabled';
    $title = get_string('herovideoenabled', 'theme_edubs');
    $description = get_string('herovideoenabled_desc', 'theme_edubs');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $page->add($setting);

    $name = 'theme_edubs/herovideofwenabled';
    $title = get_string('herovideofwenabled', 'theme_edubs');
    $description = get_string('herovideofwenabled_desc', 'theme_edubs');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $page->add($setting);

    $name = 'theme_edubs/herovideocontent';
    $title = get_string('herovideocontent', 'theme_edubs');
    $description = get_string('herovideocontent_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/herovideomp4';
    $title = get_string('herovideomp4', 'theme_edubs');
    $description = get_string('herovideomp4_desc', 'theme_edubs');
    $opts = array('accepted_types' => array('.mp4'), 'maxfiles' => 1);
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'herovideomp4', 0, $opts);
    $page->add($setting);

    $name = 'theme_edubs/herovideowebm';
    $title = get_string('herovideowebm', 'theme_edubs');
    $description = get_string('herovideowebm_desc', 'theme_edubs');
    $opts = array('accepted_types' => array('.webm'), 'maxfiles' => 1);
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'herovideowebm', 0, $opts);
    $page->add($setting);

    $settings->add($page);

    $page = new admin_settingpage('theme_edubs_siemaSlider', get_string('siemaSlidersettings', 'theme_edubs'));

    // Enable or disable Slideshow settings.
    $name = 'theme_edubs/sliderenabled';
    $title = get_string('sliderenabled', 'theme_edubs');
    $description = get_string('sliderenabled_desc', 'theme_edubs');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $page->add($setting);

    $name = 'theme_edubs/imgslidesonly';
    $title = get_string('imgslidesonly', 'theme_edubs');
    $description = get_string('imgslidesonly_desc', 'theme_edubs');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $page->add($setting);

    $name = 'theme_edubs/sliderfwenabled';
    $title = get_string('sliderfwenabled', 'theme_edubs');
    $description = get_string('sliderfwenabled_desc', 'theme_edubs');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $page->add($setting);

    $name = 'theme_edubs/sliderloop';
    $title = get_string('sliderloop', 'theme_edubs');
    $description = get_string('sliderloop_desc', 'theme_edubs');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 1);
    $page->add($setting);

    $name = 'theme_edubs/sliderintervalenabled';
    $title = get_string('sliderintervalenabled', 'theme_edubs');
    $description = get_string('sliderintervalenabled_desc', 'theme_edubs');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $page->add($setting);

    $name = 'theme_edubs/sliderinterval';
    $title = get_string('sliderinterval', 'theme_edubs');
    $description = get_string('sliderinterval_desc', 'theme_edubs');
    $default = '6000';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/sliderclickable';
    $title = get_string('sliderclickable', 'theme_edubs');
    $description = get_string('sliderclickable_desc', 'theme_edubs');
    $default = 0;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/rtlslider';
    $title = get_string('rtlslider', 'theme_edubs');
    $description = get_string('rtlslider_desc', 'theme_edubs');
    $default = 0;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/slidercount';
    $title = get_string('slidercount', 'theme_edubs');
    $description = get_string('slidercount_desc', 'theme_edubs');
    $default = 1;
    $options = array();
    for ($i = 1; $i < 11; $i++) {
        $options[$i] = $i;
    }
    $setting = new admin_setting_configselect($name, $title, $description, $default, $options);
    $page->add($setting);

    $slidercount = get_config('theme_edubs', 'slidercount');

    //HR
    $name = 'theme_edubs/HR11';
    $heading = get_string('HR11', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR11_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);


    if (!$slidercount) {
        $slidercount = 1;
    }

    for ($sliderindex = 1; $sliderindex <= $slidercount; $sliderindex++) {
        $fileid = 'sliderimage' . $sliderindex;
        $name = 'theme_edubs/sliderimage' . $sliderindex;
        $title = get_string('sliderimage', 'theme_edubs');
        $description = get_string('sliderimage_desc', 'theme_edubs');
        $opts = array('accepted_types' => array('.png', '.jpg', '.gif', '.webp', '.tiff', '.svg'), 'maxfiles' => 1);
        $setting = new admin_setting_configstoredfile($name, $sliderindex . $title, $description, $fileid, 0, $opts);
        $page->add($setting);

        $name = 'theme_edubs/sliderurl' . $sliderindex;
        $title = get_string('sliderurl', 'theme_edubs');
        $description = get_string('sliderurl_desc', 'theme_edubs');
        $default = '';
        $setting = new admin_setting_configtext($name, $sliderindex . $title, $description, $default);
        $page->add($setting);

        $name = 'theme_edubs/slidertitle' . $sliderindex;
        $title = get_string('slidertitle', 'theme_edubs');
        $description = get_string('slidertitle_desc', 'theme_edubs');
        $default = '';
        $setting = new admin_setting_configtextarea($name, $sliderindex . $title, $description, $default);
        $page->add($setting);

        $name = 'theme_edubs/slidersubtitle' . $sliderindex;
        $title = get_string('slidersubtitle', 'theme_edubs');
        $description = get_string('slidersubtitle_desc', 'theme_edubs');
        $default = '';
        $setting = new admin_setting_configtextarea($name, $sliderindex . $title, $description, $default);
        $page->add($setting);

        $name = 'theme_edubs/slidercap' . $sliderindex;
        $title = get_string('slidercaption', 'theme_edubs');
        $description = get_string('slidercaption_desc', 'theme_edubs');
        $default = '';
        $setting = new admin_setting_configtextarea($name, $sliderindex . $title, $description, $default);
        $page->add($setting);
    }

    $settings->add($page);



    /***
     *
     *    Block #1
     *
     ***/
    $page = new admin_settingpage('theme_edubs_block1', get_string('block1settings', 'theme_edubs'));

    //HR
    $name = 'theme_edubs/HR1';
    $heading = get_string('HR1', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR1_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);

    /***
     *
     *   HTML Block 1
     *
     ***/

    $name = 'theme_edubs/FPHTMLBlock1';
    $title = get_string('FPHTMLBlock1', 'theme_edubs');
    $description = get_string('FPHTMLBlock1_desc', 'theme_edubs');
    $default = 0;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/ShowFPBlock1Intro';
    $title = get_string('ShowFPBlock1Intro', 'theme_edubs');
    $description = get_string('ShowFPBlock1Intro_desc', 'theme_edubs');
    $default = 0;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/FPHTMLBlock1IntroProperties';
    $title = get_string('FPHTMLBlock1IntroProperties', 'theme_edubs');
    $description = get_string('FPHTMLBlock1IntroProperties_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/FPBlock1Title';
    $title = get_string('FPBlock1Title', 'theme_edubs');
    $description = get_string('FPBlock1Title_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/FPBlock1Content';
    $title = get_string('FPBlock1Content', 'theme_edubs');
    $description = get_string('FPBlock1Content_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $page->add($setting);


    $name = 'theme_edubs/FPBlock1FooterContent';
    $title = get_string('FPBlock1FooterContent', 'theme_edubs');
    $description = get_string('FPBlock1FooterContent_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $page->add($setting);



    // Heading
    $name = 'theme_edubs/H2FPHTMLBlock1';
    $heading = get_string('H2FPHTMLBlock1', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('H2FPHTMLBlock1_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);

    $name = 'theme_edubs/FPHTMLBlock1Count';
    $title = get_string('FPHTMLBlock1Count', 'theme_edubs');
    $description = get_string('FPHTMLBlock1Count_desc', 'theme_edubs');
    $default = 3;
    $options = array();
    for ($i = 1; $i <= 60; $i++) {
        $options[$i] = $i;
    }
    $setting = new admin_setting_configselect($name, $title, $description, $default, $options);
    $page->add($setting);

    $fpblock1count = get_config('theme_edubs', 'FPHTMLBlock1Count');

    if (!$fpblock1count) {
        $fpblock1count = 1;
    }

    for ($fpblock1index = 1; $fpblock1index <= $fpblock1count; $fpblock1index++) {

        $name = 'theme_edubs/FPHTMLBlock1Icon' . $fpblock1index;
        $title = get_string('FPHTMLBlock1Icon', 'theme_edubs');
        $description = get_string('FPHTMLBlock1Icon_desc', 'theme_edubs');
        $default = '';
        $setting = new admin_setting_configtext($name, $fpblock1index . $title, $description, $default);
        $page->add($setting);

        $fileid = 'fpblock1image' . $fpblock1index;
        $name = 'theme_edubs/fpblock1image' . $fpblock1index;
        $title = get_string('fpblock1image', 'theme_edubs');
        $description = get_string('fpblock1image_desc', 'theme_edubs');
        $opts = array('accepted_types' => array('.png', '.jpg', '.gif', '.webp', '.tiff', '.svg'), 'maxfiles' => 1);
        $setting = new admin_setting_configstoredfile($name, $fpblock1index . $title, $description, $fileid, 0, $opts);
        $page->add($setting);

        $name = 'theme_edubs/FPHTMLBlock1Heading' . $fpblock1index;
        $title = get_string('FPHTMLBlock1Heading', 'theme_edubs');
        $description = get_string('FPHTMLBlock1Heading_desc', 'theme_edubs');
        $default = '';
        $setting = new admin_setting_configtextarea($name, $fpblock1index . $title, $description, $default);
        $page->add($setting);

        $name = 'theme_edubs/FPHTMLBlock1Text' . $fpblock1index;
        $title = get_string('FPHTMLBlock1Text', 'theme_edubs');
        $description = get_string('FPHTMLBlock1Text_desc', 'theme_edubs');
        $default = '';
        $setting = new admin_setting_confightmleditor($name, $fpblock1index . $title, $description, $default);
        $page->add($setting);

        $name = 'theme_edubs/FPHTMLBlock1ItemBlockProperties' . $fpblock1index;
        $title = get_string('FPHTMLBlock1ItemBlockProperties', 'theme_edubs');
        $description = get_string('FPHTMLBlock1ItemBlockProperties_desc', 'theme_edubs');
        $default = '';
        $setting = new admin_setting_configtext($name, $fpblock1index . $title, $description, $default);
        $page->add($setting);

        $name = 'theme_edubs/FPHTMLBlock1ItemProperties' . $fpblock1index;
        $title = get_string('FPHTMLBlock1ItemProperties', 'theme_edubs');
        $description = get_string('FPHTMLBlock1ItemProperties_desc', 'theme_edubs');
        $default = '';
        $setting = new admin_setting_configtext($name, $fpblock1index . $title, $description, $default);
        $page->add($setting);

    }


    $settings->add($page);


    /***
     *
     *    Block #2
     *
     ***/
    $page = new admin_settingpage('theme_edubs_block2', get_string('block2settings', 'theme_edubs'));
    //HR
    $name = 'theme_edubs/HR2';
    $heading = get_string('HR2', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR2_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);

    /***
     *
     *   HTML Block 2
     *
     ***/
    $name = 'theme_edubs/FPHTMLBlock2';
    $title = get_string('FPHTMLBlock2', 'theme_edubs');
    $description = get_string('FPHTMLBlock2_desc', 'theme_edubs');
    $default = 0;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);


    $name = 'theme_edubs/ShowFPBlock2Intro';
    $title = get_string('ShowFPBlock2Intro', 'theme_edubs');
    $description = get_string('ShowFPBlock2Intro_desc', 'theme_edubs');
    $default = 0;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/FPHTMLBlock2IntroProperties';
    $title = get_string('FPHTMLBlock2IntroProperties', 'theme_edubs');
    $description = get_string('FPHTMLBlock2IntroProperties_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/FPBlock2Title';
    $title = get_string('FPBlock2Title', 'theme_edubs');
    $description = get_string('FPBlock2Title_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/FPBlock2Content';
    $title = get_string('FPBlock2Content', 'theme_edubs');
    $description = get_string('FPBlock2Content_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/FPBlock2FooterContent';
    $title = get_string('FPBlock2FooterContent', 'theme_edubs');
    $description = get_string('FPBlock2FooterContent_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/FPHTMLBlock2Count';
    $title = get_string('FPHTMLBlock2Count', 'theme_edubs');
    $description = get_string('FPHTMLBlock2Count_desc', 'theme_edubs');
    $default = 2;
    $options = array();
    for ($i = 1; $i <= 60; $i++) {
        $options[$i] = $i;
    }
    $setting = new admin_setting_configselect($name, $title, $description, $default, $options);

    $page->add($setting);

    //HR
    $name = 'theme_edubs/HR39';
    $heading = get_string('HR39', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR39_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);

    $fpblock2count = get_config('theme_edubs', 'FPHTMLBlock2Count');

    if (!$fpblock2count) {
        $fpblock2count = 1;
    }

    for ($fpblock2index = 1; $fpblock2index <= $fpblock2count; $fpblock2index++) {

        $fileid = 'fpblock2image' . $fpblock2index;
        $name = 'theme_edubs/fpblock2image' . $fpblock2index;
        $title = get_string('fpblock2image', 'theme_edubs');
        $description = get_string('fpblock2image_desc', 'theme_edubs');
        $opts = array('accepted_types' => array('.png', '.jpg', '.gif', '.webp', '.tiff', '.svg'), 'maxfiles' => 1);
        $setting = new admin_setting_configstoredfile($name, $fpblock2index . $title, $description, $fileid, 0, $opts);
        $page->add($setting);

        $name = 'theme_edubs/FPHTMLBlock2SubHeading' . $fpblock2index;
        $title = get_string('FPHTMLBlock2SubHeading', 'theme_edubs');
        $description = get_string('FPHTMLBlock2SubHeading_desc', 'theme_edubs');
        $default = '';
        $setting = new admin_setting_configtext($name, $fpblock2index . $title, $description, $default);
        $page->add($setting);

        $name = 'theme_edubs/FPHTMLBlock2Heading' . $fpblock2index;
        $title = get_string('FPHTMLBlock2Heading', 'theme_edubs');
        $description = get_string('FPHTMLBlock2Heading_desc', 'theme_edubs');
        $default = '';
        $setting = new admin_setting_confightmleditor($name, $fpblock2index . $title, $description, $default);

        $page->add($setting);

        $name = 'theme_edubs/FPHTMLBlock2Text' . $fpblock2index;
        $title = get_string('FPHTMLBlock2Text', 'theme_edubs');
        $description = get_string('FPHTMLBlock2Text_desc', 'theme_edubs');
        $default = '';
        $setting = new admin_setting_confightmleditor($name, $fpblock2index . $title, $description, $default);

        $page->add($setting);

        $name = 'theme_edubs/FPHTMLBlock2Label' . $fpblock2index;
        $title = get_string('FPHTMLBlock2Label', 'theme_edubs');
        $description = get_string('FPHTMLBlock2Label_desc', 'theme_edubs');
        $default = '';
        $setting = new admin_setting_configtext($name, $fpblock2index . $title, $description, $default);

        $page->add($setting);

        $name = 'theme_edubs/FPHTMLBlock2URL' . $fpblock2index;
        $title = get_string('FPHTMLBlock2URL', 'theme_edubs');
        $description = get_string('FPHTMLBlock2URL_desc', 'theme_edubs');
        $default = '';
        $setting = new admin_setting_configtext($name, $fpblock2index . $title, $description, $default);

        $page->add($setting);

        $name = 'theme_edubs/FPHTMLBlock2ItemBlockProperties' . $fpblock2index;
        $title = get_string('FPHTMLBlock2ItemBlockProperties', 'theme_edubs');
        $description = get_string('FPHTMLBlock2ItemBlockProperties_desc', 'theme_edubs');
        $default = '';
        $setting = new admin_setting_configtext($name, $fpblock2index . $title, $description, $default);

        $page->add($setting);

        $name = 'theme_edubs/FPHTMLBlock2ItemProperties' . $fpblock2index;
        $title = get_string('FPHTMLBlock2ItemProperties', 'theme_edubs');
        $description = get_string('FPHTMLBlock2ItemProperties_desc', 'theme_edubs');
        $default = '';
        $setting = new admin_setting_configtext($name, $fpblock2index . $title, $description, $default);

        $page->add($setting);
    }


    $settings->add($page);


    /***
     *
     *    Block #3
     *
     ***/
    $page = new admin_settingpage('theme_edubs_block3', get_string('block3settings', 'theme_edubs'));
    //HR
    $name = 'theme_edubs/HR3';
    $heading = get_string('HR3', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR3_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);

    /***
     *
     *   HTML Block 3
     *
     ***/
    $name = 'theme_edubs/FPHTMLBlock3';
    $title = get_string('FPHTMLBlock3', 'theme_edubs');
    $description = get_string('FPHTMLBlock3_desc', 'theme_edubs');
    $default = 0;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/FPHTMLBlock3Icon';
    $title = get_string('FPHTMLBlock3Icon', 'theme_edubs');
    $description = get_string('FPHTMLBlock3Icon_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/FPHTMLBlock3Heading';
    $title = get_string('FPHTMLBlock3Heading', 'theme_edubs');
    $description = get_string('FPHTMLBlock3Heading_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/FPHTMLBlock3Text';
    $title = get_string('FPHTMLBlock3Text', 'theme_edubs');
    $description = get_string('FPHTMLBlock3Text_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/FPHTMLBlock3Label';
    $title = get_string('FPHTMLBlock3Label', 'theme_edubs');
    $description = get_string('FPHTMLBlock3Label_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/FPHTMLBlock3URL';
    $title = get_string('FPHTMLBlock3URL', 'theme_edubs');
    $description = get_string('FPHTMLBlock3URL_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/fphtmlblock3bgimg';
    $title = get_string('fphtmlblock3bgimg', 'theme_edubs');
    $description = get_string('fphtmlblock3bgimg_desc', 'theme_edubs');
    $opts = array('accepted_types' => array('.png', '.jpg', '.gif', '.webp', '.tiff', '.svg'));
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'fphtmlblock3bgimg', 0, $opts);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);

    /***
     *
     *    Block #4
     *
     ***/
    $page = new admin_settingpage('theme_edubs_block4', get_string('block4settings', 'theme_edubs'));
    //HR
    $name = 'theme_edubs/HR4';
    $heading = get_string('HR4', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR4_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);


    $name = 'theme_edubs/FPHTMLBlock4';
    $title = get_string('FPHTMLBlock4', 'theme_edubs');
    $description = get_string('FPHTMLBlock4_desc', 'theme_edubs');
    $default = 0;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/FPHTMLBlock4Properties';
    $title = get_string('FPHTMLBlock4Properties', 'theme_edubs');
    $description = get_string('FPHTMLBlock4Properties_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/FPHTMLBlock4Subheading';
    $title = get_string('FPHTMLBlock4Subheading', 'theme_edubs');
    $description = get_string('FPHTMLBlock4Subheading_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/FPHTMLBlock4Heading';
    $title = get_string('FPHTMLBlock4Heading', 'theme_edubs');
    $description = get_string('FPHTMLBlock4Heading_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/FPHTMLBlock4Text';
    $title = get_string('FPHTMLBlock4Text', 'theme_edubs');
    $description = get_string('FPHTMLBlock4Text_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/FPHTMLBlock4Content';
    $title = get_string('FPHTMLBlock4Content', 'theme_edubs');
    $description = get_string('FPHTMLBlock4Content_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $page->add($setting);


    $settings->add($page);


    /***
     *
     *    Block #5
     *
     ***/
    $page = new admin_settingpage('theme_edubs_block5', get_string('block5settings', 'theme_edubs'));
    //HR
    $name = 'theme_edubs/HR';
    $heading = get_string('HR', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);


    /***
     *
     *    Custom Category Block
     *
     ***/
    $name = 'theme_edubs/FPHTMLCustomCategoryBlock';
    $title = get_string('FPHTMLCustomCategoryBlock', 'theme_edubs');
    $description = get_string('FPHTMLCustomCategoryBlock_desc', 'theme_edubs');
    $default = '0';
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/FPHTMLCustomCategoryIcon';
    $title = get_string('FPHTMLCustomCategoryIcon', 'theme_edubs');
    $description = get_string('FPHTMLCustomCategoryIcon_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/FPHTMLCustomCategoryHeading';
    $title = get_string('FPHTMLCustomCategoryHeading', 'theme_edubs');
    $description = get_string('FPHTMLCustomCategoryHeading_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/FPHTMLCustomCategoryContent';
    $title = get_string('FPHTMLCustomCategoryContent', 'theme_edubs');
    $description = get_string('FPHTMLCustomCategoryContent_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/FPHTMLCustomCategoryBlockHTML1';
    $title = get_string('FPHTMLCustomCategoryBlockHTML1', 'theme_edubs');
    $description = get_string('FPHTMLCustomCategoryBlockHTML1_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/FPHTMLCustomCategoryBlockHTML2';
    $title = get_string('FPHTMLCustomCategoryBlockHTML2', 'theme_edubs');
    $description = get_string('FPHTMLCustomCategoryBlockHTML2_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/FPHTMLCustomCategoryBlockHTML3';
    $title = get_string('FPHTMLCustomCategoryBlockHTML3', 'theme_edubs');
    $description = get_string('FPHTMLCustomCategoryBlockHTML3_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $page->add($setting);

    $settings->add($page);



    $page = new admin_settingpage('theme_edubs_logos', get_string('logossettings', 'theme_edubs'));


    //HR
    $name = 'theme_edubs/HRLogo';
    $heading = get_string('HRLogo', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('HRLogo_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);

    $name = 'theme_edubs/FPLogos';
    $title = get_string('FPLogos', 'theme_edubs');
    $description = get_string('FPLogos_desc', 'theme_edubs');
    $default = 0;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/ShowFPLogosIntro';
    $title = get_string('ShowFPLogosIntro', 'theme_edubs');
    $description = get_string('ShowFPLogosIntro_desc', 'theme_edubs');
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/FPLogosProperties';
    $title = get_string('FPLogosProperties', 'theme_edubs');
    $description = get_string('FPLogosProperties_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/FPLogosSubHeading';
    $title = get_string('FPLogosSubHeading', 'theme_edubs');
    $description = get_string('FPLogosSubHeading_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/FPLogosHeading';
    $title = get_string('FPLogosHeading', 'theme_edubs');
    $description = get_string('FPLogosHeading_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/FPLogosText';
    $title = get_string('FPLogosText', 'theme_edubs');
    $description = get_string('FPLogosText_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/FPLogosFooterContent';
    $title = get_string('FPLogosFooterContent', 'theme_edubs');
    $description = get_string('FPLogosFooterContent_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/logosslider';
    $title = get_string('logosslider', 'theme_edubs');
    $description = get_string('logosslider_desc', 'theme_edubs');
    $default = 0;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/logosslidesperrow';
    $title = get_string('logosslidesperrow', 'theme_edubs');
    $description = get_string('logosslidesperrow_desc', 'theme_edubs');
    $default = '4';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/logosperrow';
    $title = get_string('logosperrow', 'theme_edubs');
    $description = get_string('logosperrow_desc', 'theme_edubs');
    $default = 1;
    $options = array();
    $options[1] = '6 per row';
    $options[2] = '4 per row';
    $options[3] = '3 per row';
    $setting = new admin_setting_configselect($name, $title, $description, $default, $options);
    $page->add($setting);

    $name = 'theme_edubs/logoscount';
    $title = get_string('logoscount', 'theme_edubs');
    $description = get_string('logoscount_desc', 'theme_edubs');
    $default = 1;
    $options = array();
    for ($i = 1; $i <= 30; $i++) {
        $options[$i] = $i;
    }
    $setting = new admin_setting_configselect($name, $title, $description, $default, $options);
    $page->add($setting);


    $logoscount = get_config('theme_edubs', 'logoscount');

    //HR
    $name = 'theme_edubs/HR10';
    $heading = get_string('HR10', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR10_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);

    if (!$logoscount) {
        $logoscount = 1;
    }

    for ($logosindex = 1; $logosindex <= $logoscount; $logosindex++) {
        $fileid = 'logosimage' . $logosindex;
        $name = 'theme_edubs/logosimage' . $logosindex;
        $title = get_string('logosimage', 'theme_edubs');
        $description = get_string('logosimage_desc', 'theme_edubs');
        $opts = array('accepted_types' => array('.png', '.jpg', '.gif', '.webp', '.tiff', '.svg'), 'maxfiles' => 1);
        $setting = new admin_setting_configstoredfile($name, $logosindex . $title, $description, $fileid, 0, $opts);
        $page->add($setting);

        $name = 'theme_edubs/logosurl' . $logosindex;
        $title = get_string('logosurl', 'theme_edubs');
        $description = get_string('logosurl_desc', 'theme_edubs');
        $default = '';
        $setting = new admin_setting_configtext($name, $logosindex . $title, $description, $default);
        $page->add($setting);

        $name = 'theme_edubs/logosname' . $logosindex;
        $title = get_string('logosname', 'theme_edubs');
        $description = get_string('logosname_desc', 'theme_edubs');
        $setting = new admin_setting_configtext($name, $logosindex . $title, $description, $default);
        $page->add($setting);

    }

    $settings->add($page);


    $page = new admin_settingpage('theme_edubs_team', get_string('teamsettings', 'theme_edubs'));

    //HR
    $name = 'theme_edubs/HRTeam';
    $heading = get_string('HRTeam', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('HRTeam_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);

    /***
     *
     *   Team
     *
     ***/
    $name = 'theme_edubs/FPTeam';
    $title = get_string('FPTeam', 'theme_edubs');
    $description = get_string('FPTeam_desc', 'theme_edubs');
    $default = 0;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/FPTeamSubHeading';
    $title = get_string('FPTeamSubHeading', 'theme_edubs');
    $description = get_string('FPTeamSubHeading_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/FPTeamHeading';
    $title = get_string('FPTeamHeading', 'theme_edubs');
    $description = get_string('FPTeamHeading_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/FPTeamText';
    $title = get_string('FPTeamText', 'theme_edubs');
    $description = get_string('FPTeamText_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/FPTeamIntroProperties';
    $title = get_string('FPTeamIntroProperties', 'theme_edubs');
    $description = get_string('FPTeamIntroProperties_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/FPTeamFooterContent';
    $title = get_string('FPTeamFooterContent', 'theme_edubs');
    $description = get_string('FPTeamFooterContent_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/teamslider';
    $title = get_string('teamslider', 'theme_edubs');
    $description = get_string('teamslider_desc', 'theme_edubs');
    $default = 0;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/sliderteamloop';
    $title = get_string('sliderteamloop', 'theme_edubs');
    $description = get_string('sliderteamloop_desc', 'theme_edubs');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 1);
    $page->add($setting);

    $name = 'theme_edubs/sliderteamintervalenabled';
    $title = get_string('sliderteamintervalenabled', 'theme_edubs');
    $description = get_string('sliderteamintervalenabled_desc', 'theme_edubs');
    $setting = new admin_setting_configcheckbox($name, $title, $description, 0);
    $page->add($setting);

    $name = 'theme_edubs/sliderteamtextinterval';
    $title = get_string('sliderteamtextinterval', 'theme_edubs');
    $description = get_string('sliderteamtextinterval_desc', 'theme_edubs');
    $default = '6000';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/teamslidesperrow';
    $title = get_string('teamslidesperrow', 'theme_edubs');
    $description = get_string('teamslidesperrow_desc', 'theme_edubs');
    $default = '4';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/teamcount';
    $title = get_string('teamcount', 'theme_edubs');
    $description = get_string('teamcount_desc', 'theme_edubs');
    $default = 1;
    $options = array();
    for ($i = 1; $i <= 60; $i++) {
        $options[$i] = $i;
    }
    $setting = new admin_setting_configselect($name, $title, $description, $default, $options);
    $page->add($setting);

    $teamcount = get_config('theme_edubs', 'teamcount');

    $name = 'theme_edubs/teammemberno';
    $title = get_string('teammemberno', 'theme_edubs');
    $description = get_string('teammemberno_desc', 'theme_edubs');
    $default = 1;
    $options = array();
    $options[1] = '6 per row';
    $options[2] = '4 per row';
    $options[3] = '3 per row';
    $setting = new admin_setting_configselect($name, $title, $description, $default, $options);
    $page->add($setting);


    //HR
    $name = 'theme_edubs/HR9';
    $heading = get_string('HR9', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR9_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);

    if (!$teamcount) {
        $teamcount = 1;
    }

    for ($teamindex = 1; $teamindex <= $teamcount; $teamindex++) {
        $fileid = 'teamimage' . $teamindex;
        $name = 'theme_edubs/teamimage' . $teamindex;
        $title = get_string('teamimage', 'theme_edubs');
        $description = get_string('teamimage_desc', 'theme_edubs');
        $opts = array('accepted_types' => array('.png', '.jpg', '.gif', '.webp', '.tiff', '.svg'), 'maxfiles' => 1);
        $setting = new admin_setting_configstoredfile($name, $teamindex . $title, $description, $fileid, 0, $opts);
        $page->add($setting);

        $name = 'theme_edubs/teamurl' . $teamindex;
        $title = get_string('teamurl', 'theme_edubs');
        $description = get_string('teamurl_desc', 'theme_edubs');
        $default = '';
        $setting = new admin_setting_configtext($name, $teamindex . $title, $description, $default);
        $page->add($setting);

        $name = 'theme_edubs/teamname' . $teamindex;
        $title = get_string('teamname', 'theme_edubs');
        $description = get_string('teamname_desc', 'theme_edubs');
        $setting = new admin_setting_configtext($name, $teamindex . $title, $description, $default);
        $page->add($setting);

        $name = 'theme_edubs/teamtext' . $teamindex;
        $title = get_string('teamtext', 'theme_edubs');
        $description = get_string('teamtext_desc', 'theme_edubs');
        $default = '';
        $setting = new admin_setting_configtextarea($name, $teamindex . $title, $description, $default);
        $page->add($setting);

        $name = 'theme_edubs/teamcustomhtml' . $teamindex;
        $title = get_string('teamcustom', 'theme_edubs');
        $description = get_string('teamcustom_desc', 'theme_edubs');
        $default = '';
        $setting = new admin_setting_configtextarea($name, $teamindex . $title, $description, $default);
        $page->add($setting);
    }

    $settings->add($page);


    /***
     *
     *  FAQ
     */

    $page = new admin_settingpage('theme_edubs_block10', get_string('block10settings', 'theme_edubs'));

    // Heading
    $name = 'theme_edubs/hfpblock10';
    $heading = get_string('hfpblock10', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('hfpblock10_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);

    $name = 'theme_edubs/fpblock10';
    $title = get_string('fpblock10', 'theme_edubs');
    $description = get_string('fpblock10_desc', 'theme_edubs');
    $default = 0;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/showfpblock10intro';
    $title = get_string('showfpblock10intro', 'theme_edubs');
    $description = get_string('showfpblock10intro_desc', 'theme_edubs');
    $default = 0;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/fpblock10title';
    $title = get_string('fpblock10title', 'theme_edubs');
    $description = get_string('fpblock10title_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/fpblock10content';
    $title = get_string('fpblock10content', 'theme_edubs');
    $description = get_string('fpblock10content_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/fpblock10introproperties';
    $title = get_string('fpblock10introproperties', 'theme_edubs');
    $description = get_string('fpblock10introproperties_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/block10footercontent';
    $title = get_string('block10footercontent', 'theme_edubs');
    $description = get_string('block10footercontent_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $page->add($setting);

    // Heading
    $name = 'theme_edubs/h2fpblock10';
    $heading = get_string('h2fpblock10', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('h2fpblock10_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);

    $name = 'theme_edubs/fpblock10count';
    $title = get_string('fpblock10count', 'theme_edubs');
    $description = get_string('fpblock10count_desc', 'theme_edubs');
    $default = 1;
    $options = array();
    for ($i = 1; $i <= 60; $i++) {
        $options[$i] = $i;
    }
    $setting = new admin_setting_configselect($name, $title, $description, $default, $options);
    $page->add($setting);


    $fpblock10count = get_config('theme_edubs', 'fpblock10count');

    if (!$fpblock10count) {
        $fpblock10count = 1;
    }

    for ($block10index = 1; $block10index <= $fpblock10count; $block10index++) {
        $name = 'theme_edubs/fpblock10question' . $block10index;
        $title = get_string('fpblock10question', 'theme_edubs');
        $description = get_string('fpblock10question_desc', 'theme_edubs');
        $default = '';
        $setting = new admin_setting_configtext($name, $block10index . $title, $description, $default);

        $page->add($setting);

        $name = 'theme_edubs/fpblock10answer' . $block10index;
        $title = get_string('fpblock10answer', 'theme_edubs');
        $description = get_string('fpblock10answer_desc', 'theme_edubs');
        $default = '';
        $setting = new admin_setting_configtextarea($name, $block10index . $title, $description, $default);

        $page->add($setting);
    }

    $settings->add($page);



    $page = new admin_settingpage('theme_edubs_block11', get_string('block11settings', 'theme_edubs'));

    // Heading
    $name = 'theme_edubs/hfpblock11';
    $heading = get_string('hfpblock11', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('hfpblock11_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);

    /***
     *
     *   HTML Block 11
     *
     ***/
    $name = 'theme_edubs/fpblock11';
    $title = get_string('fpblock11', 'theme_edubs');
    $description = get_string('fpblock11_desc', 'theme_edubs');
    $default = 0;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/showfpblock11intro';
    $title = get_string('showfpblock11intro', 'theme_edubs');
    $description = get_string('showfpblock11intro_desc', 'theme_edubs');
    $default = 0;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/fpblock11title';
    $title = get_string('fpblock11title', 'theme_edubs');
    $description = get_string('fpblock11title_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/fpblock11content';
    $title = get_string('fpblock11content', 'theme_edubs');
    $description = get_string('fpblock11content_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/fphtmlblock11introclass';
    $title = get_string('fphtmlblock11introclass', 'theme_edubs');
    $description = get_string('fphtmlblock11introclass_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/block11footercontent';
    $title = get_string('block11footercontent', 'theme_edubs');
    $description = get_string('block11footercontent_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $page->add($setting);

    // Heading
    $name = 'theme_edubs/h2fpblock11';
    $heading = get_string('h2fpblock11', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('h2fpblock11_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);

    $name = 'theme_edubs/fpblock11slider';
    $title = get_string('fpblock11slider', 'theme_edubs');
    $description = get_string('fpblock11slider_desc', 'theme_edubs');
    $default = 0;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/fpblock11slidesperrow';
    $title = get_string('fpblock11slidesperrow', 'theme_edubs');
    $description = get_string('fpblock11slidesperrow_desc', 'theme_edubs');
    $default = '4';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/fpblock11count';
    $title = get_string('fpblock11count', 'theme_edubs');
    $description = get_string('fpblock11count_desc', 'theme_edubs');
    $default = 1;
    $options = array();
    for ($i = 1; $i <= 200; $i++) {
        $options[$i] = $i;
    }
    $setting = new admin_setting_configselect($name, $title, $description, $default, $options);

    $page->add($setting);

    $fpblock11count = get_config('theme_edubs', 'fpblock11count');

    if (!$fpblock11count) {
        $fpblock11count = 1;
    }

    for ($fpblock11index = 1; $fpblock11index <= $fpblock11count; $fpblock11index++) {

        $name = 'theme_edubs/showfpblock11subsection' . $fpblock11index;
        $title = get_string('showfpblock11subsection', 'theme_edubs');
        $description = get_string('showfpblock11subsection_desc', 'theme_edubs');
        $default = 0;
        $setting = new admin_setting_configcheckbox($name, $fpblock11index . $title, $description, $default);
        $page->add($setting);

        $name = 'theme_edubs/fpblock11subsectioncontent' . $fpblock11index;
        $title = get_string('fpblock11subsectioncontent', 'theme_edubs');
        $description = get_string('fpblock11subsectioncontent_desc', 'theme_edubs');
        $default = '';
        $setting = new admin_setting_configtextarea($name, $fpblock11index . $title, $description, $default);
        $page->add($setting);


        $fileid = 'fpblock11image' . $fpblock11index;
        $name = 'theme_edubs/fpblock11image' . $fpblock11index;
        $title = get_string('fpblock11image', 'theme_edubs');
        $description = get_string('fpblock11image_desc', 'theme_edubs');
        $opts = array('accepted_types' => array('.png', '.jpg', '.gif', '.webp', '.tiff', '.svg'), 'maxfiles' => 1);
        $setting = new admin_setting_configstoredfile($name, $fpblock11index . $title, $description, $fileid, 0, $opts);

        $page->add($setting);

        $name = 'theme_edubs/fpblock11badge' . $fpblock11index;
        $title = get_string('fpblock11badge', 'theme_edubs');
        $description = get_string('fpblock11badge_desc', 'theme_edubs');
        $default = '';
        $setting = new admin_setting_configtextarea($name, $fpblock11index . $title, $description, $default);

        $page->add($setting);

        $name = 'theme_edubs/fpblock11url' . $fpblock11index;
        $title = get_string('fpblock11url', 'theme_edubs');
        $description = get_string('fpblock11url_desc', 'theme_edubs');
        $default = '';
        $setting = new admin_setting_configtext($name, $fpblock11index . $title, $description, $default);

        $page->add($setting);

        $name = 'theme_edubs/fpblock11coursetitle' . $fpblock11index;
        $title = get_string('fpblock11coursetitle', 'theme_edubs');
        $description = get_string('fpblock11coursetitle_desc', 'theme_edubs');
        $default = '';
        $setting = new admin_setting_configtextarea($name, $fpblock11index . $title, $description, $default);

        $page->add($setting);

        $name = 'theme_edubs/fpblock11desc' . $fpblock11index;
        $title = get_string('fpblock11desc', 'theme_edubs');
        $description = get_string('fpblock11desc_desc', 'theme_edubs');
        $default = '';
        $setting = new admin_setting_configtextarea($name, $fpblock11index . $title, $description, $default);

        $page->add($setting);
    }

    $settings->add($page);


    $page = new admin_settingpage('theme_edubs_block12', get_string('block12settings', 'theme_edubs'));

    // Heading
    $name = 'theme_edubs/hfpblock12';
    $heading = get_string('hfpblock12', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('hfpblock12_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);

    /***
     *
     *   HTML Block 12
     *
     ***/
    $name = 'theme_edubs/fpblock12';
    $title = get_string('fpblock12', 'theme_edubs');
    $description = get_string('fpblock12_desc', 'theme_edubs');
    $default = 0;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/showfpblock12intro';
    $title = get_string('showfpblock12intro', 'theme_edubs');
    $description = get_string('showfpblock12intro_desc', 'theme_edubs');
    $default = 0;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/fpblock12title';
    $title = get_string('fpblock12title', 'theme_edubs');
    $description = get_string('fpblock12title_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/fpblock12content';
    $title = get_string('fpblock12content', 'theme_edubs');
    $description = get_string('fpblock12content_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/fpblock12introclass';
    $title = get_string('fpblock12introclass', 'theme_edubs');
    $description = get_string('fpblock12introclass_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/block12footercontent';
    $title = get_string('block12footercontent', 'theme_edubs');
    $description = get_string('block12footercontent_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $page->add($setting);

    // Heading
    $name = 'theme_edubs/h2fpblock12';
    $heading = get_string('h2fpblock12', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('h2fpblock12_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);

    $name = 'theme_edubs/fpblock12count';
    $title = get_string('fpblock12count', 'theme_edubs');
    $description = get_string('fpblock12count_desc', 'theme_edubs');
    $default = 1;
    $options = array();
    for ($i = 1; $i <= 60; $i++) {
        $options[$i] = $i;
    }
    $setting = new admin_setting_configselect($name, $title, $description, $default, $options);
    $page->add($setting);


    $name = 'theme_edubs/fpblock12grid';
    $title = get_string('fpblock12grid', 'theme_edubs');
    $description = get_string('fpblock12griddesc', 'theme_edubs');
    $default = 0;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/fpblock12slidesperrow';
    $title = get_string('fpblock12slidesperrow', 'theme_edubs');
    $description = get_string('fpblock12slidesperrowdesc', 'theme_edubs');
    $default = '4';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    $fpblock12count = get_config('theme_edubs', 'fpblock12count');

    if (!$fpblock12count) {
        $fpblock12count = 1;
    }

    for ($fpblock12index = 1; $fpblock12index <= $fpblock12count; $fpblock12index++) {
        $fileid = 'fpblock12image' . $fpblock12index;
        $name = 'theme_edubs/fpblock12image' . $fpblock12index;
        $title = get_string('fpblock12image', 'theme_edubs');
        $description = get_string('fpblock12image_desc', 'theme_edubs');
        $opts = array('accepted_types' => array('.png', '.jpg', '.gif', '.webp', '.tiff', '.svg'), 'maxfiles' => 1);
        $setting = new admin_setting_configstoredfile($name, $fpblock12index . $title, $description, $fileid, 0, $opts);

        $page->add($setting);

        $name = 'theme_edubs/fpblock12html' . $fpblock12index;
        $title = get_string('fpblock12html', 'theme_edubs');
        $description = get_string('fpblock12html_desc', 'theme_edubs');
        $default = '';
        $setting = new admin_setting_configtextarea($name, $fpblock12index . $title, $description, $default);

        $page->add($setting);

        $name = 'theme_edubs/fpblock12first' . $fpblock12index;
        $title = get_string('fpblock12first', 'theme_edubs');
        $description = get_string('fpblock12first_desc', 'theme_edubs');
        $default = '';
        $setting = new admin_setting_configtextarea($name, $fpblock12index . $title, $description, $default);

        $page->add($setting);

        $name = 'theme_edubs/fpblock12second' . $fpblock12index;
        $title = get_string('fpblock12second', 'theme_edubs');
        $description = get_string('fpblock12second_desc', 'theme_edubs');
        $default = '';
        $setting = new admin_setting_configtextarea($name, $fpblock12index . $title, $description, $default);

        $page->add($setting);

        $name = 'theme_edubs/fpblock12third' . $fpblock12index;
        $title = get_string('fpblock12third', 'theme_edubs');
        $description = get_string('fpblock12third_desc', 'theme_edubs');
        $default = '';
        $setting = new admin_setting_configtextarea($name, $fpblock12index . $title, $description, $default);

        $page->add($setting);
    }

    $settings->add($page);

    /***
     *
     *   Top Bar
     *
     ***/
    $page = new admin_settingpage('theme_edubs_topbar', get_string('topbarsettings', 'theme_edubs'));

    //HR
    $name = 'theme_edubs/HR24';
    $heading = get_string('HR24', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR24_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);

    $name = 'theme_edubs/topBarOffsetTop';
    $title = get_string('topBarOffsetTop', 'theme_edubs');
    $description = get_string('topBarOffsetTop_desc', 'theme_edubs');
    $default = '300';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

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

    // Top Bar Logo
    $name = 'theme_edubs/customlogotopbar';
    $title = get_string('customlogotopbar', 'theme_edubs');
    $description = get_string('customlogotopbar_desc', 'theme_edubs');
    $opts = array('accepted_types' => array('.png', '.jpg', '.svg', 'gif'));
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'customlogotopbar', 0, $opts);
    $page->add($setting);

    $name = 'theme_edubs/mobiletopbarlogo';
    $title = get_string('mobiletopbarlogo', 'theme_edubs');
    $description = get_string('mobiletopbarlogo_desc', 'theme_edubs');
    $opts = array('accepted_types' => array('.png', '.jpg', '.svg', 'gif'));
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'mobiletopbarlogo', 0, $opts);
    $page->add($setting);

    $name = 'theme_edubs/ShowTopBarUserName';
    $title = get_string('ShowTopBarUserName', 'theme_edubs');
    $description = get_string('ShowTopBarUserName_desc', 'theme_edubs');
    $default = '0';
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);

    //HR
    $name = 'theme_edubs/HRTopBar';
    $heading = get_string('HRTopBar', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('HRTopBar_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);

    // Top Bar Text
    $name = 'theme_edubs/TopBarText';
    $title = get_string('TopBarText', 'theme_edubs');
    $description = get_string('TopBarText_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $page->add($setting);

    //HR
    $name = 'theme_edubs/HR16';
    $heading = get_string('HR16', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR16_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);

    //HR
    $name = 'theme_edubs/HRCustomNav';
    $heading = get_string('HRCustomNav', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('HRCustomNav_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);

    // Custom nav
    $name = 'theme_edubs/customtopnavhtml';
    $title = get_string('customtopnavhtml', 'theme_edubs');
    $description = get_string('customtopnavhtml_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $page->add($setting);

    /***
     *
     *   Custom navigation
     *
     ***/

    $name = 'theme_edubs/ShowCustomNav';
    $title = get_string('ShowCustomNav', 'theme_edubs');
    $description = get_string('ShowCustomNav_desc', 'theme_edubs');
    $default = '0';
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);

    // Custom nav Icon
    $name = 'theme_edubs/CustomNavIcon';
    $title = get_string('CustomNavIcon', 'theme_edubs');
    $description = get_string('CustomNavIcon_desc', 'theme_edubs');
    $default = '<i class="fas fa-grip-vertical"></i>';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $page->add($setting);

    // Custom nav
    $name = 'theme_edubs/CustomNavHTML';
    $title = get_string('CustomNavHTML', 'theme_edubs');
    $description = get_string('CustomNavHTML_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $page->add($setting);

    // Extra Custom Nav
    $name = 'theme_edubs/ExtraCustomNavHTML';
    $title = get_string('ExtraCustomNavHTML', 'theme_edubs');
    $description = get_string('ExtraCustomNavHTML_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $page->add($setting);

    $settings->add($page);








    /***
     *
     *   Sidebar
     *
     ***/
    $page = new admin_settingpage('theme_edubs_sidebar', get_string('sidebarsettings', 'theme_edubs'));


    // Show/hide logo
    $name = 'theme_edubs/showsidebarlogo';
    $title = get_string('showsidebarlogo', 'theme_edubs');
    $description = get_string('showsidebarlogo_desc', 'theme_edubs');
    $default = 1;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/customrooturl';
    $title = get_string('customrooturl', 'theme_edubs');
    $description = get_string('customrooturl_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/customlogosidebar';
    $title = get_string('customlogosidebar', 'theme_edubs');
    $description = get_string('customlogosidebar_desc', 'theme_edubs');
    $opts = array('accepted_types' => array('.png', '.jpg', '.svg', '.gif'));
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'customlogosidebar', 0, $opts);
    $page->add($setting);

    // Sidebar Button
    $name = 'theme_edubs/SidebarButtonIconOpen';
    $title = get_string('SidebarButtonIconOpen', 'theme_edubs');
    $description = get_string('SidebarButtonIconOpen_desc', 'theme_edubs');
    $default = '<i class="fas fa-indent opened"></i>';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/SidebarButtonIconClose';
    $title = get_string('SidebarButtonIconClose', 'theme_edubs');
    $description = get_string('SidebarButtonIconClose_desc', 'theme_edubs');
    $default = '<i class="fas fa-outdent closed"></i>';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);


    $name = 'theme_edubs/SidebarCustomHTML';
    $title = get_string('SidebarCustomHTML', 'theme_edubs');
    $description = get_string('SidebarCustomHTML_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $page->add($setting);


    // Expand my coruses
    $name = 'theme_edubs/showmycourses';
    $title = get_string('showmycourses', 'theme_edubs');
    $description = get_string('showmycourses_desc', 'theme_edubs');
    $default = 0;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);


    //HR
    $name = 'theme_edubs/HR13';
    $heading = get_string('HR13', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR13_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);

    // Sidebar Custom Heading and Text
    $name = 'theme_edubs/SidebarCustomBox';
    $title = get_string('SidebarCustomBox', 'theme_edubs');
    $description = get_string('SidebarCustomBox_desc', 'theme_edubs');
    $default = 0;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);

    // Sidebar Custom Heading
    $name = 'theme_edubs/SidebarCustomHeading';
    $title = get_string('SidebarCustomHeading', 'theme_edubs');
    $description = get_string('SidebarCustomHeading_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    // Sidebar Custom Text.
    $name = 'theme_edubs/SidebarCustomText';
    $title = get_string('SidebarCustomText', 'theme_edubs');
    $description = get_string('SidebarCustomText_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $page->add($setting);

    //HR
    $name = 'theme_edubs/HR12';
    $heading = get_string('HR12', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR12_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);

    // Sidebar Custom Nav
    $name = 'theme_edubs/SidebarCustomNav';
    $title = get_string('SidebarCustomNav', 'theme_edubs');
    $description = get_string('SidebarCustomNav_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);

    // Sidebar Custom Navigation Title.
    $name = 'theme_edubs/SidebarCustomNavTitle';
    $title = get_string('SidebarCustomNavTitle', 'theme_edubs');
    $description = get_string('SidebarCustomNavTitle_desc', 'theme_edubs');
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);

    // Sidebar Custom Navigation Links.
    $name = 'theme_edubs/SidebarCustomNavigationLinks';
    $title = get_string('SidebarCustomNavigationLinks', 'theme_edubs');
    $description = get_string('SidebarCustomNavigationLinks_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $page->add($setting);


    //HR
    $name = 'theme_edubs/HR25';
    $heading = get_string('HR25', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR25_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);

    // Colors
    $name = 'theme_edubs/drawerbg';
    $title = get_string('drawerbg', 'theme_edubs');
    $description = get_string('drawerbg_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $page->add($setting);

    $name = 'theme_edubs/drawernavboxbg';
    $title = get_string('drawernavboxbg', 'theme_edubs');
    $description = get_string('drawernavboxbg_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/drawernavboxshadow';
    $title = get_string('drawernavboxshadow', 'theme_edubs');
    $description = get_string('drawernavboxshadow_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/drawernavitemactive';
    $title = get_string('drawernavitemactive', 'theme_edubs');
    $description = get_string('drawernavitemactive_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/drawernavitemhover';
    $title = get_string('drawernavitemhover', 'theme_edubs');
    $description = get_string('drawernavitemhover_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/drawernavitemtextcolor';
    $title = get_string('drawernavitemtextcolor', 'theme_edubs');
    $description = get_string('drawernavitemtextcolor_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/drawernavitemtextcolorhover';
    $title = get_string('drawernavitemtextcolorhover', 'theme_edubs');
    $description = get_string('drawernavitemtextcolorhover_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/drawernavitemtextcoloractive';
    $title = get_string('drawernavitemtextcoloractive', 'theme_edubs');
    $description = get_string('drawernavitemtextcoloractive_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/drawernavitemicon';
    $title = get_string('drawernavitemicon', 'theme_edubs');
    $description = get_string('drawernavitemicon_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/drawernavitemiconactive';
    $title = get_string('drawernavitemiconactive', 'theme_edubs');
    $description = get_string('drawernavitemiconactive_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/drawernavitemiconhover';
    $title = get_string('drawernavitemiconhover', 'theme_edubs');
    $description = get_string('drawernavitemiconhover_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/drawernavitemiconopacity';
    $title = get_string('drawernavitemiconopacity', 'theme_edubs');
    $description = get_string('drawernavitemiconopacity_desc', 'theme_edubs');
    $default = '0.5';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/drawerheading';
    $title = get_string('drawerheading', 'theme_edubs');
    $description = get_string('drawerheading_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/drawertext';
    $title = get_string('drawertext', 'theme_edubs');
    $description = get_string('drawertext_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/drawerlink';
    $title = get_string('drawerlink', 'theme_edubs');
    $description = get_string('drawerlink_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/drawerlinkhover';
    $title = get_string('drawerlinkhover', 'theme_edubs');
    $description = get_string('drawerlinkhover_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/drawerlinkhoverbg';
    $title = get_string('drawerlinkhoverbg', 'theme_edubs');
    $description = get_string('drawerlinkhoverbg_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/drawerhr';
    $title = get_string('drawerhr', 'theme_edubs');
    $description = get_string('drawerhr_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/drawernaviconsize';
    $title = get_string('drawernaviconsize', 'theme_edubs');
    $description = get_string('drawernaviconsize_desc', 'theme_edubs');
    $setting = new admin_setting_configtext($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/drawernaviconwidth';
    $title = get_string('drawernaviconwidth', 'theme_edubs');
    $description = get_string('drawernaviconwidth_desc', 'theme_edubs');
    $setting = new admin_setting_configtext($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/drawernaviconfontsize';
    $title = get_string('drawernaviconfontsize', 'theme_edubs');
    $description = get_string('drawernaviconfontsize_desc', 'theme_edubs');
    $setting = new admin_setting_configtext($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/drawerwidth';
    $title = get_string('drawerwidth', 'theme_edubs');
    $description = get_string('drawerwidth_desc', 'theme_edubs');
    $setting = new admin_setting_configtext($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
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

    //HR
    $name = 'theme_edubs/HRFooter';
    $heading = get_string('HRFooter', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('HRFooter_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);

    $name = 'theme_edubs/showsociallist';
    $title = get_string('showsociallist', 'theme_edubs');
    $description = get_string('showsociallist_desc', 'theme_edubs');
    $default = '0';
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
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

    // Cutsom icons setting.
    $name = 'theme_edubs/customsocialicon';
    $title = get_string('customsocialicon', 'theme_edubs');
    $description = get_string('customsocialicon_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
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



    //HR
    $name = 'theme_edubs/HR5';
    $heading = get_string('HR5', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR5_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);



    // Custom Alert
    $name = 'theme_edubs/CustomAlert';
    $title = get_string('CustomAlert', 'theme_edubs');
    $description = get_string('CustomAlert_desc', 'theme_edubs');
    $default = '0';
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/CustomAlertContent';
    $title = get_string('CustomAlertContent', 'theme_edubs');
    $description = get_string('CustomAlertContent_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/CustomAlertButton';
    $title = get_string('CustomAlertButton', 'theme_edubs');
    $description = get_string('CustomAlertButton_desc', 'theme_edubs');
    $default = '<i class="fas fa-times" ></i>';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $page->add($setting);





    //HR
    $name = 'theme_edubs/HR38';
    $heading = get_string('HR38', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR38_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);


    // Colors
    $name = 'theme_edubs/footerbg';
    $title = get_string('footerbg', 'theme_edubs');
    $description = get_string('footerbg_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/footertextcolor';
    $title = get_string('footertextcolor', 'theme_edubs');
    $description = get_string('footertextcolor_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/footernavigationheading';
    $title = get_string('footernavigationheading', 'theme_edubs');
    $description = get_string('footernavigationheading_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/footernavigationborder';
    $title = get_string('footernavigationborder', 'theme_edubs');
    $description = get_string('footernavigationborder_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/footernavigationlinkcolor';
    $title = get_string('footernavigationlinkcolor', 'theme_edubs');
    $description = get_string('footernavigationlinkcolor_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/footernavigationlinkcolorhover';
    $title = get_string('footernavigationlinkcolorhover', 'theme_edubs');
    $description = get_string('footernavigationlinkcolorhover_desc', 'theme_edubs');
    $setting = new admin_setting_configcolourpicker($name, $title, $description, '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);



    /***
     *
     *  Advanced Settings
     *
     ***/
    $page = new admin_settingpage('theme_edubs_advanced', get_string('advancedsettings', 'theme_edubs'));
    $name = 'theme_edubs/ShowLoader';
    $title = get_string('ShowLoader', 'theme_edubs');
    $description = get_string('ShowLoader_desc', 'theme_edubs');
    $default = 0;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);


    // Google analytics block.
    $name = 'theme_edubs/googleanalytics';
    $title = get_string('googleanalytics', 'theme_edubs');
    $description = get_string('googleanalytics_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $page->add($setting);


    //HR
    $name = 'theme_edubs/HR50';
    $heading = get_string('HR50', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR50_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);

    // Custom modal
    $name = 'theme_edubs/CustomModal';
    $title = get_string('CustomModal', 'theme_edubs');
    $description = get_string('CustomModal_desc', 'theme_edubs');
    $default = '0';
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/CustomModalContent';
    $title = get_string('CustomModalContent', 'theme_edubs');
    $description = get_string('CustomModalContent_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/CustomModalContentHTML';
    $title = get_string('CustomModalContentHTML', 'theme_edubs');
    $description = get_string('CustomModalContentHTML_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $page->add($setting);



    //HR
    $name = 'theme_edubs/HR6';
    $heading = get_string('HR6', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR6_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);



    // Raw SCSS to include before the content.
    $setting = new admin_setting_scsscode('theme_edubs/scsspre',
        get_string('rawscsspre', 'theme_edubs'), get_string('rawscsspre_desc', 'theme_edubs'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Raw SCSS to include after the content.
    $setting = new admin_setting_scsscode('theme_edubs/scss', get_string('rawscss', 'theme_edubs'),
        get_string('rawscss_desc', 'theme_edubs'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/additionalheadhtml';
    $title = get_string('additionalheadhtml', 'theme_edubs');
    $description = get_string('additionalheadhtml_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $page->add($setting);

    $name = 'theme_edubs/additionalfooterhtml';
    $title = get_string('additionalfooterhtml', 'theme_edubs');
    $description = get_string('additionalfooterhtml_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $page->add($setting);




    //HR
    $name = 'theme_edubs/HR7';
    $heading = get_string('HR7', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR7_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);





    // Google Font.
    $name = 'theme_edubs/googlefonturl';
    $title = get_string('googlefonturl', 'theme_edubs');
    $description = get_string('googlefonturl_desc', 'theme_edubs');
    $default = 'https://fonts.googleapis.com/css?family=Poppins:300,400,500,700';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    //HR
    $name = 'theme_edubs/HR17';
    $heading = get_string('HR17', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR17_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);

    $name = 'theme_edubs/googlefontname';
    $title = get_string('googlefontname', 'theme_edubs');
    $description = get_string('googlefontname_desc', 'theme_edubs');
    $default = "'Poppins', sans-serif";
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/fontweightlight';
    $title = get_string('fontweightlight', 'theme_edubs');
    $description = get_string('fontweightlight_desc', 'theme_edubs');
    $default = '300';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/fontweightregular';
    $title = get_string('fontweightregular', 'theme_edubs');
    $description = get_string('fontweightregular_desc', 'theme_edubs');
    $default = '400';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/fontweightmedium';
    $title = get_string('fontweightmedium', 'theme_edubs');
    $description = get_string('fontweightmedium_desc', 'theme_edubs');
    $default = '500';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/fontweightbold';
    $title = get_string('fontweightbold', 'theme_edubs');
    $description = get_string('fontweightbold_desc', 'theme_edubs');
    $default = '700';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);


    //HR
    $name = 'theme_edubs/HR48';
    $heading = get_string('HR48', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR48_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);

    $name = 'theme_edubs/morefonts';
    $title = get_string('morefonts', 'theme_edubs');
    $description = get_string('morefonts_desc', 'theme_edubs');
    $default = 0;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/fontcount';
    $title = get_string('fontcount', 'theme_edubs');
    $description = get_string('fontcount_desc', 'theme_edubs');
    $default = 1;
    $options = array();
    for ($i = 1; $i <= 5; $i++) {
        $options[$i] = $i;
    }
    $setting = new admin_setting_configselect($name, $title, $description, $default, $options);
    $page->add($setting);

    $fontcount = get_config('theme_edubs', 'fontcount');

    if (!$fontcount) {
        $fontcount = 1;
    }

    for ($fontindex = 1; $fontindex <= $fontcount; $fontindex++) {
        $name = 'theme_edubs/additionalfontname' . $fontindex;
        $title = get_string('additionalfontname', 'theme_edubs');
        $description = get_string('additionalfontname_desc', 'theme_edubs');
        $default = '';
        $setting = new admin_setting_configtext($name, $fontindex . $title, $description, $default);
        $page->add($setting);

        $name = 'theme_edubs/langcode' . $fontindex;
        $title = get_string('langcode', 'theme_edubs');
        $description = get_string('langcode_desc', 'theme_edubs');
        $setting = new admin_setting_configtext($name, $fontindex . $title, $description, $default);
        $page->add($setting);
    }


    //HR
    $name = 'theme_edubs/HR8';
    $heading = get_string('HR8', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR8_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);


    // Custom Font
    $name = 'theme_edubs/CustomWebFont';
    $title = get_string('CustomWebFont', 'theme_edubs');
    $description = get_string('CustomWebFont_desc', 'theme_edubs');
    $default = 0;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/additionalcustomfont';
    $title = get_string('additionalcustomfont', 'theme_edubs');
    $description = get_string('additionalcustomfont_desc', 'theme_edubs');
    $default = 0;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/CustomWebFontHTML';
    $title = get_string('CustomWebFontHTML', 'theme_edubs');
    $description = get_string('CustomWebFontHTML_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);



    //HR
    $name = 'theme_edubs/HR18';
    $heading = get_string('HR18', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR18_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);

    $name = 'theme_edubs/CustomWebFontSH';
    $title = get_string('CustomWebFontSH', 'theme_edubs');
    $description = get_string('CustomWebFontSH_desc', 'theme_edubs');
    $default = 0;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    //HR
    $name = 'theme_edubs/HR19';
    $heading = get_string('HR19', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR19_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);

    $name = 'theme_edubs/customfontlightname';
    $title = get_string('customfontlightname', 'theme_edubs');
    $description = get_string('customfontlightname_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/customfontlighteot';
    $title = get_string('customfontlighteot', 'theme_edubs');
    $description = get_string('customfontlighteot_desc', 'theme_edubs');
    $opts = array('accepted_types' => array('.eot'), 'maxfiles' => 1);
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'customfontlighteot', 0, $opts);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/customfontlightwoff';
    $title = get_string('customfontlightwoff', 'theme_edubs');
    $description = get_string('customfontlightwoff_desc', 'theme_edubs');
    $opts = array('accepted_types' => array('.woff'), 'maxfiles' => 1);
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'customfontlightwoff', 0, $opts);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/customfontlightwoff2';
    $title = get_string('customfontlightwoff2', 'theme_edubs');
    $description = get_string('customfontlightwoff2_desc', 'theme_edubs');
    $opts = array('accepted_types' => array('.woff2'), 'maxfiles' => 1);
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'customfontlightwoff2', 0, $opts);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/customfontlightttf';
    $title = get_string('customfontlightttf', 'theme_edubs');
    $description = get_string('customfontlightttf_desc', 'theme_edubs');
    $opts = array('accepted_types' => array('.ttf'), 'maxfiles' => 1);
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'customfontlightttf', 0, $opts);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/customfontlightsvg';
    $title = get_string('customfontlightsvg', 'theme_edubs');
    $description = get_string('customfontlightsvg_desc', 'theme_edubs');
    $opts = array('accepted_types' => array('.svg'), 'maxfiles' => 1);
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'customfontlightsvg', 0, $opts);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);


    //HR
    $name = 'theme_edubs/HR20';
    $heading = get_string('HR20', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR20_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);


    $name = 'theme_edubs/customfontregularname';
    $title = get_string('customfontregularname', 'theme_edubs');
    $description = get_string('customfontregularname_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/customfontregulareot';
    $title = get_string('customfontregulareot', 'theme_edubs');
    $description = get_string('customfontregulareot_desc', 'theme_edubs');
    $opts = array('accepted_types' => array('.eot'), 'maxfiles' => 1);
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'customfontregulareot', 0, $opts);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/customfontregularwoff';
    $title = get_string('customfontregularwoff', 'theme_edubs');
    $description = get_string('customfontregularwoff_desc', 'theme_edubs');
    $opts = array('accepted_types' => array('.woff'), 'maxfiles' => 1);
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'customfontregularwoff', 0, $opts);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/customfontregularwoff2';
    $title = get_string('customfontregularwoff2', 'theme_edubs');
    $description = get_string('customfontregularwoff2_desc', 'theme_edubs');
    $opts = array('accepted_types' => array('.woff2'), 'maxfiles' => 1);
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'customfontregularwoff2', 0, $opts);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/customfontregularttf';
    $title = get_string('customfontregularttf', 'theme_edubs');
    $description = get_string('customfontregularttf_desc', 'theme_edubs');
    $opts = array('accepted_types' => array('.ttf'), 'maxfiles' => 1);
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'customfontregularttf', 0, $opts);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/customfontregularsvg';
    $title = get_string('customfontregularsvg', 'theme_edubs');
    $description = get_string('customfontregularsvg_desc', 'theme_edubs');
    $opts = array('accepted_types' => array('.svg'), 'maxfiles' => 1);
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'customfontregularsvg', 0, $opts);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    //HR
    $name = 'theme_edubs/HR21';
    $heading = get_string('HR21', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR21_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);

    $name = 'theme_edubs/customfontmediumname';
    $title = get_string('customfontmediumname', 'theme_edubs');
    $description = get_string('customfontmediumname_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/customfontmediumeot';
    $title = get_string('customfontmediumeot', 'theme_edubs');
    $description = get_string('customfontmediumeot_desc', 'theme_edubs');
    $opts = array('accepted_types' => array('.eot'), 'maxfiles' => 1);
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'customfontmediumeot', 0, $opts);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/customfontmediumwoff';
    $title = get_string('customfontmediumwoff', 'theme_edubs');
    $description = get_string('customfontmediumwoff_desc', 'theme_edubs');
    $opts = array('accepted_types' => array('.woff'), 'maxfiles' => 1);
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'customfontmediumwoff', 0, $opts);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/customfontmediumwoff2';
    $title = get_string('customfontmediumwoff2', 'theme_edubs');
    $description = get_string('customfontmediumwoff2_desc', 'theme_edubs');
    $opts = array('accepted_types' => array('.woff2'), 'maxfiles' => 1);
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'customfontmediumwoff2', 0, $opts);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/customfontmediumttf';
    $title = get_string('customfontmediumttf', 'theme_edubs');
    $description = get_string('customfontmediumttf_desc', 'theme_edubs');
    $opts = array('accepted_types' => array('.ttf'), 'maxfiles' => 1);
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'customfontmediumttf', 0, $opts);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/customfontmediumsvg';
    $title = get_string('customfontmediumsvg', 'theme_edubs');
    $description = get_string('customfontmediumsvg_desc', 'theme_edubs');
    $opts = array('accepted_types' => array('.svg'), 'maxfiles' => 1);
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'customfontmediumsvg', 0, $opts);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    //HR
    $name = 'theme_edubs/HR22';
    $heading = get_string('HR22', 'theme_edubs');
    $setting = new admin_setting_heading($name, $heading, format_text(get_string('HR22_desc', 'theme_edubs'), FORMAT_MARKDOWN));
    $page->add($setting);

    $name = 'theme_edubs/customfontboldname';
    $title = get_string('customfontboldname', 'theme_edubs');
    $description = get_string('customfontboldname_desc', 'theme_edubs');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/customfontboldeot';
    $title = get_string('customfontboldeot', 'theme_edubs');
    $description = get_string('customfontboldeot_desc', 'theme_edubs');
    $opts = array('accepted_types' => array('.eot'), 'maxfiles' => 1);
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'customfontboldeot', 0, $opts);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/customfontboldwoff';
    $title = get_string('customfontboldwoff', 'theme_edubs');
    $description = get_string('customfontboldwoff_desc', 'theme_edubs');
    $opts = array('accepted_types' => array('.woff'), 'maxfiles' => 1);
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'customfontboldwoff', 0, $opts);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/customfontboldwoff2';
    $title = get_string('customfontboldwoff2', 'theme_edubs');
    $description = get_string('customfontboldwoff2_desc', 'theme_edubs');
    $opts = array('accepted_types' => array('.woff2'), 'maxfiles' => 1);
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'customfontboldwoff2', 0, $opts);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/customfontboldttf';
    $title = get_string('customfontboldttf', 'theme_edubs');
    $description = get_string('customfontboldttf_desc', 'theme_edubs');
    $opts = array('accepted_types' => array('.ttf'), 'maxfiles' => 1);
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'customfontboldttf', 0, $opts);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $name = 'theme_edubs/customfontboldsvg';
    $title = get_string('customfontboldsvg', 'theme_edubs');
    $description = get_string('customfontboldsvg_desc', 'theme_edubs');
    $opts = array('accepted_types' => array('.svg'), 'maxfiles' => 1);
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'customfontboldsvg', 0, $opts);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);
}
