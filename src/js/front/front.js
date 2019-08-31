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


// faq
jQuery( document ).ready(function( $ ) {
  var $faqList = $('.leyka-faq-list');
  $faqList.on('click', '.btn-expand', function(e){
    e.preventDefault();
    $(this).closest('li').addClass('expanded');
  });
}); //jQuery
