<?php
namespace Modules\Stores\Plugins;
/**
* 
*/
class Dashboard
{
	
	function render()
	{
		register("javascript",[resources_url("echarts/echarts.min.js")]);
		?>
		<div id="mainECharts" style="width: 100%;height:400px;"></div>
		<?php
$date = [];
$salesData = [];
$dateData = [];
$date= ['"Thứ 2"','"Thứ 3"','"Thứ 4"','"Thứ 5"','"Thứ 6"','"Thứ 7"','"Chủ nhật"'];
for ($i=1; $i < count($date); $i++) { 
	$salesData[] = rand(0,300);
	$dateData[] = rand(0,300);
}
?>
<script type="text/javascript">
        // based on prepared DOM, initialize echarts instance
        var myChart = echarts.init(document.getElementById('mainECharts'));

        // specify chart configuration item and data
        var option = {
            title: {
                
            },
            tooltip: {},
            legend: {
                data:['Bán hàng','Số người vào web']
            },
            xAxis: {
                data: [<?php echo implode($date,",");?>]
            },
            yAxis: {},
            series: [{
                name: 'Bán hàng',
                type: 'bar',
                data: [<?php echo implode($salesData,",");?>]
            },{
                name: 'Số người vào web',
                type: 'bar',
                data: [<?php echo implode($dateData,",");?>]
            }]
        };

        // use configuration item and data specified to show chart
        myChart.setOption(option);
    </script>
		<?php
	}
}
