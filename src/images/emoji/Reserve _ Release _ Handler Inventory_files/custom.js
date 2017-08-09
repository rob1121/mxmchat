function loadInventoryData(aa) {
    // param = JSON.stringify($("#bread-crumb").data("info"));
    // $("#table-inv").dataTable({
    //     bDestroy: !0,
    //     scrollX: !0,
    //     aaSorting: [
    //         [17, "desc"]
    //     ],
    //     fnInitComplete: function(a) {
    //         for (var e = 0, t = a.aoData.length; t > e; e++) "PRODN" == a.aoData[e]._aData[12] && (a.aoData[e].nTr.className = "good"), "UMAINT" == a.aoData[e]._aData[12] && (a.aoData[e].nTr.className = "bad"), "NO PRODUCT" == a.aoData[e]._aData[12] && (a.aoData[e].nTr.className = "gray"), "ENGG" == a.aoData[e]._aData[12] && (a.aoData[e].nTr.className = "blue"), "SETUP" == a.aoData[e]._aData[12] && (a.aoData[e].nTr.className = "pink"), "IDLE" == a.aoData[e]._aData[12] && (a.aoData[e].nTr.className = "yellow"), "INSPECTION" == a.aoData[e]._aData[12] && (a.aoData[e].nTr.className = "light_blue"), "PMCAL" == a.aoData[e]._aData[12] && (a.aoData[e].nTr.className = "orange"), "SHUTDOWN" == a.aoData[e]._aData[12] && (a.aoData[e].nTr.className = "silver")
    //     },
    //     fnRowCallback: function(a, e) {
    //         return $(a).attr("onClick", 'showHandlerInfoModal("' + e + '")'), a
    //     },
    //     asStripeClasses: [""],
    //     columns: [{
    //             width: "2%"
    //         },
    //         null, {
    //             width: "2%"
    //         },
    //         null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null
    //     ],
    //     sServerMethod: "POST",
    //     sAjaxSource: "handler_inventory/ajax/inv"
    // })
    
   $.ajax({
        url: "handler_inventory/ajax/inv",
        type: "GET",
        async: !0,
        cache: !1,
        // data: {
        //     info: a
        // },
        success: function(a) {
            // console.log(a);
            // loadInventory(a);
            path = window.location.pathname;
            path = path.split('/');
            if(path.length == 3){
                // yourGlobalVariable = $.parseJSON(a).data;
                loadInventory(a);   
            }

        },
        error: function(a) {
            alert(a.responseText);
        }

    })
}


function loadInventory(a){
    data = $.parseJSON(a);
    $("#table-inv").dataTable({
        aaData: data.dt,
        bDestroy: !0,
        scrollX: !0,
        aaSorting: [
            [17, "desc"]
        ],
        fnInitComplete: function(a) {
            for (var e = 0, t = a.aoData.length; t > e; e++) "PRODN" == a.aoData[e]._aData[12] && (a.aoData[e].nTr.className = "good"), "UMAINT" == a.aoData[e]._aData[12] && (a.aoData[e].nTr.className = "bad"), "NO PRODUCT" == a.aoData[e]._aData[12] && (a.aoData[e].nTr.className = "gray"), "ENGG" == a.aoData[e]._aData[12] && (a.aoData[e].nTr.className = "blue"), "SETUP" == a.aoData[e]._aData[12] && (a.aoData[e].nTr.className = "pink"), "IDLE" == a.aoData[e]._aData[12] && (a.aoData[e].nTr.className = "yellow"), "INSPECTION" == a.aoData[e]._aData[12] && (a.aoData[e].nTr.className = "light_blue"), "PMCAL" == a.aoData[e]._aData[12] && (a.aoData[e].nTr.className = "orange"), "SHUTDOWN" == a.aoData[e]._aData[12] && (a.aoData[e].nTr.className = "silver")
        },
        fnRowCallback: function(a, e) {
            return $(a).attr("onClick", 'showHandlerInfoModal("' + e + '")'), a
        },
        asStripeClasses: [""],
        columns: [{
                width: "2%"
            },
            null, {
                width: "2%"
            },
            null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null
        ],
    })

    // loadSiteLocChart(data.cloc,''), loadStatusCodeChart(data.cstatus,''), loadSiteaChart(data.csitea,''), loadTemperatureChart(data.ctemp,''), loadWFCChart(data.cwfc,''), loadPTBChart(data.cptb,'')

    loadStatusCodeChart(data.cstatus,''),loadSiteaChart(data.csitea,''),loadTemperatureChart(data.ctemp,''),loadPTBChart(data.cptb,''),loadWFCChart(data.cwfc,''),loadSiteLocChart(data.cloc,'')
}

