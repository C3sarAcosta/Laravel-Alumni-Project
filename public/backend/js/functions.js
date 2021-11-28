//Survey One Functions
function getZipCode() {
    const xhr = new XMLHttpRequest();
    var zipCode = document.getElementById("zip").value;
    xhr.addEventListener("load", onRequestHandler);
    xhr.open("GET", `https://apis.forcsec.com/api/codigos-postales/20211025-a631651941e45da8/${zipCode}`);
    xhr.send();
}

function onRequestHandler() {
    if (this.status == 200) {
        const data = JSON.parse(this.response);
        var suburb = data["data"]["asentamientos"];
        var state = $("#state");
        var city = $("#city");
        var municipality = $("#municipality");

        $("#suburb_selector")
            .empty()
            .append(`<option value="" selected="" disabled="">Selecciona una colonia</option>`);

        if (data["data"]["estado"] != undefined) {
            $("#suburb").val("");
            state.val(data["data"]["estado"]);
            city.val(data["data"]["municipio"]);
            municipality.val(data["data"]["municipio"]);

            $("#suburb_selector").css("display", "inline");
            suburb.forEach(function (data) {
                var option = new Option(data["nombre"], data["nombre"]);
                $("#suburb_selector").append(option);
            });
        } else {
            state.val("");
            city.val("");
            municipality.val("");
            $("#suburb").val("");
        }
    }
}

function onChangeSuburb() {
    var value = $("#suburb_selector").val();
    $("#suburb").val(value);
}

$(".minus").click(function () {
    var $input = $(this).parent().find("input");
    var count = parseInt($input.val()) - 10;
    count = count < 0 ? 0 : count;
    $input.val(count);
    $input.change();
    return false;
});

$(".plus").click(function () {
    var $input = $(this).parent().find("input");
    var value = parseInt($input.val());

    if (value >= 100) return false;

    $input.val(parseInt($input.val()) + 10);
    $input.change();
    return false;
});

flatpickr("input[type=date]", {});
$(".yearpicker").yearpicker({
    startYear: 1990,
    endYear: new Date().getFullYear(),
});


//Survey Five and Six
function changeSelect() {
    var value_course = $("#courses_selector").val();
    var value_master = $("#master_selector").val();
    var value_organization = $("#organization_selector").val();
    var value_agency = $("#agency_selector").val();
    var value_association = $("#association_selector").val();

    value_course == "SÍ" ? $("#courses").removeAttr("disabled") : $("#courses").attr("disabled", "");
    value_master == "SÍ" ? $("#master").removeAttr("disabled") : $("#master").attr("disabled", "");
    value_organization == "SÍ" ? $("#organization").removeAttr("disabled") : $("#organization").attr("disabled", "");
    value_agency == "SÍ" ? $("#agency").removeAttr("disabled") : $("#agency").attr("disabled", "");
    value_association == "SÍ" ? $("#association").removeAttr("disabled") : $("#association").attr("disabled", "")

}

//Only numbers input
function ValidateNumbers(e) {
    if (e.keyCode < 45 || e.keyCode > 57)
        e.returnValue = false;
}

function WorkAndStudy(val) {
    if ((val.includes('ESTUDIA') || val.includes('TRABAJA')) && !val.includes('NO')) {
        $("#saveRow").addClass("d-flex justify-content-sm-center");
        $("#cancelRow").addClass("d-flex justify-content-sm-center");

        val.includes('ESTUDIA') ? $("#hr1").css("display", "flex") : $("#hr1").css("display", "none");
        val.includes('ESTUDIA') ? $("#study_row").css("display", "flex") : $("#study_row").css("display", "none");
        val.includes('TRABAJA') ? $("#hr2").css("display", "flex") : $("#hr2").css("display", "none");
        val.includes('TRABAJA') ? $("#work_row").css("display", "flex") : $("#work_row").css("display", "none");

    } else {
        $("#hr1").css("display", "none");
        $("#study_row").css("display", "none");
        $("#hr2").css("display", "none");
        $("#work_row").css("display", "none");
        $("#saveRow").removeClass("d-flex justify-content-sm-center");
        $("#cancelRow").removeClass("d-flex justify-content-sm-center");
    }

}

