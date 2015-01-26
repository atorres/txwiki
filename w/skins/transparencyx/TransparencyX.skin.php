<?php
/**
 * TransparencyX skin
 *
 * @file
 * @ingroup Skins
 * @author TransparencyX (http://www.transparencyx.com)
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */
 
/**
 * SkinTemplate class for TransparencyX skin
 * @ingroup Skins
 */
class SkinTransparencyX extends SkinTemplate {
 
	var $skinname = 'transparencyx',
	 	$stylename = 'TransparencyX',
		$template = 'TransparencyXTemplate',
		$useHeadElement = true;
		
		
	/**
	 * Add JavaScript via ResourceLoader
	 * Uncomment this function if your skin has a JS file or files
	 * Otherwise you won't need this function and you can safely delete it
	 *
	 * @param OutputPage $out
	 */
	public function initPage( OutputPage $out ) {
		parent::initPage( $out );
 
		$out->addModules( 'skins.transparencyx.js' );
	}
 
	/**
	 * Add CSS via ResourceLoader
	 *
	 * @param $out OutputPage
	 */
	function setupSkinUserCss( OutputPage $out ) {
		parent::setupSkinUserCss( $out );
		$out->addModuleStyles( array(
			'mediawiki.skinning.interface', 'skins.transparencyx'
		) );
	}
 
}

/**
 * BaseTemplate class for TransparencyX skin
 * @ingroup Skins
 */
class TransparencyXTemplate extends BaseTemplate {
 
	/**
	 * Outputs the entire contents of the page
	 */
	public function execute() {
		$this->html( 'headelement' ); ?>
 
 	
	 	<div class="grid clearfix"> 
	 	
		 	<!-- Outputs a message to a user about new messages on their talk page. -->
			<?php if ( $this->data['newtalk'] ) { ?>
				<div class="usermessage">
					<?php $this->html( 'newtalk' ) ?>
				</div>
			<?php } ?>
			
			<!-- Outputs a wiki's sitenotice -->
			<?php if ( $this->data['sitenotice'] ) { ?>
				<div id="siteNotice">
					<?php $this->html( 'sitenotice' ); ?>
				</div>
			<?php } ?>
			
			<!-- Output list of personal tools for user -->
			<div class="tools-wrapper clearfix">
				<ul class="tools-sidebar clearfix">
					<?php
						$varTools = $this->getPersonalTools();
						
						foreach ( $varTools as $key => $item ) {
							echo $this->makeListItem( $key, $item );
						}
					?>
				</ul>
			</div>
			
			
			<!-- Output logo -->
			<div class="grid-unit">
				<a class="logo" href="/">
					<div>TransparencyX</div>	
				</a>
			</div>
	

			<!-- Output sidebar links as header navigation -->
			<?php 
				/* Splice the 'tools' box from the sidebar array, leaving only the 'navigation' box to be output */
				$sideBarBoxes = $this->getSidebar();
				array_splice($sideBarBoxes, 1, 1); 
				foreach ( $sideBarBoxes as $boxName => $box ) { ?>
				<div id="<?php echo Sanitizer::escapeId( $box['id'] ) ?>"<?php echo Linker::tooltip( $box['id'] ) ?>>
								
				<?php
					if ( is_array( $box['content'] ) ) { ?>

				<div class="grid-main nav-header">				
					<ul>
						<?php
								foreach ( $box['content'] as $key => $item ) {
									echo $this->makeListItem( $key, $item );
								}
						?>
					</ul>			
				</div>
					
			<?php
				} else {
					echo $box['content'];
				}
			} ?>


			
			<div class="grid-unit">
				<!-- Search -->
				<form id="searchform" action="<?php $this->text( 'wgScript' ); ?>">
					<input type="hidden" name="title" value="<?php $this->text( 'searchtitle' ) ?>" />
					
					<!-- Text field for query input -->
					<!-- makeSearchInput takes an array of html attributes that MediaWiki then uses to generate the input -->
					<?php echo $this->makeSearchInput( array( 
						'type' => 'text',
						'id' => 'searchInput' ) ); ?>
				</form>
			</div>
			
			<!-- Grid row 2 -->
			<div class="grid-unit grid-clear">
				<div id="toc-sidebar">
					<!-- Table of contents is placed here via javascript -->
				</div>				
			</div>
						
			<div class="grid-main">
				<div>
				 	<h1 id="firstHeading" class="firstHeading">
				 		<?php $this->html( 'title' ) ?>
			 		</h1>
			 		
			 		<!-- Subtitle -->
			 		<?php if ( $this->data['subtitle'] ) { ?>
				 		<div id="contentSub">
					 		<?php $this->html( 'subtitle' ); ?>
				 		</div>
			 		<?php } ?>	
			 		
				 	<div class="content-body">
				 		<div class="content-text">
				 			<?php $this->html( 'bodytext' ) ?>
				 			
				 		</div>			 		
				 		
				 		<!-- Output categories -->
				 		<?php $this->html( 'catlinks' ); ?>
				 		
				 		<?php $this->html( 'dataAfterContent' ); ?>
				 	</div>	
		 		</div>
	 		</div>
	 		
	 		<!-- Content actions sidebar -->
	 		<div class="grid-unit actions-sidebar">
	 			<ul>
					<?php
						foreach ( $this->data['content_actions'] as $key => $tab ) {
							echo $this->makeListItem( $key, $tab );
						}
					?>
					<li><a href="./Special:Upload">Upload a file</a></li>
				</ul>
	 		</div>
		 </div> <!-- end grid -->
		 
		 
		 <script type="text/javascript">
		 	/* Move the table of contents from the body to the sidebar */
		    var toc = document.getElementById('toc');
		    var toc_holder = document.getElementById('toc-sidebar');
		    if(toc && toc_holder){
		        toc.parentNode.removeChild(toc);
		        toc_holder.appendChild(toc);
		        }
		       
		    /* Move the upload file link from the toolbar to the actions sidebar */
		    
		</script>
<?php $this->printTrail(); ?>
</body>
</html><?php
	}
 
}