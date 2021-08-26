document.addEventListener('DOMContentLoaded', function () {
    const mobileMenuCall = document.querySelector('.mobile-menu-call')
    const menu = document.querySelector('.top-navigation')
    const submenuCall = document.querySelector('.menu-item-has-children')
    const submenu = document.querySelector('.sub-menu')

    // submenuCall.

    window.addEventListener('resize', () => {
        if (document.body.clientWidth > 1024) {
            menu.classList.remove('show')
            submenu.classList.remove('show')
        }
    })

    mobileMenuCall.addEventListener('click', () => {
        menu.classList.toggle('show')
    })

    submenuCall.addEventListener('click', () => {
        if (document.body.clientWidth <= 1024) {
            submenu.classList.toggle('show')
        }
    })
})
