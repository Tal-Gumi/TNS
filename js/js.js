function sendHome() {
    window.location.href="../index.php";
}

function sendRec()
{
    window.location.href="recommendations1.php";
}

function sendPersonal()
{
    window.location.href="personal.php";
}
function sendPersonalH()
{
    window.location.href="includes/personal.php";
}

function sendRecipe()
{
    window.location.href="recipes.php";
}

function send2Recipe()
{
    window.location.href="includes/recipes.php";
}
function AddToCart()
{
    alert("you need to sign in first.");
}

function sendStore() 
{
    window.location.href="includes/store.php";
}

function getRvalue()
{
    window.location.href="IngridientAPI.html";
}

function myFunction() 
{
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");

    for (i = 0; i < li.length; i++) 
    {
        a = li[i].getElementsByTagName("p")[0];
        txtValue = a.textContent || a.innerText;

        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
            li[i].style.width="25%";
        } 
        else 
        {
            li[i].style.display = "none";
        }
    }
}

function check()
{
    var temp= document.getElementById("mycheck").checked;
    if(temp)
    {
        document.getElementById("billing").style.display="none";
        document.getElementById("fname").style.display="none";
        document.getElementById("adr").style.display="none";
        document.getElementById("email").style.display="none";
        document.getElementById("city").style.display="none";
    }
    else
    {
        document.getElementById("billing").style.display="";
        document.getElementById("fname").style.display="";
        document.getElementById("adr").style.display="";
        document.getElementById("email").style.display="";
        document.getElementById("city").style.display="";
    }
}


function up(max) 
{
    document.getElementById("myNumber").value = parseInt(document.getElementById("myNumber").value) + 1;
    if (document.getElementById("myNumber").value >= parseInt(max)) 
    {
        document.getElementById("myNumber").value = max;
    }
}
function down(min) 
{
    document.getElementById("myNumber").value = parseInt(document.getElementById("myNumber").value) - 1;
    if (document.getElementById("myNumber").value <= parseInt(min)) 
    {
        document.getElementById("myNumber").value = min;
    }
}

function checkout()
{
    window.location.href="order.php";

}


function showHint(str) {
    if (str.length == 0) {
      document.getElementById("txtHint").innerHTML = "";
      return;
    } 
    else {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(str);
            if(document.getElementById("carttable") != null){
                document.getElementById("carttable").innerHTML += this.responseText;
            }            
            if(this.response==false)
            {
                alert("Out of stock");
            }
            else
            {
                location.reload();
            }

        }
      };
      xmlhttp.open("GET", "mycart.php?q=" + str, true);
      xmlhttp.send();
    }
  }



  function emptyTheCart()
  {
    window.location.href="graph1.php";
  }

  function goToGraph1()
  {
      window.location.href="graph1.php";
  
  }
  function goToGraph2()
  {
      window.location.href="graph2.php";
  
  }