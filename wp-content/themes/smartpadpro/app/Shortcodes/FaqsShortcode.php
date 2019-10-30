<?php namespace App\Shortcodes;

use App\Shortcodes\Core\Shortcode;
use WP_Query;

class FaqsShortcode extends Shortcode 
{

	protected $shortcode = 'faqs';

	public function generate($atts) 
	{
		$html = '<div id="faqs" class="container accordion fat-xl-10">';

		$faqs = new WP_Query([
			'post_type'      => 'faq',
			'order_by'       => 'menu_order',
			'order'          => 'ASC',
			'post_status'    => 'publish',
			'posts_per_page' => -1
		]);

		$key = 0;
		while($faqs->have_posts())
		{
			$faqs->the_post();
			 //'.($key == 0 ? 'active' : '').'  '.($key == 0 ? 'show' : '').'
			$html .= '
		    <div class="card">
		        <div class="card-header" data-toggle="collapse" data-target="#collapse-'.$key.'">
		            <div class="row">
		            	<div class="col-sm-11">
				            <h5 class="font-weight-normal">
				                Q: '.get_the_title().'
				            </h5>
		            	</div>
		            	<div class="col-sm-1 text-right hidden-xs-down">
		            		<i class="fa fa-caret-down"></i>
		            	</div>
		            </div>
		        </div>
		        <div id="collapse-'.$key.'" class="collapse" data-parent="#faqs">
		            <div class="card-body">
		                <p class="m-0">'.get_the_content().'</p>
		            </div>
		        </div>
	        </div>';

		    $key++;
		}

		$html .= '</div>';

		wp_reset_postdata();
		return $html;
	}

}