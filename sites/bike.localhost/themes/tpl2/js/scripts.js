  jQuery.noConflict();

if(typeof(window.$) === 'undefined') {
    window.$ = jQuery;
}

$(document).ready(function(){

    //alert($(window).width());

  	// ADD ACTIVE CLASS TO FIRST SLIDESHOW CONTROL CIRCLE

  	$('#views_slideshow_pager_field_item_bottom_homepage_slideshow-block_0').addClass('active');


    // EQUALIZE THE HEIGHTS OF THE HOMEPAGE CONTENT BLOCKS

    function equalHomeBlocksHeight(elms, adHeight) {
      var homeBlocks = elms; // TARGET ALL HOMEPAGE BLOCKS
      var heigthArray = new Array(); // INITIALIZE ARRAY
      var totHeight;

      homeBlocks.each(function(i){ // LOOP THROUGH ALL HOMEPAGE CONTENT BLOGS
          heigthArray[i] = $(this).height(); // ADD EACH BLOCKS HEIGHT TO THE ARRAY
          heigthArray = heigthArray.sort().reverse(); // SORT HEIGHTS IN DESCENDING ORDER
      });

      totHeight = parseInt(heigthArray[0]) + parseInt(adHeight);

      homeBlocks.css({
        minHeight : 'auto', // Remove min-height attribute set in CSS
        height : totHeight + 'px' // APPLY LARGEST HEIGHT VALUE - FIRST ELEMENT IN ARRAY - TO HOME BLOCKS
      });
    }

  	// ADD OPTION/SETTINGS IMAGES TO HEADER AUDIENCE AND FOOTER DEPARTMENT AREAS. 

    $('#block-menu-block-1 .block-inner .content').prepend('<div id="audience_menu_btn"><a href="#"></a></div>');
    $('#region-postscript-fourth .block-inner').append('<a href="#" id="dept_menu_btn" />');
       
    $(window).load(function(){

      if($(window).width() >= 720) {
        //equalHomeBlocksHeight($('.front #zone-content .panel-pane'), 0);
        equalHomeBlocksHeight($('#region-preface-second .block'), 50);
      }
      
      // TOGGLE MOBILE VERSION OF AUDIENCE MENU VIA OPTIONS ICON 

      $('#audience_menu_btn').click(function(e){
        e.preventDefault();
        $('#templesearch .form-actions').removeClass('highlight_button');
        $('#templesearch .form-item-search-block-form').removeClass('show_hide_elm');
        $(this).toggleClass('highlight_button');
        $('#block-menu-block-1 ul').toggleClass('show_hide_elm');
      });

      // TOGGLE MOBILE VERSION OF DEPARTMENTS MENU VIA OPTIONS ICON

      $('#dept_menu_btn').click(function(e){
          e.preventDefault();
          $('#region-postscript-fourth ul').toggleClass('show_hide_elm');
      });

      // TOGGLE SEARCH BAR VIA THE MAGNIFY ICON 

      $('#templesearch .form-actions label').click(function(e){
         e.preventDefault();
         $('#audience_menu_btn').removeClass('highlight_button');
         $('#block-menu-block-1 ul').removeClass('show_hide_elm');
         $(this).parent().toggleClass('highlight_button');
         $('#templesearch .form-item-search-block-form').toggleClass('show_hide_elm'); 
       });

    });

    var rtime = new Date(1, 1, 2000, 12,00,00);
    var timeout = false;
    var delta = 200;

    $(window).resize(function(){
      $('#region-preface-second .block, .front #zone-content .panel-pane').removeAttr('style');
      if($(window).width() > 720) {
        //equalHomeBlocksHeight($('.front #zone-content .panel-pane'), 0);
        equalHomeBlocksHeight($('#region-preface-second .block'), 50);
      }
      rtime = new Date();
      if (timeout === false) {
        timeout = true;
        setTimeout(resizeend, delta);
        $('#templesearch .form-actions').removeClass('highlight_button');
        $('#templesearch .form-item-search-block-form').removeClass('show_hide_elm');
        $('#audience_menu_btn').removeClass('highlight_button');
        $('##region-postscript-fourth ul, #block-menu-menu-navigation-utility ul').removeClass('show_hide_elm');
      }
    });

    function resizeend() {
      if (new Date() - rtime < delta) {
        setTimeout(resizeend, delta);
      } else {
        timeout = false;
      }
    }

});
