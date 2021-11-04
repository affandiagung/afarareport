

var keyword = document.getElementById('keyword'); //mengambil didalamn document kdengan id keyword
var tombolCari = document.getElementById('tombol-cari'); //mengambil didalam document dengan id tombol-cari

var container = document.getElementById('isinya');


function GetURLParameter(sParam)
{
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++) 
    {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam) 
        {
            return sParameterName[1];
        }
    }
}

var modul = GetURLParameter('halaman');


keyword.addEventListener('keyup',function(){
	
	//buat object ajax

	var xhr = new XMLHttpRequest();

	//ceck kesiapan ajax
	xhr.onreadystatechange =  function(){
		if ( xhr.readyState == 4 && xhr.status == 200 ){
			container.innerHTML = xhr.responseText;
		}
	}

	//eksekusi ajax
	xhr.open('GET','ajax/mahasiswa.php?keyword=' + keyword.value ,true); // method, sumber dan Async atau sync
	xhr.send();
});