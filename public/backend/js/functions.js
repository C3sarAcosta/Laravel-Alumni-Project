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
        var state = document.getElementById("state");
        var city = document.getElementById("city");
        var municipality = document.getElementById("municipality");

        if (data["data"]["estado"] != undefined) {
            $("#suburb").val("");
            state.value = data["data"]["estado"];
            city.value = data["data"]["municipio"];
            municipality.value = data["data"]["municipio"];

            $("#suburb_selector")
                .empty()
                .append(
                    `<option value="" selected="" disabled="">Selecciona una colonia</option>`
                );
            $("#suburb_selector").css("display", "inline");
            suburb.forEach(function (data) {
                var option = new Option(data["nombre"], data["nombre"]);
                $("#suburb_selector").append(option);
            });
        }
    }
}

function onChangeSuburb() {
    var value = $("#suburb_selector").val();
    console.log(value);
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

    if (value >= 100) {
        return false;
    }
    $input.val(parseInt($input.val()) + 10);
    $input.change();
    return false;
});

flatpickr("input[type=date]", {});
$(".yearpicker").yearpicker({
    startYear: 1990,
    endYear: new Date().getFullYear(),
});


 //Survey Three functions
function changeActivity() {
    var value = $("#do_for_living").val();

    if (value == "Estudia" || value == "Estudia y trabaja") {
        $("#study_row").css("display", "flex");
    } else {
        $("#study_row").css("display", "none");
    }
    if (value == "Trabaja" || value == "Estudia y trabaja") {
        $("#work_row").css("display", "flex");
    } else {
        $("#work_row").css("display", "none");
    }

    if (value == "Estudia" || value == "Trabaja" || value == "Estudia y trabaja") {
        $("#saveRow").addClass("d-flex justify-content-sm-center");
        $("#cancelRow").addClass("d-flex justify-content-sm-center");
    }
    else {
        $("#saveRow").removeClass("d-flex justify-content-sm-center");
        $("#cancelRow").removeClass("d-flex justify-content-sm-center");
    }
}

//Survey Five and Six
function changeSelect() {
    var value = $("#courses_selector").val();
    var value_master = $("#master_selector").val();
    var value_organization = $("#organization_selector").val();
    var value_agency = $("#agency_selector").val();
    var value_association = $("#association_selector").val();

    if (value == "Si") {
        $("#courses").removeAttr("disabled");
    } else {
        $("#courses").attr("disabled", "");
    }

    if (value_master == "Si") {
        $("#master").removeAttr("disabled");
    } else {
        $("#master").attr("disabled", "");
    }


    if (value_organization == "Si") {
        $("#organization").removeAttr("disabled");
    } else {
        $("#organization").attr("disabled", "");
    }

    if (value_agency == "Si") {
        $("#agency").removeAttr("disabled");
    } else {
        $("#agency").attr("disabled", "");
    }

    if (value_association == "Si") {
        $("#association").removeAttr("disabled");
    } else {
        $("#association").attr("disabled", "");
    }
}