function loadInventoryFilteredByCHart(a){
    data = $.parseJSON(a);
    $("#table-inv").dataTable({
        aaData: data.dt,
        bDestroy: !0,
        scrollX: !0,
        aaSorting: [
            [17, "desc"]
        ],
        fnInitComplete: function(a) {
            for (var e = 0, t = a.aoData.length; t > e; e++) "PRODN" == a.aoData[e]._aData[12] && (a.aoData[e].nTr.className = "good"), "UMAINT" == a.aoData[e]._aData[12] && (a.aoData[e].nTr.className = "bad"), "NO PRODUCT" == a.aoData[e]._aData[12] && (a.aoData[e].nTr.className = "gray"), "ENGG" == a.aoData[e]._aData[12] && (a.aoData[e].nTr.className = "blue"), "SETUP" == a.aoData[e]._aData[12] && (a.aoData[e].nTr.className = "pink"), "IDLE" == a.aoData[e]._aData[12] && (a.aoData[e].nTr.className = "yellow"), "INSPECTION" == a.aoData[e]._aData[12] && (a.aoData[e].nTr.className = "light_blue"), "PMCAL" == a.aoData[e]._aData[12] && (a.aoData[e].nTr.className = "orange"), "SHUTDOWN" == a.aoData[e]._aData[12] && (a.aoData[e].nTr.className = "silver")
        },
        fnRowCallback: function(a, e) {
            return $(a).attr("onClick", 'showHandlerInfoModal("' + e + '")'), a
        },
        asStripeClasses: [""],
        columns: [{
                width: "2%"
            },
            null, {
                width: "2%"
            },
            null, null, null, null, null, null, null, null, null,    null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null
        ],
    })
    var stats = (data.cstatus!="") ? loadStatusCodeChart(data.cstatus,'') : null;
    var sitea = (data.csitea!="") ? loadSiteaChart(data.csitea,'') : null;
    var temp = (data.ctemp!="") ? loadTemperatureChart(data.ctemp,'') : null;
    var ptb = (data.cptb!="") ? loadPTBChart(data.cptb,'') : null;
    var wfc = (data.cwfc!="") ? loadWFCChart(data.cwfc,'') : null;
    var loc = (data.cloc!="") ? loadSiteLocChart(data.cloc,'') : null;
}

function loadInventoryFilteredByForm(a){
    data = $.parseJSON(a);
    $("#table-inv").dataTable({
        aaData: data.dt,
        bDestroy: !0,
        scrollX: !0,
        aaSorting: [
            [17, "desc"]
        ],
        fnInitComplete: function(a) {
            for (var e = 0, t = a.aoData.length; t > e; e++) "PRODN" == a.aoData[e]._aData[12] && (a.aoData[e].nTr.className = "good"), "UMAINT" == a.aoData[e]._aData[12] && (a.aoData[e].nTr.className = "bad"), "NO PRODUCT" == a.aoData[e]._aData[12] && (a.aoData[e].nTr.className = "gray"), "ENGG" == a.aoData[e]._aData[12] && (a.aoData[e].nTr.className = "blue"), "SETUP" == a.aoData[e]._aData[12] && (a.aoData[e].nTr.className = "pink"), "IDLE" == a.aoData[e]._aData[12] && (a.aoData[e].nTr.className = "yellow"), "INSPECTION" == a.aoData[e]._aData[12] && (a.aoData[e].nTr.className = "light_blue"), "PMCAL" == a.aoData[e]._aData[12] && (a.aoData[e].nTr.className = "orange"), "SHUTDOWN" == a.aoData[e]._aData[12] && (a.aoData[e].nTr.className = "silver")
        },
        fnRowCallback: function(a, e) {
            return $(a).attr("onClick", 'showHandlerInfoModal("' + e + '")'), a
        },
        asStripeClasses: [""],
        columns: [{
                width: "2%"
            },
            null, {
                width: "2%"
            },
            null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null
        ],
    })

    // loadSiteLocChart(data.cloc,''), loadStatusCodeChart(data.cstatus,''), loadSiteaChart(data.csitea,''), loadTemperatureChart(data.ctemp,''), loadWFCChart(data.cwfc,''), loadPTBChart(data.cptb,'')

    loadStatusCodeChart(data.cstatus,''),loadSiteaChart(data.csitea,''),loadTemperatureChart(data.ctemp,''),loadPTBChart(data.cptb,''),loadWFCChart(data.cwfc,''),loadSiteLocChart(data.cloc,'')
}



