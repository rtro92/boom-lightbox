<?php
	$i = 1;
	while(have_rows('corporate_members')):the_row();
		$name = get_sub_field('name');
		$title = get_sub_field('title');
		$img = get_sub_field('image');
		$bio = get_sub_field('bio');
?>
<div class="team-member">
	<div class="team-member-box" data-lb-click>
		<div class="team-img-corner"></div>
		<div class="team-img" style="background-image:url(<?php echo $img['url'];?>);"></div>
		<div class="team-name"><?php echo $name;?></div>
		<div class="team-title"><?php echo $title;?></div>
	</div>
	<div class="lightbox-container" data-lb-target>
		<div class="lb-overlay" data-lb-close></div>
		<div class="lb-inner">
			<div class="lb-top"><span class="lb-close" data-lb-close><i class="fas fa-times"></i></span></div>
			<div class="lb-content">
				<div class="lb-left">
					<style>
						@media(min-width: 768px) {
						.lb-img_<?php echo $i;?> {
							background-image: url(<?php echo $img['url'];?>);
						}
						}
					</style>
					<div class="lb-img lb-img_<?php echo $i;?>">
						<div class="lb-img-corner"></div>
					</div>
					<div class="lb-name"><?php echo $name;?></div>
					<div class="lb-title"><?php echo $title;?></div>
				</div>
				<div class="lb-right">
					<?php echo $bio;?>
				</div>
			</div>
			<div class="lb-bottom" data-lb-close><i class="fas fa-long-arrow-alt-left"></i>Back</div>
		</div>
	</div>
</div>
<?php
	$i++;
	endwhile;
?>
<script>
(function($) {
		$(function() {
			// open lightbox
			$('[data-lb-click]').on('click', function() {
				var lb_window = $(this).nextAll('[data-lb-target]');				
				$(lb_window).fadeIn();
				$(lb_window).find('.lb-inner').css('opacity', '1');
				$(lb_window).find('.lb-inner').animate({marginTop: '20px'});				
			});

			//close team memeber lightbox
			function close_lightbox(e, clone_parent) {
				console.log('closing');
				e.stopPropagation();					
				var toDelete = $(clone_parent).find('.lb-inner');;
				$('[data-lb-target]').fadeOut();				
				setTimeout(function() {
					$('.lb-inner').css('margin-top', '0px');												
					$(toDelete).remove();
					$(clone_parent).append(toDelete);
				},1000);
			}

			$(document).on('click', '[data-lb-close]', function(e) {
				var clone_parent = $(this).closest('[data-lb-target]');
				close_lightbox(e, clone_parent);
			});

		});
	})(jQuery);
</script>