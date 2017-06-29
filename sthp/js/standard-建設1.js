// $('.gazouwebsuku').hover(function(){
//     $(this).children('.kabuse').stop().fadeToggle();
// });
// $('.gazouwebcamp').hover(function(){
//     $(this).children('.kabuse').stop().fadeToggle();
// });
// $('.gazouwebcamp-mother').hover(function(){
//     $(this).children('.kabuse').stop().fadeToggle();
// });

// wow.jsを起動するコード
new WOW().init();

$(function() {
$('.kyujin').hover(function() {
    $(this).css('background', '#FFD5EC');
}, function() {
    $(this).css('background', '');
});
});
