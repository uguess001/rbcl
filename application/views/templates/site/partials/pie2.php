<div id="branchwises2"></div>


<script>
$(document).ready(function(){
        var jsArray_po = <?=$chart; ?>;
        var jsArrayName_po = <?=$chart_name; ?>;
        // console.log(jsArray_po);
        // alert(jsArray_po);
        var options = {
         series: jsArray_po,
         //series:  jsArray_po,
          chart: {
          width: 500,
          type: 'pie',
        },
        labels: jsArrayName_po,
        responsive: [{
          breakpoint: 1024,
          options: {
            chart: {
              width: '100%'
            },
            legend: {
              position: 'bottom'
            }
          }
        }]
        };

        var chart = new ApexCharts(document.querySelector("#branchwises2"), options);
        chart.render();
});
</script>