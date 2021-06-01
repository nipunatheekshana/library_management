function barrow(bookdata){
    swal({
        title: "Do you want to barrow "+bookdata.name+"?",
        text: "protect the book you barrow at all cost",
        icon: "info",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            //ajax start
            // var data = { "id": id, "_token": "{{csrf_token()}}"}
            var request = $.ajax({
            url: "/barrow/"+bookdata.id+"",
            type: "GET",
            // data: data,
            dataType: "json",

            success: function (res) {
                $("#book-"+bookdata.id).fadeOut("slow");

            },error: function(data) {
                console.log('Something went wrong!');
            }

            });
            //ajax end


          swal("Poof! Your imaginary file has been deleted!", {
            icon: "success",
          });
        } else {
          swal("Your imaginary file is safe!");
        }
      });
}
