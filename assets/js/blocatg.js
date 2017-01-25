$(document).ready(function(){
    $(".toggle-social").click(function(){
        $(".hidden-droplist").toggle("fast");
    });
    $(".toggle-search").click(function(){
        $(".drop-search").toggle("fast");
    });
});
$('.owl-carousel').owlCarousel({
    //rtl:true,
    loop:true,
    margin:0,
    nav:true,
    autoPlay: 10,
    transitionStyle: 'fadeUp',
    navText :['<span><i class="fa fa-angle-left"></i></span>',
                '<span><i class="fa fa-angle-right"></i></span>'
                ],
    items:1,
});