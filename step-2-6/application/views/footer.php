<script type="text/javascript" src="<?= base_url(); ?>assets/js/script_embed.js"></script></div>
<script type="text/javascript" src="<?= base_url(); ?>assets/mdb/js/popper.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/mdb/js/mdb.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/mdb/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/jquery-ui/jquery-ui.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
	$(document).ready(function () {
		$(function () {
			$('[data-toggle="popover"]').popover()
		});

		$(document).ajaxStart(function(){
			$("#wait").css("display", "block");
		});
		$(document).ajaxComplete(function(){
			$("#wait").css("display", "none");
		});
	});
</script>

</body>
</html>