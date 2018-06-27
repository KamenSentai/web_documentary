export default function setMenu($container = document.querySelector('.barba-container'))
{
    const $menu = $container.querySelector('.button--menu')

    if ($menu)
    {
        const $menuX = $menu.offsetLeft + $menu.offsetWidth / 2
        const $menuY = $menu.offsetTop + $menu.offsetHeight / 2
    
        const $circle       = $menu.querySelector('.button--circle')
        const $circleRadius = $circle.offsetWidth / 2
    
        const $main = $menu.querySelector('.button--main')
    
        const easing = {x: 0, y: 0}

        const $overlay = document.createElement('div')
        $overlay.style.zIndex          = '-1'
        $overlay.style.position        = 'absolute'
        $overlay.style.left            = '0'
        $overlay.style.top             = '0'
        $overlay.style.width           = '100%'
        $overlay.style.height          = '100%'
        $overlay.style.backgroundColor = 'rgba(0, 0, 0, 0.75)'
        $overlay.style.transition      = 'opacity 0.5s ease-out'
        $overlay.style.opacity         = '0'
        $overlay.style.willChange      = 'opacity'
        $container.insertBefore($overlay, $menu)

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

            if ($menu.contains(event.target) || $menu == event.target)
            {
                $overlay.style.opacity = '1'
                $overlay.style.zIndex  = '1'
            }
            else
            {
                $overlay.style.opacity = '0'
                $overlay.style.zIndex  = '-1'
            }
        })
    }
}