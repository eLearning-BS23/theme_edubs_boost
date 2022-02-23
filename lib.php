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
 * Theme functions.
 *
 * @package    theme_edubs
 * @copyright  2018 Marcin Czaja - Rosea Themes
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Inject additional SCSS.
 *
 * @param theme_config $theme The theme config object.
 * @return string
 */
function theme_edubs_get_extra_scss($theme) {
    $content = '';
    // Always return the background image with the scss when we have it.
    return !empty($theme->settings->scss) ? $theme->settings->scss . ' ' . $content : $content;
}

/**
 * Serves any files associated with the theme settings.
 *
 * @param stdClass $course
 * @param stdClass $cm
 * @param context $context
 * @param string $filearea
 * @param array $args
 * @param bool $forcedownload
 * @param array $options
 * @return bool
 */
function theme_edubs_pluginfile($course, $cm, $context, $filearea, $args, $forcedownload, array $options = array()) {


    if ($context->contextlevel == CONTEXT_SYSTEM and preg_match("/^sponsorsimage[1-9][0-9]?$/", $filearea) !== false ||
        $context->contextlevel == CONTEXT_SYSTEM and preg_match("/^clientsimage[1-9][0-9]?$/", $filearea) !== false  ||
        $context->contextlevel == CONTEXT_SYSTEM and preg_match("/^sliderimage[1-9][0-9]?$/", $filearea) !== false ) {
        $theme = theme_config::load('edubs');
        // By default, theme files must be cache-able by both browsers and proxies.
        if (!array_key_exists('cacheability', $options)) {
            $options['cacheability'] = 'public';
        }
        return $theme->setting_file_serve($filearea, $args, $forcedownload, $options);
    }

    if ($context->contextlevel == CONTEXT_SYSTEM && ( $filearea === 'logo' ||
            $filearea === 'customlogotopbar' ||
            $filearea === 'heroimg' ||
            $filearea === 'heroshadowimg' ||
            $filearea === 'herovideomp4' ||
            $filearea === 'herovideowebm' ||
            $filearea === 'fphtmlblock3bgimg' ||
            $filearea === 'loginbg' ||
            $filearea === 'customlogosidebar' ||
            $filearea === 'mobiletopbarlogo' ||
            $filearea === 'favicon' ||
            $filearea === 'customfontlighteot' ||
            $filearea === 'customfontlightwoff' ||
            $filearea === 'customfontlightwoff2' ||
            $filearea === 'customfontlightttf' ||
            $filearea === 'customfontlightsvg' ||
            $filearea === 'customfontregulareot' ||
            $filearea === 'customfontregularwoff' ||
            $filearea === 'customfontregularwoff2' ||
            $filearea === 'customfontregularttf' ||
            $filearea === 'customfontregularsvg' ||
            $filearea === 'customfontmediumeot' ||
            $filearea === 'customfontmediumwoff' ||
            $filearea === 'customfontmediumwoff2' ||
            $filearea === 'customfontmediumttf' ||
            $filearea === 'customfontmediumsvg' ||
            $filearea === 'customfontboldeot' ||
            $filearea === 'customfontboldwoff' ||
            $filearea === 'customfontboldwoff2' ||
            $filearea === 'customfontboldttf' ||
            $filearea === 'customfontboldsvg'
        )) {
        $theme = theme_config::load('edubs');
        // By default, theme files must be cache-able by both browsers and proxies.
        if (!array_key_exists('cacheability', $options)) {
            $options['cacheability'] = 'public';
        }
        return $theme->setting_file_serve($filearea, $args, $forcedownload, $options);
    } else {
        send_file_not_found();
    }
}


