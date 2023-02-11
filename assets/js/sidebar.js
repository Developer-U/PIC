window.addEventListener('DOMContentLoaded', function(){   

    // Сайдбар / Sidebar

    const postDetails = document.querySelector(".main-content");
    const postSidebar = document.querySelector(".about-sidebar");
    const postSidebarContent = document.querySelector(".sidebar-container");

    //1
    const controller = new ScrollMagic.Controller();   

    //2
    const scene = new ScrollMagic.Scene({
    triggerElement: postSidebar,
    triggerHook: 0,
    reverse:true,
    duration: getDuration
    }).addTo(controller);     

    //3
    if (window.matchMedia("(min-width: 992px)").matches) {
        scene.setPin(postSidebar, {pushFollowers: false});   
    }

    //4
    window.addEventListener("resize", () => {
    if (window.matchMedia("(min-width: 992px)").matches) {
        scene.setPin(postSidebar, {pushFollowers: false});
    } else {
        scene.removePin(postSidebar, true);       
        
    }
    });    

    function getDuration() {
    return postDetails.offsetHeight - postSidebarContent.offsetHeight;        
    }

     
});