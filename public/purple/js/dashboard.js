(function ($) {
  'use strict';

  if ($("#visit-sale-chart").length) {
    const ctx = document.getElementById('visit-sale-chart').getContext("2d");

    const yellow = 'rgba(255, 193, 7, 1)'; // warning
    const red = 'rgba(254, 112, 150, 1)';
    const blue = 'rgba(0, 123, 255, 1)'; // biru lebih gelap

    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG'],
        datasets: [
          {
            label: "CHN",
            backgroundColor: yellow,
            borderColor: yellow,
            hoverBackgroundColor: yellow,
            borderWidth: 1,
            data: [20, 40, 15, 35, 25, 50, 30, 20],
            barPercentage: 0.5,
            categoryPercentage: 0.5,
          },
          {
            label: "USA",
            backgroundColor: red,
            borderColor: red,
            hoverBackgroundColor: red,
            borderWidth: 1,
            data: [40, 30, 20, 10, 50, 15, 35, 40],
            barPercentage: 0.5,
            categoryPercentage: 0.5,
          },
          {
            label: "UK",
            backgroundColor: blue,
            borderColor: blue,
            hoverBackgroundColor: blue,
            borderWidth: 1,
            data: [70, 10, 30, 40, 25, 50, 15, 30],
            barPercentage: 0.5,
            categoryPercentage: 0.5,
          }
        ]
      },
      options: {
        responsive: true,
        maintainAspectRatio: true,
        scales: {
          y: {
            display: false,
            grid: {
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
            },
          },
          x: {
            display: true,
            grid: {
              display: false,
            },
          }
        },
        plugins: {
          legend: {
            display: true,
            position: 'bottom',
            align: 'start', 
            labels: {
              color: '#000', 
              boxWidth: 20,
              padding: 15
            }
          }
        }
      }
    });
  }

  if ($("#traffic-chart").length) {
    const ctx = document.getElementById('traffic-chart').getContext("2d");

    const blue = 'rgba(0, 123, 255, 1)';
    const red = 'rgb(255, 212, 55)';
    const green = 'rgba(6, 185, 157, 1)';

    new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ['Search Engines 30%', 'Direct Click 30%', 'Bookmarks Click 40%'],
        datasets: [{
          data: [30, 30, 40],
          backgroundColor: [blue, green, red],
          hoverBackgroundColor: [blue, green, red],
          borderColor: [blue, green, red]
        }]
      },
      options: {
        cutout: 50,
        animationEasing: "easeOutBounce",
        animateRotate: true,
        animateScale: false,
        responsive: true,
        maintainAspectRatio: true,
        plugins: {
          legend: {
            display: false
          }
        }
      }
    });
  }

  if ($("#inline-datepicker").length) {
    $('#inline-datepicker').datepicker({
      enableOnReadonly: true,
      todayHighlight: true,
    });
  }

  if ($.cookie('purple-pro-banner') != "true") {
    document.querySelector('#proBanner').classList.add('d-flex');
    document.querySelector('.navbar').classList.remove('fixed-top');
  } else {
    document.querySelector('#proBanner').classList.add('d-none');
    document.querySelector('.navbar').classList.add('fixed-top');
  }

  if ($(".navbar").hasClass("fixed-top")) {
    document.querySelector('.page-body-wrapper').classList.remove('pt-0');
    document.querySelector('.navbar').classList.remove('pt-5');
  } else {
    document.querySelector('.page-body-wrapper').classList.add('pt-0');
    document.querySelector('.navbar').classList.add('pt-5');
    document.querySelector('.navbar').classList.add('mt-3');
  }

  document.querySelector('#bannerClose').addEventListener('click', function () {
    document.querySelector('#proBanner').classList.add('d-none');
    document.querySelector('#proBanner').classList.remove('d-flex');
    document.querySelector('.navbar').classList.remove('pt-5');
    document.querySelector('.navbar').classList.add('fixed-top');
    document.querySelector('.page-body-wrapper').classList.add('proBanner-padding-top');
    document.querySelector('.navbar').classList.remove('mt-3');
    var date = new Date();
    date.setTime(date.getTime() + 24 * 60 * 60 * 1000);
    $.cookie('purple-pro-banner', "true", {
      expires: date
    });
  });

})(jQuery);
