  <footer class="app-footer">
      <div>
        <a href="https://coreui.io">CoreUI</a>
        <span>&copy; 2018 creativeLabs.</span>
      </div>
      <div class="ml-auto">
        <span>Powered by</span>
        <a href="https://coreui.io">CoreUI</a>
      </div>
    </footer>
    <!-- CoreUI and necessary plugins-->
  
<script src="../src/vendors/jquery/js/jquery.min.js"></script>
<script src="../src/vendors/jquery/js/popper.min.js"></script>
<script src="../src/vendors/jquery/js/bootstrap.min.js"></script>
<script src="../src/vendors/jquery/js/pace.min.js"></script>
<script src="../src/vendors/jquery/js/perfect-scrollbar.min.js"></script>
<script src="../src/vendors/jquery/js/coreui.min.js"></script>
<script>
    $('#ui-view').ajaxLoad();
    $(document).ajaxComplete(function() {
      Pace.restart()
    });
  </script>