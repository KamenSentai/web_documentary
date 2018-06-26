const overlay = document.createElement('div')
overlay.style.position   = 'absolute'
overlay.style.left       = '0'
overlay.style.top        = '0'
overlay.style.width      = '100%'
overlay.style.height     = '100%'
overlay.style.background = 'radial-gradient(rgba(0, 0, 255, 0.125), rgba(0, 0, 0, 1))'
document.body.insertBefore(overlay, document.body.firstChild)