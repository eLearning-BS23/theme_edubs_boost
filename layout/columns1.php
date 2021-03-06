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
    'bodyattributes' => $bodyattributes,
    'siteurl' => $siteurl
];

// Top bar Styles - add element to the array
for ($i = 1; $i <= 6; $i++) {
    $n = "topbarstyle" . $i;
    $templatecontext[$n] = ${"topbarstyle" . $i};
}
//End


$themesettings = new \theme_edubs\util\theme_settings();
//$templatecontext = array_merge($templatecontext, $themesettings->hero());
//$templatecontext = array_merge($templatecontext, $themesettings->blockcategories());
//$templatecontext = array_merge($templatecontext, $themesettings->block1());
//$templatecontext = array_merge($templatecontext, $themesettings->block2());
//$templatecontext = array_merge($templatecontext, $themesettings->block3());
//$templatecontext = array_merge($templatecontext, $themesettings->block4());
//$templatecontext = array_merge($templatecontext, $themesettings->team());
//$templatecontext = array_merge($templatecontext, $themesettings->logos());
$templatecontext = array_merge($templatecontext, $themesettings->customnav());
$templatecontext = array_merge($templatecontext, $themesettings->head_elements());
$templatecontext = array_merge($templatecontext, $themesettings->fonts());

echo $OUTPUT->render_from_template('theme_edubs/columns1', $templatecontext);
