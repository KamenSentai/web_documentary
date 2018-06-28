export default function setPopup($container = document.querySelector('.barba-container'))
{
    const $infosPop = $container.querySelector('.slide3-container2')

    if ($infosPop)
    {
        const $popButton = $container.querySelector('.slide3-button')
        const $popMessage = $container.querySelector('.slide3-button-pop')
        const $popButtonClose = $container.querySelector('.pop-button-close')

        $popButton.addEventListener('click', (event) => {
            $popMessage.style.display = 'block'
            setTimeout(() => {
                $popMessage.style.opacity = 1
            }, 100);
        })

        $popButtonClose.addEventListener('click', (event) => {
            $popMessage.style.opacity = 0
            setTimeout(() => {
                $popMessage.style.display = 'none'
            }, 500);
        })
    }
    
    const $infosPop2 = $container.querySelector('.slide1-container1')

    if ($infosPop2)
    {
        const $popButton = $container.querySelector('.slide6-button')
        const $popMessage = $container.querySelector('.slide6-button-pop')
        const $popButtonClose = $container.querySelector('.pop-button-close2')

        $popButton.addEventListener('click', (event) => {
            $popMessage.style.display = 'block'
            setTimeout(() => {
                $popMessage.style.opacity = 1
            }, 100);
        })

        $popButtonClose.addEventListener('click', (event) => {
            $popMessage.style.opacity = 0
            setTimeout(() => {
                $popMessage.style.display = 'none'
            }, 500);
        })
    }
}