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

defined('MOODLE_INTERNAL') || die();

user_preference_allow_ajax_update('drawer-open-nav', PARAM_ALPHA);
require_once($CFG->libdir . '/behat/lib.php');
// MODIFICATION Start: Require own locallib.php.
require_once($CFG->dirroot . '/theme/edubs/locallib.php');
// MODIFICATION END.

$bodyattributes = $OUTPUT->body_attributes([]);
$siteurl = $CFG->wwwroot;

if (isloggedin()) {
    $navdraweropen = (get_user_preferences('drawer-open-nav', 'true') == 'true');
} else {
    $navdraweropen = false;
}

$extraclasses = [];
if ($navdraweropen) {
    $extraclasses[] = 'drawer-open-left';
}

//Top bar style
$topbarstyle = theme_edubs_get_setting('topbarstyle');
$pluginsettings = get_config("theme_edubs");
if( $topbarstyle == "topbarstyle-1") { $topbarstyle1 = $topbarstyle; } else { $topbarstyle1 = false; }
if( $topbarstyle == "topbarstyle-2") { $topbarstyle2 = $topbarstyle; } else { $topbarstyle2 = false; }
if( $topbarstyle == "topbarstyle-3") { $topbarstyle3 = $topbarstyle; } else { $topbarstyle3 = false; }
if( $topbarstyle == "topbarstyle-4") { $topbarstyle4 = $topbarstyle; } else { $topbarstyle4 = false; }
if( $topbarstyle == "topbarstyle-5") { $topbarstyle5 = $topbarstyle; } else { $topbarstyle5 = false; }
if( $topbarstyle == "topbarstyle-6") { $topbarstyle6 = $topbarstyle; } else { $topbarstyle6 = false; }
if( $topbarstyle == "topbarstyle-7") { $topbarstyle7 = $topbarstyle; } else { $topbarstyle7 = false; }
//end

$bodyattributes = $OUTPUT->body_attributes($extraclasses);
$blockshtml = $OUTPUT->blocks('side-pre');
//$blockshtml2 = $OUTPUT->blocks('sidebar');
//$blockshtml3 = $OUTPUT->blocks('maintopwidgets');
//$blockshtml4 = $OUTPUT->blocks('mainfwidgets');
//$blockshtml5 = $OUTPUT->blocks('sidebar-top');
$hasblocks = strpos($blockshtml, 'data-block=') !== false;
$siteurl = $CFG->wwwroot;


$buildregionmainsettings = !$PAGE->include_region_main_settings_in_header_actions();
// If the settings menu will be included in the header then don't add it here.
$regionmainsettingsmenu = $buildregionmainsettings ? $OUTPUT->region_main_settings_menu() : false;

//Top bar style
$topbarstyle = theme_edubs_get_setting('topbarstyle');
$pluginsettings = get_config("theme_edubs");
for ($i = 1; $i <= 6; $i++) {
    if( $topbarstyle == "topbarstyle-" . $i) { ${"topbarstyle" . $i} = $topbarstyle; } else { ${"topbarstyle" . $i} = false; }
}
//end

$templatecontext = [
    'sitename' => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID), "escape" => false]),
    'output' => $OUTPUT,
    'sidepreblocks' => $blockshtml,
    'hasblocks' => $hasblocks,
    'bodyattributes' => $bodyattributes,
    'navdraweropen' => $navdraweropen,
    'regionmainsettingsmenu' => $regionmainsettingsmenu,
    'hasregionmainsettingsmenu' => !empty($regionmainsettingsmenu),
    'siteurl' => $siteurl
];

// Top bar Styles - add element to the array
for ($i = 1; $i <= 6; $i++) {
    $n = "topbarstyle" . $i;
    $templatecontext[$n] = ${"topbarstyle" . $i};
}
//End

// Improve edubs navigation.
$boostfumblingnav = theme_edubs_get_setting('boostfumblingnav');
if (!$boostfumblingnav) {
    theme_edubs_extend_flat_navigation($PAGE->flatnav);
}
$nav = $PAGE->flatnav;
$templatecontext['flatnavigation'] = $nav;
$templatecontext['firstcollectionlabel'] = $nav->get_collectionlabel();

$themesettings = new \theme_edubs\util\theme_settings();

$templatecontext = array_merge($templatecontext, $themesettings->head_elements());
$templatecontext = array_merge($templatecontext, $themesettings->footer_items());
$templatecontext = array_merge($templatecontext, $themesettings->customnav());
$templatecontext = array_merge($templatecontext, $themesettings->sidebar_custom_block());
$templatecontext = array_merge($templatecontext, $themesettings->top_bar_custom_block());
$templatecontext = array_merge($templatecontext, $themesettings->fonts());

echo $OUTPUT->render_from_template('theme_edubs/columns2', $templatecontext);

