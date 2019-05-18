<div class="col">
<!-- MAIN Col BEGIN  -->
    <a id="top-content"></a> <!-- Marker for "Jump to top" -->
    <main role="main" class=" pt-3 px-4">
    <!-- pageContent BEGIN -->

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2  font-weight-bold">Stream: <?=$cam_name?></h1>
            <button class="btn btn-primary btn-l js-scroll-trigger" onclick="window.location.href = '<?=base_url("camera/disable_stream/$cam_id")?>';">BACK</button>


        </div>
        <body  onLoad=" setTimeout('refreshIt()',1000)">
        <div class="stream">
            <img src="<?= base_url("public/stream/$cam_id.jpg") ?>" name="myCam">
        </div>
        </body>


    </main>
    <!-- pageContent END -->
</div>

<script>
    function refreshIt() {
        if (!document.images) return;
        document.images['myCam'].src = "<?= base_url("public/stream/$cam_id.jpg?") ?>" + Math.random();
        setTimeout('refreshIt()', 50);
    }
</script>
