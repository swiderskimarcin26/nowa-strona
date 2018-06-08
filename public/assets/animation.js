$animation1=window.addEventListener  = anime({
    targets: 'div.letter',
    // translateY: [
    //     { value: 200, duration: 500 },
    //     { value: 0, duration: 800 }
    // ],
    opacity: 1,
    right: '100px',
    width: {
        value: '+=1',
        duration: 1000,
        easing: 'easeInOutSine'
    },

delay: function(el, i, l){ return 500+i *60}
});

$animation1.addEventListener("load", anime({
    targets: 'div.letter1',
    // translateY: [
    //     { value: 200, duration: 500 },
    //     { value: 0, duration: 800 }
    // ],
    opacity: 1,
    right: '100px',
    width: {
        value: '+=1',
        duration: 700,
        easing: 'easeInOutSine'
    },
    delay: function(el, i, l){ return 3000+i *30}
}));
