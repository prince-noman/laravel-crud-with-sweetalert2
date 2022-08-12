//Add Data
(function ($) {
    $(document).ready(function () {
        // add data
        $(".add").click(function (e) {
            //=======Sweet Alert Start=======
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Data added successfully",
                showConfirmButton: false,
                timer: 3000,
            });
            window.location = "/";
            //=======Sweet Alert End=======
        });
    });
})(jQuery);

//Update data
(function ($) {
    $(document).ready(function () {
        // update data
        $(".update").click(function (e) {
            var dataID = $(this).attr("data-id");

            //=======Sweet Alert Start=======
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Data updated successfully",
                showConfirmButton: false,
                timer: 3000,
            });
            window.location = "/";
            //=======Sweet Alert End=======
        });
    });
})(jQuery);

//Delete Data
(function ($) {
    $(document).ready(function () {
        // delete data
        $(".delete").click(function (e) {
            e.preventDefault();
            var dataID = $(this).attr("data-id");

            //=======Sweet Alert Start=======
            Swal.fire({
                title: "Are you sure?",
                // text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/delete-data/" + dataID;
                    // axios.delete('/delete-data/'+dataID);
                    Swal.fire(
                        "Deleted!",
                        "Your data has been deleted.",
                        "success"
                    );
                    setTimeout(() => {
                        window.location = "/";
                    }, 3000);
                }
            });
            //=======Sweet Alert End=======
        });
    });
})(jQuery);
