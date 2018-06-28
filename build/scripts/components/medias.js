export default function setMedias($container = document)
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

        $mediasButton.addEventListener('click', () => {
            $medias.style.transform = 'translateX(0)'
        })

        title1.addEventListener('click', (event) => {
            title1.classList.remove('hidden')
            text1.classList.remove('hidden')
            title2.classList.add('hidden')
            text2.classList.add('hidden')
            title3.classList.add('hidden')
            text3.classList.add('hidden')
        })

        title2.addEventListener('click', (event) => {
            title2.classList.remove('hidden')
            text2.classList.remove('hidden')
            title1.classList.add('hidden')
            text1.classList.add('hidden')
            title3.classList.add('hidden')
            text3.classList.add('hidden')
        })

        title3.addEventListener('click', (event) => {
            title3.classList.remove('hidden')
            text3.classList.remove('hidden')
            title1.classList.add('hidden')
            text1.classList.add('hidden')
            title2.classList.add('hidden')
            text2.classList.add('hidden')
        })

        $closeButton.addEventListener('click', (event) => {
            $medias.style.transform = 'translateX(40vw)'
        })
    }    
}