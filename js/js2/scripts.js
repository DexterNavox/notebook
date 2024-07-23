jQuery(function($) {
    var path = window.location.href; 
    // because the 'href' property of the DOM element is the absolute path
    console.log(path)
    $('ul a').each(function() {
    if (this.href === path) {
        $(this).addClass('active');
    }
    });
});
