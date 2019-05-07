<?php
/**
 * BP Links admin manage settings
 */
?>

<?php if ( isset( $message ) ) { ?>
	<div id="message" class="<?php echo $type ?> fade">
		<p><?php echo $message ?></p>
	</div>
<?php } ?>

<div class="wrap" style="position: relative">

	<h2 class="nav-tab-wrapper">
		<?php bp_links_admin_settings_tabs(); ?>
	</h2>
	
	<div class="buddypress-links-admin-content">

		<?php BP_Links_Settings::instance()->settings() ?>

		<p>
			<strong>&dagger;</strong> -
			<em><a href="http://shop.presscrew.com/shop/buddypress-links/" target="_blank"><?php _e( 'Setting applies to pro extension only', 'buddypress-links' ) ?></a></em>
		</p>
	
	</div>
	
	<?php include 'sidebar.php'; ?>
	
</div>

<script type="text/javascript">
	jQuery(document).ready(function($)
	{
		var tabs = $('h2.nav-tab-wrapper > a'),
			tab = tabs.filter('.nav-tab-active'),
			form = $('div.buddypress-links-admin-content > form'),
			sections = $( 'table.form-table', form ),
			current = sections.get( tab.index() );

		sections.hide();
		$(current).show();
		
		$( tabs ).on('click', function( e )
		{
			var self = $(this),
				section = sections.get( self.index() );
			
			tabs.removeClass('nav-tab-active');
			self.addClass('nav-tab-active');
			
			sections.hide({
				'duration': 0,
				'complete':
					function() {
						$(section).show();
					}
			});
			
			e.preventDefault();
		});
		
		$('div.buddypress-links-admin-settings input.disabled').attr('disabled', 'disabled');
	});
</script>

