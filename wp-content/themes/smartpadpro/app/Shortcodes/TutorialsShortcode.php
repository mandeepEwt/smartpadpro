<?php namespace App\Shortcodes;

use App\Shortcodes\Core\Shortcode;
use WP_Query;

class TutorialsShortcode extends Shortcode 
{

	protected $shortcode = 'tutorials';

	public function generate($atts) 
	{
		$html = '<div id="tutorials" class="accordion fat-xl-10">';
		$categories = get_terms(['taxonomy' => 'tutorial-category']);
		
		foreach($categories as $category)
		{
			$html .= '
		    <div class="card">
		        <div class="card-header" data-toggle="collapse" data-target="#collapse-'.$key.'">
		            <div class="row">
		            	<div class="col-sm-11">
				            <h3 class="font-weight-normal">
				                '.$category->name.'
				            </h3>
		            	</div>
		            	<div class="col-sm-1 text-right hidden-xs-down">
		            		<i class="fa fa-caret-down"></i>
		            	</div>
		            </div>
		        </div>
		        <div id="collapse-'.$key.'" class="collapse" data-parent="#tutorials">
		            <div class="card-body">
		                <p class="m-0">'.$this->tutorials($category->term_id).'</p>
		            </div>
		        </div>
	        </div>';

	        $key++;
		}

		$html .= '</div>';

		wp_reset_postdata();
		return $html;
	}

	public function tutorials($termId)
	{
		$tutorials = new WP_Query([
			'post_type'      => 'tutorial',
			'order_by'       => 'menu_order',
			'order'          => 'ASC',
			'post_status'    => 'publish',
			'posts_per_page' => -1,
			'tax_query' => [
				[
					'taxonomy' => 'tutorial-category',
					'field'    => 'term_id',
					'terms'    => $termId
				]
			]
		]);

		$html .= '<div class="row">';
		while($tutorials->have_posts())
		{
			$tutorials->the_post();

			$html .= '
			<div class="col-md-4 col-sm-6 mbottom-25">
				<div class="tutorials background-color-white border-radius-15 fat-20 tall-20 cursor-pointer">
					<div class="image-wrapper" data-title="'.get_the_title().'" data-link="'.get_post_meta(get_the_ID(), 'link', TRUE).'">
						<div class="play-wrapper">
							<img src="'.actions()->imageUrl('play.png').'" alt="Screen Shot" />
						</div>
						<img class="image" src="'.get_the_post_thumbnail_url(null, 'full').'" alt="Screen Shot" />
					</div>
					<br/>
					<strong>'.get_the_title().'</strong>
				</div>
			</div>';
		}

		$html.= '</div>';

		return $html;
	}

}