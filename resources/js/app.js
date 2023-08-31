import "./bootstrap";
import "../css/app.css";
import "aos/dist/aos.css";
import AOS from "aos";

$(document).ready(function () {
    AOS.init({
        duration: 1000,
        once: true,
    });

    $(".form_lainnya").hide();
    $(".show_form_lainnya").change(function () {
        var selectedOption = $(this).val();
        if (selectedOption == "Lainnya") {
            $(".form_lainnya").show();
        } else {
            $(".form_lainnya").hide();
        }
    });

    // $("#formPass").submit(function (e) {
    //     e.preventDefault();

    //     var password = $("input[name=password]").val();
    //     var password_confirmation = $("#conf_pass]").val();

    //     if (password != password_confirmation) {
    //         swal({
    //             title: "Password tidak sama!",
    //             text: "Pastikan password dan konfirmasi password sama!",
    //             icon: "warning",
    //             buttons: true,
    //             dangerMode: true,
    //         });
    //     }
    // });

    // const changePassword = (id, password) => {
    //     const baseUrl = window.location.origin;
    //     const url = baseUrl + "/auth-session/warga/" + id;

    //     console.log(url, password);

    // $.ajax({
    //     url: url,
    //     type: "PUT",
    //     data: {
    //         password: password,
    //     },
    //     dataType: "JSON",
    //     success: function (response) {
    //         if (response) {
    //             console.log(response);
    //         }
    //         swal({
    //             title: "Password berhasil diubah!",
    //             text: "Silahkan login kembali!",
    //             icon: "success",
    //             buttons: true,
    //             dangerMode: true,
    //         }).then((willDelete) => {
    //             if (willDelete) {
    //                 window.location.href = "/auth/login";
    //             } else {
    //                 swal("Password tidak jadi diubah!");
    //             }
    //         });
    //     },
    //     error: function (xhr) {
    //         console.log(xhr.responseText);
    //     },
    // });
    // };

    // $(".btn-hapus").click(function () {
    //     var id = $(this).attr("data-id");
    //     var surat = $(this).attr("data-jenis");
    //     swal({
    //         title: "Apakah anda yakin?",
    //         text: "Kamu akan menghapus data surat " + surat,
    //         icon: "warning",
    //         buttons: true,
    //         dangerMode: true,
    //     }).then((willDelete) => {
    //         if (willDelete) {
    //             // window.location = "/auth-session/pengajuan-surat/" + id;
    //             swal("Data surat telah dihapus!", {
    //                 icon: "success",
    //             });
    //         } else {
    //             swal("Surat tidak jadi dihapus!");
    //         }
    //     });
    // });

    const getModal = () => {
        swal({
            title: "Anda akan mengajukan surat?",
            text: "Pastikan anda login terlebih dahulu!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                window.location.href = "/auth/login";
            } else {
                swal("Surat tidak jadi diajukan!");
            }
        });
    };

    $("#guestForm").submit(function (e) {
        e.preventDefault();

        getModal();
    });

    $("#formHapus").submit(function (e) {
        e.preventDefault();

        var surat = $(this).attr("data-jenis");

        swal({
            title: "Apakah anda yakin?",
            text: "Kamu akan menghapus data surat " + surat,
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                swal("Data surat telah dihapus!", {
                    icon: "success",
                });
            } else {
                swal("Surat tidak jadi dihapus!");
            }
        });
    });
});
