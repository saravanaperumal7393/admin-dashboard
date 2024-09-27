


<script src="assets/js/jquery-3.7.1.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.bundle.min.js" type="text/javascript"></script>
<script src="assets/js/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="assets/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js" type="text/javascript"></script>
<script src="assets/js/moment.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script src="assets/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script src="assets/js/select2.min.js" type="text/javascript"></script>
<script src="assets/js/layout.js" type="text/javascript"></script>
<script src="assets/js/greedynav.js" type="text/javascript"></script>
<script src="assets/js/app.js" type="text/javascript"></script>
<script src="assets/js/rocket-loader.min.js" data-cf-settings="9f3929d348d83cd36764f70c-|49" defer></script>
<script src="assets/plugins/c3-chart/d3.v5.min.js" type="text/javascript"></script>
<script src="assets/plugins/c3-chart/c3.min.js" type="text/javascript"></script>
<script src="assets/plugins/c3-chart/chart-data.js" type="text/javascript"></script>
<script src="assets/plugins/apexchart/apexcharts.min.js" type="text/javascript"></script>
<script src="assets/plugins/apexchart/chart-data.js" type="text/javascript"></script>
<script src="assets/js/owl.carousel.min.js" type="text/javascript"></script>
<script src="assets/js/theme-settings.js" type="text/javascript"></script>

<script>
    document.getElementById('tableSearch').addEventListener('keyup', function() {
        var searchValue = this.value.toLowerCase();
        var rows = document.querySelectorAll('#jobTable tr');

        rows.forEach(function(row) {
            var rowText = row.textContent.toLowerCase();
            row.style.display = rowText.includes(searchValue) ? '' : 'none';
        });
    });
</script>



<script src="https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.1.4/dist/js/datepicker-full.min.js"></script>

<script src="https://www.google.com/jsapi"></script>
<script>
const pieChartEl = document.getElementById('pie-chart');

// Prepare data for the chart
const jobData = <?php echo json_encode($job_data); ?>;
const pieChartData = [['Job Type', 'Count']];
jobData.forEach(job => {
    pieChartData.push([job.job_type, parseInt(job.job_count)]);
});

const renderPieCharts = () => {
    const data = google.visualization.arrayToDataTable(pieChartData);

    // Pie Chart
    const pieChart = new google.visualization.PieChart(pieChartEl);
    const pieChartOptions = {
        backgroundColor: 'transparent',
        pieSliceText: 'label',
        pieSliceBorderColor: '#333642',
        chartArea: {
            width: '100%',
            height: '100%'
        },
        legend: {
            position: 'bottom',
            textStyle: {
                color: '#333'
            }
        },
        slices: {
            0: { color: '#ff9999' },
            1: { color: '#66b3ff' },
            2: { color: '#99ff99' },
            3: { color: '#ffcc99' },
            // Add more colors as needed
        }
    };

    pieChart.draw(data, pieChartOptions);
};

// Init Google Pie Charts
google.load('visualization', '1', { packages: ['corechart'] });
google.setOnLoadCallback(renderPieCharts);
</script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.1/js/bootstrap.min.js"></script> -->
<script>
  /* Bootstrap 5 JS included */
/* vanillajs-datepicker 1.1.4 JS included */

const getDatePickerTitle = elem => {
  // From the label or the aria-label
  const label = elem.nextElementSibling;
  let titleText = '';
  if (label && label.tagName === 'LABEL') {
    titleText = label.textContent;
  } else {
    titleText = elem.getAttribute('aria-label') || '';
  }
  return titleText;
}

const elems = document.querySelectorAll('.datepicker_input');
for (const elem of elems) {
  const datepicker = new Datepicker(elem, {
    'format': 'dd/mm/yyyy', // UK format
    title: getDatePickerTitle(elem)
  });
}
  </script>

</body>


</html>