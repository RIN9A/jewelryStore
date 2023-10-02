let months = [
    ["Январь", 31, "Водолей", 20],
    ["Февраль", 29, "Рыбы", 19],
    ["Март", 31, "Овен", 21],
    ["Апрель", 30, "Телец", 20],
    ["Май", 31, "Близнецы", 21],
    ["Июнь", 30, "Рак", 22],
    ["Июль", 31, "Лев", 23],
    ["Август", 31, "Дева", 23],
    ["Сентябрь", 30, "Весы", 23],
    ["Октябрь", 31, "Скорпион", 23],
    ["Ноябрь", 30, "Стрелец", 22],
    ["Декабрь", 31, "Козерог", 22]];
let znak_zodiac = document.forms["znak_zodiac"],
    your_month = znak_zodiac.your_month,
    your_date = znak_zodiac.your_date;
your_month.appendChild(new Option("Выберите месяц...", 0, true, true));
your_month[0].disabled = true;
your_date.appendChild(new Option("Выберите день...", 0, true, true));
your_date[0].disabled = true;
your_date.disabled = true;
for (let i = 0; i < 12; i++)
    your_month.appendChild(new Option(months[i][0], i + 1));
    your_month.onchange = month_change;
    your_date.onchange = date_change;
    function month_change() {
        your_date.disabled = false;
        your_date.options.length = 1;
        your_date[0].selected = true;
        let count = months[+your_month.value - 1][1];
        for (let i = 1; i <= count; i++)
            your_date.appendChild(new Option(i, i));
        znak_zodiac.znak.value = "";}
    function date_change() {
        let month = +your_month.value;
        let day = +your_date.value;
        znak_zodiac.znak.value = month && day > 0 && day <= months[month - 1][1]
            ? day >= months[month - 1][3]
                ? months[month - 1][2]
                : (month > 1
                        ? months[month - 2][2]
                        : months[11][2]
                )
            : "Неверная дата!"
    }
