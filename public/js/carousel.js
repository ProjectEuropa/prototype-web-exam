$('#main-carousel').on('slide.bs.carousel', function () {
    // キャプションを隠す
    $('#main-carousel .carousel-caption').hide();
});
// スライドが停止したら発動
$('#main-carousel').on('slid.bs.carousel', function () {
    // キャプションをフェードインさせる
    $('#main-carousel .carousel-caption').fadeIn();
});