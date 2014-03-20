<?php
require_once "../../config.php";
require_once $CFG->dirroot."/lib/lms_lib.php";
session_start();
headerContent();
startBody();
?>
<h1>AutoGrader for Python for Informatics</h1>
<p>
Welcome to my *very early* protype auto-grader for Python using the 
<a href="http://www.skulpt.org" target="_new">Skulpt</a> in-browser
Python execution environment from <a href="https://twitter.com/bnmnetp" target="_new">
Brad Miller</a>
for my 
<a href="http://www.py4inf.com/" target="_new">Python for Informatics</a> book.
</p>
<p>
I am preparing this as an experimental MOOC for my SI301 course in January.  
Send comments to Dr. Chuck.
</p>
<ul class="nav nav-pills nav-stacked">
<li><a href="<?php echo('auto.php?exercise=hello&done=index.php'); ?>" target="blank">Hello World</a></li>
<li><a href="<?php echo('auto.php?exercise=2.2&done=index.php'); ?>" target="blank">Exercise 2.2</a></li>
<li><a href="<?php echo('auto.php?exercise=2.3&done=index.php'); ?>" target="blank">Exercise 2.3</a></li>
<li><a href="<?php echo('auto.php?exercise=3.1&done=index.php'); ?>" target="blank">Exercise 3.1</a></li>
<li><a href="<?php echo('auto.php?exercise=3.3&done=index.php'); ?>" target="blank">Exercise 3.3</a></li>
<li><a href="<?php echo('auto.php?exercise=loop&done=index.php'); ?>" target="blank">For loop</a></li>
<li><a href="<?php echo('auto.php?done=index.php'); ?>" target="blank">Counting the lines in a file</a></li>
</ul>
<p>
If the auto.php script is launched using 
<a href="http://developers.imsglobal.org" target="_new">IMS Learning Tools Interoperability</a>
it will send grades back to an LMS when the student completes the task if the LMS
is willing to take back the grades.
</p>
<p>
Unlike 
<a href="http://www.codeskulptor.org/" target="_new">CodeSkulptor</a> from 
Rice University used in their excellent 
<a href="https://www.coursera.org/course/interactivepython" target="_new">Python course</a> 
on Coursera, my goal here is for auto-grading - not to be the environment 
that folks will use to write their code.  I want them to write code on 
their 
<a href="http://www.pythonlearn.com/install.php" target="_new">computers</a>
and turn in their assignments for grading here.
</p>
<?
footerContent();