function loadReserve() {
    $("#table-res").dataTable({
        bDestroy: !0,
        bProcessing: !0,
        scrollX: !0,
        aoColumnDefs: [{
            bSortable: !1,
            aTargets: [0, 1, 2, 3, 4, 5, 6, 7]
        }],
        fnRowCallback: function(a, e) {
            var t = [e[2], e[4], e[5], e[6], e[7]];
            return $("td:eq(1)", a).attr("onClick", 'showReserveReleaseInfoModal("' + t + '")'), $("td:eq(2)", a).attr("onClick", 'showReserveReleaseInfoModal("' + t + '")'), $("td:eq(3)", a).attr("onClick", 'showReserveReleaseInfoModal("' + t + '")'), $("td:eq(4)", a).attr("onClick", 'showReserveReleaseInfoModal("' + t + '")'), $("td:eq(5)", a).attr("onClick", 'showReserveReleaseInfoModal("' + t + '")'), $("td:eq(6)", a).attr("onClick", 'showReserveReleaseInfoModal("' + t + '")'), $("td:eq(7)", a).attr("onClick", 'showReserveReleaseInfoModal("' + t + '")'), $("td:eq(8)", a).attr("onClick", 'showReserveReleaseInfoModal("' + t + '")'), a
        },
        asStripeClasses: [""],
        sAjaxSource: "../handler_inventory/ajax/res"
    })
}

function loadReserveLog() {
    $("#table-res-log").dataTable({
        bDestroy: !0,
        bProcessing: !0,
        asStripeClasses: [""],
        sAjaxSource: "../handler_inventory/ajax/res_log"
    })
}

function loadReleaseLog() {
    $("#table-rel-log").dataTable({
        bDestroy: !0,
        bProcessing: !0,
        asStripeClasses: [""],
        sAjaxSource: "../handler_inventory/ajax/rel_log"
    })
}

function check_chckbox() {
    chck1 = !0, chck2 = !1, $(".res_chk").each(function() {
        return chck1 = 0 == this.checked ? !1 : !0, 1 != this.checked ? (chck2 = !1, !1) : void(chck2 = !0)
    }), 0 == chck1 && $("#chk_res_all").prop("checked", !1), 1 == chck2 && $("#chk_res_all").prop("checked", !0)
}

function add_reserve() {
    var a = $("#test").serializeArray();
    console.log(a)
}

function closeCB() {
    parent.jQuery.fn.colorbox.close()
}

function submitInvChartFilter() {
    var a = $("#bread-crumb").data("info");
    $.ajax({
        url: "handler_inventory/ajax/chart_filter_inv",
        type: "POST",
        async: !0,
        cache: !1,
        data: {
            info: a
        },
        success: function(a) {
            chartFilterInv(a)
        },
        error: function(a) {
            alert(a.responseText)
        }
    })
}

function submitInvFilter() {
    $("#table-inv").dataTable().fnClearTable();
    var a = $("#filter_inventory").serialize();
    $("#bread-crumb").data("info"), $(".test").remove(), $("#chart-con div").remove(), $.ajax({
        url: "handler_inventory/ajax/filter_inv",
        type: "POST",
        async: !0,
        cache: !1,
        data: a,
        success: function(a) {
            // filterInv(a), obj = $.parseJSON(a), cobj = obj.aaData.length, "none" == obj.aaData.result ? ($(".message_error_text").text("No result found!!!"), $(".message_error").show(), setTimeout(function() {
            //     $(".message_error").fadeOut()
            // }, 5e3)) : ($(".message_info_text").text(1 == cobj ? cobj + " ROW FOUND!!!" : cobj + " ROWS FOUND!!!"), $(".message_info").show(), setTimeout(function() {
            //     $(".message_info").fadeOut()
            // }, 5e3))
            loadInventoryFilteredByForm(a);
        },
        error: function(a) {
            alert(a.responseText)
        }
    })
}

