//Carousel
let position = 0

//Carousel elements from page
const container = document.querySelector('.carousel')
const track = document.querySelector('.carousel__tracker')
const posts = document.querySelectorAll('.carousel__tracker__post')

const left = document.querySelector('.left')
const right = document.querySelector('.right')

let itemWidth = 0
let itemsCountWidth = 0

window.onload = displayWindowSize();
window.onresize = displayWindowSize;

function displayWindowSize() {
    itemWidth = window.innerWidth;
    itemsCountWidth = -(posts.length * itemWidth) + itemWidth
    posts.forEach(item => {
        item.style.minWidth = `${itemWidth}px`
    })
}

const setPosition = () => {
    track.style.transform = `translateX(${position}px)`
}

const checkPosition = () => {
    if (position > 0) position = itemsCountWidth
    if (position < itemsCountWidth) position = 0
}

left.addEventListener('click', () => {
    position += itemWidth
    checkPosition()
    setPosition()
})

right.addEventListener('click', () => {
    position -= itemWidth
    checkPosition()
    setPosition()
})
