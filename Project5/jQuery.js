$(document).ready(function () {
    $("td #update").click(function () {
        $(".cart").load("updateCart.php")
    });
    $("td #remove").click(function () {
        $(".cart").load("removeCart.php")
    });
});