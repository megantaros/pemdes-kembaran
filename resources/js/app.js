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

    $("#formHapus").submit(function () {
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
