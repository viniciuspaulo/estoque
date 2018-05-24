
$(document).ready(function(){
    $(".mask-cel").mask("(999) 99999-9999");
    $(".mask-cpf").mask("999.999.999-99");
    $('.mask-cnpj').mask("99.999.999/9999-99");

    $('.mask-money').mask('000.000.000.000.000,00', {reverse: true});
    $(".mask-money").change(function(){
        $("#value").html($(this).val().replace(/\D/g,''))
    })
});