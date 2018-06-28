export default function setSlider($container = document.querySelector('.barba-container'))
{
    const $slider = $container.querySelector('.slider')

    if ($slider)
    {
        const $slides = Array.from($slider.querySelectorAll('.slide'))
        const $exploreButton = $slider.querySelector('.chapter-explore-button')
        const $header = $container.querySelector('header')

        const isFirefox = (/Firefox/i.test(navigator.userAgent))
        const mouseWheelEvent = !isFirefox ? 'mousewheel' : 'DOMMouseScroll'

        let transited   = 0
        let isScrolled  = false
        let isPositive  = true
        let deltaScroll = 0

        window.addEventListener(mouseWheelEvent, event =>
        {
            if (!$container.querySelector('.chapter-about-container').classList.contains('active'))
            {
                if (!isFirefox)
                {
                    if ((event.deltaY >= 0) != isPositive)
                    {
                        isPositive = !isPositive
                        deltaScroll = 0
                    }
                    deltaScroll += event.deltaY
                } 
                else if ((event.detail >= 0) != isPositive)
                {
                    isPositive = !isPositive
                    deltaScroll = 0
                }
                deltaScroll += event.detail
    
                if (!isScrolled)
                {
                    isScrolled = true
    
                    $slides[transited].style.opacity = '0'
    
                    if (deltaScroll > 0)
                        transited = Math.min(transited + 1, $slides.length - 1)
                    else if (deltaScroll < 0)
                        transited = Math.max(transited - 1, 0)
    
                    $slides[transited].style.opacity = '1'
                    $slider.style.transform = `translateY(${- transited * 100}vh)`
                    if ($slides[transited].querySelector('.threeCircles'))
                    {
                        $slides[transited].querySelector('.threeCircles').querySelector('.chart-1').classList.add('animate')
                    }
                    transited == 0 ? $header.classList.remove('scrolled') : $header.classList.add('scrolled')
    
                    setTimeout(() =>
                    {
                        isScrolled = false
                    }, 1500)
                }
            }
        })

        $exploreButton.addEventListener('click', () =>
        {
            $slides[transited].style.opacity = '0'
            transited = 1
            $slides[transited].style.opacity = '1'
            $slider.style.transform = `translateY(${- transited * 100}vh)`
            if ($slides[transited].querySelector('.threeCircles'))
            {
                $slides[transited].querySelector('.threeCircles').querySelector('.chart-1').classList.add('animate')
            }
            transited == 0 ? $header.classList.remove('scrolled') : $header.classList.add('scrolled')
        })

        window.addEventListener('keydown', event =>
        {
            if (!$container.querySelector('.chapter-about-container').classList.contains('active'))
            {
                switch (event.keyCode)
                {
                    case 38:
                        if (transited > 0)
                        {
                            $slides[transited--].style.opacity = '0'
                            $slider.style.transform = `translateY(${- transited * 100}vh)`
                            $slides[transited].style.opacity = '1'
                            if ($slides[transited].querySelector('.threeCircles'))
                            {
                                $slides[transited].querySelector('.threeCircles').querySelector('.chart-1').classList.add('animate')
                            }
                            transited == 0 ? $header.classList.remove('scrolled') : $header.classList.add('scrolled')
                        }
                        break
                    case 40:
                        if (transited < $slides.length - 1)
                        {
                            $slides[transited++].style.opacity = '0'
                            $slider.style.transform = `translateY(${- transited * 100}vh)`
                            $slides[transited].style.opacity = '1'
                            if ($slides[transited].querySelector('.threeCircles'))
                            {
                                $slides[transited].querySelector('.threeCircles').querySelector('.chart-1').classList.add('animate')
                            }
                            transited == 0 ? $header.classList.remove('scrolled') : $header.classList.add('scrolled')
                        }
                        break
                }
            }
        })

        const $threeCircles = $container.querySelector('.threeCircles')
        
        if ($threeCircles)
        {
            let slided = 0
            const $containersCircle = $threeCircles.querySelectorAll('.container-circle')
            for (const $containerCircle of $containersCircle)
            {
                const $prev = $containerCircle.querySelector('.prev')
                const $next = $containerCircle.querySelector('.next')

                $prev.addEventListener('click', () =>
                {
                    slided -= 1
                    $threeCircles.style.transform = `translateX(-${slided * 100}vw)`
                    $threeCircles.querySelector(`.chart-${slided + 1}`).classList.add('animate')
                })

                $next.addEventListener('click', () =>
                {
                    slided += 1
                    $threeCircles.style.transform = `translateX(-${slided * 100}vw)`
                    $threeCircles.querySelector(`.chart-${slided + 1}`).classList.add('animate')
                })
            }
        }
    }
}