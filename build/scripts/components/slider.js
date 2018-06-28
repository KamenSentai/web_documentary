export default function setSlider($container = document.querySelector('.barba-container'))
{
    const $slider = $container.querySelector('.slider')

    if ($slider)
    {
        const $slides = Array.from($slider.querySelectorAll('.slide'))
        const $exploreButton = $slider.querySelector('.chapter-explore-button')

        const isFirefox = (/Firefox/i.test(navigator.userAgent))
        const mouseWheelEvent = !isFirefox ? 'mousewheel' : 'DOMMouseScroll'

        let transited   = 0
        let isScrolled  = false
        let isPositive  = true
        let deltaScroll = 0

        window.addEventListener(mouseWheelEvent, event =>
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

                setTimeout(() =>
                {
                    isScrolled = false
                }, 1500)
            }
        })

        $exploreButton.addEventListener('click', () =>
        {
            transited = 1
            $slider.style.transform = `translateY(${- transited * 100}vh)`
        })
    }
}