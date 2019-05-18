
<div class="col">
    <!-- MAIN Col BEGIN  -->
    <a id="top-content"></a> <!-- Marker for "Jump to top" -->
    <main role="main" class=" pt-3 px-4">
        <!-- pageContent BEGIN -->

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2  font-weight-bold">Track Person</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a class="btn  js-scroll-trigger sign_in_botton" href="<?=base_url("person/add_person/")?>">Add Person</a>

            </div>

        </div>

        <?php echo validation_errors('<div class="error">', '</div>');?>

        <?= form_open("person/track_person/", 'class="sing_in_form col-md-6 mb-3"'); ?>
        <form class="needs-validation sing_in_form col-md-6 mb-3" novalidate>

            <div class="form-row">

                <div class="col-5">
                    <label for="text-white">Group Name</label>
                        <select class="custom-select" id="group_id" name="group_id" value="" required pattern="[a-zA-Z0-9\S+]{0-20}" onChange="changecat(this.value);">
                        <option value="" disabled selected>Select</option>

                        <?php foreach ($groups as $group): ?>

                            <option value="<?=$group['group_id']?>"><?=$group['group_name']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-5">
                    <label for="text-white">Person Name</label>
                    <select class="custom-select" id="person_id" name="person_id" value="<?php if(isset($person_id)){ echo $person_id;}?>" required pattern="[a-zA-Z0-9\S+]{0-20}">
                        <option value="" disabled selected>Select</option>
                    </select>
                </div>

                <div class="col-2" style="padding-top: 2rem">
                    <button class="btn btn-primary btn-l js-scroll-trigger" type="submit">Submit</button>
                </div>
            </div>


        </form>
        <?= form_close(); ?>

        <?php if(isset($founds)) { ?>
<!--            --><?php //print_r($founds)?>
            <?php if($founds != 'none') { ?>

                <h2 style="margin-top: 60px; color: #f4623a"><?= 'Track: '.$person_name.' in Group: '.$group_name?></h2>
                <table class="table table-hover" style="margin-top: 40px" id="camera">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Timestamp</th>
                        <th scope="col">Location</th>
                        <th scope="col">Camera</th>
                        <th scope="col">Confidence</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <?php $n = 0; ?>
                    <?php for($i=count($founds)-1 ; $i >= 0 ; $i--): ?>
                        <?php $n = $n + 1; ?>

                        <tbody>
                        <tr >
                            <th scope="row"><?=$n;?></th>
                            <td><?= $founds[$i]['timestamp']?></td>
                            <td><?= $founds[$i]['location']?></td>
                            <td><?= $founds[$i]['cam_name']?></td>
                            <td><?=  $founds[$i]['confidence']?></td>
                        </tr>

                        </tbody>
                    <?php endfor; ?>
                </table>

            <?php } else { ?>
                <h4 style="text-align: center; margin-top: 60px;">Not Found</h4>
            <?php }; ?>
        <?php }else { ?>
<!--            <h4 style="text-align: center">Not Found</h4>-->
        <?php }; ?>





    </main>
    <!-- pageContent END -->
</div>
<!-- Main Col END -->

<!--dropdown-->
<script>

    var groups = <?php echo json_encode($groups);?>;
    var persons = <?php echo json_encode($persons);?>;
//
//    document.write(persons[0].length);
//    window.alert(5 + 6);

//    console.log(projects);
//    var mealsByCategory = {
//        '1-nalina': ["Soup", "Juice", "Tea", "Others"],
//        '1-tt': ["Soup", "Others"]
//    }
//
    function changecat(value) {
        if (value.length == 0) document.getElementById("person_id").innerHTML = "<option></option>";
        else {
            var catOptions = "";
//            catOptions += "<option value=\"\" disabled selected>Select</option>"
//            document.write(value);
            for (var i = 0; i < groups.length; i++) {
                if(value == groups[i].group_id)
                {
//                    document.write(value);
                    if(persons[i].length !== 0)
                    {
                        for (var j = 0; j < persons[i].length; j++) {
//                        document.write(persons[i][j].person_name);
                            catOptions += "<option value=\""+persons[i][j].person_id+"\">" + persons[i][j].person_name + "</option>";
                        }
                    }else
                    {
                        catOptions += "<option value=\"\" disabled selected>--not found--</option>"
                    }

                }

            }
            document.getElementById("person_id").innerHTML = catOptions;
        }
    }
</script>
