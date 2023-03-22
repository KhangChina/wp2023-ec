<?php

$orderFunction = new ec_order();
$res = $orderFunction->paginate(2);
$count = $orderFunction->countAll();

//Gird 
$items = $res['results'];
$total_pages = $res['total_pages'];
$total_items = $res['total_items'];

//count data


$total_items_all = $count['total_items_all'];
$total_items_pending = $count['total_items_pending'];
$total_items_completed = $count['total_items_completed'];
$total_items_canceled = $count['total_items_canceled']


?>
<div class="wrap">
    <h1 class="wp-heading-inline">Order Managers</h1>
    <hr class="wp-header-end">


    <h2 class="screen-reader-text">Filter order list</h2>
    <ul class="subsubsub">
        <li class="all"><a href="admin.php?page=ec_order" class="current" aria-current="page">All<span class="count"> (<?= $total_items_all ?>)</span></a> |</li>
        <li class="publish"><a href="admin.php?page=ec_order&status_order=pending">New<span class="count"> (<?= $total_items_pending ?>)</span></a>|</li>
        <li class="publish"><a href="admin.php?page=ec_order&status_order=completed">Complete<span class="count"> (<?= $total_items_completed ?>)</span></a>|</li>
        <li class="publish"><a href="admin.php?page=ec_order&status_order=canceled">Cancel<span class="count"> (<?= $total_items_canceled ?>)</span></a>|</li>
    </ul>
    <form id="posts-filter" method="get">

        <p class="search-box">
            <label class="screen-reader-text" for="post-search-input">Search order:</label>
            <input type="search" id="post-search-input" name="search" value="" placeholder="#Order">
            <input type="submit" id="search-submit" class="button" value="Search Order">
        </p>

        <!-- Trả về page sau khi post data đi -->
        <input type="hidden" name="page" class="post_status_page" value="ec_order">
        <!-- <input type="hidden" name="post_type" class="post_type_page" value="post"> -->



        <input type="hidden" id="_wpnonce" name="_wpnonce" value="db0d4d542e"><input type="hidden" name="_wp_http_referer" value="/wp-admin/edit.php">
        <div class="tablenav top">

            <div class="alignleft actions bulkactions">
                <label for="bulk-action-selector-top" class="screen-reader-text">Select bulk action</label>
                <select name="action" id="bulk-action-selector-top">
                    <option value="-1">Bulk actions</option>
                    <option value="trash">Move to Trash</option>
                </select>
                <input type="submit" id="doaction" class="button action" value="Apply">
            </div>

            <div class="alignleft actions">
                <label for="filter-by-date" class="screen-reader-text">Filter by date</label>
                <select name="date_filter" id="filter-by-date">
                    <option selected="selected" value="0">All dates</option>
                    <option value="202303">March 2023</option>
                </select>
                <input type="submit" name="filter_action" id="post-query-submit" class="button" value="Filter">
            </div>
            <div class="tablenav-pages one-page"><span class="displaying-num"><?=$total_items?> item</span>
                <span class="pagination-links"><span class="tablenav-pages-navspan button disabled" aria-hidden="true">«</span>
                    <span class="tablenav-pages-navspan button disabled" aria-hidden="true">‹</span>
                    <span class="paging-input"><label for="current-page-selector" class="screen-reader-text">Current Page</label><input class="current-page" id="current-page-selector" type="text" name="paged" value="1" size="1" aria-describedby="table-paging"><span class="tablenav-paging-text"> of <span class="total-pages">1</span></span></span>
                    <span class="tablenav-pages-navspan button disabled" aria-hidden="true">›</span>
                    <span class="tablenav-pages-navspan button disabled" aria-hidden="true">»</span></span>
            </div>
            <br class="clear">
        </div>
        <h2 class="screen-reader-text">Posts list</h2>
        <table class="wp-list-table widefat fixed striped table-view-list posts">

            <thead>
                <tr>
                    <td id="cb" class="manage-column column-cb check-column"><label class="screen-reader-text" for="cb-select-all-1">Select All</label><input id="cb-select-all-1" type="checkbox"></td>
                    <th scope="col" id="title" class="manage-column column-title column-primary sortable desc"><a href="#"><span>Order Id</span><span class="sorting-indicator"></span></a></th>
                    <th scope="col" id="author" class="manage-column column-author">Total</th>
                    <th scope="col" id="categories" class="manage-column column-categories">Customers</th>
                    <th scope="col" id="categories" class="manage-column column-categories">Phone</th>
                    <th scope="col" id="tags" class="manage-column column-tags">Status</th>
                    <th scope="col" id="date" class="manage-column column-date sortable asc"><a href="#"><span>Date</span><span class="sorting-indicator"></span></a></th>
                </tr>
            </thead>


            <tbody id="the-list">
                <?php foreach ($items as $item) : ?>
                    <tr id="post-1" class="iedit author-self level-0 post-1 type-post status-publish format-standard hentry category-uncategorized">
                        <th scope="row" class="check-column"> <label class="screen-reader-text" for="cb-select-1">
                            </label>
                            <input id="cb-select-1" type="checkbox" name="post[]" value="1">
                            <div class="locked-indicator">
                                <span class="locked-indicator-icon" aria-hidden="true"></span>
                                <span class="screen-reader-text">
                                </span>
                            </div>
                        </th>
                        <td class="title column-title has-row-actions column-primary page-title" data-colname="Title">
                            <div class="locked-info"><span class="locked-avatar"></span> <span class="locked-text"></span></div>
                            <strong>
                                <a class="row-title" href="#"> <?= $item->id ?> </a>
                            </strong>
                        </td>
                        <td class="author column-author" data-colname="Author">
                            <a href="#"><?= number_format($item->total) ?></a>
                        </td>
                        <td class="categories column-categories" data-colname="Categories">
                            <a href="#"><?= $item->customer_name ?></a>
                        </td>
                        <td class="categories column-categories" data-colname="Categories">
                            <a href="#"><?= $item->customer_phone ?></a>
                        </td>

                        <td class="comments column-comments" data-colname="Comments">
                            <select name="status_order_grid" id="start_of_week">
                                <option value="pending">New</option>
                                <option value="complete">Complete</option>
                                <option value="cancel">Cancel</option>
                        </td>

                        <td class="date column-date" data-colname="Date"><?= date('d-m-Y', strtotime($item->created))  ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="tablenav bottom">
            <?php include_once WP2023_PATH . 'includes/templates/elements/elements-paginate.php'; ?>
        </div>

    </form>


    <form method="get">
        <table style="display: none">
            <tbody id="inlineedit">
                <tr id="inline-edit" class="inline-edit-row inline-edit-row-post quick-edit-row quick-edit-row-post inline-edit-post" style="display: none">
                    <td colspan="7" class="colspanchange">
                        <div class="inline-edit-wrapper" role="region" aria-labelledby="quick-edit-legend">
                            <fieldset class="inline-edit-col-left">
                                <legend class="inline-edit-legend" id="quick-edit-legend">Quick Edit</legend>
                                <div class="inline-edit-col">



                                    <label>
                                        <span class="title">Title</span>
                                        <span class="input-text-wrap"><input type="text" name="post_title" class="ptitle" value=""></span>
                                    </label>


                                    <label>
                                        <span class="title">Slug</span>
                                        <span class="input-text-wrap"><input type="text" name="post_name" value="" autocomplete="off" spellcheck="false"></span>
                                    </label>




                                    <fieldset class="inline-edit-date">
                                        <legend><span class="title">Date</span></legend>
                                        <div class="timestamp-wrap"><label><span class="screen-reader-text">Month</span><select class="form-required" name="mm">
                                                    <option value="01" data-text="Jan">01-Jan</option>
                                                    <option value="02" data-text="Feb">02-Feb</option>
                                                    <option value="03" data-text="Mar" selected="selected">03-Mar</option>
                                                    <option value="04" data-text="Apr">04-Apr</option>
                                                    <option value="05" data-text="May">05-May</option>
                                                    <option value="06" data-text="Jun">06-Jun</option>
                                                    <option value="07" data-text="Jul">07-Jul</option>
                                                    <option value="08" data-text="Aug">08-Aug</option>
                                                    <option value="09" data-text="Sep">09-Sep</option>
                                                    <option value="10" data-text="Oct">10-Oct</option>
                                                    <option value="11" data-text="Nov">11-Nov</option>
                                                    <option value="12" data-text="Dec">12-Dec</option>
                                                </select></label> <label><span class="screen-reader-text">Day</span><input type="text" name="jj" value="20" size="2" maxlength="2" autocomplete="off" class="form-required"></label>, <label><span class="screen-reader-text">Year</span><input type="text" name="aa" value="2023" size="4" maxlength="4" autocomplete="off" class="form-required"></label> at <label><span class="screen-reader-text">Hour</span><input type="text" name="hh" value="02" size="2" maxlength="2" autocomplete="off" class="form-required"></label>:<label><span class="screen-reader-text">Minute</span><input type="text" name="mn" value="39" size="2" maxlength="2" autocomplete="off" class="form-required"></label></div><input type="hidden" id="ss" name="ss" value="08">
                                    </fieldset>
                                    <br class="clear">

                                    <label class="inline-edit-author"><span class="title">Author</span><select name="post_author" class="authors">
                                            <option value="1">khang.nguyen (khang.nguyen)</option>
                                        </select></label>

                                    <div class="inline-edit-group wp-clearfix">
                                        <label class="alignleft">
                                            <span class="title">Password</span>
                                            <span class="input-text-wrap"><input type="text" name="post_password" class="inline-edit-password-input" value=""></span>
                                        </label>

                                        <span class="alignleft inline-edit-or">
                                            –OR– </span>
                                        <label class="alignleft inline-edit-private">
                                            <input type="checkbox" name="keep_private" value="private">
                                            <span class="checkbox-title">Private</span>
                                        </label>
                                    </div>


                                </div>
                            </fieldset>


                            <fieldset class="inline-edit-col-center inline-edit-categories">
                                <div class="inline-edit-col">


                                    <span class="title inline-edit-categories-label">Categories</span>
                                    <input type="hidden" name="post_category[]" value="0">
                                    <ul class="cat-checklist category-checklist">

                                        <li id="category-1" class="popular-category"><label class="selectit"><input value="1" type="checkbox" name="post_category[]" id="in-category-1"> Uncategorized</label></li>
                                    </ul>


                                </div>
                            </fieldset>


                            <fieldset class="inline-edit-col-right">
                                <div class="inline-edit-col">




                                    <label>
                                        <span class="title">Template</span>
                                        <select name="page_template">
                                            <option value="default">Default template</option>

                                            <option value="blank">Blank</option>
                                        </select>
                                    </label>




                                    <div class="inline-edit-tags-wrap">
                                        <label class="inline-edit-tags">
                                            <span class="title">Tags</span>
                                            <textarea data-wp-taxonomy="post_tag" cols="22" rows="1" name="tax_input[post_tag]" class="tax_input_post_tag" aria-describedby="inline-edit-post_tag-desc"></textarea>
                                        </label>
                                        <p class="howto" id="inline-edit-post_tag-desc">Separate tags with commas</p>
                                    </div>





                                    <div class="inline-edit-group wp-clearfix">


                                        <label class="alignleft">
                                            <input type="checkbox" name="comment_status" value="open">
                                            <span class="checkbox-title">Allow Comments</span>
                                        </label>



                                        <label class="alignleft">
                                            <input type="checkbox" name="ping_status" value="open">
                                            <span class="checkbox-title">Allow Pings</span>
                                        </label>


                                    </div>



                                    <div class="inline-edit-group wp-clearfix">

                                        <label class="inline-edit-status alignleft">
                                            <span class="title">Status</span>
                                            <select name="_status">

                                                <option value="publish">Published</option>
                                                <option value="future">Scheduled</option>

                                                <option value="pending">Pending Review</option>
                                                <option value="draft">Draft</option>
                                            </select>
                                        </label>



                                        <label class="alignleft">
                                            <input type="checkbox" name="sticky" value="sticky">
                                            <span class="checkbox-title">Make this post sticky</span>
                                        </label>



                                    </div>


                                </div>
                            </fieldset>


                            <div class="submit inline-edit-save">
                                <input type="hidden" id="_inline_edit" name="_inline_edit" value="524190856c"> <button type="button" class="button button-primary save">Update</button>

                                <button type="button" class="button cancel">Cancel</button>

                                <span class="spinner"></span>

                                <input type="hidden" name="post_view" value="list">
                                <input type="hidden" name="screen" value="edit-post">

                                <div class="notice notice-error notice-alt inline hidden">
                                    <p class="error"></p>
                                </div>
                            </div>
                        </div> <!-- end of .inline-edit-wrapper -->

                    </td>
                </tr>

                <tr id="bulk-edit" class="inline-edit-row inline-edit-row-post bulk-edit-row bulk-edit-row-post bulk-edit-post" style="display: none">
                    <td colspan="7" class="colspanchange">
                        <div class="inline-edit-wrapper" role="region" aria-labelledby="bulk-edit-legend">
                            <fieldset class="inline-edit-col-left">
                                <legend class="inline-edit-legend" id="bulk-edit-legend">Bulk Edit</legend>
                                <div class="inline-edit-col">



                                    <div id="bulk-title-div">
                                        <div id="bulk-titles"></div>
                                    </div>






                                </div>
                            </fieldset>
                            <fieldset class="inline-edit-col-center inline-edit-categories">
                                <div class="inline-edit-col">


                                    <span class="title inline-edit-categories-label">Categories</span>
                                    <input type="hidden" name="post_category[]" value="0">
                                    <ul class="cat-checklist category-checklist">

                                        <li id="category-1" class="popular-category"><label class="selectit"><input value="1" type="checkbox" name="post_category[]" id="in-category-1"> Uncategorized</label></li>
                                    </ul>


                                </div>
                            </fieldset>


                            <fieldset class="inline-edit-col-right">
                                <div class="inline-edit-tags-wrap">
                                    <label class="inline-edit-tags">
                                        <span class="title">Tags</span>
                                        <textarea data-wp-taxonomy="post_tag" cols="22" rows="1" name="tax_input[post_tag]" class="tax_input_post_tag" aria-describedby="inline-edit-post_tag-desc"></textarea>
                                    </label>
                                    <p class="howto" id="inline-edit-post_tag-desc">Separate tags with commas</p>
                                </div>
                                <div class="inline-edit-col">

                                    <label class="inline-edit-author"><span class="title">Author</span><select name="post_author" class="authors">
                                            <option value="-1">— No Change —</option>
                                            <option value="1">khang.nguyen (khang.nguyen)</option>
                                        </select></label>


                                    <label>
                                        <span class="title">Template</span>
                                        <select name="page_template">
                                            <option value="-1">— No Change —</option>
                                            <option value="default">Default template</option>

                                            <option value="blank">Blank</option>
                                        </select>
                                    </label>





                                    <div class="inline-edit-group wp-clearfix">


                                        <label class="alignleft">
                                            <span class="title">Comments</span>
                                            <select name="comment_status">
                                                <option value="">— No Change —</option>
                                                <option value="open">Allow</option>
                                                <option value="closed">Do not allow</option>
                                            </select>
                                        </label>



                                        <label class="alignright">
                                            <span class="title">Pings</span>
                                            <select name="ping_status">
                                                <option value="">— No Change —</option>
                                                <option value="open">Allow</option>
                                                <option value="closed">Do not allow</option>
                                            </select>
                                        </label>


                                    </div>



                                    <div class="inline-edit-group wp-clearfix">

                                        <label class="inline-edit-status alignleft">
                                            <span class="title">Status</span>
                                            <select name="_status">
                                                <option value="-1">— No Change —</option>

                                                <option value="publish">Published</option>

                                                <option value="private">Private</option>

                                                <option value="pending">Pending Review</option>
                                                <option value="draft">Draft</option>
                                            </select>
                                        </label>



                                        <label class="alignright">
                                            <span class="title">Sticky</span>
                                            <select name="sticky">
                                                <option value="-1">— No Change —</option>
                                                <option value="sticky">Sticky</option>
                                                <option value="unsticky">Not Sticky</option>
                                            </select>
                                        </label>



                                    </div>


                                </div>
                            </fieldset>


                            <div class="submit inline-edit-save">
                                <input type="submit" name="bulk_edit" id="bulk_edit" class="button button-primary" value="Update">
                                <button type="button" class="button cancel">Cancel</button>


                                <input type="hidden" name="post_view" value="list">
                                <input type="hidden" name="screen" value="edit-post">

                                <div class="notice notice-error notice-alt inline hidden">
                                    <p class="error"></p>
                                </div>
                            </div>
                        </div> <!-- end of .inline-edit-wrapper -->

                    </td>
                </tr>

            </tbody>
        </table>
    </form>

    <div id="ajax-response"></div>
    <div class="clear"></div>

</div>