			<footer id="marketengine-footer">
				<div class="me-footer-wrap">
					<div class="me-container">
						<div class="me-row">
							<div class="me-col-md-7">
								<div class="me-row">
									<div class="me-col-md-4 me-col-sm-4">
										<?php
											if(is_active_sidebar( 'footer-1' ) ){
												dynamic_sidebar( 'footer-1' );
											}
										?>
									</div>
									<div class="me-col-md-4 me-col-sm-4">
										<?php
											if(is_active_sidebar( 'footer-2' ) ){
												dynamic_sidebar( 'footer-2' );
											}
										?>
									</div>
									<div class="me-col-md-4 me-col-sm-4">
										<?php
											if(is_active_sidebar( 'footer-3' ) ){
												dynamic_sidebar( 'footer-3' );
											}
										?>
									</div>
								</div>
							</div>
							<div class="me-col-md-5">
								<div class="me-row">
									<div class="me-col-md-6 me-col-sm-6">
										<?php
											if(is_active_sidebar( 'footer-4' ) ){
												dynamic_sidebar( 'footer-4' );
											}
										?>
									</div>
									<div class="me-col-md-6 me-col-sm-6">
										<?php
											if(is_active_sidebar( 'footer-5' ) ){
												dynamic_sidebar( 'footer-5' );
											}
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="me-copyright">
					<p>EngineThemes © 2016 Powered by <b><a href="https://enginethemes.com/">MarketEngine Theme</a></b></p>
				</div>
			</footer>

		</div>
	</div>

	<div class="me-overlay"></div>
	<?php wp_footer(); ?>
</body>
</html>