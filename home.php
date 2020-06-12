<?php
/**
 * The main template file.
 */

$news_service = new LL_News_Service();
$news_list = $news_service->get_short_list();
$fundraising_advices = $news_service->get_short_fundraising_advices_list();

$tstm_service = new LL_Testimonials_Service();
$tstm_list = $tstm_service->get_short_list(100);

$orgs_service = new LL_Orgs_Service();
$orgs_list = $orgs_service->get_short_list();

$faq_tempaltes = new LL_Faq_Templates();

$faq_service = new LL_Faq_Service();
$faq_list = $faq_service->get_short_list();
$faq_page = ll_get_post('faq', 'page');
$faq_view_all_url = get_the_permalink($faq_page);

$cap_service = new LL_Capability_Service();
$main_capabilites = $cap_service->get_capabilities(LL_Capability_Service::$main_capabilites_cat);

$demo_page = ll_get_post('demo-zone', 'page');
$demo_zone_url = get_the_permalink($demo_page);

get_header(); ?>

<section class="leyka-intro container">
	<h1><?php echo get_theme_mod('ll_label_intro_header');?></h1>
	
	<p><?php echo nl2br(get_theme_mod('ll_label_intro_subheader'));?></p>
	
	<div class="action-and-stats">
    	<a class="btn btn-primary" href="<?php echo get_theme_mod('ll_install_leyka_url');?>"><?php echo get_theme_mod('ll_label_install_leyka_caption');?><sub><?php echo get_theme_mod('ll_label_leyka_version');?></sub></a>
    	
    	<div class="leyka-stats">
    		<?php echo get_theme_mod('ll_label_intro_stats_header');?>
    		<sub><?php echo get_theme_mod('ll_label_intro_stats_subheader');?></sub>
    	</div>
	</div>
	
	<div class="ll-intro-ill">
    	<svg class="leyka-pic"><use xlink:href="#pic-head-ill" /></svg>
    	<svg class="ll-drop-lg icon-drop color-intro-drop-lg"><use xlink:href="#icon-drop-lg" /></svg>
	</div>
</section>


<section class="leyka-h2-block container free-forever">
	<h2><?php echo get_theme_mod('ll_label_testimonials_header');?></h2>
	<p><?php echo nl2br(get_theme_mod('ll_label_testimonials_subheader'));?></p>
	<svg class="svg-icon icon-drop color004"><use xlink:href="#icon-drop-small" /></svg>
</section>


<section class="leyka-tstm container">

	<div class="tstm-list">
		<?php foreach($tstm_list as $post):?>
    	<article>
    		<?php echo apply_filters('the_content', get_post_field('post_content', $post));?>
    		<div class="author">
    			<?php $post_thumbnail = get_the_post_thumbnail_url( $post, 'thumbnail' );?>
    			<?php if($post_thumbnail){?>
    			<img src="<?php echo $post_thumbnail;?>" alt="" />
    			<?php }?>
    			<div class="info">
    				<span class="name"><?php echo get_the_title($post);?>,</span>
    				<span class="org"><?php echo apply_filters('get_the_excerpt', get_post_field('post_excerpt', $post));?></span>
    			</div>
    		</div>		
    	</article>
    	<?php endforeach;?>
	</div>
	
	<?php if(count($tstm_list) > 2):?>
	<div class="nav-container">
    	<nav class="ll-tstm-nav" id="ll-tstm-nav"></nav>
	</div>
	<?php endif;?>
	
	<svg class="svg-icon icon-drop color004"><use xlink:href="#icon-drop-small" /></svg>
	<img class="fig1" src="<?php echo get_template_directory_uri();?>/assets/img/pic-tstm-fig1.svg" />
	<img class="fig2" src="<?php echo get_template_directory_uri();?>/assets/img/pic-tstm-fig2.svg" />
</section>


<section class="leyka-orgs container">
	<h4><?php echo get_theme_mod('ll_label_testimonials_installations_stats');?></h4>
	<div class="orgs container">
		<div class="orgs-row">
			<div class="row-inner" id="orgs_row_inner">
        		<?php foreach($orgs_list as $post):?>
    			<div class="org-logo"><img alt="<?php echo get_the_title($post);?>" src="<?php echo get_the_post_thumbnail_url( $post, 'medium' );?>" /></div>
            	<?php endforeach;?>
    		</div>
		</div>
	</div>
