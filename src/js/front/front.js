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
    if(!$(this).data('scroll-to-ask')) {
      console.log('preventDefault...');
      e.preventDefault();
    }

    $(this).closest('li').addClass('expanded');

    var $namedAsk = $faqList.find('a[name='+$(this).data('ask')+']');
    if(!$(this).data('scroll-to-ask')) {
      $namedAsk.attr('name', '');
    }
    window.location.hash = '#' + $(this).data('ask');
    $namedAsk.attr('name', $(this).data('ask'));

    if($(this).data('scroll-to-ask')) {
      $(this).data('scroll-to-ask', '');
    }
  });

  if(window.location.hash) {
    var $ask = $('#expand-' + window.location.hash.substr(1));
    $ask.data('scroll-to-ask', '1');
    $ask.trigger('click');
  }
}); //jQuery


// prices
jQuery( document ).ready(function( $ ) {
  var $pricesInfo = $('#ll-prices-info-page-content');
  var $pricesSubmitOrderForm = $('#ll-prices-form-page-content');

  $pricesSubmitOrderForm.find('.ll-go-back').click(function(e){
    e.preventDefault();
    $pricesInfo.show();
    $pricesSubmitOrderForm.hide();
    window.location.hash = '';
  });

  $('.price-selector').change(function(e){
    e.preventDefault();
    $(this).siblings('.text-price').val($(this).find('option:selected').text());
  });

  $('.ll-open-make-order-form').click(function(e){
    e.preventDefault();
    $pricesInfo.hide();
    $pricesSubmitOrderForm.show();
    var priceName = $(this).data('price');
    $pricesSubmitOrderForm.find('.price-selector').val(priceName).change();
    window.location.hash = '#make-order';
  });

  if(window.location.hash) {
    var hashParam = window.location.hash.substr(1);
    if(hashParam == 'make-order') {
      $('.ll-open-make-order-form').first().trigger('click');
    }
  }

}); //jQuery

// orgs page
jQuery( document ).ready(function( $ ) {
  var $orgs = $('#orgs_items_container');
  var $loadMoreLink = $('#show_more_orgs_link');
  var orgs_list_state = {page: 2, category_id: null};

  function ll_load_orgs(params) {
    var ajax_params = {action: "ll_load_orgs"};
    ajax_params = Object.assign(ajax_params, params);

    $.get( leykaSiteFrontend.ajaxurl, ajax_params)
      .done(function(content){
        if(ajax_params.page > 1) {
          $orgs.append(content);
        }
        else {
          $orgs.html(content);
        }

        if(content) {
          $loadMoreLink.parent().show();
        }
        else {
          $loadMoreLink.parent().hide();
        }

        orgs_list_state.page += 1;
      });
  }

  // load more
  $loadMoreLink.on('click', function(e){
    e.preventDefault();
    ll_load_orgs(orgs_list_state);
  });

  // filter by category
  $('.ll-filter-orgs-by-category').on('click', function(e){
    e.preventDefault();
    orgs_list_state.category_id = $(this).data('category_id');
    orgs_list_state.page = 1;
    ll_load_orgs(orgs_list_state);
    $(this).parent().find('a.active').removeClass('active');
    $(this).addClass('active');
  });

  var $orgsListSection = $('#ll-orgs-list-page-content');
  var $formSection = $('#ll-new-org-form-page-content');

  $formSection.find('.ll-go-back').click(function(e){
    e.preventDefault();
    $orgsListSection.show();
    $formSection.hide();
    window.location.hash = '';
  });

  $orgsListSection.find('.ll-add-your-org-button').click(function(e){
    e.preventDefault();
    $orgsListSection.hide();
    $formSection.show();
    window.location.hash = '#add-org';
  });

  if(window.location.hash) {
    var hashParam = window.location.hash.substr(1);
    if(hashParam == 'add-org') {
      $('.ll-add-your-org-button').first().trigger('click');
    }
  }
  
}); //jQuery

// custom input
jQuery( document ).ready(function( $ ) {
  $('.ll-custom-file-input').on('click', function(){
    $(this).parent().find('input[type="file"]').trigger('click');
  });

  $('input[type="file"].ll-file-input-to-customize').change(function(e){
    var fileName = e.target.files[0].name;
    $('.ll-custom-file-input label').html(fileName);
  });
});

// docs
jQuery( document ).ready(function( $ ) {
  $('.docs-categories-mobile-toggle').on('click', function(){
    $(this).closest('.ll-sidebar').find('.docs-categories').toggle();
    $(this).toggleClass('open');
  });
});

// auto height of iframe for videos in steps
jQuery( document ).ready(function( $ ) {
  $('.post-content > p:first-child iframe').each(function(i, el){
    $(el).closest('.post-content > p:first-child').addClass('ll-iframe-wrapper');
  });
});
