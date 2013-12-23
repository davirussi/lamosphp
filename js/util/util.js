	function showhide(a)
	{
		if(a==1)
		{
		    document.getElementById("mainform").style.display="none";
		    document.getElementById("mainform2").style.display="none";
		}
		else
		{
		    document.getElementById("mainform").style.display="";
		    document.getElementById("mainform2").style.display="";
		}	
	}
	
    var x=0;

    function rotate(num){
    fs=document.ff.slide;
    x=num%fs.length;
    if(x<0) x=fs.length-1;
    document.images.show.src=fs.options[x].value;
    fs.selectedIndex=x;}

    function auto() {
    if(document.ff.fa.value == "Stop"){
    rotate(++x);setTimeout("auto()", 3000);}}
