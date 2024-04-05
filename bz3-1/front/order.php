<div id="select">
    <h3 class="ct">線上訂票</h3>
    <div class="order">
        <div>
            <label>電影：</label>
            <select name="movie" id="movie"></select>
        </div>
        <div>
            <label>日期：</label>
            <select name="date" id="date"></select>
        </div>
        <div>
            <label>場次：</label>
            <select name="session" id="session"></select>
        </div>
        <div>
            <button onclick="$('#select').hide();$('#booking').show()">確定</button>
            <button>重置</button>
        </div>
    </div>
</div>
<style>
    #room{
        background-image: url('./icon/03D04.png');
        background-position: center;
        background-repeat: no-repeat;
        width: 540px;
        height: 370px;
        margin: auto;
    }
</style>
<div id="booking" style="display:none">
    <div id="room"></div>
    <div id="info">
        <button onclick="$('#select').show();$('#booking').hide()">上一步</button>
        <!--使用前端方式讓畫面其實都在同一頁(不用換頁也不需去資料庫拿資料) 可以符合題意保留點選後的選單的選項-->
        <button conlick="">訂購</button>
    </div>
</div>
<script>
    let url=new URL(window.location.href)
    //使用js內建取得url的query string(從f12 network->payload)的方法
    // console.log(url.searchParams.get('id')) //透過js內建url解析 可以拿到網址內的id參數 如果是經由“線上訂票連結” 會得到id是null
    // console.log(url.searchParams.has('id')) // 使用has會得到true/false
    // 以上是透過純前端方式拿到id資料 不是使用ajax方式喔~~
    getMovies();

    $('#movie').on('change',function(){ //此function是用在當選取片單後 日期也需要重新讀取載入(依選的片單的時間)
        // let id=$('#movie').val() //原本重複宣告id(如果宣告在外面(全域變數))會造成程式重複造成執行問題,但放在回呼函式中各自使用(限定範圍內)則不會打架
        // getDates(id);
           getDates($('#movie').val())
    })
    $('#date').on('change',function(){ //當取得日期後 場次也需要重新讀取載入
           getSessions($('#movie').val(),$('#date').val())
    })
    
    function getMovies(){
        $.get('./api/get_movies.php',(movies)=>{
            $('#movie').html(movies);
            if(url.searchParams.has('id')){ //會是當畫面拿到movie list就執行取得網址內的id字串解析
                $(`#movie option[value='${url.searchParams.get('id')}']`).prop('selected',true)
                // 透過js內建 取得option裡面的value的id(之前後端帶給他的) 並使用prop()將該id(因為是該id所以true) selected
            }
            let id=$('#movie').val() //取option裡面的value值(前端方式)(原本是後端寫value帶id去前端)
            getDates(id);
        })
    }
    function getDates(id){
        $.get('./api/get_dates.php',{id},(dates)=>{
            // console.log(dates) //老師在這邊除錯 也須api那邊要echo出來資料 這樣f12 console才看得到
            $('#date').html(dates);
            let movie=$('#movie').val()
            let date=$('#date').val()
            getSessions(movie,date)

        })
    }
    function getSessions(movie,date){
        $.get('./api/get_sessions.php',{movie,date},(sessions)=>{
            $('#session').html(sessions);
        })
    }

</script>