$(document).ready(function () {
    $(".hapus-surat").click(function () {
        var id = $(this).attr("data-id");
        var surat = $(this).attr("data-surat");
        swal({
            title: "Apakah anda yakin?",
            text: "Kamu akan menghapus data surat " + surat + "",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                window.location = "/deletesurat/" + id + "";
                swal("Surat " + surat + " telah dihapus!", {
                    icon: "success",
                });
            } else {
                swal("Surat tidak jadi dihapus!");
            }
        });
    });
});
