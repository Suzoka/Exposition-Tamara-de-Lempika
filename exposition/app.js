import * as THREE from 'three';

// console.log(THREE);

//? --- Scene ---
const scene = new THREE.Scene();
scene.background = new THREE.Color(0X1e1eee);


//? --- Cube ---
const geometry = new THREE.BoxGeometry( 5, 5, 5 );
let cube;

const loader = new THREE.TextureLoader();
loader.load('./beluga.jpg', (texture) => {

    const material = new THREE.MeshBasicMaterial({
        map: texture
    });

    cube = new THREE.Mesh( geometry, material );
    scene.add( cube );
    render();
});


//? --- Light ---

//* - Ambient -
const ambient = new THREE.AmbientLight(0xffffff, 0.2);
scene.add(ambient);


//? --- Camera ---
const aspect = window.innerWidth / window.innerHeight;
const camera = new THREE.PerspectiveCamera( 75, aspect, 1, 5000 );
camera.position.set( 0, 0, 10 );

//? --- Renderer
const renderer = new THREE.WebGLRenderer({
    antialias: true
});
renderer.setSize(window.innerWidth, window.innerHeight);
document.body.appendChild( renderer.domElement );


//? --- Rendu ---

function render() {

    cube.rotation.x += 0.01;
    cube.rotation.y += 0.01;
    cube.rotation.z += 0.01;

    // controls.update();
    renderer.render( scene, camera );
    requestAnimationFrame(render);
}

// renderer.render( scene, camera );
// render();