var url="apis/statistiqueCountSrvices.php";


$.ajax({
  url: url,
  method: "GET",
  data: {},
  async: false,
  dataType: "json",
  success:function(_data){
    console.log(_data)
    var text="";
    for(var p=0;p<10;p++) {
      for (var o = 0; o < _data.length; o++) {
        text+=' '+_data[o].nomSer+' '+ _data[o].description.replace(" ", "_");
      }
    }

    console.log(text);
    var lines = text.split(/[,\. ]+/g),
      data = Highcharts.reduce(lines, function (arr, word) {
        var obj = Highcharts.find(arr, function (obj) {
          return obj.name === word;
        });
        if (obj) {
          obj.weight += 1;
        } else {
          obj = {
            name: word,
            weight: 1
          };
          arr.push(obj);
        }
        return arr;
      }, []);

    Highcharts.chart('container3', {
      series: [{
        type: 'wordcloud',
        data: data,
        name: 'Occurrences'
      }],
      title: {
        text: 'Wordcloud of Lorem Ipsum'
      }
    });


  }
});

