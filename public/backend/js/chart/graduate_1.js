function array_data(array, color_array) {
    var data_array = array.map(a => a.total);
    for (let i = 0; i < data_array.length; i++) {
        var color = randomColor();
        color_array.push(color);
    }
    return data_array;
}

function charts_one(array_sex, array_marital_status, array_state,
    array_career, array_specialty, array_qualified, array_month, array_year, array_percent_english, array_another_language) {
    var labels_sex = array_sex.map(a => a.sex);
    var colors_sex = [];
    var data_sex = array_data(array_sex, colors_sex);

    var labels_marital_status = array_marital_status.map(a => a.marital_status);
    var colors_marital_status = [];
    var data_marital_status = array_data(array_marital_status, colors_marital_status);

    var labels_state = array_state.map(a => a.state);
    var colors_state = [];
    var data_state = array_data(array_state, colors_state);

    var data_career = array_career.map(a => a.total);
    var labels_career = array_career.map(a => a.career);
    var colors_career = [];
    var data_career = array_data(array_career, colors_career);

    var labels_specialty = array_specialty.map(a => a.specialty);
    var colors_specialty = [];
    var data_specialty = array_data(array_specialty, colors_specialty);

    var labels_qualified = array_qualified.map(a => a.qualified);
    var colors_qualified = [];
    var data_qualified = array_data(array_qualified, colors_qualified);

    var labels_month = array_month.map(a => a.month);
    var colors_month = [];
    var data_month = array_data(array_month, colors_month);

    var labels_year = array_year.map(a => a.year);
    var colors_year = [];
    var data_year = array_data(array_year, colors_year);

    var labels_percent_english = array_percent_english.map(a => a.percent_english);
    var colors_percent_english = [];
    var data_percent_english = array_data(array_percent_english, colors_percent_english);

    var labels_another_language = array_another_language.map(a => a.another_language);
    var colors_another_language = [];
    var data_another_language = array_data(array_another_language, colors_another_language);

    //-------------
    //- PIE CHART -
    //-------------
    var pieOptions = {
        maintainAspectRatio: false,
        responsive: true,
        plugins: {
            datalabels: {
                formatter: (value, categories) => {
                    let sum = 0;
                    let dataArr = categories.chart.data.datasets[0].data;
                    dataArr.map(data => {
                        sum += data;
                    });
                    let percentage = (value * 100 / sum).toFixed(2) + "%";
                    return percentage;
                },
                color: '#fff',
                font: {
                    weight: 'bold',
                    size: 16,
                }
            },
        }
    };


    //Pie 1
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData = {
        labels: labels_sex,
        datasets: [{
            data: data_sex,
            backgroundColor: colors_sex,
        }]
    }

    new Chart(pieChartCanvas, {
        type: 'pie',
        data: pieData,
        options: pieOptions
    });


    //Pie 2
    var pieChartCanvas2 = $('#pieChart1').get(0).getContext('2d')
    var pieData2 = {
        labels: labels_marital_status,
        datasets: [{
            data: data_marital_status,
            backgroundColor: colors_marital_status,
        }]
    }

    new Chart(pieChartCanvas2, {
        type: 'pie',
        data: pieData2,
        options: pieOptions
    });


    //Pie 3
    var pieChartCanvas3 = $('#pieChart2').get(0).getContext('2d')
    var pieData3 = {
        labels: labels_state,
        datasets: [{
            data: data_state,
            backgroundColor: colors_state,
        }]
    }

    new Chart(pieChartCanvas3, {
        type: 'pie',
        data: pieData3,
        options: pieOptions
    });


    //Pie 4
    var pieChartCanvas4 = $('#pieChart3').get(0).getContext('2d')
    var pieData4 = {
        labels: labels_career,
        datasets: [{
            data: data_career,
            backgroundColor: colors_career,
        }]
    }

    new Chart(pieChartCanvas4, {
        type: 'pie',
        data: pieData4,
        options: pieOptions
    });


    //Pie 5
    var pieChartCanvas5 = $('#pieChart4').get(0).getContext('2d')
    var pieData5 = {
        labels: labels_specialty,
        datasets: [{
            data: data_specialty,
            backgroundColor: colors_specialty,
        }]
    }

    new Chart(pieChartCanvas5, {
        type: 'pie',
        data: pieData5,
        options: pieOptions
    });


    //Pie 6
    var pieChartCanvas6 = $('#pieChart5').get(0).getContext('2d')
    var pieData6 = {
        labels: labels_qualified,
        datasets: [{
            data: data_qualified,
            backgroundColor: colors_qualified,
        }]
    }

    new Chart(pieChartCanvas6, {
        type: 'pie',
        data: pieData6,
        options: pieOptions
    });


    //Pie 7
    var pieChartCanvas7 = $('#pieChart6').get(0).getContext('2d')
    var pieData7 = {
        labels: labels_month,
        datasets: [{
            data: data_month,
            backgroundColor: colors_month,
        }]
    }

    new Chart(pieChartCanvas7, {
        type: 'pie',
        data: pieData7,
        options: pieOptions
    });


    //Pie 8
    var pieChartCanvas8 = $('#pieChart7').get(0).getContext('2d')
    var pieData8 = {
        labels: labels_year,
        datasets: [{
            data: data_year,
            backgroundColor: colors_year,
        }]
    }

    new Chart(pieChartCanvas8, {
        type: 'pie',
        data: pieData8,
        options: pieOptions
    });


    //Pie 9
    var pieChartCanvas9 = $('#pieChart8').get(0).getContext('2d')
    var pieData9 = {
        labels: labels_percent_english,
        datasets: [{
            data: data_percent_english,
            backgroundColor: colors_percent_english,
        }]
    }

    new Chart(pieChartCanvas9, {
        type: 'pie',
        data: pieData9,
        options: pieOptions
    });


    //Pie 10
    var pieChartCanvas10 = $('#pieChart9').get(0).getContext('2d')
    var pieData10 = {
        labels: labels_another_language,
        datasets: [{
            data: data_another_language,
            backgroundColor: colors_another_language,
        }]
    }

    new Chart(pieChartCanvas10, {
        type: 'pie',
        data: pieData10,
        options: pieOptions
    });

};

$("#print_button").click(function () {
    window.print();
});
