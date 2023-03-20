
<?php 
    //echo '<pre>';
    //print_r($tag);
    // print_r($taxonomy);
//Lấy data ra
$status_category = get_term_meta($tag->term_id,'status_category',true);
echo($status_category);

$status = array(
    'active' => 'Đang sử dụng',
    'deactive' => 'Không sử dụng',
);

?>



<table class="form-table" role="presentation">
    <tbody>
        <tr class="form-field term-parent-wrap">
            <th scope="row"><label for="parent">Trạng thái danh mục</label></th>
            <td>
                <select name="status_category" class="postform" aria-describedby="parent-description">
                    <?php foreach( $status as $var => $s ): ?>
                        <option value="<?php echo $var ?>"<?php if( $var == $status_category): ?> selected="selected"<?php endif; ?>><?php echo $s ?></option>
                    <?php endforeach; ?>
                </select>
                <p id="parent-description">Trạng thái sử dụng của danh mục</p>
            </td>
        </tr>
    </tbody>
</table>