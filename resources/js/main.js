$(function() {
    console.log('asdas')
    if($('._air-date').length){
        $('._air-date').datepicker({position: "top left"})
    }
    if($('#WorksTimeline').length){
        var d = new Date();
d.setDate(d.getDate() - 50);

    $("#WorksTimeline").Timeline({
            type: "bar",
            startDatetime: d,
            scale: "day",
            rows: lngth,
            rowHeight: 30,
            ruler: {
                truncateLowers: false,
                top: {
                    lines: ["year", "month", "day", "weekday"],
                    height: 26,
                    fontSize: 12,
                    color: "#333",
                    background: "transparent",
                    locale: "ru-RU",
                    format: {
                        timeZone: "UTC",
                        weekday: "short",
                        year: "numeric",
                        month: "long",
                        day: "numeric"
                    }
                },
            },
            sidebar: {
                sticky: true,
                overlay: true,
                list: sidebarlist
            },
        });
    }
});