</section>


<section class="leyka-h2-block container freedom-control">
	<h2><?php echo get_theme_mod('ll_label_feaures_freedom');?></h2>
	<p><?php echo nl2br(get_theme_mod('ll_label_feaures_customize_it'));?></p>
</section>


<section class="leyka-features container">
	<div class="screen">
		<?php foreach($main_capabilites as $i => $post){?>
			<img alt="<?php echo esc_html($post->post_title);?>" src="<?php echo get_the_post_thumbnail_url( $post, 'medium_large' );?>" <?php if(!$i){?>class="active"<?php }?> />
		<?php }?>
	</div>
	
	<div class="features-bar">
    	<ul class="features-list">
    		<li class="active">
    			<div class="ficon">
    				<svg class="svg-icon bg"><use xlink:href="#icon-drop" /></svg>
    				<svg class="svg-icon icon"><use xlink:href="#icon-pay" /></svg>
    			</div>
    			<div class="ftext"><?php echo get_theme_mod('ll_label_feaures_24pm');?></div>
    		</li>
    		<li>
    			<div class="ficon">
    				<svg class="svg-icon bg"><use xlink:href="#icon-drop" /></svg>
    				<svg class="svg-icon icon"><use xlink:href="#icon-fizur" /></svg>
    			</div>
    			<div class="ftext"><?php echo get_theme_mod('ll_label_feaures_fizur');?></div>
    		</li>
    		<li>
    			<div class="ficon">
    				<svg class="svg-icon bg"><use xlink:href="#icon-drop" /></svg>
    				<svg class="svg-icon icon"><use xlink:href="#icon-recur" /></svg>
    			</div>
    			<div class="ftext"><?php echo get_theme_mod('ll_label_feaures_single_recur');?></div>
    		</li>
    		<li>
    			<div class="ficon">
    				<svg class="svg-icon bg"><use xlink:href="#icon-drop" /></svg>
    				<svg class="svg-icon icon"><use xlink:href="#icon-cabinet" /></svg>
    			</div>
    			<div class="ftext"><?php echo get_theme_mod('ll_label_feaures_donor_account');?></div>
    		</li>
    		<li>
    			<div class="ficon">
    				<svg class="svg-icon bg"><use xlink:href="#icon-drop" /></svg>
    				<svg class="svg-icon icon"><use xlink:href="#icon-list" /></svg>
    			</div>
    			<div class="ftext"><?php echo get_theme_mod('ll_label_feaures_donations_reports');?></div>
    		</li>
    	</ul>
    	<div class="all-features-wrapper">
    		<a class="all-features" href="<?php echo get_theme_mod('ll_all_fetures_url');?>"><?php echo get_theme_mod('ll_label_feaures_all');?><svg class="svg-icon"><use xlink:href="#icon-arrow-line-right" /></svg></a>
    	</div>
	</div>
	
	<div class="nav-container nav-mobile">
    	<nav>
    		<a class="active" href="#"> </a>
    		<a href="#"> </a>
    		<a href="#"> </a>
    		<a href="#"> </a>
    		<a href="#"> </a>
    	</nav>
	</div>
	
</section>


<?php get_template_part( 'template-parts/section-howtostart' );?>


<section class="leyka-h2-block container how-it-works">
	<h2><?php echo get_theme_mod('ll_label_hiw_how_it_works');?></h2>
	<p><?php echo get_theme_mod('ll_label_hiw_30_minutes_enough');?></p>
	<p><?php echo get_theme_mod('ll_label_hiw_no_programming_skills_required');?></p>
	<svg class="svg-icon icon-drop color001"><use xlink:href="#icon-drop-small" /></svg>
</section>


