const staticAvanzamos = "dev-avanzamos-site-v1"
const assests = [
    "/",
    "/index.php",
    "/style.css",
    "/"
]

self.addEventListener("install", installEvent => {
    installEvent.waitUntil (
        caches.open(staticAvanzamos).then(cache => {
            cache.addAll(assests)
        })
    )
})

self.addEventListener("fetch", fetchEvent => {
    fetchEvent.respondWith(
        caches.match(fetchEvent.request).then(res => {
            return res || fetch(fetchEvent.request)
        })
    )
})