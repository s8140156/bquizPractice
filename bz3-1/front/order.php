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
        <button>確定</button>
        <button>重置</button>
    </div>
</div>
<script>
    getMovies();

    $('#movie').on('change',function(){ //此function是用在當選取片單後 日期也需要重新讀取載入(依選的片單的時間)
        // let id=$('#movie').val() //原本重複宣告id(如果宣告在外面(全域變數))會造成程式重複造成執行問題,但放在回呼函式中各自使用(限定範圍內)則不會打架
        // getDates(id);
           getDates($('#movie').val())
    })
    
    function getMovies(){
        $.get('./api/get_movies.php',(movies)=>{
            $('#movie').html(movies);
            let id=$('#movie').val() //取option裡面的value值(前端方式)(原本是後端寫value帶id去前端)
            getDates(id);
        })
    }
    function getDates(id){
        $.get('./api/get_dates.php',{id},(dates)=>{
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