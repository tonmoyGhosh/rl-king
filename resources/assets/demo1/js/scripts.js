const glob = require("glob");

// Keenthemes' plugins
var componentJs = glob.sync(`resources/assets/core/js/components/*.js`) || [];
var coreLayoutJs = glob.sync(`resources/assets/core/js/layout/*.js`) || [];

// Layout base js
var layoutJs = glob.sync(`resources/assets/demo1/js/layout/*.js`) || [];

// Custom Charts
var chartJs = glob.sync("resources/assets/demo1/js/custom/*.js") || [];

module.exports = [
    ...componentJs,
    ...coreLayoutJs,
    ...layoutJs,
    ...chartJs,

    // Extended
    "resources/assets/extended/button-ajax.js",
];