function  ref(){
    document.getElementById('user-name').value = '';
    document.getElementById('month').value = '';
    document.getElementById('day').value = '';
    document.getElementById('zn').value = '';
    document.getElementById('result').innerHTML ='';}
function addit(){
    const name = document.getElementById('user-name').value;
    const zn = document.getElementById("zn").value;
    if(zn === 'Овен'){
        document.getElementById('result').innerHTML = `<a>${name}, ваш знак зодиака - ${zn}, ваши камни талисманы: Рубин, Аметист, Яшма</a>
            <br>
            <a>Это сильный знак, огненный, ему подходят такие же сильные камни.</a>
            <br>
            <a>Турмалин и яшма будут хорошо влиять на здоровье, а для смелости подойдёт рубин насыщенных красных оттенков.</a>`;}
    else if(zn === 'Телец'){
        document.getElementById('result').innerHTML = `<a>${name}, ваш знак зодиака  -  ${zn}  , ваши камни талисманы: Малахит, агат, халцедон, бирюза, амазонит, кахолонг, авантюрин, александрит</a>
             <br>
             <a>Людям этого знака зодиака лучше выбирать камни насыщенных оттенков, авантюрин лучше подойдёт именно молодым тельцам.</a>
              <br>
              <a>Статуэтки из бирюзы будут гармонично воздействовать, находясь на медных подставках.</a>`;}
    else if(zn === 'Близнецы'){
        document.getElementById('result').innerHTML =`<a>${name}, ваш знак зодиака  -  ${zn}  , ваши камни талисманы: Лунный камень, цитрин, аметист, тигровый глаз, агат.</a>
            <br>
            <a>Близнецов по жизни часто кидает из стороны в сторону, они могут резко менять свои решения и переобуваться на лету.</a>
             <br>
             <a>Агат поможет им немного успокоиться и избавиться от лишних сомнений.</a>
             <br>
             <a>А лучшим помощником, всегда дарящим радость для близнецов станет цитрин. </a>`;}
    else if(zn === 'Рак'){
        document.getElementById('result').innerHTML = `<a>${name}, ваш знак зодиака  -  ${zn}  , ваши камни талисманы: Агат, рубин, оникс, коралл, чароит, нефрит, жемчуг, лунный камень, аметист</a>
            <br>
           <a> Раки – очень эмоциональные люди, впечатлительные и порой наивные.</a>
             <br>
            <a>Жемчуг подарит гармонию, аметист подарит мудрость, а изумруд поможет построить счастливую жизнь. </a>`;}
    else if(zn === 'Лев'){
        document.getElementById('result').innerHTML = `<a>${name}, ваш знак зодиака  -  ${zn}  , ваши камни талисманы: Горный хрусталь и обсидиан, рубин, турмалин, янтарь.</a>
            <br>
            <a>Эти люди любят внимание и лоск.</a>
             <br>
             <a>Рубин будет помогать представителям публичных профессий, турмалин раскроет творческий потенциал и уберёт лишние страхи.</a>`;}
    else if(zn === 'Дева'){
        document.getElementById('result').innerHTML = `<a>${name}, ваш знак зодиака  -  ${zn}  , ваши камни талисманы: Авантюрин, жемчуг, нефрит, оникс, тигровый глаз, хризолит, яшма.</a>
            <br>
            <a>Девы склонны к порядку, но не всегда уверенны в себе, поэтому подвержены рефлексии и депрессиям.</a>
             <br>
             <a>Авантюрин поможет найти искреннюю любовь и подарит хорошее настроение, оникс восполнит жизненную энергию, а яшма поможет построить успешную карьеру.</a>`;}
    else if(zn === 'Весы'){
        document.getElementById('result').innerHTML = `<a>${name}, ваш знак зодиака  -  ${zn}  , ваши камни талисманы: Аквамарин, лазурит, опал, турмалин.</a>
            <br>
             <a>Представители знака весы – истинные эстеты.</a>
            <br>
            <a>Им бывает сложно найти внутренний баланс между своими светлыми и темными сторонами.</a>
            <br>
            <a>Турмалин поможет обрести целостность характера, аквамарин – достичь целей, а лазурит придаст настойчивости.</a>`;}
    else if(zn === 'Скорпион'){
        document.getElementById('result').innerHTML = `<a>${name}, ваш знак зодиака  -  ${zn}  , ваши камни талисманы: Аквамарин, гематит, гранат, коралл, опал, рубин, сапфир.</a>
            <br>
            <a>Это очень таинственный и яркий знак. Людям, рожденным в этот период важно обуздать свой нрав и направить таланты на благие дела, а не во вред.</a>
             <br>
             <a>Аквамарин защитит семейное счастье, гранат усилит привлекательность, а сапфир избавит от плохих воспоминаний и подарит характеру уравновешенности и спокойствия.</a>`;}
    else if(zn === 'Стрелец'){
        document.getElementById('result').innerHTML = `<a>${name}, ваш знак зодиака  -  ${zn}  , ваши камни талисманы: Бирюза, гранат, рубин, сапфир, топаз, хризолит.</a>
            <br>
            <a>Стрельцы - искатели приключений и новых ощущений.</a>
             <br>
             <a>Сапфир подарит сдержанность, топаз убережет от неприятелей, а хризолит наделит самообладанием и душевным равновесием. </a>`;}
    else if(zn === 'Козерог'){
        document.getElementById('result').innerHTML = `<a>${name}, ваш знак зодиака  -  ${zn}  , ваши камни талисманы: Агат, малахит, обсидиан, оникс, опал, рубин, альмандин.</a>
            <br>
             <a>Люди, рожденные под этим знаком, обладают расчетливостью и здравым смыслом, но им иногда не хватает вдохновения и эмоциональности.</a>
             <br>
             <a>Для них важно материальное благополучие.</a>
             <br>
             <a>Малахит укрепит здоровье и поспособствует исполнению желаний, а рубин принесет финансовое благополучие и семейное счастье, а так же предупредит об опасности.</a>`;}
    else if(zn === 'Водолей'){
        document.getElementById('result').innerHTML = `<a>${name}, ваш знак зодиака  -  ${zn}  , ваши камни талисманы: Аквамарин, аметист, бирюза, гранат, сапфир, циркон.</a>
            <br>
            <a>Эти люди любят созерцать, дорожат своей личной свободой и ставят духовное выше материального.</a>
             <br>
             <a>Аквамарин снимает стресс, бирюза приносит деньги, а гранат раскроет любовный темперамент. </a>`;}
    else if(zn === 'Рыбы'){
        document.getElementById('result').innerHTML = `<a>${name}, ваш знак зодиака  -  ${zn}  , ваши камни талисманы: Аметист, гагат, жемчуг, лунный камень, опал.</a>
            <br>
             <a>Рыбы – мечтательны, доброжелательны и бывают излишне податливы.</a>
             <br>
             <a>Аметист принесёт удачу и семейное счастье, лунный камень убережет от стресса и бессонницы, опал придаст твердость характера и подарит вдохновение.</a>`;  }
    else{
        document.getElementById('result').innerHTML = `<a> Поля не заполнены
           </a>`;}}