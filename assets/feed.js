var mf_defaults = {
    feedsUri: [{
        name: "تطوير",
        url: "http://www.mtawroon.com",
        tag: "تطوير"
    }, {
        name: "قوالب",
        url: "http://www.mtawroon.com",
        tag: "قوالب"
    }, {
        name: "فوتوشوب",
        url: "http://www.mtawroon.com",
        tag: "فوتوشوب"
    }],
    numPost: 4,
    showThumbnail: true,
    showSummary: true,
    summaryLength: 80,
    titleLength: 10,
    thumbSize: 72,
    newTabLink: false,
    containerId: "feed-list-container",
    listClass: "list-entries",
    readMore: {
        text: "More",
        endParam: "?max-results=20"
    },
    autoHeight: false,
    current: 0,
    onLoadFeed: function(a) {},
    onLoadComplete: function() {},
    loadFeed: function(c) {
        var d = document.getElementsByTagName("head")[0],
            a = document.getElementById(this.containerId),
            b = document.createElement("script");
        b.type = "text/javascript";
        b.src = this.feedsUri[c].url + "/feeds/posts/summary" + (this.feedsUri[c].tag ? "/-/" + this.feedsUri[c].tag : "") + "?alt=json-in-script&max-results=" + this.numPost + "&callback=listEntries";
        d.appendChild(b)
    }
};
for (var i in mf_defaults) {
    mf_defaults[i] = (typeof(multiFeed[i]) !== undefined && typeof(multiFeed[i]) !== "undefined") ? multiFeed[i] : mf_defaults[i]
}

function listEntries(q) {
    var p = q.feed.entry,
        c = mf_defaults,
        h = document.getElementById(c.containerId),
        a = document.createElement("div"),
        d = '<ul id="three-posts1" >',
        l = c.feedsUri.length,
        n, k, m, g;
    for (var f = 0; f < c.numPost; f++) {
        if (f == p.length) {
            break
        }
        n = (1 !== "auto") ? p[f].title.$t.substring(0, 20) + (20 < p[f].title.$t.length ? "&hellip;" : "") : p[f].title.$t;
        //n = p[f].title.$t.substring(0,20) + (20 < p[f].title.$t.length ? "&hellip;" : "") : p[f].title.$t ;
        m = ("summary" in p[f]) ? p[f].summary.$t.replace(/<br ?\/?>/g, " ").replace(/<.*?>/g, "").replace(/[<>]/g, "") : "";
        m = (c.summaryLength < m.length) ? m.substring(0, c.summaryLength) + "&hellip;" : m;
        for (var e = 0, b = p[f].link.length; e < b; e++) {
            k = (p[f].link[e].rel == "alternate") ? p[f].link[e].href : "#"
        }
        g = ("media$thumbnail" in p[f]) ? '<a href="' + k + '"><img  style="background: url(' +  p[f].media$thumbnail.url.replace(/\/s72(\-c)?\//, "/s" + c.thumbSize + "-c/")  + ')no-repeat center center; background-size: cover;" class="recent-images" width="72" height="72"></a>' : '<span class="fake-img" style="width:' + c.thumbSize + "px;height:" + c.thumbSize + 'px;"></span>';

        d += '<li><div id="recent-last">';
        d += (c.showThumbnail) ? g : "";
        d += '</div><div class="recent-last"><h3 class="recent-title"><a href="' + k + '"' + (c.newTabLink ? ' target="_blank"' : "") + ">" + n + "</a></h3></div>";
        //d += '<div class="summary">';
       // d += "<span" + (!c.showSummary ? ' style="display:none;"' : "") + ">";
      //  d += (c.showSummary) ? m : "";
       // d += "</span></div>";
        d += '<span style="display:block;clear:both;"></span></div></li>'
    }
    d += "</ul>";
    //d += '<div class="more-link"><a href="' + c.feedsUri[c.current].url.replace(/\/$/, "") + "/search/label/" + c.feedsUri[c.current].tag + c.readMore.endParam + '"' + (c.newTabLink ? ' target="_blank"' : "") + ">" + c.readMore.text + "</a></div>";
    a.className = c.listClass;
    a.innerHTML = '<div id="tag-title"><h2>' + c.feedsUri[c.current].name + "</h2> <a class='morree' href='" + c.feedsUri[c.current].url.replace(/\/$/, "") + "/search/label/" + c.feedsUri[c.current].tag + c.readMore.endParam + "'>المزيد</a></div>" + d;
    h.appendChild(a);
    c.onLoadFeed(c.current);
    if ((c.current + 1) < l) {
        c.loadFeed(c.current + 1)
    }
    if ((c.current + 1) == l) {
        c.onLoadComplete()
    }
    c.current++
}
mf_defaults.loadFeed(0);