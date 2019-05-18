<!--<div class="row" id="body-row">-->
    <!-- Bootstrap body-row BEGIN -->
    <!-- Sidebar -->
<!--    <div id="sidebar-container" class="sidebar-expanded d-none d-md-block">-->
        <!-- sidebar-container BEGIN -->
<!--        <ul class="list-group">-->
            <!-- Bootstrap List Group -->
<!--            <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed"><small>MAIN MENU</small></li>-->
<!--            <a href="#submenu1" data-tooltip="true" data-placement="top" title="Server Tools" data-hassubmenu="true" data-toggle="collapse" aria-expanded="false" class="bg-mac list-group-item list-group-item-action flex-column align-items-start">-->
<!--                <div class="d-flex w-100 justify-content-start align-items-center"><span class="fas fa-tachometer-alt fa-fw mr-3"></span><span class="menu-collapsed">Dashboard</span><span class="submenu-icon ml-auto"></span></div>-->
<!--            </a>-->
<!--            <div id="submenu1" class="collapse sidebar-submenu">-->
<!--                <a href="phpinfo.php" data-tooltip="true" data-placement="top" title="Read the PHP Configuration" class="bg-mac list-group-item list-group-item-action"><span class="menu-collapsed">PHP Info</span></a>-->
<!--                <a href="sub02link" data-tooltip="true" data-placement="top" title="Edit Appache vhosts.conf" class="bg-mac list-group-item list-group-item-action"><span class="menu-collapsed">vhosts</span></a>-->
<!--            </div>-->
<!--            <a href="#submenu2" data-tooltip="true" data-placement="top" title="New Projects Development" data-hassubmenu="true" data-toggle="collapse" aria-expanded="false" class="bg-mac list-group-item list-group-item-action flex-column align-items-start">-->
<!--                <div class="d-flex w-100 justify-content-start align-items-center"><span class="far fa-edit fa-fw mr-3"></span><span class="menu-collapsed">New Project</span><span class="submenu-icon ml-auto"></span></div>-->
<!--            </a>-->
<!--            <div id="submenu2" class="collapse sidebar-submenu">-->
<!--                <a href="newProject.php" data-tooltip="true" data-placement="top" title="Creat new project" class="bg-mac list-group-item list-group-item-action"><span class="menu-collapsed">new Project</span></a>-->
<!--                <a href="sub02link" data-tooltip="true" data-placement="top" title="sub02tooltip" class="bg-mac list-group-item list-group-item-action"><span class="menu-collapsed">sub02title</span></a>-->
<!--            </div>-->
<!--            <li class="sidebar-separator menu-collapsed"></li>-->
<!--            <a href="sub03link" data-tooltip="true" data-placement="top" title="tooltip1" class="bg-mac list-group-item list-group-item-action">-->
<!--                <div class="d-flex w-100 justify-content-start align-items-center"><span class="fas fa-tachometer-alt fa-fw mr-3"></span><span class="menu-collapsed">title1</span></div>-->
<!--            </a>-->
<!--            <a href="#" data-toggle="sidebar-collapse" class="bg-mac list-group-item list-group-item-action d-flex align-items-center">-->
<!--                <div class="d-flex w-100 justify-content-start align-items-center"><span id="collapse-icon" class="fa fa-2x mr-2 text-warning"></span><span id="collapse-text" class="menu-collapsed">Close Sidebar</span></div>-->
<!--            </a>-->

<!--        </ul>-->
        <!-- List Group END-->
<!--    </div>-->
    <!-- sidebar-container END -->
    <div class="col">
        <!-- MAIN Col BEGIN  -->
        <a id="top-content"></a> <!-- Marker for "Jump to top" -->
        <main role="main" class=" pt-3 px-4">
            <!-- pageContent BEGIN -->

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h1 class="h2  font-weight-bold">Camera</h1>
                <div class="btn-toolbar mb-2 mb-md-0">




                    <!--            <div class="btn-group mr-2">-->
                    <!--                <button class="btn btn-sm btn-outline-secondary">Share</button>-->
                    <!--                <button class="btn btn-sm btn-outline-secondary">Export</button>-->
                    <!--            </div>-->
                    <!--            <button class="btn btn-sm btn-outline-secondary dropdown-toggle">-->
                    <!--                <span data-feather="calendar"></span> This week-->
                    <!--            </button>-->
                </div>

            </div>
            <?php if(isset($cameras)) { ?>
                <table class="table table-hover" style="margin-top: 40px" id="camera">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Id</th>
                        <th scope="col">Status</th>
                        <th scope="col">Location</th>
                        <th scope="col">Group Name</th>
                        <th colspan=""></th>
                    </tr>
                    </thead>
                    <?php $i = 0; ?>
                    <?php foreach ($cameras as $camera):  ?>
                        <?php $i++; ?>
                        <tbody>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $camera['cam_name']?></td>
                            <td><?= $camera['cam_id']?></td>
                            <td><?= $camera['status']?></td>
                            <td><?= $camera['location']?></td>
                            <td><?= $camera['group_name']?></td>
                            <?php $cam_id = $camera['cam_id']; ?>
<!--                            <td><a href="--><?//= base_url("profile/update_camera/$cam_id") ?><!--">Update</a></td>-->
<!--                            <td><a href="--><?//= base_url("camera/update_camera/$cam_id") ?><!--">Update</a></td>-->
<!--                            <td><a href="--><?//= base_url("camera/delete_camera/$cam_id") ?><!--" onclick="return confirm('Are you sure?')">Delete</a></td>-->
                            <td class="nav-item dropdown ">
                                <!--                                <li class="nav-item dropdown">-->
                                <a class="nav-link far fa-edit" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <?php
                                    //                                            $group_id = $group['group_id'];
                                    //                                            $group_sn = $group['group_sn'];
                                    ?>
                                    <a class="dropdown-item" href="<?= base_url("camera/update_camera/$cam_id") ?>">update</a>
                                    <a class="dropdown-item" href="<?= base_url("camera/delete_camera/$cam_id") ?>" onclick="return confirm('Are you sure?')">delete</a>
                                </div>
                                <!--                                </li>-->
                            </td>
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