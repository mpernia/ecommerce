//<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-97489509-6');
//</script>
//<script type="text/javascript" data-name="TokenSigning">(function() {
    // Promises
    var _eid_promises = {};
    // Turn the incoming message from extension
    // into pending Promise resolving
    window.addEventListener("message", function(event) {
    if (event.source !== window) return;
    if (event.data.src && (event.data.src === "background.js")) {
    console.log("Page received: ");
    console.log(event.data);
    // Get the promise
    if (event.data.nonce) {
    var p = _eid_promises[event.data.nonce];
    // resolve
    if (event.data.result === "ok") {
    if (event.data.signature !== undefined) {
    p.resolve({hex: event.data.signature});
} else if (event.data.version !== undefined) {
    p.resolve(event.data.extension + "/" + event.data.version);
} else if (event.data.cert !== undefined) {
    p.resolve({hex: event.data.cert});
} else {
    console.log("No idea how to handle message");
    console.log(event.data);
}
} else {
    // reject
    p.reject(new Error(event.data.result));
}
    delete _eid_promises[event.data.nonce];
} else {
    console.log("No nonce in event msg");
}
}
}, false);

    window.TokenSigning = function() {
    function nonce() {
    var val = "";
    var hex = "abcdefghijklmnopqrstuvwxyz0123456789";
    for (var i = 0; i < 16; i++) val += hex.charAt(Math.floor(Math.random() * hex.length));
    return val;
}

    function messagePromise(msg) {
    return new Promise(function(resolve, reject) {
    // amend with necessary metadata
    msg["nonce"] = nonce();
    msg["src"] = "page.js";
    // send message
    window.postMessage(msg, "*");
    // and store promise callbacks
    _eid_promises[msg.nonce] = {
    resolve: resolve,
    reject: reject
};
});
}
    this.getCertificate = function(options) {
    var msg = {type: "CERT", lang: options.lang, filter: options.filter};
    console.log("getCertificate()");
    return messagePromise(msg);
};
    this.sign = function(cert, hash, options) {
    var msg = {type: "SIGN", cert: cert.hex, hash: hash.hex, hashtype: hash.type, lang: options.lang, info: options.info};
    console.log("sign()");
    return messagePromise(msg);
};
    this.getVersion = function() {
    console.log("getVersion()");
    return messagePromise({
    type: "VERSION"
});
};
};
//})();
//</script>
