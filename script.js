const CONFIG = {
    zGap: window.innerWidth < 768 ? 1000 : 1500,
    camSpeed: window.innerWidth < 768 ? 3.5 : 4.5,
    starCount: 150
};

const state = { scroll: 0, velocity: 0, targetSpeed: 0, mouseX: 0, mouseY: 0 };
const world = document.getElementById('world');
const items = [];
const loopSize = PROFILE_DATA.length * CONFIG.zGap;

function init() {
    const isMobile = window.innerWidth < 768;
    PROFILE_DATA.forEach((data, i) => {
        const el = document.createElement('div');
        el.className = 'item';
        if (data.type === 'big') {
            const txt = document.createElement('div');
            txt.className = 'big-text';
            txt.innerText = data.text;
            el.appendChild(txt);
            items.push({ el, type: 'text', x: 0, y: 0, rot: 0, baseZ: -i * CONFIG.zGap });
        } else {
            const card = document.createElement('div');
            card.className = 'card';
            card.innerHTML = `<h2>${data.title}</h2><p>${data.body}</p>`;
            el.appendChild(card);
            const xRange = isMobile ? 50 : 450;
            const yRange = isMobile ? 50 : 350;
            items.push({ el, type: 'card', x: (Math.random() - 0.5) * xRange, y: (Math.random() - 0.5) * yRange, rot: (Math.random() - 0.5) * 8, baseZ: -i * CONFIG.zGap });
        }
        world.appendChild(el);
    });

    for (let i = 0; i < CONFIG.starCount; i++) {
        const el = document.createElement('div');
        el.className = 'star';
        world.appendChild(el);
        items.push({ el, type: 'star', x: (Math.random() - 0.5) * 4000, y: (Math.random() - 0.5) * 4000, baseZ: -Math.random() * loopSize });
    }

    window.addEventListener('mousemove', (e) => {
        state.mouseX = (e.clientX / window.innerWidth - 0.5) * 2;
        state.mouseY = (e.clientY / window.innerHeight - 0.5) * 2;
    });
}

const lenis = new Lenis({
    lerp: 0.1,
    smoothWheel: true,
    syncTouch: true
});

lenis.on('scroll', ({ scroll, velocity }) => {
    state.scroll = scroll;
    state.targetSpeed = velocity;
});

function raf(time) {
    lenis.raf(time);
    state.velocity += (state.targetSpeed - state.velocity) * 0.1;
    world.style.transform = `rotateX(${state.mouseY * 4}deg) rotateY(${state.mouseX * 4}deg)`;

    const cameraZ = state.scroll * CONFIG.camSpeed;

    items.forEach((item, index) => {
        let relZ = item.baseZ + cameraZ;
        let vizZ = ((relZ % loopSize) + loopSize) % loopSize;
        if (vizZ > 1000) vizZ -= loopSize;

        let alpha = 1;
        if (index === 0 && item.type === 'text') {
            alpha = 1 - (vizZ / 900); 
        } else {
            if (vizZ < -3500) alpha = 0;
            else if (vizZ < -1500) alpha = (vizZ + 3500) / 2000;
            if (vizZ > 400 && item.type !== 'star') alpha = 1 - ((vizZ - 400) / 600);
        }

        item.el.style.opacity = Math.max(0, alpha);

        if (vizZ > -600 && vizZ < 600 && alpha > 0.7) {
            item.el.style.pointerEvents = 'auto';
            item.el.style.zIndex = '500';
        } else {
            item.el.style.pointerEvents = 'none';
            item.el.style.zIndex = '1';
        }

        if (alpha > 0) {
            let trans = `translate3d(${item.x}px, ${item.y}px, ${vizZ}px)`;
            if (item.type === 'star') {
                const s = Math.max(1, Math.min(1 + Math.abs(state.velocity) * 0.4, 25));
                trans += ` scale3d(1, 1, ${s})`;
            } else {
                trans += ` rotateZ(${item.rot}deg)`;
            }
            item.el.style.transform = trans;
        }
    });
    requestAnimationFrame(raf);
}

init();
requestAnimationFrame(raf);
