require("./bootstrap");

import Alpine from "alpinejs";
import intersect from "@alpinejs/intersect";
import focus from "@alpinejs/focus";
import collapse from "@alpinejs/collapse";
import persist from "@alpinejs/persist";

window.rangy = require("./rangy-core");
window.classapplier = require('./rangy-classapplier');
window.highlighter = require('./rangy-highlighter');

window.Alpine = Alpine
Alpine.plugin(intersect)
Alpine.plugin(focus)
Alpine.plugin(collapse)
Alpine.plugin(persist)
Alpine.start()

// A function is used for dragging and moving
function dragElement(element, direction)
{
    var   md; // remember mouse down info
    const first  = document.getElementById("document-viewer");
    const second = document.getElementById("transcript");

    element.onmousedown = onMouseDown;

    function onMouseDown(e)
    {
        //console.log("mouse down: " + e.clientX);
        md = {e,
            offsetLeft:  element.offsetLeft,
            offsetTop:   element.offsetTop,
            firstWidth:  first.offsetWidth,
            secondWidth: second.offsetWidth
        };

        document.onmousemove = onMouseMove;
        document.onmouseup = () => {
            //console.log("mouse up");
            document.onmousemove = document.onmouseup = null;
        }
    }

    function onMouseMove(e)
    {
        //console.log("mouse move: " + e.clientX);
        var delta = {x: e.clientX - md.e.clientX,
            y: e.clientY - md.e.clientY};

        if (direction === "H" ) // Horizontal
        {
            // Prevent negative-sized elements
            delta.x = Math.min(Math.max(delta.x, -md.firstWidth),
                md.secondWidth);

            element.style.left = md.offsetLeft + delta.x + "px";
            first.style.width = (md.firstWidth + delta.x) + "px";
            second.style.width = (md.secondWidth - delta.x) + "px";
        }
    }
}

if(document.getElementById("document-viewer")){
    dragElement( document.getElementById("separator"), "H" );
}
