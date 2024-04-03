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
    
    function getMovies(){
        $.get('./api/get_movies.php',(movies)=>{
            $('#movie').html(movies);
        })
    }
    function getDates(){
        $.get('./api/get_dates.php',(dates)=>{
            $('#date').html(dates);
        })
    }
    function getSessions(){
        $.get('./api/get_sessions.php',(sessions)=>{
            $('#session').html(sessions);
        })
    }

</script>