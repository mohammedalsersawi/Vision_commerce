require("./bootstrap");

Echo.private("App.Models.User." + userId).notification((notification) => {
    const el = `<a href="${notification.url}" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
                <img src="https://images.pexels.com/photos/14437082/pexels-photo-14437082.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="User Avatar"
                    class="img-size-50 mr-3 img-circle">
                <div class="media-body">
                <p class="text-sm">${notification.data}</p>
                </div>
            </div>
        </a>
        <div class="dropdown-divider"></div>
        `;
    var count = 0;

    if ($(".notification-number").text().length == 0) {
        count = 1;
    } else {
        count = parseInt($(".notification-number").text()) + 1;
    }

    $(".notification-number").text(count);
    $(".notification-wrapper").append(el);

    Swal.fire({
        position: "top-end",
        icon: "success",
        title: "New Order",
        showConfirmButton: false,
        timer: 1500,
    });
});
