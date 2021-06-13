<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-transparent mb-0">
                    <h5 class="text-center">Please <span class="font-weight-bold text-primary">LOGIN</span></h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" onclick="checkData()"><b>LOGIN</b></button>
                        <a class="btn btn-warning btn-block" href="<?= base_url('daftar') ?>"><b>DAFTAR</b></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function checkData() {
        var username = $('#username').val()
        var password = $('#password').val()
        if (username != '' && password != '') {
            submitData()
        } else {
            if (username == '') {
                getWarning('Username tidak boleh kosong')
            } else if (password == '') {
                getWarning('Password tidak boleh kosong')
            }
        }
    }

    function submitData() {
        var username = $('#username').val()
        var password = $('#password').val()
        $.ajax({
            url: "<?= base_url('login/verification') ?>",
            type: "POST",
            dataType: "json",
            data: {
                'username': username,
                'password': password,
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
        $('#password').val('')
        $('#username').val('')
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