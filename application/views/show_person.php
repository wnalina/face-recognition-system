
<div class="col">
    <!-- MAIN Col BEGIN  -->
    <a id="top-content"></a> <!-- Marker for "Jump to top" -->
    <main role="main" class=" pt-3 px-4">
        <!-- pageContent BEGIN -->

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2  font-weight-bold">Group</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a class="btn  js-scroll-trigger sign_in_botton" href="<?=base_url("person/add_person/$group_id")?>">Add Person</a>

            </div>

        </div>
        <div>
            <?php if(isset($_SESSION['notify_message'])) {?>
                <?='<script language="javascript">';?>
                <?='alert("'.$_SESSION['notify_message'].'")';?>
                <?='</script>';?>
<!--                <strong>--><?//= $_SESSION['notify_message']; ?><!--</strong>-->
            <?php } ?>
        </div>

        <?php if(isset($persons)) { ?>
            <table class="table table-hover" style="margin-top: 40px" id="camera">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Name</th>
<!--                    <th scope="col">Id</th>-->
                    <th scope="col">Number of face added</th>
<!--                    <th scope="col">Status</th>-->
                    <th scope="col"></th>
                    <!--                        <th scope="col">Location</th>-->
                    <!--                        <th scope="col">Group Name</th>-->
                    <!--                        <th colspan="3">Action</th>-->
                </tr>
                </thead>
                <?php $i = 0; ?>
                <?php foreach ($persons as $person):  ?>
                    <?php
                    $person_id = $person['person_id'];
                    ?>
                    <?php $i++; ?>
                    <tbody>
<!--                    --><?php //$group_id = $group['group_id']?>
                    <tr >
                        <th scope="row"><?= $i ?></th>
                        <td><img class="img-fit" src="<?=base_url('public/upload/thumbnail/').$person['person_img']?>"></td>
                        <td><a href="<?= base_url("person/add_face/$person_id/$group_id") ?>" </a><?= $person['person_name']?></td>
<!--                        <td>--><?//= $person['person_id']?><!--</td>-->
                        <td><?= $person['count_img']?></td>
                        <td class="nav-item dropdown ">
                            <!--                                <li class="nav-item dropdown">-->
                            <a class="nav-link far fa-edit" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item" href="<?= base_url("person/delete_person/$person_id/$group_id") ?>">delete</a>
                                <a class="dropdown-item" href="<?= base_url("person/add_face/$person_id/$group_id") ?>">add face</a>
<!--                                <a class="dropdown-item" href="#group">delete person</a>-->
<!--                                <div class="dropdown-divider"></div>-->
<!--                                <a class="dropdown-item" href="#">delete</a>-->
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
