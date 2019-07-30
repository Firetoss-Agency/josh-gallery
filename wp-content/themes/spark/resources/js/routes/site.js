export default {
  init() {

    // Add .loaded class for a consistent class to base loading off of
    $(window).on('load', () => $('body').addClass('loaded'))
    
  }
};
