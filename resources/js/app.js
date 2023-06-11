import "./bootstrap";
import "../css/app.css";

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

    $(".btn-hapus").click(function () {
        var id = $(this).attr("data-id");
        var surat = $(this).attr("data-jenis");
        swal({
            title: "Apakah anda yakin?",
            text: "Kamu akan menghapus data surat " + surat,
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                window.location = "/delete-surat/" + id;
                swal("Data surat telah dihapus!", {
                    icon: "success",
                });
            } else {
                swal("Surat tidak jadi dihapus!");
            }
        });
    });
});