function theme_edubs_get_main_scss_content($theme) {
    global $CFG;

    $scss = '';
    $filename = !empty($theme->settings->preset) ? $theme->settings->preset : null;
    $fs = get_file_storage();

    $context = context_system::instance();
    if ($filename == 'default.scss') {
        // We still load the default preset files directly from the boost theme. No sense in duplicating them.
        $scss .= file_get_contents($CFG->dirroot . '/theme/boost/scss/preset/default.scss');
    } else if ($filename == 'plain.scss') {
        // We still load the default preset files directly from the boost theme. No sense in duplicating them.
        $scss .= file_get_contents($CFG->dirroot . '/theme/boost/scss/preset/plain.scss');

    } else if ($filename && ($presetfile = $fs->get_file($context->id, 'theme_edubs', 'preset', 0, '/', $filename))) {
        // This preset file was fetched from the file area for theme_edubs and not theme_boost (see the line above).
        $scss .= $presetfile->get_content();
    } else {
        // Safety fallback - maybe new installs etc.
        $scss .= file_get_contents($CFG->dirroot . '/theme/boost/scss/preset/default.scss');
    }
    $pre = '';
    $configurable = [
        // Config key => [variableName, ...].
        'bodybg'              => ['body-bg'],
        'bodycolor'           => ['body-color'],
        'bodycolorsecondary'  => ['body-color-secondary'],
        'bodycolorlight'      => ['body-color-light'],
        'linkcolor'           => ['link-color'],
        'linkhovercolor'      => ['link-hover-color'],
        'bordercolor'         => ['border-color'],
        'cardbordercolor'     => ['card-border-color'],
        'cardbg'              => ['card-bg'],
        'cardtext'            => ['card-text'],
        'cardtitle'            => ['card-title'],
        // Colors
        'white'    => ['white'],
        'gray100' => ['gray-100'],
        'gray200' => ['gray-200'],
        'gray300' => ['gray-300'],
        'gray400' => ['gray-400'],
        'gray500' => ['gray-500'],
        'gray600' => ['gray-600'],
        'gray700' => ['gray-700'],
        'gray800' => ['gray-800'],
        'gray900' => ['gray-900'],
        'black'    => ['black'],
        'blue1'   => ['blue-1'],
        'blue2'   => ['blue-2'],
        'blue3'   => ['blue-3'],
        'blue4'   => ['blue-4'],
        'blue5'   => ['blue-5'],
        'blue6'   => ['blue-6'],
        'blue7'   => ['blue-7'],
        'blue8'   => ['blue-8'],
        'blue9'   => ['blue-9'],
        'red-1'    => ['red-1'],
        'red-2'    => ['red-2'],
        'red-3'    => ['red-3'],
        'red-4'    => ['red-4'],
        'red-5'    => ['red-5'],
        'red-6'    => ['red-6'],
        'red-7'    => ['red-7'],
        'yellow-1' => ['yellow-1'],
        'yellow-2' => ['yellow-2'],
        'yellow-3' => ['yellow-3'],
        'yellow-4' => ['yellow-4'],
        'yellow-5' => ['yellow-5'],
        'yellow-6' => ['yellow-6'],
        'yellow-7' => ['yellow-7'],
        'green-1'  => ['green-1'],
        'green-2'  => ['green-2'],
        'green-3'  => ['green-3'],
        'green-4'  => ['green-4'],
        'green-5'  => ['green-5'],
        'green-6'  => ['green-6'],
        'green-7'  => ['green-7'],
        'green-8'  => ['green-8'],
        'green-9'  => ['green-9'],
        'purple-1' => ['purple-1'],
        'purple-2' => ['purple-2'],
        'purple-3' => ['purple-3'],
        'purple-4' => ['purple-4'],
        //Theme Color
        'themecolor1' => ['theme-color-1'],
        'themecolor2' => ['theme-color-2'],
        'themecolor3' => ['theme-color-3'],
        'themecolor4' => ['theme-color-4'],
        'themecolor5' => ['theme-color-5'],
        'themecolor6' => ['theme-color-6'],
        'themecolor7' => ['theme-color-7'],
        'themecolor8' => ['theme-color-8'],
        'themecolor9' => ['theme-color-9'],
        //Dropdown
        'dropdownbg'                        => ['dropdown-bg'],
        'dropdowntext'                      => ['dropdown-text'],
        'dropdowndividerbg'                => ['dropdown-bdivider-bg'],
        'dropdowndividerbg'                => ['dropdown-divider-bg'],
        'dropdownlinkcolor'                => ['dropdown-link-color'],
        'dropdownlinkhovercolor'          => ['dropdown-link-hover-color'],
        'dropdownlinkhoverbg'             => ['dropdown-link-hover-bg'],
        'dropdownlinkactivecolor'         => ['dropdown-link-active-color'],
        'dropdownlinkactivebg'            => ['dropdown-link-active-bg'],
        'dropdownheadercolor'              => ['dropdown-header-color'],
        'dropdownshadow'                   => ['dropdown-shadow'],
        //Top Bar
        'top-bar-bg'                         => ['top-bar-bg'],
        'top-bar-bg-secondary'               => ['top-bar-bg-secondary'],
        'top-bar-bg-secondary-text'          => ['top-bar-bg-secondary-text'],
        'top-bar-border'                     => ['top-bar-border'],
        'top-bar-link'                       => ['top-bar-link'],
        'top-bar-link-hover'                 => ['top-bar-link-hover'],
        'top-bar-link-hover-bg'              => ['top-bar-link-hover-bg'],
        'top-bar-icons'                      => ['top-bar-icons'],
        'top-bar-icons-bg-hover'             => ['top-bar-icons-bg-hover'],
        'top-bar-text'                       => ['top-bar-text'],
        //Dropdown light e.g Top Bar
        'dropdown-light-bg'                  => ['dropdown-light-bg'],
        'dropdown-light-bg-secondary'        => ['dropdown-light-bg-secondary'],
        'dropdown-light-text'                => ['dropdown-light-text'],
        'dropdown-light-box-shadow'          => ['dropdown-light-box-shadow'],
        'dropdown-light-link-color'          => ['dropdown-light-link-color'],
        'dropdown-light-link-hover-color'    => ['dropdown-light-link-hover-color'],
        'dropdown-light-link-hover-bg'       => ['dropdown-light-link-hover-bg'],
        'dropdown-light-link-disabled-color' => ['dropdown-light-link-disabled-color'],
        'dropdown-light-header-color'        => ['dropdown-light-header-color'],
        'dropdown-light-border'              => ['dropdown-light-border'],
        //Button primary
        'btnprimarybg' => ['btn-primary-bg'],
        'btnprimarybghover' => ['btn-primary-bg-hover'],
        'btnprimaryborder' => ['btn-primary-border'],
        'btnprimaryborderhover' => ['btn-primary-border-hover'],
        'btnprimaryborderwidth' => ['btn-primary-border-width'],
        'btnprimarytext' => ['btn-primary-text'],
        'btnprimarytexthover' => ['btn-primary-text-hover'],
        'btnprimaryshadow' => ['btn-primary-shadow'],
        //Button Secondary
        'btnsecondarybg' => ['btn-secondary-bg'],
        'btnsecondarybghover' => ['btn-secondary-bg-hover'],
        'btnsecondaryborder' => ['btn-secondary-border'],
        'btnsecondaryborderhover' => ['btn-secondary-border-hover'],
        'btnsecondaryborderwidth' => ['btn-secondary-border-width'],
        'btnsecondarytext' => ['btn-secondary-text'],
        'btnsecondarytexthover' => ['btn-secondary-text-hover'],
        'btnsecondaryshadow' => ['btn-secondary-shadow'],
        //Button Reset
        'btnresetbg' => ['btn-reset-bg'],
        'btnresetbghover' => ['btn-reset-bg-hover'],
        'btnresetborder' => ['btn-reset-border'],
        'btnresetborderhover' => ['btn-reset-border-hover'],
        'btnresetborderwidth' => ['btn-reset-border-width'],
        'btnresettext' => ['btn-reset-text'],
        'btnresettexthover' => ['btn-reset-text-hover'],
        'btnresetshadow' => ['btn-reset-shadow'],
        //Button Special
        'btnspecialbg' => ['btn-special-bg'],
        'btnspecialbghover' => ['btn-special-bg-hover'],
        'btnspecialborder' => ['btn-special-border'],
        'btnspecialborderhover' => ['btn-special-border-hover'],
        'btnspecialborderwidth' => ['btn-special-border-width'],
        'btnspecialtext' => ['btn-special-text'],
        'btnspecialtext-hover' => ['btn-special-text-hover'],
        'btnspecialshadow' => ['btn-special-shadow'],
        //Drawer
        'drawerbg' => ['drawer-bg'],
        'drawernavboxbg' => ['drawer-nav-box-bg'],
        'drawernavboxshadow' => ['drawer-nav-box-shadow'],
        'drawernavitemactive' => ['drawer-nav-item-active'],
        'drawernavitemhover' => ['drawer-nav-item-hover'],
        'drawernavitemtextcolor' => ['drawer-nav-item-text-color'],
        'drawernavitemtextcolorhover' => ['drawer-nav-item-text-color-hover'],
        'drawernavitemtextcoloractive' => ['drawer-nav-item-text-color-active'],
        'drawernavitemcolorhover' => ['drawer-nav-item-text-color-hover'],
        'drawernavitemicon' => ['drawer-nav-item-icon'],
        'drawernavitemiconhover' => ['drawer-nav-item-icon-hover'],
        'drawernavitemiconactive' => ['drawer-nav-item-icon-active'],
        'drawerheading' => ['drawer-heading'],
        'drawertext' => ['drawer-text'],
        'drawerlink' => ['drawer-link'],
        'drawerlinkhover' => ['drawer-link-hover'],
        'drawerlinkhoverbg' => ['drawer-link-hover-bg'],
        'drawerhr' => ['drawer-hr'],
        'drawernaviconsize' => ['drawer-nav-icon-size'],
        'drawernaviconwidth' => ['drawer-nav-icon-width'],
        'drawernaviconfontsize' => ['drawer-nav-icon-font-size'],
        'drawernavitemiconopacity' => ['drawer-nav-item-icon-opacity'],
        'drawerwidth' => ['drawer-width'],
        //Footer
        'footerbg' => ['footer-bg'],
        'footertextcolor' => ['footer-text-color'],
        'footernavigationheading' => ['footer-navigation-heading'],
        'footernavigationcolor' => ['footer-navigation-color'],
        'footernavigationborder' => ['footer-navigation-border'],
        'footernavigationlinkcolor' => ['footer-navigation-link-color'],
        'footernavigationlinkcolorhover' => ['footer-navigation-link-color-hover'],
        //Fonts
        'fontweightlight' => ['font-weight-light'],
        'fontweightregular' => ['font-weight-regular'],
        'fontweightmedium' => ['font-weight-sm-bold'],
        'fontweightbold' => ['font-weight-bold'],
        'googlefontname' => ['font-family-sans-serif'],
        //Typo
        'fontsizelg' => ['font-size-lg'],
        'fontsizebase' => ['font-size-base'],
        'fontsizesm' => ['font-size-sm'],
        'fontsizexs' => ['font-size-xs'],
        'h2fontsize' => ['h2-font-size'],
        'h3fontsize' => ['h3-font-size'],
        'h4fontsize' => ['h4-font-size'],
        'h5fontsize' => ['h5-font-size'],
        'h6fontsize' => ['h6-font-size'],
        //Breakpoints
        'gridbreakpointsm' => ['grid-breakpoint-sm'],
        'gridbreakpointmd' => ['grid-breakpoint-md'],
        'gridbreakpointlg' => ['grid-breakpoint-lg'],
        //Cards
        'coursecarddescheight' => ['course-card-desc-height'],
        'cardimgheight' => ['card-img-height'],
        //Buttons
        'borderradius' => ['border-radius'],
        'btnborderradius' => ['btn-border-radius'],
        'btnborderwidth' => ['input-btn-border-width'],
        //Hero
        'heroshadowcolor1' => ['hero-gradient-1'],
        'heroshadowcolor2' => ['hero-gradient-2'],
        'heroshadowgradientdirection' => ['hero-gradient-direction'],
        'heroshadowheight' => ['hero-shadow-height'],
        'heroshadowtopmargin' => ['hero-shadow-top-margin'],
        'heroshadowproperties' => ['hero-shadow-properties'],
        'herocolor' => ['hero-color'],
        'heroh1size' => ['hero-h1-size'],
        'heroh3size' => ['hero-h3-size'],
        'heroh5size' => ['hero-h5-size'],
        'heromtop' => ['heromargin-top'],
        'herombottom' => ['heromargin-bottom'],
        'heroimageheightlg' => ['heroimageheight-lg'],
        'heroimageheightmd' => ['heroimageheight-md'],
        'heroimageheightsm' => ['heroimageheight-sm'],
        // General
        'sectionpadding' => ['section-padding'],
        'sectionpaddingsm' => ['section-padding-sm'],
        //Calendar
        'caleventcategorycolor' => ['calendarEventCategoryColor'],
        'caleventcoursecolor' => ['calendarEventCourseColor'],
        'caleventcategorycolor' => ['calendarEventCategoryColor'],
        'caleventglobalcolor' => ['calendarEventGlobalColor'],
        'caleventusercolor' => ['calendarEventUserColor'],
        'caleventgroupecolor' => ['calendarEventGroupeColor']
    ];

    // Prepend variables first.
    foreach ($configurable as $configkey => $targets) {
        $value = isset($theme->settings->{$configkey}) ? $theme->settings->{$configkey} : null;
        if (empty($value)) {
            continue;
        }
        array_map(function ($target) use (&$scss, $value) {
            $scss .= '$' . $target . ': ' . $value . ";\n";
        }, (array)$targets);
    }

    // Prepend pre-scss.
    if (!empty($theme->settings->scsspre)) {
        $scss .= $theme->settings->scsspre;
    }
    // Pre CSS - this is loaded AFTER any prescss from the setting but before the main scss.
    $pre .= file_get_contents($CFG->dirroot . '/theme/edubs/scss/pre.scss');

    // Post CSS - this is loaded AFTER the main scss but before the extra scss from the setting.
    $post = file_get_contents($CFG->dirroot . '/theme/edubs/scss/post.scss');

    // Combine them together.
    return $pre . "\n" . $scss . "\n" . $post;
//    return $scss;
}



