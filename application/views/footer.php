<script>
  $(document).ready(function() {
    $('select').change(function() {
      if ($('select option[value="' + $(this).val() + '"]:selected').length > 1) {
        $(this).val('-1').change();
        alert('Barang Sudah Dipilih.')
      }
    });

  });
</script>