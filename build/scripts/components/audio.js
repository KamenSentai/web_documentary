const $audio = document.querySelector('.slide4-audio')
const $playButton = document.querySelector('.slide4-button')

$playButton.addEventListener('click', (event) => {
    $audio.play()
})