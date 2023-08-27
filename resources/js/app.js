import "./bootstrap";
import "../css/app.css";
import Aos from "aos";
import "aos/dist/aos.css";

Aos.init({ duration: 1000 });

$(document).ready(function () {
    $(".form_lainnya").hide();
    $(".show_form_lainnya").change(function () {
        var selectedOption = $(this).val();
        if (selectedOption == "Lainnya") {
            $(".form_lainnya").show();
        } else {
            $(".form_lainnya").hide();
        }
    });

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

    $(".form-hapus").click(function (e) {
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
