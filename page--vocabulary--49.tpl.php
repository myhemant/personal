<?php   
	//add js file page.tpl.js for js code
	drupal_add_js(path_to_theme('theme','nyrr') . '/js/page.tpl.js',array('type' => 'file',  'scope' => 'footer', 'group' => JS_THEME,  'cache' => TRUE, 'preprocess' => TRUE,'weight'=>21 )); 	
?>
<div class="outerdiv">
<?php
	/* This header file contains the menu and included here. */
		require_once(path_to_theme('theme','nyrr') . '/header.tpl.php'); 
?>
  <!-- Content Start -->
  	   
  <div id="content">
	 <?php
	/* If the Page URL coming for print (need to print the content) then remove the blue background from this content, bcoz no need to print this blue background of page. Use another div that contains class content-without-bg.*/
	$url_arr = explode("/",$_SERVER["REQUEST_URI"]); 
	if(end($url_arr) != 'print') { 
	?>as da da
	as das da
    <div class="contentbg">
	
	<?php 
	/* End of condition of removing blue background from page, when printing the content of page. */
	} else {
		echo '<div class="content-without-bg">';as as dasd asdsa 
	}
	?>
		 <?php 
	/* If the Page URL coming for print (need to print the content) then remove the breadcrumb from this content, bcoz no need to print the breadcrumb of page. */
	if(end($url_arr) != 'print') { 
	?>
		<!--Breadcrum Starts here-->
		 	<div class="pageheading <?php print $breadcrumbclass;?>">
				<?php print $breadcrumb; ?>
			</div>a sda
	  <!--Breadcrum Ends here-->
	 <?php 
	/* End of condition of removing breadcrumb from page, when printing the content of page. */
	}
	?> 
	   <div class="left">        
            <div class="inner">
                <div class="innerbody">
					<?php print $messages; ?>
                    <?php if ($tabs): ?><?php print render($tabs); ?><?php endif; ?>
					<?php print render($tabs2); ?>
					<!-- set the title for race recap -->
					<?php if($top_title !=''){ ?>
						<h2 class="title"><?php print $top_title; ?></h2>
					<?php } ?>
					<!-- End of set tile of race recap -->
					<?php if(arg(2) == 'race-story' || arg(3) == 'race-story' || arg(2) == 'tags'){ // show top title on the race recap page?>
								<h2 class="title"><?php print $title; ?></h2>
					<?php } ?>
					
                    <?php if($page['content_top']):?>
                        <?php print render($page['content_top']);?>
                    <?php endif;?>	
                    <?php if($page['content_body_top']):?>
                        <div class="imagebox">
                            <?php print render($page['content_body_top']);?>
                        </div>
						<div class="h-space">&nbsp;</div>
                     <?php endif;?>
                     <?php if($page['top_slider']):?>
						<div class="nyrr-top-block">
                         <?php print render($page['top_slider']);?>
						</div> 
                         <div class="h-space">&nbsp;</div>
                      <?php endif;?>  
					  <?php if($page['content_top2']) :?>
						   <?php print render($page['content_top2']);?>
							<div class="h-space">&nbsp;</div>
                      <?php endif;?> 
                        <div class="datacontainer">
                        <div id="nyrr_print" class="leftdata">
						<?php if(arg(3) != 'race-story' && arg(2) != 'tags'){ // hide below title on race recap page ?>
							<h2 class="graylarge"><span><?php print $title; ?></span></h2>
						<?php  } ?>			
							<div class="rs-detail">
								<div id="rs_summary">
									<?php
										$description = isset($page["content"]["system_main"]["term_heading"]['term']['field_description']['#object']->description) ? $page["content"]["system_main"]["term_heading"]['term']['field_description']['#object']->description : '';
										$summary = isset($page["content"]["system_main"]["term_heading"]['term']['field_description']['#object']->field_description['und'][0]["value"]) ? $page["content"]["system_main"]["term_heading"]['term']['field_description']['#object']->field_description['und'][0]["value"] : '';
										unset($page["content"]["system_main"]["term_heading"]['term']['field_description']);
										unset($page["content"]["system_main"]["term_heading"]['term']['description']);
										if($summary != ''):
											print $summary;
										endif;	
										
										if($description != ''):	
											print '<div class="expand">
											<span class="fleft"><a href="javascript:void(0);" onclick="toggle_rs_body_summary(\'summary\');">Read More</a></span><span class="fright"><a class="arrowicon" href="javascript:void(0);"  onclick="toggle_rs_body_summary(\'summary\');"></a></span></div>';
										endif;	
									?>
								</div>
									
								<div id="rs_body" class="none">
									<?php
										if($description != ''):
											print $description.'<div class="collaspe"><a href="javascript:void(0);" onclick="toggle_rs_body_summary(\'body\');">Close</a><a class="crossicon" href="javascript:void(0);"  onclick="toggle_rs_body_summary(\'body\');"></a></div>';
										endif;
									?>
								</div>
							</div>
							<?php print render($page['content']);?>
						 <?php if ($page['content_body_bottom']): ?>
							<div class="cbottom">
								<?php print render($page['content_body_bottom']);?>
							</div>	
						   <?php endif;?>	
                        </div>
                        <?php if($page['content_body_right']):?>
                            <div class="rightdata">	
								<?php print render($page['content_body_right']); ?>
                            </div>
                        <?php endif;?>
						<!-- Following div only used for causes and community section in club standing page to display csv populated data outside the existing available regions.  -->
						<div id="json_club_standing"></div>
                    </div>
                </div>
            </div>
<?php 
	/* If the Page URL coming for print (need to print the content) then remove bottom block, right block and footer from this content, bcoz no need to print this information. */
	if(end($url_arr) != 'print') { ?>			
        <?php if ($page['content_bottom']): ?>
		<div class="databox">
          <div class="top">&nbsp;</div>
          <div class="middle">
            <div class="datacontainer">
 <div class="advertisement">	    
			<?php print render($page['content_bottom']);?></div>
			</div>
          </div>
          <div class="bottom">&nbsp;</div>
        </div>
		<?php endif;?>
      </div> 
			
	  <div class="right"> 
	  <!-- Commented show the right section -->
	  <?php print render($page['right']);?>
	  </div>
	 </div>
  </div>
  <!-- Content End -->
  
  <!-- Footer Start -->
   <?php
	/* This footer file contains the footer and included here. */
	require_once(path_to_theme('theme','nyrr') . '/footer.tpl.php'); 
	
  /* End of condition of removing content bottom block, right block and footer from page, when printing the content of page. */	
  } 
?>
  <!-- Footer End -->
</div>