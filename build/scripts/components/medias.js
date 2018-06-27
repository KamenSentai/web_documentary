const medias = document.querySelector('.chapter-about-container')

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
    
    mediasButton.addEventListener('click', (event) => {
        event.preventDefault
    
        medias.style.transform = 'translateX(0)'

        // C'est moche mais ça marche
        // Si c'est title1 qui est actif
        if(!title1.classList.contains('hidden')) {
            // Au click sur title2 il passe actif et title1 passe hidden
            title2.addEventListener('click', (event) => {
                title2.classList.remove('hidden')
                text2.classList.remove('hidden')
                title1.classList.add('hidden')
                text1.classList.add('hidden')
            })            
            // Au click sur title3 il passe actif et title1 passe hidden
            title3.addEventListener('click', (event) => {
                title3.classList.remove('hidden')
                text3.classList.remove('hidden')
                title1.classList.add('hidden')
                text1.classList.add('hidden')
            })
        }
        // Si c'est title1 qui est actif
        if(!title2.classList.contains('hidden')) {
            // Au click sur title1 il passe actif et title2 passe hidden
            title1.addEventListener('click', (event) => {
                title1.classList.remove('hidden')
                text1.classList.remove('hidden')
                title2.classList.add('hidden')
                text2.classList.add('hidden')
            })            
            // Au click sur title3 il passe actif et title2 passe hidden
            title3.addEventListener('click', (event) => {
                title3.classList.remove('hidden')
                text3.classList.remove('hidden')
                title2.classList.add('hidden')
                text2.classList.add('hidden')
            })
        }
        // Si c'est title3 qui est actif
        if(!title3.classList.contains('hidden')) {
            // Au click sur title1 il passe actif et title3 passe hidden
            title1.addEventListener('click', (event) => {
                title1.classList.remove('hidden')
                text1.classList.remove('hidden')
                title3.classList.add('hidden')
                text3.classList.add('hidden')
            })            
            // Au click sur title2 il passe actif et title3 passe hidden
            title2.addEventListener('click', (event) => {
                title2.classList.remove('hidden')
                text2.classList.remove('hidden')
                title3.classList.add('hidden')
                text3.classList.add('hidden')
            })
        }
    
        closeButton.addEventListener('click', (event) => {
            event.preventDefault
    
            medias.style.transform = 'translateX(40vw)'
        })
    })
}
