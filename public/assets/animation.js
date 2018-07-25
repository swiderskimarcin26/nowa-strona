// window.onload  = anime({
//     targets: 'div.letter',
//     // translateY: [
//     //     { value: 200, duration: 500 },
//     //     { value: 0, duration: 800 }
//     // ],
//     opacity: 1,
//     right: '100px',
//     width: {
//         value: '+=1',
//         duration: 700,
//         easing: 'easeInOutSine'
//     },
//     delay: function(el, i, l){ return 500+i *60}
// });
//
// window.onload  = anime({
//     targets: 'div.letter1',
//     opacity: 1,
//     right: '100px',
//     width: {
//         value: '+=1',
//         duration: 700,
//         easing: 'easeInOutSine'
//     },
//     delay: function(el, i, l){ return 3000+i *30}
// });

var relativeOffset = anime.timeline();

relativeOffset
    .add({
        targets: 'div.letter',
        // translateY: [
        //     { value: 200, duration: 500 },
        //     { value: 0, duration: 800 }
        // ],
        opacity: 1,
        right: '100px',
        easing: 'easeInOutQuad',

        delay: function(el, i, l){ return 200+i *40}
    })
    .add({
        targets: 'div.letter1',
        opacity: 1,
        right: '100px',
        easing: 'easeInOutQuad',
        delay: function(el, i, l){ return 100+i *30}
    });