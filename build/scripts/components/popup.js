export default function setPopup($container = document.querySelector('.barba-container'))
{
    const $popup = $container.querySelector('.chapter-about-container')

    if ($popup)
    {
        const $popup1 = $container.querySelector('.js-popup1')
        const $popup2 = $container.querySelector('.js-popup2')
        const $popupText1 = $container.querySelector('.js-popup-text1')
        const $popupText2 = $container.querySelector('.js-popup-text2')

        $popup1.addEventListener('click', (event) => {
            
            if($popup2.style.display = 'block') {
                $popup2.style.display = 'none'
                $popupText1.style.display = 'block'
                $popup1.classList.add('infos2')
            } else {
                $popup2.style.display = 'block'
                $popupText1.style.display = 'none'
                $popup1.classList.remove('infos2')
            }
        })
    }
}