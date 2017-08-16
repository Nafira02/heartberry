<script language="javascript" type="text/javascript" src="http://localhost:8080/heartberry/Api/jquery.min.js"></script>

<script type="text/javascript">

      var xmlhttp = new XMLHttpRequest();
    

     var i=0,menit=0;
     var rate=0;
     var id_elderly=0;
     var n=
     
      window.setInterval(function(){
        
        $.getJSON('http://192.168.220.53/', function(data) {
        // $.getJSON('http://localhost:8080/heartberry/api/heart.php', function(data) {
               
               id_elderly =data.id_elderly;

               rate += parseInt(data.rate);
               // rate += 5;
               console.log("rate",data.rate);
            });    
            
          // document.write(nilai);             
           // n = getData();
                 // nilai +=2;
                 // data = "id=10&rate=88";
                 // xmlhttp.open("POST","insert.php",true);
                 // xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                 // xmlhttp.send(data);
          if((i%600)==0){
            // menit+=1;
            if(!i==0)
              {
                   data = "id="+id_elderly+"&rate="+(rate/6)
                   // xmlhttp.open("POST","insert.php",true);
                   // xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                   // xmlhttp.send(data);
                   // 1000 = 60
                   // 100 =6

                   console.log(i,"Menit, Nilai selama 1 menit adalah = ", rate," dengan rata-rata ",rate/6);
                   console.log(data);
                   // rate=0;
              }
          }else{
            console.log(i," nilai ", rate ," id_elderly ",id_elderly);
          }
        i+=1;

      },100);
 
    
</script>
