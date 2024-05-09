<div data-control="toolbar">
    <a href="<?= Backend::url('hoangvo/files/danhsachfiles/create') ?>" class="btn btn-primary oc-icon-plus">
        <?= e(trans('backend::lang.form.create')) ?>
    </a>
    <a data-control="popup" data-handler="onLoadDanhMuc" href="javascript:;" data-request-success="console.log(data)" class="btn btn-primary">
        Tạo file dữ liệu
    </a>
    <button class="btn btn-default oc-icon-trash-o" data-request="onDelete"
        data-request-confirm="<?= e(trans('backend::lang.list.delete_selected_confirm')) ?>" data-list-checked-trigger
        data-list-checked-request data-stripe-load-indicator>
        <?= e(trans('backend::lang.list.delete_selected')) ?>
    </button>
</div>
