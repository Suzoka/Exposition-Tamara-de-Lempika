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
camera.position.set(3.5, 1.3, -9);
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

const raycaster = new THREE.Raycaster();

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

        case 'ArrowDown':
        case 'KeyS':
            moveBackward = false;
            break;
    }

};

document.addEventListener('keydown', onKeyDown);
document.addEventListener('keyup', onKeyUp);

//? --- Collision Elements ---

function createCube(w, l, x, z) {
    const cube = new THREE.Mesh(
        new THREE.BoxGeometry(w, 12, l),
        new THREE.MeshBasicMaterial({
            visible: true,
            color: 0x00ff00
        })
    );
    cube.position.set(x, 0, z);
    return cube;
}

const invisibleElements = [
    createCube(0.2, 15, 7, 0),
    createCube(0.2, 15, 0, 0),
    createCube(8, 0.2, 4, 6.9),
];

for (const collision of invisibleElements) {
    scene.add(collision);
}

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

        direction.z = Number(moveForward) - Number(moveBackward);
        direction.x = Number(moveRight) - Number(moveLeft);
        direction.normalize(); // this ensures consistent movements in all directions

        const cameraDirection = new THREE.Vector3();
        controls.getDirection(cameraDirection);

        let rayCasterDirection = cameraDirection.clone();

        if (moveBackward) { rayCasterDirection.negate(); }

        raycaster.set(camera.position, rayCasterDirection);
        const intersections = raycaster.intersectObjects(invisibleElements);

        if (intersections.length > 0 && intersections[0].distance < 1) {
            const collisionNormal = new THREE.Vector3();
            collisionNormal.copy(intersections[0].face.normal);
        
            const relativeVelocity = new THREE.Vector3();
            relativeVelocity.copy(velocity).normalize();
        
            if (collisionNormal.dot(relativeVelocity) < 0) {
                velocity.x = 0;
                velocity.z = 0;
            }
        } else {

            velocity.z -= velocity.z * 10.0 * delta;


            if (moveForward || moveBackward) velocity.z -= direction.z * 30.0 * delta;

            controls.moveForward(- velocity.z * delta);
        }

    }

    prevTime = time;

    renderer.render(scene, camera);
    requestAnimationFrame(render);
}
