if ("serviceWorker" in navigator) {
    window.addEventListener("load", function() {
        navigator.serviceWorker
        .register("/serviceWorker.js")
        .then(res => console.log("Service worker registered"))
        .catch(err => console.log("Servce worker not registered", err))
    })
}