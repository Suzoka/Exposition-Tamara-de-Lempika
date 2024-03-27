import * as THREE from 'three';
import { GLTFLoader } from 'plugin/loaders/GLTFLoader.js';
import { PointerLockControls } from 'plugin/controls/PointerLockControls.js';

//? --- DOM ---
const progress__container = document.querySelector('.js_progress__container');
const progress__bar = document.querySelector('.js_progress__bar');
const progress__number = document.querySelector('.js_progress__number');
const menu = document.querySelector('.js_menu');
const button = document.querySelector('.js_menu__button');

//? --- Scene ---
const scene = new THREE.Scene();
scene.background = new THREE.Color(0X13261E);


const loader = new GLTFLoader();
// loader.load("./asset/tamaravrfinal.glb",
loader.load("./asset/tamarafinalv2.glb",
    (gltf) => {
        progress__container.classList.remove("progress__container--open");
        progress__container.classList.add("progress__container--close");
        scene.add(gltf.scene);
        render();
    },
    (xhr) => {
        // console.log( ( xhr.loaded / xhr.total * 100 ) + '%');
        progress__bar.style.setProperty("--load", `${xhr.loaded / xhr.total * 100}%`);
        progress__number.textContent = `${Math.floor(xhr.loaded / xhr.total * 100)}%`;
    },
    (error) => {
        console.log('An error happened', error);
    });



//? --- Light ---

//* - Ambient -
const HemisphereLight = new THREE.HemisphereLight( 0xfff0FF, 0xDAE1F9, 0.5 );
scene.add(HemisphereLight);
const HemisphereLight2 = new THREE.HemisphereLight( 0xFFF6D7, 0xAAAAAA, 0.7 );
scene.add(HemisphereLight2);
const ambient = new THREE.AmbientLight(0xffffff, 0.5);
scene.add(ambient);
const point1 = new THREE.PointLight(0xFFF6D7, 1, 8, 1);
point1.position.set(3.5, 2.8, -8);
scene.add(point1);
// const helper1 = new THREE.PointLightHelper(point1);
// scene.add( helper1 );

const point2 = new THREE.PointLight(0xFFF6D7, 1, 8, 1);
point2.position.set(3.5, 2.8, -11);
scene.add(point2);

const point3 = new THREE.PointLight(0xFFF6D7, 1, 8, 1);
point3.position.set(6.5, 2.8, -14);
scene.add(point3);

const point6 = new THREE.PointLight(0xFFF6D7, 1, 8, 1);
point6.position.set(6.5, 2.8, -20);
scene.add(point6);

const point4 = new THREE.PointLight(0xFFF6D7, 1, 8, 1);
point4.position.set(0.5, 2.8, -14);
scene.add(point4);

const point5 = new THREE.PointLight(0xFFF6D7, 1, 8, 1);
point5.position.set(0.5, 2.8, -20);
scene.add(point5);


//? --- Camera ---
const aspect = window.innerWidth / window.innerHeight;
const camera = new THREE.PerspectiveCamera(75, aspect, 0.1, 5000);
// //camera.position.set( 5, 1, 1 );
camera.position.set(3.5, 1.3, 0);
// //camera.lookAt( 3.5 , 1.5, 0);


//? --- PointerLockControls ---
const controls = new PointerLockControls(camera, document.body);

button.addEventListener('click', function () {
    controls.lock();
});

controls.addEventListener('lock', function () {
    console.log('Pointer is locked');
    menu.style.opacity = 0;
    //Masquer UI menu
});

controls.addEventListener('unlock', function () {
    console.log('Pointer is unlocked');
    menu.style.opacity = 1;
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

    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();
    renderer.setSize(window.innerWidth, window.innerHeight);

    renderer.render(scene, camera);
    requestAnimationFrame(render);
}
