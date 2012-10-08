<?php
    define('_BBC_PAGE_NAME', '[404] v1_ '.$_SERVER['REQUEST_URI']);
    define('_BBCLONE_DIR', '/homez.548/parmotsez/www/bbclone/');
    define('COUNTER', _BBCLONE_DIR . 'mark_page.php');
    if (is_readable(COUNTER)) include_once(COUNTER);
?>
<?php include('inc/config.inc.php'); ?>
<?php include('inc/head.inc.php'); ?>

<body>

    <div id="body-core" class="is404">
        <div>
            <h1>Hélas…</h1>
            <p>Il n’y a rien ici. <br>Pourquoi ne pas <br><a href="<?php echo PATH; ?>" class="bordered">retourner à l’accueil&nbsp;?</a></p>
        </div>
    </div><!-- /#body-core -->
    
</body>
</html>