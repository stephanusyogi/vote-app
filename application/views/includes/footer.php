        
        <script>            
            $("#vote").on("click", function (e) {
                e.preventDefault();
                const href = $(this).attr("href");

                Swal.fire({
                    title: "Konfirmasi Pilihan Anda",
                    text: "Apakah anda yakin dengan pilihan anda?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Lanjutkan Vote",
                    cancelButtonText: "Batalkan Vote",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#form-vote')[0].submit();
                    }
                });
            });
        </script>
        <!-- BEGIN: JS Assets-->
        <script src="<?= base_url('assets/template/') ?>dist/js/app.js"></script>
        <!-- END: JS Assets-->
        <!-- Toast -->
        <script src="<?= base_url('assets/plugins'); ?>/toastr/toastr.min.js"></script>  
        <!-- SweetAlert2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    </body>
</html>
