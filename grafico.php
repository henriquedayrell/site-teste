<?php

include "template.php";           
// as = apelido para coluna ser igual o que o grafico pede
$sql = "SELECT categoria as category, COUNT(*) as value FROM games GROUP BY categoria";
// executa sql e devolve retorno como objeto (varios atributos e comportamentos)
$result = $conn->query($sql);
$dados = [];
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $dados[] = $row; 
  }
}
$dadosjson = json_encode($dados);

// echo '<pre>';
//  var_dump($dadosjson);
//  echo '</pre>';
// exit;

?>
<style>
#chartdiv {
  width: 100%;
  height: 500px;
}
</style>

<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

<!-- Chart code -->
<script>
am5.ready(function() {

// Create root element
// https://www.amcharts.com/docs/v5/getting-started/#Root_element
var root = am5.Root.new("chartdiv");

// Set themes
// https://www.amcharts.com/docs/v5/concepts/themes/
root.setThemes([
  am5themes_Animated.new(root)
]);

// Create chart
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
var chart = root.container.children.push(
  am5percent.PieChart.new(root, {
    endAngle: 270
  })
);

// Create series
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series
var series = chart.series.push(
  am5percent.PieSeries.new(root, {
    valueField: "value",
    categoryField: "category",
    endAngle: 270
  })
);

series.states.create("hidden", {
  endAngle: -90
});

// Set data
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
series.data.setAll(<?php echo $dadosjson?>);

series.appear(1000, 100);

}); // end am5.ready()
</script>

<!-- HTML -->
<div id="chartdiv"></div>
<?php 
include "footer.php";
?>