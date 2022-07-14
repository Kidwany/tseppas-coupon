<script>
    $(function() {
        "use strict";
        initC3Chart()
    });

    function initC3Chart() {
        setTimeout(function(){
            $(document).ready(function(){
                var chart = c3.generate({
                    bindto: '#chart-area-spline-sracked', // id of chart wrapper
                    data: {
                        columns: [
                            // each columns data
                            ['data1', 21, 8, 32, 18, 19, 17, 23, 12, 25, 37],
                            ['data2', 7, 11, 5, 7, 9, 16, 15, 23, 14, 55],
                            ['data3', 13, 7, 9, 15, 9, 31, 8, 27, 42, 18],
                        ],
                        type: 'area-spline', // default type of chart
                        groups: [
                            [ 'data1', 'data2', 'data3']
                        ],
                        colors: {
                            'data1': Aero.colors["gray"],
                            'data2': Aero.colors["teal"],
                            'data3': Aero.colors["lime"],
                        },
                        names: {
                            // name of each serie
                            'data1': 'Sales Quotations',
                            'data2': 'Sales Orders',
                            'data3': 'Coupons',
                        }
                    },
                    axis: {
                        x: {
                            type: 'category',
                            // name of each category
                            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sept', 'Oct']
                        },
                    },
                    legend: {
                        show: true, //hide legend
                    },
                    padding: {
                        bottom: 0,
                        top: 0,
                    },
                });
            });
            $(document).ready(function(){
                var chart = c3.generate({
                    bindto: '#chart-pie', // id of chart wrapper
                    data: {
                        columns: [
                            // each columns data
                            ['data1', 55],
                            ['data2', 25],
                            ['data3', 20],
                        ],
                        type: 'pie', // default type of chart
                        colors: {
                            'data1': Aero.colors["lime"],
                            'data2': Aero.colors["teal"],
                            'data3': Aero.colors["gray"],
                        },
                        names: {
                            // name of each serie
                            'data1': 'Arizona',
                            'data2': 'Florida',
                            'data3': 'Texas',
                        }
                    },
                    axis: {
                    },
                    legend: {
                        show: true, //hide legend
                    },
                    padding: {
                        bottom: 0,
                        top: 0
                    },
                });
            });
            $(document).ready(function(){
                var chart = c3.generate({
                    bindto: '#chart-area-step', // id of chart wrapper
                    data: {
                        columns: [
                            // each columns data
                            ['data1', 11, 8, 15, 7, 11, 13],
                            ['data2', 7, 7, 5, 7, 9, 12]
                        ],
                        type: 'area-step', // default type of chart
                        colors: {
                            'data1': Aero.colors["pink"],
                            'data2': Aero.colors["orange"]
                        },
                        names: {
                            // name of each serie
                            'data1': 'Today',
                            'data2': 'month'
                        }
                    },
                    axis: {
                        x: {
                            type: 'category',
                            // name of each category
                            categories: ['1', '2', '3', '4', '5', '6']
                        },
                    },
                    legend: {
                        show: true, //hide legend
                    },
                    padding: {
                        bottom: 0,
                        top: 0
                    },
                });
            });
        }, 500);
    }
    // Orders Per Month Graph
    function updateStudentsChart() {
        setTimeout(function(){
            $(document).ready(function(){
                $('#month').on('change', function () {
                    $.ajaxSetup({ headers : {'X-CSRF-TOKEN': '{{csrf_token()}}'}})
                    $.ajax({
                        url: "{{adminUrl('dashboard/update-chart')}}",
                        type: "POST",
                        data: {month : document.getElementById('month').value},
                        dataType: 'json',
                        success : function (response)
                        {
                            console.log(response['registered']);
                            var chart = c3.generate({
                                bindto: '#chart-area-spline-sracked', // id of chart wrapper
                                data: {
                                    columns: [
                                        // each columns data
                                        response['registered'],
                                        response['enrolled'],
                                        /*['data2', 7, 11, 5, 7, 9, 16, 15, 23, 14, 55],
                                        ['data3', 13, 7, 9, 15, 9, 31, 8, 27, 42, 18],*/
                                    ],
                                    type: 'area-spline', // default type of chart
                                    groups: [
                                        [ 'data1', 'data2', 'data3']
                                    ],
                                    colors: {
                                        'data1': Aero.colors["gray"],
                                        'data2': Aero.colors["teal"],
                                        /*'data2': Aero.colors["teal"],
                                        'data3': Aero.colors["lime"],*/
                                    },
                                    names: {
                                        // name of each serie
                                        'data1': 'Sales Quotations',
                                        'data2': 'Sales Orders',
                                        'data3': 'Coupons',
                                    }
                                },
                                axis: {
                                    x: {
                                        type: 'category',
                                        // name of each category
                                        //categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sept', 'Oct']
                                        categories: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31']
                                    },
                                },
                                legend: {
                                    show: true, //hide legend
                                },
                                padding: {
                                    bottom: 0,
                                    top: 0,
                                },
                            });
                        },
                    },)
                })
            });
            $(document).ready(function () {
                $.ajaxSetup({ headers : {'X-CSRF-TOKEN': '{{csrf_token()}}'}})
                $.ajax({
                    url: "{{adminUrl('dashboard/get-chart')}}",
                    type: "GET",
                    dataType: 'json',
                    success : function (response)
                    {
                        var chart = c3.generate({
                            bindto: '#chart-area-spline-sracked', // id of chart wrapper
                            data: {
                                columns: [
                                    // each columns data
                                    response['registered'],
                                    response['enrolled'],
                                    /*['data2', 7, 11, 5, 7, 9, 16, 15, 23, 14, 55],
                                    ['data3', 13, 7, 9, 15, 9, 31, 8, 27, 42, 18],*/
                                ],
                                type: 'area-spline', // default type of chart
                                groups: [
                                    [ 'data1', 'data2', 'data3']
                                ],
                                colors: {
                                    'data1': Aero.colors["gray"],
                                    'data2': Aero.colors["teal"]
                                    /*'data2': Aero.colors["teal"],
                                    'data3': Aero.colors["lime"],*/
                                },
                                names: {
                                    // name of each serie
                                    'data1': 'Revenue',
                                    'data2': 'Returns',
                                    'data3': 'Queries',
                                }
                            },
                            axis: {
                                x: {
                                    type: 'category',
                                    // name of each category
                                    //categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'July', 'Aug', 'Sept', 'Oct']
                                    categories: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31']
                                },
                            },
                            legend: {
                                show: true, //hide legend
                            },
                            padding: {
                                bottom: 0,
                                top: 0,
                            },
                        });
                    },
                },)
            });
        }, 500);
    }

//
</script>