<section class="leyka-workflow container">

	<div class="steps">
	
    	<div class="step step-download">
    		<div class="ill-col">
    			<img class="svg-ill" src="<?php echo get_template_directory_uri();?>/assets/img/pic-hiw-ill01.svg" />
    			<svg class="svg-icon icon-drop color005"><use xlink:href="#icon-drop-small-002" /></svg>
    		</div>
    		<div class="info-col">
    			<span class="num">Шаг 1</span>
    			<h3><?php echo get_theme_mod('ll_label_step1_header');?></h3>
    			<p><?php echo get_theme_mod('ll_label_step1_subheader');?></p>
    			<ul>
    				<?php if(get_theme_mod('ll_label_step1_link1_url') && get_theme_mod('ll_label_step1_link1_title')){?>
    				<li>
    					<a href="<?php echo get_theme_mod('ll_label_step1_link1_url');?>" target="_blank" class="iconed-link">
    						<svg class="svg-icon"><use xlink:href="#icon-video" /></svg>
    						<span><?php echo get_theme_mod('ll_label_step1_link1_title');?></span>
    					</a>
    				</li>
    				<?php }?>
    				<?php if(get_theme_mod('ll_label_step1_link2_url') && get_theme_mod('ll_label_step1_link2_title')){?>
    				<li>
    					<a href="<?php echo get_theme_mod('ll_label_step1_link2_url');?>" target="_blank" class="iconed-link">
    						<svg class="svg-icon"><use xlink:href="#icon-video" /></svg>
    						<span><?php echo get_theme_mod('ll_label_step1_link2_title');?></span>
    					</a>
    				</li>
    				<?php }?>
    				<?php if(get_theme_mod('ll_label_step1_link3_url') && get_theme_mod('ll_label_step1_link3_title')){?>
    				<li>
    					<a href="<?php echo get_theme_mod('ll_label_step1_link3_url');?>" target="_blank" class="iconed-link">
    						<svg class="svg-icon"><use xlink:href="#icon-video" /></svg>
    						<span><?php echo get_theme_mod('ll_label_step1_link3_title');?></span>
    					</a>
    				</li>
    				<?php }?>
    			</ul>
    		</div>
    	</div>
    	
    	<div class="step setup-your-data">
    		<div class="ill-col">
    			<svg class="svg-ill"><use xlink:href="#pic-hiw-ill02" /></svg>
    		</div>
    		<div class="info-col">
    			<span class="num">Шаг 2</span>
    			<h3><?php echo get_theme_mod('ll_label_step2_header');?></h3>
    			<p><?php echo get_theme_mod('ll_label_step2_subheader');?></p>
    			<ul>
    				<?php if(get_theme_mod('ll_label_step2_link1_url') && get_theme_mod('ll_label_step2_link1_title')){?>
    				<li>
    					<a href="<?php echo get_theme_mod('ll_label_step2_link1_url');?>" class="iconed-link">
    						<svg class="svg-icon"><use xlink:href="#icon-video" /></svg>
    						<span><?php echo get_theme_mod('ll_label_step2_link1_title');?></span>
    					</a>
    				</li>
    				<?php }?>
    				<?php if(get_theme_mod('ll_label_step2_link2_url') && get_theme_mod('ll_label_step2_link2_title')){?>
    				<li>
    					<a href="<?php echo get_theme_mod('ll_label_step2_link2_url');?>" target="_blank" class="iconed-link">
    						<svg class="svg-icon"><use xlink:href="#icon-video" /></svg>
    						<span><?php echo get_theme_mod('ll_label_step2_link2_title');?></span>
    					</a>
    				</li>
    				<?php }?>
    				<?php if(get_theme_mod('ll_label_step2_link3_url') && get_theme_mod('ll_label_step2_link3_title')){?>
    				<li>
    					<a href="<?php echo get_theme_mod('ll_label_step2_link3_url');?>" target="_blank" class="iconed-link">
    						<svg class="svg-icon"><use xlink:href="#icon-video" /></svg>
    						<span><?php echo get_theme_mod('ll_label_step2_link3_title');?></span>
    					</a>
    				</li>
    				<?php }?>
    			</ul>
    		</div>
    	</div>

    	<div class="step connect-payment-system">
    		<div class="ill-col">
    			<svg class="svg-ill"><use xlink:href="#pic-hiw-ill03" /></svg>
    			<svg class="svg-icon icon-drop color004"><use xlink:href="#icon-drop-small" /></svg>
    		</div>
    		<div class="info-col">
    			<span class="num">Шаг 3</span>
    			<h3><?php echo get_theme_mod('ll_label_step3_header');?></h3>
    			<p><?php echo get_theme_mod('ll_label_step3_subheader');?></p>
    			<ul>
    				<?php if(get_theme_mod('ll_label_step3_link1_url') && get_theme_mod('ll_label_step3_link1_title')){?>
    				<li>
    					<a href="<?php echo get_theme_mod('ll_label_step3_link1_url');?>" class="iconed-link">
    						<svg class="svg-icon"><use xlink:href="#icon-video" /></svg>
    						<span><?php echo get_theme_mod('ll_label_step3_link1_title');?></span>
    					</a>
    				</li>
    				<?php }?>
    				<?php if(get_theme_mod('ll_label_step3_link2_url') && get_theme_mod('ll_label_step3_link2_title')){?>
    				<li>
    					<a href="<?php echo get_theme_mod('ll_label_step3_link2_url');?>" target="_blank" class="iconed-link">
    						<svg class="svg-icon"><use xlink:href="#icon-video" /></svg>
    						<span><?php echo get_theme_mod('ll_label_step3_link2_title');?></span>
    					</a>
    				</li>
    				<?php }?>
    				<?php if(get_theme_mod('ll_label_step3_link3_url') && get_theme_mod('ll_label_step3_link3_title')){?>
    				<li>
    					<a href="<?php echo get_theme_mod('ll_label_step3_link3_url');?>" target="_blank" class="iconed-link">
    						<svg class="svg-icon"><use xlink:href="#icon-video" /></svg>
    						<span><?php echo get_theme_mod('ll_label_step3_link3_title');?></span>
    					</a>
    				</li>
    				<?php }?>
    			</ul>
    		</div>
    	</div>

    	<div class="step setup-campaign">
    		<div class="ill-col">
                <img class="svg-ill" src="<?php echo get_template_directory_uri();?>/assets/img/pic-hiw-ill04.svg" />
    			<svg class="svg-icon icon-drop color002"><use xlink:href="#icon-drop-small" /></svg>
    		</div>
    		<div class="info-col">
    			<span class="num">Шаг 4</span>
    			<h3><?php echo get_theme_mod('ll_label_step4_header');?></h3>
    			<p><?php echo get_theme_mod('ll_label_step4_subheader');?></p>
    			<ul>
    				<?php if(get_theme_mod('ll_label_step4_link1_url') && get_theme_mod('ll_label_step4_link1_title')){?>
    				<li>
    					<a href="<?php echo get_theme_mod('ll_label_step4_link1_url');?>" class="iconed-link">
    						<svg class="svg-icon"><use xlink:href="#icon-video" /></svg>
    						<span><?php echo get_theme_mod('ll_label_step4_link1_title');?></span>
    					</a>
    				</li>
    				<?php }?>
    				<?php if(get_theme_mod('ll_label_step4_link2_url') && get_theme_mod('ll_label_step4_link2_title')){?>
    				<li>
    					<a href="<?php echo get_theme_mod('ll_label_step4_link2_url');?>" class="iconed-link">
    						<svg class="svg-icon"><use xlink:href="#icon-video" /></svg>
    						<span><?php echo get_theme_mod('ll_label_step4_link2_title');?></span>
    					</a>
    				</li>
    				<?php }?>
    				<?php if(get_theme_mod('ll_label_step4_link3_url') && get_theme_mod('ll_label_step4_link3_title')){?>
    				<li>
    					<a href="<?php echo get_theme_mod('ll_label_step4_link3_url');?>" class="iconed-link">
    						<svg class="svg-icon"><use xlink:href="#icon-video" /></svg>
    						<span><?php echo get_theme_mod('ll_label_step4_link3_title');?></span>
    					</a>
    				</li>
    				<?php }?>
    			</ul>
    		</div>
    	</div>

    	<div class="step build-relationships-with-donors">
    		<div class="ill-col">
    			<svg class="svg-ill"><use xlink:href="#pic-hiw-ill05" /></svg>
    		</div>
    		<div class="info-col">
    			<span class="num">Шаг 5</span>
    			<h3><?php echo get_theme_mod('ll_label_step5_header');?></h3>
    			<p><?php echo get_theme_mod('ll_label_step5_subheader');?></p>
    			<ul>
    				<?php if(get_theme_mod('ll_label_step5_link1_url') && get_theme_mod('ll_label_step5_link1_title')){?>
    				<li>
    					<a href="<?php echo get_theme_mod('ll_label_step5_link1_url');?>" class="iconed-link">
    						<svg class="svg-icon"><use xlink:href="#icon-video" /></svg>
    						<span><?php echo get_theme_mod('ll_label_step5_link1_title');?></span>
    					</a>
    				</li>
    				<?php }?>
    				<?php if(get_theme_mod('ll_label_step5_link2_url') && get_theme_mod('ll_label_step5_link2_title')){?>
    				<li>
    					<a href="<?php echo get_theme_mod('ll_label_step5_link2_url');?>" class="iconed-link">
    						<svg class="svg-icon"><use xlink:href="#icon-video" /></svg>
    						<span><?php echo get_theme_mod('ll_label_step5_link2_title');?></span>
    					</a>
    				</li>
    				<?php }?>
    				<?php if(get_theme_mod('ll_label_step5_link3_url') && get_theme_mod('ll_label_step5_link3_title')){?>
    				<li>
    					<a href="<?php echo get_theme_mod('ll_label_step5_link3_url');?>" class="iconed-link">
    						<svg class="svg-icon"><use xlink:href="#icon-video" /></svg>
    						<span><?php echo get_theme_mod('ll_label_step5_link3_title');?></span>
    					</a>
    				</li>
    				<?php }?>
    			</ul>
    		</div>
    	</div>
    	
	</div>
	
