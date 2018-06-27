export default function setMedias(medias = document.querySelector('.chapter-about-container'))
{
    if (medias)
    {
        const mediasButton = document.querySelector('.chapter-medias-button')
        const closeButton = document.querySelector('.about-close-button')
        const title1 = document.querySelector('.js-title1')
        const title2 = document.querySelector('.js-title2')
        const title3 = document.querySelector('.js-title3')
        const text1 = document.querySelector('.js-text1')
        const text2 = document.querySelector('.js-text2')
        const text3 = document.querySelector('.js-text3')
    
        mediasButton.addEventListener('click', () => {
            medias.style.transform = 'translateX(0)'
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
    
        closeButton.addEventListener('click', (event) => {
            event.preventDefault
    
            medias.style.transform = 'translateX(40vw)'
        })
    }    
}