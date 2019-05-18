<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<html>
<head>
    <title>Success Page</title>
</head>
<body>

<h3>File Uploads Info</h3>

<table cellpadding="2" cellspacing="2" border="1">
    <tr>
        <th>File Name</th>
        <th>File Type</th>
        <th>File Size</th>
        <th>Photo</th>
    </tr>
    <?php foreach ($fileInfos as $fileInfo) { ?>
        <tr>
            <td><?php echo $fileInfo['fileInfo']['file_name']; ?></td>
            <td><?php echo $fileInfo['fileInfo']['file_type']; ?></td>
            <td><?php echo $fileInfo['fileInfo']['file_size']; ?> byte(s)</td>
            <td>
                <img src="<?= base_url('upload/'); ?><?php echo $fileInfo['fileInfo']['file_name']; ?>" width="50">
            </td>
        </tr>
    <?php } ?>
</table>

</body>
</html>