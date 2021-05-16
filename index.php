<?php


$astroid = $_GET['astroid'];

if(!$astroid){
   $astroid = 1; 
    
    
}
$date = date('Y-m-d', time());
$url = "https://api.jisuapi.com/astro/fortune?astroid={$astroid}&date={$date}&appkey=81274db07541a3fd";

$dataStr = get_bankcard_info($url);


$dataArr = json_decode($dataStr, true);




$dataStr = translate($dataStr);


$dataArr['result']['year']['summary'] = translate($dataArr['result']['year']['summary']);

sleep(1);
$dataArr['result']['year']['money'] = translate($dataArr['result']['year']['money']);
sleep(1);
$dataArr['result']['year']['career'] = translate($dataArr['result']['year']['love']);
sleep(1);
$dataArr['result']['year']['love'] = translate($dataArr['result']['year']['health']);
sleep(1);




$dataArr['result']['week']['money'] = translate($dataArr['result']['week']['money']);
sleep(1);
$dataArr['result']['week']['career'] = translate($dataArr['result']['week']['career']);
sleep(1);
$dataArr['result']['week']['love'] = translate($dataArr['result']['week']['health']);
sleep(1);
$dataArr['result']['week']['health'] = translate($dataArr['result']['weekweek']['health']);
sleep(1);
$dataArr['result']['week']['job'] = translate($dataArr['result']['week']['job']);
sleep(1);


$dataArr['result']['today']['presummary'] = translate($dataArr['result']['today']['presummary']);
sleep(1);
$dataArr['result']['today']['star'] = translate($dataArr['result']['today']['star']);
sleep(1);
$dataArr['result']['today']['color'] = translate($dataArr['result']['today']['color']);
sleep(1);


$dataArr['result']['tomorrow']['presummary'] = translate($dataArr['result']['tomorrow']['presummary']);
sleep(1);
$dataArr['result']['tomorrow']['star'] = translate($dataArr['result']['tomorrow']['star']);
sleep(1);
$dataArr['result']['tomorrow']['color'] = translate($dataArr['result']['tomorrow']['color']);

sleep(1);




$dataArr['result']['month']['summary'] = translate($dataArr['result']['month']['summary']);
sleep(1);
$dataArr['result']['month']['money'] = translate($dataArr['result']['month']['money']);
sleep(1);
$dataArr['result']['month']['career'] = translate($dataArr['result']['month']['love']);
sleep(1);
$dataArr['result']['month']['love'] = translate($dataArr['result']['month']['health']);
sleep(1);
$dataArr['result']['month']['health'] = translate($dataArr['result']['month']['health']);
sleep(1);









function translate($content)
{

    $url = 'http://api.fanyi.baidu.com/api/trans/vip/translate?';
    $q = urldecode($content);
    $from = 'zh';
    $to = 'en';
    $appid =  '20210509000819467';
    $salt = 1;
    $signStr = $appid . $content . $salt . 'ujElyzj0upVM_ncRsIuO';
    $sign = md5($signStr);
    $Query = "q={$q}&from={$from}&to={$to}&salt={$salt}&sign={$sign}&appid={$appid}";
    $baiduurl = $url . $Query;


    $dataStr = get_bankcard_info($baiduurl);

    $data = json_decode($dataStr, true);


    return $data['trans_result'][0]['dst'];
}

function get_bankcard_info($url)
{


    $ch = curl_init();

    //设置选项，包括URL
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //绕过ssl验证
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

    //执行并获取HTML文档内容
    $output = curl_exec($ch);

    //释放curl句柄
    curl_close($ch);
    return $output;
}

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Layui</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="layui/css/layui.css" media="all">


    <!-- 注意：如果你直接复制所有代码到本地，上述css路径需要改成你本地的 -->
</head>



<style>
    .logo h1 {
        background-image: url(logo.png);
        background-repeat: no-repeat;
        text-indent: -9999px;
        width: 558px;
        height: 89px;
        margin-top: 10px;
        margin-left: 20px;
        display: block;
    }
</style>

