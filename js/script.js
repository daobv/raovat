jQuery(function () {
    if ($('.carousel').size()) {
        // invoke the carousel
        $('.carousel').carousel({
            interval: 2000
        });
    }
});