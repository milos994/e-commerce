<?php require_once 'app/views/_global/beforeContent.php'; ?>

	<article>
            <h1><?php echo htmlspecialchars($DATA['page']->title); ?></h1>
            <div class="page-content">
                    <?php echo $DATA['page']->content; ?>
            </div>
	</article>

<?php require_once 'app/views/_global/afterContent.php'; ?>