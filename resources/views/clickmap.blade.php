window.addEventListener('load', e => {



    var isFramed = false;
    try {
        isFramed = window != window.top || document != top.document || self.location != top.location;
    } catch (e) {
        isFramed = true;
    }
    if (isFramed) {
        // open page in frame
    } else {


        const supportTouch = 'ontouched' in document;
        const eTouchStart = supportTouch ? 'touchstart' : 'mousedown';
        const eTouchMove = supportTouch ? 'touchmove' : 'mousemove';
        const eTouchEnd = supportTouch ? 'touchend' : 'mouseup';
        const update = (e) => {

        var scrollHeight = Math.max(
        document.body.scrollHeight, document.documentElement.scrollHeight,
        document.body.offsetHeight, document.documentElement.offsetHeight,
        document.body.clientHeight, document.documentElement.clientHeight
        );



        var scrollWidth = Math.max(
        document.body.scrollWidth, document.documentElement.scrollWidth,
        document.body.offsetWidth, document.documentElement.offsetWidth,
        document.body.clientWidth, document.documentElement.clientWidth
        );
        let original = e.originalEvent || false;
        let x, y;

        if(e.changedTouches){
        x = e.changedTouches[0].clientX;
        y = e.changedTouches[0].clientY;
        } else {
        x = e.clientX;
        y = e.clientY;
        }


        x = (x+ window.pageXOffset)/scrollWidth*100;
        y = (y+ window.pageYOffset)/scrollHeight*100;
        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == XMLHttpRequest.DONE) { // XMLHttpRequest.DONE == 4
            if (xmlhttp.status == 200) {
                console.log(xmlhttp.responseText);
                
            } else {

                console.log('something else other than 200 was returned');
            }
            }
        };

        xmlhttp.open("GET", "http://localhost/check?code={{$code}}&x="+x+"&y="+y, true);
        xmlhttp.send();
        console.log('click ', x, y)
    
        };
        const target = document.querySelector('body');
        target.addEventListener('mouseup', e => {
            update(e);
        });


    }

  
  
});