</section>

<section class="leyka-congrats">
	<p><?php echo get_theme_mod('ll_label_congrats');?></p>
	<div class="ll-visit-demo-zone">
		<?php echo get_theme_mod('ll_label_demo_want_to_see');?> <a href="<?php echo $demo_zone_url;?>"><?php echo get_theme_mod('ll_label_demo_watch_demo');?></a>
	</div>
</section>

<section class="leyka-faq-list container">
	<?php $faq_tempaltes->show_list($faq_list);?>
	<div class="ll-faq-view-all">
		<a href="<?php echo $faq_view_all_url;?>"><?php echo get_theme_mod('ll_label_faq_view_all_faq');?></a>
	</div>	
</section>

<section class="leyka-news container">
	<div class="leyka-news-inner">
    	<h4><?php echo get_theme_mod('ll_label_news_header');?></h4>
    	
    	<div class="subscription">
    		<span><?php echo get_theme_mod('ll_label_news_be_informed');?></span>
        	<ul>
        		<?php for($i = 1; $i <= 3; $i++) {
        		    $url = get_theme_mod('ll_label_news_channel'.$i.'_url');
        		    $title = get_theme_mod('ll_label_news_channel'.$i.'_title');
        		    
        		    if(!$url || !$title) {
        		        continue;
        		    }
        		?>
        		<li>
        			<a href="<?php echo $url;?>">
        				<svg><use xlink:href="#icon-arrow-circle-right" /></svg>
        				<span><?php echo $title;?></span>
        			</a>
        		</li>
        		<?php }?>
        	</ul>
    	</div>

        <div class="news-list container">
            <div class="row">
			<?php
			$release_posts = leyka_get_teplycha_posts( array( 'per_page' => 3, 'tags' => 21348 ) );
			$release_count = count( $release_posts );

			$additional_count = 3 - $release_count;

			if ( $release_count <= 3 ) {
				$additional_posts_ids = array( 3390, 3391 );
				$i = 1;
				foreach ( $additional_posts_ids as $post_id ) {
					if ( $i <= $additional_count ) {
						$additional_post = leyka_get_post( $post_id );
						if ( $additional_post ) {
							$categories = leyka_get_post_categories( $post_id );
							?>
							<article class="col-md-4 news-item">
								<?php
								if ( $categories ) {
									foreach ( $categories as $category ) {
										?>
										<span class="news-tag"><?php echo esc_html( $category->name ); ?></span>
										<?php
									}
								}
								?>
								<a href="<?php echo esc_url( $additional_post->link ); ?>"><?php echo esc_html( $additional_post->title->rendered ); ?></a>
								<time><?php echo mysql2date('d F Y', $additional_post->date ); ?></time>
							</article>
							<?php
						}
					}
					$i++;
				}
			}


                if ( $release_posts ) {
                    $tag = leyka_get_teplycha_post_tag( 21348 );
                    foreach( $release_posts as $post ) { ?>
                        <article class="col-md-4 news-item">
                            <?php if ( $tag ) { ?>
                                 <span class="news-tag"><?php echo esc_html( $tag->name );?></span>
                            <?php } ?>
                            <a href="<?php echo esc_url( $post->link );?>" target="_blank"><?php echo esc_html( $post->title->rendered ); ?></a>
                            <time><?php echo mysql2date('d F Y', $post->date ); ?></time>
                        </article>
                    <?php }
                }

                ?>
            </div>
            <div class="row">
                <div class="col-md-12 news-underline"></div>
            </div>
        </div>

	</div>
