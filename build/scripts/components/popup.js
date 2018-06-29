export default function setPopup($container = document.querySelector('.barba-container'))
{
    const $containerPopups = $container.querySelectorAll('.container-popups')

    if ($containerPopups.length > 0)
    {
        for (const $containerPopup of $containerPopups)
        {
            const $popups = $containerPopup.querySelectorAll('.container-popup')

            for (const $popup of $popups)
            {
                const $question = $popup.querySelector('.container-question')

                $question.addEventListener('click', () =>
                {
                    $popup.classList.toggle('active')
                })
            }
        }
    }
}