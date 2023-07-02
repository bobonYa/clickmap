<script src="https://cdnjs.cloudflare.com/ajax/libs/heatmap.js/2.0.0/heatmap.min.js"></script>

<div id="heatmap"></div>
<iframe src="{{ $url }}" style="width:100%;height:100vh;" id="frame" type="text/html"></iframe>

<script>
    document.getElementById('frame').addEventListener('load', function(e) {
        let frame = document.getElementById("frame");
        let coords = frame.getBoundingClientRect();
        var heatmapInstance = h337.create({
            container: document.getElementById("heatmap"),
            radius: 30
        });

        @foreach($clicks as $click)
            heatmapInstance.addData({
                x: parseInt(coords.width / 100 * {{ $click->x }}),
                y: parseInt(coords.height / 100 * {{ $click->y}}),
                value: {{ $click->total * 20 }}
            });
        @endforeach
        up();
    });

    function up() {
        let frame = document.getElementById("frame");
        let coords = frame.getBoundingClientRect();

        let hm = document.getElementById("heatmap");
        hm.style.position = 'absolute';
        hm.style.left = coords.x + 'px';
        hm.style.top = '107px';
        hm.style.width = coords.width + 'px';
        hm.style.height = coords.height + 'px';
    }
    up();
</script>