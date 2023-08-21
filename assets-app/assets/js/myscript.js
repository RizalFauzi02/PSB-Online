$( document ).ready(function() {
    // tombol hapus
  $('.hapus').on('click', function(e) {

    // menghentikan link ketika klik "delete"
    e.preventDefault();

    // mengambil link setelah di klik "OK"
    const href = $(this).attr('href');

    Swal.fire({
      title: 'Apakah Anda Yakin?',
      text: "Data akan dihapus dan tidak dapat kembalikan!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'OK'
    }).then((result) => {
      if (result.isConfirmed) {
        document.location.href = href;
      }
    })
      // swal({
      //   title: "Are you sure?",
      //   text: "Once deleted, you will not be able to recover this imaginary file!",
      //   icon: "warning",
      //   buttons: true,
      //   dangerMode: true,
      // })
      // .then((willDelete) => {
      //   if (willDelete) {
      //     swal("Poof! Your imaginary file has been deleted!", {
      //       icon: "success",
      //     });
      //   } else {
      //     swal("Your imaginary file is safe!");
      //   }
      // });
  });
});