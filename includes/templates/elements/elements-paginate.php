<?php
$paged = isset($_REQUEST['paged']) ? $_REQUEST['paged'] : 1;
?>
<div class="tablenav-pages"><span class="displaying-num"><?= $total_items ?> items</span>
    <span class="pagination-links">

    <?php if($paged>1): ?>
        <a class="first-page button" href="admin.php?page=ec_order&paged=1">
            <span class="screen-reader-text">First page</span>
            <span aria-hidden="true">«</span>
        </a>
        <a class="prev-page button" href="admin.php?page=ec_order&paged=<?=$paged-1?>">
            <span class="screen-reader-text">Previous page</span>
            <span aria-hidden="true">‹</span>
        </a>
    <?php else: ?>
        <span class="tablenav-pages-navspan button disabled" aria-hidden="true">«</span>
        <span class="tablenav-pages-navspan button disabled" aria-hidden="true">‹</span>
    <?php endif; ?>




        <span class="screen-reader-text">Current Page</span>
        <span id="table-paging" class="paging-input">
            <span class="tablenav-paging-text"><?= $paged ?> of <span class="total-pages"><?=$total_pages?></span></span>
        </span>

        <?php if($paged < $total_pages): ?>
        <a class="next-page button" href="admin.php?page=ec_order&paged=<?=$paged+1?>">
            <span class="screen-reader-text">Next page</span>
            <span aria-hidden="true">›</span>
        </a>
        <a class="last-page button" href="admin.php?page=ec_order&paged=<?=$total_pages?>">
            <span class="screen-reader-text">Last page</span>
            <span aria-hidden="true">»</span>
        </a>
        <?php else: ?>
        <span class="tablenav-pages-navspan button disabled" aria-hidden="true">»</span>
        <span class="tablenav-pages-navspan button disabled" aria-hidden="true">›</span>
        <?php endif; ?>
    </span>
</div>