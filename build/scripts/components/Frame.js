export default class Frame
{
    constructor()
    {

    }

    resquest()
    {
        const loop = () =>
        {
            window.requestAnimationFrame(loop)
        }
        loop()
    }
}