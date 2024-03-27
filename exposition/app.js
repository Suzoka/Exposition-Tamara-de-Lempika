import * as THREE from 'three';
import { GLTFLoader } from 'plugin/loaders/GLTFLoader.js';
import { PointerLockControls } from 'plugin/controls/PointerLockControls.js';

//? --- Load ---
const load = document.querySelector('.loader');

//? --- Scene ---
const scene = new THREE.Scene();
scene.background = new THREE.Color(0X1e1eee);


const loader = new GLTFLoader();
// loader.load("./asset/tamaravrfinal.glb",
loader.load("./asset/tamarafinalv2.glb",
    (gltf) => {
        load.style.display = "none";
        scene.add(gltf.scene);
        render();
    },
    (xhr) => {
        // console.log( ( xhr.loaded / xhr.total * 100 ) + '%');
        load.style.setProperty("--load", `${xhr.loaded / xhr.total * 100}%`);
        console.log(load.style["--load"]);
    },
    (error) => {
        console.log('An error happened', error);
    });



//? --- Light ---

//* - Ambient -
const ambient = new THREE.AmbientLight(0xffffff, 1);
scene.add(ambient);


//? --- Camera ---
const aspect = window.innerWidth / window.innerHeight;
const camera = new THREE.PerspectiveCamera(75, aspect, 0.1, 5000);
// //camera.position.set( 5, 1, 1 );
camera.position.set(3.5, 1.3, 0);
// //camera.lookAt( 3.5 , 1.5, 0);


//? --- PointerLockControls ---
const controls = new PointerLockControls(camera, document.body);

document.addEventListener('click', function () {
    controls.lock();
});

controls.addEventListener('lock', function () {
    console.log('Pointer is locked');
    //Masquer UI menu
});

controls.addEventListener('unlock', function () {
    console.log('Pointer is unlocked');
    //Afficher UI menu
});

//? --- Déplacements ---
let moveForward = false;
let moveBackward = false;
let moveLeft = false;
let moveRight = false;

let prevTime = performance.now();
const velocity = new THREE.Vector3();
const direction = new THREE.Vector3();

const onKeyDown = function (event) {

    switch (event.code) {

        case 'ArrowUp':
        case 'KeyW':
            moveForward = true;
            break;

        case 'ArrowLeft':
        case 'KeyA':
            moveLeft = true;
            break;

        case 'ArrowDown':
        case 'KeyS':
            moveBackward = true;
            break;

        case 'ArrowRight':
        case 'KeyD':
            moveRight = true;
            break;
    }

};

const onKeyUp = function (event) {

    switch (event.code) {

        case 'ArrowUp':
        case 'KeyW':
            moveForward = false;
            break;

        case 'ArrowLeft':
        case 'KeyA':
            moveLeft = false;
            break;

        case 'ArrowDown':
        case 'KeyS':
            moveBackward = false;
            break;

        case 'ArrowRight':
        case 'KeyD':
            moveRight = false;
            break;

    }

};

document.addEventListener('keydown', onKeyDown);
document.addEventListener('keyup', onKeyUp);

//? --- Renderer
const renderer = new THREE.WebGLRenderer({
    antialias: true
});
renderer.setSize(window.innerWidth, window.innerHeight);
document.body.appendChild(renderer.domElement);

//? --- Rendu ---

function render() {

    const time = performance.now();

    if (controls.isLocked === true) {

        const delta = (time - prevTime) / 1000;

        velocity.x -= velocity.x * 10.0 * delta;
        velocity.z -= velocity.z * 10.0 * delta;

        velocity.y -= 9.8 * 100.0 * delta; // 100.0 = mass

        direction.z = Number(moveForward) - Number(moveBackward);
        direction.x = Number(moveRight) - Number(moveLeft);
        direction.normalize(); // this ensures consistent movements in all directions

        if (moveForward || moveBackward) velocity.z -= direction.z * 30.0 * delta;
        if (moveLeft || moveRight) velocity.x -= direction.x * 30.0 * delta;

        controls.moveRight(- velocity.x * delta);
        controls.moveForward(- velocity.z * delta);

    }

    prevTime = time;

    renderer.render(scene, camera);
    requestAnimationFrame(render);
}