function theme_edubs_update_settings_images($settingname) {
    global $CFG;

    // The setting name that was updated comes as a string like 's_theme_edubs_loginbackgroundimage'.
    // We split it on '_' characters.
    $parts = explode('_', $settingname);
    // And get the last one to get the setting name..
    $settingname = end($parts);

    // Admin settings are stored in system context.
    $syscontext = context_system::instance();
    // This is the component name the setting is stored in.
    $component = 'theme_edubs';

    // This is the value of the admin setting which is the filename of the uploaded file.
    $filename = get_config($component, $settingname);
    // We extract the file extension because we want to preserve it.
    $extension = substr($filename, strrpos($filename, '.') + 1);

    // This is the path in the moodle internal file system.
    $fullpath = "/{$syscontext->id}/{$component}/{$settingname}/0{$filename}";
    // Get an instance of the moodle file storage.
    $fs = get_file_storage();
    // This is an efficient way to get a file if we know the exact path.
    if ($file = $fs->get_file_by_hash(sha1($fullpath))) {
        // We got the stored file - copy it to dataroot.
        // This location matches the searched for location in theme_config::resolve_image_location.
        $pathname = $CFG->dataroot . '/pix_plugins/theme/edubs/' . $settingname . '.' . $extension;

        // This pattern matches any previous files with maybe different file extensions.
        $pathpattern = $CFG->dataroot . '/pix_plugins/theme/edubs/' . $settingname . '.*';

        // Make sure this dir exists.
        @mkdir($CFG->dataroot . '/pix_plugins/theme/edubs/', $CFG->directorypermissions, true);

        // Delete any existing files for this setting.
        foreach (glob($pathpattern) as $filename) {
            @unlink($filename);
        }

        // Copy the current file to this location.
        $file->copy_content_to($pathname);
    }

    // Reset theme caches.
    theme_reset_all_caches();
}


