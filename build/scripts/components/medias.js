export const $overlay = document.createElement('div')

export default function setMedias($container = document.querySelector('.barba-container'))
{
    const $medias = $container.querySelector('.chapter-about-container')

    if ($medias)
    {
        const $mediasButton = $container.querySelector('.chapter-medias-button')
        const $closeButton = $container.querySelector('.about-close-button')
        const title1 = $container.querySelector('.js-title1')
        const title2 = $container.querySelector('.js-title2')
        const title3 = $container.querySelector('.js-title3')
        const text1 = $container.querySelector('.js-text1')
        const text2 = $container.querySelector('.js-text2')
        const text3 = $container.querySelector('.js-text3')

        $overlay.classList.add('overlay-medias')
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
        $container.insertBefore($overlay, $medias)

        $mediasButton.addEventListener('click', () => {
            $medias.classList.add('active')
            $overlay.style.opacity = '1'
            $overlay.style.zIndex  = '5'
        })

        title1.addEventListener('click', () => {
            title1.classList.remove('hidden')
            text1.classList.remove('hidden')
            title2.classList.add('hidden')
            text2.classList.add('hidden')
            title3.classList.add('hidden')
            text3.classList.add('hidden')
        })

        title2.addEventListener('click', () => {
            title2.classList.remove('hidden')
            text2.classList.remove('hidden')
            title1.classList.add('hidden')
            text1.classList.add('hidden')
            title3.classList.add('hidden')
            text3.classList.add('hidden')
        })

        title3.addEventListener('click', () => {
            title3.classList.remove('hidden')
            text3.classList.remove('hidden')
            title1.classList.add('hidden')
            text1.classList.add('hidden')
            title2.classList.add('hidden')
            text2.classList.add('hidden')
        })

        $closeButton.addEventListener('click', () => {
            $medias.classList.remove('active')
            $overlay.style.opacity = '0'
            $overlay.style.zIndex  = '-1'
        })

        $overlay.addEventListener('click', () => {
            $medias.classList.remove('active')
            $overlay.style.opacity = '0'
            $overlay.style.zIndex  = '-1'
        })
    }    
}