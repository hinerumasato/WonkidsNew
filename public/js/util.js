function formatLink(link) {
    const url = new URL(link);
    return url.pathname;
}

function isSameLink(link1, link2) {
    return formatLink(link1) === formatLink(link2);
}