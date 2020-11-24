
<?php 
$dataf= get_option('bsp_style_settings_f') ;
$datati= get_option('bsp_style_settings_ti') ;
$datat= get_option('bsp_style_settings_t') ;
$datala= get_option('bsp_style_settings_la') ;
$dataform= get_option('bsp_style_settings_form') ;
$datafd=get_option('bsp_forum_display') ;
$datacss=get_option('bsp_css') ;
$data4 = get_option('bsp_roles') ;
$databutton = get_option('bsp_style_settings_buttons') ;
global $bsp_forum_display ;
global $bsp_roles ;
global $bsp_breadcrumb ;
global $bsp_style_settings_ti ;
global $bsp_style_settings_search ;
global $bsp_login_fail ;


?>


/*  1 ----------------------  forum list backgrounds --------------------------*/
	<?php 
		$field = (!empty($dataf['Forum ContentBackground color - odd numbers']) ? $dataf['Forum ContentBackground color - odd numbers'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums ul.odd
			{
				background-color: <?php echo $field ;?>  ;
			}
			<?php 
		}
		?>

	<?php 
		$field= (!empty($dataf['Forum ContentBackground image - odd numbers']) ? $dataf['Forum ContentBackground image - odd numbers'] : '')  ;
		if (!empty ($field)){
			if (substr( $field, 0, 1) === '/') $field = substr($field, 1);
	?>
				#bbpress-forums ul.odd
			{
				background-image: url("/<?php echo $field ?>") ;
			}
			<?php 
		} 
		?>
 

	<?php 
		$field= (!empty($dataf['Forum ContentBackground color - even numbers']) ? $dataf['Forum ContentBackground color - even numbers'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums ul.even
			{
				background-color: <?php echo $field ; ?>;
			}
		<?php
		} 
		?>

	<?php 
		$field= (!empty($dataf['Forum ContentBackground image - even numbers']) ? $dataf['Forum ContentBackground image - even numbers'] : '')  ;
		if (!empty ($field)){
			if (substr( $field, 0, 1) === '/') $field = substr($field, 1);
	?>
			#bbpress-forums ul.even
			{
				background-image: url("/<?php echo $field ?>") ;
			}
		<?php
		} 
		?>


 
/*  2 ----------------------  headers backgrounds --------------------------*/

	<?php 
		$field= (!empty($dataf['Forum/Topic Headers/FootersBackground Color']) ? $dataf['Forum/Topic Headers/FootersBackground Color'] : '')  ;
		if (!empty ($field)){
		?>
			#bbpress-forums li.bbp-header,
			#bbpress-forums li.bbp-footer 
			{
				background-color:  <?php echo $field ;?> ;
			}
		<?php
		}
		?>

	<?php 
		$field= (!empty($dataf['Forum/Topic Headers/FootersBackground Image']) ? $dataf['Forum/Topic Headers/FootersBackground Image'] : '')  ;
		if (!empty ($field)){
			if (substr( $field, 0, 1) === '/') $field = substr($field, 1);
	?>
			#bbpress-forums li.bbp-header,
			#bbpress-forums li.bbp-footer 
			{
				background-image: url("/<?php echo $field ?>") ;
			}
		<?php
		}
		?>
  
/*  3 ----------------------  Font - Forum headings --------------------------*/
 
	<?php 
		$field= (!empty($dataf['Forum Headings FontSize']) ? $dataf['Forum Headings FontSize'] : '')  ;
		if (!empty ($field)){
			if (is_numeric($field)) $field=$field.'px' ;
	?>
			#bbpress-forums ul.forum-titles li.bbp-forum-info
			{
				font-size:  <?php echo $field ; ?> ;
			}
		 
			#bbpress-forums ul.forum-titles li.bbp-forum-topic-count{
				font-size:  <?php echo $field ; ?> ;
			}

			#bbpress-forums ul.forum-titles li.bbp-forum-reply-count{
				font-size:  <?php echo $field ; ?> ;

			}

			#bbpress-forums ul.forum-titles li.bbp-forum-freshness{
				font-size:  <?php echo $field ; ?> ;
			}
		<?php 
		}
		?>
 
	<?php 
	$field= (!empty($dataf['Forum Headings FontColor']) ? $dataf['Forum Headings FontColor'] : '')  ;
	if (!empty ($field)){
	?>
		#bbpress-forums ul.forum-titles li.bbp-forum-info
		{
			color:  <?php echo $field ; ?> ;
		}
	 
		<?php //  and also allow for alternate template ?>
		#bbpress-forums ul.forum-titles a.bsp-forum-name
		{
			color:  <?php echo $field ; ?> ;
		}

		#bbpress-forums ul.forum-titles li.bbp-forum-topic-count
		{
			color:  <?php echo $field ; ?> ;
		}

	#bbpress-forums ul.forum-titles li.bbp-forum-reply-count
		{
		   color:  <?php echo $field ; ?> ;
		}

	#bbpress-forums ul.forum-titles li.bbp-forum-freshness 
		{
			color:  <?php echo $field ; ?> ;
		}

	<?php
	} 
	?>
 
	<?php 
		$field= (!empty($dataf['Forum Headings FontFont']) ? $dataf['Forum Headings FontFont'] : '')  ;
		if (!empty ($field)){
	?>
	 
			#bbpress-forums ul.forum-titles li.bbp-forum-info
			{
				Font-Family:  <?php echo $field ; ?> ;
			}
	 
			#bbpress-forums ul.forum-titles li.bbp-forum-topic-count
			{
				Font-Family:  <?php echo $field ; ?> ;
			}

			#bbpress-forums ul.forum-titles li.bbp-forum-reply-count
			{
				Font-Family:  <?php echo $field ; ?> ;
			}

			#bbpress-forums ul.forum-titles li.bbp-forum-freshness
			{
				Font-Family:  <?php echo $field ; ?> ;
			}
	  
		<?php
		} 
		?>
		
	<?php 
		$field= (!empty($dataf['Forum Headings FontStyle']) ? $dataf['Forum Headings FontStyle'] : '')  ;
		if (!empty ($field)){
			if (strpos($field,'Italic') !== false){
	?>

				#bbpress-forums ul.forum-titles li.bbp-forum-info
				{
					Font-Style:  italic ; 
				}
	 
				#bbpress-forums ul.forum-titles li.bbp-forum-topic-count 
				
					Font-Style:  italic ; 
				}

				#bbpress-forums ul.forum-titles li.bbp-forum-reply-count
				{
					Font-Style:  italic ; 
				}

				#bbpress-forums ul.forum-titles li.bbp-forum-freshness{
					Font-Style:  italic ; 
				}
		<?php
		} 

		if (strpos($field,'Bold') !== false){
		?>
			#bbpress-forums ul.forum-titles li.bbp-forum-info
			{
				Font-weight:  bold ; 
			}
	 
			#bbpress-forums ul.forum-titles li.bbp-forum-topic-count
			{
				Font-weight:  bold ; 
			}

			#bbpress-forums ul.forum-titles li.bbp-forum-reply-count
			{
				Font-weight:  bold ; 
			}

			#bbpress-forums ul.forum-titles li.bbp-forum-freshness 
			{
				Font-weight:  bold ; 
			}
	 
		<?php
		}
		else { ?>
			#bbpress-forums ul.forum-titles li.bbp-forum-info 
			{
				Font-weight:  normal ; 
			}
	 
			#bbpress-forums ul.forum-titles li.bbp-forum-topic-count
			{
				Font-weight:  normal ; 
			}

			#bbpress-forums ul.forum-titles li.bbp-forum-reply-count 
			{
				Font-weight:  normal ; 
			}

			#bbpress-forums ul.forum-titles li.bbp-forum-freshness 
			{
				Font-weight:  normal ; 
			}
	 
		<?php
		} // end of else
	 
	}
	?>