<body style="height: 1000px; margin: 0">
    
    

    <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
    <!--[if lt IE 9]>
  <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
  <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

    <div style="margin: 0 auto; max-width: 1140px;">
        <div class="layui-row">
            <div class="layui-col-xs12 layui-col-md12" style="background-color: #1e9fff;">
                <div class="grid-demo grid-demo-bg1">
                    <div class="layui-bg-gray" style="padding: 30px;">
                        <div class="layui-row layui-col-space15">
                            <div class="layui-col-md12">
                                <div class="layui-card">
                                    <div class="layui-card-header">Constellation test</div>
                                    <div class="layui-card-body">
                                       
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <div class="layui-col-xs6 layui-col-md12">
                <div class="grid-demo grid-demo-bg2">
                    <form class="layui-form" action="">

   <div class="layui-form-item">
    <label class="layui-form-label">Constellation type</label>
    <div class="layui-input-block">
      <select name="astroid" lay-filter="aihao">
        <option value="1">Aries</option>
        <option value="2">Taurus</option>
        <option value="3">Gemini</option>
        <option value="4">Cacer</option>
        <option value="5">Leo</option>
        <option value="6">Virgo</option>
        <option value="7">Libra</option>
        <option value="8">Scorpio</option>
        <option value="9">Sagittarius</option>
        <option value="10">Capricom</option>
        <option value="11">Aquarius</option>
        <option value="12">Pisces</option>
      </select>
    </div>
  </div>

           
           
                        <div class="layui-form-item">
                            <div class="layui-input-block">
                                <button type="submit" class="layui-btn" lay-submit="" lay-filter="demo1">select</button>

                            </div>
                        </div>
                    </form>
                </div>


                <div class="layui-col-xs6 layui-col-md12" style="height: 100%">
                    <div class="grid-demo grid-demo-bg2" style="height: 100%">
                        <fieldset class="layui-elem-field layui-field-title" style="margin-top: 50px;">
                            <legend>today</legend>
                        </fieldset>

                        <table class="layui-table" lay-even="" lay-skin="row">
                            <colgroup>
                                <col width="150">
                                <col width="150">
                                <col width="200">
                                <col>
                            </colgroup>
                            <thead>
                                <tr>
                                    <th style="font-weight: 900;">List</th>
                                    <th style="font-weight: 900;">Describe</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="font-weight: 900;">Date</td>
                                    <td><?php echo  $dataArr['result']['today']['date'] ?></td>
                                </tr>
                                <tr>
                                    <td style="font-weight: 900;">Presummary</td>
                                    <td><?php echo  $dataArr['result']['today']['presummary'] ?></td>

                                </tr>
                                <tr>
                                    <td style="font-weight: 900;">Star</td>
                                    <td><?php echo  $dataArr['result']['today']['star'] ?></td>

                                </tr>
                                <tr>
                                    <td style="font-weight: 900;">Color</td>
                                    <td><?php echo  $dataArr['result']['today']['color'] ?></td>

                                </tr>
                                <tr>
                                    <td style="font-weight: 900;">Number</td>
                                    <td><?php echo  $dataArr['result']['today']['number'] ?></td>

                                </tr>
                                <tr>
                                    <td style="font-weight: 900;">Summary</td>
                                    <td><?php echo  $dataArr['result']['today']['summary'] ?></td>
                                </tr>

                                <tr>
                                    <td style="font-weight: 900;">Money</td>
                                    <td><?php echo  $dataArr['result']['today']['money'] ?></td>
                                </tr>
                                <tr>
                                    <td style="font-weight: 900;">Career</td>
                                    <td><?php echo  $dataArr['result']['today']['career'] ?></td>
                                </tr>
                                <tr>
                                    <td style="font-weight: 900;">Love</td>
                                    <td><?php echo  $dataArr['result']['today']['love'] ?></td>
                                </tr>
                                <tr>
                                    <td style="font-weight: 900;">Health</td>
                                    <td><?php echo  $dataArr['result']['today']['health'] ?></td>
                                </tr>
                            </tbody>
                        </table>


                        <fieldset class="layui-elem-field layui-field-title" style="margin-top: 50px;">
                            <legend>tomorrow</legend>
                        </fieldset>

                        <table class="layui-table" lay-even="" lay-skin="row">
                            <colgroup>
                                <col width="150">
                                <col width="150">
                                <col width="200">
                                <col>
                            </colgroup>
                            <thead>
                                <tr>
                                    <th style="font-weight: 900;">List</th>
                                    <th style="font-weight: 900;">describe</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="font-weight: 900;">Date</td>
                                    <td><?php echo  $dataArr['result']['tomorrow']['date'] ?></td>
                                </tr>
                                <tr>
                                    <td style="font-weight: 900;">Presummary</td>
                                    <td><?php echo  $dataArr['result']['tomorrow']['presummary'] ?></td>

                                </tr>
                                <tr>
                                    <td style="font-weight: 900;">Color</td>
                                    <td><?php echo  $dataArr['result']['tomorrow']['color'] ?></td>

                                </tr>
                                <tr>
                                    <td style="font-weight: 900;">Number</td>
                                    <td><?php echo  $dataArr['result']['tomorrow']['number'] ?></td>

                                </tr>
                                <tr>
                                    <td style="font-weight: 900;">Summary</td>
                                    <td><?php echo  $dataArr['result']['tomorrow']['summary'] ?></td>

                                </tr>
                                <tr>
                                    <td style="font-weight: 900;">Money</td>
                                    <td><?php echo  $dataArr['result']['tomorrow']['money'] ?></td>
                                </tr>
                                <tr>
                                    <td style="font-weight: 900;">Career</td>
                                    <td><?php echo  $dataArr['result']['tomorrow']['career'] ?></td>
                                </tr>
                                <tr>
                                    <td style="font-weight: 900;">Love</td>
                                    <td><?php echo  $dataArr['result']['tomorrow']['love'] ?></td>
                                </tr>
                                <tr>
                                    <td style="font-weight: 900;">Health</td>
                                    <td><?php echo  $dataArr['result']['tomorrow']['health'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <fieldset class="layui-elem-field layui-field-title" style="margin-top: 50px;">
                            <legend>week</legend>
                        </fieldset>

                        <table class="layui-table" lay-even="" lay-skin="row">
                            <colgroup>
                                <col width="150">
                                <col width="150">
                                <col width="200">
                                <col>
                            </colgroup>
                            <thead>
                                <tr>
                                    <th style="font-weight: 900;">List</th>
                                    <th style="font-weight: 900;">Describe</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="font-weight: 900;">Date</td>
                                    <td><?php echo  $dataArr['result']['week']['date'] ?></td>
                                </tr>
                                <tr>
                                    <td style="font-weight: 900;">Job</td>
                                    <td><?php echo  $dataArr['result']['week']['job'] ?></td>

                                </tr>
                                <tr>
                                    <td style="font-weight: 900;">Money</td>
                                    <td><?php echo  $dataArr['result']['week']['money'] ?></td>

                                </tr>
                                <tr>
                                    <td style="font-weight: 900;">Career</td>
                                    <td><?php echo  $dataArr['result']['week']['career'] ?></td>

                                </tr>
                                <tr>
                                    <td style="font-weight: 900;">Love</td>
                                    <td><?php echo  $dataArr['result']['week']['love'] ?></td>

                                </tr>
                                <tr>
                                    <td style="font-weight: 900;">Health</td>
                                    <td><?php echo  $dataArr['result']['week']['health'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <fieldset class="layui-elem-field layui-field-title" style="margin-top: 50px;">
                            <legend>month</legend>
                        </fieldset>

                        <table class="layui-table" lay-even="" lay-skin="row">
                            <colgroup>
                                <col width="150">
                                <col width="150">
                                <col width="200">
                                <col>
                            </colgroup>
                            <thead>
                                <tr>
                                    <th style="font-weight: 900;">List</th>
                                    <th style="font-weight: 900;">describe</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="font-weight: 900;">Date</td>
                                    <td><?php echo  $dataArr['result']['month']['date'] ?></td>
                                </tr>
                                <tr>
                                    <td style="font-weight: 900;">Summary</td>
                                    <td><?php echo  $dataArr['result']['month']['summary'] ?></td>

                                </tr>
                                <tr>
                                    <td style="font-weight: 900;">Money</td>
                                    <td><?php echo  $dataArr['result']['month']['money'] ?></td>

                                </tr>
                                <tr>
                                    <td style="font-weight: 900;">Career</td>
                                    <td><?php echo  $dataArr['result']['month']['career'] ?></td>

                                </tr>
                                <tr>
                                    <td style="font-weight: 900;">Love</td>
                                    <td><?php echo  $dataArr['result']['month']['love'] ?></td>

                                </tr>
                                <tr>
                                    <td style="font-weight: 900;">Health</td>
                                    <td><?php echo  $dataArr['result']['month']['health'] ?></td>
                                </tr>
                            </tbody>
                        </table>

                        <fieldset class="layui-elem-field layui-field-title" style="margin-top: 50px;">
                            <legend>year</legend>
                        </fieldset>

                        <table class="layui-table" lay-even="" lay-skin="row">
                            <colgroup>
                                <col width="150">
                                <col width="150">
                                <col width="200">
                                <col>
                            </colgroup>
                            <thead>
                                <tr>
                                    <th style="font-weight: 900;">list</th>
                                    <th style="font-weight: 900;">describe</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="font-weight: 900;">Date</td>
                                    <td><?php echo  $dataArr['result']['year']['date'] ?></td>
                                </tr>
                                <tr>
                                    <td style="font-weight: 900;">Summary</td>
                                    <td><?php echo  $dataArr['result']['year']['summary'] ?></td>

                                </tr>
                                <tr>
                                    <td style="font-weight: 900;">Money</td>
                                    <td><?php echo  $dataArr['result']['year']['money'] ?></td>

                                </tr>
                                <tr>
                                    <td style="font-weight: 900;">Career</td>
                                    <td><?php echo  $dataArr['result']['year']['career'] ?></td>

                                </tr>
                                <tr>
                                    <td style="font-weight: 900;">love</td>
                                    <td><?php echo  $dataArr['result']['year']['love'] ?></td>

                                </tr>
                            </tbody>
                        </table>




                    </div>
                </div>

            </div>


        </div>

        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/echarts@5/dist/echarts.min.js"></script>
        <script type="text/javascript">



        </script>

        <script src="layui/layui.js" charset="utf-8"></script>
        <!-- 注意：如果你直接复制所有代码到本地，上述 JS 路径需要改成你本地的 -->
        <script>
            var dom = document.getElementById("containers");
            var myChart = echarts.init(dom);
            var app = {};

            var option;



            option = {
                title: {
                    text: '24小时变化',
                    subtext: '地震数据'
                },
                tooltip: {
                    trigger: 'axis'
                },

                toolbox: {
                    show: true,
                    feature: {
                        dataZoom: {
                            yAxisIndex: 'none'
                        },
                        dataView: {
                            readOnly: false
                        },
                        magicType: {
                            type: ['line', 'bar']
                        },
                        restore: {},
                        saveAsImage: {}
                    }
                },
                xAxis: {
                    type: 'category',
                    boundaryGap: false,
                    data: ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23']
                },
                yAxis: {
                    type: 'value',
                    axisLabel: {
                        formatter: '{value} '
                    }
                },
                series: [{
                        name: '数据',
                        type: 'line',
                        data: [3566.32, 3600.13, 3627.69, 3645.5, 3650.66, 3645.42, 3632.43, 3616.08, 3601.38, 3592.36, 3591.05, 3597.29, 3608.49, 3620.47, 3629.09, 3629.11, 3618.74, 3598.7, 3572.82, 3547.13, 3527.56, 3521.11, 3529.48, 3553.23],
                        markPoint: {
                            data: [{
                                    type: 'max',
                                    name: '最大值'
                                },
                                {
                                    type: 'min',
                                    name: '最小值'
                                }
                            ]
                        },
                        markLine: {
                            data: [{
                                type: 'average',
                                name: '平均值'
                            }]
                        }
                    }

                ]
            };




            layui.use(['form', 'layedit', 'laydate'], function() {
                var form = layui.form,
                    layer = layui.layer,
                    layedit = layui.layedit,
                    laydate = layui.laydate;
                laydate1 = layui.laydate;
                //日期
                laydate.render({
                    elem: '#date'
                });

                laydate.render({
                    elem: '#date1'
                });
                //创建一个编辑器
                var editIndex = layedit.build('LAY_demo_editor');

                //自定义验证规则
                form.verify({
                    title: function(value) {
                        if (value.length < 5) {
                            return '标题至少得5个字符啊';
                        }
                    },
                    pass: [
                        /^[\S]{6,12}$/, '密码必须6到12位，且不能出现空格'
                    ],
                    content: function(value) {
                        layedit.sync(editIndex);
                    }
                });

                //监听指定开关
                form.on('switch(switchTest)', function(data) {
                    layer.msg('开关checked：' + (this.checked ? 'true' : 'false'), {
                        offset: '6px'
                    });
                    layer.tips('温馨提示：请注意开关状态的文字可以随意定义，而不仅仅是ON|OFF', data.othis)
                });

                //监听提交
                form.on('submit(demo1)', function(data) {


                    return true;
                });

                //表单赋值
                layui.$('#LAY-component-form-setval').on('click', function() {
                    form.val('example', {
                        "username": "贤心" // "name": "value"
                            ,
                        "password": "123456",
                        "interest": 1,
                        "like[write]": true //复选框选中状态
                            ,
                        "close": true //开关状态
                            ,
                        "sex": "女",
                        "desc": "我爱 layui"
                    });
                });

                //表单取值
                layui.$('#LAY-component-form-getval').on('click', function() {



                    // var data = form.val('example');
                    //  alert(JSON.stringify(data));
                });

            });
        </script>

</body>

</html>