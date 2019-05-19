<div class="col">
    <!-- MAIN Col BEGIN  -->
    <a id="top-content"></a> <!-- Marker for "Jump to top" -->
    <main role="main" class=" pt-3 px-4">
        <!-- pageContent BEGIN -->

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2  font-weight-bold">Add Person</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <!--                <a class="btn  js-scroll-trigger sign_in_botton" href="--><?//=base_url('profile/add_group')?><!--">Add Group</a>-->

            </div>

        </div>

        <?php echo validation_errors('<div class="error">', '</div>'); ?>

        <?= form_open_multipart("person/add_person/$group_id", 'class="sing_in_form col-md-6 mb-3"'); ?>

        <form enctype="multipart/form-data">
            <div class="form-group">
                <label for="text-white"></label>
                <input type="text" class="form-control" id="person_name" placeholder="Person Name" name="person_name" required >
<!--                <small  class="form-text">You can use letters, number and whitespace        .</small>-->

            </div>
            <div class="custom-file mb-3" style="margin-top: 1rem">
                <label class="custom-file-label" for="customFile">Choose file</label>
                <input type="file" class="custom-file-input"name="person_img[]" id="person_img" multiple="multiple" accept="image/jpg, image/jpeg" required >
                <small  class="form-text">max size is 6MB.</small>
            </div>
            <div class="submit_botton">
                <button class="btn btn-primary btn-xl js-scroll-trigger" type="submit">Submit</button>
            </div>


        </form>

        <?= form_close(); ?>


    </main>
    <!-- pageContent END -->
</div>

<script>
    $(function(){
        $('form').submit(function(){
            var isOk = true;
            $('input[type=file][data-max-size]').each(function(){
                if(typeof this.files[0] !== 'undefined'){
                    var maxSize = parseInt($(this).attr('max-size'),10),
                        size = this.files[0].size;
                    isOk = maxSize > size;
                    return isOk;
                }
            });
            return isOk;
        });
    });
</script>
<!-- Main Col END -->
</div>
<!-- body-row END -->
</div>