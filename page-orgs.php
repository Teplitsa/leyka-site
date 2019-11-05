<?php
/**
 * The orgs template file.
 */

$page_templates = new LL_Page_Templates();
$orgs_service = new LL_Orgs_Service();
$orgs_templates = new LL_Orgs_Templates();
$orgs_categories = $orgs_service->get_categories();

$submit_status = !empty($_REQUEST['submit_status']) ? $_REQUEST['submit_status'] : null;
$submit_message = !empty($_REQUEST['submit_message']) ? $_REQUEST['submit_message'] : null;
$form_submitted_class = $submit_status ? "form-submitted" : "";

get_header();?>

<?php $page_templates->show_page_header(get_post());?>

<div class="ll-orgs-list-page-content <?php echo $form_submitted_class;?>" id="ll-orgs-list-page-content">

    <div class="ll-page-content container">
    	<div class="ll-content ll-content-fuild">
    		<div>
        		<nav>
        			<div class="links">
            			<a href="#" class="ll-filter-orgs-by-category active" data-category_id=""><?php echo get_theme_mod('ll_label_all_organizations');?></a>
                		<?php foreach($orgs_categories as $term){?>
                        	<a href="#" class="ll-filter-orgs-by-category" data-category_id="<?php echo $term->term_id?>"><?php echo $term->name?></a>
                		<?php }?>
        			</div>
        			<a href="#" class="btn btn-primary ll-add-your-org-button"><?php echo get_theme_mod('ll_label_add_your_org');?></a>
        		</nav>
        		<div class="orgs-list-wrapper">
                	<div class="orgs-list" id="orgs_items_container">
                		<?php foreach($orgs_service->get_page_list() as $post){?>
                			<?php $orgs_templates->show_list_item($post);?>
                		<?php }?>
                	</div>
        		</div>
            	<div class="show-more-link">
            		<a href="#" id="show_more_orgs_link"><?php echo get_theme_mod('ll_label_show_more_orgs');?></a>
            	</div>
        	</div>
    	</div>
    	
    	<svg class="icon-drop drop1 color004"><use xlink:href="#icon-drop-small-004" /></svg>
    	<svg class="icon-drop drop2 color006"><use xlink:href="#icon-drop-lg-002" /></svg>
    </div>
    
	<?php get_template_part( 'template-parts/section-howtostart' );?>

</div>

<div class="ll-new-org-form-page-content <?php echo $form_submitted_class;?> submitted-<?php echo $submit_status;?>" id="ll-new-org-form-page-content">
	<section class="ll-form-section container">
		<div class="ll-form-wrapper">
    		<?php if($submit_status) {?>
    			<div class="alert alert-<?php echo esc_html($submit_status);?> ll-form-message"><?php echo get_theme_mod($submit_message);?></div>
    		<?php }?>
		
    		<form action="<?php echo add_query_arg( array('action' => 'll_submit_org'), admin_url('admin-post.php') );?>" method="post" enctype="multipart/form-data">
    			<?php wp_nonce_field('ll_submit_org', 'nonce');?>
                <div class="form-group">
                    <select class="form-control" name="org_category" required>
                        <option value=""><?php echo get_theme_mod('ll_label_orgs_what_category');?></option>
                		<?php foreach($orgs_categories as $term){?>
                        	<option value="<?php echo $term->term_id?>"><?php echo $term->name?></option>
                		<?php }?>
                    </select>
                </div>    		
                <div class="form-group">
                    <input type="text" class="form-control" name="title" placeholder="Название организации" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="url" placeholder="Адрес вашего ресурса" required>
                </div>
                <div class="form-group">
                    <input type="file" name="logo" class="ll-file-input-to-customize">
                    <div class="ll-custom-file-input">
                    	<button type="button"><?php echo get_theme_mod('ll_label_orgs_upload_file');?></button>
                    	<label>
                    		<?php echo nl2br(get_theme_mod('ll_label_upload_org_logo_file_details'));?>
                		</label>
                    </div>
                </div>
                <div class="form-group">
                	<textarea class="form-control" name="description" rows="3" placeholder="Краткое описание деятельности" required></textarea>
                </div>
                <div class="ll-form-actions">
                    <button type="submit" class="btn btn-primary"><?php echo get_theme_mod('ll_label_orgs_submit_new');?></button>
                    <a href="#" class="ll-go-back"><?php echo get_theme_mod('ll_label_back_to_orgs_list_caption');?></a>
                </div>		
    		</form>
		</div>
		
    	<svg class="leyka-pic"><use xlink:href="#pic-skater-sun-mountains" /></svg>
    	<svg class="icon-drop drop1 color004"><use xlink:href="#icon-drop-002" /></svg>
    	<svg class="icon-drop drop2 color004"><use xlink:href="#icon-drop-small-003" /></svg>
	</section>
</div>

<?php get_footer();