function setLocaleLink() {
    const flags = document.querySelectorAll(".flag-img");
    const localeLinks = document.querySelectorAll(".locale-link");
    
    flags.forEach((flag, index) => {
        const locale = flag.getAttribute("locale");
        localeLinks[index].setAttribute("href", `/?lang=${locale}`);
    })
}

setLocaleLink();
