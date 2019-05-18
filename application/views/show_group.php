
    <div class="col">
        <!-- MAIN Col BEGIN  -->
        <a id="top-content"></a> <!-- Marker for "Jump to top" -->
        <main role="main" class=" pt-3 px-4">
            <!-- pageContent BEGIN -->

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h1 class="h2  font-weight-bold">Group</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <a class="btn  js-scroll-trigger sign_in_botton" href="<?=base_url('group/add_group')?>">Add Group</a>

                </div>

            </div>
            <?php if(isset($groups)) { ?>
                <table class="table table-hover" style="margin-top: 40px" id="camera">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Id</th>
                        <th scope="col">Number of persons</th>
                        <th scope="col"></th>
<!--                        <th scope="col">Location</th>-->
<!--                        <th scope="col">Group Name</th>-->
<!--                        <th colspan="3">Action</th>-->
                    </tr>
                    </thead>
                    <?php $i = 0; ?>
                    <?php foreach ($groups as $group):  ?>
                        <?php $i++; ?>
                        <tbody>
                        <?php  $group_id = $group['group_id'];?>
                        <tr >
                            <th scope="row"><?= $i ?></th>
                            <td><a href="<?= base_url("person/show_person/$group_id") ?>" </a><?= $group['group_name']?></td>
                            <td><?= $group['group_id']?></td>
                            <td><?= $group['person_sn']?></td>
                            <td class="nav-item dropdown ">
<!--                                <li class="nav-item dropdown">-->
                                    <a class="nav-link far fa-edit" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <?php
//                                            $group_id = $group['group_id'];
//                                            $group_sn = $group['group_sn'];
                                        ?>
                                        <a class="dropdown-item" href="<?= base_url("person/add_person/$group_id") ?>">add person</a>
                                        <a class="dropdown-item" href="<?= base_url("person/show_person/$group_id") ?>">delete person</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?=base_url("group/delete_group/$group_id")?>" onclick="return confirm('Are you sure?')">delete</a>
                                    </div>
<!--                                </li>-->
                            </td>

<!--                            <td>--><?//= $camera['location']?><!--</td>-->
<!--                            <td>--><?//= $camera['group_name']?><!--</td>-->
<!--                            <td><a href="--><?//= base_url("accommodation/update/") ?><!--">Update</a></td>-->
<!--                            <td><a href="--><?//= base_url("accommodation/delete/") ?><!--" onclick="return confirm('Are you sure?')">Delete</a></td>-->
                        </tr>

                        </tbody>
                    <?php endforeach; ?>
                </table>
            <?php } else { ?>
                <h4 style="text-align: center">Not Found</h4>
            <?php }; ?>




        </main>
        <!-- pageContent END -->
    </div>
    <!-- Main Col END -->
</div>
<!-- body-row END -->
</div>