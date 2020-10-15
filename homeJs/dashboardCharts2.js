var url="apis/statistiqueCountSrvices.php";


$.ajax({
  url: url,
  method: "GET",
  data: {},
  async: false,
  dataType: "json",
  success:function(data){
    console.log(data);
    var _data=[];
    for(var i=0;i<data.length;i++){
      var _obj={
        name: data[i].description,
        y: parseInt(data[i].totalCount),
        description:data[i].description,
        sliced: true,
        selected: true
      }
      _data.push(_obj)
    }

    Highcharts.chart('container2', {
      chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
      },
      title: {
        text: 'Les demandes des service , 2018'
      },
      tooltip: {
        pointFormat: '{series.description}: <b>{point.percentage:.1f}%</b>'
      },
      plotOptions: {
        pie: {
          allowPointSelect: true,
          cursor: 'pointer',
          dataLabels: {
            enabled: true,
            format: '<b>{point.name}</b>: {point.percentage:.1f} %',
            style: {
              color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
            }
          }
        }
      },
      series: [{
        name: 'Brands',
        colorByPoint: true,
        data: _data
      }]
    });


  }
});

