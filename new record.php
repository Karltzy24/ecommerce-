<form action="newrecord.php" method="post">
                    <div class="mb-3">
                        <label for="new_item_name" class="form-label">Item Name</label>
                        <input type="text" id="new_item_name" required name="new_item_name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="new_item_price" class="form-label">Item Price</label>
                        <input type="number" required id="new_item_price" name="new_item_price" class="form-control">
                    </div>
                    
                    <input type="submit" class="btn btn-primary">
                </form>
