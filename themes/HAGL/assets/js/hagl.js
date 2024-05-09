$(function () {
    // cac ultilies
    function scrollToTarget(idSecctionDich) {
        anime({
            targets: "html, body",
            scrollTop: document.getElementById(idSecctionDich).offsetTop,
            duration: 1000,
            easing: "easeInOutQuad",
        });
    }
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

/** page truyen thong - su kien */
function scrollToTarget(idSecctionDich) {
    anime({
        targets: "html, body",
        scrollTop: document.getElementById(idSecctionDich).offsetTop,
        duration: 1000,
        easing: "easeInOutQuad",
    });
}

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

$(function () {
    $.extend($.fn.dataTable.defaults, {
        language: {
            url: "https://cdn.datatables.net/plug-ins/2.0.6/i18n/vi.json",
        },
    });
    // var table = $("#table-theo-quy").DataTable({
    //     responsive: true,
    //     order: [[ 2, "desc" ]] ,
    //     pageLength: 10,
    //     dom: 'lrtip',
    //     searching: true,
    //     lengthChange: false,
    //     paging: true,
    //     scrollCollapse: true,
    //     scrollX: true,
    //     scrollY: 600,
    //     columnDefs: [
    //         { "orderable": false, "targets": [0,1,3,4,5,6] }
    //     ]
    // });
    // var years = table.column(2).data().unique().sort().toArray();
    // $.each(years, function(index, value){
    //     $('#table-loc-nam').append('<option value="' + value + '">' + value + '</option>');
    // });
    // $('#table-loc-nam').on('change', function () {
    //     var year = $(this).val();
    //     console.log(year);
    //     table.column(2).search(year).draw();
    // });
    // $('#table-tim-kiem-btn').on('click',function(){
    //     var keywords = $('input[name="table-tim-kiem-input"]').val();
    //     console.log(keywords);
    //     table.search(keywords).draw();
    // });
    //
    var tableBlocks = $(".table-block");
    tableBlocks.each(function () {
        var tableBlockId = $(this).attr("block-id");
        var strTableId = "#table-rowgroup-" + tableBlockId;
        var tableType = $(strTableId).attr("table-type");
        var dataTable = null;
        if (tableType == "table-quy") {
            dataTable = $(strTableId).DataTable({
                responsive: true,
                order: [[1, "desc"]],
                pageLength: 10,
                dom: "lrtip",
                searching: true,
                lengthChange: false,
                paging: true,
                scrollCollapse: true,
                scrollX: true,
                scrollY: 600,
                columnDefs: [{ orderable: false, targets: [0, 2, 3, 4, 5] }],
            });
        } else {
            // khoi tao cac table
            dataTable = $(strTableId).DataTable({
                dom: "lrtip",
                columnDefs: [
                    {
                        targets: [2], // Ẩn cột thứ 2 (index bắt đầu từ 0)
                        visible: false, // Ẩn cột
                        searchable: false, // Không cho phép tìm kiếm trên cột
                    },
                    {
                        targets: [1], // Ẩn cột thứ 2 (index bắt đầu từ 0)
                        visible: false, // Ẩn cột
                        searchable: true, // Không cho phép tìm kiếm trên cột
                    },
                    {
                        targets: [0, 1, 2, 3], // Ẩn cột thứ 2 (index bắt đầu từ 0)
                        orderable: false,
                    },
                ],
                paging: false,
                order: [[1, "desc"]],

                rowGroup: {
                    dataSrc: 2,
                },
            });
        }
        console.log(dataTable);
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
});
