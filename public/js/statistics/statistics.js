var donutData = [
    { label: 'Series2', data: 10, color: '#3c8dbc' },
    { label: 'Series3', data: 20, color: '#0073b7' },
    { label: 'Series4', data: 50, color: '#00c0ef' }
  ]
  $.plot('#donut-chart', donutData, {
    series: {
      pie: {
        show       : true,
        radius     : 1,
        innerRadius: 0.5,
        label      : {
          show     : true,
          radius   : 2 / 3,
          formatter: labelFormatter,
          threshold: 0.1
        }

      }
    },
    legend: {
      show: false
    }
  })