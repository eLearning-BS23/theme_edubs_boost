<?php
// This file is part of The Bootstrap Moodle theme
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
 * Renderers to align Moodle's HTML with that expected by Bootstrap
 *
 * @package    theme_edubs
 * @copyright   2018 Bas Brands
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace theme_edubs\output\core;
defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot . "/course/renderer.php");

use html_writer;
use core_course_category;
use moodle_url;
use core_course_list_element;
use lang_string;
use context_system;
use stdClass;
use action_menu;
use action_menu_link_secondary;

/**
 * Main renderer for the course management pages.
 *
 * @package theme_edubs
 * @copyright 2013 Sam Hemelryk
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class course_renderer extends \core_course_renderer
{

    /**
     * Renderers the actions that are possible for the course category listing.
     *
     * These are not the actions associated with an individual category listing.
     * That happens through category_listitem_actions.
     *
     * @param core_course_category $category
     * @return string
     */
    protected function course_overview_files(core_course_list_element $course): string {
        global $CFG;

        $contentimages = $contentfiles = '';
        foreach ($course->get_course_overviewfiles() as $file) {
            $isimage = $file->is_valid_image();
            $url = moodle_url::make_file_url("$CFG->wwwroot/pluginfile.php",
                '/' . $file->get_contextid() . '/' . $file->get_component() . '/' .
                $file->get_filearea() . $file->get_filepath() . $file->get_filename(), !$isimage);
            if ($isimage) {
                $divcontents = '';
                $divcontents .= html_writer::empty_tag('img',['src' => $url]);
                $divcontents .= html_writer::tag( 'div',html_writer::tag( 'button',
                    VIEWMORE,['class'=> 'btn']),
                    ['class'=> 'image-overlay']);

                $contentimages .= html_writer::tag('div',
                    html_writer::tag('div',
                       $divcontents,
                    ['class'=> 'image']),
                    ['class' => 'courseimage']);
            } else {
                $image = $this->output->pix_icon(file_file_icon($file, 24), $file->get_filename(), 'moodle');
                $filename = html_writer::tag('span', $image, ['class' => 'fp-icon']).
                    html_writer::tag('span', $file->get_filename(), ['class' => 'fp-filename']);
                $contentfiles .= html_writer::tag('span',
                    html_writer::link($url, $filename),
                    ['class' => 'coursefile fp-filename-icon']);
            }
        }
        return $contentimages . $contentfiles;
    }
}

