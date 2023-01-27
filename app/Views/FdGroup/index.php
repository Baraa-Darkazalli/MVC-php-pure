<?php  include(VIEWS.'inc'.DS.'header.php'); ?>

    <h1 class="text-center mt-5 py-3">All Food Groups</h1>
    <div class="container">
        <div class="text-center mb-5">
            <a href="<?php url('fdGroup/showAddView') ?>" class="btn btn-primary btn-block" >Add New Group</a>
        </div>
        <div class="row">
            
            <?php  include(VIEWS.'inc'.DS.'messages.php'); ?>

            <div class="col-10 mx-auto p-4 border mb-5">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach($groups as $group):  ?>
                            <tr>
                                <td><?php echo $group['fdgrp_cd']; ?></td>
                                <td><?php echo $group['fddrp_desc']; ?></td>
                                <td>
                                    <a href="<?php url('/fdGroup/delete/'.$group['fdgrp_cd']) ?>" onclick="return confirm('Are you sure you want to delete this item')" class="btn btn-danger" >Delete</a>
                                </td>
                            </tr>
                        <?php  endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php  include(VIEWS.'inc'.DS.'footer.php'); ?>