/*  4 ----------------------  Font - breadcrumb --------------------------*/
 
	<?php 
		$field= (!empty($dataf['Breadcrumb FontSize']) ? $dataf['Breadcrumb FontSize'] : '')  ;
		if (!empty ($field)){
			if (is_numeric($field)) $field=$field.'px' ;
	?>
			#bbpress-forums .bbp-breadcrumb p
			{
				font-size:  <?php echo $field ; ?> ;
			}
		<?php 
		}
		?>
 
	<?php 
		$field= (!empty($dataf['Breadcrumb FontColor']) ? $dataf['Breadcrumb FontColor'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums .bbp-breadcrumb p
			{
				color:  <?php echo $field ; ?> ;
			}
		<?php
		}
		?>
 
	 <?php 
		$field= (!empty($dataf['Breadcrumb FontFont']) ? $dataf['Breadcrumb FontFont'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums .bbp-breadcrumb p
			{
				Font-Family:  <?php echo $field ; ?> ;
			}
		<?php
		} 
		?>
 
	<?php 
		$field= (!empty($dataf['Breadcrumb FontStyle']) ? $dataf['Breadcrumb FontStyle'] : '')  ;
		if (!empty ($field)){
			if (strpos($field,'Italic') !== false){
	?>
			#bbpress-forums .bbp-breadcrumb p
			{
				Font-Style:  italic ; 
			}
		<?php 
		} 

		if (strpos($field,'Bold') !== false){
		?>
			#bbpress-forums .bbp-breadcrumb p
			{
				Font-weight:  bold ; 
			}
		<?php
		}
		else {?>
			#bbpress-forums .bbp-breadcrumb p
			{
				Font-weight:  normal ; 
			}
		<?php
		}
	}
	?>
 
/*  5 ----------------------  Font - links --------------------------*/
 
	<?php 
		$field= (!empty($dataf['LinksLink Color']) ? $dataf['LinksLink Color'] : '')  ;
		if (!empty ($field)){
		?>
			#bbpress-forums a:link
			{
				color:  <?php echo $field ; ?> ;
			}
		<?php
		} 
		?>
 
	<?php 
		$field= (!empty($dataf['LinksVisited Color']) ? $dataf['LinksVisited Color'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums a:visited
			{
				color:  <?php echo $field ; ?> ;
			}
		<?php
		} 
		?>
 
 
	<?php 
		$field= (!empty($dataf['LinksHover Color']) ? $dataf['LinksHover Color'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums a:hover
			{
				color:  <?php echo $field ; ?> ;
			}
		<?php 
		}
		?>

/*  6 ----------------------  Font - Forum and category lists --------------------------*/
 
	<?php 
		$field= (!empty($dataf['Forum and Category List FontSize']) ? $dataf['Forum and Category List FontSize'] : '')  ;
		if (!empty ($field)){
			if (is_numeric($field)) $field=$field.'px' ;
	?>
			#bbpress-forums .bbp-forum-title
			{
				font-size:  <?php echo $field ; ?> ;
			}
		<?php
		}
		?>
	
	<?php 
		$field= (!empty($dataf['Forum and Category List FontFont']) ? $dataf['Forum and Category List FontFont'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums .bbp-forum-title
			{
				Font-Family:  <?php echo $field ; ?> ;
			}
		<?php
		}
		?>
 
	<?php 
		$field= (!empty($dataf['Forum and Category List FontStyle']) ? $dataf['Forum and Category List FontStyle'] : '')  ;
		if (!empty ($field)){
			if (strpos($field,'Italic') !== false){
	?>
				#bbpress-forums .bbp-forum-title
				{
					Font-Style:  italic ; 
				}
			<?php
			} 

			if (strpos($field,'Bold') !== false){
		?>
				#bbpress-forums .bbp-forum-title
				{
					Font-weight:  bold ; 
				}
			<?php
			}
			else {?>
				#bbpress-forums .bbp-forum-title
				{
					Font-weight:  normal ; 
				}
			<?php
			}
		}
		?>

/*  7 ----------------------  Font - Sub Forum lists --------------------------*/
/*   important added as bbpress 2.6 loads the min. css file, so doesn't allow the change in this plugin */
 
	<?php 
		$field= (!empty($dataf['Sub Forum List FontSize']) ? $dataf['Sub Forum List FontSize'] : '')  ;
		if (!empty ($field)){
			if (is_numeric($field)) $field=$field.'px' ;
	?>
			#bbpress-forums .bbp-forums-list li
			{
				font-size:  <?php echo $field ; ?> !important ;
			}
		<?php
		} 
		?>
 
	<?php 
		$field= (!empty($dataf['Sub Forum List FontFont']) ? $dataf['Sub Forum List FontFont'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums .bbp-forums-list li
			{
				Font-Family:  <?php echo $field ; ?> ;
			}
		<?php
		}
		?>
 
	<?php 
		$field= (!empty($dataf['Sub Forum List FontStyle']) ? $dataf['Sub Forum List FontStyle'] : '')  ;
		if (!empty ($field)){
			if (strpos($field,'Italic') !== false){	
	?>
				#bbpress-forums .bbp-forums-list li
				{
					Font-Style:  italic ; 
				}
		<?php
			} 

			if (strpos($field,'Bold') !== false){
		?>
				#bbpress-forums .bbp-forums-list li
				{
					Font-weight:  bold ; 
				}
			<?php 
			}
			else {?>
				#bbpress-forums .bbp-forums-list li
				{
					Font-weight:  normal ; 
				}
		<?php
			}
		}
		?>
 
/*  8 ----------------------  Font - forum description --------------------------*/
 
/*Note we also set bsp-forum-content as if add descriptions are set in forum display, then we need to replicate these settings */ 
  
	<?php 
		$field= (!empty($dataf['Forum Description FontSize']) ? $dataf['Forum Description FontSize'] : '')  ;
		if (!empty ($field)){
			if (is_numeric($field)) $field=$field.'px' ;
	?>
			#bbpress-forums .bbp-forum-content, 
			#bbpress-forums .bsp-forum-content,
			#bbpress-forums .bbp-forum-info .bbp-forum-content
			{
				font-size:  <?php echo $field ; ?> ;
			}
		<?php
		} 
		?>
 
	<?php 
		$field= (!empty($dataf['Forum Description FontColor']) ? $dataf['Forum Description FontColor'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums .bbp-forum-content,
			#bbpress-forums .bsp-forum-content,
			#bbpress-forums .bbp-forum-info .bbp-forum-content
			{
				color:  <?php echo $field ; ?> ;
			}
		<?php
		} 
		?>
 
	<?php 
		$field= (!empty($dataf['Forum Description FontFont']) ? $dataf['Forum Description FontFont'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums .bbp-forum-content,
			#bbpress-forums .bsp-forum-content,
			#bbpress-forums .bbp-forum-info .bbp-forum-content
			{
				Font-Family:  <?php echo $field ; ?> ;
			}
		<?php
		} 
		?>
 
	<?php 
		$field= (!empty($dataf['Forum Description FontStyle']) ? $dataf['Forum Description FontStyle'] : '')  ;
		if (!empty ($field)){
			if (strpos($field,'Italic') !== false){
	?>
				#bbpress-forums .bbp-forum-content,
				#bbpress-forums .bsp-forum-content,
				{
					Font-Style:  italic ; 
				}
			<?php
			} 

			if (strpos($field,'Bold') !== false){
			?>
				#bbpress-forums .bbp-forum-content,
				#bbpress-forums .bsp-forum-content,
				#bbpress-forums .bbp-forum-info .bbp-forum-content
				{
					Font-weight:  bold ; 
				}
			<?php
			}
			else {?>
				 #bbpress-forums .bbp-forum-content,
				 #bbpress-forums .bsp-forum-content,
				 #bbpress-forums .bbp-forum-info .bbp-forum-content
				{
					Font-weight:  normal ; 
				}
		<?php
			}
		}
		?>
		 

/*  9 ----------------------  Font - Freshness --------------------------*/
 
	<?php 
		$field= (!empty($dataf['Freshness FontSize']) ? $dataf['Freshness FontSize'] : '')  ;
		if (!empty ($field)){
			if (is_numeric($field)) $field=$field.'px' ;
	?>
			#bbpress-forums .bbp-forum-freshness, 
			#bbpress-forums .bbp-topic-freshness
			{
				font-size:  <?php echo $field ; ?> ;
			}
		<?php
		} 
		?>
 

 
	<?php 
		$field= (!empty($dataf['Freshness FontFont']) ? $dataf['Freshness FontFont'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums .bbp-forum-freshness, 
			#bbpress-forums .bbp-topic-freshness
			{
				Font-Family:  <?php echo $field ; ?> ;
			}
		<?php
		}
		?>
 
	<?php 
		$field= (!empty($dataf['Freshness FontStyle']) ? $dataf['Freshness FontStyle'] : '')  ;
		if (!empty ($field)){
			if (strpos($field,'Italic') !== false){
	?>
				#bbpress-forums .bbp-forum-freshness, 
				#bbpress-forums .bbp-topic-freshness
				{
					Font-Style:  italic ; 
				}
			<?php
			} 

			if (strpos($field,'Bold') !== false){
			?>
				#bbpress-forums .bbp-forum-freshness,
				{
					Font-weight:  bold ; 
				}
			<?php 
			}
			else {?>
				#bbpress-forums .bbp-forum-freshness,
				#bbpress-forums .bbp-topic-freshness
				{
					Font-weight:  normal ; 
				}
		<?php
			}
		}
		?>
 
/*  10 ----------------------  Font - Freshness Author--------------------------*/
 
	<?php 
		$field= (!empty($dataf['Freshness Author FontSize']) ? $dataf['Freshness Author FontSize'] : '')  ;
		if (!empty ($field)){
			if (is_numeric($field)) $field=$field.'px' ;
	?>
				#bbpress-forums .bbp-topic-freshness-author
				{
					font-size:  <?php echo $field ; ?> ;
				}
			<?php
			} 
			?>
 
	<?php 
		$field= (!empty($dataf['Freshness Author FontFont']) ? $dataf['Freshness Author FontFont'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums .bbp-topic-freshness-author
			{
				Font-Family:  <?php echo $field ; ?> ;
			}
		<?php
		} 
		?>
 
	<?php 
		$field= (!empty($dataf['Freshness Author FontStyle']) ? $dataf['Freshness Author FontStyle'] : '')  ;
		if (!empty ($field)){
			if (strpos($field,'Italic') !== false){
	?>
				#bbpress-forums .bbp-topic-freshness-author
				{
					Font-Style:  italic ; 
				}
			<?php
			} 

			if (strpos($field,'Bold') !== false){
			?>
				#bbpress-forums .bbp-topic-freshness-author
				{
					Font-weight:  bold ; 
				}
			<?php
			}
			else {?>
				#bbpress-forums .bbp-topic-freshness-author
				{
					Font-weight:  normal ; 
				}
		<?php
			}
		}
		?>
			 
 
/*  11 ----------------------  Forum border --------------------------*/
 
	<?php 
		$field1 = (!empty($dataf['Forum BorderLine width']) ? $dataf['Forum BorderLine width'] : '')  ;
		$field2 = (!empty($dataf['Forum BorderLine style']) ? $dataf['Forum BorderLine style'] : '')  ;
		$field3 = (!empty($dataf['Forum BorderColor']) ? $dataf['Forum BorderColor'] : '')  ;

		if (!empty ($field1) || !empty ($field2) ||!empty ($field3)){
			if (empty ($field1)) $field1 = '1px' ;
			if (is_numeric($field1)) $field1=$field1.'px' ;
			if (empty ($field2)) $field2 = 'solid' ;
			$field=$field1.' '.$field2.' '.$field3
		?>

			#bbpress-forums ul.bbp-forums,
			#bbpress-forums ul.bbp-topics,
			#bbpress-forums .bbp-reply-header,
			#bbpress-forums div.odd,
			#bbpress-forums div.even,
			#bbpress-forums ul.bbp-replies
			{
				Border:  <?php echo $field ; ?> ;
			}
		 
			#bbpress-forums li.bbp-header,
			#bbpress-forums li.bbp-body ul.forum,
			#bbpress-forums li.bbp-body ul.topic,
			#bbpress-forums li.bbp-footer,
			#bbpress-forums ul.forum
			{
				Border-top:  <?php echo $field ; ?> ;
			}
		
			#bbpress-forums li.bbp-footer
			{
				Border-bottom:  <?php echo $field ; ?> ;
			}
	 
		<?php 
		}
		?>
		<?php //fix for user profile display of topics when border is set to 0px ?>
		
		#bbpress-forums #bbp-user-wrapper ul.bbp-lead-topic, #bbpress-forums #bbp-user-wrapper ul.bbp-topics, #bbpress-forums #bbp-user-wrapper ul.bbp-replies {
    clear: both;
}
		

/*   12 ----------------------  Font - topic count --------------------------*/
 
	<?php 
		$field= (!empty($dataf['Topic Count FontSize']) ? $dataf['Topic Count FontSize'] : '')  ;
		if (!empty ($field)){
			if (is_numeric($field)) $field=$field.'px' ;
	?>
				#bbpress-forums li.bbp-forum-topic-count
				{
					font-size:  <?php echo $field ; ?> ;
				}
		<?php
		} 
		?>
 
	<?php 
		$field= (!empty($dataf['Topic Count FontColor']) ? $dataf['Topic Count FontColor'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums li.bbp-forum-topic-count
			{
				color:  <?php echo $field ; ?> ;
			}
		<?php
		} 
		?>
 
	<?php 
		$field= (!empty($dataf['Topic Count FontFont']) ? $dataf['Topic Count FontFont'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums li.bbp-forum-topic-count
			{
				Font-Family:  <?php echo $field ; ?> ;
			}
		<?php
		} 
		?>
 
	<?php 
		$field= (!empty($dataf['Topic Count FontStyle']) ? $dataf['Topic Count FontStyle'] : '')  ;
		if (!empty ($field)){
			if (strpos($field,'Italic') !== false){
	?>
				#bbpress-forums li.bbp-forum-topic-count
				{
					Font-Style:  italic ; 
				}
			<?php
			} 

			if (strpos($field,'Bold') !== false){
			?>
				#bbpress-forums li.bbp-forum-topic-count
				{
					Font-weight:  bold ; 
				}
			<?php 
			}
			else { ?>
				#bbpress-forums li.bbp-forum-topic-count
				{
					Font-weight:  normal ; 
				}
			 
		<?php
			}
		}
		?>

/*  13 ----------------------  Font - Post counts --------------------------*/
 
	<?php 
		$field= (!empty($dataf['Post Count FontSize']) ? $dataf['Post Count FontSize'] : '')  ;
		if (!empty ($field)){
			if (is_numeric($field)) $field=$field.'px' ;
	?>
			#bbpress-forums li.bbp-forum-reply-count
			{
				font-size:  <?php echo $field ; ?> ;
			}
		<?php
		}
		?>
 
	<?php 
		$field= (!empty($dataf['Post Count FontColor']) ? $dataf['Post Count FontColor'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums li.bbp-forum-reply-count
			{
				color:  <?php echo $field ; ?> ;
			}
		<?php
		} 
		?>
 
	<?php 
		$field= (!empty($dataf['Post Count FontFont']) ? $dataf['Post Count FontFont'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums li.bbp-forum-reply-count
			{
				Font-Family:  <?php echo $field ; ?> ;
			}
		<?php
		}
		?>
 
	<?php 
		$field= (!empty($dataf['Post Count FontStyle']) ? $dataf['Post Count FontStyle'] : '')  ;
		if (!empty ($field)){
			if (strpos($field,'Italic') !== false){
	?>
				#bbpress-forums li.bbp-forum-reply-count
				{
					Font-Style:  italic ; 
				}
			<?php 
			} 

			if (strpos($field,'Bold') !== false){
			?>
				#bbpress-forums li.bbp-forum-reply-count
				{
					Font-weight:  bold ; 
				}
			<?php 
			}
			else { ?>
				#bbpress-forums li.bbp-forum-reply-count
				{
					Font-weight:  normal ; 
				}
		<?php
			}
			 
		}
		?>

 
/*****************************************************************************_________________TOPIC INDEX___________________________________________*/ 

/*  1 ----------------------  Font - pagination --------------------------*/
 
	<?php 
		$field= (!empty($datati['Pagination FontSize']) ? $datati['Pagination FontSize'] : '')  ;
		if (!empty ($field)){
			if (is_numeric($field)) $field=$field.'px' ;
	?>
			#bbpress-forums .bbp-pagination
			{
				font-size:  <?php echo $field ; ?> ;
			}
		<?php
		}
		?>
 
	<?php 
		$field= (!empty($datati['Pagination FontColor']) ? $datati['Pagination FontColor'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums .bbp-pagination
			{
				color:  <?php echo $field ; ?> ;
			}
		<?php 
		} 
		?>
 
	<?php 
		$field= (!empty($datati['Pagination FontFont']) ? $datati['Pagination FontFont'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums .bbp-pagination
			{
				Font-Family:  <?php echo $field ; ?> ;
			}
		<?php 
		}
		?>
 
	<?php 
		$field= (!empty($datati['Pagination FontStyle']) ? $datati['Pagination FontStyle'] : '')  ;
		if (!empty ($field)){
			if (strpos($field,'Italic') !== false){
	?>
				#bbpress-forums .bbp-pagination
				{
					Font-Style:  italic ; 
				}
			<?php
			} 

			if (strpos($field,'Bold') !== false){
			?>
				#bbpress-forums .bbp-pagination
				{
					Font-weight:  bold ; 
				}
			<?php
			}
			else { ?>
				#bbpress-forums .bbp-pagination
				{
					Font-weight:  normal ; 
				}
		 
			<?php
			}
		}
		?>


/*  2 ----------------------  Font - voice/post count --------------------------*/
 
	<?php 
		$field= (!empty($datati['Voice/Post Count FontSize']) ? $datati['Voice/Post Count FontSize'] : '')  ;
		if (!empty ($field)){
			if (is_numeric($field)) $field=$field.'px' ;
	?>
			#bbpress-forums li.bbp-topic-voice-count, li.bbp-topic-reply-count
			{
				font-size:  <?php echo $field ; ?> ;
			}
		<?php
		} 
		?>
 
	<?php 
		$field= (!empty($datati['Voice/Post Count FontColor']) ? $datati['Voice/Post Count FontColor'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums li.bbp-topic-voice-count, li.bbp-topic-reply-count
			{
				color:  <?php echo $field ; ?> ;
			}
		<?php
		}
		?>
 
	<?php 
		$field= (!empty($datati['Voice/Post Count FontFont']) ? $datati['Voice/Post Count FontFont'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums li.bbp-topic-voice-count, li.bbp-topic-reply-count
			{
				Font-Family:  <?php echo $field ; ?> ;
			}
		<?php
		}
		?>
 
	<?php 
		$field= (!empty($datati['Voice/Post Count FontStyle']) ? $datati['Voice/Post Count FontStyle'] : '')  ;
		if (!empty ($field)){
			if (strpos($field,'Italic') !== false){
	?>
				#bbpress-forums li.bbp-topic-voice-count, li.bbp-topic-reply-count
				{
					Font-Style:  italic ; 
				}
			<?php
			} 

			if (strpos($field,'Bold') !== false){
			?>
				#bbpress-forums li.bbp-topic-voice-count, li.bbp-topic-reply-count
				{
					Font-weight:  bold ; 
				}
			<?php
			}
			else { ?>
				#bbpress-forums li.bbp-topic-voice-count, li.bbp-topic-reply-count
				{
					Font-weight:  normal ; 
				}
		<?php
			}
		}
		?>

/*  3 ----------------------  topic title Font - links --------------------------*/
 
	<?php 
		$field= (!empty($datati['Topic Title LinksLink Color']) ? $datati['Topic Title LinksLink Color'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums a.bbp-topic-permalink:link
			{
				color:  <?php echo $field ; ?> ;
			}
		<?php 
		} 
		?>
 
	<?php 
		$field= (!empty($datati['Topic Title LinksVisited Color']) ? $datati['Topic Title LinksVisited Color'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums a.bbp-topic-permalink:visited
			{
				color:  <?php echo $field ; ?> ;
			}
		<?php
		}
		?>
 
	<?php 
		$field= (!empty($datati['Topic Title LinksHover Color']) ? $datati['Topic Title LinksHover Color'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums a.bbp-topic-permalink:hover
			{
				color:  <?php echo $field ; ?> ;
			}
		<?php
		} 
		?>
/*  4 ----------------------  Font - Topic Title --------------------------*/
 
	<?php 
		$field= (!empty($datati['Topic Title FontSize']) ? $datati['Topic Title FontSize'] : '')  ;
		if (!empty ($field)){
			if (is_numeric($field)) $field=$field.'px' ;
	?>
				#bbpress-forums .bbp-topic-title
		 		{
				font-size:  <?php echo $field ; ?> ;
				}
		<?php 
		} 
		?>
 
	<?php 
		$field= (!empty($datati['Topic Title FontFont']) ? $datati['Topic Title FontFont'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums .bbp-topic-title
			{
				Font-Family:  <?php echo $field ; ?> ;
			}
		<?php 
		} 
		?>
 
	<?php 
		$field= (!empty($datati['Topic Title FontStyle']) ? $datati['Topic Title FontStyle'] : '')  ;
		if (!empty ($field)){
			if (strpos($field,'Italic') !== false){
	?>
				#bbpress-forums .bbp-topic-title
				{
					Font-Style:  italic ; 
				}
			<?php
			} 

			if (strpos($field,'Bold') !== false){
			?>
				#bbpress-forums .bbp-topic-title
				{
					Font-weight:  bold ; 
				}
			<?php 
			}
			else {?>
				#bbpress-forums .bbp-topic-title
				{
					Font-weight:  normal ; 
				}
		<?php
			}
		}
		?>
 
/*   5 ----------------------  Font - template notice --------------------------*/
 
	<?php 
		$field= (!empty($datati['Template Notice FontSize']) ? $datati['Template Notice FontSize'] : '')  ;
		if (!empty ($field)){
			if (is_numeric($field)) $field=$field.'px' ;
	?>
				#bbpress-forums .bbp-template-notice p
				{
					font-size:  <?php echo $field ; ?> ;
				}
		<?php
		}
		?>
 
	<?php 
		$field= (!empty($datati['Template Notice FontColor']) ? $datati['Template Notice FontColor'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums .bbp-template-notice p
			{
				color:  <?php echo $field ; ?> ;
			}
		<?php
		} 
		?>
 
	<?php 
		$field= (!empty($datati['Template Notice FontFont']) ? $datati['Template Notice FontFont'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums .bbp-template-notice p
			{
				Font-Family::  <?php echo $field ; ?> ;
			}
		<?php 
		} 
		?>
 
	<?php 
		$field= (!empty($datati['Template Notice FontStyle']) ? $datati['Template Notice FontStyle'] : '')  ;
		if (!empty ($field)){
			if (strpos($field,'Italic') !== false){
	?>
				#bbpress-forums .bbp-template-notice p
				{
					Font-Style:  italic ; 
				}
			<?php
			} 

			if (strpos($field,'Bold') !== false){
			?>
				#bbpress-forums .bbp-template-notice p
				{
					Font-weight:  bold ; 
				}
			<?php
			}
			else { ?>
				#bbpress-forums .bbp-template-notice p
				{
					Font-weight:  normal ; 
				}
			 
		<?php
			}
		}
		?>

/*  6 ----------------------  Font - template background --------------------------*/
 
	<?php 
		$field= (!empty($datati['Template NoticeBackground color']) ? $datati['Template NoticeBackground color'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums .bbp-template-notice
			{
				background-color:  <?php echo $field ; ?> ;
			}
		<?php
		}
		?>
 
/*  7 ----------------------  Font - template border --------------------------*/
 
	<?php 
		$field1 = (!empty($datati['Template Notice BorderLine width']) ? $datati['Template Notice BorderLine width'] : '')  ;
		$field2 = (!empty($datati['Template Notice BorderLine style']) ? $datati['Template Notice BorderLine style'] : '')  ;
		$field3 = (!empty($datati['Template Notice BorderLine color']) ? $datati['Template Notice BorderLine color'] : '')  ;

		if (!empty ($field1) || !empty ($field2) ||!empty ($field3)){
			if (empty ($field1)) $field1 = '1px' ;
			if (is_numeric($field1)) $field1=$field1.'px' ;
			$field=$field1.' '.$field2.' '.$field3
	?>
			#bbpress-forums .bbp-template-notice
			{
				Border:  <?php echo $field ; ?> ;
			}
		<?php
		} 
		?>

/*  8 ----------------------  Font - Started by --------------------------*/
 
	<?php 
		$field= (!empty($datati['Topic Started bySize']) ? $datati['Topic Started bySize'] : '')  ;
		if (!empty ($field)){
			if (is_numeric($field)) $field=$field.'px' ;
	?>
				#bbpress-forums .bbp-topic-started-by,
				.bbp-topic-started-in
				{
					font-size:  <?php echo $field ; ?> ;
				}
			<?php
			}
			?>
 
	<?php 
		$field= (!empty($datati['Topic Started byColor']) ? $datati['Topic Started byColor'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums .bbp-topic-started-by,
			.bbp-topic-started-in
			{
				color:  <?php echo $field ; ?> ;
			}
		<?php
		} 
		?>
 
	<?php 
		$field= (!empty($datati['Topic Started byFont']) ? $datati['Topic Started byFont'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums .bbp-topic-started-by,
			.bbp-topic-started-in
			{
				Font-Family:  <?php echo $field ; ?> ;
			}
		<?php
		} 
		?>
 
	<?php 
		$field= (!empty($datati['Topic Started byStyle']) ? $datati['Topic Started byStyle'] : '')  ;
		if (!empty ($field)){
			if (strpos($field,'Italic') !== false){
	?>
				#bbpress-forums .bbp-topic-started-by,
				.bbp-topic-started-in
				{
					Font-Style:  italic ; 
				}
			<?php
			} 

			if (strpos($field,'Bold') !== false){
			?>
				#bbpress-forums .bbp-topic-started-by,
				.bbp-topic-started-in
				{
					Font-weight:  bold ; 
				}
			<?php
			}
			else { ?>
				#bbpress-forums .bbp-topic-started-by,
				.bbp-topic-started-in
				{
					Font-weight:  normal ; 
				}
		<?php
			}
		}
		?>
		
/*  9 ----------------------  sticky/super sticky background --------------------------*/

	<?php 
		$field= (!empty($datati['Sticky Topic/ReplyBackground color - sticky topic']) ? $datati['Sticky Topic/ReplyBackground color - sticky topic'] : '')  ;
		if (!empty ($field)){
	?>
			.bbp-topics ul.sticky,
			.bbp-forum-content ul.sticky
			{
				background-color: <?php echo $field ;?> !important;
			}
		<?php
		} 
		?>

	<?php 
		$field= (!empty($datati['Sticky Topic/ReplyBackground color - super sticky topic']) ? $datati['Sticky Topic/ReplyBackground color - super sticky topic'] : '')  ;
		if (!empty ($field)){
	?>
			.bbp-topics-front ul.super-sticky,
			.bbp-topics ul.super-sticky
			{
				background-color: <?php echo $field ;?> !important;
			}

		<?php 
		} 
		?>

/*  10. ----------------------  Font - forum info notice (also does topic info)--------------------------*/
 
	<?php 
		$field= (!empty($datati['Forum Information FontSize']) ? $datati['Forum Information FontSize'] : '')  ;
		if (!empty ($field)){
			if (is_numeric($field)) $field=$field.'px' ;
	?>
			#bbpress-forums div.bbp-template-notice.info .bbp-forum-description,
			#bbpress-forums div.bbp-template-notice.info .bbp-topic-description 
			{
				font-size:  <?php echo $field ; ?> ;
			}
		<?php
		}
		?>
 
	<?php 
		$field= (!empty($datati['Forum Information FontColor']) ? $datati['Forum Information FontColor'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums div.bbp-template-notice.info .bbp-forum-description,
			#bbpress-forums div.bbp-template-notice.info .bbp-topic-description 
			{
				color:  <?php echo $field ; ?> ;
			}
		<?php
		}
		?>
 
	<?php 
		$field= (!empty($datati['Forum Information FontFont']) ? $datati['Forum Information FontFont'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums div.bbp-template-notice.info .bbp-forum-description,
			#bbpress-forums div.bbp-template-notice.info .bbp-topic-description 
			{
				Font-Family:  <?php echo $field ; ?> ;
			}
		<?php 
		}
		?>
 
	<?php 
		$field= (!empty($datati['Forum Information FontStyle']) ? $datati['Forum Information FontStyle'] : '')  ;
		if (!empty ($field)){
			if (strpos($field,'Italic') !== false){
	?>
				#bbpress-forums div.bbp-template-notice.info .bbp-forum-description,
				#bbpress-forums div.bbp-template-notice.info .bbp-topic-description 
				{
					Font-Style:  italic ; 
				}
			<?php
			} 

			if (strpos($field,'Bold') !== false){
			?>
				#bbpress-forums div.bbp-template-notice.info .bbp-forum-description,
				#bbpress-forums div.bbp-template-notice.info .bbp-topic-description 
				{
					Font-weight:  bold ; 
				}
			<?php
			}
			else { ?>
				#bbpress-forums div.bbp-template-notice.info .bbp-forum-description,
				#bbpress-forums div.bbp-template-notice.info .bbp-topic-description 
				{
					Font-weight:  normal ; 
				}
		<?php
			}
		}
		?>

/* 11 ----------------------  Font - forum info background  (also does topic info)--------------------------*/
 
	<?php 
		$field= (!empty($datati['Forum InformationBackground color']) ? $datati['Forum InformationBackground color'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums div.bbp-template-notice.info
			{
				background-color:  <?php echo $field ; ?> ;
			}
		<?php
		} 
		?>
 
/*  12 ----------------------  Font - forum info border  (also does topic info)--------------------------*/
 
	<?php 
		$field1 = (!empty($datati['Forum Information BorderLine width']) ? $datati['Forum Information BorderLine width'] : '')  ;
		$field2 = (!empty($datati['Forum Information BorderLine style']) ? $datati['Forum Information BorderLine style'] : '')  ;
		$field3 = (!empty($datati['Forum Information BorderLine color']) ? $datati['Forum Information BorderLine color'] : '')  ;

		if (!empty ($field1) || !empty ($field2) ||!empty ($field3)){
			if (empty ($field1)) $field1 = '1px' ;
			if (is_numeric($field1)) $field1=$field1.'px' ;
			$field=$field1.' '.$field2.' '.$field3
	?>
			#bbpress-forums div.bbp-template-notice.info
			{
				Border:  <?php echo $field ; ?> ;
			}
		<?php 
		}
		?>
 
/*   13 ----------------------  Topic Index headings font --------------------------*/
 
	<?php 
		$field= (!empty($datati['Topic Index Headings FontSize']) ? $datati['Topic Index Headings FontSize'] : '')  ;
		if (!empty ($field)){
			if (is_numeric($field)) $field=$field.'px' ;
	?>

				#bbpress-forums ul.forum-titles li.bbp-topic-title
				{
					font-size:  <?php echo $field ; ?> ;
				}
				 
				#bbpress-forums ul.forum-titles li.bbp-topic-voice-count
				{
					font-size:  <?php echo $field ; ?> ;
				}

				#bbpress-forums ul.forum-titles li.bbp-topic-reply-count
				{
					font-size:  <?php echo $field ; ?> ;
				}

				#bbpress-forums ul.forum-titles li.bbp-topic-freshness
				{
					font-size:  <?php echo $field ; ?> ;
				}
		<?php
		}
		?>
 
	<?php 
		$field= (!empty($datati['Topic Index Headings FontColor']) ? $datati['Topic Index Headings FontColor'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums ul.forum-titles li.bbp-topic-title
			{
				color:  <?php echo $field ; ?> ;
			}
			 
			#bbpress-forums ul.forum-titles li.bbp-topic-voice-count
			{
				color:  <?php echo $field ; ?> ;
			}

			#bbpress-forums ul.forum-titles li.bbp-topic-reply-count
			{
				color:  <?php echo $field ; ?> ;
			}

			#bbpress-forums ul.forum-titles li.bbp-topic-freshness
			{
				color:  <?php echo $field ; ?> ;
			}
		<?php
		} 
		?>
 
	<?php 
		$field= (!empty($datati['Topic Index Headings FontFont']) ? $datati['Topic Index Headings FontFont'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums ul.forum-titles li.bbp-topic-title
			{
				Font-Family:  <?php echo $field ; ?> ;
			}
			 
			#bbpress-forums ul.forum-titles li.bbp-topic-voice-count
			{
				Font-Family: <?php echo $field ; ?> ;
			}

			#bbpress-forums ul.forum-titles li.bbp-topic-reply-count
			{
				Font-Family: <?php echo $field ; ?> ;
			}

			#bbpress-forums ul.forum-titles li.bbp-topic-freshness
			{
				Font-Family:  <?php echo $field ; ?> ;
			}

		<?php 
		} 
		?>
 
	<?php 
		$field= (!empty($datati['Topic Index Headings FontStyle']) ? $datati['Topic Index Headings FontStyle'] : '')  ;
		if (!empty ($field)){
			if (strpos($field,'Italic') !== false){
	?>
				#bbpress-forums ul.forum-titles li.bbp-topic-title
				{
					Font-Style:  italic ; 
				}
				 
				#bbpress-forums ul.forum-titles li.bbp-topic-voice-count
				{
					Font-Style:  italic ; 
				}

				#bbpress-forums ul.forum-titles li.bbp-topic-reply-count
				{
					Font-Style:  italic ; 
				}

				#bbpress-forums ul.forum-titles li.bbp-topic-freshness
				{
					Font-Style:  italic ; 
				}

			<?php 
			} 

			if (strpos($field,'Bold') !== false){
			?>

				#bbpress-forums ul.forum-titles li.bbp-topic-title
				{
					Font-weight:  bold ; 
				}
				 
				#bbpress-forums ul.forum-titles li.bbp-topic-voice-count
				{
					Font-weight:  bold ; 
				}

				#bbpress-forums ul.forum-titles li.bbp-topic-reply-count
				{
					Font-weight:  bold ; 
				}

				#bbpress-forums ul.forum-titles li.bbp-topic-freshness
				{
					Font-weight:  bold ; 
				}

			<?php 
			}
			else { ?>
				#bbpress-forums ul.forum-titles li.bbp-topic-title{
					Font-weight:  normal ;
				}
				 
				#bbpress-forums ul.forum-titles li.bbp-topic-voice-count{
					Font-weight:  normal ;
				}

				#bbpress-forums ul.forum-titles li.bbp-topic-reply-count{
					Font-weight:  normal ; 
				}

				#bbpress-forums ul.forum-titles li.bbp-topic-freshness{
					Font-weight:  normal ;
				}
		<?php
			}
		}
		?>
			 
/*******************************************************************************************_________________TOPIC/REPLY___________________________________________*/ 

/*   1 ----------------------topic/reply backgrounds   --------------------------*/

	<?php 
		$field= (!empty($datat['Topic/Reply ContentBackground color - odd numbers']) ? $datat['Topic/Reply ContentBackground color - odd numbers']  : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums div.odd
			{
				background-color: <?php echo $field ; ?> ;
			}
		<?php 
		} 
		?>

	<?php 
		$field= (!empty($datat['Topic/Reply ContentBackground color - even numbers']) ? $datat['Topic/Reply ContentBackground color - even numbers'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums div.even
			{
				background-color: <?php echo $field ; ?> ;
			}
		<?php
		}
		?>
 
/*   2 ----------------------  Topic/reply header background --------------------------*/
 
	<?php 
		$field= (!empty($datat['Topic/Reply HeaderBackground color']) ? $datat['Topic/Reply HeaderBackground color'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums div.bbp-reply-header,
			#bbpress-forums div.bbp-topic-header
			{
				background-color: <?php echo $field ; ?> ;
			}
		<?php 
		} 
		?>
		 
/*   3 ----------------------  Trash/Spam backgrounds --------------------------*/
 
	<?php 
		$field= (!empty($datat['Trash/Spam ContentBackground color - odd numbers']) ? $datat['Trash/Spam ContentBackground color - odd numbers'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums .status-trash.odd,
			#bbpress-forums .status-spam.odd 
			{
				background-color: <?php echo $field ; ?> ;
			}
		<?php
		} 
		?>

	<?php 
		$field= (!empty($datat['Trash/Spam ContentBackground color - even numbers']) ? $datat['Trash/Spam ContentBackground color - even numbers'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums .status-trash.even,
			#bbpress-forums .status-spam.even
			{
				background-color: <?php echo $field ; ?> ;
			}
		<?php
		} 
		?>
 
/*   4 ----------------------  Closed Topic backgrounds --------------------------*/
 
	<?php 
		$field= (!empty($datat['Closed Topic ContentBackground color']) ? $datat['Closed Topic ContentBackground color'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums .status-closed,
			#bbpress-forums .status-closed a
			{
				background-color: <?php echo $field ; ?> ;
			}
		<?php 
		} 
		?>
 
/*   5 ----------------------  Font - topic/reply date --------------------------*/

	<?php 
		$field= (!empty($datat['Topic/Reply Date FontSize']) ? $datat['Topic/Reply Date FontSize'] : '')  ;
		if (!empty ($field)){
			if (is_numeric($field)) $field=$field.'px' ;
	?>
			#bbpress-forums .bbp-reply-post-date
			{
				font-size:  <?php echo $field ; ?> ;
			}
		<?php
		}
		?>
 
	<?php 
		$field= (!empty($datat['Topic/Reply Date FontColor']) ? $datat['Topic/Reply Date FontColor'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums .bbp-reply-post-date
			{
				color:  <?php echo $field ; ?> ;
			}
		<?php
		} 
		?>
 
	<?php 
		$field= (!empty($datat['Topic/Reply Date FontFont']) ? $datat['Topic/Reply Date FontFont'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums .bbp-reply-post-date
			{
				Font-Family:  <?php echo $field ; ?> ;
			}
		<?php 
		} 
		?>
 
	<?php 
		$field= (!empty($datat['Topic/Reply Date FontStyle']) ? $datat['Topic/Reply Date FontStyle'] : '')  ;
		if (!empty ($field)){
			if (strpos($field,'Italic') !== false){
			?>
				#bbpress-forums .bbp-reply-post-date
				{
					Font-Style:  italic ; 
				}
			<?php
			} 

			if (strpos($field,'Bold') !== false){
			?>
				#bbpress-forums .bbp-reply-post-date
				{
					Font-weight:  bold ; 
				}
			<?php 
			}
			else {?>
				#bbpress-forums .bbp-reply-post-date
				{
					Font-weight:  normal ; 
				}
		<?php
			}
		}
		?>

/*   6 ----------------------  Font - topic/reply text --------------------------*/
 

	<?php 
		$field= (!empty($datat['Topic/Reply Text FontSize']) ? $datat['Topic/Reply Text FontSize'] : '')  ;
		if (!empty ($field)){
			if (is_numeric($field)) $field=$field.'px' ;
	?>
			#bbpress-forums .bbp-topic-content, 
			#bbpress-forums .bbp-reply-content
			{
				font-size:  <?php echo $field ; ?> ;
			}
		<?php 
		} 
		?>
 
	<?php 
		$field= (!empty($datat['Topic/Reply Text FontColor']) ? $datat['Topic/Reply Text FontColor'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums .bbp-topic-content, 
			#bbpress-forums .bbp-reply-content
			{
				color:  <?php echo $field ; ?> ;
			}
		<?php
		} 
		?>
 
	<?php 
		$field= (!empty($datat['Topic/Reply Text FontFont']) ? $datat['Topic/Reply Text FontFont'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums .bbp-topic-content, 
			#bbpress-forums .bbp-reply-content
			{
				Font-Family:  <?php echo $field ; ?> ;
			}
		<?php
		}
		?>
 
	<?php 
		$field= (!empty($datat['Topic/Reply Text FontStyle']) ? $datat['Topic/Reply Text FontStyle'] : '')  ;
		if (!empty ($field)){
			if (strpos($field,'Italic') !== false){
			?>
				#bbpress-forums .bbp-topic-content,
				#bbpress-forums .bbp-reply-content
				{
					Font-Style:  italic ; 
				}
			<?php 
			} 

			if (strpos($field,'Bold') !== false){
			?>
				#bbpress-forums .bbp-topic-content,
				#bbpress-forums .bbp-reply-content
				{
					Font-weight:  bold ; 
				}
			<?php
			}
			else {?>
				#bbpress-forums .bbp-topic-content,
				#bbpress-forums .bbp-reply-content
				{
					Font-weight:  normal ; 
				}
		<?php
			}
		}
		?>
 
/*   7 ----------------------  Font - Author name --------------------------*/
 
	<?php 
		$field= (!empty($datat['Author Name FontSize']) ? $datat['Author Name FontSize'] : '')  ;
		if (!empty ($field)){
			if (is_numeric($field)) $field=$field.'px' ;
	?>
			#bbpress-forums a.bbp-author-name
			{
				font-size:  <?php echo $field ; ?> ;
			}
		<?php
		}
		?>
 
	<?php 
		$field= (!empty($datat['Author Name FontFont']) ? $datat['Author Name FontFont'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums a.bbp-author-name
			{
				Font-Family:  <?php echo $field ; ?> ;
			}
		<?php
		} 
		?>
 
	<?php 
		$field= (!empty($datat['Author Name FontStyle']) ? $datat['Author Name FontStyle'] : '')  ;
		if (!empty ($field)){
			if (strpos($field,'Italic') !== false){
			?>
				#bbpress-forums a.bbp-author-name
				{
					Font-Style:  italic ; 
				}
			<?php
			} 

			if (strpos($field,'Bold') !== false){
			?>
				#bbpress-forums a.bbp-author-name
				{
					Font-weight:  bold ; 
				}
			<?php
			}
			else {?>
				#bbpress-forums a.bbp-author-name
				{
					Font-weight:  normal ; 
				}
		<?php
			}
		}
		?>
		
/*   8 ----------------------  Font - reply permalink --------------------------*/
 
	<?php 
		$field= (!empty($datat['Reply Link FontSize']) ? $datat['Reply Link FontSize'] : '')  ;
		if (!empty ($field)){
			if (is_numeric($field)) $field=$field.'px' ;
	?>
			#bbpress-forums a.bbp-reply-permalink
			{
				font-size:  <?php echo $field ; ?> ;
			}
		<?php 
		} 
		?>
 

 
	<?php 
		$field= (!empty($datat['Reply Link FontFont']) ? $datat['Reply Link FontFont'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums a.bbp-reply-permalink
			{
				Font-Family:  <?php echo $field ; ?> ;
			}
		<?php
		} 
		?>
 
	<?php 
		$field= (!empty($datat['Reply Link FontStyle']) ? $datat['Reply Link FontStyle'] : '')  ;
		if (!empty ($field)){
			if (strpos($field,'Italic') !== false){
	?>
				#bbpress-forums a.bbp-reply-permalink
				{
					Font-Style:  italic ; 
				}
			<?php
			} 

			if (strpos($field,'Bold') !== false){
			?>
				#bbpress-forums a.bbp-reply-permalink
				{
				Font-weight:  bold ; 
				}
			<?php 
			}
			else {?>
				#bbpress-forums a.bbp-reply-permalink
				{
					Font-weight:  normal ; 
				}
		<?php
			}
		}
		?>
 
/*   9 ----------------------  Font - author role --------------------------*/
 
	<?php 
		$field= (!empty($datat['Author RoleSize']) ? $datat['Author RoleSize'] : '')  ;
		if (!empty ($field)){
			if (is_numeric($field)) $field=$field.'px' ;
	?>
			#bbpress-forums div.bbp-reply-author .bbp-author-role
			{
				font-size:  <?php echo $field ; ?> ;
			}
		<?php
		}
		?>
 
	<?php 
		$field= (!empty($datat['Author RoleColor']) ? $datat['Author RoleColor'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums div.bbp-reply-author .bbp-author-role
			{
				color:  <?php echo $field ; ?> ;
			}
		<?php
		} 
		?>
 
	<?php 
		$field= (!empty($datat['Author RoleFont']) ? $datat['Author RoleFont'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums div.bbp-reply-author .bbp-author-role
			{
				Font-Family:  <?php echo $field ; ?> ;
			}
		<?php
		} 
		?>
 
	<?php 
		$field= (!empty($datat['Author RoleStyle']) ? $datat['Author RoleStyle'] : '')  ;
		if (!empty ($field)){
			if (strpos($field,'Italic') !== false){
			?>
				#bbpress-forums div.bbp-reply-author .bbp-author-role
				{
					Font-Style:  italic ; 
				}
			<?php 
			}
			else {?>
				#bbpress-forums div.bbp-reply-author .bbp-author-role
				{
					Font-Style:  normal ; 
				}
			<?php
			} 

			if (strpos($field,'Bold') !== false){
			?>
				#bbpress-forums div.bbp-reply-author .bbp-author-role
				{
					Font-weight:  bold ; 
				}
			<?php
			}
			else {?>
				#bbpress-forums div.bbp-reply-author .bbp-author-role
				{
					Font-weight:  normal ; 
				}
		<?php
			}
		}
		?>
 
/*   10 ----------------------  Topic Header --------------------------*/
 
	<?php 
		$field= (!empty($datat['Topic HeaderSize']) ? $datat['Topic HeaderSize'] : '')  ;
		if (!empty ($field)){
			if (is_numeric($field)) $field=$field.'px' ;
	?>
				#bbpress-forums li.bbp-header .bbp-reply-content,
				#bbpress-forums li.bbp-header  .bbp-reply-author,
				#bbpress-forums li.bbp-footer .bbp-reply-content,
				#bbpress-forums li.bbp-footer  .bbp-reply-author
				{		
					font-size:  <?php echo $field ; ?> ;
				}
		<?php 
		} 
		?>
 
	<?php 
		$field= (!empty($datat['Topic HeaderColor']) ? $datat['Topic HeaderColor'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums li.bbp-header .bbp-reply-content,
			#bbpress-forums li.bbp-header  .bbp-reply-author,
			#bbpress-forums li.bbp-footer .bbp-reply-content,
			#bbpress-forums li.bbp-footer  .bbp-reply-author
			{
				color:  <?php echo $field ; ?> ;
			}
		<?php
		}
		?>
 
	<?php 
		$field= (!empty($datat['Topic HeaderFont']) ? $datat['Topic HeaderFont'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums li.bbp-header .bbp-reply-content,
			#bbpress-forums li.bbp-header  .bbp-reply-author,
			#bbpress-forums li.bbp-footer .bbp-reply-content,
			#bbpress-forums li.bbp-footer  .bbp-reply-author
			{
				Font-Family:  <?php echo $field ; ?> ;
			}
		<?php
		}
		?>
 
	<?php 
		$field= (!empty($datat['Topic HeaderStyle']) ? $datat['Topic HeaderStyle'] : '')  ;
		if (!empty ($field)){
			if (strpos($field,'Italic') !== false){
			?>
				#bbpress-forums li.bbp-header .bbp-reply-content,
				#bbpress-forums li.bbp-header  .bbp-reply-author,
				#bbpress-forums li.bbp-footer .bbp-reply-content,
				#bbpress-forums li.bbp-footer  .bbp-reply-author
				{
					Font-Style:  italic ; 
				}
			<?php 
			}
			else {?>
				#bbpress-forums li.bbp-header .bbp-reply-content,
				#bbpress-forums li.bbp-header  .bbp-reply-author,
				#bbpress-forums li.bbp-footer .bbp-reply-content,
				#bbpress-forums li.bbp-footer  .bbp-reply-author
				{
					Font-Style:  normal ; 
				}
			<?php
			} 

			if (strpos($field,'Bold') !== false){
			?>
				#bbpress-forums li.bbp-header .bbp-reply-content,
				#bbpress-forums li.bbp-header  .bbp-reply-author,
				#bbpress-forums li.bbp-footer .bbp-reply-content,
				#bbpress-forums li.bbp-footer  .bbp-reply-author
				{
					Font-weight:  bold ; 
				}
			<?php 
			}
			else {?>
				#bbpress-forums li.bbp-header .bbp-reply-content,
				#bbpress-forums li.bbp-header  .bbp-reply-author,
				#bbpress-forums li.bbp-footer .bbp-reply-content,
				#bbpress-forums li.bbp-footer  .bbp-reply-author
				{
					Font-weight:  normal ; 
				}
		<?php
			}
		}
		?>
			 
 
/*   11 ----------------------  Topic Admin Links --------------------------*/
 
	<?php 
		$field= (!empty($datat['Topic Admin linksSize']) ? $datat['Topic Admin linksSize'] : '')  ;
		if (!empty ($field)){
			if (is_numeric($field)) $field=$field.'px' ;
	?>
			#bbpress-forums span.bbp-admin-links a,
			#bbpress-forums span.bbp-admin-links 
			{
				font-size:  <?php echo $field ; ?> ;
			}
		<?php
		}
		?>
 
	<?php 
		$field= (!empty($datat['Topic Admin linksColor']) ? $datat['Topic Admin linksColor'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums span.bbp-admin-links a,
			#bbpress-forums span.bbp-admin-links 
			{
				color:  <?php echo $field ; ?> ;
			}
		<?php
		} 
		?>
 
	<?php 
		$field= (!empty($datat['Topic Admin linksFont']) ? $datat['Topic Admin linksFont'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums span.bbp-admin-links a,
			#bbpress-forums span.bbp-admin-links 
			{
			Font-Family:  <?php echo $field ; ?> ;
			}
		<?php 
		}
		?>
 
	<?php 
		$field= (!empty($datat['Topic Admin linksStyle']) ? $datat['Topic Admin linksStyle'] : '')  ;
		if (!empty ($field)){
			if (strpos($field,'Italic') !== false){
	?>
				#bbpress-forums span.bbp-admin-links a,
				#bbpress-forums span.bbp-admin-links 
				{
					Font-Style:  italic  ; 
				}
			<?php
			}
			else {?>
				#bbpress-forums span.bbp-admin-links a,
				#bbpress-forums span.bbp-admin-links 
				{
					Font-Style:  normal ; 
				}
			<?php
			} 

			if (strpos($field,'Bold') !== false){
			?>
				#bbpress-forums span.bbp-admin-links a,
				#bbpress-forums span.bbp-admin-links 
				{
					Font-weight:  bold ; 
				}
			<?php
			}
			else {?>
				#bbpress-forums span.bbp-admin-links a,
				#bbpress-forums span.bbp-admin-links 
				{
					Font-weight:  normal ; 
				}
		<?php
			}
		}
		?>
	
/*   13 ----------------------  @mentions --------------------------*/
 
	<?php 
		$field= (!empty($datat['mentionsSize']) ? $datat['mentionsSize'] : '')  ;
		if (!empty ($field)){
			if (is_numeric($field)) $field=$field.'px' ;
	?>
			#bbpress-forums .bsp-mentions a,
			#bbpress-forums .bsp-mentions 
			{
				font-size:  <?php echo $field ; ?> ;
			}
		<?php
		}
		?>
 
	<?php 
		$field= (!empty($datat['mentionsColor']) ? $datat['mentionsColor'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums .bsp-mentions a,
			#bbpress-forums .bsp-mentions 
			{
				color:  <?php echo $field ; ?> ;
			}
		<?php
		} 
		?>
	
	<?php 
		$field= (!empty($datat['mentionsFont']) ? $datat['mentionsFont'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums .bsp-mentions a,
			#bbpress-forums .bsp-mentions 
			{
				Font-Family:  <?php echo $field ; ?> ;
			}
		<?php
		} 
		?>
 
	<?php 
		$field= (!empty($datat['mentionsStyle']) ? $datat['mentionsStyle'] : '')  ;
		if (!empty ($field)){
			if (strpos($field,'Italic') !== false){
	?>
				#bbpress-forums .bsp-mentions a,
				#bbpress-forums .bsp-mentions
				{
					Font-Style:  italic  ; 
				}
			<?php
			}
			else {?>
				#bbpress-forums .bsp-mentions a,
				#bbpress-forums .bsp-mentions 
				{
					Font-Style:  normal ; 
				}
			<?php
			} 

			if (strpos($field,'Bold') !== false){
			?>
				#bbpress-forums .bsp-mentions a,
				#bbpress-forums .bsp-mentions 
				{
					Font-weight:  bold ; 
				}
			<?php
			}
			else {?>
				#bbpress-forums .bsp-mentions a,
				#bbpress-forums .bsp-mentions 
				{
					Font-weight:  normal ; 
				}
		<?php
			}
			}
		?>
	
/* ***********************************************************************************_________________TOPIC REPLY FORM___________________________________________*/ 
 
/*   1 ----------------------  Topic/reply Labels --------------------------*/
 
	<?php 
		$field= (!empty($dataform['LabelsSize']) ? $dataform['LabelsSize'] : '')  ;
		if (!empty ($field)){
			if (is_numeric($field)) $field=$field.'px' ;
	?>
			#bbpress-forums .bbp-form label
			{
				font-size:  <?php echo $field ; ?> ;
			}
		<?php
		}
		?>
 
	<?php 
		$field= (!empty($dataform['LabelsColor']) ? $dataform['LabelsColor'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums .bbp-form label
			{
				color:  <?php echo $field ; ?> ;
			}
		<?php
		}
		?>
 
	<?php 
		$field= (!empty($dataform['LabelsFont']) ? $dataform['LabelsFont'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums .bbp-form label
			{
				Font-Family:  <?php echo $field ; ?> ;
			}
		<?php
		}
		?>
 
	<?php 
		$field= (!empty($dataform['LabelsStyle']) ? $dataform['LabelsStyle'] : '')  ;
		if (!empty ($field)){
			if (strpos($field,'Italic') !== false){
			?>
				#bbpress-forums .bbp-form label
				{
					Font-Style:  italic ; 
				}
			<?php
			} 

			if (strpos($field,'Bold') !== false){
			?>
				#bbpress-forums .bbp-form label
				{
					Font-weight:  bold ; 
				}
			<?php 
			}
			else {?>
				#bbpress-forums .bbp-form label
				{
					Font-weight:  normal ; 
				}
		<?php
			}
		}
		?>
 
/* 2 ----------------------  Text area background --------------------------*/
 
	<?php 
		$field= (!empty($dataform['Text areaBackground Color']) ? $dataform['Text areaBackground Color'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums input[type="text"], textarea, 
			#bbpress-forums input[type="text"]:focus, textarea:focus,
			#bbpress-forums .quicktags-toolbar
			{
				background-color:  <?php echo $field ; ?> ;
			}
		 
		<?php 
		} 
		?>
		 
/*   3 ----------------------  Text area font --------------------------*/
 
	<?php 
		$field= (!empty($dataform['Text areaSize']) ? $dataform['Text areaSize'] : '')  ;
		if (!empty ($field)){
			if (is_numeric($field)) $field=$field.'px' ;
	?>
			#bbpress-forums input[type="text"], textarea, 
			#bbpress-forums .quicktags-toolbar ,
			#bbpress-forums div.bbp-the-content-wrapper textarea.bbp-the-content
			{
				font-size:  <?php echo $field ; ?> ;
			}
		<?php
		} 
		?>
 
	<?php 
		$field= (!empty($dataform['Text areaColor']) ? $dataform['Text areaColor'] : '')  ;
		if (!empty ($field)){
		?>
			#bbpress-forums input[type="text"], textarea, 
			#bbpress-forums .quicktags-toolbar ,
			#bbpress-forums div.bbp-the-content-wrapper textarea.bbp-the-content
			{
				color:  <?php echo $field ; ?> ;
			}
		<?php 
		}
		?>
 
	<?php 
		$field= (!empty($dataform['Text areaFont']) ? $dataform['Text areaFont'] : '')  ;
		if (!empty ($field)){
		?>
			#bbpress-forums input[type="text"], textarea, 
			#bbpress-forums .quicktags-toolbar ,
			#bbpress-forums div.bbp-the-content-wrapper textarea.bbp-the-content
			{
				Font-Family:  <?php echo $field ; ?> ;
			}
		<?php
		} 
		?>
 
	<?php 
		$field= (!empty($dataform['Text areaStyle']) ? $dataform['Text areaStyle'] : '')  ;
		if (!empty ($field)){
			if (strpos($field,'Italic') !== false){
			?>
				#bbpress-forums input[type="text"], textarea, 
				#bbpress-forums .quicktags-toolbar ,
				#bbpress-forums div.bbp-the-content-wrapper textarea.bbp-the-content
				{
					Font-Style:  italic ; 
				}
			<?php 
			} 

			if (strpos($field,'Bold') !== false){
			?>
				#bbpress-forums input[type="text"], textarea, 
				#bbpress-forums .quicktags-toolbar ,
				#bbpress-forums div.bbp-the-content-wrapper textarea.bbp-the-content
				{
					Font-weight:  bold ; 
				}
			<?php
			}
			else {?>
				#bbpress-forums input[type="text"], textarea, 
				#bbpress-forums .quicktags-toolbar ,
				#bbpress-forums div.bbp-the-content-wrapper textarea.bbp-the-content
				{
					Font-weight:  normal ; 
				}
		<?php
			}
		}
		?>
			 
/*   4 ----------------------  button background --------------------------*/

	<?php 
		$field= (!empty($dataform['ButtonBackground Color']) ? $dataform['ButtonBackground Color'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums .button
			{
				  background-color: <?php echo $field ; ?> ;
		  	}
		<?php
		} 
		?>
 
	<?php 
		$field= (!empty($dataform['ButtonText Color']) ? $dataform['ButtonText Color'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums .button
			{
				color: <?php echo $field ; ?> ;
			}

		<?php
		}
		?>
 
/*   1 ----------------------  topic posting rules --------------------------*/
 
	<?php 
		$field= (!empty($dataform['topic_posting_rulesSize']) ? $dataform['topic_posting_rulesSize'] : '')  ;
		if (!empty ($field)){
			if (is_numeric($field)) $field=$field.'px' ;
	?>
			#bbpress-forums .bsp-topic-rules
			{
				font-size:  <?php echo $field ; ?> ;
			}
		<?php 
		} 
		?>
 
	<?php 
		$field= (!empty($dataform['topic_posting_rulesColor']) ? $dataform['topic_posting_rulesColor'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums .bsp-topic-rules
			{
				color:  <?php echo $field ; ?> ;
			}
		<?php 
		}
		?>
 

 
	<?php 
		$field= (!empty($dataform['topic_posting_rulesFont']) ? $dataform['topic_posting_rulesFont'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums .bsp-topic-rules
			{
				Font-Family:  <?php echo $field ; ?> ;
			}
		<?php
		}
		?>
 
	<?php 
		$field= (!empty($dataform['topic_posting_rulesStyle']) ? $dataform['topic_posting_rulesStyle'] : '')  ;
		if (!empty ($field)){
			if (strpos($field,'Italic') !== false){
			?>
				#bbpress-forums .bsp-topic-rules
				{
					Font-Style:  italic ; 
				}
			<?php
			} 

			if (strpos($field,'Bold') !== false){
			?>
				#bbpress-forums .bsp-topic-rules
				{
				Font-weight:  bold ; 
				}
			<?php 
			}
			else {?>
				#bbpress-forums .bsp-topic-rules
				{
				Font-weight:  normal ; 
				}
		<?php
			}
		}
		?>
 
	<?php 
		$field= (!empty($dataform['topic_posting_rulesBackground Color']) ? $dataform['topic_posting_rulesBackground Color'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums .bsp-topic-rules
			{
			background-color:  <?php echo $field ; ?> ;
			}
		 
		<?php 
		}
		?>
 
	<?php 
		$field= (!empty($dataform['topic_posting_rulesborder_color']) ? $dataform['topic_posting_rulesborder_color'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums .bsp-topic-rules
			{
				border-color:  <?php echo $field ; ?> ;
				border-radius: 3px;
				border-style: solid;
				border-width: 1px;
			}
		 
		<?php 
		} 
		?>
 
/* ********_________________Forum Display___________________________________________*/ 

/*   1 ----------------------  Alter the list from horizontal to vertical - remove comma (,) seperator in 2.6--------------------------*/
	<?php 
		$field= (!empty($bsp_forum_display['forum_list']) ? $bsp_forum_display['forum_list'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums .bbp-forums-list .bbp-forum.css-sep:not(:last-child)::after {
				content: none;
			} 
		<?php
		}
		?>
 
/*   9 ----------------------  Remove Forum Description --------------------------*/
	<?php 
		$field= (!empty($bsp_forum_display['forum-description']) ? $bsp_forum_display['forum-description'] : '')  ;
		if (!empty ($field)){
	?>
			div.bbp-template-notice.info
			{
				display: none;
			}
		<?php
		}
		?>

 
/* ********_________________LATEST ACTIVITY WIDGET___________________________________________*/ 
 
/*   2 ----------------------  Widget title --------------------------*/
 
	<?php 
		$field= (!empty($datala['Widget TitleSize']) ? $datala['Widget TitleSize'] : '')  ;
		if (!empty ($field)){
			if (is_numeric($field)) $field=$field.'px' ;
	?>
				.bsp-la-title h1, 
				.bsp-la-title h2,
				.bsp-la-title h3,
				.bsp-la-title h4,
				.bsp-la-title h5
				{
					font-size:  <?php echo $field ; ?> ;
				}
		<?php 
		} 
		?>
 
	<?php 
		$field=$datala['Widget TitleColor'] ;
		if (!empty ($field)){
	?>
			.bsp-la-title h1, 
			.bsp-la-title h2,
			.bsp-la-title h3,
			.bsp-la-title h4,
			.bsp-la-title h5
			{
				color:  <?php echo $field ; ?> ;
			}
		<?php 
		}
		?>
		 
	<?php 
		$field= (!empty($datala['Widget TitleFont']) ? $datala['Widget TitleFont'] : '')  ;
		if (!empty ($field)){
	?>
			.bsp-la-title h1, 
			.bsp-la-title h2,
			.bsp-la-title h3,
			.bsp-la-title h4,
			.bsp-la-title h5
			{
			Font-Family:  <?php echo $field ; ?> ;
			}
		<?php
		}
		?>
 
	<?php 
		$field= (!empty($datala['Widget TitleStyle']) ? $datala['Widget TitleStyle'] : '')  ;
		if (!empty ($field)){
			if (strpos($field,'Italic') !== false){
			?>
				.bsp-la-title h1, 
				.bsp-la-title h2,
				.bsp-la-title h3,
				.bsp-la-title h4,
				.bsp-la-title h5
				{
					Font-Style:  italic ; 
				}
			<?php
			} 

			if (strpos($field,'Bold') !== false){
			?>
				.bsp-la-title h1, 
				.bsp-la-title h2,
				.bsp-la-title h3,
				.bsp-la-title h4,
				.bsp-la-title h5
				{
					Font-weight:  bold ; 
				}
			<?php
			}
			else {?>
				.bsp-la-title h1, 
				.bsp-la-title h2,
				.bsp-la-title h3,
				.bsp-la-title h4,
				.bsp-la-title h5
				{
					Font-weight:  normal ; 
				}
		<?php
			}
		}
		?>

/*   2 ----------------------  topic/reply title --------------------------*/
 
	<?php 
		$field= (!empty($datala['Topic TitleSize']) ? $datala['Topic TitleSize'] : '')  ;
		if (!empty ($field)){
			if (is_numeric($field)) $field=$field.'px' ;
	?>
			.bsp-la-reply-topic-title
			{
				font-size:  <?php echo $field ; ?> ;
			}
		<?php 
		} 
		?>
 
 
	<?php 
		$field= (!empty($datala['Topic TitleFont']) ? $datala['Topic TitleFont'] : '')  ;
		if (!empty ($field)){
	?>
			.bsp-la-reply-topic-title
				{
					Font-Family:  <?php echo $field ; ?> ;
				}
		<?php 
		}
		?>
 
	<?php 
		$field= (!empty($datala['Topic TitleStyle']) ? $datala['Topic TitleStyle'] : '')  ;
		if (!empty ($field)){
			if (strpos($field,'Italic') !== false){
			?>
				.bsp-la-reply-topic-title
				{
					Font-Style:  italic ; 
				}
			<?php
			} 

			if (strpos($field,'Bold') !== false){
			?>
				.bsp-la-reply-topic-title
				{
					Font-weight:  bold ; 
				}
			<?php 
			}
			else {?>
				.bsp-la-reply-topic-title
				{
				Font-weight:  normal ; 
				}
		<?php
			}
		}
		?>
 
 /*   3 ----------------------  Text font --------------------------*/
 
	<?php 
		$field= (!empty($datala['Text fontSize']) ? $datala['Text fontSize'] : '')  ;
		if (!empty ($field)){
			if (is_numeric($field)) $field=$field.'px' ;
		?>
			.bsp-la-text
			{
				font-size:  <?php echo $field ; ?> ;
			}
		<?php 
		} 
		?>
 
	<?php 
		$field= (!empty($datala['Text fontColor']) ? $datala['Text fontColor'] : '')  ;
		if (!empty ($field)){
	?>
			.bsp-la-text
			{
				color:  <?php echo $field ; ?> ;
			}
		<?php
		} 
		?>
 
	<?php 
		$field= (!empty($datala['Text fontFont']) ? $datala['Text fontFont'] : '')  ;
		if (!empty ($field)){
	?>
			.bsp-la-text
			{
				Font-Family:  <?php echo $field ; ?> ;
			}
		<?php
		}
		?>
 
	<?php 
		$field= (!empty($datala['Text fontStyle']) ? $datala['Text fontStyle'] : '')  ;
		if (!empty ($field)){
			if (strpos($field,'Italic') !== false){
			?>
				.bsp-la-text
				{
				Font-Style:  italic ; 
				}
			<?php
			} 

			if (strpos($field,'Bold') !== false){
			?>
				.bsp-la-text
				{
				Font-weight:  bold ; 
				}
			<?php 
			}
			else {?>
				.bsp-la-text
				{
				Font-weight:  normal ; 
				}
		<?php
			}
		}
		 ?>
 
/*   4 ----------------------  Topic author Font --------------------------*/
 
	<?php 
		$field= (!empty($datala['Topic author FontSize']) ? $datala['Topic author FontSize'] : '')  ;
		if (!empty ($field)){
			if (is_numeric($field)) $field=$field.'px' ;
	?>
			.bsp-la-topic-author
			{
			font-size:  <?php echo $field ; ?> ;
			}
		<?php 
		}
		?>
 

	<?php 
		$field= (!empty($datala['Topic author FontFont']) ? $datala['Topic author FontFont'] : '')  ;
		if (!empty ($field)){
	?>
			.bsp-la-topic-author
			{
				Font-Family:  <?php echo $field ; ?> ;
			}
		<?php
		} 
		?>
 
	<?php 
		$field= (!empty($datala['Topic author FontStyle']) ? $datala['Topic author FontStyle'] : '')  ;
		if (!empty ($field)){
			if (strpos($field,'Italic') !== false){
			?>
				.bsp-la-topic-author
				{
				Font-Style:  italic ; 
				}
			<?php
			} 

			if (strpos($field,'Bold') !== false){
			?>
				.bsp-la-topic-author			 
				{
				Font-weight:  bold ; 
				}
			<?php
			}
			else {?>
				.bsp-la-reply-topic-title
				{
				Font-weight:  normal ; 
				}
		<?php
			}
		}
		?>
 
/*   5 ----------------------  Freshness Font--------------------------*/
 
	<?php 
		$field= (!empty($datala['Freshness FontSize']) ? $datala['Freshness FontSize'] : '')  ;
		if (!empty ($field)){
			if (is_numeric($field)) $field=$field.'px' ;
	?>
			.bsp-la-freshness		 
			{
				font-size:  <?php echo $field ; ?> ;
			}
		<?php
		} 
		?>
 
	<?php 
		$field= (!empty($datala['Freshness FontColor']) ? $datala['Freshness FontColor'] : '')  ;
		if (!empty ($field)){
	?>
			.bsp-la-freshness		 
			{
			color:  <?php echo $field ; ?> ;
			}
		<?php
		}
		?>
 
	<?php 
		$field= (!empty($datala['Freshness FontFont']) ? $datala['Freshness FontFont'] : '')  ;
		if (!empty ($field)){
	?>
			.bsp-la-freshness		 
			{
			Font-Family:  <?php echo $field ; ?> ;
			}
		<?php
		} 
		?>
 
	<?php 
		$field= (!empty($datala['Freshness FontStyle']) ? $datala['Freshness FontStyle'] : '')  ;
		if (!empty ($field)){
			if (strpos($field,'Italic') !== false){
			?>
				.bsp-la-freshness
				{
					Font-Style:  italic ; 
				}
			<?php
			} 

			if (strpos($field,'Bold') !== false){
			?>
				.bsp-la-text			 
				{
					Font-weight:  bold ; 
				}
			<?php
			}
			else {?>
				.bsp-la-text
				{
					Font-weight:  normal ; 
				}
		<?php
			}
		}
		?>
 
/*   6 ----------------------  Forum Font --------------------------*/
 
	<?php 
		$field= (!empty($datala['Forum FontSize']) ? $datala['Forum FontSize'] : '')  ;
		if (!empty ($field)){
			if (is_numeric($field)) $field=$field.'px' ;
	?>
			.bsp-la-forum-title		 
			{
			font-size:  <?php echo $field ; ?> ;
			}	
		<?php 
		}
		?>
 
  
	<?php 
		$field= (!empty($datala['Forum FontFont']) ? $datala['Forum FontFont'] : '')  ;
		if (!empty ($field)){
		?>
			.bsp-la-forum-title		 
			{
			Font-Family:  <?php echo $field ; ?> ;
			}
		<?php 
		} 
		?>
 
	<?php 
		$field= (!empty($datala['Forum FontStyle']) ? $datala['Forum FontStyle'] : '')  ;
		if (!empty ($field)){
			if (strpos($field,'Italic') !== false){
			?>
				.bsp-la-forum-title
				{
					Font-Style:  italic ; 
				}
			<?php
			} 

			if (strpos($field,'Bold') !== false){
			?>
				.bsp-la-forum-title			 
				{
					Font-weight:  bold ; 
				}
			<?php 
			}
			else {?>
				.bsp-la-forum-title
				{
				Font-weight:  normal ; 
				}
		<?php
			}
		}
		?>

/*   7 ----------------------  Topic-reply links --------------------------*/
 
	<?php 
		$field= (!empty($datala['Topic-reply linksLink Color']) ? $datala['Topic-reply linksLink Color'] : '')  ;
		if (!empty ($field)){
	?>
			a:link.bsp-la-reply-topic-title		 
			{
				color:  <?php echo $field ; ?> ;
			}
		<?php
		} 
		?>
 
	<?php 
		$field= (!empty($datala['Topic-reply linksVisited Color']) ? $datala['Topic-reply linksVisited Color'] : '')  ;
		if (!empty ($field)){
	?>
			a:visited.bsp-la-reply-topic-title		 
			{
				color:  <?php echo $field ; ?> ;
			}
		<?php
		} 
		?>
 
	<?php 
		$field= (!empty($datala['Topic-reply linksHover Color']) ? $datala['Topic-reply linksHover Color'] : '')  ;
		if (!empty ($field)){
	?>
			a:hover.bsp-la-reply-topic-title		 
			{
			color:  <?php echo $field ; ?> ;
			}
		<?php
		}
		?>
 
/* ********_________________FORUM DISPLAY___________________________________________*/ 
 
/* ----------------------  Move breadcrumb --------------------------*/
	<?php 
		$field = (!empty($datafd['move_subscribe']) ? $datafd['move_subscribe'] : '');
		if (!empty ($field)){
	?>
			.subscription-toggle
			{	
				float:right ;
			}
		<?php 
		} 
		?>
 
 
/* ----------------------  forum description styling --------------------------*/
 
		#bbpress-forums div.bsp-forum-content
		{
		clear:both;
		margin-left: 0px ;
		padding: 0 0 0 0 ;
		}
	
/* ----------------------  Rounded corners --------------------------*/
 
	<?php 
		$field = (!empty($datafd['rounded_corners'] ) ? $datafd['rounded_corners']  : '');
		if (!empty ($field)){
	?>	
			.bbp-forums , .bbp-topics  , .bbp-replies
			{			
				border-top-left-radius: 10px ;
				border-top-right-radius: 10px ;
				border-bottom-left-radius: 10px ;
				border-bottom-right-radius: 10px ;
			}
			
		<?php
		}
		?>

/*----------------------  thumbnails on forum lists --------------------------*/
 
	<?php 
		$field = (!empty($datafd['thumbnail'] ) ? $datafd['thumbnail']  : '');
		if (!empty ($field)){
	?>	
			.bsp_thumbnail
			{
				display: flex;
				align-items: center;
			}	

			.bsp_thumbnail a
			{
				padding-left: 10px ;
			}
			
		<?php
		}
		?>
/*----------------------------------------- ROLES--------------------------------------------------------------------*/

	<?php 
	$roles = bbp_get_dynamic_roles () ;

	foreach ( $roles as $key=>$name ){
		$role = $key ;
	
		//do all the font stuff as it doesn't matter if needed or not
		$field= (!empty($data4[ $role.'font_size']) ? $data4[ $role.'font_size'] : '')  ;
		if (!empty ($field)){
			if (is_numeric($field)) $field=$field.'px' ;
			echo '.bsp-author-'.$role ;
			?> 
			{
				font-size:  <?php echo $field ; ?> ;
			}
		<?php 
		}
		?>
	 
	<?php 
		$field= (!empty($data4[$role.'font_color']) ? $data4[$role.'font_color'] : '')  ;
		if (!empty ($field)){
		echo '.bsp-author-'.$role ;
	?>
		{
			color:  <?php echo $field ; ?> ;
		}
	<?php
	} 
	?>
	 
	<?php 
		$field= (!empty($data4[$role.'font']) ? $data4[$role.'font'] : '')  ;
		if (!empty ($field)){
		echo '.bsp-author-'.$role ;
	?>
		{
			Font-Family:  <?php echo $field ; ?> ;
		}
	<?php } ?>
	 
	<?php 
		$field= (!empty($data4[$role.'font_style']) ? $data4[$role.'font_style'] : '')  ;
		if (!empty ($field)){
			if (strpos($field,'Italic') !== false){
				echo '.bsp-author-'.$role ;
	?>
				{
					Font-Style:  italic ; 
				}
		<?php
		} 

			if (strpos($field,'Bold') !== false){
				echo '.bsp-author-'.$role ;
		?>
				{
					Font-weight:  bold ; 
				}
			<?php
			}
			else { 
				echo '.bsp-author-'.$role ;
			?>
				{
					Font-weight:  normal ; 
				}
	 
			<?php
			} //end of else
	 
		} // end of font style
	
	/*  styling for displaying forum roles above user display and on left */

		$field = (!empty($bsp_roles['all_roleswhere_to_display'] ) ? $bsp_roles['all_roleswhere_to_display'] : '');	
		$field2 = (!empty($bsp_roles['all_rolesbefore_username_left'] ) ? $bsp_roles['all_rolesbefore_username_left'] : '');	
		if ($field == 2 && $field2 == 1){
			echo '.bsp-author-'.$role ;
			?>
			{
				float: left;
				padding: 0 8px;
			}
		<?php
		}
	
		//now see if we need to add styling for role type
		$roletype = $role.'type' ;
		$roletype =  (!empty($bsp_roles[$roletype]) ? $bsp_roles[$roletype] : '2');
		//if type 1 - then just image so no css needed
		//if type 2 or 4, we need to add background color
		if (($roletype == 2) || ($roletype == 4)){
			//add background color if specified 
			$background = $role.'background_color' ;
			$background=  (!empty($bsp_roles[$background]) ? $bsp_roles[$background] : '');
				if (!empty ($background)){
					echo '.bsp-author-'.$role ;
		?>
					{
						background-color:  <?php echo $background ; ?> ; 
					}
		<?php 
				} 		
		} //end of roletype 2
		
		//if type 3 then add image as background 
		if ($roletype == 3){
			$background = $role.'image' ;
			$background=  (!empty($bsp_roles[$background]) ? $bsp_roles[$background] : '');
			$image_height = (!empty($bsp_roles[$role.'image_height']) ? $bsp_roles[$role.'image_height'] : '') ;
			$image_width = (!empty($bsp_roles[$role.'image_width']) ? $bsp_roles[$role.'image_width'] : '') ;
			$padding = $image_height / 2 ;
			echo '.bsp-author-'.$role ;
		?>			
			{
				background-image: url( <?php echo $background ; ?> ) ;
				background-repeat: no-repeat;
				height : <?php echo $image_height ; ?> ;
				width : <?php echo $image_width ; ?> ;
				text-align : center ;
				padding-top : <?php echo $padding ; ?>px ;
			}
		
		<?php		
		} //end of roletype 3
	} //end of foreach role

	// now do topic author
	$role = 'topic_author' ;
	
	//do all the font stuff as it doesn't matter if needed or not
		$field= (!empty($data4[ $role.'font_size']) ? $data4[ $role.'font_size'] : '')  ;
		if (!empty ($field)){
			if (is_numeric($field)) $field=$field.'px' ;
			echo '.bsp-author-'.$role ;
		?>
			{
				font-size:  <?php echo $field ; ?> ;
			}
		<?php
		}
		?>
		 
		<?php 
		$field= (!empty($data4[$role.'font_color']) ? $data4[$role.'font_color'] : '')  ;
		if (!empty ($field)){
			echo '.bsp-author-'.$role ;
		?>
			{
				color:  <?php echo $field ; ?> ;
			}
		<?php 
		} 
		?>
		 
		<?php 
		$field= (!empty($data4[$role.'font']) ? $dataf[$role.'font'] : '')  ;
		if (!empty ($field)){
			echo '.bsp-author-'.$role ;
		?>
			{
				Font-Family:  <?php echo $field ; ?> ;
			}
		<?php
		}
		?>
		 
		<?php 
		$field= (!empty($data4[$role.'font_style']) ? $data4[$role.'font_style'] : '')  ;
		if (!empty ($field)){
			if (strpos($field,'Italic') !== false){
				echo '.bsp-author-'.$role ;
		?>
				{
					Font-Style:  italic ; 
				}
			<?php
			} 

			if (strpos($field,'Bold') !== false){
				echo '.bsp-author-'.$role ;
		?>
				{
					Font-weight:  bold ; 
				}
			<?php
			}
			else { 
				echo '.bsp-author-'.$role ;
			?>
				{
					Font-weight:  normal ; 
				}
		<?php
			} //end of else
		} // end of font style
		
	/*  styling for displaying forum roles above user display and on left */

	$field = (!empty($bsp_roles['all_roleswhere_to_display'] ) ? $bsp_roles['all_roleswhere_to_display'] : '');	
	$field2 = (!empty($bsp_roles['all_rolesbefore_username_left'] ) ? $bsp_roles['all_rolesbefore_username_left'] : '');	
	if ($field == 2 && $field2 == 1){
		echo '.bsp-author-'.$role ;
		?>
		{
			float: left;
			padding: 0 8px;
		}
	
	<?php
	}

	//now see if we need to add styling for role type
		$roletype = $role.'type' ;
		$roletype =  (!empty($bsp_roles[$roletype]) ? $bsp_roles[$roletype] : '2');
		//if type 1 - then just image so no css needed
			//if type 2 or 4, we need to add background color
			if (($roletype == 2) || ($roletype == 4)){
				//add background color if specified 
				$background = $role.'background_color' ;
				$background=  (!empty($bsp_roles[$background]) ? $bsp_roles[$background] : '');
				if (!empty ($background)){
					echo '.bsp-author-'.$role ;
				?>
					{
						background-color:  <?php echo $background ; ?> ; 
					}
				<?php 
				} 		
			} //end of roletype 2
			
			//if type 3 then add image as background 
			if ($roletype == 3){
				$background = $role.'image' ;
				$background=  (!empty($bsp_roles[$background]) ? $bsp_roles[$background] : '');
				$image_height = (!empty($bsp_roles[$role.'image_height']) ? $bsp_roles[$role.'image_height'] : '') ;
				$image_width = (!empty($bsp_roles[$role.'image_width']) ? $bsp_roles[$role.'image_width'] : '') ;
				$padding = $image_height / 2 ;
				echo '.bsp-author-'.$role ;
				?>
				{
					background-image: url( <?php echo $background ; ?> ) ;
					background-repeat: no-repeat;
					height : <?php echo $image_height ; ?> ;
					width : <?php echo $image_width ; ?> ;
					text-align : center ;
					padding-top : <?php echo $padding ; ?>px ;
				}
			<?php		
			} //end of roletype 3
			?>
		
/*----------------------  Create new topic link styling--------------------------*/
/*styles the element if it is set */

			.bsp-new-topic
			{
				text-align: center;
			}


/*----------------------  Create new topic button Button--------------------------*/

	<?php 
		$field = (!empty($databutton['ButtonSize'] ) ? $databutton['ButtonSize']  : '');
		if (!empty ($field)){
			if (is_numeric($field)) $field=$field.'px' ;
	?>	
			.bsp_button1
			{
				font-size:  <?php echo $field  ; ?>!important;
			}
		<?php
		}
		else {
			?>
			.bsp_button1
			{
				font-size:  10px !important;
				
			}
		<?php
		}
		?>


	<?php 
		$field = (!empty($databutton['ButtonFont'] ) ? $databutton['ButtonFont']  : '');
		if (!empty ($field)){
	?>	
			.bsp_button1
			{
				font-family:  <?php echo $field ; ?> ;
			}	 
		<?php
		}
		else { ?>
			.bsp_button1 {
				font-family: Arial;
			}
		<?php
		}
		?>

	<?php 
		$field = (!empty($databutton['ButtonColor'] ) ? $databutton['ButtonColor']  : '');
		if (!empty ($field)){
	?>	
			.bsp_button1
			{
				color: <?php echo $field ; ?> !important;
			}	 
		<?php
		}
		else { ?>
			.bsp_button1
			{
				color: #ffffff !important ;
			}
		<?php
		}
		?>

	<?php
		//#buddypress input[type="submit"] as possible additional code for buddypress forum users to get background colour right

        $field = (!empty($databutton['Buttonbackground color'] ) ? $databutton['Buttonbackground color']  : '');
		if (!empty ($field)){
	?>	
		.bsp_button1
			{
				background:  <?php echo $field ; ?> ;
			}	 
		<?php
		}
		else {
		?>
			.bsp_button1
			{
				background: #3498db;
				background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
				background-image: -moz-linear-gradient(top, #3498db, #2980b9);
				background-image: -ms-linear-gradient(top, #3498db, #2980b9);
				background-image: -o-linear-gradient(top, #3498db, #2980b9);
				background-image: linear-gradient(to bottom, #3498db, #2980b9);
			}
		<?php
		}
		?>

	<?php 
		$field = (!empty($databutton['Buttonhover color'] ) ? $databutton['Buttonhover color']  : '');
		if (!empty ($field)){
	?>	
			.bsp_button1:hover
			{
				background:  <?php echo $field ; ?> ;
			}	 
		<?php
		}
		else { ?>
			.bsp_button1:hover
			{
				background: #3cb0fd;
				background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
				background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
				background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
				background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
				background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
			}
		<?php
		}
		?>

	<?php 
		$field= (!empty($databutton['ButtonFont Style']) ? $databutton['ButtonFont Style'] : '')  ;
		if (!empty ($field)){
			if (strpos($field,'Italic') !== false){
	?>
				.bsp_button1
			 	{
					Font-Style:  italic ; 
				}
			<?php
			} 

			if (strpos($field,'Bold') !== false){
			?>
				.bsp_button1
				{
					Font-weight:  bold ; 
				}
			<?php 
			}
			else {?>
				.bsp_button1
				{
					Font-weight:  normal ; 
				}
		<?php
			}
		}
		?>

		.bsp_button1
		{  
			-webkit-border-radius: 28;
			-moz-border-radius: 28;
			border-radius: 28px;
			padding: 7px 15px 7px 15px;
			text-decoration: none;  
			border : none ;
			cursor : pointer ;
			line-height : 15px !important;
		}

		.bsp_button1:hover
		{
		   text-decoration: none;
		}

		.bsp-center
		{
			width: 100%;
			max-width: 100%;
			float: none;
			text-align: center;
			margin-top: 20px;
		}
	
		.bsp-one-half
		{
			float: left;
			width: 48%;
			margin-right: 4%;
		}

		.bsp-one-third
		{
			width: 30.66%;
			float: left;
			margin-right: 4%;
			position: relative;
		}
		
		
		/* stack if on mobile */
		@media only screen and (max-width: 480px) {
			 .bsp-center
			 {
			 clear:both;
			 width: 100%;
			 max-width: 100%;
			 float: left;
			 text-align: left;
			 margin-top: 10px;
			 margin-bottom : 10px ;
			 }

			.bsp-one-half
			 {
			 float: left;
			 width: 48%;
			 margin-right: 4%;
			 }

			.bsp-one-third
			 {
			 width: 30.66%;
			 float: left;
			 margin-right: 4%;
			 position: relative;
			 }
		}


/* /////////////////////////to get the spinner.gif loaded before submit executes */
		#bsp-spinner-load
		{
			background: url(/wp-admin/images/spinner.gif) no-repeat;
			display : none ;
		}

		.bsp-spinner
		{		 
			background: url(/wp-admin/images/spinner.gif) no-repeat;
			-webkit-background-size: 20px 20px;
			background-size: 20px 20px;
			float: right;
			opacity: 0.7;
			filter: alpha(opacity=70);
			width: 20px;
			height: 20px;
			margin: 2px 5px 0;
		}


		#bsp_topic_submit
		{
			display : none ;
		}

		#bsp_reply_submit
		{
			display : none ;
		}


/* /////////////////////////and support for search spinner*/

		#bsp_search_submit2
		{
			display : none ;
		}

		.bsp-search-submitting
		{
			font-size : 16px ;
			line-height : 24px ;
		
		}

		
/*   search styling--------------------------*/

			/*search content */

	<?php
		$field= (!empty($bsp_style_settings_search['search_contentbackground_color']) ? $bsp_style_settings_search['search_contentbackground_color'] : '')  ;
		if (!empty ($field)){
	?>
			#bbp_search 
			{			
			background-color:  <?php echo $field ; ?> !important ;
			}	
		<?php
		}
		?>
		
		<?php
		$field= (!empty($bsp_style_settings_search['search_contentline_height']) ? $bsp_style_settings_search['search_contentline_height'] : '')  ;
		if (!empty ($field)){
			
			if (is_numeric($field)) $field=$field.'px' ;
	?>	
	
			#bbp_search 
			{			
			line-height:  <?php echo $field ; ?> !important;
			}	
		<?php
		}
		?>

		<?php 
		$field = (!empty($bsp_style_settings_search['search_content_textSize'] ) ? $bsp_style_settings_search['search_content_textSize']  : '');
		if (!empty ($field)){
			if (is_numeric($field)) $field=$field.'px' ;
	?>	
			#bbp_search 
			{
				font-size:  <?php echo $field ; ?> !important;
			}	 
		<?php
		}
		
		?>


	<?php 
		$field = (!empty($bsp_style_settings_search['search_content_textFont'] ) ? $bsp_style_settings_search['search_content_textFont']  : '');
		if (!empty ($field)){
	?>	
			#bbp_search 
			{
				font-family:  <?php echo $field ; ?> !important;
			}	 
		<?php
		}
		?>
		
		

	<?php 
		$field = (!empty($bsp_style_settings_search['search_content_textColor'] ) ? $bsp_style_settings_search['search_content_textColor']  : '');
		if (!empty ($field)){
	?>	
			#bbp_search 
			{
				color: <?php echo $field ; ?> !important;
			}	 
		<?php
		}
		
		?>
		
		
	<?php 
		$field= (!empty($bsp_style_settings_search['search_content_textStyle']) ? $bsp_style_settings_search['search_content_textStyle'] : '')  ;
		if (!empty ($field)){
			if (strpos($field,'Italic') !== false){
	?>
				#bbp_search 
				{
					Font-Style:  italic !important ; 
				}
			<?php
			} 

			if (strpos($field,'Bold') !== false){
		?>
				#bbp_search 
				{
					Font-weight:  bold !important; 
				}
			<?php
			}
			else {?>
				#bbp_search 
				{
					Font-weight:  normal !important; 
				}
			<?php
			}
		}
		?>
		
		/*search box */
	
		<?php
		$field= (!empty($bsp_style_settings_search['search_boxbackground_color']) ? $bsp_style_settings_search['search_boxbackground_color'] : '')  ;
		if (!empty ($field)){
	?>
			#bbp_search_submit, #bsp_search_submit1, #bsp_search_submit2
			{			
			background-color:  <?php echo $field ; ?> !important ;
			}	
		<?php
		}
		?>
		
		<?php
		$field= (!empty($bsp_style_settings_search['search_boxline_height']) ? $bsp_style_settings_search['search_boxline_height'] : '')  ;
		if (!empty ($field)){
			
			if (is_numeric($field)) $field=$field.'px' ;
	?>	
	
			#bbp_search_submit, #bsp_search_submit1, #bsp_search_submit2
			{			
			line-height:  <?php echo $field ; ?> !important;
			}	
		<?php
		}
		?>

		<?php 
		$field = (!empty($bsp_style_settings_search['search_box_textSize'] ) ? $bsp_style_settings_search['search_box_textSize']  : '');
		if (!empty ($field)){
			if (is_numeric($field)) $field=$field.'px' ;
	?>	
			#bbp_search_submit, #bsp_search_submit1, #bsp_search_submit2
			{
				font-size:  <?php echo $field ; ?> !important;
			}	 
		<?php
		}
		
		?>


	<?php 
		$field = (!empty($bsp_style_settings_search['search_box_textFont'] ) ? $bsp_style_settings_search['search_box_textFont']  : '');
		if (!empty ($field)){
	?>	
			#bbp_search_submit, #bsp_search_submit1, #bsp_search_submit2
			{
				font-family:  <?php echo $field ; ?> !important;
			}	 
		<?php
		}
		?>
		
		

	<?php 
		$field = (!empty($bsp_style_settings_search['search_box_textColor'] ) ? $bsp_style_settings_search['search_box_textColor']  : '');
		if (!empty ($field)){
	?>	
			#bbp_search_submit, #bsp_search_submit1, #bsp_search_submit2
			{
				color: <?php echo $field ; ?> !important;
			}	 
		<?php
		}
		
		?>
		
		
	<?php 
		$field= (!empty($bsp_style_settings_search['search_box_textStyle']) ? $bsp_style_settings_search['search_box_textStyle'] : '')  ;
		if (!empty ($field)){
			if (strpos($field,'Italic') !== false){
	?>
				#bbp_search_submit, #bsp_search_submit1, #bsp_search_submit2
				{
					Font-Style:  italic !important ; 
				}
			<?php
			} 

			if (strpos($field,'Bold') !== false){
		?>
				#bbp_search_submit, #bsp_search_submit1, #bsp_search_submit2
				{
					Font-weight:  bold !important; 
				}
			<?php
			}
			else {?>
				#bbp_search_submit, #bsp_search_submit1, #bsp_search_submit2
				{
					Font-weight:  normal !important; 
				}
			<?php
			}
		}
		?>
		
		
/*----------------------  pin for stickies-----------------------------------------------------------------------------------------------------*/

	<?php 
	if (!empty ($datati['Sticky PinActivate'])){
	?>
			#bbpress-forums ul.sticky li.bbp-topic-title a.bbp-topic-permalink::before, #bbpress-forums ul.super-sticky li.bbp-topic-title a.bbp-topic-permalink::before
			{
				float: left;
				margin-right: 5px;
				padding-top: 3px;
				font-family: dashicons;
				content: "\f109";
			}

	<?php

		$field= (!empty($datati['Sticky PinFontSize']) ? $datati['Sticky PinFontSize'] : '12')  ;
		if (!empty ($field)){
			if (is_numeric($field)) $field=$field.'px' ;
	?>
			#bbpress-forums ul.sticky li.bbp-topic-title a.bbp-topic-permalink::before, #bbpress-forums ul.super-sticky li.bbp-topic-title a.bbp-topic-permalink::before
			{
				font-size:  <?php echo $field ; ?> ;
			}	

		<?php
		}

		$field= (!empty($datati['Sticky PinColor']) ? $datati['Sticky PinColor'] : '#ffb900')  ;
		if (!empty ($field)){
			if (is_numeric($field)) $field=$field.'px' ;
		?>
				#bbpress-forums ul.sticky li.bbp-topic-title a.bbp-topic-permalink::before, #bbpress-forums ul.super-sticky li.bbp-topic-title a.bbp-topic-permalink::before
				{
					color:  <?php echo $field ; ?> ;
				}	

		<?php
		}
	} //end of Sticky PinActivate
?>

/*----------------------  Breadcrumb home icon-----------------------------------------------------------------------------------------------------*/

		.bsp-home-icon::before
		{
			content: "";
			display: inline-block;
			font-family: dashicons;
			vertical-align: middle;
		}		 
	
	<?php
		$field= (!empty($bsp_breadcrumb['Home_IconSize']) ? $bsp_breadcrumb['Home_IconSize'] : '12')  ;
		if (!empty ($field)){
			if (is_numeric($field)) $field=$field.'px' ;
	?>
			.bsp-home-icon::before
			{
			font-size:  <?php echo $field ; ?> ;
			}	
		<?php
		}
		?>

	<?php
		$field= (!empty($bsp_breadcrumb['Home_IconColor']) ? $bsp_breadcrumb['Home_IconColor'] : '')  ;
		if (!empty ($field)){
		?>
			.bsp-home-icon::before
			{
				color:  <?php echo $field ; ?> ;
			}	 

		<?php
		}
		?>
		
/*----------------------  login failures ID-----------------------------------------------------------------------------------------------------*/
		
	<?php 
		$field= (!empty($bsp_login_fail['failSize']) ? $bsp_login_fail['failSize'] : '')  ;
		if (!empty ($field)){
			if (is_numeric($field)) $field=$field.'px' ;
	?>
			#bsp-login-error
			{
				font-size:  <?php echo $field ; ?> ;
			}
		 
		<?php 
		}
		?>
 
	<?php 
	$field= (!empty($bsp_login_fail['failColor']) ? $bsp_login_fail['failColor'] : '')  ;
	if (!empty ($field)){
	?>
		#bsp-login-error
		{
			color:  <?php echo $field ; ?> ;
		}
	 
		<?php
	} 
	?>
 
	<?php 
		$field= (!empty($bsp_login_fail['failFont']) ? $bsp_login_fail['failFont'] : '')  ;
		if (!empty ($field)){
	?>
	 
			#bsp-login-error
			{
				Font-Family:  <?php echo $field ; ?> ;
			}
	 
		<?php
		} 
		?>
		
	<?php 
		$field= (!empty($bsp_login_fail['failStyle']) ? $bsp_login_fail['failStyle'] : '')  ;
		if (!empty ($field)){
			if (strpos($field,'Italic') !== false){
	?>

				#bsp-login-error
				{
					Font-Style:  italic ; 
				}
	 
		<?php
		} 

		if (strpos($field,'Bold') !== false){
		?>
			#bsp-login-error
			{
				Font-weight:  bold ; 
			}
	 
		<?php
		}
		else { ?>
			#bsp-login-error
			{
				Font-weight:  normal ; 
			}
	 
			 
		<?php
		} // end of else
	 
	}
	?>

		
		
		
		
		
		

/*----------------------  topic lock icon-----------------------------------------------------------------------------------------------------*/

	<?php
	if (!empty($bsp_style_settings_ti['Lock IconActivate']) ){
	?>

		#bbpress-forums ul.status-closed li.bbp-topic-title a.bbp-topic-permalink::before
		{
			content: "\f160";
			display: inline-block;
			font-family: dashicons;
			vertical-align: middle;
		}	

	<?php	 
		$field= (!empty($bsp_style_settings_ti['Lock IconSize']) ? $bsp_style_settings_ti['Lock IconSize'] : '12')  ;
		if (!empty ($field)){
			if (is_numeric($field)) $field=$field.'px' ;
	?>
			#bbpress-forums ul.status-closed li.bbp-topic-title a.bbp-topic-permalink::before
			{
			font-size:  <?php echo $field ; ?> ;
			}	
		<?php
		}
		?>

	<?php
		$field= (!empty($bsp_style_settings_ti['Lock IconColor']) ? $bsp_style_settings_ti['Lock IconColor'] : '')  ;
		if (!empty ($field)){
	?>
			#bbpress-forums ul.status-closed li.bbp-topic-title a.bbp-topic-permalink::before
			{
				color:  <?php echo $field ; ?> ;
			}	 
	<?php
		}
	}  // end of Lock IconActivate
	?>
	
	
.bbpresss_unread_posts_icon{
	float:left;
	margin-right:6px;
	max-width: 45px;
}

.bbpresss_unread_posts_icon a img{
	margin-top:2px;
	-webkit-box-shadow:none;
	-moz-box-shadow:none;
	box-shadow:none;
}

.markedUnread{
	float: right;
}

.bbpress_mark_all_read_wrapper{
	transform: scale(0.8);
	transform-origin: right;
}

.bbpress_mark_all_read{
	display:inline-block;
	margin-right:5px;
	width: 100%;
}

.bbpress_mark_all_read input{
	float:right;
}

.bbpress_mark_all_read input[type="submit"]{
	margin:0px;
}


.bbpresss_unread_posts_amount{
    float: right;
    font-size: 9px;
}

#bsp_unread_optinout {
	width : 10% !important;
}

.show-iconf::before {
         font-family: 'dashicons' ;
	content : "\f449";
}

.show-iconr::before {
         font-family: 'dashicons' ;
	content : "\f451";
}

.show-icont::before {
         font-family: 'dashicons' ;
	content : "\f450";
}

.show-iconv::before {
         font-family: 'dashicons' ;
	content : "\f307";
}

.show-iconlr::before {
         font-family: 'dashicons' ;
	content : "\f338";
}

.show-iconla::before {
         font-family: 'dashicons' ;
	content : "\f469";
}

.show-iconfa::before {
         font-family: 'dashicons' ;
	content : "\f147";
}

.show-iconsu::before {
         font-family: 'dashicons' ;
	content : "\f155";
}



ul.bsp-st-info-list li.topic-subscribe a.subscription-toggle {
float : none ;
} 

.hide-list-style {
	list-style: none !important;
	margin-left : 0 !important ;
}
	

/*----------------------  custom css--------------------------*/
	<?php
		$field= (!empty($datacss['css']) ? $datacss['css'] : '')  ;
		if (!empty ($field)){
			echo $field ;	
		}





?>





 
