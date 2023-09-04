document.addEventListener("DOMContentLoaded", function() {

    const sidebarLinks = document.querySelectorAll(".sidebar-link");
    const dashboardContents = document.querySelectorAll(".dashboard-content");


    function hideAllDashboardContent() {
        dashboardContents.forEach((content) => {
            content.style.display = "none";
        });
    }


    sidebarLinks.forEach((link) => {
        link.addEventListener("click", () => {

            const optionID = link.getAttribute("data-option");


            hideAllDashboardContent();


            document.getElementById(optionID).style.display = "block";
        });
    });


    document.getElementById("dashboard-home").style.display = "block";
});