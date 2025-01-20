import "./bootstrap";

import Alpine from "alpinejs";

import $ from "jquery";
import "select2";
import "select2/dist/css/select2.css";

$(document).ready(function () {
    $("#userSelect").select2({
        placeholder: "Pilih User",
        allowClear: true,
    });
});

window.Alpine = Alpine;

Alpine.start();
