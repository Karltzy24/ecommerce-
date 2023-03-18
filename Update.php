<form action="update.php" method="POST">
                    <div class="mb-3">
                       <label for="">Item Name</label>
                        <input type="text" hidden name="p.item_id" value="<?php echo $item_id; ?>" class="form-control">
                        <input type="text" name="p.item_name" value="<?php echo $item_name; ?>" class="form-control">
                    </div>
                    <div class="mb-3">
                       <label for="">Item Price</label>
                        <input type="item_price" name="p.item_price" value="<?php echo $item_price; ?>" class="form-control">
                    </div>
                    
                    <input type="submit" class="btn btn-primary">
                </form>
