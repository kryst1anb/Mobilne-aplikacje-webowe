function xd()
{
    alert("XDD");
}

function page1next()
{
    
    if(document.getElementById('name').value!="" && document.getElementById('surname').value!="" && document.getElementById('age').value!="" && document.getElementById('country').value!="")
    {
        document.getElementById('page1').style.display="none";
        document.getElementById('page2').style.display="inline";
    }
    else
    {
        alert("Proszę poprawnie uzupełnić wszystkie pola!");
    }

}

function page2next()
{
    if(document.getElementById('wzor1').checked==true || document.getElementById('wzor2').checked==true || document.getElementById('wzor3').checked==true || document.getElementById('wzor4').checked==true || document.getElementById('wzor5').checked==true || document.getElementById('wzor6').checked==true)
    {
        document.getElementById('page2').style.display="none";
        document.getElementById('page3').style.display="inline";
    }
    else
    {
        alert("Proszę zaznaczyć wzór!");
    }
}

function page2back()
{
    document.getElementById('page1').style.display="inline";
    document.getElementById('page2').style.display="none";

}

function page3next()
{
    if(document.getElementById('owoc1').checked==true || document.getElementById('owoc2').checked==true || document.getElementById('owoc3').checked==true || document.getElementById('owoc4').checked==true || document.getElementById('owoc5').checked==true || document.getElementById('owoc6').checked==true || document.getElementById('owoc7').checked==true || document.getElementById('owoc8').checked==true || document.getElementById('owoc9').checked==true || document.getElementById('owoc10').checked==true)
    {
        document.getElementById('page3').style.display="none";
        document.getElementById('page4').style.display="inline";
    }
    else
    {
        alert("Proszę zaznaczyć minimum jeden owoc!");
    }
    

}

function page3back()
{
    document.getElementById('page2').style.display="inline";
    document.getElementById('page3').style.display="none";

}

function page4next()
{
    document.getElementById('page4').style.display="none";
    document.getElementById('page5').style.display="inline";

}

function page4back()
{
    document.getElementById('page3').style.display="inline";
    document.getElementById('page4').style.display="none";

}

function page5back()
{
    document.getElementById('page4').style.display="inline";
    document.getElementById('page5').style.display="none";

}

function save()
{
    

}