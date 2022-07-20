<script>
    $(function() {
        "use strict";
        initC3Chart();
    });
    // Orders Status Chart
    function initC3Chart() {
        setTimeout(function(){
            $(document).ready(function(){
                var chart = c3.generate({
                    bindto: '#order_chart', // id of chart wrapper
                    data: {
                        columns: [
                            // each columns data
                            ['data1', 45],
                            ['data2', 55],
                        ],
                        type: 'pie', // default type of chart
                        colors: {
                            'data1': Aero.colors["indigo-dark"],
                            'data2': Aero.colors["teal"],
                        },
                        names: {
                            // name of each serie
                            'data1': 'Redeemed Coupons 450',
                            'data2': 'Pending Coupons 550',
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
        }, 500);
    }

</script>
