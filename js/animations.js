function getDocHeight() {
    let D = document;
    return Math.max(
        D.body.scrollHeight, D.documentElement.scrollHeight,
        D.body.offsetHeight, D.documentElement.offsetHeight,
        D.body.clientHeight, D.documentElement.clientHeight
    )
}

function amountscrolled() {
    let winheight = window.innerHeight || (document.documentElement || document.body).clientHeight
    let docheight = getDocHeight()
    let scrollTop = window.pageYOffset || (document.documentElement || document.body.parentNode || document.body).scrollTop
    let trackLength = docheight - winheight
    let pctScrolled = Math.floor(scrollTop / trackLength * 100) // gets percentage scrolled (ie: 80 or NaN if tracklength == 0)

    return pctScrolled;
}

window.addEventListener("scroll", function () {
    let contenuAnimation = document.querySelectorAll(".custom-animation");
    let amountScrl = amountscrolled();

    if (amountScrl >= 40) {
        contenuAnimation.forEach(function(item) {
            item.classList.add("custom-animation-control");
        });
    }

}, false)