<?php

/* @var $this yii\web\View */
\backend\assets\FlotChartsAsset::register($this);
$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-user"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Всего пользователей</span>
                <span class="info-box-number"><?=$statistics['userSummary'] ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>

        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">По типам аккаунта</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-7">
                        <div class="chart-responsive">
                            <canvas id="users-chart" height="160" width="219" style="width: 219px; height: 160px;"></canvas>
                        </div>
                        <!-- ./chart-responsive -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-5">
                        <ul class="chart-legend clearfix" style="font-size:10px;">
                            <li><i class="fa fa-circle-o text-red"></i> Профессионалы</li>
                            <li><i class="fa fa-circle-o text-green"></i> Пользователи</li>
                            <li><i class="fa fa-circle-o text-yellow"></i> Администраторы</li>
                        </ul>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
            <!-- /.footer -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-purple"><i class="fa fa-newspaper-o"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Всего статей</span>
                <span class="info-box-number"><?=$statistics['articlesSummary'] ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">По категориям</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-7">
                        <div class="chart-responsive">
                            <canvas id="articles-chart" height="160" width="219" style="width: 219px; height: 160px;"></canvas>
                        </div>
                        <!-- ./chart-responsive -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-5">
                        <ul id="articles-legend" class="chart-legend clearfix" style="font-size:10px;">
                        </ul>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
            <!-- /.footer -->
        </div>
        <!-- /.info-box -->
    </div>
        <!-- /.info-box -->
    </div>
    <div class="col-md-4 col-sm-6 col-xs-12">

    </div>


</div>

<script>
    document.addEventListener('DOMContentLoaded',function(){
        var colors = ['red','green','blue','yellow','purple','orange','cyan','pink'];
        var data = [
            {
                value: <?=$statistics['professional']?>,
                color:"#F7464A",
                highlight: "#FF5A5E",
                label: "Профессионалы"
            },
            {
                value: <?=$statistics['user']?>,
                color: "#46BFBD",
                highlight: "#5AD3D1",
                label: "Пользователи"
            },
            {
                value: <?=$statistics['admin']?>,
                color: "#FDB45C",
                highlight: "#FFC870",
                label: "Администраторы"
            }
        ]
        var usersCtx = document.getElementById("users-chart").getContext("2d");
        var users = new Chart(usersCtx).Pie(data);

        var articlesData = [];
        var legendElement = document.getElementById('articles-legend');
        for(var i in articles){
            var color = colors.pop();
            articlesData.push({
                value:Object.keys(articles[i]).length,
                color:color,
                label:i
            })
            var p = document.createElement('li');
            p.innerHTML = '<i class="fa fa-circle-o text-'+color+'"></i>'+i+'';
            legendElement.appendChild(p);

        }
        var articlesCtx = document.getElementById("articles-chart").getContext("2d");
        var articlesChart = new Chart(articlesCtx).Pie(articlesData);




    })
</script>