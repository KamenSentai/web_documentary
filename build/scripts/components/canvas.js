let windowWidth  = window.innerWidth
let windowHeight = window.innerHeight
let ratioWindow  = windowWidth / windowHeight

const scene = new THREE.Scene()

const renderer = new THREE.WebGLRenderer()
renderer.setClearColor(0xffffff, 1)
renderer.setSize(window.innerWidth, window.innerHeight)

document.body.insertBefore(renderer.domElement, document.body.firstChild)

const camera = new THREE.PerspectiveCamera(50, ratioWindow, 1, 100000)
camera.position.y = 100
camera.rotation.x = - Math.PI / 2
camera.rotation.y = - Math.PI / 4
camera.rotation.z = - Math.PI / 2

const waterNormals = new THREE.ImageUtils.loadTexture('assets/images/normal.png')
waterNormals.wrapS = THREE.RepeatWrapping
waterNormals.wrapT = THREE.RepeatWrapping

const water = new THREE.Water(renderer, camera, scene,
{
    waterNormals : waterNormals,
    waterColor   : 0x1F4F4F,
})

const mirrorMesh = new THREE.Mesh(
    new THREE.PlaneBufferGeometry(100000, 100000),
    water.material
)

mirrorMesh.add(water)
mirrorMesh.rotation.x = - Math.PI * 0.5
mirrorMesh.position.y = -10
scene.add(mirrorMesh)

const cubeMap  = new THREE.CubeTexture([])
cubeMap.format = THREE.RGBFormat

const loader = new THREE.ImageLoader()

loader.load('assets/images/skybox.png', (image) =>
{
    const getSide = (x, y) =>
    {
        const size    = 1024
        const canvas  = document.createElement('canvas')
        canvas.width  = size
        canvas.height = size

        const context = canvas.getContext('2d')
        context.drawImage(image, - x * size, - y * size)

        return canvas
    }

    cubeMap.images[0]   = getSide(2, 1)
    cubeMap.images[1]   = getSide(0, 1)
    cubeMap.images[2]   = getSide(1, 0)
    cubeMap.images[3]   = getSide(1, 2)
    cubeMap.images[4]   = getSide(1, 1)
    cubeMap.images[5]   = getSide(3, 1)
    cubeMap.needsUpdate = true
})

const cubeShader = THREE.ShaderLib['cube']
cubeShader.uniforms['tCube'].value = cubeMap

const skyBoxMaterial = new THREE.ShaderMaterial(
{
    fragmentShader : cubeShader.fragmentShader,
    vertexShader   : cubeShader.vertexShader,
    uniforms       : cubeShader.uniforms,
    depthWrite     : false,
    side           : THREE.BackSide
})

const skyBox = new THREE.Mesh(
  new THREE.BoxGeometry(100000, 100000, 100000),
  skyBoxMaterial
)

scene.add(skyBox)

skyBox.position.y = - 10
skyBox.position.z = - 10

const resizeScene = () =>
{
    windowWidth   = window.innerWidth
    windowHeight  = window.innerHeight
    ratioWindow   = windowWidth / windowHeight
    camera.aspect = ratioWindow
    camera.updateProjectionMatrix()
    renderer.setSize(windowWidth, windowHeight)
}

const animate = () =>
{
    requestAnimationFrame(animate)

    water.material.uniforms.time.value += 1.0 / 40.0
    water.render()

    renderer.render(scene, camera)
}
animate()

window.addEventListener('resize', resizeScene)