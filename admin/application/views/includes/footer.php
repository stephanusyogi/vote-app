                <!-- BEGIN: JS Assets-->
        <script src="<?= base_url('assets/template/') ?>dist/js/app.js"></script>
        <!-- END: JS Assets-->
        
        <script type="text/javascript">
          var windowURL = window.location.href;
          pageURL = '<?php echo base_url() . $menuLink ?>';
          var x = $('a[href="' + pageURL + '"]');
          x.addClass('top-menu--active');
          var y = $('a[href="' + windowURL + '"]');
          y.addClass('top-menu--active');
        </script>

        <!-- Toast -->
        <script src="<?= base_url('assets/plugins'); ?>/toastr/toastr.min.js"></script>  
        <!-- SweetAlert2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    </body>
</html>
