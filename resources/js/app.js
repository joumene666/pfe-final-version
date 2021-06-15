require('./bootstrap');

require('alpinejs');

$(document).ready(function(){
    $('#btnprn').click(function(){
       window.print();
       return false;
    });
    });
