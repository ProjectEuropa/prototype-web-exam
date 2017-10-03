$('#main-carousel').on('slide.bs.carousel', function () {
    // hide caption
    $('#main-carousel .carousel-caption').hide();
});
// When slide stop, this function start.
$('#main-carousel').on('slid.bs.carousel', function () {
    // fadein caption
    $('#main-carousel .carousel-caption').fadeIn();
});