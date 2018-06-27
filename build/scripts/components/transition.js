import setMenu from './menu'

setMenu()
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
                setMenu(this.newContainer.querySelector('.menu'))
                this.done()
            }
        }
    )

    Barba.Pjax.getTransition = function ()
    {
        return changePage
    }
})