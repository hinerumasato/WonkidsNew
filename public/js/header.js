function setLocaleLink() {
    const flags = document.querySelectorAll(".flag-img");
    const localeLinks = document.querySelectorAll(".locale-link");
    
    flags.forEach((flag, index) => {
        const locale = flag.getAttribute("locale");
        const oldHref = localeLinks[index].getAttribute("href");
        localeLinks[index].setAttribute("href", `${oldHref}/${locale}`);
    })
}

function setHeaderClass() {
    const header = document.querySelector("header");
    const route = window.location.href.split('?')[0];
    if(route.lastIndexOf("/") === route.length - 1 ) {
        header.classList.add("home_header");
        header.classList.remove("other_header");
    } 
    else {
        header.classList.add("other_header");
        header.classList.remove("home_header");
    } 
}

setHeaderClass();
// setLocaleLink();
