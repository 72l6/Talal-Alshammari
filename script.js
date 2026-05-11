const CONFIG = {
    zGap: window.innerWidth < 768 ? 1000 : 1500,
    camSpeed: window.innerWidth < 768 ? 3.5 : 4.5,
    starCount: 150
};

const state = { scroll: 0, velocity: 0, targetSpeed: 0, mouseX: 0, mouseY: 0 };
const world = document.getElementById('world');
const items = [];
const loopSize = PROFILE_DATA.length * CONFIG.zGap;