    $(document).ready(function(){
        var sviTd = $("#customers tr td");
        for (let index = 0; index < sviTd.length; index++) {
            sviTd[index].onclick = function (){
                var mojStr = String(sviTd[index].parentNode.innerHTML);
                mojStr = mojStr.replaceAll("\<td\>","");
                mojStr = mojStr.replaceAll("\<\/td\>","")
                $('#noviDiv').text(mojStr);
            }
        }
      });