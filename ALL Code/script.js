const autoScrollInterval = 3000; 

function nextSlide() {
    let lists = document.querySelectorAll('.item');
    document.getElementById('slide').appendChild(lists[0]);
}

function prevSlide() {
    let lists = document.querySelectorAll('.item');
    document.getElementById('slide').prepend(lists[lists.length - 1]);
}

document.getElementById('next').onclick = function () {
    nextSlide();
};

document.getElementById('prev').onclick = function () {
    prevSlide();
};

function startAutoScroll() {
    return setInterval(function () {
        nextSlide();
    }, autoScrollInterval);
}


let autoScrollIntervalId;


window.onload = function () {
    autoScrollIntervalId = startAutoScroll();
};


document.querySelector('.container').addEventListener('mouseenter', function () {
    clearInterval(autoScrollIntervalId);
});

document.querySelector('.container').addEventListener('mouseleave', function () {
    autoScrollIntervalId = startAutoScroll();
});

function scrollTo(element, duration) {
    const targetPosition = element.offsetTop;
    const startPosition = window.scrollY;
    const distance = targetPosition - startPosition;
    let startTime;

    function animation(currentTime) {
        if (startTime === undefined) startTime = currentTime;
        const timeElapsed = currentTime - startTime;
        const run = easeInOutQuad(timeElapsed, startPosition, distance, duration);
        window.scrollTo(0, run);
        if (timeElapsed < duration) requestAnimationFrame(animation);
    }

    function easeInOutQuad(t, b, c, d) {
        t /= d / 2;
        if (t < 1) return (c / 2) * t * t + b;
        t--;
        return (-c / 2) * (t * (t - 2) - 1) + b;
    }

    requestAnimationFrame(animation);
}

document.querySelectorAll('.item button').forEach(function (button) {
    button.addEventListener('click', function () {
        scrollTo(document.querySelector('.container'), 1000);
    });
});
