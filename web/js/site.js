
$("article").on({
    mouseenter: function () {
        //stuff to do on mouse enter
        $infoBox = $('.info-box').html();
        $text = $(this).find('.text').html();
        $('.info-box').html($text);
    },
    mouseleave: function () {
        //stuff to do on mouse leave
         $('.info-box').html($infoBox);
    }
});

$('article').on('click', function(){
	$(this).toggleClass('chosen');
	$chosen = $(this).find('input[name="chosen[]"]');
	$chosen.prop("checked", !$chosen.prop("checked"));
})

$('#name').on("focusout", function() {
    var name = this.value;
    var mailBody = $('textarea').val();
    var lines = mailBody.split('\n');
    
    lines[lines.length-1] = name;

    $('textarea').val(lines.join('\n'));
});


/**
 * Validate email function with regualr expression
 * 
 * If email isn't valid then return false
 * 
 * @param email
 * @return Boolean
 */
function validateEmail(email){
    var emailReg = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    var valid = emailReg.test(email);

    if(!valid) {
        return false;
    } else {
        return true;
    }
}