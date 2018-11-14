
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

const $ = require("jquery");
window.jQuery = $;

require("jquery-mask-plugin");
require("jquery-validation");

window.setMask = function(selector, type){

    if($(selector).length == 0){
        console.log('Não foi possível iniciar a máscara de acordo com o seletor passado na função');
        return false;
    }

    if(!type){
        console.log('Não foi informado o type da máscara no parâmetro');
        return false;
    }

    switch(type){

        case 'date':
            // Caso o valor digitado não esteja de acordo com a máscara aplicada, limpa o campo
            $(selector).on('blur', event => event.target.value.replace(/\D/g, '').length < 8 ? event.target.value = '' : event.target.value);

            $(selector).mask('00/00/0000');
            break;

        case 'cpf':
            // Caso o valor digitado não esteja de acordo com a máscara aplicada, limpa o campo
            $(selector).on('blur', event => event.target.value.replace(/\D/g, '').length < 11 ? event.target.value = '' : event.target.value);

            $(selector).mask('000.000.000-00');
            break;

        case 'cnpj':
            // Caso o valor digitado não esteja de acordo com a máscara aplicada, limpa o campo
            $(selector).on('blur', event => event.target.value.replace(/\D/g, '').length < 11 ? event.target.value = '' : event.target.value);

            $(selector).mask('00.000.000/0000-00');
            break;

        case 'cep':
            // Caso o valor digitado não esteja de acordo com a máscara aplicada, limpa o campo
            $(selector).on('blur', event => event.target.value.replace(/\D/g, '').length < 8 ? event.target.value = '' : event.target.value);

            $(selector).mask('00000-000');
            break;

        default:
            console.log('O type da máscara passado por parâmetro é inválido');
    }


    /*
   * Translated default messages for the jQuery validation plugin.
   * Locale: PT_BR
   */
    $.extend($.validator.messages, {
        required: "Este campo &eacute; requerido.",
        remote: "Por favor, corrija este campo.",
        email: "Por favor, forne&ccedil;a um endere&ccedil;o eletr&ocirc;nico v&aacute;lido.",
        url: "Por favor, forne&ccedil;a uma URL v&aacute;lida.",
        date: "Por favor, forne&ccedil;a uma data v&aacute;lida.",
        dateISO: "Por favor, forne&ccedil;a uma data v&aacute;lida (ISO).",
        number: "Por favor, forne&ccedil;a um n&uacute;mero v&aacute;lido.",
        digits: "Por favor, forne&ccedil;a somente d&iacute;gitos.",
        creditcard: "Por favor, forne&ccedil;a um cart&atilde;o de cr&eacute;dito v&aacute;lido.",
        equalTo: "Por favor, forne&ccedil;a o mesmo valor novamente.",
        accept: "Por favor, forne&ccedil;a um valor com uma extens&atilde;o v&aacute;lida.",
        maxlength: jQuery.validator.format("Por favor, forne&ccedil;a n&atilde;o mais que {0} caracteres."),
        minlength: jQuery.validator.format("Por favor, forne&ccedil;a ao menos {0} caracteres."),
        rangelength: jQuery.validator.format("Por favor, forne&ccedil;a um valor entre {0} e {1} caracteres de comprimento."),
        range: jQuery.validator.format("Por favor, forne&ccedil;a um valor entre {0} e {1}."),
        max: jQuery.validator.format("Por favor, forne&ccedil;a um valor menor ou igual a {0}."),
        min: jQuery.validator.format("Por favor, forne&ccedil;a um valor maior ou igual a {0}.")
    });
};