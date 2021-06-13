<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tambah Article</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <label for="publish_date">Publish Date</label>
                <input type="text" class="form-control datepicker" id="publish_date" name="publish_date">
            </div>
            <div class="col-md-6">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="col-md-6">
                <label for="content">Content</label>
                <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
            </div>
        </div>
        <div class="mt-4">
            <button class="btn btn-success btn-block" onclick="checkData()"><b>Submit Article</b></button>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(".datepicker").datepicker({
            changeYear: true,
            changeMonth: true,
            dateFormat: 'd M yy',
        });
    })

    function checkData() {
        var publish_date = $('#publish_date').val()
        var title = $('#title').val()
        var description = $('#description').val()
        var content = $('#content').val()
        if (publish_date != '' && title != '' && description != '' && content != '') {
            submitData()
        } else {
            if (publish_date == '') {
                getWarning("Publish date can't be empty")
            } else if (title == '') {
                getWarning("Title can't be empty")
            } else if (description == '') {
                getWarning("Description can't be empty")
            } else if (content == '') {
                getWarning("Content can't be empty")
            }
        }
    }

    function submitData() {
        var publish_date = $('#publish_date').val()
        var title = $('#title').val()
        var description = $('#description').val()
        var content = $('#content').val()

        $.ajax({
            url: "<?= base_url('home/submit') ?>",
            type: "POST",
            dataType: "json",
            data: {
                'publish_date': publish_date,
                'title': title,
                'description': description,
                'content': content
            },
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

    function clearForm() {
        $('#publish_date').val('')
        $('#title').val('')
        $('#description').val('')
        $('#content').val('')
    }

    function getSuccess(msg) {
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: msg,
            showConfirmButton: true,
        }).then((result) => {
            if (result.isConfirmed) {
                directSuccess()
                clearForm()
            }
        })
    }

    function directSuccess(){
        window.location.href = "<?= base_url('home') ?>";
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