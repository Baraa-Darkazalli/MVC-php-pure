<?php  include(VIEWS.'inc'.DS.'header.php'); ?>

    <h1 class="text-center  mt-5 py-2">First 20 Food</h1>
    <h5 class="text-center  mb-5">Home Page</h6>

    <div class="container">
        <div class="row col-10 mx-auto mb-4">
            <form class="d-flex" role="search" method="post" action="<?php url('home/search'); ?>">
                <input class="form-control me-2" type="text" placeholder="Search" aria-label="Search" name="text">
                <button class="btn btn-outline-success" type="submit" name="submit">Search </button>
            </form>
        </div>
        
        <div class="row">
            <div class="col-10 mx-auto p-4 border mb-5">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col"><a class="nav-link dropdown-toggle" href="<?php url('home/order/ndb_no/'.($sort??"ASC")) ?>" role="button">ID</a></th>
                            <th scope="col"><a class="nav-link dropdown-toggle" href="<?php url('home/order/long_desc/'.($sort??"ASC")) ?>" role="button">Name</a></th>
                            <th scope="col">Show NutData</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach($foods as $food):  ?>
                            <tr>
                                <td><?php echo $food['ndb_no']; ?></td>
                                <td><?php echo $food['long_desc']; ?></td>
                                <td>
                                    <a href="<?php url('nutData/showNutData/'.$food['ndb_no'].'/'.$food['long_desc']) ?>" class="btn btn-primary" >Show NutData</a>
                                </td>
                            </tr>
                        <?php  endforeach; ?>
                    </tbody>
                </table>


            </div>
        </div>
    </div>

<?php  include(VIEWS.'inc'.DS.'footer.php'); ?>


