<?php
require_once "../../config.php";
require_once $CFG->dirroot."/pdo.php";
require_once $CFG->dirroot."/lib/lms_lib.php";

use \Tsugi\Core\Settings;
use \Tsugi\Core\LTIX;
use \Tsugi\UI\SettingsForm;

$LTI = LTIX::requireData();
$p = $CFG->dbprefix;

if ( SettingsForm::handleSettingsPost() ) {
    header( 'Location: '.addSession('index.php') ) ;
    return;
}

// All the assignments we support
$assignments = array(
    'single_mysql.php' => 'Single Table MySQL (Users)',
    'single_lite.php' => 'Single Table SQLITE (Users)',
    'count_lite.php' => 'Email Counter SQLITE',
    'many_one_lite.php' => 'Many-to-One SQLITE (Tracks)',
    'many_many_mysql.php' => 'Many-to-Many MySQL (Courses)',
    'many_many_lite.php' => 'Many-to-Many SQLITE (Courses)',
);

$oldsettings = Settings::linkGetAll();

$assn = Settings::linkGet('exercise');

// Get any due date information
$dueDate = SettingsForm::getDueDate();

// Let the assignment handle the POST
if ( count($_POST) > 0 && $assn && isset($assignments[$assn]) ) {
    include($assn);
    return;
}

// View
$OUTPUT->header();
$OUTPUT->bodyStart();

// Settings button and dialog

echo('<span style="position: fixed; right: 10px; top: 5px;">');
if ( $USER->instructor ) {
    echo('<a href="grades.php" target="_blank"><button class="btn btn-info">Grade detail</button></a> '."\n");
}
SettingsForm::button();
$OUTPUT->exitButton();
echo('</span>');

SettingsForm::start();
SettingsForm::select("exercise", __('Please select an assignment'),$assignments);
SettingsForm::dueDate();
SettingsForm::done();
SettingsForm::end();

$OUTPUT->flashMessages();

$OUTPUT->welcomeUserCourse();

if ( $assn && isset($assignments[$assn]) ) {
    include($assn);
} else {
    if ( $USER->instructor ) {
        echo("<p>Please use settings to select an assignment for this tool.</p>\n");
    } else {
        echo("<p>This tool needs to be configured - please see your instructor.</p>\n");
    }
}
        

$OUTPUT->footer();

