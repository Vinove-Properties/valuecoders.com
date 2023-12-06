<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>IE6 Hack to enable tooltips on select elements</title>
<script>
    function showIE6Tooltip(e){
        if(!e){var e = window.event;}
        var obj = e.srcElement;
        var objHeight = obj.offsetHeight;
        var optionCount = obj.options.length;
        var eX = e.offsetX;
        var eY = e.offsetY;

        //vertical position within select will roughly give the moused over option...
        var hoverOptionIndex = Math.floor(eY / (objHeight / optionCount));

        var tooltip = document.getElementById('ie6SelectTooltip');
        tooltip.innerHTML = obj.options[hoverOptionIndex].title;
        tooltip.style.display = 'block';
    }
    function hideIE6Tooltip(e){
        var tooltip = document.getElementById('ie6SelectTooltip');
        tooltip.innerHTML = '';
        tooltip.style.display = 'none';
    }
</script>
</head>
<body>
    <select id="test" onmousemove="showIE6Tooltip();" onmouseout="hideIE6Tooltip();">
        <option value="1" title="This is the number 1 option, with a really long title based tooltip">One Thing</option>
        <option value="2" title="This is the number 2 option, with a really long title based tooltip">Two Thing</option>
        <option value="3" title="This is the number 3 option, with a really long title based tooltip">Three Thing</option>
        <option value="4" title="This is the number 4 option, with a really long title based tooltip">Four Thing</option>
        <option value="5" title="This is the number 5 option, with a really long title based tooltip">Five Thing</option>
        <option value="6" title="This is the number 6 option, with a really long title based tooltip">Six Thing</option>
        <option value="7" title="This is the number 7 option, with a really long title based tooltip">Seven Thing</option>
        <option value="8" title="This is the number 8 option, with a really long title based tooltip">Eight Thing</option>
    </select>
    <div id="ie6SelectTooltip" style="display:none;position:absolute;padding:1px;border:1px solid #333333;;background-color:#fffedf;font-size:smaller;"></div>
</body>
</html>