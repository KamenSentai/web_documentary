export default function setPopup($container = document.querySelector('.barba-container'))
{
    const $popup = $container.querySelector('.slide2-container3')

    if ($popup)
    {
        const $popup1 = $container.querySelector('.js-popup1')
        const $popup2 = $container.querySelector('.js-popup2')
        const $popupText1 = $container.querySelector('.js-popup-text1')
        const $popupText2 = $container.querySelector('.js-popup-text2')

        $popup1.addEventListener('click', (event) => {
            if(!$popup1.classList.contains('infos2')) {
                $popup2.style.display = 'none'
                $popupText1.style.display = 'block'
                $popup1.classList.add('infos2')
            } else if($popup1.classList.contains('infos2')) {
                $popup2.style.display = 'block'
                $popupText1.style.display = 'none'
                $popup1.classList.remove('infos2')
            }
        })

        $popup2.addEventListener('click', (event) => {
            if(!$popup2.classList.contains('infos2')) {
                $popup1.style.display = 'none'
                $popupText2.style.display = 'block'
                $popup2.classList.add('infos2')
            } else if($popup2.classList.contains('infos2')) {
                $popup1.style.display = 'block'
                $popupText2.style.display = 'none'
                $popup2.classList.remove('infos2')
            }
        })
    }
}