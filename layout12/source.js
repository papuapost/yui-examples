(function() {
    var Dom = YAHOO.util.Dom,
        Event = YAHOO.util.Event;


    Event.onDOMReady(function() {
        var layout = new YAHOO.widget.Layout({
            units: [
                { position: 'top', height: 50, resize: false, body: 'top1', header: 'Top', gutter: '5px', collapse: true, resize: true },
                { position: 'right', header: 'Right', width: 300, resize: true, gutter: '5px', footer: 'Footer', collapse: true, scroll: true, body: 'right1', animate: true },
                { position: 'bottom', header: 'Bottom', height: 100, resize: true, body: 'bottom1', gutter: '5px', collapse: true },
                { position: 'left', header: 'Left', width: 200, resize: true, body: 'left1', gutter: '5px', collapse: true, close: true, collapseSize: 50, scroll: true, animate: true },
                { position: 'center', body: 'center1' }
            ]
        });
        layout.render();
    });


})();
