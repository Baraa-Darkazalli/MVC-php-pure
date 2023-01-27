<?php  include(VIEWS.'inc'.DS.'header.php'); ?>

    <h1 class="text-center  my-5 py-3">View NutData For <?php echo $FoodName ?></h1>

    <div class="container">
        <div class="row">
            <div class="col-10 mx-auto p-4 border mb-5">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">Nutr Desc</th>
                        <th scope="col">Nutr Value</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach($nutData as $data):  ?>
                            <tr>
                                <td><?php echo $data['nutrdesc']; ?></td>
                                <td><?php echo $data['nutr_val']; ?></td>
                            </tr>
                        <?php  endforeach; ?>
                    </tbody>
                </table>


            </div>
        </div>
    </div>

<?php  include(VIEWS.'inc'.DS.'footer.php'); ?>


