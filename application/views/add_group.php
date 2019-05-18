<div class="col">
    <!-- MAIN Col BEGIN  -->
    <a id="top-content"></a> <!-- Marker for "Jump to top" -->
    <main role="main" class=" pt-3 px-4">
        <!-- pageContent BEGIN -->

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2  font-weight-bold">Add Group</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
<!--                <a class="btn  js-scroll-trigger sign_in_botton" href="--><?//=base_url('profile/add_group')?><!--">Add Group</a>-->

            </div>

        </div>

        <?php echo validation_errors('<div class="error">', '</div>'); ?>

        <?= form_open('group/add_group', 'class="sing_in_form col-md-6 mb-3"'); ?>
        <form >
            <div class="form-group">
                <label for="text-white"></label>
                <input type="text" class="form-control" id="group_name" placeholder="Group Name" name="group_name" required pattern="[a-zA-Z0-9\S+]{0-20}" >
                <small  class="form-text">You can use letters, number and whitespace.</small>

            </div>
<!--            <div class="form-group">-->
<!--                <label for="text-white"></label>-->
<!--                <input type="text" class="form-control" id="group_id" placeholder="Group Id" name="group_id">-->
<!---->
<!--            </div>-->
            <!--                <div class="form-group form-check">-->
            <!--                    <input type="checkbox" class="form-check-input" id="exampleCheck1">-->
            <!--                    <label class="form-check-label" for="exampleCheck1">Check me out</label>-->
            <!--                </div>-->
            <div class="submit_botton">
                <button class="btn btn-primary btn-xl js-scroll-trigger" type="submit">Submit</button>
            </div>
        </form>
        <?= form_close(); ?>


<!--        <form class="needs-validation sing_in_form col-md-6 mb-3" novalidate>-->
<!---->
<!--            <div class="mb-3">-->
<!--                <label for="validationTooltip01"></label>-->
<!--                <input type="text" class="form-control" id="validationTooltip01" placeholder="Group Name" required>-->
<!--                <div class="valid-tooltip">-->
<!--                    Looks good!-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="mb-3">-->
<!--                <label for="validationTooltip02"></label>-->
<!--                <input type="text" class="form-control" id="validationTooltip02" placeholder="Group Id" required>-->
<!--                <div class="valid-tooltip">-->
<!--                    Looks good!-->
<!--                </div>-->
<!--            </div>-->
<!---->
<!---->
<!--            <div class="submit_botton">-->
<!--                <button class="btn btn-primary btn-xl js-scroll-trigger" type="submit">Submit</button>-->
<!--            </div>-->
<!--        </form>-->




    </main>
    <!-- pageContent END -->
</div>
<!-- Main Col END -->
</div>
<!-- body-row END -->
</div>