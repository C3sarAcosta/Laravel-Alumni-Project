      
$('form').submit(function(){
      $('input[type=submit]', this).attr('disabled', 'disabled');
});   
   
$(document).on('click', '#help_zipcode', function(e){
    Swal.fire({
    title: '<strong>Código postal</strong>',
    icon: 'info',
    html:
    `<p style="text-align:justify;">Al escribir tu código postal si esperas unos segundos los campos 
        de ciudad, municipio, estado se llenarán automáticamente, además de habilitar opciones para que puedas elegir tu colonia correctamente, en caso que la base de datos no exista el código no se llenará nada y tendrás que llenarlo manualmente.</p>`,
    showCloseButton: true,
    showCancelButton: false,
    focusConfirm: false,
    confirmButtonText:
    '<i class="fa fa-thumbs-up"></i> Me sirve la información!',
    confirmButtonAriaLabel: 'Thumbs up, great!',
    })
});

$(document).on('click', '#help_zipcode', function (e) {
    Swal.fire({
        title: '<strong>Código postal</strong>',
        icon: 'info',
        html: `<p style="text-align:justify;">Al escribir tu código postal si esperas unos segundos los campos 
                de ciudad, municipio, estado se llenarán automáticamente, además de habilitar opciones para que puedas elegir tu colonia correctamente, en caso que la base de datos no exista el código no se llenará nada y tendrás que llenarlo manualmente.</p>`,
        showCloseButton: true,
        showCancelButton: false,
        focusConfirm: false,
        confirmButtonText: '<i class="fa fa-thumbs-up"></i> Me sirve la información!',
        confirmButtonAriaLabel: 'Thumbs up, great!',
    })
});