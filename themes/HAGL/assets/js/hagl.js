$(function () {
    var tlPhuPham = anime.timeline({
        easing: 'easeOutExpo',
        duration: 750,
        loop: true
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
            delay: anime.stagger(200,{from: 'last'}),
        })
        tlPhuPham.add({
            targets: heoAnChuoi,
            translateY: [
                { value: -30, duration: 100 },
                { value: 0, duration: 800, easing: "easeOutBounce" },
            ],
            duration: 1000,
            easing: "easeInOutQuad",
        })
        tlPhuPham.add({
            targets: ca,
                translateY: [
                    { value: -30, duration: 100 },
                    { value: 0, duration: 800, easing: "easeOutBounce" },
                ],
                duration: 1000,
                easing: "easeInOutQuad",
        })
    });
    var tlNangLuong = anime.timeline({
        easing: 'easeOutExpo',
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
        })
        tlPhuPham.add({
            targets: [nangLuongMuiTen3],
            opacity: [0, 1],
            translateX: [50, 0],
            easing: "easeInOutQuad",
            duration: 1000,

        })
        tlPhuPham.add({
            targets: [nangLuongMuiTen4],
            opacity: [0, 1],
            translateX: [50, 0],
            easing: "easeInOutQuad",
            duration: 1000,
        })
    });

    var tlXuatKhau = anime.timeline({
        easing: 'easeOutExpo',
        duration: 750,
        loop: true
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
            duration: 1000
        });
        tlPhuPham.add({
            targets: [tauHang],
            translateX: [0, 200],
            easing: "easeInOutQuad",
            duration: 1000  ,
            direction: "alternate",
        })
    });
});
