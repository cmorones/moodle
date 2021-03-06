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

// Get the HTML for the settings bits.
$html = theme_clean_get_html_for_settings($OUTPUT, $PAGE);

echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes(); ?>>
<head>
    <title><?php echo $OUTPUT->page_title(); ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->favicon(); ?>" />
    <?php echo $OUTPUT->standard_head_html() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body <?php echo $OUTPUT->body_attributes(); ?>>

<?php echo $OUTPUT->standard_top_of_body_html() ?>

<header role="banner" class="navbar navbar-fixed-top<?php echo $html->navbarclass ?>">
    <nav role="navigation" class="navbar-inner">
        <div class="container-fluid">
            <!--<a class="brand" href="<?php echo $CFG->wwwroot;?>"><?php echo $SITE->shortname; ?></a>-->
            <div id="imgheader" style="float:left;">
            	<img src="http://seminario.apoyoalajuventud.org/img/bannerHeader.png" class="img-responsive"/>
            </div>
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div id="imgbannerheader" style="float:right;">
            	<img src="http://seminario.apoyoalajuventud.org/img/bannerHeaderRgh.png" class="img-responsive"/>
            </div>
        </div>
    </nav>
</header>

<div id="page" class="container-fluid">
<div class="nav-collapse collapse" style="float: right;">
                           
                    <ul class="nav pull-right">
                        <li><?php echo $OUTPUT->page_heading_menu(); ?></li>
                        <li class="navbar-text"><?php echo $OUTPUT->login_info() ?></li>
                        <li><?php echo $OUTPUT->custom_menu(); ?></li>
                    </ul>
               		
            </div>
    <header id="page-header" class="clearfix">
        <div id="page-navbar" class="clearfix">
            <nav class="breadcrumb-nav"><?php echo $OUTPUT->navbar(); ?></nav>
            <div class="breadcrumb-button"><?php echo $OUTPUT->page_heading_button(); ?></div>
        </div>
        <?php echo $html->heading; ?>
        <div id="course-header">
            <?php echo $OUTPUT->course_header(); ?>
        </div>
    </header>

    <div id="page-content" class="row-fluid">
        <section id="region-main" class="span12">
            <?php
            echo $OUTPUT->course_content_header();
            echo $OUTPUT->main_content();
            echo $OUTPUT->course_content_footer();
            ?>
        </section>
    </div>

    <footer id="page-footer">
        <div id="course-footer"><?php echo $OUTPUT->course_footer(); ?></div>
        <!--<p class="helplink"><?php echo $OUTPUT->page_doc_link(); ?></p>-->
        <p class="helplink text-center">
        Síguenos en facebook <a href="https://www.facebook.com/FAJ.IAP/"><img src="http://seminario.apoyoalajuventud.org/img/facebookLogo.jpg" width="40" height="40"/></a>
        </p>
        
        
        <div class="row-fluid">
			<div class="span4"><img src="http://seminario.apoyoalajuventud.org/img/logosedesol.jpg" /></div>
  			<div class="span4"><img src="http://seminario.apoyoalajuventud.org/img/logoimjuve.jpg" /></div>
            <div class="span4"><img src="http://seminario.apoyoalajuventud.org/img/logofaj.jpg" /></div>
		</div>
      
        
        <!--<?php
        echo $html->footnote;
        echo $OUTPUT->login_info();
        echo $OUTPUT->home_link();
        echo $OUTPUT->standard_footer_html();
        ?>-->
	</footer>

    <?php echo $OUTPUT->standard_end_of_body_html() ?>

</div>
</body>
</html>