function chartFilterInv(a) {
    obj = $.parseJSON(a).aaData, $("#table-inv").dataTable({
        bDestroy: !0,
        bProcessing: !0,
        aaData: obj,
        scrollX: !0,
        aaSorting: [
            [17, "desc"]
        ],
        fnInitComplete: function(a) {
            for (var e = 0, t = a.aoData.length; t > e; e++) "PRODN" == a.aoData[e]._aData[12] && (a.aoData[e].nTr.className = "good"), "UMAINT" == a.aoData[e]._aData[12] && (a.aoData[e].nTr.className = "bad"), "NO PRODUCT" == a.aoData[e]._aData[12] && (a.aoData[e].nTr.className = "gray"), "ENGG" == a.aoData[e]._aData[12] && (a.aoData[e].nTr.className = "blue"), "SETUP" == a.aoData[e]._aData[12] && (a.aoData[e].nTr.className = "pink"), "IDLE" == a.aoData[e]._aData[12] && (a.aoData[e].nTr.className = "yellow"), "INSPECTION" == a.aoData[e]._aData[12] && (a.aoData[e].nTr.className = "light_blue"), "PMCAL" == a.aoData[e]._aData[12] && (a.aoData[e].nTr.className = "orange"), "SHUTDOWN" == a.aoData[e]._aData[12] && (a.aoData[e].nTr.className = "silver")
        },
        fnRowCallback: function(a, e) {
            return $(a).attr("onClick", 'showHandlerInfoModal("' + e + '")'), a
        },
        asStripeClasses: [""]
    })
}

function filterInv(a) {
    obj = $.parseJSON(a).aaData, $("#table-inv").dataTable({
        bDestroy: !0,
        bProcessing: !0,
        aaData: obj,
        scrollX: !0,
        fnInitComplete: function(a) {
            for (var e = 0, t = a.aoData.length; t > e; e++) "PRODN" == a.aoData[e]._aData[12] && (a.aoData[e].nTr.className = "good"), "UMAINT" == a.aoData[e]._aData[12] && (a.aoData[e].nTr.className = "bad"), "NO PRODUCT" == a.aoData[e]._aData[12] && (a.aoData[e].nTr.className = "gray"), "ENGG" == a.aoData[e]._aData[12] && (a.aoData[e].nTr.className = "blue"), "SETUP" == a.aoData[e]._aData[12] && (a.aoData[e].nTr.className = "pink"), "IDLE" == a.aoData[e]._aData[12] && (a.aoData[e].nTr.className = "yellow"), "INSPECTION" == a.aoData[e]._aData[12] && (a.aoData[e].nTr.className = "light_blue"), "PMCAL" == a.aoData[e]._aData[12] && (a.aoData[e].nTr.className = "orange"), "SHUTDOWN" == a.aoData[e]._aData[12] && (a.aoData[e].nTr.className = "silver")
        },
        fnRowCallback: function(a, e) {
            return $(a).attr("onClick", 'showHandlerInfoModal("' + e + '")'), a
        },
        asStripeClasses: [""]
    })
}

function submitReserve() {
    var a = $("#reserve_form").serializeArray();
    a.push({
        name: "handler_id",
        value: $("#hi").text()
    }), $.ajax({
        url: "handler_inventory/reserve/add",
        type: "POST",
        async: !0,
        cache: !1,
        data: a,
        success: function() {
            loadReserve(), window.location.href = "handler_inventory/reserve"
        }
    })
}

function reserveInfoModal(a) {
    console.log(a)
}

function showHandlerInfoModal(a) {
    var e = a.split(",");
    showHandlerValue("hi", e[0]), showHandlerValue("model", e[1]), showHandlerValue("package", e[2]), showHandlerValue("ewb", e[3]), showHandlerValue("pmstatus", e[4]), showHandlerValue("pmsched", e[5]), showHandlerValue("pmcycle", e[6]), showHandlerValue("pmcommit", e[7]), showHandlerValue("calsched", e[8]), showHandlerValue("calcycle", e[9]), showHandlerValue("calcommit", e[10]), showHandlerValue("testerid", e[11]), showHandlerValue("statuscode", e[12]), showHandlerValue("statusreason", e[13]), showHandlerValue("lotnum", e[14]), showHandlerValue("device", e[15]), showHandlerValue("dietype", e[16]), showHandlerValue("transdate", e[17]), showHandlerValue("buildloc", e[18]), showHandlerValue("packshared", e[19]), showHandlerValue("sitea", e[20]), showHandlerValue("siteaperc", e[21]), showHandlerValue("siteb", e[22]), showHandlerValue("temp", e[23]), showHandlerValue("ptb", e[24]), showHandlerValue("currstatus", e[26]), showHandlerValue("dateup", e[27]), showHandlerValue("status", e[28]), "Reserved" == e[28] ? $("#res-btn").hide() : $("#res-btn").show(), $.colorbox({
        width: "70%",
        height: "90%",
        inline: !0,
        href: "#res-info"
    })
}

