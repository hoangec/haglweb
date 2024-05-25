function scrollToTarget(idSecctionDich) {
    var sectionToScroll = document.getElementById(idSecctionDich);
    if (sectionToScroll) {
        anime({
            targets: "html, body",
            scrollTop: sectionToScroll.offsetTop,
            duration: 1000,
            easing: "easeInOutQuad",
        });
    }
}
function scrollToCoDongTarget(idSecctionDich, el) {
    var sectionToScroll = document.getElementById(idSecctionDich);
    if (sectionToScroll) {
        $('.danh-muc-doc-content').removeClass('bg-base-color');
        $('.danh-muc-doc-content').addClass('bg-third-color');
        $(el).find('.danh-muc-doc-content').removeClass('bg-third-color');
        $(el).find('.danh-muc-doc-content').addClass('bg-base-color');
        anime({
            targets: "html, body",
            scrollTop: sectionToScroll.offsetTop,
            duration: 1000,
            easing: "easeInOutQuad",
        });
    }
}
function showImageGallery(el){
    var imageGalleryId = '#image-gallery-'+el;
    var $links = $(imageGalleryId).find('a');
    if ($links.length > 0) {
        $links.each(function(index, link) {
            $(link).attr('data-lightbox', 'gallery'); // Sử dụng .data() thay vì .attr()
        });
        lightbox.start($links);
        $links.each(function(index, link) {
            $(link).removeAttr('data-lightbox'); // Sử dụng .data() thay vì .attr()
        });

    }
}
function dongModalDangKySanPham() {
    setTimeout(function(){
        $('#DangKySanPhamModal').modal('hide');
    },1000)

}
$(function () {
    // cac ultilies
    function scrollToSuKien(idSuKien) {
        var section = document.getElementById(idSuKien);
        var offset = 500;

        var sectionPosition = section.offsetTop - offset;
        // window.scrollTo(0,sectionPosition);
        window.scrollTo({
            top: sectionPosition,
            left: 0,
            behavior: "smooth",
        });
        // oc.progressBar.show();
        // oc.flashMsg({
        //     message: 'Record has been successfully saved. This message will disappear in 1 second.',
        //     type: 'success',
        //     interval: 1
        // });
    }
    //xu ly modal dang ky mua san pham
    var myModalEl = document.getElementById('DangKySanPhamModal')
    myModalEl.addEventListener('hidden.bs.modal', function (event) {
        var table = $('#formDangKySanPham');
        table.find('input[type=text]').val('');
        grecaptcha.reset();
        $('#formSubmitBtn').prop('disabled', false);
        $('#dangKySanPhamAlert').hide();

    })
    function showDangKySanPham(element) {
        var sanPhamTen = $(element).prev().find('.san-pham-ten').text().trim();
        $('#formSanPhamName').val(sanPhamTen);
        $('#DangKySanPhamModal').modal('show');
    }

    $('a.btn-dangky-sanpham').on('click', function() {
        showDangKySanPham(this);
    });

    $(document).on('click', '.submit-tuyendung', function () {
        var error = false,
                _this = $(this),
                formObj = _this.parents('form'),
                emailFormat = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/,
                urlformat = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/,
                telFormat = /[0-9 -()+]+$/,
                actionURL = formObj.attr('action'),
                resultsObj = formObj.find('.form-results'),
                grecaptchav3= _this.attr( 'data-sitekey' ) || '',
                redirectVal = formObj.find('[name="redirect"]').val();
        formObj.find('.required').removeClass('is-invalid');
        formObj.find('.required').each(function () {
            var __this = $(this),
                    fieldVal = __this.val();
            if (fieldVal == '' || fieldVal == undefined) {
                error = true;
                __this.addClass('is-invalid');
            } else if (__this.attr('type') == 'email' && !emailFormat.test(fieldVal)) {
                error = true;
                __this.addClass('is-invalid');
            } else if (__this.attr('type') == 'url' && !urlformat.test(fieldVal)) {
                error = true;
                __this.addClass('is-invalid');
            } else if (__this.attr('type') == 'tel' && !telFormat.test(fieldVal)) {
                error = true;
                __this.addClass('is-invalid');
            }
        });
        var termsObj = formObj.find('.terms-condition');
        if (termsObj.length) {
            if (!termsObj.is(':checked')) {
                error = true;
                termsObj.addClass('is-invalid');
            }
        }

        // Google reCaptcha verify
        if ( typeof ( grecaptcha ) !== 'undefined' && grecaptcha !== null ) {
            if (formObj.find('.g-recaptcha').length) {
                var gResponse = grecaptcha.getResponse();
                if (!(gResponse.length)) {
                    error = true;
                    formObj.find('.g-recaptcha').addClass('is-invalid');
                }
            } else if( grecaptchav3 != '' && grecaptchav3 != undefined ) { // For Version 3
                grecaptcha.ready(function() {
                  grecaptcha.execute(grecaptchav3, {action: 'submit'}).then(function(token) {
                  });
                });
            }
        }

        // if (!error && actionURL != '' && actionURL != undefined) {
        if (!error) {
            _this.addClass('loading');
            oc.request('#form-ung-tuyen', 'onSaveUngVien',{
                success: function(data) {
                    this.success(data).done(function() {
                        if(data.X_OCTOBER_FLASH_MESSAGES.error   ==  undefined){
                            formObj.find('input[type=text],input[type=file],input[type=url],input[type=email],input[type=tel],input[type=password],textarea').each(function () {
                                $(this).val('');
                                $(this).removeClass('is-valid');
                                $(this) .next('div').remove();
                            });
                            formObj.find('input[type=checkbox],input[type=radio]').prop('checked', false);
                        }
                    });
                }
            });

            // $.ajax({
            //     type: 'POST',
            //     url: actionURL,
            //     data: formObj.serialize(),
            //     success: function (result) {
            //         _this.removeClass('loading');
            //         if (redirectVal != '' && redirectVal != undefined) {
            //             window.location.href = redirectVal;
            //         } else {
            //             if (typeof (result) !== 'undefined' && result !== null) {
            //                 result = $.parseJSON(result);
            //             }
            //             formObj.find('input[type=text],input[type=url],input[type=email],input[type=tel],input[type=password],textarea').each(function () {
            //                 $(this).val('');
            //                 $(this).removeClass('is-invalid');
            //             });
            //             formObj.find('.g-recaptcha').removeClass('is-invalid');
            //             formObj.find('input[type=checkbox],input[type=radio]').prop('checked', false);
            //             if (formObj.find('.g-recaptcha').length) {
            //                 grecaptcha.reset();
            //             }
            //             resultsObj.removeClass('alert-success').removeClass('alert-danger').hide();
            //             resultsObj.addClass(result.alert).html(result.message);
            //             resultsObj.removeClass('d-none').fadeIn('slow').delay(4000).fadeOut('slow');
            //         }
            //     }
            // });
        }
        //

        return false;
    });
    //-----------------------------------------
    var tlPhuPham = anime.timeline({
        easing: "easeOutExpo",
        duration: 750,
        loop: true,
    });
    $("#phu-pham").on("click", function () {
        var muiTenPhuPham = $("#demo-animate")
            .contents()
            .find("svg g[class='mui-ten-phu-pham']")
            .get();
        var heoAnChuoi = $("#demo-animate")
            .contents()
            .find("svg g[id='heo-an-chuoi']")
            .get();
        var ca = $("#demo-animate")
            .contents()
            .find("svg g[id='ca-an-chuoi']")
            .get();

        tlPhuPham.add({
            targets: muiTenPhuPham,
            opacity: [0, 1],
            translateX: [-50, 0],
            easing: "easeInOutQuad",
            delay: anime.stagger(200, { from: "last" }),
        });
        tlPhuPham.add({
            targets: heoAnChuoi,
            translateY: [
                { value: -30, duration: 100 },
                { value: 0, duration: 800, easing: "easeOutBounce" },
            ],
            duration: 1000,
            easing: "easeInOutQuad",
        });
        tlPhuPham.add({
            targets: ca,
            translateY: [
                { value: -30, duration: 100 },
                { value: 0, duration: 800, easing: "easeOutBounce" },
            ],
            duration: 1000,
            easing: "easeInOutQuad",
        });
    });
    var tlNangLuong = anime.timeline({
        easing: "easeOutExpo",
        duration: 750,
        loop: true,
    });
    $("#tai-tao").on("click", function () {
        var nangLuongMuiTen1 = $("#demo-animate")
            .contents()
            .find("svg g[class='nang-luong-1']")
            .get();
        var nangLuongMuiTen3 = $("#demo-animate")
            .contents()
            .find("svg g[id='nang-luong-3']")
            .get();
        var nangLuongMuiTen4 = $("#demo-animate")
            .contents()
            .find("svg g[id='nang-luong-4']")
            .get();
        var sanXuat = $("#demo-animate")
            .contents()
            .find("svg path[class='san-xuat']")
            .get();
        tlPhuPham.add({
            targets: [nangLuongMuiTen1],
            opacity: [0, 1],
            translateX: [50, 0],
            easing: "easeInOutQuad",
            duration: 1000,
        });
        tlPhuPham.add({
            targets: [sanXuat],
            transformOrigin: ["50%", "50%"],
            rotate: "360deg",
            easing: "easeInOutQuad",
            duration: 1000,
        });
        tlPhuPham.add({
            targets: [nangLuongMuiTen3],
            opacity: [0, 1],
            translateX: [50, 0],
            easing: "easeInOutQuad",
            duration: 1000,
        });
        tlPhuPham.add({
            targets: [nangLuongMuiTen4],
            opacity: [0, 1],
            translateX: [50, 0],
            easing: "easeInOutQuad",
            duration: 1000,
        });
    });

    var tlXuatKhau = anime.timeline({
        easing: "easeOutExpo",
        duration: 750,
        loop: true,
    });
    $("#xuat-khau-item").on("click", function () {
        var xuatKhauMuiTen = $("#demo-animate")
            .contents()
            .find("svg g[id='xuat-khau']")
            .get();
        var tauHang = $("#demo-animate")
            .contents()
            .find("svg g[id='tau-hang']")
            .get();
        tlPhuPham.add({
            targets: [xuatKhauMuiTen],
            opacity: [0, 1],
            translateY: [50, 0],
            easing: "easeInOutQuad",
            duration: 1000,
        });
        tlPhuPham.add({
            targets: [tauHang],
            translateX: [0, 200],
            easing: "easeInOutQuad",
            duration: 1000,
            direction: "alternate",
        });
    });
});

