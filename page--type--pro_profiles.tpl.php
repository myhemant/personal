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
	?>
    <div class="contentbg">
	
	<?php 
	/* End of condition of removing blue background from page, when printing the content of page. */
	} else {
		echo '<div class="content-without-bg">';
	}
	?>
		 <?php 
	/* If the Page URL coming for print (need to print the content) then remove the breadcrumb from this content, bcoz no need to print the breadcrumb of page. */
	if(end($url_arr) != 'print') { 
	?>
		<!--Breadcrum Starts here-->
		 	<div class="pageheading <?php print $breadcrumbclass;?>">
				<?php print $breadcrumb; ?>
			</div>
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
					<?php if(arg(2) == 'race-story'){ // show top title on the race recap page?>
								<h2 class="title"><?php print $title; ?></h2>
					<?php } ?>
				
					<div id="zone_one">				
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
					</div>
					 <div class="datacontainer">
                       	<div class="media-room-block">
							<div id="nyrr_print">
								<div id="article_search_container">
									<h2 class="<?php if(isset($title_class)) echo $title_class; ?>"><span><?php print $title; ?></span></h2>
									<h2 id="total_record" class="articles"></h2>	
									<div id="zone_two">	
									<!-- START CADING FOR CONTENT AREA -->
										<div class="individual-block">
											<div class="individual-left">
												<?php
												/* Social buttons block. */
													$block = block_load('block', '96');
													$block_output = _block_get_renderable_array(_block_render_blocks(array($block)));
													echo render($block_output); 
													$body = isset($node->body['und'][0]['value']) ? $node->body['und'][0]['value'] : '';
													
													echo $body;	
												$dob = isset($node->field_news_date['und'][0]['value'])? $node->field_news_date['und'][0]['value'] : '';
												$age = isset($node->field_age['und'][0]['value'])? $node->field_age['und'][0]['value'] : '';
												$gender = isset($node->field_gender['und'][0]['value'])? $node->field_gender['und'][0]['value'] : '';
												$country = isset($node->field_country['und'][0]['country_name'])? $node->field_country['und'][0]['country_name'] : '';
												$residence = isset($node->field_res_country['und'][0]['city'])? $node->field_res_country['und'][0]['city'] : '';
												$residence_country = isset($node->field_res_country['und'][0]['country_name'])? $node->field_res_country['und'][0]['country_name'] : '';
												if($residence_country !=''):
													$residence = $residence_country.', '.$residence;
												endif;	
												?>
											</div>	
											<!-- //Right Content -->
											<div class="individual-right">
												<div class="player-info">
													<span class="normal15">PERSONAL STATS</span>
														<div class="info-div">
															<span class="fieldname">Date of Birth: </span>
															<span class="fieldvalue"><?php echo date('F d, Y', $dob);?></span>
														</div>
														<div class="info-div">
															<span class="fieldname">Age: </span>
															<span class="fieldvalue"><?php echo $age;?></span>
														</div>
														<div class="info-div">
															<span class="fieldname">Gender: </span>
															<span class="fieldvalue"><?php echo $gender;?></span>
														</div>
														<div class="info-div">
															<span class="fieldname">Country: </span>
															<span class="fieldvalue"><?php echo $country;?></span>
														</div>
														<div class="info-div">
															<span class="fieldname">Residence: </span>
															<span class="fieldvalue"><?php echo $residence;?></span>
														</div>	
												</div>
												<?php 
													$goldWon = isset($node->field_gold_won['und'][0]['value'])? $node->field_gold_won['und'][0]['value'] : '';
													$silverWon = isset($node->field_silver_won['und'][0]['value'])? $node->field_silver_won['und'][0]['value'] : '';
													$bronzeWon = isset($node->field_bronze_won['und'][0]['value'])? $node->field_bronze_won['und'][0]['value'] : '';
													
													if($goldWon || $silverWon || $bronzeWon):
												?>
													<div class="player-info"><span class="normal15">INTERNATIONAL MEDALS</span>
														<?php if($goldWon):?>
															<span class="normal15"><span class="gold medal"><?php echo $goldWon;?></span>
															<span class="property">GOLD</span></span>
															<?php
																if(count($node->field_gold_tournament['und']) > 0): ?>
																	<ul class="medals">
																		<?php
																		foreach($node->field_gold_tournament['und'] as $gold):
																			echo '<li>'.$gold['value'].'</li>';
																		endforeach
																		?>
																	</ul>
																<?php	endif;
															endif;	
															// END OF GOLD 
														 if($silverWon):?>
															<span class="normal15"><span class="silver medal"><?php echo $silverWon?></span>
															<span class="property">SILVER</span></span>
															<?php
																if(count($node->field_silver_tournament['und']) > 0): ?>
																	<ul class="medals">
																		<?php
																		foreach($node->field_silver_tournament['und'] as $gold):
																			echo '<li>'.$gold['value'].'</li>';
																		endforeach
																		?>
																	</ul>
																<?php	endif;
															endif;		
															// END OF SILVER 
															if($bronzeWon):?>
															<span class="normal15"><span class="bronze medal"><?php echo $bronzeWon?></span>
															<span class="property">BRONZE</span></span>
															<?php
																if(count($node->field_bronze_tournament['und']) > 0): ?>
																	<ul class="medals">
																		<?php
																		foreach($node->field_bronze_tournament['und'] as $gold):
																			echo '<li>'.$gold['value'].'</li>';
																		endforeach
																		?>
																	</ul>
																<?php	endif;
															endif;		
															// END OF BRONZE 
														?>							
													</div>
												<?php endif; ?>
												
											</div>
											
										</div>	
										<!-- START SHOW ARTICLE BLOCK -->
										<?php 
											$blog_article = _get_proprofile_recent_blog_article($node->nid);
											$article = _get_proprofile_recent_article($node->nid);
											$press_release = _get_proprofile_recent_press_release($node->nid);
											$blog_node_status=0;
											if(!empty($blog_article['nid']) ):
												 $blog_node_status = check_term_status($blog_article['nid']);
											endif;
											if($blog_node_status == 1 || isset($article['nid'])  || isset($press_release['nid'])): ?>
												<div class="recap"><span>ARTICLES</span></div>
											<?php endif; ?>
												<div class="media-articles">
													<?php if($blog_node_status == 1):
															if(isset($blog_article['data'])):
															echo $blog_article['data'];
															endif;
														endif;
													if(isset($article['nid'])):
														if(isset($article['data'])):
														 echo $article['data'];
														endif;
													endif;
													if(isset($press_release['nid'])):
														if(isset($press_release['data'])):
														echo $press_release['data'];
														endif;
													endif;?>													
												</div>
											<?php if($blog_node_status == 1 || isset($article['nid']) || isset($press_release['nid'])): ?>
													<p><a href="javascript:void(0);" onclick="more_article_search_allresults(0)">More Articles</a></p>
											 <?php endif;?>
											 <!-- START SHOW RESULT HISTORY -->
											 <?php 
												if(isset($node->field_pros_recent_results['und'][0]['tabledata'])):
													$tabledata = $node->field_pros_recent_results['und'][0]['tabledata'];
													$rows = array();
													if(count($tabledata)>0):
														$i=1; 
														foreach($tabledata as $key=>$allrecords):
															$class= $i%2==0 ? 'alter': 'details';
															if($i==1):
																foreach($allrecords as $allrows):																
																	$header[] = array('data' => $allrows);
																	endforeach;
															else:																
																if($allrecords[0] !='' && $allrecords[1] =='' && $allrecords[2] =='' && $allrecords[3] ==''):
																	$rows[]= array('data' =>$allrecords,'class'=>array($class,'year'));
																elseif($allrecords[0] !='' || $allrecords[1] !='' ||$allrecords[2] !='' ||$allrecords[3] !=''):
																	$rows[]= array('data' =>$allrecords,'class'=>array($class));
																 endif;															
															endif;		 
														$i++;	
													endforeach;
													?>
													<div class="recap"><span>Notable Results</span></div>
													<div class="recent-results">
													<?php echo theme('table', array('header' => $header, 'rows' => $rows)); ?>
													</div>
												<?php	
												endif;										 
											 endif;	
											 ?>
										<!-- END OF SHOW RESULT HISTORY -->
										<!-- START SHOW RACE HISTORY -->
										<?php
											if(isset($node->field_pros_race_history['und'][0]['tabledata'])):
													$historydata = $node->field_pros_race_history['und'][0]['tabledata'];
													$rowsh = array();
													if(count($historydata)>0):
														$i=1;
														foreach($historydata as $key=>$allrecordsh):
															$class= $i%2==0 ? 'alter': 'details';
															if($i==1):
																foreach($allrecordsh as $allrowsh):																
																	$headerh[] = array('data' => $allrowsh,'class'=>'top');
																endforeach;
															else:	
																if($allrecordsh[0] !='' || $allrecordsh[1] !='' ||$allrecordsh[2] !='' ||$allrecordsh[3] !=''):
																 $rowsh[]= array('data' =>$allrecordsh,'class'=>array($class));
																 endif;															
															endif;		 
														$i++;	
													endforeach;
												
													?>
													<div class="recap"><span>NYRR RACE HISTORY</span></div>
													<div class="recent-results">
													<?php echo theme('table', array('header' => $headerh, 'rows' => $rowsh)); ?>
													</div>
												<?php	
												endif;										 
											 endif;											
											?>
										<!-- END OF SHOW RACE HISTORY -->
									<!-- END OF CONTENT AREA -->
											<?php print render($page['content']);?>
											<div id="ajax-results"></div>
									</div><!-- END OF ZONE TWO	 -->
									<div id="zone_three">	
									
									<?php if($page['media_content_bottom']):?>
									 <?php print render($page['media_content_bottom']);?>
									  <div id="more-ajax-results"></div>
									<?php endif;?>  
									</div><!-- END OF ZONE THREE -->
								</div>	
							</div>	
							<?php if($page['media_menu'] || $page['content_body_right']):?>
                            <div class="rightdata media-room-info" id="right-data-article" style="display:none;">
                                <?php print render($page['media_menu']);?>
                                <?php print render($page['content_body_right']); ?>
                            </div>
                        <?php endif;?>
						</div>
						
						
					</div> 
                </div>
            </div>
<?php 
	/* If the Page URL coming for print (need to print the content) then remove bottom block, right block and footer from this content, bcoz no need to print this information. */
	if(end($url_arr) != 'print') { ?>			
        </div> 
			
	  <div class="right"> 
	   <div class="infobox">
        <div class="top">&nbsp;</div>
        <div class="middle">
          <div class="middledata">
			<div class="mediadata">
			<!-- Commented show the right section -->
			<?php print render($page['media_right']);?>
			</div>
		  </div>
        </div>
		<div class="bottom">&nbsp;</div>
       </div>		
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