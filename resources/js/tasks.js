$(function () {
    console.log(itrs);
    if ($("#tasks").length) {
        $(".itr-select").select2({
            data: itrs,
            placeholder: "Выберете ИТР",
        });

        $(".workman-select").select2({
            data: workmans,
            placeholder: "Выберете рабочего",
        });
        for (let i = 0; i < tasks.length; i++){
            console.log(tasks[i]['role'])
            if(tasks[i]['role']=="itr"){
                $('.itr-select[data-day="'+tasks[i]['date']+'"]').val(tasks[i]['user_id']).trigger("change");

            }

            if(tasks[i]['role']=="workman"){
                var flag = true;
                $('.workman-select[data-day="'+tasks[i]['date']+'"]').each(function(){
                    if($(this).val().length==0 && flag){
                        $(this).val(tasks[i]['user_id']).trigger("change");
                        flag=false;
                        return;
                    }
                })
            }
        }
        $(".duplicate-next").click(function () {
            var columnIndex = $(this).closest(".task-collumn").index();
            var columnCount = $(".task-collumn").length;

            for (var i = columnIndex; i < columnCount; i++) {
                $("#tasks")
                    .find("tbody tr")
                    .each(function () {
                        var val = $(this)
                            .find("td")
                            .eq(columnIndex)
                            .find("select")
                            .val();
                        $(this)
                            .find("td")
                            .eq(i)
                            .find("select")
                            .val(val)
                            .trigger("change");
                    });
            }
        });
        $("#tasks-save").click(function () {
            var json = [];
            var work_id = $("#tasks").data("workid");
            $("#tasks-save").css('display','none')
            $("#tasks")
                .find("select")
                .each(function () {
                    if ($(this).val().length) {
                        json.push({
                            user_id: $(this).val(),
                            date: $(this).data("day"),
                        });
                    }
                });
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            });
            $.ajax({
                url: $("#tasks-save").data("url"),
                method: "POST",
                dataType: "json",
                data: {
                    work_id: work_id,
                    data: json,
                    start: $("#tasks-save").data("start"),
                    finish: $("#tasks-save").data("finish"),
                },
                success: function (data) {
                    console.log("ОТВЕТ success", data);
                    $("#tasks-save").css('display','initial')
                    alert('Задачи успешно сохраненны')
                },
                error: function (data) {
                    $("#tasks-save").css('display','initial')
                    console.log("ОТВЕТ error", data);
                },
            });
        });

        // $("#myTimeline").Timeline({
        //     type: "bar",
        //     startDatetime: moment().subtract(2, 'months').format('YYYY-MM-DD 00:00'),
        //     scale: "day",
        //     rows: lngth,
        //     rowHeight: 30,
        //     ruler: {
        //         truncateLowers: false,
        //         top: {
        //             lines: ["year", "month", "day", "weekday"],
        //             height: 26,
        //             fontSize: 12,
        //             color: "#333",
        //             background: "transparent",
        //             locale: "ru-RU",
        //             format: {
        //                 timeZone: "UTC",
        //                 weekday: "short",
        //                 year: "numeric",
        //                 month: "long",
        //                 day: "numeric"
        //             }
        //         },
        //     },
        //     sidebar: {
        //         sticky: true,
        //         overlay: true,
        //         list: sidebarlist
        //     },
        // });
    }
});
