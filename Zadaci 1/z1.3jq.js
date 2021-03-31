// var sviTd = document.getElementsByTagName("TD");
// for (let index = 0; index < sviTd.length; index++) {
//     sviTd[index].onmouseover = function() { 
//         var rect = this.getBoundingClientRect();
// console.log(rect.top, rect.right, rect.bottom, rect.left);
//     var jediniSpan = document.getElementsByTagName("SPAN");
//         console.log("HELLO FROM TOOLTIP " + jediniSpan[0].innerHTML);
//         jediniSpan[0].innerHTML = this.parentNode.innerHTML;
//         var tooltip = document.getElementsByClassName("tooltip")[0];
//         tooltip.getElementsByClassName("tooltiptext")[0].style.top=rect.top +"px";
//         tooltip.getElementsByClassName("tooltiptext")[0].style.left=rect.left+ 100 + "px";
//      }
    
// }
$(document).ready(function(){
    // var sviTd = $("#customers tr td");
    // for (let index = 0; index < sviTd.length; index++) {
    //     sviTd[index].onmouseover = function (){
    //         var rect = this.getBoundingClientRect();
    //         var mojStr = String(sviTd[index].parentNode.innerHTML);
    //         mojStr = mojStr.replaceAll("\<td\>","");
    //         mojStr = mojStr.replaceAll("\<\/td\>","")
    //         $('#mojSpan').text(mojStr);
    //         $('#mojSpan').css('top', rect.top + 'px');
    //         $('#mojSpan').css('left', rect.left + 100 + 'px');
    $('td').mouseover(function(){
        var mojStr = String(this.parentNode.innerHTML);
        mojStr = mojStr.replaceAll("\<td\>","");
        mojStr = mojStr.replaceAll("\<\/td\>","")
        console.log(mojStr);
        var rect = this.getBoundingClientRect();
        $('#mojSpan').text(mojStr);
        $('#mojSpan').css({'top' : rect.top + 'px', 'left' : rect.left + 100 + 'px'});
    })
  });
//   $(document).ready(function(){
//     $('td').mouseover( function() {
//         var tekst = $(this).parent().text();
        
//         $('td').attr('title', tekst)
//           .tooltip('show');
//     });
// });