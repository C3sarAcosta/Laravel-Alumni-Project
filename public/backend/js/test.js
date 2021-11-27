function validateSubmit() {
    if ($("#do_for_living").val().includes('ESTUDIA') && !$("#do_for_living").val().includes('NO')) {
        if ($("#speciality").val() == null || $("#speciality").val() == '') {
            toastr.error('Por favor mencione su especialidad, es obligatorio si selecciona que estudia.');
            return false;
        }
        if ($("#school").val() == null || $("#school").val() == '') {
            toastr.error('Por favor mencione su escuela, es obligatorio si selecciona que estudia.');
            return false;
        }
    }

    if ($("#do_for_living").val().includes('TRABAJA') && !$("#do_for_living").val().includes('NO')) {
        if ($("#long_take_job").val() == null || $("#long_take_job").val() == '') {
            toastr.error('Por favor mencione el tiempo transcurrido, es obligatorio si selecciona que trabaja.');
            return false;
        }
        if ($("#hear_about").val() == null || $("#hear_about").val() == '') {
            toastr.error('Por favor mencione el modo de obtención del empleo, es obligatorio si selecciona que trabaja.');
            return false;
        }
        if ($("#language_most_spoken").val() == null || $("#language_most_spoken").val() == '') {
            toastr.error('Por favor mencione el idioma utilizado, es obligatorio si selecciona que trabaja.');
            return false;
        }
        if ($("#seniority").val() == null || $("#seniority").val() == '') {
            toastr.error('Por favor mencione la antigüedad, es obligatorio si selecciona que trabaja.');
            return false;
        }
        if ($("#year").val() == null || $("#year").val() == '') {
            toastr.error('Por favor mencione el año de ingreso, es obligatorio si selecciona que trabaja.');
            return false;
        }
        if ($("#salary").val() == null || $("#salary").val() == '') {
            toastr.error('Por favor mencione el salario, es obligatorio si selecciona que trabaja.');
            return false;
        }
        if ($("#management_level").val() == null || $("#management_level").val() == '') {
            toastr.error('Por favor mencione el nivel jerárgico, es obligatorio si selecciona que trabaja.');
            return false;
        }
        if ($("#job_condition").val() == null || $("#job_condition").val() == '') {
            toastr.error('Por favor mencione la condición de trabajo, es obligatorio si selecciona que trabaja.');
            return false;
        }
        if ($("#job_relationship").val() == null || $("#job_relationship").val() == '') {
            toastr.error('Por favor mencione la relación del trabajo con su área de formación, es obligatorio si selecciona que trabaja.');
            return false;
        }
        if ($("#business_name").val() == null || $("#business_name").val() == '') {
            toastr.error('Por favor mencione la razón social de la empresa, es obligatorio si selecciona que trabaja.');
            return false;
        }
        if ($("#business_activity").val() == null || $("#business_activity").val() == '') {
            toastr.error('Por favor mencione giro o actividad principal, es obligatorio si selecciona que trabaja.');
            return false;
        }
        if ($("#address").val() == null || $("#address").val() == '') {
            toastr.error('Por favor mencione el domicilio, es obligatorio si selecciona que trabaja.');
            return false;
        }
        if ($("#zip").val() == null || $("#zip").val() == '') {
            toastr.error('Por favor mencione el código postal, es obligatorio si selecciona que trabaja.');
            return false;
        }
        if ($("#suburb").val() == null || $("#suburb").val() == '') {
            toastr.error('Por favor mencione la colonia, es obligatorio si selecciona que trabaja.');
            return false;
        }
        if ($("#state").val() == null || $("#state").val() == '') {
            toastr.error('Por favor mencione el estado, es obligatorio si selecciona que trabaja.');
            return false;
        }
        if ($("#city").val() == null || $("#city").val() == '') {
            toastr.error('Por favor mencione la ciudad, es obligatorio si selecciona que trabaja.');
            return false;
        }
        if ($("#municipality").val() == null || $("#municipality").val() == '') {
            toastr.error('Por favor mencione el municipio, es obligatorio si selecciona que trabaja.');
            return false;
        }
        if ($("#boss_email").val() == null || $("#boss_email").val() == '') {
            toastr.error('Por favor mencione el correo de su jefe, es obligatorio si selecciona que trabaja.');
            return false;
        }
        if ($("#business_structure").val() == null || $("#business_structure").val() == '') {
            toastr.error('Por favor mencione la estructura de la empresa u organismo, es obligatorio si selecciona que trabaja.');
            return false;
        }
        if ($("#company_size").val() == null || $("#company_size").val() == '') {
            toastr.error('Por favor mencione el tamaño de la empresa u organismo, es obligatorio si selecciona que trabaja.');
            return false;
        }
        if ($("#business_activity_selector").val() == null || $("#business_activity_selector").val() == '') {
            toastr.error('Por favor mencione la actividad económica de la empresa u organismo, es obligatorio si selecciona que trabaja.');
            return false;
        }
    }
    return true;
}
