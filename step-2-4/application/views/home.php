<script>
    $(document).ready(function () {
		notification()
	});
    
    function notification() {
        Swal.fire({
            title: 'Success',
            text: "Apakah kamu ingin kembali ke halaman login",
            icon: 'success',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Kembali'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '<?= base_url('login') ?>'
            }
        })
    }
</script>