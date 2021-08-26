//Carousel
let position = 0

//Carousel elements from page
const container = document.querySelector('.carousel')
const track = document.querySelector('.carousel__tracker')
const posts = document.querySelectorAll('.carousel__tracker__post')

const left = document.querySelector('.carousel__left')
const right = document.querySelector('.carousel__right')

const intervalTime = 4000
let itemWidth = 0
let itemsCountWidth = 0
let carouselTimer = setInterval(setPosition, intervalTime)

window.onload = displayWindowSize()
window.onresize = displayWindowSize

function displayWindowSize() {
    itemWidth = window.innerWidth
    itemsCountWidth = -(posts.length * itemWidth) + itemWidth
    posts.forEach((item) => {
        item.style.minWidth = `${itemWidth}px`
    })
    setPosition()
}

function setPosition(newPosition) {
    if (isNaN(newPosition)) {
        position -= itemWidth
        checkPosition()
        newPosition = position
    }
    track.style.transform = `translateX(${newPosition}px)`
}

function checkPosition() {
    if (position > 0) position = itemsCountWidth
    if (position < itemsCountWidth) position = 0
}

left.addEventListener('click', () => {
    position += itemWidth
    checkPosition()
    clearInterval(carouselTimer)
    carouselTimer = setInterval(setPosition, intervalTime)
    setPosition(position)
})

right.addEventListener('click', () => {
    position -= itemWidth
    checkPosition()
    clearInterval(carouselTimer)
    carouselTimer = setInterval(setPosition, intervalTime)
    setPosition(position)
})


// can be added later
// function Timer(fn, t) {
//     var timerObj = setInterval(fn, t);

//     this.stop = function() {
//         if (timerObj) {
//             clearInterval(timerObj);
//             timerObj = null;
//         }
//         return this;
//     }

//     // start timer using current settings (if it's not already running)
//     this.start = function() {
//         if (!timerObj) {
//             this.stop();
//             timerObj = setInterval(fn, t);
//         }
//         return this;
//     }

//     // start with new or original interval, stop current interval
//     this.reset = function(newT = t) {
//         t = newT;
//         return this.stop().start();
//     }
// }