
<div class="col">
    <!-- MAIN Col BEGIN  -->
    <a id="top-content"></a> <!-- Marker for "Jump to top" -->
    <main role="main" class=" pt-3 px-4">
        <!-- pageContent BEGIN -->

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2  font-weight-bold">Found Person</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
<!--                <a class="btn  js-scroll-trigger sign_in_botton" href="--><?//=base_url("person/add_person/")?><!--">Add Person</a>-->

            </div>

        </div>
        <?php if(isset($founds) && isset($groups)) { ?>
<!--            --><?php //for($i=0; $i < count($groups); $i++): ?>
<!--                <br>-->
<!--            <h2>--><?//= $groups[$i]['group_name']?><!--</h2>-->
            <table class="table table-hover" style="margin-top: 40px" id="camera">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Group</th>
<!--                    <th scope="col">Person Id</th>-->
                    <th scope="col">Camera</th>
                    <th scope="col">Location</th>
                    <th scope="col">Timestamp</th>
                    <th scope="col">Confidence</th>
                    <!--                    <th scope="col">Status</th>-->
                    <th scope="col"></th>
                    <!--                        <th scope="col">Location</th>-->
                    <!--                        <th scope="col">Group Name</th>-->
                    <!--                        <th colspan="3">Action</th>-->
                </tr>
<!--                --><?php //print_r($cameras)?>
                <?php for($i=0; $i < count($groups); $i++): ?>
                <tr>
                    <?php $n = $i+1; ?>
                    <th scope="row"><?= $n ?></th>
                    <td><?=$groups[$i]['group_name']?></td>
                </tr>
                </thead>
<!--                --><?php //$i = 0; ?>

<!--                    --><?php //$i++; ?>

                    <?php for($j=0; $j < count($founds[$i]); $j++): ?>
<!--                    --><?php //foreach ($found as $value):  ?>
                    <?php
//                    $person_id = $person['person_id'];
                    ?>

                    <tbody>
                    <!--                    --><?php //$group_id = $group['group_id']?>
                    <tr >
                        <th scope="row"></th>
                        <td style="padding-left: 60px;"><a </a><img src="<?=base_url('public/upload/thumbnail/'.$founds[$i][$j]['person_img'])?>">&nbsp;&nbsp;<?= $founds[$i][$j]['person_name']?></td>
<!--                        --><?php //print_r($cameras[$i])?>
<!--                        --><?php //if(isset($cameras[$i]['cam_name'])) { ?>
<!--                            <td>--><?//=$cameras[$i]['cam_name']?><!--</td>-->
<!--                            <td>--><?//=$cameras[$i]['location']?><!--</td>-->
<!--                        --><?php //} else { ?>
<!--                            <td>--><?//='-'?><!--</td>-->
<!--                            <td>--><?//='-'?><!--</td>-->
<!--                        --><?php //}; ?>
                        <?php $len = count($founds[$i][$j]['found_list']);?>
                        <?php if( $len != 0) { ?>
                            <?php $len = $len - 1; ?>
                            <td><?= $founds[$i][$j]['found_list'][$len]['cam_name']?></td>
                            <td><?= $founds[$i][$j]['found_list'][$len]['location']?></td>
                            <td><?= $founds[$i][$j]['found_list'][$len]['timestamp']?></td>
                            <td><?=  $founds[$i][$j]['found_list'][$len]['confidence']?></td>

                        <?php } else { ?>
                            <td><?='-'?></td>
                            <td><?='-'?></td>
                            <td><?='-'?></td>
                            <td><?='-'?></td>
                        <?php }; ?>


                        <!--                            <td>--><?//= $camera['location']?><!--</td>-->
                        <!--                            <td>--><?//= $camera['group_name']?><!--</td>-->
                        <!--                            <td><a href="--><?//= base_url("accommodation/update/") ?><!--">Update</a></td>-->
                        <!--                            <td><a href="--><?//= base_url("accommodation/delete/") ?><!--" onclick="return confirm('Are you sure?')">Delete</a></td>-->
                    </tr>

                    </tbody>
                    <?php endfor; ?>
                <?php endfor; ?>
            </table>

        <?php } else { ?>
            <h4 style="text-align: center">Not Found</h4>
        <?php }; ?>




    </main>
    <!-- pageContent END -->
</div>
<!-- Main Col END -->
