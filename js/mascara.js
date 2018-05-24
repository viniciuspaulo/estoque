
$(document).ready(function(){
    $(".mask-cel").mask("(999) 99999-9999");
    $(".mask-cpf").mask("999.999.999-99");
    $('.mask-cnpj').mask("99.999.999/9999-99");

    var options = {
		onKeyPress : function(cpfcnpj, e, field, options) {
			var masks = ['000.000.000-000', '00.000.000/0000-00'];
			var mask = (cpfcnpj.length > 14) ? masks[1] : masks[0];
			$('.mask-cnpj-cpf').mask(mask, options);
		}
    };
    
    $('.mask-cnpj-cpf').mask('000.000.000-000', options);
      
    $('.mask-money').maskMoney({
        prefix: "R$:",
        decimal: ",",
        thousands: "."
    });
});