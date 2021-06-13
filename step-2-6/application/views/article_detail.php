<div class="card">
    <div class="card-header">
        <h3 class="card-title">Detail Article</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <label for="publish_date">Publish Date</label>
                <input type="text" class="form-control datepicker" id="publish_date" name="publish_date" value="<?= $result->publish_date ?>" readonly>
            </div>
            <div class="col-md-6">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="<?= $result->title ?>" readonly>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control" value="<?= $result->description ?>" readonly><?= $result->description ?></textarea>
            </div>
            <div class="col-md-6">
                <label for="content">Content</label>
                <textarea name="content" id="content" cols="30" rows="10" class="form-control" value="<?= $result->content ?>" readonly><?= $result->content ?></textarea>
            </div>
        </div>
        <div class="mt-4">
            <button class="btn btn-info btn-block" onclick="backHome()"><b>Back to Home</b></button>
        </div>
    </div>
</div>

<script>
    function backHome(){
        window.location.href = "<?= base_url('home') ?>";
    }
</script>