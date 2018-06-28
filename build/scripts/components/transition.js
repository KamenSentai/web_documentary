import setMenu from './menu'
import setMedias from './medias'
import setSlider from './slider'
import setSideBarWave from './wave'

setMenu()
setMedias()
setSlider()
setSideBarWave()
const $links = document.querySelectorAll('a')

for (const $link of $links)
{
    if ($link.href == window.location.href)
    {
        $link.addEventListener('click', event =>
        {
            event.preventDefault()
        })
    }
}
document.addEventListener('DOMContentLoaded', () =>
{
    Barba.Pjax.init()
    Barba.Prefetch.init()
    
    let changePage = Barba.BaseTransition.extend(
        {
            start: function ()
            {
                Promise
                    .all([this.newContainerLoading, () => {}])
                    .then(this.change.bind(this))
            },

            change: function ()
            {
                setMenu(this.newContainer)
                setMedias(this.newContainer)
                setSlider(this.newContainer)
                setSideBarWave(this.newContainer)
                const $links = this.newContainer.querySelectorAll('a')

                for (const $link of $links)
                {
                    if ($link.href == window.location.href)
                    {
                        $link.addEventListener('click', event =>
                        {
                            event.preventDefault()
                        })
                    }
                }
                this.done()
            }
        }
    )

    Barba.Pjax.getTransition = function ()
    {
        return changePage
    }
})