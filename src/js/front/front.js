/* Scripts */

// mob menu
jQuery( document ).ready(function( $ ) {
	
	$('.ll-open-mob-menu-btn').click(function(){
		$('.site-header').toggleClass('ll-mob-menu-open');
	});

	$('.ll-close-mob-menu-btn').click(function(){
		$('.site-header').toggleClass('ll-mob-menu-open');
	});

}); //jQuery


// testm slider
jQuery( document ).ready(function( $ ) {

  $('.tstm-list').slick({
    infinite: true,
    arrows: false,
    slidesToShow: 2,
    slidesToScroll: 2,
    appendDots: $('#ll-tstm-nav'),
    dots: true,
    responsive: [{
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
    		slidesToScroll: 1,
        }
  	}]
  });

}); //jQuery


// orgs slider
jQuery( document ).ready(function( $ ) {
  var $orgs = $('#orgs_row_inner');
  var orgsCount = $orgs.find('.org-logo').length;
  var orgWidth = $orgs.find('.org-logo').width();
  var scrollto = orgWidth * Math.floor(orgsCount / 2) - Math.floor(orgWidth / 2);
  $orgs.closest('.orgs').animate({ scrollLeft:  scrollto}, 0);
}); //jQuery


// features list
jQuery( document ).ready(function( $ ) {
  var $fl = $('.leyka-features');
  var $nav = $fl.find('.features-list');
  var $navMobile = $fl.find('.nav-mobile');
  var $screen = $fl.find('.screen');  

  $nav.on('click', 'li', function(e){
    e.preventDefault();
    $nav.find('li').removeClass('active');
    $(this).addClass('active');

    $screen.find('img').removeClass('active');
    $screen.find('img').eq($(this).index()).addClass('active');
  });

  $navMobile.on('click', 'a', function(e){
    e.preventDefault();
    $navMobile.find('a').removeClass('active');
    $(this).addClass('active');

    $nav.find('li').removeClass('active');
    $nav.find('li').eq($(this).index()).addClass('active');

    $screen.find('img').removeClass('active');
    $screen.find('img').eq($(this).index()).addClass('active');
  });

}); //jQuery


// steps nav
jQuery( document ).ready(function( $ ) {
  var $fl = $('.main-steps');

  if(!$fl.length) {
    return;
  }

  var $navMobile = $fl.find('.nav-mobile');
  var $steps = $fl.find('.steps-list');  

  $navMobile.on('click', 'a', function(e){
    e.preventDefault();
    $navMobile.find('a').removeClass('active');
    $(this).addClass('active');

    $steps.find('.step-item').removeClass('active');
    $steps.find('.step-item').eq($(this).index()).addClass('active');
  });

}); //jQuery

// steps ui custom
jQuery( document ).ready(function( $ ) {
  var $line = $('#steps-connection-line');

  if($line.css('display') == 'none') {
    var $sidebar = $('.steps-sidebar-inner');

    $('.ll-content .post-content p').each(function(){
      var $iframe = $(this).find('iframe');
      if($iframe.length > 0) {
        $iframe.parent().after($sidebar);
        return false;
      }
    });
    
  }
}); //jQuery


// faq
jQuery( document ).ready(function( $ ) {
  var $faqList = $('.leyka-faq-list');
  $faqList.on('click', '.btn-expand', function(e){
    e.preventDefault();
    $(this).closest('li').addClass('expanded');
  });
}); //jQuery


// prices
jQuery( document ).ready(function( $ ) {
  var $pricesInfo = $('#ll-prices-info-page-content');
  var $pricesSubmitOrderForm = $('#ll-prices-form-page-content');

  $pricesSubmitOrderForm.find('.ll-go-back').click(function(e){
    e.preventDefault();
    $pricesInfo.show();
    $pricesSubmitOrderForm.hide();
  });

  $('.ll-open-make-order-form').click(function(e){
    e.preventDefault();
    $pricesInfo.hide();
    $pricesSubmitOrderForm.show();
  });

}); //jQuery

// orgs page
jQuery( document ).ready(function( $ ) {
  var $orgs = $('#orgs_items_container');
  var $loadMoreLink = $('#show_more_orgs_link');

  $loadMoreLink.on('click', function(e){
    e.preventDefault();

    var page = $orgs.data('last_page');
    if(!page) {
      page = 1;
    }
    page = parseInt(page) + 1;

    $.get( leykaSiteFrontend.ajaxurl, { action: "ll_load_more_orgs", paged: page } )
      .done(function(content){
        console.log(content);
        $orgs.data('last_page', page);
        if(content) {
          $orgs.append(content);
        }
        else {
          $loadMoreLink.parent().hide();
        }
      });
  });

  var $orgsListSection = $('#ll-orgs-list-page-content');
  var $formSection = $('#ll-new-org-form-page-content');

  $formSection.find('.ll-go-back').click(function(e){
    e.preventDefault();
    $orgsListSection.show();
    $formSection.hide();
  });

  $orgsListSection.find('.ll-add-your-org-button').click(function(e){
    e.preventDefault();
    $orgsListSection.hide();
    $formSection.show();
  });

}); //jQuery

// custom input
jQuery( document ).ready(function( $ ) {
  $('.ll-custom-file-input').on('click', function(){
    $(this).parent().find('input[type="file"]').trigger('click');
  });
});

// docs
jQuery( document ).ready(function( $ ) {
  $('.docs-categories-mobile-toggle').on('click', function(){
    $(this).closest('.ll-sidebar').find('.docs-categories').toggle();
    $(this).toggleClass('open');
  });
});
