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

namespace theme_edubs\output;

defined('MOODLE_INTERNAL') || die;
use action_link;
use action_menu;
use action_menu_filler;
use action_menu_link_secondary;
use block_contents;
use block_move_target;
use coding_exception;
use context_course;
use context_system;
use core_text;
use custom_menu;
use custom_menu_item;
use html_writer;
use moodle_page;
use moodle_url;
use navigation_node;
use pix_icon;
use stdClass;


global $USER, $CFG, $SESSION, $OUTPUT, $COURSE, $DB;
require_once($CFG->libdir . '/behat/lib.php');
require_once($CFG->dirroot."/course/format/lib.php");
require_once($CFG->dirroot."/config.php");
//require('../../../config.php');



class core_renderer extends \core_renderer {
    /**
     * User Name
     *
     * @return string HTML to display the current user first name.
     */
    public function getuserfirstname() {
        global $USER;

        $config = $USER->firstname;
        return $config;

    }
    /**
     * Wrapper for header elements.
     *
     * @return string HTML to display the main header.
     */
    public function full_header() {
        global $CFG;
        $userfirstname = $this->getuserfirstname();
//        var_dump($userfirstname); die();
        if ($this->page->include_region_main_settings_in_header_actions() &&
            !$this->page->blocks->is_block_present('settings')) {
            // Only include the region main settings if the page has requested it and it doesn't already have
            // the settings block on it. The region main settings are included in the settings block and
            // duplicating the content causes behat failures.
            $this->page->add_header_action(html_writer::div(
                $this->region_main_settings_menu(),
                'd-print-none',
                ['id' => 'region-main-settings-menu']
            ));
        }

        $header = new stdClass();
        $header->settingsmenu = $this->context_header_settings_menu();
        $header->intro = get_string('welcome', 'theme_edubs');
        $header->userfirstname = $userfirstname . get_string('sign', 'theme_edubs');
        $header->contextheader = $this->context_header();
        $header->hasnavbar = empty($this->page->layout_options['nonavbar']);
        $header->navbar = $this->navbar();
        $header->pageheadingbutton = $this->page_heading_button();
        $header->courseheader = $this->course_header();
        $header->imageurl = $CFG->wwwroot."/theme/edubs/images/custom-1.svg";
        $header->headeractions = $this->page->get_header_actions();


        return $this->render_from_template('theme_edubs/full_header', $header);
    }

//    /**
//     * This renders the navbar.
//     * Uses bootstrap compatible html.
//     */
//    public function navdrawer() {
//        return $this->render_from_template('theme_edubs/nav-drawer', $this->page->navbar);
//    }
//    public function navdrawer() {
//        global $CFG;
//        $data = new stdClass();
//        $data->imageurl = $CFG->wwwroot."/theme/edubs/images/custom-1.svg";
//
//
//        return $this->render_from_template('theme_edubs/nav-drawer', $data);
//    }



//    /**
//     * Whether we should display the logo in the navbar.
//     *
//     * We will when there are no main logos, and we have compact logo.
//     *
//     * @return bool
//     */
//    public function should_display_navbar_logo() {
////        global $CFG;
////        $url = $CFG->wwwroot."/theme/edubs/images/custom-1.svg";
//        $logo = $this->get_compact_logo_url();
//        return !empty($logo) && !$this->should_display_main_logo();
//    }
}