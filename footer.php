<?php
/**
 * @package WordPress
 * @subpackage HTML5-Reset-WordPress-Theme
 * @since HTML5 Reset 2.0
 */
?>

<?php if ( !is_front_page() ) {
?>

		<footer id="footer" class="source-org vcard copyright" >
      <nav  class="nav foot-nav" >
        <?php 
        wp_nav_menu( array(
          'theme_location' => 'secondary',
          'container' => false,
          'walker' => new description_walker()
        ) ); ?>
      </nav>
			<small id="copyright">&copy;
        <?php echo date("Y"); 
          echo " ";
          bloginfo('name'); 
        ?>
        James Bradford.<br/>
        Made with ♥ on the <a href="http://wordpress.org" target="_blank">wordpress.org</a> platform.
      </small>
		</footer>

	</div><!-- end div id="wrapper" -->

<?php } // END IF
?>

<?php wp_footer(); ?>
	
</body>

</html>
