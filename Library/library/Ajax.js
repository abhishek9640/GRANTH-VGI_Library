function view(ct)
{
    x = new XMLHttpRequest(); // design the AJAX object.
    x.open("GET","Authors.php?n="+ct.value,true); // true for synchronized. 
    x.send(); // POST method parameter passed in send method. 
    x.onreadystatechange = function() 
    {
    
      if(x.readyState == 4)
        document.getElementById("auth").innerHTML = x.responseText; // set response text as a id value 
    }
    viewBook(ct,document.getElementById("book"))  
}
function viewBook(ct,au)
{
    ax = new XMLHttpRequest(); // design the AJAX object.
    ax.open("GET","Books.php?c="+ct.value+"&a="+au.value,true); // true for synchronized. 
    ax.send(); // POST method parameter passed in send method. 
    // alert("Books.php?c="+ct.value+"&a="+au.value);
    ax.onreadystatechange = function(){
       if(ax.readyState == 4)
         document.getElementById("book").innerHTML = ax.responseText; // set response text as a id value 
       }
}  
 