<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="vue.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="axios.js"></script>
    <title>购物车demo</title>
</head>
<body>
    <div class="container">
        <div class="app">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">购物车</h3>
                </div>
                <div class="panel-body">
                    <div v-if="goods.length!=0">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>编号</th>
                                <th>商品名称</th>
                                <th>商品价格</th>
                                <th>商品数量</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for=" v,k in goods">
                                <td>{{v.id}}</td>
                                <td>{{v.gname}}</td>
                                <td>{{v.price}}</td>
                                <td>
                                    <button @click="jian(v)">-</button>
                                    {{v.num}}
                                    <button @click="jia(v)">+</button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-info" @click="del(k)">删除</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <h3>总价: {{sum}}</h3>
                    </div>
                    <div v-else>
                        <h3>您的购物车中空空如也,去购物吧...</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        new Vue({
            el:".app",
            data:{
                goods:[

                ]
            },
            computed:{
                sum(){
                    //定义一个变量接受总价
                    var zongjia = 0;
                    //循环goods
                    this.goods.forEach(function (v) {
                        zongjia += v.price * v.num;
                    })
                    return zongjia;
                }
            },
            methods:{
                del(k){
                    this.goods.splice(k,1);
                },
                jia(v){
                    v.num++;
                },
                jian(v){
                    if (v.num > 1){
                        v.num --;
                    }
                },
               getGoods(){
                    axios.get('data.php').then((phpData)=>{
                        this.goods = phpData.data;
                    })
               }
            },
            mounted(){
                //发送异步获取数据
                this.getGoods();
            }

        })
    </script>
</body>
</html>