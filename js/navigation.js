
$(document).ready(function(){

    // nagivation bar and drop down menu start here  
   
  
      $("#opennav").click(function () { 
        $("#sidebar").toggle(500);   
        $(".sectors").hide();   
       
      });
  
     $("#hospitality").click(function (e) { 
       e.preventDefault();
       $("#hospitality-sector").toggle(500);
       $("#travel-sector").hide(500);
       $("#lifestyle-sector").hide(500);
       $("#healthcare-sector").hide(500);
       $("#fashion-sector").hide(500);
       $("#automotive-sector").hide(500);
       $("#pharma-sector").hide(500);
       $("#banking-sector").hide(500);
       $("#real_estate-sector").hide(500);
       $("#it_computer-sector").hide(500);
       $("#education-sector").hide(500);
       $("#other-sector").hide(500);
     });
  
     $("#travel").click(function (e) { 
      e.preventDefault();
      $("#hospitality-sector").hide(500);
      $("#travel-sector").toggle(500);
      $("#lifestyle-sector").hide(500);
      $("#healthcare-sector").hide(500);
      $("#fashion-sector").hide(500);
      $("#automotive-sector").hide(500);
      $("#pharma-sector").hide(500);
      $("#banking-sector").hide(500);
      $("#real_estate-sector").hide(500);
      $("#it_computer-sector").hide(500);
      $("#education-sector").hide(500);
      $("#other-sector").hide(500);
    });
  
    $("#lifestyle").click(function (e) { 
      e.preventDefault();
      $("#hospitality-sector").hide(500);
      $("#travel-sector").hide(500);
      $("#lifestyle-sector").toggle(500);
      $("#healthcare-sector").hide(500);
      $("#fashion-sector").hide(500);
      $("#automotive-sector").hide(500);
      $("#pharma-sector").hide(500);
      $("#banking-sector").hide(500);
      $("#real_estate-sector").hide(500);
      $("#it_computer-sector").hide(500);
      $("#education-sector").hide(500);
      $("#other-sector").hide(500);
    });
  
    $("#healthcare").click(function (e) { 
      e.preventDefault();
      $("#hospitality-sector").hide(500);
      $("#travel-sector").hide(500);
      $("#lifestyle-sector").hide(500);
      $("#healthcare-sector").toggle(500);
      $("#fashion-sector").hide(500);
      $("#automotive-sector").hide(500);
      $("#pharma-sector").hide(500);
      $("#banking-sector").hide(500);
      $("#real_estate-sector").hide(500);
      $("#it_computer-sector").hide(500);
      $("#education-sector").hide(500);
      $("#other-sector").hide(500);
    });
  
    $("#fashion").click(function (e) { 
      e.preventDefault();
      $("#hospitality-sector").hide(500);
      $("#travel-sector").hide(500);
      $("#lifestyle-sector").hide(500);
      $("#healthcare-sector").hide(500);
      $("#fashion-sector").toggle(500);
      $("#automotive-sector").hide(500);
      $("#pharma-sector").hide(500);
      $("#banking-sector").hide(500);
      $("#real_estate-sector").hide(500);
      $("#it_computer-sector").hide(500);
      $("#education-sector").hide(500);
      $("#other-sector").hide(500);
    });
  
    $("#automotive").click(function (e) { 
      e.preventDefault();
      $("#hospitality-sector").hide(500);
      $("#travel-sector").hide(500);
      $("#lifestyle-sector").hide(500);
      $("#healthcare-sector").hide(500);
      $("#fashion-sector").hide(500);
      $("#automotive-sector").toggle(500);
      $("#pharma-sector").hide(500);
      $("#banking-sector").hide(500);
      $("#real_estate-sector").hide(500);
      $("#it_computer-sector").hide(500);
      $("#education-sector").hide(500);
      $("#other-sector").hide(500);
    });
  
    $("#pharma").click(function (e) { 
      e.preventDefault();
      $("#hospitality-sector").hide(500);
      $("#travel-sector").hide(500);
      $("#lifestyle-sector").hide(500);
      $("#healthcare-sector").hide(500);
      $("#fashion-sector").hide(500);
      $("#automotive-sector").hide(500);
      $("#pharma-sector").toggle(500);
      $("#banking-sector").hide(500);
      $("#real_estate-sector").hide(500);
      $("#it_computer-sector").hide(500);
      $("#education-sector").hide(500);
      $("#other-sector").hide(500);
    });
  
    $("#banking").click(function (e) { 
      e.preventDefault();
      $("#hospitality-sector").hide(500);
      $("#travel-sector").hide(500);
      $("#lifestyle-sector").hide(500);
      $("#healthcare-sector").hide(500);
      $("#fashion-sector").hide(500);
      $("#automotive-sector").hide(500);
      $("#pharma-sector").hide(500);
      $("#banking-sector").toggle(500);
      $("#real_estate-sector").hide(500);
      $("#it_computer-sector").hide(500);
      $("#education-sector").hide(500);
      $("#other-sector").hide(500);
    });
  
    $("#real_estate").click(function (e) { 
      e.preventDefault();
      $("#hospitality-sector").hide(500);
      $("#travel-sector").hide(500);
      $("#lifestyle-sector").hide(500);
      $("#healthcare-sector").hide(500);
      $("#fashion-sector").hide(500);
      $("#automotive-sector").hide(500);
      $("#pharma-sector").hide(500);
      $("#banking-sector").hide(500);
      $("#real_estate-sector").toggle(500);
      $("#it_computer-sector").hide(500);
      $("#education-sector").hide(500);
      $("#other-sector").hide(500);
    });
  
    $("#it_computer").click(function (e) { 
      e.preventDefault();
      $("#hospitality-sector").hide(500);
      $("#travel-sector").hide(500);
      $("#lifestyle-sector").hide(500);
      $("#healthcare-sector").hide(500);
      $("#fashion-sector").hide(500);
      $("#automotive-sector").hide(500);
      $("#pharma-sector").hide(500);
      $("#banking-sector").hide(500);
      $("#real_estate-sector").hide(500);
      $("#it_computer-sector").toggle(500);
      $("#education-sector").hide(500);
      $("#other-sector").hide(500);
    });
  
    $("#education").click(function (e) { 
      e.preventDefault();
      $("#hospitality-sector").hide(500);
      $("#travel-sector").hide(500);
      $("#lifestyle-sector").hide(500);
      $("#healthcare-sector").hide(500);
      $("#fashion-sector").hide(500);
      $("#automotive-sector").hide(500);
      $("#pharma-sector").hide(500);
      $("#banking-sector").hide(500);
      $("#real_estate-sector").hide(500);
      $("#it_computer-sector").hide(500);
      $("#education-sector").toggle(500);
      $("#other-sector").hide(500);
    });
  
    $("#other").click(function (e) { 
      e.preventDefault();
      $("#hospitality-sector").hide(500);
      $("#travel-sector").hide(500);
      $("#lifestyle-sector").hide(500);
      $("#healthcare-sector").hide(500);
      $("#fashion-sector").hide(500);
      $("#automotive-sector").hide(500);
      $("#pharma-sector").hide(500);
      $("#banking-sector").hide(500);
      $("#real_estate-sector").hide(500);
      $("#it_computer-sector").hide(500);
      $("#education-sector").hide(500);
      $("#other-sector").toggle(500);
    });
  
    // dropdown menu and navigation bar ends here 
     
  
  
      
    });