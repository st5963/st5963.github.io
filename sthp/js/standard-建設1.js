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

$(function(){
	var start = "touchstart";
	var end   = "touchend";
$(".kyujin").bind(start,function(){
	$(this).addClass("touchstart");
	});
$(".kyujin").bind(end,function(){
	$(this).removeClass("touchstart");
	});
});