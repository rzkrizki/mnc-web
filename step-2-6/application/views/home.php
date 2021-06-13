<style>
    table thead tr {
        background-color: #7367f0;
        color: #fff;
    }
</style>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="<?= base_url('home/add_article') ?>" class="btn btn-block btn-primary"><i class="fa fa-plus"></i> Article</a>
                        </div>
                    </div>
                    <hr>
                    <table class="table table-hover table-striped table-bordered" id="table_article"></table>
                </div>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="<?= base_url(); ?>assets/jquery-ui/jquery-ui.min.css" />
<link rel="stylesheet" href="<?= base_url(); ?>assets/jquery-ui/jquery-ui.theme.min.css" />
<script type="text/javascript" src="<?= base_url(); ?>assets/jquery-ui/jquery-ui.min.js"></script>

<script>
    $(document).ready(function() {
        get_article()
    });

    function get_article() {

        $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
            return {
                "iStart": oSettings._iDisplayStart,
                "iEnd": oSettings.fnDisplayEnd(),
                "iLength": oSettings._iDisplayLength,
                "iTotal": oSettings.fnRecordsTotal(),
                "iFilteredTotal": oSettings.fnRecordsDisplay(),
                "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
            };
        };

        var t = $("#table_article").dataTable({
            initComplete: function() {
                var api = this.api();
                $('#table_filter input')
                    .off('.DT')
                    .on('keyup.DT', function(e) {
                        if (e.keyCode == 13) {
                            api.search(this.value).draw();
                        }
                    });
            },
            oLanguage: {
                sProcessing: "loading..."
            },
            processing: true,
            serverSide: true,
            bDestroy: true,
            autoWidth: false,
            ajax: {
                "url": "<?= base_url('home/get_article') ?>",
                "type": "POST"
            },
            columns: [{
                    "data": "no",
                    "title": "No",
                    "orderable": false,
                    "width": "5%"
                },
                {
                    "data": "publish_date",
                    "title": "Publish Date",
                    "width": "16%"
                },
                {
                    "data": "title",
                    "title": "Title",
                    "width": "16%"
                },
                {
                    "data": "description",
                    "title": "Description",
                    "width": "16%",
                    "orderable": false
                },
                {
                    "data": "content",
                    "title": "Content",
                    "width": "16%",
                    "orderable": false
                },
                {
                    "data": "action",
                    "title": "Action",
                    "orderable": false,
                    "width": "16%"
                },
            ],
            order: [
                [0, 'desc']
            ],
            rowCallback: function(row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                $('td:eq(0)', row).html(index);
            }
        });
    }

    function editData(id){
        window.location.href = '<?= base_url('home/edit_article/') ?>' + id
    }

    function detailData(id){
        window.location.href = '<?= base_url('home/detail_article/') ?>' + id
    }

    function deleteData(id){
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?= base_url('home/remove/') ?>" + id,
                    type: "GET",
                    dataType: "json",
                    success: function(response) {
                        if (response.status == 500) {
                            getError(response.message)
                        } else {
                            getSuccess(response.message)
                        }
                    },
                    error: function(e) {
                        getError(e)
                    }
                })
            }
        })
    }

    function getSuccess(msg) {
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: msg,
            showConfirmButton: true,
        }).then((result) => {
            if (result.isConfirmed) {
                get_article()
            }
        })
    }

    function getWarning(msg) {
        Swal.fire({
            icon: 'warning',
            title: 'Oops...',
            text: msg
        })
    }

    function getError(msg) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: msg
        })
    }
</script>