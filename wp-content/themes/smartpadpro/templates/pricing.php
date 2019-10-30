<?php
/**
 * Template Name: Pricing
 */
?>

<?php get_header(); ?>

<div class="section-content" style="background-color:#0dbade">
    <div class="row">
        <div class="col-lg-12"> 
            <div class="text-white text-center font_20">
                <h1 class="text-white"> <?= get_post_meta(17, 'pricing_heading', TRUE) ?> </h1><br />
                <h4><?= get_post_meta(17, 'pricing_sub_heading', TRUE) ?></h4>
                
            </div>
        </div>
    </div>
</div>

<div class="section-content pl-0 pr-0 background-color-light-gray">
	<div class="container-fluid site-container">
		<div class="row" style="display:block;">
			<div class=""><!-- col-md-12 -->
				<?php while(have_posts()): the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; ?>
			</div>
			<?php /*?><div class="col-md-12 mtop-50">
				<div class="row single-store-plan pricing">
					<?php foreach(['one', 'two', 'three'] as $count): ?>
						<div class="col-md-4 mbottom-25">
							<div class="single-store-plan-box">
								<div class="text-center">
									<div class="font-size-18 color-blue letter-spacing-2"><strong><?= get_post_meta(17, 'ss_'.$count.'_title', TRUE); ?></strong></div>
									<br>
									<div><strong><?= get_post_meta(17, 'ss_'.$count.'_user_count', TRUE); ?></strong></div>
									<div class="price-wrapper color-black">
										<div class="dollar">$</div>
										<div class="price"><?= get_post_meta(17, 'ss_'.$count.'_price', TRUE); ?></div>
									</div>
									<div class="text-center unit-text letter-spacing-2">
										<?= get_post_meta(17, 'ss_setup_unit_text', TRUE); ?>
									</div>
								</div>
								<div class="mtop-50">
									<?= get_post_meta(17, 'ss_'.$count.'_content', TRUE); ?>
								</div>
								<br/><br/><br/>
								<a href="<?= get_post_meta(17, 'ss_sign_up_url', TRUE); ?>" class="sign-up-button btn btn-gradient font-size-14 border-radius-35">SIGN UP</a>
							</div>
						</div>
					<?php endforeach ?>
				</div>
			</div><?php */?>
		</div>
	</div>

	<div class="text-center">
		<img src="<?= actions()->imageUrl('background-devices.png'); ?>" alt="Devices" class="devices-images">
	</div>
</div>

<?php /*?><div class="section-content background-color-white multi-store-plans-wrapper">
	<div class="container-fluid site-container">
		<div class="multi-store-plans-title">
			<h1 style="text-align: center;"><?= get_post_meta(17, 'ms_setup_title', TRUE); ?></h1>
		</div>

		<div class="row mtop-80 pricing">
			<?php foreach(['one', 'two', 'three'] as $count): ?>
				<div class="multi-store-plan-box-wrapper col-md-4 pleft-0 pright-0">
					<div class="multi-store-plan-box mbottom-25">
						<div class="text-center">
							<div class="font-size-18 color-blue letter-spacing-2"><strong><?= get_post_meta(17, 'ms_'.$count.'_title', TRUE); ?></strong></div>
							<div class="color-blue"><strong><?= get_post_meta(17, 'ms_'.$count.'_location', TRUE); ?></strong></div>
							<br><br>
							<div class="price-wrapper color-black">
								<div class="dollar">$</div>
								<div class="price"><?= get_post_meta(17, 'ms_'.$count.'_price', TRUE); ?></div>
							</div>
							<div class="text-center unit-text letter-spacing-2">
								<?= get_post_meta(17, 'ms_setup_unit_text', TRUE); ?>
							</div>
							<strong><?= get_post_meta(17, 'ms_setup_user_count', TRUE); ?></strong>
							
							<?php if($count == 'two'): ?>
								<div class="color-black mtop-30">
									<strong>OR</strong>
								</div>

								<div class="mtop-30">
									<div class="color-blue"><strong><?= get_post_meta(17, 'ms_'.$count.'_or_location', TRUE); ?></strong></div>
									<div class="price-wrapper color-black">
										<div class="dollar">$</div>
										<div class="price"><?= get_post_meta(17, 'ms_'.$count.'_or_price', TRUE); ?></div>
									</div>
									<div class="text-center unit-text letter-spacing-2">
										<?= get_post_meta(17, 'ms_setup_unit_text', TRUE); ?>
									</div>
									<strong><?= get_post_meta(17, 'ms_setup_user_count', TRUE); ?></strong>
								</div>
							<?php endif; ?>

							<div class="divider">
								<span class="divider-content">
									<strong><?= get_post_meta(17, 'ms_setup_divider_text', TRUE); ?></strong>
								</span>
							</div>
						</div>
						<div class="mtop-50">
							<?= get_post_meta(17, 'ms_'.$count.'_content', TRUE); ?>
						</div>
						<br/><br/><br/>
						<a href="<?= get_post_meta(17, 'ms_sign_up_url', TRUE); ?>" class="sign-up-button btn btn-gradient font-size-14 border-radius-35">SIGN UP</a>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div><?php */?>

<?php get_footer(); ?>