</div>
  <!-- Argon Scripts -->
  <!-- Core --> 
  <script src="<?= base_url('assets/admin/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?= base_url('assets/admin/vendor/js-cookie/js.cookie.js') ?>"></script>
  <script src="<?= base_url('assets/admin/vendor/jquery.scrollbar/jquery.scrollbar.min.js') ?>"></script>
  <script src="<?= base_url('assets/admin/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') ?>"></script>
  <!-- Optional JS -->
  <script src="<?= base_url('assets/admin/vendor/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
  <script src="<?= base_url('assets/admin/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
  <script src="<?= base_url('assets/admin/vendor/datatables.net-buttons/js/dataTables.buttons.min.js') ?>"></script>
  <script src="<?= base_url('assets/admin/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') ?>"></script>
  <script src="<?= base_url('assets/admin/vendor/datatables.net-buttons/js/buttons.html5.min.js') ?>"></script>
  <script src="<?= base_url('assets/admin/vendor/datatables.net-buttons/js/buttons.flash.min.js') ?>"></script>
  <script src="<?= base_url('assets/admin/vendor/datatables.net-buttons/js/buttons.print.min.js') ?>"></script>
  <script src="<?= base_url('assets/admin/vendor/datatables.net-select/js/dataTables.select.min.js') ?>"></script>
  <!-- Argon JS -->
  <script src="<?= base_url('assets/admin/js/argon.js?v=1.1.0') ?>"></script>
  <!-- Demo JS - remove this in your project -->
  <script src="<?= base_url('assets/admin/js/demo.min.js') ?>"></script>
</body>

</html>
<script>

 var notif = function() {
     $.ajax({
       type:'POST',
       url:'<?= base_url('Order_pelanggan/check_status') ?>',
       data:{},
       success:function(data) {
          $('.notif_status').html(data);
       }
     });
     $.ajax({
       type:'POST',
       url:'<?= base_url('Order_pelanggan/new_status') ?>',
       data:{},
       success:function(data) {
          $('#list-notif').html(data);
       }
     });
};
notif();
var refInterval = window.setInterval('notif()', 2000);
</script>