</section>

<section class="leyka-news leyka-fundraising-advices container">
	<div class="leyka-news-inner">
    	<h4><?php echo get_theme_mod('ll_label_fundraising_advices_header');?></h4>
    	
    	<div class="news-list container">
    		<div class="row">
                <?php 
                $release_posts = leyka_get_teplycha_posts( array( 'per_page' => 3, 'tags' => 5411 ) );

                if ( $release_posts ) {
                    $tag = leyka_get_teplycha_post_tag( 5411 );
                    foreach( $release_posts as $post ) { ?>
                        <article class="col-md-4 news-item">
                            <?php if ( $tag ) { ?>
                                 <span class="news-tag"><?php echo esc_html( $tag->name );?></span>
                            <?php } ?>
                            <a href="<?php echo esc_url( $post->link );?>" target="_blank"><?php echo esc_html( $post->title->rendered ); ?></a>
                            <time><?php echo mysql2date('d F Y', $post->date ); ?></time>
                        </article>
                    <?php }
                }
                ?>
    		</div>
    	</div>
	</div>
</section>

<section class="leyka-general-stats container-fluid">
	<div class="stats-list">
		<?php if(get_theme_mod('ll_label_stats_data1_value')){?>
		<div class="stats-item">
			<span class="data"><?php echo get_theme_mod('ll_label_stats_data1_value');?></span>
			<span class="label"><?php echo get_theme_mod('ll_label_stats_data1_label');?></span>
		</div>
		<?php }?>
		<?php if(get_theme_mod('ll_label_stats_data2_value')){?>
		<div class="stats-item">
			<span class="data"><?php echo get_theme_mod('ll_label_stats_data2_value');?></span>
			<span class="label"><?php echo get_theme_mod('ll_label_stats_data2_label');?></span>
		</div>
		<?php }?>
		<?php if(get_theme_mod('ll_label_stats_data3_value')){?>
		<div class="stats-item">
			<span class="data"><?php echo get_theme_mod('ll_label_stats_data3_value');?></span>
			<span class="label"><?php echo get_theme_mod('ll_label_stats_data3_label');?></span>
		</div>
		<?php }?>
		<?php if(get_theme_mod('ll_label_stats_data4_value')){?>
		<div class="stats-item">
			<span class="data"><?php echo get_theme_mod('ll_label_stats_data4_value');?></span>
			<span class="label"><?php echo get_theme_mod('ll_label_stats_data4_label');?></span>
		</div>
		<?php }?>
	</div>
	<div class="ll-stats-actions">
		<a href="<?php echo get_theme_mod('ll_install_leyka_url');?>" class="btn btn-primary"><?php echo get_theme_mod('ll_label_install_leyka_caption');?></a>
		<a href="<?php echo $demo_zone_url;?>" class="btn btn-outline-primary"><?php echo get_theme_mod('ll_label_demo_access');?></a>
	</div>
</section>

<?php get_footer();