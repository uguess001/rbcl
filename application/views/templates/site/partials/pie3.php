<div id="branchwises3"></div>
<script src="<?=RESOURCE_PATH?>js/jquery-3.1.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
$(document).ready(function(){
        var jsArray_po = [<?=$chart->shrawan?>, <?=$chart->bhadra?>, <?=$chart->ashoj?>, <?=$chart->kartik?>, <?=$chart->mangsir?>, <?=$chart->poush?>, <?=$chart->magh?>,<?=$chart->falgun?>,<?=$chart->chaitra?>,<?=$chart->baisakh?>,<?=$chart->jestha?>,<?=$chart->ashar?>];
        console.log(jsArray_po);
        var options = {
         series: jsArray_po,
        //  series: jsArray_po,
         //series:  jsArray_po,
          chart: {
          width: 500,
          type: 'pie',
        },
        labels: ['shrawan','bhadra','ashoj','kartik','mangsir','poush','magh','falgun','chaitra','baisakh','jestha','ashar'],
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            },
            legend: {
              position: 'bottom'
            }
          }
        }]
        };

        var chart = new ApexCharts(document.querySelector("#branchwises3"), options);
        chart.render();
});
</script>