/* xu ly in trang tin tuc */
function inTrangTinTuc() {
    var content = document.getElementById("section-tin-tuc-detail").innerHTML;
    var css = window.getComputedStyle(
        document.getElementById("section-tin-tuc-detail")
    );
    console.log(css);
    var printWindow = window.open("", "_blank");
    printWindow.document.write("<html><head><title>Print</title>");
    printWindow.document.write("<style>" + css + "</style></head><body>");
    printWindow.document.write(content);
    printWindow.document.write("</body></html>");
    printWindow.document.close();
    printWindow.print();
}
/* khoi tao datatables */
$(function () {
    var tableBlocks = $(".table-block");
    if (tableBlocks.length > 0) {
        $.extend($.fn.dataTable.defaults, {
            language: {
                // url: "https://cdn.datatables.net/plug-ins/2.0.6/i18n/vi.json",
                url: 'themes/HAGL/assets/js/datatables/dataTables.vn.json'
            },
        });
        tableBlocks.each(function () {
            var tableBlockId = $(this).attr("block-id");
            var strTableId = "#table-rowgroup-" + tableBlockId;
            var tableType = $(strTableId).attr("table-type");
            var dataTable = null;
            if (tableType == "table-quy") {
                dataTable = $(strTableId).DataTable({
                    responsive: true,
                    rowGroup: {
                        dataSrc: 1,
                    },
                    fixedHeader: true,
                    // autoWidth: false,
                    order: [[1, "desc"]],
                    pageLength: 10,
                    dom: "lrtip",
                    searching: true,
                    lengthChange: false,
                    paging: true,
                    // fixedColumns: true,
                    scrollCollapse: true,
                    scrollX: true,
                    scrollY: 600,
                    columnDefs: [
                        {
                            targets: [0],
                            // width: 300,
                        },
                        {
                            targets: [1],
                            visible: false,
                            searchable: true,
                        },
                        {
                            orderable: false,
                            targets: [ 0, 1, 2, 3, 4, 5] }
                    ],
                });
            } else {
                // khoi tao cac table
                dataTable = $(strTableId).DataTable({
                    dom: "lrtip",
                    columnDefs: [
                        {
                            targets: [2],
                            visible: false,
                            searchable: false,
                        },
                        {
                            targets: [1],
                            visible: false,
                            searchable: true,
                        },
                        {
                            targets: [0, 1, 2, 3],
                            orderable: false,
                        },
                    ],
                    paging: false,
                    order: [[1, "desc"]],

                    rowGroup: {
                        dataSrc: 1,
                    },
                });
            }
            //Koi tao loc du lieu cho tung table
            if(dataTable != null){
                var years = dataTable.column(1).data().unique().sort().toArray();
                var strToolBarLocNamId = "#table-loc-nam-" + tableBlockId;
                $.each(years, function (index, value) {
                    $(strToolBarLocNamId).append(
                        '<option value="' + value + '">' + value + "</option>"
                    );
                });
                $(strToolBarLocNamId).on("change", function () {
                    var year = $(this).val();
                    console.log(year);
                    dataTable.column(1).search(year).draw();
                });
                // khoi tao chuc nang tim kiem
                var strToolBarTimKiemInputId = "#table-search-input-" + tableBlockId;
                var strToolBarTimKiemBtnId = "#table-search-btn-" + tableBlockId;
                $(strToolBarTimKiemBtnId).on("click", function () {
                    var keywords = $(strToolBarTimKiemInputId).val();
                    dataTable.search(keywords).draw();
                });
            }

        });
    }
});
