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
 * Custom edubs icon system
 *
 * @package    theme_edubs
 * @copyright  2019 Marcin Czaja - Rosea Themes
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace theme_edubs\output;

defined('MOODLE_INTERNAL') || die();


class icon_system_fontawesome extends \core\output\icon_system_fontawesome {
    /**
     * Change the core icon map.
     *
     * @return Array replaced icons.
     */
    public function get_core_icon_map() {
        $iconmap = parent::get_core_icon_map();

        $iconmap['core:docs'] = 'fas fa-info-circle';
        $iconmap['core:help'] = 'far fa-question-circle text-muted';
        $iconmap['core:req'] = 'fas fa-exclamation-triangle text-danger small-icon mx-2';
        $iconmap['core:movehere'] = 'fas fa-compress-arrows-alt';
        $iconmap['core:a/add_file'] = 'far fa-file';
        $iconmap['core:a/create_folder'] = 'fas fa-folder-plus';
        $iconmap['core:a/download_all'] = 'fas fa-download';
        $iconmap['core:a/help'] = 'far fa-question-circle';
        $iconmap['core:a/logout'] = 'fas fa-sign-out-alt';
        $iconmap['core:a/refresh'] = 'fas fa-redo-alt';
        $iconmap['core:a/search'] = 'fas fa-search';
        $iconmap['core:a/setting'] = 'fas fa-cog';
        $iconmap['core:a/view_icon_active'] = 'fas fa-th';
        $iconmap['core:a/view_list_active'] = 'fas fa-list';
        $iconmap['core:a/view_tree_active'] = 'fas fa-folder';
        $iconmap['core:b/bookmark-new'] = 'fas fa-bookmark';
        $iconmap['core:b/document-edit'] = 'fas fa-edit';
        $iconmap['core:b/document-new'] = 'far fa-file';
        $iconmap['core:b/document-properties'] = 'fas fa-info-circle';
        $iconmap['core:b/edit-copy'] = 'far fa-copy';
        $iconmap['core:b/edit-delete'] = 'fas fa-trash';
        $iconmap['core:e/file-text'] = 'far fa-file-alt';
        $iconmap['core:e/abbr'] = 'fas fa-comment-alt';
        $iconmap['core:e/absolute'] = 'fas fa-crosshairs';
        $iconmap['core:e/accessibility_checker'] = 'fas fa-universal-access';
        $iconmap['core:e/acronym'] = 'fas fa-comment-alt';
        $iconmap['core:e/advance_hr'] = 'fas fa-arrows-alt-h';
        $iconmap['core:e/align_center'] = 'fas fa-align-center';
        $iconmap['core:e/align_left'] = 'fas fa-align-left';
        $iconmap['core:e/align_right'] = 'fas fa-align-right';
        $iconmap['core:e/anchor'] = 'fas fa-chain';
        $iconmap['core:e/backward'] = 'fas fa-undo-alt';
        $iconmap['core:e/bold'] = 'fas fa-bold';
        $iconmap['core:e/bullet_list'] = 'fas fa-list-ul';
        $iconmap['core:e/cancel'] = 'fas fa-times';
        $iconmap['core:e/cell_props'] = 'fas fa-info-circle';
        $iconmap['core:e/cite'] = 'fas fa-quote-right';
        $iconmap['core:e/cleanup_messy_code'] = 'fas fa-eraser';
        $iconmap['core:e/clear_formatting'] = 'fas fa-i-cursor';
        $iconmap['core:e/copy'] = 'fas fa-clone';
        $iconmap['core:e/cut'] = 'fas fa-scissors';
        $iconmap['core:e/decrease_indent'] = 'fas fa-outdent';
        $iconmap['core:e/delete_col'] = 'far fa-minus-square';
        $iconmap['core:e/delete_row'] = 'far fa-minus-square';
        $iconmap['core:e/delete'] = 'far fa-minus-square';
        $iconmap['core:e/delete_table'] = 'far fa-minus-square';
        $iconmap['core:e/document_properties'] = 'fas fa-info-circle';
        $iconmap['core:e/emoticons'] = 'far fa-smile';
        $iconmap['core:e/find_replace'] = 'fas fa-search-plus';
        $iconmap['core:e/forward'] = 'fas fa-arrow-right';
        $iconmap['core:e/fullpage'] = 'fas fa-arrows-alt';
        $iconmap['core:e/fullscreen'] = 'fas fa-arrows-alt';
        $iconmap['core:e/help'] = 'far fa-question-circle';
        $iconmap['core:e/increase_indent'] = 'fas fa-indent';
        $iconmap['core:e/insert_col_after'] = 'fas fa-columns';
        $iconmap['core:e/insert_col_before'] = 'fas fa-columns';
        $iconmap['core:e/insert_date'] = 'far fa-calendar-alt';
        $iconmap['core:e/insert_edit_image'] = 'fas fa-image';
        $iconmap['core:e/insert_edit_link'] = 'fas fa-link';
        $iconmap['core:e/insert_edit_video'] = 'far fa-file-video';
        $iconmap['core:e/insert_file'] = 'far fa-hdd';
        $iconmap['core:e/insert_horizontal_ruler'] = 'fas fa-arrows-alt-h';
        $iconmap['core:e/insert_nonbreaking_alpha'] = 'far fa-square';
        $iconmap['core:e/insert_page_break'] = 'fas fa-window-minimize';
        $iconmap['core:e/insert_row_after'] = 'far fa-plus-square';
        $iconmap['core:e/insert_row_before'] = 'far fa-plus-square';
        $iconmap['core:e/insert'] = 'far fa-plus-square';
        $iconmap['core:e/insert_time'] = 'fas fa-clock';
        $iconmap['core:e/italic'] = 'fas fa-italic';
        $iconmap['core:e/justify'] = 'fas fa-align-justify';
        $iconmap['core:e/layers_over'] = 'fas fa-arrow-alt-circle-up';
        $iconmap['core:e/layers'] = 'fas fa-window-restore';
        $iconmap['core:e/layers_under'] = 'fas fa-stream';
        $iconmap['core:e/left_to_right'] = 'fas fa-chevron-right';
        $iconmap['core:e/manage_files'] = 'fas fa-cog';
        $iconmap['core:e/math'] = 'fas fa-calculator';
        $iconmap['core:e/merge_cells'] = 'fas fa-compress';
        $iconmap['core:e/new_document'] = 'far fa-file';
        $iconmap['core:e/numbered_list'] = 'fas fa-list-ol';
        $iconmap['core:e/page_break'] = 'fas fa-window-minimize';
        $iconmap['core:e/paste'] = 'fas fa-clipboard';
        $iconmap['core:e/paste_text'] = 'fas fa-clipboard';
        $iconmap['core:e/paste_word'] = 'fas fa-clipboard';
        $iconmap['core:e/prevent_autolink'] = 'fas fa-exclamation-triangle';
        $iconmap['core:e/preview'] = 'fas fa-search-plus';
        $iconmap['core:e/print'] = 'fas fa-print';
        $iconmap['core:e/question'] = 'far fa-question-circle';
        $iconmap['core:e/redo'] = 'fas fa-redo-alt';
        $iconmap['core:e/remove_link'] = 'fas fa-unlink';
        $iconmap['core:e/remove_page_break'] = 'fas fa-remove';
        $iconmap['core:e/resize'] = 'fas fa-expand';
        $iconmap['core:e/restore_draft'] = 'fas fa-undo-alt';
        $iconmap['core:e/restore_last_draft'] = 'fas fa-undo-alt';
        $iconmap['core:e/right_to_left'] = 'fas fa-chevron-left';
        $iconmap['core:e/row_props'] = 'fas fa-info-circle';
        $iconmap['core:e/save'] = 'fas fa-save';
        $iconmap['core:e/screenreader_helper'] = 'fas fa-braille';
        $iconmap['core:e/search'] = 'fas fa-search';
        $iconmap['core:e/select_all'] = 'fas fa-arrows-alt-h';
        $iconmap['core:e/show_invisible_characters'] = 'fas fa-eye-slash';
        $iconmap['core:e/source_code'] = 'fas fa-code';
        $iconmap['core:e/special_character'] = 'fas fa-edit';
        $iconmap['core:e/spellcheck'] = 'fas fa-check';
        $iconmap['core:e/split_cells'] = 'fas fa-columns';
        $iconmap['core:e/strikethrough'] = 'fas fa-strikethrough';
        $iconmap['core:e/styleprops'] = 'fas fa-info-circle';
        $iconmap['core:e/subscript'] = 'fas fa-subscript';
        $iconmap['core:e/superscript'] = 'fas fa-superscript';
        $iconmap['core:e/table_props'] = 'fas fa-table';
        $iconmap['core:e/table'] = 'fas fa-table';
        $iconmap['core:e/template'] = 'fas fa-sticky-note';
        $iconmap['core:e/text_color_picker'] = 'fas fa-paint-brush';
        $iconmap['core:e/text_color'] = 'fas fa-paint-brush';
        $iconmap['core:e/text_highlight_picker'] = 'far fa-lightbulb';
        $iconmap['core:e/text_highlight'] = 'far fa-lightbulb';
        $iconmap['core:e/tick'] = 'fas fa-check';
        $iconmap['core:e/toggle_blockquote'] = 'fas fa-quote-left';
        $iconmap['core:e/underline'] = 'fas fa-underline';
        $iconmap['core:e/undo'] = 'fas fa-undo-alt';
        $iconmap['core:e/visual_aid'] = 'fas fa-universal-access';
        $iconmap['core:e/visual_blocks'] = 'fas fa-audio-description';
        $iconmap['core:e/styleparagraph'] = 'fas fa-font';
        $iconmap['core:i/addblock'] = 'far fa-plus-square';
        $iconmap['core:i/assignroles'] = 'fas fa-user-plus';
        $iconmap['core:i/backup'] = 'far fa-file-archive';
        $iconmap['core:i/badge'] = 'fas fa-trophy';
        $iconmap['core:i/calc'] = 'fas fa-calculator';
        $iconmap['core:i/calendar'] = 'far fa-calendar-alt';
        $iconmap['core:i/calendareventdescription'] = 'fas fa-align-left';
        $iconmap['core:i/calendareventtime'] = 'fas fa-clock';
        $iconmap['core:i/caution'] = 'fas fa-exclamation-triangle text-danger';
        $iconmap['core:i/checked'] = 'fas fa-check';
        $iconmap['core:i/checkpermissions'] = 'fas fa-lock-open';
        $iconmap['core:i/cohort'] = 'fas fa-users';
        $iconmap['core:i/competencies'] = 'fas fa-check';
        $iconmap['core:i/completion_self'] = 'fas fa-user-circle';
        $iconmap['core:i/dashboard'] = 'fas fa-columns';
        $iconmap['core:i/lock'] = 'fas fa-lock';
        $iconmap['core:i/categoryevent'] = 'fas fa-book';
        $iconmap['core:i/course'] = 'fas fa-graduation-cap';
        $iconmap['core:i/courseevent'] = 'fas fa-graduation-cap';
        $iconmap['core:i/db'] = 'fas fa-database';
        $iconmap['core:i/delete'] = 'fas fa-trash';
        $iconmap['core:i/down'] = 'fas fa-arrow-down';
        $iconmap['core:i/dragdrop'] = 'fas fa-arrows-alt';
        $iconmap['core:i/duration'] = 'fas fa-clock';
        $iconmap['core:i/emojicategoryactivities'] = 'fas fa-futbol';
        $iconmap['core:i/emojicategoryanimalsnature'] = 'fas fa-leaf';
        $iconmap['core:i/emojicategoryflags'] = 'fas fa-flag-usa';
        $iconmap['core:i/emojicategoryfooddrink'] = 'fas fa-utensils';
        $iconmap['core:i/emojicategoryobjects'] = 'fas fa-lightbulb';
        $iconmap['core:i/emojicategoryrecent'] = 'fas fa-history';
        $iconmap['core:i/emojicategorysmileyspeople'] = 'far fa-smile';
        $iconmap['core:i/emojicategorysymbols'] = 'fas fa-heart';
        $iconmap['core:i/emojicategorytravelplaces'] = 'fas fa-plane';
        $iconmap['core:i/edit'] = 'fas fa-edit';
        $iconmap['core:i/email'] = 'fas fa-envelope';
        $iconmap['core:i/empty'] = 'far fa-folder';
        $iconmap['core:i/enrolmentsuspended'] = 'fas fa-pause';
        $iconmap['core:i/enrolusers'] = 'fas fa-user-plus';
        $iconmap['core:i/expired'] = 'fas fa-exclamation-triangle text-danger';
        $iconmap['core:i/export'] = 'fas fa-download';
        $iconmap['core:i/files'] = 'far fa-hdd';
        $iconmap['core:i/filter'] = 'fas fa-filter';
        $iconmap['core:i/flagged'] = 'fas fa-flag-checkered';
        $iconmap['core:i/folder'] = 'fas fa-folder';
        $iconmap['core:i/grade_correct'] = 'fas fa-check text-success';
        $iconmap['core:i/grade_incorrect'] = 'fas fa-times text-danger';
        $iconmap['core:i/grade_partiallycorrect'] = 'fas fa-check-square';
        $iconmap['core:i/grades'] = 'fas fa-book-open';
        $iconmap['core:i/groupevent'] = 'fas fa-users';
        $iconmap['core:i/groupn'] = 'fas fa-users-cog text-danger';
        $iconmap['core:i/group'] = 'fas fa-users';
        $iconmap['core:i/groups'] = 'fas fa-users-cog';
        $iconmap['core:i/groupv'] = 'fas fa-users';
        $iconmap['core:i/home'] = 'fas fa-home';
        $iconmap['core:i/hide'] = 'fas fa-eye';
        $iconmap['core:i/hierarchylock'] = 'fas fa-lock';
        $iconmap['core:i/import'] = 'fas fa-arrow-alt-circle-up';
        $iconmap['core:i/info'] = 'fas fa-info-circle';
        $iconmap['core:i/invalid'] = 'fas fa-times text-danger';
        $iconmap['core:i/item'] = 'fas fa-circle';
        $iconmap['core:i/loading'] = 'fas fa-circle-notch fa-spin';
        $iconmap['core:i/loading_small'] = 'fas fa-circle-notch fa-spin';
        $iconmap['core:y/loading'] = 'fas fa-circle-notch fa-spin';
        $iconmap['core:i/lock'] = 'fas fa-lock';
        $iconmap['core:i/log'] = 'fas fa-list-alt';
        $iconmap['core:i/mahara_host'] = 'fas fa-id-badge';
        $iconmap['core:i/manual_item'] = 'far fa-square';
        $iconmap['core:i/marked'] = 'fas fa-circle';
        $iconmap['core:i/marker'] = 'fas fa-highlighter';
        $iconmap['core:i/mean'] = 'fas fa-calculator';
        $iconmap['core:i/menu'] = 'fas fa-list-alt';
        $iconmap['core:i/menubars'] = 'fas fa-menu';
        $iconmap['core:i/mnethost'] = 'fas fa-external-link';
        $iconmap['core:i/moodle_host'] = 'fas fa-graduation-cap';
        $iconmap['core:i/move_2d'] = 'fas fa-arrows-alt';
        $iconmap['core:i/navigationitem'] = 'far fa-folder';
        $iconmap['core:i/ne_red_mark'] = 'fas fa-remove';
        $iconmap['core:i/new'] = 'fas fa-bolt';
        $iconmap['core:i/news'] = 'far fa-newspaper';
        $iconmap['core:i/nosubcat'] = 'far fa-plus-square';
        $iconmap['core:i/notifications'] = 'far fa-bell';
        $iconmap['core:i/open'] = 'fas fa-folder-open';
        $iconmap['core:i/outcomes'] = 'fas fa-tasks';
        $iconmap['core:i/payment'] = 'fas fa-money';
        $iconmap['core:i/permissionlock'] = 'fas fa-lock';
        $iconmap['core:i/permissions'] = 'fas fa-edit';
        $iconmap['core:i/persona_sign_in_black'] = 'fas fa-male';
        $iconmap['core:i/portfolio'] = 'fas fa-id-badge';
        $iconmap['core:i/preview'] = 'fas fa-search-plus';
        $iconmap['core:i/privatefiles'] = 'far fa-hdd';
        $iconmap['core:i/progressbar'] = 'fas fa-spinner fa-spin';
        $iconmap['core:i/publish'] = 'fas fa-share';
        $iconmap['core:i/questions'] = 'far fa-question-circle';
        $iconmap['core:i/reload'] = 'fas fa-redo-alt';
        $iconmap['core:i/report'] = 'fas fa-chart-area';
        $iconmap['core:i/repository'] = 'far fa-hdd-o';
        $iconmap['core:i/restore'] = 'fas fa-arrow-alt-circle-up';
        $iconmap['core:i/return'] = 'fas fa-undo-alt';
        $iconmap['core:i/role'] = 'fas fa-user-md';
        $iconmap['core:i/rss'] = 'fas fa-rss';
        $iconmap['core:i/rsssitelogo'] = 'fas fa-graduation-cap';
        $iconmap['core:i/scales'] = 'fas fa-balance-scale';
        $iconmap['core:i/scheduled'] = 'fas fa-calendar-check-o';
        $iconmap['core:i/search'] = 'fas fa-search';
        $iconmap['core:i/section'] = 'far fa-folder';
        $iconmap['core:i/settings'] = 'fas fa-cog';
        $iconmap['core:i/show'] = 'fas fa-eye-slash';
        $iconmap['core:i/siteevent'] = 'fas fa-globe-americas';
        $iconmap['core:i/star-rating'] = 'fas fa-star';
        $iconmap['core:i/stats'] = 'fas fa-line-chart';
        $iconmap['core:i/switch'] = 'fas fa-exchange';
        $iconmap['core:i/switchrole'] = 'fas fa-user-secret';
        $iconmap['core:i/twoway'] = 'fas fa-arrows-alt-h';
        $iconmap['core:i/unchecked'] = 'far fa-square';
        $iconmap['core:i/unflagged'] = 'fas fa-flag';
        $iconmap['core:i/unlock'] = 'fas fa-unlock';
        $iconmap['core:i/up'] = 'fas fa-arrow-up';
        $iconmap['core:i/userevent'] = 'fas fa-user';
        $iconmap['core:i/user'] = 'fas fa-user';
        $iconmap['core:i/users'] = 'fas fa-users';
        $iconmap['core:i/valid'] = 'fas fa-check text-success';
        $iconmap['core:i/warning'] = 'fas fa-exclamation-triangle text-danger';
        $iconmap['core:i/withsubcat'] = 'far fa-plus-square';
        $iconmap['core:i/star'] = 'fas fa-star';
        $iconmap['core:i/star-half'] = 'fas fa-star-half-alt';
        $iconmap['core:i/moremenu'] = 'fas fa-ellipsis-v';
        $iconmap['core:i/previous'] = 'fas fa-arrow-left';
        $iconmap['core:i/next'] = 'fas fa-arrow-right';
        $iconmap['core:i/bullhorn'] = 'fas fa-bullhorn mr-2 mb-2';
        $iconmap['core:i/checkedcircle'] = 'fas fa-check-circle';
        $iconmap['core:i/uncheckedcircle'] = 'far fa-circle';
        $iconmap['core:i/sendmessage'] = 'far fa-paper-plane';
        $iconmap['core:i/location'] = 'fas fa-map-marker-alt';
        $iconmap['core:i/contentbank'] = 'fas fa-box-open';
        $iconmap['core:i/trash'] = 'fas fa-trash';
        $iconmap['core:i/upload'] = 'fas fa-file-upload';
        $iconmap['core:i/star-o'] = 'far fa-star';
        $iconmap['core:i/otherevent'] = 'fas fa-neuter';
        $iconmap['core:e/cancel_solid_circle'] = 'far fa-times-circle';
        $iconmap['core:m/USD'] = 'fas fa-usd';
        $iconmap['core:t/addcontact'] = 'fas fa-address-card';
        $iconmap['core:t/add'] = 'far fa-plus-square';
        $iconmap['core:t/approve'] = 'fas fa-thumbs-up';
        $iconmap['core:t/assignroles'] = 'fas fa-user-cog';
        $iconmap['core:t/award'] = 'fas fa-trophy';
        $iconmap['core:t/backpack'] = 'fas fa-shopping-bag';
        $iconmap['core:t/backup'] = 'fas fa-arrow-circle-down';
        $iconmap['core:t/block'] = 'fas fa-ban';
        $iconmap['core:t/block_to_dock_rtl'] = 'fas fa-chevron-right';
        $iconmap['core:t/block_to_dock'] = 'fas fa-chevron-left';
        $iconmap['core:t/calc_off'] = 'fas fa-calculator'; // TODO: Change to better icon once we have stacked icon support or more icons.
        $iconmap['core:t/calc'] = 'fas fa-calculator';
        $iconmap['core:t/check'] = 'fas fa-check';
        $iconmap['core:t/cohort'] = 'fas fa-users';
        $iconmap['core:t/collapsed_empty_rtl'] = 'far fa-plus-square';
        $iconmap['core:t/collapsed_empty'] = 'far fa-plus-square';
        $iconmap['core:t/collapsed_rtl'] = 'far fa-plus-square';
        $iconmap['core:t/collapsed'] = 'far fa-plus-square';
        $iconmap['core:t/contextmenu'] = 'fas fa-cog';
        $iconmap['core:t/copy'] = 'fas fa-copy';
        $iconmap['core:t/delete'] = 'fas fa-trash';
        $iconmap['core:t/dockclose'] = 'fas fa-window-close';
        $iconmap['core:t/dock_to_block_rtl'] = 'fas fa-chevron-right';
        $iconmap['core:t/dock_to_block'] = 'fas fa-chevron-left';
        $iconmap['core:t/download'] = 'fas fa-download';
        $iconmap['core:t/down'] = 'fas fa-arrow-down';
        $iconmap['core:t/dropdown'] = 'fas fa-cog';
        $iconmap['core:t/editinline'] = 'fas fa-edit';
        $iconmap['core:t/edit_menu'] = 'fas fa-cog';
        $iconmap['core:t/editstring'] = 'fas fa-edit';
        $iconmap['core:t/edit'] = 'fas fa-cog';
        $iconmap['core:t/emailno'] = 'fas fa-ban';
        $iconmap['core:t/email'] = 'fas fa-envelope-o';
        $iconmap['core:t/enrolusers'] = 'fas fa-user-plus';
        $iconmap['core:t/expanded'] = 'fas fa-caret-down';
        $iconmap['core:t/go'] = 'fas fa-play';
        $iconmap['core:t/grades'] = 'fas fa-book-open';
        $iconmap['core:t/groupn'] = 'fas fa-user';
        $iconmap['core:t/groups'] = 'fas fa-user-cog';
        $iconmap['core:t/groupv'] = 'fas fa-user-circle';
        $iconmap['core:t/hide'] = 'fas fa-eye';
        $iconmap['core:t/left'] = 'fas fa-arrow-left';
        $iconmap['core:t/less'] = 'fas fa-caret-up';
        $iconmap['core:t/locked'] = 'fas fa-lock';
        $iconmap['core:t/lock'] = 'fas fa-unlock';
        $iconmap['core:t/locktime'] = 'fas fa-lock';
        $iconmap['core:t/markasread'] = 'fas fa-check';
        $iconmap['core:t/messages'] = 'far fa-comment-dots';
        $iconmap['core:t/message'] = 'far fa-comment-dots';
        $iconmap['core:t/more'] = 'fas fa-caret-down';
        $iconmap['core:t/move'] = 'fas fa-arrows-alt-v';
        $iconmap['core:t/online'] = 'fas fa-circle';
        $iconmap['core:t/passwordunmask-edit'] = 'fas fa-edit';
        $iconmap['core:t/passwordunmask-reveal'] = 'fas fa-eye';
        $iconmap['core:t/portfolioadd'] = 'far fa-plus-square';
        $iconmap['core:t/preferences'] = 'fas fa-cog';
        $iconmap['core:t/preview'] = 'fas fa-search-plus';
        $iconmap['core:t/print'] = 'fas fa-print';
        $iconmap['core:t/removecontact'] = 'fas fa-user-times';
        $iconmap['core:t/reset'] = 'fas fa-redo-alt';
        $iconmap['core:t/restore'] = 'fas fa-arrow-circle-up';
        $iconmap['core:t/right'] = 'fas fa-arrow-right';
        $iconmap['core:t/show'] = 'fas fa-eye-slash text-danger';
        $iconmap['core:t/sort_asc'] = 'fas fa-sort-amount-down';
        $iconmap['core:t/sort_desc'] = 'fas fa-sort-amount-up';
        $iconmap['core:t/sort'] = 'fas fa-sort';
        $iconmap['core:t/stop'] = 'fas fa-stop';
        $iconmap['core:t/switch_minus'] = 'far fa-minus-square';
        $iconmap['core:t/switch_plus'] = 'far fa-plus-square';
        $iconmap['core:t/switch_whole'] = 'far fa-square';
        $iconmap['core:t/tags'] = 'fas fa-tags';
        $iconmap['core:t/unblock'] = 'far fa-comment-alt';
        $iconmap['core:t/unlocked'] = 'fas fa-lock-open';
        $iconmap['core:t/unlock'] = 'fas fa-lock';
        $iconmap['core:t/up'] = 'fas fa-arrow-up';
        $iconmap['core:t/user'] = 'fas fa-user';
        $iconmap['core:t/viewdetails'] = 'fas fa-list';
        $iconmap['core:t/collapsedcaret'] = 'fas fa-caret-down';
        $iconmap['core:t/downlong'] = 'fas fa-long-arrow-alt-down';
        $iconmap['core:t/uplong'] = 'fas fa-long-arrow-alt-up';
        $iconmap['core:t/export'] = 'fas fa-download';
        $iconmap['core:t/emptystar'] = 'far fa-star';
        $iconmap['core:t/sort_by'] = 'fas fa-sort-amount-up-alt';
        $iconmap['core:t/email'] = 'far fa-paper-plane';
        $iconmap['atto_collapse:icon'] = 'fas fa-bars';
        $iconmap['atto_h5p:icon'] = 'fas fa-laptop-code';
        $iconmap['atto_recordrtc:i/videortc'] = 'far fa-file-video';
        $iconmap['atto_recordrtc:i/audiortc'] = 'fas fa-microphone';
        $iconmap['enrol_guest:withpassword'] = 'fas fa-key';
        $iconmap['enrol_guest:withoutpassword'] = 'fas fa-unlock-alt';
        $iconmap['enrol_self:withoutkey'] = 'fas fa-sign-in-alt';
        $iconmap['enrol_self:withkey'] = 'fas fa-key';
        $iconmap['mod_lesson:e/copy'] = 'fas fa-clone';
        $iconmap['mod_forum:i/pinned'] = 'fas fa-thumbtack';
        $iconmap['mod_forum:t/selected'] = 'fas fa-check';
        $iconmap['mod_forum:t/subscribed'] = 'fas fa-envelope-open-text';
        $iconmap['mod_forum:t/unsubscribed'] = 'fas fa-envelope';
        $iconmap['mod_book:chapter'] = 'fas fa-bookmark';
        $iconmap['mod_book:nav_prev'] = 'fas fa-arrow-left';
        $iconmap['mod_book:nav_prev_dis'] = 'fas fa-arow-left';
        $iconmap['mod_book:nav_sep'] = 'fas fa-minus';
        $iconmap['mod_book:add'] = 'far fa-plus-square';
        $iconmap['mod_book:nav_next'] = 'fas fa-arrow-right';
        $iconmap['mod_book:nav_next_dis'] = 'fas fa-arrow-right';
        $iconmap['mod_book:nav_exit'] = 'fas fa-times';
        $iconmap['mod_data:field/checkbox'] = 'far fa-check-square';
        $iconmap['mod_data:field/date'] = 'fas fa-table';
        $iconmap['mod_data:field/file'] = 'far fa-file';
        $iconmap['mod_data:field/latlong'] = 'fas fa-globe-africa';
        $iconmap['mod_data:field/menu'] = 'fas fa-bars';
        $iconmap['mod_data:field/multimenu'] = 'fas fa-grip-vertical';
        $iconmap['mod_data:field/number'] = 'fas fa-calculator';
        $iconmap['mod_data:field/picture'] = 'far fa-image';
        $iconmap['mod_data:field/radiobutton'] = 'far fa-check-circle';
        $iconmap['mod_data:field/text'] = 'fas fa-font';
        $iconmap['mod_data:field/textarea'] = 'fas fa-pen-fancy';
        $iconmap['mod_data:field/url'] = 'fas fa-link';
        $iconmap['mod_scorm:failed'] = 'far fa-times-circle text-danger';
        $iconmap['mod_scorm:suspend'] = 'fas fa-pause fa-fw ';
        $iconmap['mod_scorm:completed'] = 'fas fa-check-circle green';
        $iconmap['mod_scorm:passed'] = 'fas fa-check-circle green';
        $iconmap['mod_scorm:incomplete'] = 'fas fa-spinner text-danger';
        $iconmap['mod_scorm:notattempted'] = 'far fa-circle';
        $iconmap['mod_feedback:required'] = 'fas fa-exclamation-circle';
        $iconmap['mod_forum:t/star'] = 'fas fa-star';
        $iconmap['tool_usertours:t/export'] = 'fas fa-download';
        $iconmap['tool_recyclebin:trash'] = 'fas fa-trash';
        $iconmap['theme:fp/add_file'] = 'far fa-file';
        $iconmap['theme:fp/alias'] = 'fas fa-share';
        $iconmap['theme:fp/alias_sm'] = 'fas fa-share';
        $iconmap['theme:fp/check'] = 'fas fa-check';
        $iconmap['theme:fp/create_folder'] = 'fas fa-folder-plus';
        $iconmap['theme:fp/cross'] = 'fas fa-remove';
        $iconmap['theme:fp/download_all'] = 'fas fa-download';
        $iconmap['theme:fp/help'] = 'far fa-question-circle';
        $iconmap['theme:fp/link'] = 'fas fa-link';
        $iconmap['theme:fp/link_sm'] = 'fas fa-link';
        $iconmap['theme:fp/logout'] = 'fas fa-sign-out-alt';
        $iconmap['theme:fp/path_folder'] = 'fas fa-folder';
        $iconmap['theme:fp/path_folder_rtl'] = 'fas fa-folder';
        $iconmap['theme:fp/refresh'] = 'fas fa-redo-alt';
        $iconmap['theme:fp/search'] = 'fas fa-search';
        $iconmap['theme:fp/setting'] = 'fas fa-cog';
        $iconmap['theme:fp/view_icon_active'] = 'fas fa-th';
        $iconmap['theme:fp/view_list_active'] = 'fas fa-list';
        $iconmap['theme:fp/view_tree_active'] = 'fas fa-folder';
        $iconmap['local_mail:icon'] = 'far fa-envelope';
        $iconmap['local_mail:inbox'] = 'fas fa-inbox';
        $iconmap['local_mail:starred'] = 'fas fa-star';
        $iconmap['local_mail:sent'] = 'far fa-paper-plane';
        $iconmap['local_mail:trash'] = 'far fa-trash-alt';
        $iconmap['local_mail:course'] = 'fas fa-graduation-cap';
        $iconmap['local_mail:drafts'] = 'far fa-copy';
        $iconmap['local_boostnavigation:activities'] = 'fas fa-poll-h';
        $iconmap['local_boostnavigation:customnodexs'] = 'fas fa-angle-right';
        $iconmap['local_boostnavigation:customnodexxs'] = 'fas fa-angle-right';
        $iconmap['local_boostnavigation:resources'] = 'fas fa-archive';
        $iconmap['core:i/navigationitem'] = 'fas fa-folder';
        $iconmap['local_pages:newspaper'] = 'fas fa-file-alt';
        $iconmap['local_downloadcenter:icon'] = 'fas fa-download';
        $iconmap['core:i/breadcrumbdivider'] = 'fas fa-caret-right';
        $iconmap['core:i/gradingnotifications'] = 'fas fa-bell';
        $iconmap['core:i/grading'] = 'fas fa-marker';
        $iconmap['gradingform_rubric:icon'] = 'fas fa-table';
        $iconmap['gradingform_guide:icon'] = 'fas fa-table';
        $iconmap['tool_oauth2:auth'] = 'fas fa-sign-out-alt';
        $iconmap['tool_oauth2:yes'] = 'fas fa-check text-success';
        $iconmap['tool_oauth2:no'] = 'fas fa-times text-danger';
        $iconmap['core:i/risk_config'] = 'fas fa-user-cog';
        $iconmap['core:i/risk_spam'] = 'fas fa-mail-bulk';
        $iconmap['core:i/risk_personal'] = 'fas fa-user-shield';
        $iconmap['core:i/risk_xss'] = 'fas fa-exclamation-triangle text-danger';
        $iconmap['core:i/risk_dataloss'] = 'fas fa-exclamation-triangle text-danger';



        return $iconmap;
    }
}