//Survey Three functions
function changeActivity() {
    var val = $("#do_for_living").val();
    if ((val.includes('ESTUDIA') || val.includes('TRABAJA')) && !val.includes('NO')) {
        $("#clean").click();
        $("#saveRow").addClass("d-flex justify-content-sm-center");
        $("#cancelRow").addClass("d-flex justify-content-sm-center");

        val.includes('ESTUDIA') ? $("#hr1").css("display", "flex") : $("#hr1").css("display", "none");
        val.includes('ESTUDIA') ? $("#study_row").css("display", "flex") : $("#study_row").css("display", "none");
        val.includes('TRABAJA') ? $("#hr2").css("display", "flex") : $("#hr2").css("display", "none");
        val.includes('TRABAJA') ? $("#work_row").css("display", "flex") : $("#work_row").css("display", "none");
        // assignValues('TRABAJA', $("#long_take_job"), 'Por favor mencione el tiempo transcurrido');
        // assignValues('TRABAJA', $("#hear_about"), 'Por favor mencione el modo de obtención del empleo');
        // assignValues('TRABAJA', $("#language_most_spoken"), 'Por favor mencione el idioma utilizado');
        // assignValues('TRABAJA', $("#seniority"), 'Por favor mencione la antigüedad');
        // assignValues('TRABAJA', $("#year"), 'Por favor mencione el año de ingreso');
        // assignValues('TRABAJA', $("#salary"), 'Por favor mencione el salario');
        // assignValues('TRABAJA', $("#management_level"), 'Por favor mencione el nivel jerárgico');
        // assignValues('TRABAJA', $("#job_condition"), 'Por favor mencione la condición de trabajo');
        // assignValues('TRABAJA', $("#job_relationship"), 'Por favor mencione la relación del trabajo con su área de formación');
        // assignValues('TRABAJA', $("#business_name"), 'Por favor mencione la razón social');
        // assignValues('TRABAJA', $("#business_activity"), 'Por favor mencione giro o actividad principal');
        // assignValues('TRABAJA', $("#address"), 'Por favor mencione el domicilio');
        // assignValues('TRABAJA', $("#zip"), 'Por favor mencione el código postal');
        // assignValues('TRABAJA', $("#suburb"), 'Por favor mencione la colonia');
        // assignValues('TRABAJA', $("#state"), 'Por favor mencione el estado');
        // assignValues('TRABAJA', $("#city"), 'Por favor mencione la ciudad');
        // assignValues('TRABAJA', $("#municipality"), 'Por favor mencione el municipio');
        // assignValues('TRABAJA', $("#boss_email"), 'Por favor mencione el correo de su jefe');
        // assignValues('TRABAJA', $("#business_structure"), 'Por favor mencione la estructura de la empresa u organismo');
        // assignValues('TRABAJA', $("#company_size"), 'Por favor mencione el tamaño de la empresa u organismo');
        // assignValues('TRABAJA', $("#business_activity_selector"), 'Por favor mencione la actividad económica de la empresa u organismo');
        // assignValues('ESTUDIA', $("#speciality"), 'Por favor mencione su especialidad');
        // assignValues('ESTUDIA', $("#school"), 'Por favor mencione la escuela');
    } else {
        $("#clean").click();
        $("#hr1").css("display", "none");
        $("#study_row").css("display", "none");
        $("#hr2").css("display", "none");
        $("#work_row").css("display", "none");
        $("#saveRow").removeClass("d-flex justify-content-sm-center");
        $("#cancelRow").removeClass("d-flex justify-content-sm-center");
    }
}
