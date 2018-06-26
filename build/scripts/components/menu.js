const $menu  = document.querySelector('.button--menu')
const $menuX = $menu.offsetLeft + $menu.offsetWidth / 2
const $menuY = $menu.offsetTop + $menu.offsetHeight / 2

const $circle       = $menu.querySelector('.button--circle')
const $circleRadius = $circle.offsetWidth / 2

const $main = $menu.querySelector('.button--main')

const easing = {x: 0, y: 0}

window.addEventListener('mousemove', event =>
{
    const deltaX = event.clientX - $menuX
    const deltaY = event.clientY - $menuY

    if (Math.sqrt(deltaX ** 2 + deltaY ** 2) <= $circleRadius)
    {
        easing.x += ((deltaX / 25) - easing.x) * 0.1
        easing.y += ((deltaY / 25) - easing.y) * 0.1
    }
    else
    {
        easing.x -= Math.abs(((deltaX / 25) - easing.x) * 0.1)
        easing.y -= Math.abs(((deltaY / 25) - easing.y) * 0.1)

        easing.x = Math.max(easing.x, 0)
        easing.y = Math.max(easing.y, 0)
    }
    $main.style.transform = `translate(${easing.x}px, ${easing.y}px)`
})