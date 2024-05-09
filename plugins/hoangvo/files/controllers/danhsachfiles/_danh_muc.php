<form action="<?= Backend::url('hoangvo/files/danhsachfiles/create') ?>" method="GET">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="popup">&times;</button>
        <h4 class="modal-title">
            <!-- Modal header title goes here -->
            Tạo file tương ứng với danh mục
        </h4>
    </div>
    <div class="modal-body">
        <!-- Any popup content goes here -->
        <div class="form-group">
            <div class="form-group dropdown-field ">
                <label>Danh mục file</label>
                <select class="form-select" name="danhMucChon">
                    <?php foreach ($dsDanhMuc as $danhMuc) { ?>
                        <option value="<?= $danhMuc->id ?>"><?= $danhMuc->ten ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <!-- Popup action buttons go here -->
        <button type="submit" class="btn btn-primary oc-icon-send" data-load-indicator="Sending">
            Xác nhận
        </button>
        <button type="button" class="btn btn-default" data-dismiss="popup">
            Đóng
        </button>
    </div>
</form>