function handlerUpdate() {
    $("#edit-btn").removeClass("pure-button-primary"), $("#edit-btn").addClass("blue"), $("#edit-btn").text("SAVE"), $("#exit-btn").show(), $(".pure-g h3").each(function() {
        var a = $(this).attr("class");
        $(this).children("a").hide(), $(this).children("input").remove(), $(this).children("select").remove(), $(this).hasClass("select") ? (arr = a.split(" "), $(this).append("<select style='width:90%'/>"), console.log(arr[1])) : $(this).append("<input style='width:90%'/>"), $(this).children("input").val($(this).children("a").text())
    })
}

function exitHandlerUpdate() {
    $("#edit-btn").removeClass("blue"), $("#edit-btn").addClass("pure-button-primary"), $("#edit-btn").text("Edit"), $("#exit-btn").hide(), $(".pure-g h3").each(function() {
        $(this).children("input").hide(), $(this).children("a").show()
    })
}

function emptyVal() {
    return "-------"
}

function showHandlerValue(a, e) {
    "Edit" == $("#edit-btn").text(), $("#" + a + " a").remove(), $("#" + a + " input").remove(), $("#" + a).append("<a style='text-decoration:none;cursor:pointer'>"), $("#" + a).append("<input style='display:none;width:90%'/>"), $("#" + a + " a").text(e)
}

function update_text(a) {
    $(a).hide(), $(a).parent().children("a").text("" != $(a).val() ? $(a).val() : ""), $(a).parent().children("a").show()
}

function edit_mode(a) {
    $(a).hide(), $(a).text() != emptyVal() && $(a).parent().children("input").val($(a).text()), $(a).parent().children("input").show(), $(a).parent().children("input").focus()
}

function showReserveReleaseInfoModal(a) {
    var e = a.split(",");
    console.log(e), $("#hi").text(e[0]), $("#sd").text(e[1]), $("#ed").text(e[2]), $("#r").text(e[3]), $("#rd").text(e[4]), $.colorbox({
        width: "60%",
        height: "30%",
        inline: !0,
        href: "#reserve-info"
    })
}

function chart_filter(a, e, t, o) {
    var n = [];
    oobj = $.parseJSON(o), jsongStrings = JSON.stringify(oobj); {
        var r = $("#bread-crumb");
        $("#" + oobj.field)
    }
    if (r.data("info")) srrr = r.data("info"), srrr.push(oobj), r.data("info", srrr);
    else {
        var n = [];
        n.push(oobj), r.data("info", n)
    }
    arrr = r.data("info"), arrr = JSON.stringify(arrr), $("#bread-crumb").append('<a href="#" id=' + oobj.field + ' class="test"> '), $("#bread-crumb #" + oobj.field).attr("onClick", "testtest('" + jsongStrings + "', '" + arrr + "')"), $("#bread-crumb #" + e).text(" > " + oobj.name + " = " + oobj.value), $("#" + oobj.table_id).remove(), a = a.replace("/", "||"), "" == a && (a = "empty"), $("#chart-con div").remove(), $("#table-inv").dataTable().fnClearTable(),filterInvByChart(r.data("info"),charts(),o);
}

function filterInvByChart(b,c,d){
    info = {
        'bc' : b,
        'c' : c,
        'd' : $.parseJSON(d)
    }

    $.ajax({
        url: "handler_inventory/ajax/chart_filter_inv",
        type: "POST",
        async: !0,
        cache: !1,
        data: info,
        success: function(a) {
            // console.log(a);
            loadInventoryFilteredByCHart(a);
        },
        error: function(a) {
            alert(a.responseText)
        }

    })
}

