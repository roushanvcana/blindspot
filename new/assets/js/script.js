var $header_top = $('.header-top');
var $nav = $('nav');

// fullpage customization
$('.full-page').fullpage({
	 sectionsColor: ['#0e1519', '#8ed3e1', '#F2AE72', '#c5c5c5', '#B8B89F', '#ffffff', '#000000'],
 // sectionsColor: ['#0e1519', '#348899', '#F2AE72', '#5C832F', '#B8B89F'],
  sectionSelector: '.vertical-scrolling',
  //slideSelector: '.horizontal-scrolling',
  //navigation: true,
 // slidesNavigation: true,
 // controlArrows: false,
 // anchors: ['firstSection', 'secondSection', 'thirdSection', 'fourthSection', 'fifthSection'],
 // menu: '#menu',

  afterLoad: function(anchorLink, index) {
    $header_top.css('background', 'rgba(0, 47, 77, .3)');
    $nav.css('background', 'rgba(0, 47, 77, .25)');
    if (index == 10) {
        $('#fp-nav').hide();
      }
  },

  onLeave: function(index, nextIndex, direction) {
    if(index == 5) {
      $('#fp-nav').show();
    }
  },

  afterSlideLoad: function( anchorLink, index, slideAnchor, slideIndex) {
    if(anchorLink == 'fifthSection' && slideIndex == 1) {
      $.fn.fullpage.setAllowScrolling(false, 'up');
      $header_top.css('background', 'transparent');
      $nav.css('background', 'transparent');
      $(this).css('background', '#374140');
      $(this).find('h2').css('color', 'white');
      $(this).find('h3').css('color', 'white');
      $(this).find('p').css(
        {
          'color': '#DC3522',
          'opacity': 1,
          'transform': 'translateY(0)'
        }
      );
    }
  },

  onSlideLeave: function( anchorLink, index, slideIndex, direction) {
    if(anchorLink == 'fifthSection' && slideIndex == 1) {
      $.fn.fullpage.setAllowScrolling(true, 'up');
      $header_top.css('background', 'rgba(0, 47, 77, .3)');
      $nav.css('background', 'rgba(0, 47, 77, .25)');
    }
  } 
});