<?php include 'include/head.php'; ?>


<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover table-striped table-bordered" id="table_user">
                        <thead style="background: #7367f0;">
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="load_table">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" onclick="clearModal(2)" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card" style="width: 100%">
                    <img class="card-img-top" alt="Image User" id="image_user">
                    <div class="card-body" id="content_user">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        load_table()
    });

    function load_table() {
        
        $.ajax({
            type: 'GET',
            url: "https://reqres.in/api/users?page=2",
            dataType: 'json',
            success: function(response) {
                console.log(response);
                $("#load_table").empty();
                var no = 1;
                $.each(response.data, function(index, item) {
                    $('#load_table').append(`
                        <tr>\
                            <td>` + no + `</td>\
                            <td><img src="` + item.avatar + `" alt="Thumbnnail" class="img-thumbnail"></td>\
                            <td>` + item.first_name + ` ` + item.last_name + `</td>\
                            <td>` + item.email + `</td>\
                            <td><button class="btn btn-info" onclick="detailUser(` + item.id + `)">Detail User</button></td>\
                        </tr>\
                    `);
                    no++;
                });
            },
            error: function(e) {
                getError(e)
            },
        })
    }

    function detailUser(id) {
        clearModal(1)
        $.ajax({
            type: 'GET',
            url: "https://reqres.in/api/users/" + id,
            dataType: 'json',
            success: function(response) {
                console.log(response);                
                $('#image_user').attr("src", response.data.avatar);
                $('#content_user').append(`
                   <p>First Name : ` + response.data.first_name + `</p>\
                   <p>Last Name : ` + response.data.last_name + `</p>\
                   <p>Email : ` + response.data.email + `</p>\
                `);
                $('#modalDetail').modal('show')
            },
            error: function(e) {
                getError(e)
            },
        })
    }

    function clearModal(type){
        $('#image_user').attr("src","");
        $('#content_user').empty()
        if(type == 2){
            $('#modalDetail').modal('hide')
        }

    }

    function getSuccess(msg, results) {
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: msg,
            showConfirmButton: false,
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

<?php include 'include/footer.php'; ?>