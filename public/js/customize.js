/* added and modified by sebastian */
$(document).ready(function(){
    

    /* bootstrap datetimepicker 
    */
    $('#datetimepicker10').datetimepicker({
        locale: 'ru',
        minDate: 'now',
        useCurrent: false,
        format: 'DD-MM-YYYY HH:mm',
        allowInputToggle: true,
        sideBySide: true,
    }); //*/

    //onclick for menus - it shows chosen articles
    $('div > div > article').hide();
	$('div > div > menu > li').click(function(){
		$('div > div > menu > li').removeClass('active');
		$(this).addClass('active');
		$('div > div > article').hide();
		$('div > div > article:nth-child('+($(this).index()+1)+')').slideToggle(500);
	});
	/* onclick add categoty
	$('#add_faq_part').click(function(){
		n=n+1;
		$('.contactus-faq div menu').append('<li id="faq_part_'+3+'" class="faq_menu">'+$('#add_faq_part_name').val()+'</li>');
		//$('.contactus-faq:last-child').append('<article id="faq_part_'+n+'_article"><form><textarea placeholder="Текст категории"></textarea><input type="submit" value="ЗАПОМНИТЬ"></form></article>');
	});
	$('#del_faq_part').click(function(){
		n=n-1;
		$('.faq_menu').last().remove();
	});*/
});