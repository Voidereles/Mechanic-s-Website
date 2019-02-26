 $(document).ready(function () {
     $('#content').load('home.html');

     $('#menu li a').click(function () {
         var subpage = $(this).attr('href');
         $('#content').html('Ładuję...');
         $('#content').load(subpage);
         return false;
     });
   
 });

