<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
<title>Drag and Drop - Resizable Panel</title>

<style type="text/css">
/*margin and padding on body element
  can introduce errors in determining
  element position and are not recommended;
  we turn them off as a foundation for YUI
  CSS treatments. */
body {
	margin:0;
	padding:0;
}
</style>

<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.4.0/build/fonts/fonts-min.css?_yuiversion=2.4.1" />
<script type="text/javascript" src="http://yui.yahooapis.com/2.4.0/build/yahoo-dom-event/yahoo-dom-event.js?_yuiversion=2.4.1"></script>
<script type="text/javascript" src="http://yui.yahooapis.com/2.4.0/build/dragdrop/dragdrop.js?_yuiversion=2.4.1"></script>


<!--begin custom header content for this example-->

<style type="text/css">

    #dd-panel {
        position: relative; 
        height: 200px; 
        width: 150px;
        top: 0px; 
        left: 20px; 
        border: 1px solid #333333;
        background-color: #f7f7f7;
    }

    #dd-resize-handle {
        cursor: se-resize;
        position: absolute; 
        bottom: 0px; 
        right: 0px; 
        width: 10px; 
        height: 10px;
        background-color: blue;
        font-size: 1px;
    }

</style>


<!--end custom header content for this example-->

</head>

<body class=" yui-skin-sam">

<h1>Drag and Drop - Resizable Panel</h1>

<div class="exampleIntro">
	<p>This example demonstrates one way to implement a resizable panel using the <a href="http://developer.yahoo.com/yui/dragdrop/">Drag &amp; Drop Utility</a>. (<strong>Note</strong>: The <a href="http://developer.yahoo.com/yui/container/">Container Family</a> of UI controls contains a <a href="../container/panel-resize.html">Panel Resize Example</a> that also provides useful code for building resizable panels.)</p>

			
</div>

<!--BEGIN SOURCE CODE FOR EXAMPLE =============================== -->

<div id="dd-panel">
    <div id="dd-resize-handle"></div>
</div>

<script type="text/javascript">

YAHOO.example.DDResize = function(panelElId, handleElId, sGroup, config) {
    YAHOO.example.DDResize.superclass.constructor.apply(this, arguments);
    if (handleElId) {
        this.setHandleElId(handleElId);
    }
};

YAHOO.extend(YAHOO.example.DDResize, YAHOO.util.DragDrop, {

    onMouseDown: function(e) {
        var panel = this.getEl();
        this.startWidth = panel.offsetWidth;
        this.startHeight = panel.offsetHeight;

        this.startPos = [YAHOO.util.Event.getPageX(e),
                         YAHOO.util.Event.getPageY(e)];
    },

    onDrag: function(e) {
        var newPos = [YAHOO.util.Event.getPageX(e),
                      YAHOO.util.Event.getPageY(e)];

        var offsetX = newPos[0] - this.startPos[0];
        var offsetY = newPos[1] - this.startPos[1];

        var newWidth = Math.max(this.startWidth + offsetX, 10);
        var newHeight = Math.max(this.startHeight + offsetY, 10);

        var panel = this.getEl();
        //Same effect as setting the X Constraint to 0
        //panel.style.width = newWidth + "px";
        panel.style.height = newHeight + "px";
    }
});

(function() {
    var dd, dd2, dd3;
    YAHOO.util.Event.onDOMReady(function() {
        // put the resize handle and panel drag and drop instances into different
        // groups, because we don't want drag and drop interaction events between
        // the two of them.
        dd = new YAHOO.example.DDResize("dd-panel", "dd-resize-handle", "panelresize");
        dd2 = new YAHOO.util.DD("dd-panel", "paneldrag");

        // addInvalidHandleid will make it so a mousedown on the resize handle will 
        // not start a drag on the panel instance.  
        dd2.addInvalidHandleId("dd-resize-handle");
    });
})();
</script>

<!--END SOURCE CODE FOR EXAMPLE =============================== -->
</body>
</html>
