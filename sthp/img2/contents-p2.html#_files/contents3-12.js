$('.gazouwebsuku').hover(function(){
    $(this).children('.kabuse').stop().fadeToggle();
});
$('.gazouwebcamp').hover(function(){
    $(this).children('.kabuse').stop().fadeToggle();
});
$('.gazouwebcamp-mother').hover(function(){
    $(this).children('.kabuse').stop().fadeToggle();
});

// wow.jsを起動するコード
new WOW().init();
