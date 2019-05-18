<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<html>
<head>
    <title>Demo Page</title>
</head>
<body>

<h3>Multiple Files Upload</h3>

<?php //if(isset($errors)) { ?>
<!--    <ul>-->
<!--        --><?php //foreach ($errors as $error) { ?>
<!--            <li>--><?php //echo $error['error']; ?><!--</li>-->
<!--        --><?php //} ?>
<!--    </ul>-->
<?php //} ?>

<?php echo form_open_multipart('person/upload'); ?>
<input type="file" name="person_img[]" multiple="multiple" />

<input type="submit" value="Upload" />
<?php echo form_close(); ?>

</body>
</html>