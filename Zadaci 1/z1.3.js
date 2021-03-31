var sviTd = document.getElementsByTagName("TD");
for (let index = 0; index < sviTd.length; index++) {
    sviTd[index].onmouseover = function() { 
        var rect = this.getBoundingClientRect();
console.log(rect.top, rect.right, rect.bottom, rect.left);
    var jediniSpan = document.getElementsByTagName("SPAN");
        console.log("HELLO FROM TOOLTIP " + jediniSpan[0].innerHTML);
        jediniSpan[0].innerHTML = this.parentNode.innerHTML;
        var tooltip = document.getElementsByClassName("tooltip")[0];
        tooltip.getElementsByClassName("tooltiptext")[0].style.top=rect.top +"px";
        tooltip.getElementsByClassName("tooltiptext")[0].style.left=rect.left+ 100 + "px";
     }
    
}