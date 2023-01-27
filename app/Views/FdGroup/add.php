<?php  include(VIEWS.'inc'.DS.'header.php'); ?>

    <h1 class="text-center  mt-5 mb-2 py-3">Add New Group</h1>
    <div class="container">
        <div class="row">
            <div class="col-8 mx-auto">
                <form class="p-5 border mb-5" method="POST" action="<?php url('fdGroup/add'); ?>">
                    <div class="form-group p-2">
                        <label for="ID">ID</label>
                        <span class="error" style="color:red;">* <?php echo $idErr??'';?></span>
                        <input type="text" required name="id" class="form-control" id="id">
                    </div>
                    <div class="form-group p-2">
                        <label for="name">Name</label>
                        <span class="error" style="color:red;">* <?php echo $nameErr??'';?></span>
                        <input type="text" required name="name" class="form-control" id="name">
                    </div>
                    <div class="p-2">
                        <button type="submit" name="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php  include(VIEWS.'inc'.DS.'footer.php'); ?>