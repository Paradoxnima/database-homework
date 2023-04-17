
</div>

<script src="assets/js/jquery-3.6.4.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script>
  $(document).ready(function () {
    $("#myInput").on("keyup", function () {
      var value = $(this).val().toLowerCase();
      $("#myTable tr").filter(function () {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
      });
    });
  });
</script>
</body>
</html>