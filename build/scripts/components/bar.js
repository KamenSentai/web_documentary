export default function setBar($container = document.querySelector('.barba-container'))
{
    const $bars = $container.querySelectorAll('.container-bar')

    if ($bars.length > 0)
    {
        for (const $bar of $bars)
        {
            const $fills = $bar.querySelectorAll('.container-fill')

            for (const $fill of $fills)
            {
                const $dataFill = $fill.dataset.fill / 100
                const $filler = $fill.querySelector('.container-filler')
                $filler.style.transform = `scaleY(${$dataFill})`
            }
        }

        const $popups = $container.querySelectorAll('.bar-popup')

        if ($popups.length > 0)
        {
            for (const $popup of $popups)
            {
                const $button = $popup.querySelector('.bar-button')
                const $pop = $popup.querySelector('.bar-pop')
                const $close = $popup.querySelector('.close')

                const $overlay = document.createElement('div')
                $overlay.style.position        = 'absolute'
                $overlay.style.left            = '0'
                $overlay.style.top             = '0'
                $overlay.style.width           = '100vw'
                $overlay.style.height          = '100vh'
                $overlay.style.backgroundColor = 'rgba(0, 0, 0, 0.75)'
                $overlay.style.transition      = 'opacity 0.5s ease-out'
                $overlay.style.opacity         = '0'
                $overlay.style.willChange      = 'opacity'
                $overlay.style.zIndex          = '-1'
                const $area   = $container.querySelector('.area')
                const $header = $container.querySelector('header')
                const offX    = $area.getBoundingClientRect().left
                const offY    = $header.getBoundingClientRect().height + $header.getBoundingClientRect().top
                $overlay.style.transform = `translate(${- offX}px, calc(${- offY}px - 0.5rem))`
                $popup.insertBefore($overlay, $pop)

                $button.addEventListener('click', () =>
                {
                    $pop.style.display     = 'block'
                    $overlay.style.zIndex  = '0'
                    $overlay.style.opacity = '1'
                })

                $close.addEventListener('click', () =>
                {
                    $pop.style.display     = 'none'
                    $overlay.style.zIndex  = '-1'
                    $overlay.style.opacity = '0'
                })

                $overlay.addEventListener('click', () =>
                {
                    $pop.style.display     = 'none'
                    $overlay.style.zIndex  = '-1'
                    $overlay.style.opacity = '0'
                })
            }
        }
    }

    const $texts = $container.querySelectorAll('.text')

    if ($texts.length > 0)
    {
        for (const $text of $texts)
        {
            const $popups = $text.querySelector('.container-popups')
    
            if ($popups)
            {
                const $button = $text.querySelector('.button-pop')
                const $pops = $popups.querySelectorAll('.bar-pop')
                const $closes = $popups.querySelectorAll('.close')

                const $overlay = document.createElement('div')
                $overlay.style.position        = 'absolute'
                $overlay.style.left            = '0'
                $overlay.style.top             = '0'
                $overlay.style.width           = '100vw'
                $overlay.style.height          = '100vh'
                $overlay.style.backgroundColor = 'rgba(0, 0, 0, 0.75)'
                $overlay.style.transition      = 'opacity 0.5s ease-out'
                $overlay.style.opacity         = '0'
                $overlay.style.willChange      = 'opacity'
                $overlay.style.zIndex          = '-1'
                const $area   = $container.querySelector('.area')
                const $header = $container.querySelector('header')
                const offX    = $area.getBoundingClientRect().left
                const offY    = $header.getBoundingClientRect().height + $header.getBoundingClientRect().top
                $overlay.style.transform = `translate(${- offX}px, calc(${- offY}px - 0.5rem))`
                $popups.insertBefore($overlay, $pops[0])

                $button.addEventListener('click', () =>
                {
                    for (const $pop of $pops)
                    {
                        $pop.style.display = 'block'
                        $pop.style.zIndex   = '1'
                    }
                    $overlay.style.zIndex  = '0'
                    $overlay.style.opacity = '1'
                    $popups.style.zIndex   = '1'
                })

                for (const $close of $closes)
                {
                    $close.addEventListener('click', () =>
                    {
                        for (const $pop of $pops)
                        {
                            $pop.style.display = 'none'
                        }
                        $overlay.style.zIndex  = '-1'
                        $overlay.style.opacity = '0'
                        $popups.style.zIndex   = '-1'
                    })
                }

                $overlay.addEventListener('click', () =>
                {
                    for (const $pop of $pops)
                    {
                        $pop.style.display = 'none'
                    }
                    $overlay.style.zIndex  = '-1'
                    $overlay.style.opacity = '0'
                    $popups.style.zIndex   = '-1'
                })
            }
        }
    }

    const $character = $container.querySelector('.character')

    if ($character)
    {
        const $containersCharacter = $character.querySelectorAll('.container-character')

        for (const $containerCharacter of $containersCharacter)
        {
            const $button = $containerCharacter.querySelector('.button-pop')
            const $pop = $containerCharacter.querySelector('.bar-pop')
            const $close = $containerCharacter.querySelector('.close')

            $button.addEventListener('click', () =>
            {
                $pop.style.display    = 'block'
                $pop.style.zIndex     = '1'
                $button.style.zIndex  = '-1'
            })

            $close.addEventListener('click', () =>
            {
                $pop.style.display    = 'none'
                $pop.style.zIndex     = '-1'
                $button.style.zIndex  = '1'
            })
        }
    }
}