function testtest(a, e) {
    arrr = $("#bread-crumb").data("info"), objj = $.parseJSON(e), objjj = $.parseJSON(a), cnt = 0, $("#bread-crumb").data("info", objj), $("#bread-crumb .test").each(function() {
        if (id = $(this).attr("id"), cnt < objj.length);
        else {
            var a = document.getElementById(id);
            a.parentNode.removeChild(a)
        }
        cnt++
    });
    var t = $("#bread-crumb");
    $("#chart-con div").remove(), $("#table-inv").dataTable().fnClearTable(),filterInvByChart($("#bread-crumb").data("info"),charts(),'');
    // $("#chart-con div").remove(), $("#table-inv").dataTable().fnClearTable(), filterCharts(t.data("info")), submitInvChartFilter()
}

function loadAllChart() {
    arr = [], $("#bread-crumb").data("info", ""), $(".test").remove(), $("#chart-con div").remove(),loadInventoryData(0)
}
    
    
function chart_filter_res(a, e) {
    a = a.replace("/", "||"), "" == a && (a = "empty");
    $("#table-res").dataTable({
        bDestroy: !0,
        bProcessing: !0,
        scrollX: !0,
        aaSorting: [
            [0, "asc"]
        ],
        fnRowCallback: function(a, e) {
            var t = [e[2], e[4], e[5], e[6], e[7]];
            return $("td:eq(1)", a).attr("onClick", 'showReserveReleaseInfoModal("' + t + '")'), $("td:eq(2)", a).attr("onClick", 'showReserveReleaseInfoModal("' + t + '")'), $("td:eq(3)", a).attr("onClick", 'showReserveReleaseInfoModal("' + t + '")'), $("td:eq(4)", a).attr("onClick", 'showReserveReleaseInfoModal("' + t + '")'), $("td:eq(5)", a).attr("onClick", 'showReserveReleaseInfoModal("' + t + '")'), $("td:eq(6)", a).attr("onClick", 'showReserveReleaseInfoModal("' + t + '")'), $("td:eq(7)", a).attr("onClick", 'showReserveReleaseInfoModal("' + t + '")'), $("td:eq(8)", a).attr("onClick", 'showReserveReleaseInfoModal("' + t + '")'), a
        },
        asStripeClasses: [""],
        sAjaxSource: "../handler_inventory/chart_filter_res/" + a + "/" + e
    })
}

function refreshHandler() {
    // $("#bread-crumb").data("info", []), $(".test").remove(), $("#chart-con div").remove(), $("#table-inv").dataTable().fnClearTable(), loadInventory(), loadAllCharts()
    loadInventoryData(0);
}

function sortJSON() {
    $.getJSON("handler_inventory/json-test.json", function(a) {
        console.log(a)
    })
}

function showReserveModal() {
    $("#res_hi").text($("#hi").text()), $.colorbox({
        width: "50%",
        height: "45%",
        inline: !0,
        open: !0,
        href: "#reserve-modal"
    })
}

function backHandlerInfo() {
    $.colorbox({
        width: "70%",
        height: "90%",
        inline: !0,
        open: !0,
        href: "#res-info"
    })
}

function releaseHandler() {
    var a = $("#test").serializeArray();
    a.shift(), console.log(a), $.ajax({
        url: "reserve/release",
        type: "POST",
        async: !0,
        cache: !1,
        data: {
            info: a
        },
        success: function() {
            $("#chk_res_all").prop("checked", !1), loadReserve(), loadReserveLog(), loadReleaseLog()
        }
    })
}
$(document).bind({
    ajaxStart: function() {
        $.blockUI({
            css: {
                border: "none",
                padding: "15px",
                backgroundColor: "#000",
                "-webkit-border-radius": "10px",
                "-moz-border-radius": "10px",
                opacity: .5,
                color: "#fff"
            }
        }), closeCB()
    },
    ajaxStop: function() {
        $.unblockUI()
    }
}), $(document).ready(function() {
    var yourGlobalVariable;
    $(".site-name a").text("HANDLER INVENTORY");
    // loadInventory(), loadReserve(), loadReserveLog(), loadReleaseLog()
    loadInventoryData(0), loadReserve(), loadReserveLog(), loadReleaseLog()
}), $(".paginate_button").live("click", function() {
    check_chckbox()
}), $("#test-link").colorbox({
    width: "50%",
    height: "45%",
    inline: !0,
    href: "#test-content"
}), $("#chk_res_all").change(function() {
    $(".res_chk").each(this.checked ? function() {
        this.checked = !0
    } : function() {
        this.checked = !1
    })
}), $(".datepicker").datepicker({}).on("changeDate", function() {}).on("hide", function(a) {
    a.preventDefault(), a.stopPropagation()
});

// window.onbeforeunload = function () { console.log("oh noes"); }