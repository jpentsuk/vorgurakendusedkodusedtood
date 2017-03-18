/**
 * Created by jpent on 15.03.2017.
 */
window.onload = function()
{
var kuulid = document.getElementsByClassName("bead");

for ( var i = 0; i<kuulid.length; i++)
{
    kuulid[i].onclick = function () {
        muudasuunda(this);
    }
}

function muudasuunda(ykskuul) {
    if(window.getComputedStyle(ykskuul).getPropertyValue("float")== "right")
    {
        ykskuul.style.float = "left";
    }
    else
    {
        ykskuul.style.float = "right";
    }
}

};
