import * as THREE from 'three';
import { GLTFLoader } from 'plugin/loaders/GLTFLoader.js';
import { OrbitControls } from 'plugin/controls/OrbitControls.js';

// console.log(THREE);
// console.log(GLTFLoader);

//? --- Scene ---
const scene = new THREE.Scene();
scene.background = new THREE.Color(0X1e1eee);


// //? --- Cube ---
// const geometry = new THREE.BoxGeometry( 3, 3, 3 );
// let cube;

// const loader = new THREE.TextureLoader();
// loader.load('./beluga.jpg', (texture) => {

//     const material = new THREE.MeshBasicMaterial({
//         map: texture
//     });

//     cube = new THREE.Mesh( geometry, material );
//     scene.add( cube );
//     render();
// });

const loader = new GLTFLoader();
// loader.load("./asset/tamaravrfinal.glb",
loader.load("./asset/tamarafinalv2.glb",
( gltf )=> {
		scene.add( gltf.scene );
        render();
},
( xhr )=> {
		console.log( ( xhr.loaded / xhr.total * 100 ) + '%');
	},
( error )=> {
		console.log( 'An error happened' );
	});



//? --- Light ---

//* - Ambient -
const ambient = new THREE.AmbientLight(0xffffff, 1);
scene.add(ambient);


//? --- Camera ---
const aspect = window.innerWidth / window.innerHeight;
const camera = new THREE.PerspectiveCamera( 75, aspect, 0.1, 5000 );
// camera.position.set( 5, 1, 1 );
camera.position.set( 3.5, 1.5, 0 );
// camera.lookAt( 3.5 , 1.5, 0);

//? --- Renderer
const renderer = new THREE.WebGLRenderer({
    antialias: true
});
renderer.setSize(window.innerWidth, window.innerHeight);
document.body.appendChild( renderer.domElement );

//? --- Control

// const controls = new OrbitControls(camera, renderer.domElement);

//? --- Rendu ---

function render() {

    // cube.rotation.x += 0.01;
    // cube.rotation.y += 0.01;
    // cube.rotation.z += 0.01;

    // controls.update();
    // renderer.setSize(window.innerWidth, window.innerHeight);
    renderer.render( scene, camera );
    requestAnimationFrame(render);
}

addEventListener('keydown', (e)=> {
    if (e.key == 'ArrowUp' || e.key == 'z') {
        camera.position.z -= 0.1;
    } else if (e.key == 'ArrowDown' || e.key == 's') {
        camera.position.z += 0.1;
    }
})

// renderer.render( scene, camera );
// render();