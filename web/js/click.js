/* Эта херь работает после обновления хеша
$(".ui-front, .ui-menu-item-wrapper, .ui-state-active").click(function(e) {
    console.log('EEEeee', e.target.className);
     $('input').blur();
});
*/

document.addEventListener("click", function(event) { // (1)
    console.log("Привет от " + event.target.tagName + ' ' + event.target.className  );
    if (event.target.className == 'ui-menu-item-wrapper'){
        console.log('if!');
        $('input').blur();
    }
});