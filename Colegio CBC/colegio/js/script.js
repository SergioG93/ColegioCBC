// Pages

function verificar(car)
{
for (var i=0; i<document.form1.radiobutton.length;i++)
{

    if (document.form1.radiobutton[i].checked)
{

var msn = document.form1.radiobutton[i].value ;
document.location=msn;
break;
}
}

}

// End of Pages
