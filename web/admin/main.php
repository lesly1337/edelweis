
<div class="accordion" id="accordionExample">

    <div class="card">

        <div class="card-header" id="headingOne">
        <h2 class="mb-0">
            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Edit Articles
            </button>
        </h2>
        </div>

        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body">
        <?php require "edit_articles.php"; ?>
        </div>
        </div>
        
    </div>

    <div class="card">

        <div class="card-header" id="headingTwo">
        <h2 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Edit Info
            </button>
        </h2>
        </div>

        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
        <div class="card-body">
        <?php require "edit_info.php"; ?>
        </div>
        </div>

    </div>

</div>
