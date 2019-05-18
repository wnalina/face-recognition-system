<html>
<head>
    <title>ThaiCreate.Com PHP Upload Resize</title>
</head>
<body>
<?= form_open("person/resize", 'class="sing_in_form col-md-6 mb-3"'); ?>
<form  method="post" enctype="multipart/form-data">
    <table width="343" border="1">
        <tr>
            <td>Upload</td>
            <td><input name="file" id="file" type="file"></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="submit" name="submit" id="submit" value="submit"></td>
        </tr>
    </table>
</form>
<?= form_close(); ?>
</body>
</html>