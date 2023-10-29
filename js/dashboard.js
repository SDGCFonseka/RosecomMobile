$(document).ready(function () {

  
    //================================User Count Info=====================================
    getUserCount();
    var remainTime = 60 - parseInt((new Date().getTime() / 1000) % 60);
    setTimeout(function () {
        getUserCount();
        // redo every minute
        setInterval(getUserCount, 60000);
    }, remainTime * 1000)

    //================================Product Count Info=====================================
    getProductCount();
    setTimeout(function () {
        getProductCount();
        // redo every minute
        setInterval(getProductCount, 60000);
    }, remainTime * 1000)

});



//================================User Count Info=====================================
function getUserCount() {

    $.ajax({
        method: "POST",
        url: "../controller/dashboardController.php?status=getUserCounts",
        dataType: "json",
        success: function (res) {
            console.log(res);
            if (res[0] == 1) {
                $('#totalUsers').html(atob(res[1])).show();
                $('#activeUsers').html(atob(res[2])).show();
                $('#deactiveUsers').html(atob(res[3])).show();

            } else {
                $('#totalUsers').html("0");
                $('#activeUsers').html("0");
                $('#deactiveUsers').html("0");
            }
        },
        error: function () {
            alert("AJAX error !");
        }
    });
}

//================================Product Count Info=====================================
function getProductCount() {

    $.ajax({
        method: "POST",
        url: "../controller/dashboardController.php?status=getProductCounts",
        dataType: "json",
        success: function (res) {
            console.log(res);
            if (res[0] == 1) {
                $('#totalProducts').html(atob(res[1])).show();
                $('#visiProduct').html(atob(res[2])).show();
                $('#hidenProduct').html(atob(res[3])).show();

            } else {
                $('#totalProducts').html("0");
                $('#visiProduct').html("0");
                $('#hidenProduct').html("0");
            }
        },
        error: function () {
            alert("AJAX error !");
        }
    });
}