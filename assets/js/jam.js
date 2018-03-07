    function startTime()
    {   var today=new Date();
        var weekday=new Array(7);
        var weekday=["Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu"];
        var monthname=new Array(12);
        var monthname=["Januari","Februari","Maret","April","May","Juni","Juli","Agustus","September","October","November","December"];
        var dayname=weekday[today.getDay()];
        var day=today.getDate();
        var month=monthname[today.getMonth()]; 
        var year=today.getFullYear();
        var h=today.getHours();
        var m=today.getMinutes();
        var s=today.getSeconds();
        h=checkTime(h);
        m=checkTime(m);
        s=checkTime(s);
        document.getElementById('clocktime').innerHTML=dayname+", "+day+"-"+month+"-"+year+", "+h+":"+m+":"+s+" WIB";
        document.getElementById('tanggal').innerHTML=dayname+", "+day+"-"+month+"-"+year;
        t=setTimeout(function(){startTime()},500);
    }
    // function checkTime to add a zero in front of numbers < 10
    function checkTime(i)
    {   if(i<10){i="0"+i;}
        return i;
    }
