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

// This line protects the file from being accessed by a URL directly.
defined('MOODLE_INTERNAL') || die();

//$ccnFontList = include($CFG->dirroot . '/theme/edubs/ccn/font_handler/ccn_font_select.php');

// This is used for performance, we don't need to know about these settings on every page in Moodle, only when
// we are looking at the admin settings pages.
if ($ADMIN->fulltree) {

    // Boost provides a nice setting page which splits settings onto separate tabs. We want to use it here.
    $settings = new theme_boost_admin_settingspage_tabs('themesettingedubs', get_string('configtitle', 'theme_edubs'));

    // CCN General settings
    $page = new admin_settingpage('theme_edubs_general', get_string('general_settings', 'theme_edubs'));

    // Blog style
    $setting = new admin_setting_configselect('theme_edubs/blogstyle',
        get_string('blogstyle', 'theme_edubs'),
        get_string('blogstyle_desc', 'theme_edubs'), null,
        array('1' => 'Blog style 1',
            '2' => 'Blog style 2',
            '3' => 'Blog style 3'
        ));
    $page->add($setting);

    // Back to Top
    $setting = new admin_setting_configselect('theme_edubs/back_to_top',
        get_string('back_to_top', 'theme_edubs'),
        get_string('back_to_top_desc', 'theme_edubs'), null,
        array('0' => 'Visible',
            '1' => 'Hidden'
        ));
    $page->add($setting);


    // Favicon
    $name='theme_edubs/favicon';
    $title = get_string('favicon', 'theme_edubs');
    $description = get_string('favicon_desc', 'theme_edubs');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'favicon');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);

    // CCN Logo settings
    $page = new admin_settingpage('theme_edubs_logo', get_string('logo_settings', 'theme_edubs'));

    // Header logos
    $page->add(new admin_setting_heading('theme_edubs/header_logos', get_string('header_logos', 'theme_edubs'), NULL));

    // Logotype
    $setting = new admin_setting_configselect('theme_edubs/logotype',
        get_string('logotype', 'theme_edubs'),
        get_string('logotype_desc', 'theme_edubs'), null,
        array('0' => 'Visible',
            '1' => 'Hidden'
        ));
    $page->add($setting);

    // Logo image
    $setting = new admin_setting_configselect('theme_edubs/logo_image',
        get_string('logo_image', 'theme_edubs'),
        get_string('logo_image_desc', 'theme_edubs'), null,
        array('0' => 'Visible',
            '1' => 'Hidden'
        ));
    $page->add($setting);

    // Logo Image Width
    $setting = new admin_setting_configtext('theme_edubs/logo_image_width', get_string('logo_image_width','theme_edubs'), get_string('logo_image_width_desc', 'theme_edubs'), '', PARAM_NOTAGS, 50);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Logo Image Height
    $setting = new admin_setting_configtext('theme_edubs/logo_image_height', get_string('logo_image_height','theme_edubs'), get_string('logo_image_height_desc', 'theme_edubs'), '', PARAM_NOTAGS, 50);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Header logo 1
    $name='theme_edubs/headerlogo1';
    $title = get_string('headerlogo1', 'theme_edubs');
    $description = get_string('headerlogo1_desc', 'theme_edubs');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'headerlogo1');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Header logo 2
    $name='theme_edubs/headerlogo2';
    $title = get_string('headerlogo2', 'theme_edubs');
    $description = get_string('headerlogo2_desc', 'theme_edubs');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'headerlogo2');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Header logo 3
    $name='theme_edubs/headerlogo3';
    $title = get_string('headerlogo3', 'theme_edubs');
    $description = get_string('headerlogo3_desc', 'theme_edubs');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'headerlogo3');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Header logo mobile
    $name='theme_edubs/headerlogo_mobile';
    $title = get_string('headerlogo_mobile', 'theme_edubs');
    $description = get_string('headerlogo_mobile_desc', 'theme_edubs');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'headerlogo_mobile');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Footer logos
    $page->add(new admin_setting_heading('theme_edubs/footer_logos', get_string('footer_logos', 'theme_edubs'), NULL));

    // Logotype Footer
    $setting = new admin_setting_configselect('theme_edubs/logotype_footer',
        get_string('logotype_footer', 'theme_edubs'),
        get_string('logotype_footer_desc', 'theme_edubs'), null,
        array('0' => 'Visible',
            '1' => 'Hidden'
        ));
    $page->add($setting);

    // Logo image Footer
    $setting = new admin_setting_configselect('theme_edubs/logo_image_footer',
        get_string('logo_image_footer', 'theme_edubs'),
        get_string('logo_image_footer_desc', 'theme_edubs'), null,
        array('0' => 'Visible',
            '1' => 'Hidden'
        ));
    $page->add($setting);

    // Logo Image Width footer
    $setting = new admin_setting_configtext('theme_edubs/logo_image_width_footer', get_string('logo_image_width_footer','theme_edubs'), get_string('logo_image_width_footer_desc', 'theme_edubs'), '', PARAM_NOTAGS, 50);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Logo Image Height footer
    $setting = new admin_setting_configtext('theme_edubs/logo_image_height_footer', get_string('logo_image_height_footer','theme_edubs'), get_string('logo_image_height_footer_desc', 'theme_edubs'), '', PARAM_NOTAGS, 50);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Footer logo 1
    $name='theme_edubs/footerlogo1';
    $title = get_string('footerlogo1', 'theme_edubs');
    $description = get_string('footerlogo1_desc', 'theme_edubs');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'footerlogo1');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);

    // CCN Header settings
    $page = new admin_settingpage('theme_edubs_header', get_string('header_settings', 'theme_edubs'));

    // Library list
    $setting = new admin_setting_configselect('theme_edubs/library_list',
        get_string('library_list', 'theme_edubs'),
        get_string('library_list_desc', 'theme_edubs'), null,
        array('0' => 'Hidden',
            '1' => 'Visible'
        ));
    $page->add($setting);

    // Search
    $setting = new admin_setting_configselect('theme_edubs/header_search',
        get_string('header_search', 'theme_edubs'),
        get_string('header_search_desc', 'theme_edubs'), null,
        array('0' => 'Show icon',
            '1' => 'Show searchbar',
            '2' => 'Hide'
        ));
    $page->add($setting);

    // Login
    $setting = new admin_setting_configselect('theme_edubs/header_login',
        get_string('header_login', 'theme_edubs'),
        get_string('header_login_desc', 'theme_edubs'), null,
        array('0' => 'Login popup',
            '1' => 'Login link',
            '2' => 'Hide'
        ));
    $page->add($setting);

    // Header type
    $setting = new admin_setting_configselect('theme_edubs/headertype',
        get_string('headertype', 'theme_edubs'),
        get_string('headertype_desc', 'theme_edubs'), null,
        array('1' => 'Header 1',
            '2' => 'Header 2',
            '3' => 'Header 3',
            '4' => 'Header 4',
            '5' => 'Header 5',
            '6' => 'Header 6',
            '7' => 'Header 7',
            '8' => 'Header 8',
            '9' => 'Header 9',
            '10' => 'Header 10',
            '11' => 'Header 11',
        ));
    $page->add($setting);

    // Header type settings
    $setting = new admin_setting_configselect('theme_edubs/headertype_settings',
        get_string('headertype_settings', 'theme_edubs'),
        get_string('headertype_settings_desc', 'theme_edubs'), null,
        array('0' => 'Frontpage only',
            '1' => 'All pages (beta)'
        ));
    $page->add($setting);

    // Header email address
    $setting = new admin_setting_configtext('theme_edubs/email_address', get_string('email_address','theme_edubs'), get_string('email_address_desc', 'theme_edubs'), 'hello@edubs.com', PARAM_NOTAGS, 50);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Header phone
    $setting = new admin_setting_configtext('theme_edubs/phone', get_string('phone','theme_edubs'), get_string('phone_desc', 'theme_edubs'), '(56) 123 456 789', PARAM_NOTAGS, 50);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Call to Action Text
    $setting = new admin_setting_configtext('theme_edubs/cta_text', get_string('cta_text','theme_edubs'), get_string('cta_text_desc', 'theme_edubs'), 'Become an Instructor', PARAM_NOTAGS, 50);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Call to Action Link
    $setting = new admin_setting_configtext('theme_edubs/cta_link', get_string('cta_link','theme_edubs'), get_string('cta_link_desc', 'theme_edubs'), '#', PARAM_NOTAGS, 50);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);

    // CCN Breadcrumb settings
    $page = new admin_settingpage('breadcrumb_settings', get_string('breadcrumb_settings', 'theme_edubs'));
    // Breadcrumb settings
    $page->add(new admin_setting_heading('theme_edubs/breadcrumb_settings', get_string('breadcrumb_settings', 'theme_edubs'), NULL));

    // Breadcrumb background
    $name='theme_edubs/heading_bg';
    $title = get_string('heading_bg', 'theme_edubs');
    $description = get_string('heading_bg_desc', 'theme_edubs');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'heading_bg');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Breadcrumb style
    $setting = new admin_setting_configselect('theme_edubs/breadcrumb_style',
        get_string('breadcrumb_style', 'theme_edubs'),
        get_string('breadcrumb_style_desc', 'theme_edubs'), 0,
        array('0' => 'Default (large)',
            '1' => 'Medium',
            '2' => 'Small',
            '3' => 'Extra small',
            '4' => 'Hidden'
        ));
    $page->add($setting);

    // Breadcrumb title
    $setting = new admin_setting_configselect('theme_edubs/breadcrumb_title',
        get_string('breadcrumb_title', 'theme_edubs'),
        get_string('breadcrumb_title_desc', 'theme_edubs'), 0,
        array('0' => 'Visible',
            '1' => 'Hidden',
        ));
    $page->add($setting);

    // Breadcrumb trail
    $setting = new admin_setting_configselect('theme_edubs/breadcrumb_trail',
        get_string('breadcrumb_trail', 'theme_edubs'),
        get_string('breadcrumb_trail_desc', 'theme_edubs'), 0,
        array('0' => 'Visible',
            '1' => 'Hidden',
        ));
    $page->add($setting);

    // Breadcrumb clip text
    $setting = new admin_setting_configselect('theme_edubs/breadcrumb_clip',
        get_string('breadcrumb_clip', 'theme_edubs'),
        get_string('breadcrumb_clip_desc', 'theme_edubs'), 0,
        array('0' => 'Clip long text',
            '1' => 'Clip very long text only',
            '2' => 'Do not clip text',
        ));
    $page->add($setting);

    // Breadcrumb clip text
    $setting = new admin_setting_configselect('theme_edubs/breadcrumb_clip',
        get_string('breadcrumb_clip', 'theme_edubs'),
        get_string('breadcrumb_clip_desc', 'theme_edubs'), 0,
        array('0' => 'Clip long text',
            '1' => 'Clip very long text only',
            '2' => 'Do not clip text',
        ));
    $page->add($setting);

    // Breadcrumb capitalization
    $setting = new admin_setting_configselect('theme_edubs/breadcrumb_caps',
        get_string('breadcrumb_caps', 'theme_edubs'),
        get_string('breadcrumb_caps_desc', 'theme_edubs'), 0,
        array('0' => 'Capitalized',
            '1' => 'Lowercase',
            '2' => 'Uppercase',
            '3' => 'None (inherit from page title)',
        ));
    $page->add($setting);

    $settings->add($page);

    // CCN Preloader settings
    $page = new admin_settingpage('preloader_settings', get_string('preloader_settings', 'theme_edubs'));
    // Preloader settings
    $page->add(new admin_setting_heading('theme_edubs/preloader_settings', get_string('preloader_settings', 'theme_edubs'), NULL));

    // Preloader image
    $name='theme_edubs/preloader_image';
    $title = get_string('preloader_image', 'theme_edubs');
    $description = get_string('preloader_image_desc', 'theme_edubs');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'preloader_image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Preloader duration
    $setting = new admin_setting_configselect('theme_edubs/preloader_duration',
        get_string('preloader_duration', 'theme_edubs'),
        get_string('preloader_duration_desc', 'theme_edubs'), 0,
        array('0' => 'Wait for page to fully load (highly recommended)',
            '1' => 'Wait for core elements to load',
            '2' => 'Wait for page to fully load, but no longer than 5 seconds',
            '3' => 'Wait for page to fully load, but no longer than 4 seconds',
            '4' => 'Wait for page to fully load, but no longer than 3 seconds',
            '5' => 'Wait for page to fully load, but no longer than 2 seconds',
            '6' => 'Disable preloader (not recommended)'
        ));
    $page->add($setting);

    $settings->add($page);

    // CCN Footer settings
    $page = new admin_settingpage('theme_edubs_footer', get_string('footer_settings', 'theme_edubs'));
    // Footer settings
    $page->add(new admin_setting_heading('theme_edubs/footer_settings', get_string('footer_settings', 'theme_edubs'), NULL));


    // Footer copyright
    $setting = new admin_setting_configtext('theme_edubs/cocoon_copyright', get_string('cocoon_copyright','theme_edubs'), get_string('cocoon_copyright_desc', 'theme_edubs'), 'Copyright © 2020 edubs Moodle Theme by Cocoon. All Rights Reserved.', PARAM_NOTAGS, 50);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Footer style
    $setting = new admin_setting_configselect('theme_edubs/footertype',
        get_string('footertype', 'theme_edubs'),
        get_string('footertype_desc', 'theme_edubs'), null,
        array('1' => 'Footer 1',
            '2' => 'Footer 2',
            '3' => 'Footer 3',
            '4' => 'Footer 4',
            '5' => 'Footer 5',
            '6' => 'Footer 6',
            '7' => 'Footer 7',
            '8' => 'Footer 8',
        ));
    $page->add($setting);
    // Footer column 1
    $page->add(new admin_setting_heading('theme_edubs/footer_col_1', get_string('footer_col_1', 'theme_edubs'), NULL));
    // Footer column title
    $setting = new admin_setting_configtext('theme_edubs/footer_col_1_title', get_string('footer_col_title','theme_edubs'), get_string('footer_col_title_desc', 'theme_edubs'), 'Contact', PARAM_NOTAGS, 50);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Footer column body
    $setting = new admin_setting_configtextarea('theme_edubs/footer_col_1_body', get_string('footer_col_body','theme_edubs'), get_string('footer_col_body_desc', 'theme_edubs'), 'Body text for the first column.', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Footer column 2
    $page->add(new admin_setting_heading('theme_edubs/footer_col_2', get_string('footer_col_2', 'theme_edubs'), NULL));
    // Footer column title
    $setting = new admin_setting_configtext('theme_edubs/footer_col_2_title', get_string('footer_col_title','theme_edubs'), get_string('footer_col_title_desc', 'theme_edubs'), 'Company', PARAM_NOTAGS, 50);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Footer column body
    $setting = new admin_setting_configtextarea('theme_edubs/footer_col_2_body', get_string('footer_col_body','theme_edubs'), get_string('footer_col_body_desc', 'theme_edubs'), 'Body text for the second column.', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Footer column 3
    $page->add(new admin_setting_heading('theme_edubs/footer_col_3', get_string('footer_col_3', 'theme_edubs'), NULL));
    // Footer column title
    $setting = new admin_setting_configtext('theme_edubs/footer_col_3_title', get_string('footer_col_title','theme_edubs'), get_string('footer_col_title_desc', 'theme_edubs'), 'Programs', PARAM_NOTAGS, 50);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Footer column body
    $setting = new admin_setting_configtextarea('theme_edubs/footer_col_3_body', get_string('footer_col_body','theme_edubs'), get_string('footer_col_body_desc', 'theme_edubs'), 'Body text for the third column.', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Footer column 4
    $page->add(new admin_setting_heading('theme_edubs/footer_col_4', get_string('footer_col_4', 'theme_edubs'), NULL));
    // Footer column title
    $setting = new admin_setting_configtext('theme_edubs/footer_col_4_title', get_string('footer_col_title','theme_edubs'), get_string('footer_col_title_desc', 'theme_edubs'), 'Support', PARAM_NOTAGS, 50);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Footer column body
    $setting = new admin_setting_configtextarea('theme_edubs/footer_col_4_body', get_string('footer_col_body','theme_edubs'), get_string('footer_col_body_desc', 'theme_edubs'), 'Body text for the fourth column.', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Footer column 5
    $page->add(new admin_setting_heading('theme_edubs/footer_col_5', get_string('footer_col_5', 'theme_edubs'), NULL));
    // Footer column title
    $setting = new admin_setting_configtext('theme_edubs/footer_col_5_title', get_string('footer_col_title','theme_edubs'), get_string('footer_col_title_desc', 'theme_edubs'), 'Mobile', PARAM_NOTAGS, 50);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Footer column body
    $setting = new admin_setting_configtextarea('theme_edubs/footer_col_5_body', get_string('footer_col_body','theme_edubs'), get_string('footer_col_body_desc', 'theme_edubs'), 'Body text for the fifth column.', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Footer menu
    $page->add(new admin_setting_heading('theme_edubs/footer_menu_heading', get_string('footer_menu', 'theme_edubs'), NULL));
    // Footer menu
    $setting = new admin_setting_configtextarea('theme_edubs/footer_menu', get_string('footer_menu','theme_edubs'), get_string('footer_menu_desc', 'theme_edubs'), 'Body text for the footer menu.', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);

    // CCN Course settings
    $page = new admin_settingpage('theme_edubs_course_settings', get_string('course_settings', 'theme_edubs'));

    // General course settings
    $page->add(new admin_setting_heading('theme_edubs/general_course_settings', get_string('general_course_settings', 'theme_edubs'), NULL));

    // Course ratings
    $setting = new admin_setting_configselect('theme_edubs/course_ratings',
        get_string('course_ratings', 'theme_edubs'),
        get_string('course_ratings_desc', 'theme_edubs'), null,
        array('0' => 'Hide all ratings',
            '1' => 'Show decorative ratings (always 5 stars)',
            '2' => 'Show real ratings (enable the [Cocoon] Course Ratings block on course pages)',
        ));
    $page->add($setting);

    // Modified on courses & course categories
    $setting = new admin_setting_configselect('theme_edubs/coursecat_modified',
        get_string('coursecat_modified', 'theme_edubs'),
        get_string('coursecat_modified_desc', 'theme_edubs'), 0,
        array('0' => 'Visible',
            '1' => 'Hidden',
        ));
    $page->add($setting);

    // Enrolements on Courses & course categories
    $setting = new admin_setting_configselect('theme_edubs/coursecat_enrolments',
        get_string('coursecat_enrolments', 'theme_edubs'),
        get_string('coursecat_enrolments_desc', 'theme_edubs'), 0,
        array('0' => 'Visible',
            '1' => 'Hidden',
        ));
    $page->add($setting);

    // Announcements on Course categories
    $setting = new admin_setting_configselect('theme_edubs/coursecat_announcements',
        get_string('coursecat_announcements', 'theme_edubs'),
        get_string('coursecat_announcements_desc', 'theme_edubs'), 0,
        array('0' => 'Visible',
            '1' => 'Hidden',
        ));
    $page->add($setting);

    // Category settings
    $page->add(new admin_setting_heading('theme_edubs/coursecat_settings', get_string('coursecat_settings', 'theme_edubs'), NULL));

    // Course list style
    $setting = new admin_setting_configselect('theme_edubs/courseliststyle',
        get_string('courseliststyle', 'theme_edubs'),
        get_string('courseliststyle_desc', 'theme_edubs'), null,
        array('1' => 'Grid',
            '2' => 'List'
        ));
    $page->add($setting);

    // Single Course settings
    $page->add(new admin_setting_heading('theme_edubs/course_settings', get_string('single_course_settings', 'theme_edubs'), NULL));

    // Single Course Style
    $setting = new admin_setting_configselect('theme_edubs/course_single_style',
        get_string('course_single_style', 'theme_edubs'),
        get_string('course_single_style_desc', 'theme_edubs'), 0,
        array('0' => 'Course v1',
            '1' => 'Course v2',
            '2' => 'Course v3',
        ));
    $page->add($setting);

    // Course Enrolment Settings
    $setting = new admin_setting_configselect('theme_edubs/course_enrolment_payment',
        get_string('course_enrolment_payment', 'theme_edubs'),
        get_string('course_enrolment_payment_desc', 'theme_edubs'), 0,
        array('0' => 'All courses require payment',
            '1' => 'Some courses are free',
        ));
    $page->add($setting);

    // Course Main Page Layout
    // $setting = new admin_setting_configselect('theme_edubs/coursemainpage_layout',
    //     get_string('coursemainpage_layout', 'theme_edubs'),
    //     get_string('coursemainpage_layout_desc', 'theme_edubs'), 0,
    //             array('0' => 'edubs (default)',
    //                   '1' => 'edubs Dashboard for enrolled users only',
    //                   '2' => 'edubs Dashboard for all users'
    //                 ));
    // $page->add($setting);

    // Inner Course Page Layout
    $setting = new admin_setting_configselect('theme_edubs/incourse_layout',
        get_string('incourse_layout', 'theme_edubs'),
        get_string('incourse_layout_desc', 'theme_edubs'), 0,
        array('0' => 'edubs (default)',
            '1' => 'edubs Dashboard',
            '2' => 'edubs Focus'
        ));
    $page->add($setting);

    // Single Course Block Settings
    $setting = new admin_setting_configselect('theme_edubs/singlecourse_blocks',
        get_string('singlecourse_blocks', 'theme_edubs'),
        get_string('singlecourse_blocks_desc', 'theme_edubs'), 0,
        array('0' => 'Show on all pages of the course (Moodle default)',
            '1' => 'Show only on the main course page'
        ));
    $page->add($setting);

    // Course Start Date
    $setting = new admin_setting_configselect('theme_edubs/course_start_date',
        get_string('course_start_date', 'theme_edubs'),
        get_string('course_start_date_desc', 'theme_edubs'), 0,
        array('0' => 'Visible',
            '1' => 'Hidden'
        ));
    $page->add($setting);

    // Course Category
    $setting = new admin_setting_configselect('theme_edubs/course_category',
        get_string('course_category', 'theme_edubs'),
        get_string('course_category_desc', 'theme_edubs'), 0,
        array('0' => 'Visible',
            '1' => 'Hidden'
        ));
    $page->add($setting);

    // Enroled access to course content only
    $setting = new admin_setting_configselect('theme_edubs/course_content_enroled_only',
        get_string('course_content_enroled_only', 'theme_edubs'),
        get_string('course_content_enroled_only_desc', 'theme_edubs'), 0,
        array('0' => 'Display course content to anyone with viewing access to the course',
            '1' => 'Display course content only to enroled users and administrators',
        ));
    $page->add($setting);

    // Topics format settings
    $page->add(new admin_setting_heading('theme_edubs/course_settings_topics_format', get_string('course_settings_topics_format', 'theme_edubs'), NULL));

    // Collapsible settings
    $setting = new admin_setting_configselect('theme_edubs/topics_format_collapsible',
        get_string('topics_format_collapsible', 'theme_edubs'),
        get_string('topics_format_collapsible_desc', 'theme_edubs'), null,
        array('0' => 'All collapsed by default',
            '1' => 'All collapsed, first expanded',
            '2' => 'All expanded by default',
            '3' => 'All expanded and not collapsible',
        ));
    $page->add($setting);


    $settings->add($page);

    // CCN Social settings
    $page = new admin_settingpage('theme_edubs_social_settings', get_string('social_settings', 'theme_edubs'));

    // New Window
    $setting = new admin_setting_configselect('theme_edubs/social_target',
        get_string('social_target', 'theme_edubs'),
        get_string('social_target_desc', 'theme_edubs'), null,
        array('0' => 'Open URLs in the same page',
            '1' => 'Open URLs in a new window'
        ));
    $page->add($setting);

    // Facebook URL
    $setting = new admin_setting_configtext('theme_edubs/cocoon_facebook_url', get_string('cocoon_facebook_url','theme_edubs'), get_string('cocoon_facebook_url_desc', 'theme_edubs'), '#', PARAM_NOTAGS, 50);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Twitter URL
    $setting = new admin_setting_configtext('theme_edubs/cocoon_twitter_url', get_string('cocoon_twitter_url','theme_edubs'), get_string('cocoon_twitter_url_desc', 'theme_edubs'), '#', PARAM_NOTAGS, 50);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Instagram URL
    $setting = new admin_setting_configtext('theme_edubs/cocoon_instagram_url', get_string('cocoon_instagram_url','theme_edubs'), get_string('cocoon_instagram_url_desc', 'theme_edubs'), '#', PARAM_NOTAGS, 50);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Pinterest URL
    $setting = new admin_setting_configtext('theme_edubs/cocoon_pinterest_url', get_string('cocoon_pinterest_url','theme_edubs'), get_string('cocoon_pinterest_url_desc', 'theme_edubs'), '#', PARAM_NOTAGS, 50);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Dribbble URL
    $setting = new admin_setting_configtext('theme_edubs/cocoon_dribbble_url', get_string('cocoon_dribbble_url','theme_edubs'), get_string('cocoon_dribbble_url_desc', 'theme_edubs'), '#', PARAM_NOTAGS, 50);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Google URL
    $setting = new admin_setting_configtext('theme_edubs/cocoon_google_url', get_string('cocoon_google_url','theme_edubs'), get_string('cocoon_google_url_desc', 'theme_edubs'), '#', PARAM_NOTAGS, 50);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // YouTube URL
    $setting = new admin_setting_configtext('theme_edubs/cocoon_youtube_url', get_string('cocoon_youtube_url','theme_edubs'), get_string('cocoon_youtube_url_desc', 'theme_edubs'), null, PARAM_NOTAGS, 50);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // VK URL
    $setting = new admin_setting_configtext('theme_edubs/cocoon_vk_url', get_string('cocoon_vk_url','theme_edubs'), get_string('cocoon_vk_url_desc', 'theme_edubs'), null, PARAM_NOTAGS, 50);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // 500px URL
    $setting = new admin_setting_configtext('theme_edubs/cocoon_500px_url', get_string('cocoon_500px_url','theme_edubs'), get_string('cocoon_500px_url_desc', 'theme_edubs'), null, PARAM_NOTAGS, 50);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Behance URL
    $setting = new admin_setting_configtext('theme_edubs/cocoon_behance_url', get_string('cocoon_behance_url','theme_edubs'), get_string('cocoon_behance_url_desc', 'theme_edubs'), null, PARAM_NOTAGS, 50);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Digg URL
    $setting = new admin_setting_configtext('theme_edubs/cocoon_digg_url', get_string('cocoon_digg_url','theme_edubs'), get_string('cocoon_digg_url_desc', 'theme_edubs'), null, PARAM_NOTAGS, 50);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Flickr URL
    $setting = new admin_setting_configtext('theme_edubs/cocoon_flickr_url', get_string('cocoon_flickr_url','theme_edubs'), get_string('cocoon_flickr_url_desc', 'theme_edubs'), null, PARAM_NOTAGS, 50);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Foursquare URL
    $setting = new admin_setting_configtext('theme_edubs/cocoon_foursquare_url', get_string('cocoon_foursquare_url','theme_edubs'), get_string('cocoon_foursquare_url_desc', 'theme_edubs'), null, PARAM_NOTAGS, 50);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // LinkedIn URL
    $setting = new admin_setting_configtext('theme_edubs/cocoon_linkedin_url', get_string('cocoon_linkedin_url','theme_edubs'), get_string('cocoon_linkedin_url_desc', 'theme_edubs'), null, PARAM_NOTAGS, 50);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Medium URL
    $setting = new admin_setting_configtext('theme_edubs/cocoon_medium_url', get_string('cocoon_medium_url','theme_edubs'), get_string('cocoon_medium_url_desc', 'theme_edubs'), null, PARAM_NOTAGS, 50);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Meetup URL
    $setting = new admin_setting_configtext('theme_edubs/cocoon_meetup_url', get_string('cocoon_meetup_url','theme_edubs'), get_string('cocoon_meetup_url_desc', 'theme_edubs'), null, PARAM_NOTAGS, 50);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Snapchat URL
    $setting = new admin_setting_configtext('theme_edubs/cocoon_snapchat_url', get_string('cocoon_snapchat_url','theme_edubs'), get_string('cocoon_snapchat_url_desc', 'theme_edubs'), null, PARAM_NOTAGS, 50);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Tumblr URL
    $setting = new admin_setting_configtext('theme_edubs/cocoon_tumblr_url', get_string('cocoon_tumblr_url','theme_edubs'), get_string('cocoon_tumblr_url_desc', 'theme_edubs'), null, PARAM_NOTAGS, 50);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Vimeo URL
    $setting = new admin_setting_configtext('theme_edubs/cocoon_vimeo_url', get_string('cocoon_vimeo_url','theme_edubs'), get_string('cocoon_vimeo_url_desc', 'theme_edubs'), null, PARAM_NOTAGS, 50);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // WeChat URL
    $setting = new admin_setting_configtext('theme_edubs/cocoon_wechat_url', get_string('cocoon_wechat_url','theme_edubs'), get_string('cocoon_wechat_url_desc', 'theme_edubs'), null, PARAM_NOTAGS, 50);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // WhatsApp URL
    $setting = new admin_setting_configtext('theme_edubs/cocoon_whatsapp_url', get_string('cocoon_whatsapp_url','theme_edubs'), get_string('cocoon_whatsapp_url_desc', 'theme_edubs'), null, PARAM_NOTAGS, 50);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // WordPress URL
    $setting = new admin_setting_configtext('theme_edubs/cocoon_wordpress_url', get_string('cocoon_wordpress_url','theme_edubs'), get_string('cocoon_wordpress_url_desc', 'theme_edubs'), null, PARAM_NOTAGS, 50);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Weibo URL
    $setting = new admin_setting_configtext('theme_edubs/cocoon_weibo_url', get_string('cocoon_weibo_url','theme_edubs'), get_string('cocoon_weibo_url_desc', 'theme_edubs'), null, PARAM_NOTAGS, 50);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Telegram URL
    $setting = new admin_setting_configtext('theme_edubs/cocoon_telegram_url', get_string('cocoon_telegram_url','theme_edubs'), get_string('cocoon_telegram_url_desc', 'theme_edubs'), null, PARAM_NOTAGS, 50);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Moodle URL
    $setting = new admin_setting_configtext('theme_edubs/cocoon_moodle_url', get_string('cocoon_moodle_url','theme_edubs'), get_string('cocoon_moodle_url_desc', 'theme_edubs'), null, PARAM_NOTAGS, 50);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Amazon URL
    $setting = new admin_setting_configtext('theme_edubs/cocoon_amazon_url', get_string('cocoon_amazon_url','theme_edubs'), get_string('cocoon_amazon_url_desc', 'theme_edubs'), null, PARAM_NOTAGS, 50);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Slideshare URL
    $setting = new admin_setting_configtext('theme_edubs/cocoon_slideshare_url', get_string('cocoon_slideshare_url','theme_edubs'), get_string('cocoon_slideshare_url_desc', 'theme_edubs'), null, PARAM_NOTAGS, 50);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // SoundCloud URL
    $setting = new admin_setting_configtext('theme_edubs/cocoon_soundcloud_url', get_string('cocoon_soundcloud_url','theme_edubs'), get_string('cocoon_soundcloud_url_desc', 'theme_edubs'), null, PARAM_NOTAGS, 50);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // LeanPub URL
    $setting = new admin_setting_configtext('theme_edubs/cocoon_leanpub_url', get_string('cocoon_leanpub_url','theme_edubs'), get_string('cocoon_leanpub_url_desc', 'theme_edubs'), null, PARAM_NOTAGS, 50);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Xing URL
    $setting = new admin_setting_configtext('theme_edubs/cocoon_xing_url', get_string('cocoon_xing_url','theme_edubs'), get_string('cocoon_xing_url_desc', 'theme_edubs'), null, PARAM_NOTAGS, 50);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Bitcoin URL
    $setting = new admin_setting_configtext('theme_edubs/cocoon_bitcoin_url', get_string('cocoon_bitcoin_url','theme_edubs'), get_string('cocoon_bitcoin_url_desc', 'theme_edubs'), null, PARAM_NOTAGS, 50);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Twitch URL
    $setting = new admin_setting_configtext('theme_edubs/cocoon_twitch_url', get_string('cocoon_twitch_url','theme_edubs'), get_string('cocoon_twitch_url_desc', 'theme_edubs'), null, PARAM_NOTAGS, 50);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Github URL
    $setting = new admin_setting_configtext('theme_edubs/cocoon_github_url', get_string('cocoon_github_url','theme_edubs'), get_string('cocoon_github_url_desc', 'theme_edubs'), null, PARAM_NOTAGS, 50);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Gitlab URL
    $setting = new admin_setting_configtext('theme_edubs/cocoon_gitlab_url', get_string('cocoon_gitlab_url','theme_edubs'), get_string('cocoon_gitlab_url_desc', 'theme_edubs'), null, PARAM_NOTAGS, 50);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Forumbee URL
    $setting = new admin_setting_configtext('theme_edubs/cocoon_forumbee_url', get_string('cocoon_forumbee_url','theme_edubs'), get_string('cocoon_forumbee_url_desc', 'theme_edubs'), null, PARAM_NOTAGS, 50);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Trello URL
    $setting = new admin_setting_configtext('theme_edubs/cocoon_trello_url', get_string('cocoon_trello_url','theme_edubs'), get_string('cocoon_trello_url_desc', 'theme_edubs'), null, PARAM_NOTAGS, 50);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Weixin URL
    $setting = new admin_setting_configtext('theme_edubs/cocoon_weixin_url', get_string('cocoon_weixin_url','theme_edubs'), get_string('cocoon_weixin_url_desc', 'theme_edubs'), null, PARAM_NOTAGS, 50);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Slack URL
    $setting = new admin_setting_configtext('theme_edubs/cocoon_slack_url', get_string('cocoon_slack_url','theme_edubs'), get_string('cocoon_slack_url_desc', 'theme_edubs'), null, PARAM_NOTAGS, 50);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);


    $settings->add($page);

    // CCN Color settings
    $page = new admin_settingpage('theme_edubs_color', get_string('color_settings', 'theme_edubs'));

    // Title: Gradients
    $page->add(new admin_setting_heading('theme_edubs/color_settings_gradient', get_string('color_settings_gradient', 'theme_edubs'), NULL));

    // Gradient Start
    $setting = new admin_setting_configcolourpicker('theme_edubs/color_gradient_start', get_string('color_gradient_start','theme_edubs'), get_string('color_gradient_start_desc', 'theme_edubs'), '#ff1053');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Gradient End
    $setting = new admin_setting_configcolourpicker('theme_edubs/color_gradient_end', get_string('color_gradient_end','theme_edubs'), get_string('color_gradient_end_desc', 'theme_edubs'), '#3452ff');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Title: Main colors
    $page->add(new admin_setting_heading('theme_edubs/color_settings_main', get_string('color_settings_main', 'theme_edubs'), NULL));

    // Primary Color
    $setting = new admin_setting_configcolourpicker('theme_edubs/color_primary', get_string('color_primary','theme_edubs'), get_string('color_primary_desc', 'theme_edubs'), '#2441e7');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Primary Color Alternate
    $setting = new admin_setting_configcolourpicker('theme_edubs/color_primary_alternate', get_string('color_primary_alternate','theme_edubs'), get_string('color_primary_alternate_desc', 'theme_edubs'), '#192675');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Secondary Color
    $setting = new admin_setting_configcolourpicker('theme_edubs/color_secondary', get_string('color_secondary','theme_edubs'), get_string('color_secondary_desc', 'theme_edubs'), '#ff1053');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Tertiary Color
    $setting = new admin_setting_configcolourpicker('theme_edubs/color_tertiary', get_string('color_tertiary','theme_edubs'), get_string('color_tertiary_desc', 'theme_edubs'), '#6c757d');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Accent Color
    $setting = new admin_setting_configcolourpicker('theme_edubs/color_accent', get_string('color_accent','theme_edubs'), get_string('color_accent_desc', 'theme_edubs'), '#e35a9a');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Accent Color 2
    $setting = new admin_setting_configcolourpicker('theme_edubs/color_accent_2', get_string('color_accent_2','theme_edubs'), get_string('color_accent_2_desc', 'theme_edubs'), '#c75533');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Accent Color 3
    $setting = new admin_setting_configcolourpicker('theme_edubs/color_accent_3', get_string('color_accent_3','theme_edubs'), get_string('color_accent_3_desc', 'theme_edubs'), '#192675');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Accent Color 4
    $setting = new admin_setting_configcolourpicker('theme_edubs/color_accent_4', get_string('color_accent_4','theme_edubs'), get_string('color_accent_4_desc', 'theme_edubs'), '#f0d078');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Parallax Color
    $setting = new admin_setting_configcolourpicker('theme_edubs/color_parallax', get_string('color_parallax','theme_edubs'), get_string('color_parallax_desc', 'theme_edubs'), '#2441e7');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Title: Header Style 2
    $page->add(new admin_setting_heading('theme_edubs/color_settings_header_style_2', get_string('color_settings_header_style_2', 'theme_edubs'), NULL));

    // Header Style 2: Header Top
    $setting = new admin_setting_configcolourpicker('theme_edubs/color_header_style_2_top', get_string('color_header_color_top','theme_edubs'), get_string('color_header_color_top_desc', 'theme_edubs'), '#000');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Header Style 2: Header Bottom
    $setting = new admin_setting_configcolourpicker('theme_edubs/color_header_style_2_bottom', get_string('color_header_color_bottom','theme_edubs'), get_string('color_header_color_bottom_desc', 'theme_edubs'), '#141414');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Title: Header Style 4
    $page->add(new admin_setting_heading('theme_edubs/color_settings_header_style_4', get_string('color_settings_header_style_4', 'theme_edubs'), NULL));

    // Header Style 4: Header Top
    $setting = new admin_setting_configcolourpicker('theme_edubs/color_header_style_4_top', get_string('color_header_color_top','theme_edubs'), get_string('color_header_color_top_desc', 'theme_edubs'), '#3452ff');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Title: Header Style 5
    $page->add(new admin_setting_heading('theme_edubs/color_settings_header_style_5', get_string('color_settings_header_style_5', 'theme_edubs'), NULL));

    // Header Style 5
    $setting = new admin_setting_configcolourpicker('theme_edubs/color_header_style_5', get_string('color_header_color','theme_edubs'), get_string('color_header_color_desc', 'theme_edubs'), '#ffffff');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Title: Header Style 6
    $page->add(new admin_setting_heading('theme_edubs/color_settings_header_style_6', get_string('color_settings_header_style_6', 'theme_edubs'), NULL));

    // Header Style 6: Header Top
    $setting = new admin_setting_configcolourpicker('theme_edubs/color_header_style_6_top', get_string('color_header_color_top','theme_edubs'), get_string('color_header_color_top_desc', 'theme_edubs'), '#3452ff');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);


    // Title: Footer Style 1
    $page->add(new admin_setting_heading('theme_edubs/color_settings_footer_style_1', get_string('color_settings_footer_style_1', 'theme_edubs'), NULL));

    // Footer Style 1: Footer Top
    $setting = new admin_setting_configcolourpicker('theme_edubs/color_footer_style_1_top', get_string('color_footer_color_top','theme_edubs'), get_string('color_footer_color_top_desc', 'theme_edubs'), '#151515');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Footer Style 1: Footer Bottom
    $setting = new admin_setting_configcolourpicker('theme_edubs/color_footer_style_1_bottom', get_string('color_footer_color_bottom','theme_edubs'), get_string('color_footer_color_bottom_desc', 'theme_edubs'), '#0a0a0a');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Title: Footer Style 2
    $page->add(new admin_setting_heading('theme_edubs/color_settings_footer_style_2', get_string('color_settings_footer_style_2', 'theme_edubs'), NULL));

    // Footer Style 2: Footer Top
    $setting = new admin_setting_configcolourpicker('theme_edubs/color_footer_style_2_top', get_string('color_footer_color_top','theme_edubs'), get_string('color_footer_color_top_desc', 'theme_edubs'), '#f9fafc');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Footer Style 2: Footer Bottom
    $setting = new admin_setting_configcolourpicker('theme_edubs/color_footer_style_2_bottom', get_string('color_footer_color_bottom','theme_edubs'), get_string('color_footer_color_bottom_desc', 'theme_edubs'), '#ebeef4');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Title: Footer Style 3
    $page->add(new admin_setting_heading('theme_edubs/color_settings_footer_style_3', get_string('color_settings_footer_style_3', 'theme_edubs'), NULL));

    // Footer Style 3: Footer Top
    $setting = new admin_setting_configcolourpicker('theme_edubs/color_footer_style_3_top', get_string('color_footer_color_top','theme_edubs'), get_string('color_footer_color_top_desc', 'theme_edubs'), '#f9fafc');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Footer Style 3: Footer Middle
    $setting = new admin_setting_configcolourpicker('theme_edubs/color_footer_style_3_middle', get_string('color_footer_color_middle','theme_edubs'), get_string('color_footer_color_middle_desc', 'theme_edubs'), '#ffffff');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Footer Style 3: Footer Bottom
    $setting = new admin_setting_configcolourpicker('theme_edubs/color_footer_style_3_bottom', get_string('color_footer_color_bottom','theme_edubs'), get_string('color_footer_color_bottom_desc', 'theme_edubs'), '#fafafa');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Title: Footer Style 5
    $page->add(new admin_setting_heading('theme_edubs/color_settings_footer_style_5', get_string('color_settings_footer_style_5', 'theme_edubs'), NULL));

    // Footer Style 5: Footer Top
    $setting = new admin_setting_configcolourpicker('theme_edubs/color_footer_style_5_top', get_string('color_footer_color_top','theme_edubs'), get_string('color_footer_color_top_desc', 'theme_edubs'), '#0d2f81');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Footer Style 5: Footer Bottom
    $setting = new admin_setting_configcolourpicker('theme_edubs/color_footer_style_5_bottom', get_string('color_footer_color_bottom','theme_edubs'), get_string('color_footer_color_bottom_desc', 'theme_edubs'), '#072670');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Title: Footer Style 6
    $page->add(new admin_setting_heading('theme_edubs/color_settings_footer_style_6', get_string('color_settings_footer_style_6', 'theme_edubs'), NULL));

    // Footer Style 6: Footer All
    $setting = new admin_setting_configcolourpicker('theme_edubs/color_footer_style_6_all', get_string('color_footer_color','theme_edubs'), get_string('color_footer_color_desc', 'theme_edubs'), '#3f4449');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Title: Footer Style 7
    $page->add(new admin_setting_heading('theme_edubs/color_settings_footer_style_7', get_string('color_settings_footer_style_7', 'theme_edubs'), NULL));

    // Footer Style 7: Footer Top
    $setting = new admin_setting_configcolourpicker('theme_edubs/color_footer_style_7_top', get_string('color_footer_color_top','theme_edubs'), get_string('color_footer_color_top_desc', 'theme_edubs'), '#ffffff');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Footer Style 7: Footer Bottom
    $setting = new admin_setting_configcolourpicker('theme_edubs/color_footer_style_7_bottom', get_string('color_footer_color_bottom','theme_edubs'), get_string('color_footer_color_bottom_desc', 'theme_edubs'), '#ffffff');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);



    $settings->add($page);

    // CCN Dashboard settings
    $page = new admin_settingpage('theme_edubs_dashboard', get_string('dashboard_settings', 'theme_edubs'));

    // Title: Dashboard settings
    $page->add(new admin_setting_heading('theme_edubs/dashboard_settings', get_string('dashboard_settings_long', 'theme_edubs'), NULL));

    // Dashboard header
    $setting = new admin_setting_configselect('theme_edubs/dashboard_header',
        get_string('dashboard_header', 'theme_edubs'),
        get_string('dashboard_header_desc', 'theme_edubs'), 0,
        array('0' => 'Gradient',
            '1' => 'White'
        ));
    $page->add($setting);

    // Sticky header
    $setting = new admin_setting_configselect('theme_edubs/dashboard_sticky_header',
        get_string('dashboard_sticky_header', 'theme_edubs'),
        get_string('dashboard_sticky_header_desc', 'theme_edubs'), 0,
        array('0' => 'Stick to top',
            '1' => 'Scroll with page'
        ));
    $page->add($setting);

    // Sticky left drawer
    $setting = new admin_setting_configselect('theme_edubs/dashboard_sticky_drawer',
        get_string('dashboard_sticky_drawer', 'theme_edubs'),
        get_string('dashboard_sticky_drawer_desc', 'theme_edubs'), 0,
        array('0' => 'Stick to side',
            '1' => 'Scroll with page'
        ));
    $page->add($setting);

    // Dashboard left drawer
    $setting = new admin_setting_configselect('theme_edubs/dashboard_left_drawer',
        get_string('dashboard_left_drawer', 'theme_edubs'),
        get_string('dashboard_left_drawer_desc', 'theme_edubs'), 0,
        array('0' => 'User menu (default)',
            '3' => 'Moodle drawer navigation',
            '1' => 'Only show blocks from "Sidebar Left" region',
            '2' => 'Disable left drawer'
        ));
    $page->add($setting);

    // Dashboard Breadcrumb clip text
    $setting = new admin_setting_configselect('theme_edubs/breadcrumb_clip_dash',
        get_string('breadcrumb_clip', 'theme_edubs'),
        get_string('breadcrumb_clip_desc', 'theme_edubs'), 0,
        array('0' => 'Clip long text',
            '1' => 'Clip very long text only',
            '2' => 'Do not clip text',
        ));
    $page->add($setting);

    // Title: Dashboard tablet 1
    $page->add(new admin_setting_heading('theme_edubs/dashboard_tablet_1', get_string('dashboard_tablet_1', 'theme_edubs'), NULL));

    // Dashboard tablet visibility
    $setting = new admin_setting_configselect('theme_edubs/dashboard_tablet_1_visibility',
        get_string('config_visibility', 'theme_edubs'),
        get_string('config_visibility_desc', 'theme_edubs'), 0,
        array('0' => 'Show tablet',
            '1' => 'Hide tablet'
        ));
    $page->add($setting);

    // Dashboard tablet title
    $setting = new admin_setting_configtext('theme_edubs/dashboard_tablet_1_title', get_string('config_title','theme_edubs'), get_string('config_title_desc', 'theme_edubs'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Dashboard tablet subtitle
    $setting = new admin_setting_configtext('theme_edubs/dashboard_tablet_1_subtitle', get_string('config_subtitle','theme_edubs'), get_string('config_subtitle_desc', 'theme_edubs'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Dashboard tablet URL
    $setting = new admin_setting_configtext('theme_edubs/dashboard_tablet_1_url', get_string('config_link','theme_edubs'), get_string('config_link_desc', 'theme_edubs'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Dashboard tablet color
    $setting = new admin_setting_configcolourpicker('theme_edubs/dashboard_tablet_1_color', get_string('config_color','theme_edubs'), get_string('config_color_desc', 'theme_edubs'), '#2441e7');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Dashboard tablet icon
    $setting = new admin_setting_configselect('theme_edubs/dashboard_tablet_1_ccn_icon_class',
        get_string('config_icon_class', 'theme_edubs'),
        get_string('config_icon_class_desc', 'theme_edubs'), 'flaticon-speech-bubble', $ccnFontList);
    $page->add($setting);

    // Title: Dashboard tablet 2
    $page->add(new admin_setting_heading('theme_edubs/dashboard_tablet_2', get_string('dashboard_tablet_2', 'theme_edubs'), NULL));

    // Dashboard tablet visibility
    $setting = new admin_setting_configselect('theme_edubs/dashboard_tablet_2_visibility',
        get_string('config_visibility', 'theme_edubs'),
        get_string('config_visibility_desc', 'theme_edubs'), 0,
        array('0' => 'Show tablet',
            '1' => 'Hide tablet'
        ));
    $page->add($setting);

    // Dashboard tablet title
    $setting = new admin_setting_configtext('theme_edubs/dashboard_tablet_2_title', get_string('config_title','theme_edubs'), get_string('config_title_desc', 'theme_edubs'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Dashboard tablet subtitle
    $setting = new admin_setting_configtext('theme_edubs/dashboard_tablet_2_subtitle', get_string('config_subtitle','theme_edubs'), get_string('config_subtitle_desc', 'theme_edubs'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Dashboard tablet URL
    $setting = new admin_setting_configtext('theme_edubs/dashboard_tablet_2_url', get_string('config_link','theme_edubs'), get_string('config_link_desc', 'theme_edubs'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Dashboard tablet color
    $setting = new admin_setting_configcolourpicker('theme_edubs/dashboard_tablet_2_color', get_string('config_color','theme_edubs'), get_string('config_color_desc', 'theme_edubs'), '#ff1053');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Dashboard tablet icon
    $setting = new admin_setting_configselect('theme_edubs/dashboard_tablet_2_ccn_icon_class',
        get_string('config_icon_class', 'theme_edubs'),
        get_string('config_icon_class_desc', 'theme_edubs'), 'flaticon-cap', $ccnFontList);
    $page->add($setting);

    // Title: Dashboard tablet 3
    $page->add(new admin_setting_heading('theme_edubs/dashboard_tablet_3', get_string('dashboard_tablet_3', 'theme_edubs'), NULL));

    // Dashboard tablet visibility
    $setting = new admin_setting_configselect('theme_edubs/dashboard_tablet_3_visibility',
        get_string('config_visibility', 'theme_edubs'),
        get_string('config_visibility_desc', 'theme_edubs'), 0,
        array('0' => 'Show tablet',
            '1' => 'Hide tablet'
        ));
    $page->add($setting);

    // Dashboard tablet title
    $setting = new admin_setting_configtext('theme_edubs/dashboard_tablet_3_title', get_string('config_title','theme_edubs'), get_string('config_title_desc', 'theme_edubs'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Dashboard tablet subtitle
    $setting = new admin_setting_configtext('theme_edubs/dashboard_tablet_3_subtitle', get_string('config_subtitle','theme_edubs'), get_string('config_subtitle_desc', 'theme_edubs'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Dashboard tablet URL
    $setting = new admin_setting_configtext('theme_edubs/dashboard_tablet_3_url', get_string('config_link','theme_edubs'), get_string('config_link_desc', 'theme_edubs'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Dashboard tablet color
    $setting = new admin_setting_configcolourpicker('theme_edubs/dashboard_tablet_3_color', get_string('config_color','theme_edubs'), get_string('config_color_desc', 'theme_edubs'), '#00a78e');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Dashboard tablet icon
    $setting = new admin_setting_configselect('theme_edubs/dashboard_tablet_3_ccn_icon_class',
        get_string('config_icon_class', 'theme_edubs'),
        get_string('config_icon_class_desc', 'theme_edubs'), 'flaticon-settings', $ccnFontList);
    $page->add($setting);

    // Title: Dashboard tablet 4
    $page->add(new admin_setting_heading('theme_edubs/dashboard_tablet_4', get_string('dashboard_tablet_4', 'theme_edubs'), NULL));

    // Dashboard tablet visibility
    $setting = new admin_setting_configselect('theme_edubs/dashboard_tablet_4_visibility',
        get_string('config_visibility', 'theme_edubs'),
        get_string('config_visibility_desc', 'theme_edubs'), 0,
        array('0' => 'Show tablet',
            '1' => 'Hide tablet'
        ));
    $page->add($setting);

    // Dashboard tablet title
    $setting = new admin_setting_configtext('theme_edubs/dashboard_tablet_4_title', get_string('config_title','theme_edubs'), get_string('config_title_desc', 'theme_edubs'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Dashboard tablet subtitle
    $setting = new admin_setting_configtext('theme_edubs/dashboard_tablet_4_subtitle', get_string('config_subtitle','theme_edubs'), get_string('config_subtitle_desc', 'theme_edubs'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Dashboard tablet URL
    $setting = new admin_setting_configtext('theme_edubs/dashboard_tablet_4_url', get_string('config_link','theme_edubs'), get_string('config_link_desc', 'theme_edubs'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Dashboard tablet color
    $setting = new admin_setting_configcolourpicker('theme_edubs/dashboard_tablet_4_color', get_string('config_color','theme_edubs'), get_string('config_color_desc', 'theme_edubs'), '#ecd06f');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Dashboard tablet icon
    $setting = new admin_setting_configselect('theme_edubs/dashboard_tablet_4_ccn_icon_class',
        get_string('config_icon_class', 'theme_edubs'),
        get_string('config_icon_class_desc', 'theme_edubs'), 'flaticon-rating', $ccnFontList);
    $page->add($setting);



    $settings->add($page);

    // CCN User settings
    $page = new admin_settingpage('theme_edubs_user_settings', get_string('user_settings', 'theme_edubs'));

    // Profile Page Layout
    $setting = new admin_setting_configselect('theme_edubs/user_profile_layout',
        get_string('user_profile_layout', 'theme_edubs'),
        get_string('user_profile_layout_desc', 'theme_edubs'), 0,
        array('0' => 'edubs (default)',
            '1' => 'edubs Dashboard'
        ));
    $page->add($setting);

    // Navigation icon
    $page->add(new admin_setting_heading('theme_edubs/navigation_icon', get_string('navigation_icon', 'theme_edubs'), NULL));

    $setting = new admin_setting_configselect('theme_edubs/navigation_icon_visibility',
        get_string('config_visibility', 'theme_edubs'),
        get_string('config_visibility_desc', 'theme_edubs'), 0,
        array('0' => 'Visible',
            '1' => 'Hidden'
        ));
    $page->add($setting);

    $setting = new admin_setting_configselect('theme_edubs/navigation_icon_ccn_icon_class',
        get_string('config_icon_class', 'theme_edubs'),
        get_string('config_icon_class_desc', 'theme_edubs'), 'flaticon-settings', $ccnFontList);
    $page->add($setting);

    // Notification icon
    $page->add(new admin_setting_heading('theme_edubs/notification_icon', get_string('notification_icon', 'theme_edubs'), NULL));

    $setting = new admin_setting_configselect('theme_edubs/notification_icon_visibility',
        get_string('config_visibility', 'theme_edubs'),
        get_string('config_visibility_desc', 'theme_edubs'), 0,
        array('0' => 'Visible',
            '1' => 'Hidden'
        ));
    $page->add($setting);

    $setting = new admin_setting_configselect('theme_edubs/notification_icon_ccn_icon_class',
        get_string('config_icon_class', 'theme_edubs'),
        get_string('config_icon_class_desc', 'theme_edubs'), 'flaticon-alarm', $ccnFontList);
    $page->add($setting);

    // Messages icon
    $page->add(new admin_setting_heading('theme_edubs/messages_icon', get_string('messages_icon', 'theme_edubs'), NULL));

    $setting = new admin_setting_configselect('theme_edubs/messages_icon_visibility',
        get_string('config_visibility', 'theme_edubs'),
        get_string('config_visibility_desc', 'theme_edubs'), 0,
        array('0' => 'Visible',
            '1' => 'Hidden'
        ));
    $page->add($setting);

    $setting = new admin_setting_configselect('theme_edubs/messages_icon_ccn_icon_class',
        get_string('config_icon_class', 'theme_edubs'),
        get_string('config_icon_class_desc', 'theme_edubs'), 'flaticon-speech-bubble', $ccnFontList);
    $page->add($setting);

    // Navigation icon
    $page->add(new admin_setting_heading('theme_edubs/dark_mode_icon', get_string('dark_mode_icon', 'theme_edubs'), NULL));

    $setting = new admin_setting_configselect('theme_edubs/dark_mode_icon_visibility',
        get_string('config_visibility', 'theme_edubs'),
        get_string('config_visibility_desc', 'theme_edubs'), 0,
        array('0' => 'Visible',
            '1' => 'Hidden'
        ));
    $page->add($setting);

    $setting = new admin_setting_configselect('theme_edubs/dark_mode_icon_ccn_icon_class',
        get_string('config_icon_class', 'theme_edubs'),
        get_string('config_icon_class_desc', 'theme_edubs'), 'ccn-flaticon-hide', $ccnFontList);
    $page->add($setting);


    // Display Custom Fields in General Section
    // $setting = new admin_setting_configselect('theme_edubs/user_custf_other',
    //     get_string('user_custf_other', 'theme_edubs'),
    //     get_string('user_custf_other_desc', 'theme_edubs'), 0,
    //             array('0' => 'Default (Moodle default)',
    //                   '1' => 'In "General" section'
    //                 ));
    // $page->add($setting);

    $settings->add($page);

    // Fonts
    $page = new admin_settingpage('theme_edubs_fonts', get_string('font_settings', 'theme_edubs'));

    // Google Fonts
    $page->add(new admin_setting_heading('theme_edubs/google_fonts', get_string('google_fonts', 'theme_edubs'), NULL));

    // Primary Font
    $setting = new admin_setting_configselect('theme_edubs/primary_font',
        get_string('primary_font', 'theme_edubs'),
        get_string('primary_font_desc', 'theme_edubs'), null,
        array('0' => 'Nunito',
            '1' => 'Dosis',
            '2' => 'Lato',
            '3' => 'Maven Pro',
            '4' => 'Montserrat',
            '5' => 'Open Sans',
            '6' => 'Playfair Display',
            '7' => 'Poppins',
            '8' => 'Raleway',
            '9' => 'Roboto',
            '10' => 'Lora',
            '11' => 'Oxygen',
        ));
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Secondary Font
    $setting = new admin_setting_configselect('theme_edubs/secondary_font',
        get_string('secondary_font', 'theme_edubs'),
        get_string('secondary_font_desc', 'theme_edubs'), 5,
        array('0' => 'Nunito',
            '1' => 'Dosis',
            '2' => 'Lato',
            '3' => 'Maven Pro',
            '4' => 'Montserrat',
            '5' => 'Open Sans',
            '6' => 'Playfair Display',
            '7' => 'Poppins',
            '8' => 'Raleway',
            '9' => 'Roboto',
            '10' => 'Lora',
            '11' => 'Oxygen',
        ));
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Custom Primary Fonts
    $page->add(new admin_setting_heading('theme_edubs/custom_font_primary', get_string('custom_font_primary', 'theme_edubs'), NULL));

    // Upload font EOT
    $name='theme_edubs/upload_font_eot';
    $title = get_string('upload_font_eot', 'theme_edubs');
    $description = get_string('upload_font_eot_desc', 'theme_edubs');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'upload_font_eot', 0, array('maxfiles' => 1, 'accepted_types' => array('.eot')) );
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Upload font WOFF2
    $name='theme_edubs/upload_font_woff2';
    $title = get_string('upload_font_woff2', 'theme_edubs');
    $description = get_string('upload_font_woff2_desc', 'theme_edubs');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'upload_font_woff2', 0, array('maxfiles' => 1, 'accepted_types' => array('.woff2')) );
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Upload font WOFF
    $name='theme_edubs/upload_font_woff';
    $title = get_string('upload_font_woff', 'theme_edubs');
    $description = get_string('upload_font_woff_desc', 'theme_edubs');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'upload_font_woff', 0, array('maxfiles' => 1, 'accepted_types' => array('.woff')) );
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Upload font TTF
    $name='theme_edubs/upload_font_ttf';
    $title = get_string('upload_font_ttf', 'theme_edubs');
    $description = get_string('upload_font_ttf_desc', 'theme_edubs');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'upload_font_ttf', 0, array('maxfiles' => 1, 'accepted_types' => array('.ttf')) );
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Upload font SVG
    $name='theme_edubs/upload_font_svg';
    $title = get_string('upload_font_svg', 'theme_edubs');
    $description = get_string('upload_font_svg_desc', 'theme_edubs');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'upload_font_svg', 0, array('maxfiles' => 1, 'accepted_types' => array('.svg')) );
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Custom Secondary Fonts
    $page->add(new admin_setting_heading('theme_edubs/custom_font_secondary', get_string('custom_font_secondary', 'theme_edubs'), NULL));

    // Upload font EOT
    $name='theme_edubs/upload_font_secondary_eot';
    $title = get_string('upload_font_eot', 'theme_edubs');
    $description = get_string('upload_font_eot_desc', 'theme_edubs');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'upload_font_secondary_eot', 0, array('maxfiles' => 1, 'accepted_types' => array('.eot')) );
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Upload font WOFF2
    $name='theme_edubs/upload_font_secondary_woff2';
    $title = get_string('upload_font_woff2', 'theme_edubs');
    $description = get_string('upload_font_woff2_desc', 'theme_edubs');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'upload_font_secondary_woff2', 0, array('maxfiles' => 1, 'accepted_types' => array('.woff2')) );
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Upload font WOFF
    $name='theme_edubs/upload_font_secondary_woff';
    $title = get_string('upload_font_woff', 'theme_edubs');
    $description = get_string('upload_font_woff_desc', 'theme_edubs');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'upload_font_secondary_woff', 0, array('maxfiles' => 1, 'accepted_types' => array('.woff')) );
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Upload font TTF
    $name='theme_edubs/upload_font_secondary_ttf';
    $title = get_string('upload_font_ttf', 'theme_edubs');
    $description = get_string('upload_font_ttf_desc', 'theme_edubs');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'upload_font_secondary_ttf', 0, array('maxfiles' => 1, 'accepted_types' => array('.ttf')) );
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Upload font SVG
    $name='theme_edubs/upload_font_secondary_svg';
    $title = get_string('upload_font_svg', 'theme_edubs');
    $description = get_string('upload_font_svg_desc', 'theme_edubs');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'upload_font_secondary_svg', 0, array('maxfiles' => 1, 'accepted_types' => array('.svg')) );
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);


    // CCN Advanced settings
    $page = new admin_settingpage('theme_edubs_advanced', get_string('advanced_settings', 'theme_edubs'));
    // Google Maps API Key
    $setting = new admin_setting_configtext('theme_edubs/gmaps_key', get_string('gmaps_key','theme_edubs'), get_string('gmaps_key_desc', 'theme_edubs'), '', PARAM_NOTAGS, 50);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Custom CSS
    $setting = new admin_setting_configtextarea('theme_edubs/custom_css', get_string('custom_css','theme_edubs'), get_string('custom_css_desc', 'theme_edubs'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Custom CSS Dashboard
    $setting = new admin_setting_configtextarea('theme_edubs/custom_css_dashboard', get_string('custom_css_dashboard','theme_edubs'), get_string('custom_css_dashboard_desc', 'theme_edubs'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Custom JavaScript
    $setting = new admin_setting_configtextarea('theme_edubs/custom_js', get_string('custom_js','theme_edubs'), get_string('custom_js_desc', 'theme_edubs'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Custom JavaScript Dashboard
    $setting = new admin_setting_configtextarea('theme_edubs/custom_js_dashboard', get_string('custom_js_dashboard','theme_edubs'), get_string('custom_js_dashboard_desc', 'theme_edubs'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);
    // Blog Post Author
    $setting = new admin_setting_configselect('theme_edubs/blog_post_author',
        get_string('blog_post_author', 'theme_edubs'),
        get_string('blog_post_author_desc', 'theme_edubs'), null,
        array('0' => 'Visible',
            '1' => 'Hidden'
        ));
    $page->add($setting);

    // Blog Post Date
    $setting = new admin_setting_configselect('theme_edubs/blog_post_date',
        get_string('blog_post_date', 'theme_edubs'),
        get_string('blog_post_date_desc', 'theme_edubs'), null,
        array('0' => 'Visible',
            '1' => 'Hidden'
        ));
    $page->add($setting);

    // Page Settings button
    $setting = new admin_setting_configselect('theme_edubs/page_settings_controls',
        get_string('page_settings_controls', 'theme_edubs'),
        get_string('page_settings_controls_desc', 'theme_edubs'), null,
        array('0' => 'Moodle default (visible based on permissions)',
            '1' => 'Visible only to site administrators'
        ));
    $page->add($setting);


    // Title: SEO
    $page->add(new admin_setting_heading('theme_edubs/seo', get_string('seo', 'theme_edubs'), NULL));

    // Meta Description
    $setting = new admin_setting_configtextarea('theme_edubs/meta_description', get_string('meta_description','theme_edubs'), get_string('meta_description_desc', 'theme_edubs'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Meta Abstract
    $setting = new admin_setting_configtextarea('theme_edubs/meta_abstract', get_string('meta_abstract','theme_edubs'), get_string('meta_abstract_desc', 'theme_edubs'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Meta Keywords
    $setting = new admin_setting_configtext('theme_edubs/meta_keywords', get_string('meta_keywords','theme_edubs'), get_string('meta_keywords_desc', 'theme_edubs'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);



    $settings->add($page);

}
