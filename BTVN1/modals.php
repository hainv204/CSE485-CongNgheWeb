<!-- Add product -->
<div class="modal fade" id="addProduct">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-group">
                <!-- Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Add new product</h4>
                </div>
                <!-- body -->
                <div class="modal-body">
                    <div>
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name" maxlength=100 required>
                    </div>
                    <div>
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" name="price" id="price" min=1000 required>
                    </div>
                </div>
                <!-- footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success" name="addProductBtn">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit product -->
<div class="modal fade" id="editProduct">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-group">
                <div class="modal-header">
                    <h4 class="modal-title">Edit product</h4>
                </div>
                <div class="modal-body">
                    <div>
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name" maxlength=100 required>
                    </div>
                    <div>
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" name="price" id="price" min=1000 required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success" namme="editProductBtn">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Delete product -->
<div class="modal fade" id="delProduct">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-group">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Employee</h4>
                </div>
                <div class="modal-body">
                    <p>Body Delete product</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger" name="delProductBtn">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>