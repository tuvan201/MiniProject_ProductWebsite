

        <div class="pagination" style="display:flex;justify-content:center">
           <?php 
 
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
            if ($current_page > 1 && $total_page > 1){
                echo '<a style="padding:0px 5px;" href="?page='.($current_page-1).'&index='.($index).'&status='.($status).'&username='.($username).'">Prev</a> | ';
            }
 
            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++){
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a để chuyển hướng
                if ($i == $current_page){
                    echo '<span style="padding:0px 5px;">'.$i.'</span> | ';
                }
                else{
                    echo "<a style='padding:0px 5px;' href='?page=$i&index=$index&status=$status&username=$username'>$i</a> | ";
                }
            }
 
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút next
            if ($current_page < $total_page && $total_page > 1){
                echo '<a style="padding:0px 5px;" href="?page='.($current_page+1).'&index='.($index).'&status='.($status).'&username='.($username).'">Next</a> | ';
            }
           ?>
        </div>