/**
 * Get theme setting
 *
 * @param string $setting
 * @param bool $format
 * @return string
 */
function theme_edubs_get_setting($setting, $format = false) {
    $theme = theme_config::load('edubs');

    if (empty($theme->settings->$setting)) {
        return false;
    } else if (!$format) {
        return $theme->settings->$setting;
    } else if ($format === 'format_text') {
        return format_text($theme->settings->$setting, FORMAT_PLAIN);
    } else if ($format === 'format_html') {
        return format_text($theme->settings->$setting, FORMAT_HTML, array('trusted' => true, 'noclean' => true));
    } else {
        return format_string($theme->settings->$setting);
    }
}

/**
 * Extend theme navigation
 * https://moodle.org/plugins/theme_moove
 * @param flat_navigation $flatnav
 */
function theme_edubs_extend_flat_navigation(\flat_navigation $flatnav) {
    theme_edubs_rebuildcoursesections($flatnav);
    theme_edubs_delete_menuitems($flatnav);
}

/**
 * Remove items from navigation
 * Author: Willian Mano Araújo
 * https://moodle.org/plugins/theme_moove
 * @param flat_navigation $flatnav
 */
function theme_edubs_delete_menuitems(\flat_navigation $flatnav) {

    foreach ($flatnav as $item) {

        $itemstodelete = [];

        if (in_array($item->key, $itemstodelete)) {
            $flatnav->remove($item->key);

            continue;
        }

        // modified
        if (is_numeric($item->key)) {

            $flatnav->remove($item->key);

            continue;
        }
        // end of modification

        if (isset($item->parent->key) && $item->parent->key == 'mycourses' &&
            isset($item->type) && $item->type == \navigation_node::TYPE_COURSE) {

            $flatnav->remove($item->key);

            continue;
        }

    }
}



