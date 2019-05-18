
<div class="col">
    <!-- MAIN Col BEGIN  -->
    <a id="top-content"></a> <!-- Marker for "Jump to top" -->
    <main role="main" class=" pt-3 px-4">
        <!-- pageContent BEGIN -->

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2  font-weight-bold">Camera</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
<!--                <a class="btn  js-scroll-trigger sign_in_botton" href="--><?//=base_url('profile/add_group')?><!--">Add Group</a>-->

            </div>

        </div>
        <!-- CONTENT -->
<!--            <h2>Update post</h2>-->
            <?php echo validation_errors('<div class="error">', '</div>'); $cam_id = $camera['cam_id'];?>

            <?= form_open("camera/update_camera/$cam_id", 'class="sing_in_form col-md-6 mb-3"'); ?>
        <form class="needs-validation sing_in_form col-md-6 mb-3" novalidate>
            <div class="form-group">
                <label for="text-white">Group Name</label>
                <input type="text" class="form-control" id="cam_name" placeholder="Group Name" name="cam_name" value="<?=$camera['cam_name']?>" required pattern="[a-zA-Z0-9\S+]{0-20}" >
<!--                <small  class="form-text">You can use letters, number and whitespace.</small>-->

            </div>
            <div class="form-group">
                <label for="text-white">Group Id</label>
                <input type="text" class="form-control" id="cam_id" placeholder="Group Id" name="cam_id" value="<?=$camera['cam_id']?>"  disabled >
<!--                <small  class="form-text">You can use letters, number and whitespace.</small>-->

            </div>

            <div class="form-group">
                <label for="text-white">Status</label>
<!--                <input type="text" class="form-control" id="status" placeholder="Status" name="status" value="--><?//=$camera['status']?><!--" required pattern="[a-zA-Z0-9\S+]{0-20}" >-->
<!--                <small  class="form-text">You can use letters, number and whitespace.</small>-->
                <select class="custom-select" id="status" name="status" value="<?=$camera['status']?>" required pattern="[a-zA-Z0-9\S+]{0-20}">
                    <option selected><?=$camera['status']?></option>
                    <?php if($camera['status'] == 'enable'): ?>
                        <option value="disable">disable</option>
                    <?php else: ?>
                        <option value="enable">enable</option>
                    <?php endif; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="text-white">Location</label>
                <input type="text" class="form-control" id="location" placeholder="Location" name="location" value="<?=$camera['location']?>" required pattern="[a-zA-Z0-9\S+]{0-20}" >
<!--                <small  class="form-text">You can use letters, number and whitespace.</small>-->

            </div>

            <div class="form-group">
                <label for="text-white">Group Name</label>
<!--                <input type="text" class="form-control" id="group_name" placeholder="Group Name" name="group_name" value="--><?//=$camera['group_name']?><!--" required" >-->
<!--                <small  class="form-text">You can use letters, number and whitespace.</small>-->
                <select class="custom-select" id="group_id" name="group_id" value="<?=$camera['group_name']?>" required pattern="[a-zA-Z0-9\S+]{0-20}">
                    <?php if($camera['group_name']== 'none'): ?>
                        <option selected><?=$camera['group_name']?></option>
                    <?php endif;?>
                    <?php foreach ($groups as $group): ?>

                        <option value="<?=$group['group_id']?>"><?=$group['group_name']?></option>
<!--                    <option value="disable">disable</option>-->
                    <?php endforeach; ?>
                </select>
            </div>


<!--            <div>-->
<!--                --><?php
//                echo form_label('CamName: ','cam_name') . '<br>';
//                $data = ['name' => 'cam_name', 'id' => 'cam_name', 'value' => $camera['cam_name']];
//                echo form_input($data);
//                ?>
<!--            </div>-->
<!--            <div>-->
<!--                --><?php
//                echo form_label('CamId: ','cam_id') . '<br>';
//                $data = ['name' => 'cam_id', 'id' => 'cam_id', 'value' => $camera['cam_id']];
//                echo form_input($data);
//                ?>
<!--            </div>-->
<!--           <div>-->
<!--                --><?php
//                echo form_label('Status: ','status') . '<br>';
//                $data = ['name' => 'status', 'id' => 'status', 'value' => $camera['status']];
//                echo form_input($data);
//                ?>
<!--            </div>-->
<!--            <div>-->
<!--                --><?php
//                echo form_label('Location: ','location') . '<br>';
//                $data = ['name' => 'location', 'id' => 'location', 'value' => $camera['location']];
//                echo form_input($data);
//                ?>
<!--            </div>-->
<!--            <div>-->
<!--                --><?php
//                echo form_label('GroupName: ','group_name') . '<br>';
//                $data = ['name' => 'group_name', 'id' => 'group_name', 'value' => $camera['group_name']];
//                echo form_input($data);
//                ?>
<!--            </div>-->
<!--            --><?php
////            print_r($camera);
//            ?>


            <!--            <div class="form-row">-->


<!--            <div class="mb-3">-->
<!--                <label for="validationTooltip02"></label>-->
<!--                <input type="text" class="form-control" id="validationTooltip02" placeholder="Group Id" required>-->
<!--                <div class="valid-tooltip">-->
<!--                    Looks good!-->
<!--                </div>-->
<!--            </div>-->

            <!--            <div class="custom-file">-->
            <!--                <input type="file" class="custom-file-input" id="customFile">-->
            <!--                <label class="custom-file-label" for="customFile">Choose file</label>-->
            <!--            </div>-->


            <!--            </div>-->
            <div class="submit_botton">
                <button class="btn btn-primary btn-xl js-scroll-trigger" type="submit">Submit</button>
            </div>
        </form>
            <?= form_close(); ?>






    </main>
    <!-- pageContent END -->
</div>
<!-- Main Col END -->
</div>
<!-- body-row END -->
</div>