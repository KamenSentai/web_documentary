export default function setAudio($container = document.querySelector('.barba-container'))
{
    const $audio = $container.querySelector('.audio')
    
    if ($audio)
    {
        const $sound = $audio.querySelector('audio')
        const $button = $audio.querySelector('.button')
        const $bar = $audio.querySelector('.bar')
        const $fill = $bar.querySelector('.fill')
        const $start = $bar.querySelector('.start')
        const $end = $bar.querySelector('.end')

        const secondsToHms = (d) =>
        {
            d = Number(d)
            const h = Math.floor(d / 3600)
            const m = Math.floor(d % 3600 / 60)
            const s = Math.floor(d % 3600 % 60)
            const hDisplay = h > 0 ? (h > 9 ? h + "" : "0" + h ) + " : " : "00 : "
            const mDisplay = m > 0 ? (m > 9 ? m + "" : "0" + m ) + " : " : "00 : "
            const sDisplay = s > 0 ? (s > 9 ? s + "" : "0" + s ) + "" : "00"
            return hDisplay + mDisplay + sDisplay 
        }
        $end.textContent = secondsToHms($sound.duration)

        $button.addEventListener('click', () =>
        {
            $button.classList.toggle('paused')

            if (!$button.classList.contains('paused'))
            {
                $sound.play()
            }
            else
            {
                $sound.pause()
            }
        })

        $sound.addEventListener('timeupdate', () =>
        {
            const ratio = $sound.currentTime / $sound.duration
            $fill.style.transform = `scaleX(${ratio})`
        })

        $sound.addEventListener('ended', () =>
        {
            $sound.currentTime = 0
            $fill.style.transform = `scaleX(0)`
            $button.classList.toggle('paused')
        })
    }
}