

export default{
    scrollHere(y) {
        var posy = y + (window.innerHeight / 4),
        width = window.scrollY;

        var timing = 1;

        var id = setInterval(function () {
            if (width >= posy) {
                clearInterval(id);
            } else {
                if(timing < 50){
                    timing += 0.5;
                }
                
                width += timing;
                window.scrollTo(0, width);
            }
        }, 1);
    },
}