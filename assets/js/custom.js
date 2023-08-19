window.onload = ()=>{
    (function( $ ) {
        // video for main page
        console.log(window.location)
        if(window.innerWidth > 1526 && window.location.pathname === "/") {
            let video = document.createElement("span");
            video.innerHTML = `'<video autoplay muted loop id="myVideo"><source src="wp-content/uploads/2021/07/A-Road-Passing-by-a-Sea-and-Mountains.mp4" type="video/mp4"></video>'`
            document.querySelector('.site-branding').appendChild(video)
        }


        function payment(evt) {
            $.ajax({
                url:  '/wp-json/api/v1/payment',
                type: 'POST',
                data: {
                    'success_url' : cancel_url,
                    'cancel_url' : cancel_url,
                    'image': image,
                    'unit_amount': unit_amount * 100,
                    'title' : title,                                                   
                },
                success: (res) => {
                    window.location = res.url;
                },
                error: (err) => {
                    console.log("err", err)
                }
            });
        }
        $('.buy-now-button').click(() => {
            payment();
        });
    })( jQuery );
};

//original payment function from singplay
// function payment(evt) {
//     $.ajax({
//         url:  '/wp-json/api/v1/payment',
//         type: 'POST',
//         data: {
//             'success_url' : window.location.origin + "/courses",
//             'cancel_url' : window.location.origin + "/courses",
//             'image': image,
//             'unit_amount': unit_amount * 100,
//             'title' : title,
//             'user_id':user_id,
//             'course_id':course_id                                                 
//         },
//         success: (res) => {
//            window.location = res.url;
//         },
//         error: (err) => {
//             console.log("err", err)
//         }
//     });
// }