/**
 * Improve flat navigation menu
 *
 * @param flat_navigation $flatnav
 */
function theme_edubs_rebuildcoursesections(\flat_navigation $flatnav) {
    global $PAGE;

    if (!isguestuser() ) {

        $participantsitem = $flatnav->find('participants', \navigation_node::TYPE_CONTAINER);

        if (!$participantsitem) {
            return;
        }

        if ($PAGE->course->format != 'singleactivity') {
            $coursesectionsoptions = [
                'text' => get_string('coursesections', 'theme_edubs'),
                'shorttext' => get_string('coursesections', 'theme_edubs'),
                'icon' => new pix_icon('t/viewdetails', ''),
                'type' => \navigation_node::COURSE_CURRENT,
                'key' => 'course-sections',
                'parent' => $participantsitem->parent
            ];

            $coursesections = new \flat_navigation_node($coursesectionsoptions, 0);

            foreach ($flatnav as $item) {
                if ($item->type == \navigation_node::TYPE_SECTION) {
                    $coursesections->add_node(new \navigation_node([
                        'text' => $item->text,
                        'shorttext' => $item->shorttext,
                        'icon' => $item->icon,
                        'type' => $item->type,
                        'key' => $item->key,
                        'parent' => $coursesections,
                        'action' => $item->action
                    ]));
                }
            }

            $flatnav->add($coursesections, 'myhome');

        }

    }
}