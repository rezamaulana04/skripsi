<div class="page-container">

    <div class="copyright">
        <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
    </div>

</div>



<!-- Jquery JS-->
<script src="../vendor/jquery-3.2.1.min.js"></script>
<!-- Bootstrap JS-->
<script src="../vendor/bootstrap-4.1/popper.min.js"></script>
<script src="../vendor/bootstrap-4.1/bootstrap.min.js"></script>
<!-- ../Vendor JS       -->
<script src="../vendor/slick/slick.min.js">
</script>
<script src="../vendor/wow/wow.min.js"></script>
<script src="../vendor/animsition/animsition.min.js"></script>
<script src="../vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
</script>
<script src="../vendor/counter-up/jquery.waypoints.min.js"></script>
<script src="../vendor/counter-up/jquery.counterup.min.js">
</script>
<script src="../vendor/circle-progress/circle-progress.min.js"></script>
<script src="../vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="../vendor/chartjs/Chart.bundle.min.js"></script>
<script src="../vendor/select2/select2.min.js">
</script>
<script src="../js/sweetalert2/sweetalert2.all.min.js"></script>
<script src="../js1/boostrap.min.js/"></script>
<script src="../js1/highcharts.js"></script>
<script src="../js1/exporting.js"></script>

<script>
	var chart1;
	$(function(){

		 chart11 = new Highcharts.Chart({
             chart: {
                renderTo: 'container2',
                type: 'column'
             },  
             title: {
                text: 'Grafik Pengaduan Perhari '
             },
             xAxis: {
                categories: ['laporan']
             },
             yAxis: {
                title: {
                   text: 'Nilai'
                }
             },
                  series:
                [
                      { name: 'AA',
                        data: [10]
                      },
                ]
          });
	})
</script>

<!-- Main JS-->
<script src="../js/main.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('[data-toggle1="tooltip"]').tooltip();
    })
</script>

</body>

</html>
<!-- end document-->
