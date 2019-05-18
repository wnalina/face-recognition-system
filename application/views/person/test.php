
<?= form_open("person/resize", 'class="sing_in_form col-md-6 mb-3"'); ?>
<form  method="POST" enctype="multipart/form-data">
<!--    <input type="hidden" name="MAX_FILE_SIZE" value="6144000" /><!--    6mb-->-->
<!--    <input type="hidden" name="MIN_FILE_SIZE" value="1000" /><!--    100kb-->-->
    <input type="file" name="file[]" id="file" accept="image/jpg, image/jpeg" multiple><br><br>
    <input type="submit" value="submit">
</form>
<?= form_close(); ?>