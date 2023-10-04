var score=0;
var round=0;
var redo=0;
var int1 = Math.floor(Math.random() * 1000);
var int2 = Math.floor(Math.random() * 100);
var answer = int1 * int2;
document.getElementById('question').innerHTML = int1 + " " + "*" + " " + int2 + " ?";

function DarkMode()
{
    var element = document.body;
    element.classList.toggle("dark-mode");
    document.getElementById("nyuszi").src="./kepek/shiba.png";
}

function quiz() 
{
    if (round < 5)
    {
        var user_answer = document.getElementById('answer').value;

        if (user_answer == answer) 
        {
            score=(score)+2;
        }
        document.getElementById('score').innerHTML =score;

        document.getElementById('answer').value = "";

        int1 = Math.floor(Math.random() * 1000);
        int2 = Math.floor(Math.random() * 100);
        answer = int1 * int2;
        document.getElementById('question').innerHTML = int1 + " " + "*" + " " + int2 + "?";
        round++;

        if (round==5)
        {
             result();
        }
    }
    else
    {
        var user_answer = document.getElementById('answer').value;

        if (user_answer == answer) 
        {
            score=(score)+2;
        }
        document.getElementById('score').innerHTML =score;

        document.getElementById('answer').value = "";

        result();
    }

}

function result()
{
    if (score == 10)
    {
        Swal.fire({
            imageUrl: './kepek/bunny-happy.png',
            imageWidth: 400,
            text: 'Hibatlan! Ügyes vagy!',
            confirmButtonText: 'Újra',
            confirmButtonColor: '#c3b4df',
          });
    }
    else if (score == 8)
    {
        Swal.fire({
            imageUrl: './kepek/bunny-nice.png',
            imageWidth: 400,
            text: 'Egy hibád lett, már majdnem tökéletes!',
            confirmButtonText: 'Újra',
            confirmButtonColor: '#c3b4df',
          });
    }
    else if (score == 6)
    {
        Swal.fire({
            imageUrl: './kepek/bunny-ok.png',
            imageWidth: 400,
            text: 'Két hibád lett, legközelebb jobban sikerül!',
            confirmButtonText: 'Újra',
            confirmButtonColor: '#c3b4df',
          });
    }
    else if (score == 4)
    {
        Swal.fire({
            imageUrl: './kepek/bunny-ok.png',
            imageWidth: 400,
            text: 'Három hibád lett, megy ez jobban is!',
            confirmButtonText: 'Újra',
            confirmButtonColor: '#c3b4df',
          });
    }
    else if (score == 2)
    {
        Swal.fire({
            imageUrl: './kepek/bunny-sad.png',
            imageWidth: 400,
            text: 'Egy helyes lett, kitartás!',
            confirmButtonText: 'Újra',
            confirmButtonColor: '#c3b4df',
          });
    }
    else if (score == 0)
    {
        Swal.fire({
            imageUrl: './kepek/bunny-angry.png',
            imageWidth: 400,
            text: 'Egy sem lett jó, gyakorolj még.',
            confirmButtonText: 'Újra',
            confirmButtonColor: '#c3b4df',
          });
    }
    $.post("server.php", {result:score}, function(data) {
        console.log(score);
    })
    re();
}

function re() 
{
    round=-1;
    score=0;
    document.getElementById('answer').value=0;

    quiz();
}

function leaderboardModal() 
{
    $.post('server.php', {lb: 1}, function(data) {       
        Swal.fire({
            showCloseButton: true,
            title: 'Ranglista',
            html: `<table id="ranglista" class="flex justify-center items-center m-3">
            <tr>
                <td>Helyezés</td>
                <td>Felhasználónév</td>
                <td>Legmagasabb Pont</td>
            </tr>
            `+data+`
            </table>`,
            returnFocus: false,
            confirmButtonText: 'Bezárás',
        })
    })
}