function getImageUrl(name) {
    return new URL(`../images/${name}.svg`, import.meta.url).href;
}

window.getImageUrl = getImageUrl;