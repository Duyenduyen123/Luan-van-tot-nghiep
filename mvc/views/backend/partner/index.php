<div class="title_left">
    <h3>Danh sách các đối tác</h3>
</div>
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_content">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User name</th>
                            <th>Name (School)</th>
                            <th>Image</th>
                            <th>Email</th>
                            <th>Country</th>
                            <th>Address</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            if(isset($data['list_partner'])){
                                foreach($data['list_partner'] as $key => $partner){ ?>
                                <tr>
                                    <th scope="row"><?php echo ($key+1) ?></th>
                                    <td><?php echo $partner->user_name ?></td>
                                    <td><?php echo $partner->name ?></td>
                                    <td>
                                        <?php 
                                            if($partner->image!=""){ ?>
                                                <img height="50" width="50" style="object-fit:cover" src="./public/uploads/<?php echo $partner->image ?>" alt="">
                                            <?php }else{ ?>
                                                <img height="50" width="50" style="object-fit:cover" src="https://i.pinimg.com/280x280_RS/2e/45/66/2e4566fd829bcf9eb11ccdb5f252b02f.jpg" alt="">
                                            <?php }  ?>
                                    </td>
                                    <td>
                                        <?php echo $partner->email ?>
                                    </td>
                                    <td>
                                        <?php echo $partner->country ?>
                                    </td>
                                    <td>
                                        <?php echo $partner->address ?>
                                </tr>
                        <?php  }  } ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>