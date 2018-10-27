@extends('layouts.baseframevue')

@section('top')
<div class="text-secondary strong">我爱我家 <i class="fa fa-angle-right"></i> 数据表 <i class="fa fa-angle-right"></i> {{ $tablealias }}</div>
@endsection 

@section('content')
<style type="text/css">
    a{color: #3982ba;"}
</style>          
<div id="app">
  <button data-toggle="modal" @click="modal">hehe</button>
  <w-modal v-bind:active="modalshow"></w-modal>

  <div class="container-fluid mt-2">
      <div class="row">
        <div class="col">
            <div>
                <button class="btn btn-info btn-xsm" v-on:click="checkAll"><i class="fa" v-bind:class="{'fa-check-square':isCheck,'fa-square-o':!isCheck}"></i> @{{ checkButtonLabel }}</button> <button class="btn btn-info btn-xsm"><i class="fa fa-trash"></i> 删除</button> <button class="btn btn-info btn-xsm"><i class="fa fa-file-o"></i> 新增</button> 
            </div>
        </div>
        <div class="col">
            <div class="input-group input-group-sm">
              <select class="custom-select" v-model="field" style="width:40px;padding: 0.3rem;font-size: 0.6rem; line-height: 1.5;height:1.92rem">
                <option value="" selected>选择搜索字段</option>
                <option value="id">ID</option>
                <option value="account_phone">账户</option>
                <option value="real_name">姓名</option>
                <option value="sex">性别</option>
                <option value="email">邮箱</option>
                <option value="id_number">身份证</option>
                <option value="active">账户状态</option>
              </select>
              <input type="text" class="form-control" v-model="keyword">
              <div class="input-group-append">
                <button class="btn btn-info btn-xsm" v-on:click="search"><i class="fa fa-search"></i> 搜索</button>
              </div>
            </div>
        </div>
        
        <div class="col">
          <ul class="pagination pagination-sm samll float-right" style="margin-bottom: 0.5rem;">
            <li class="page-item"><span class="badge badge-success">@{{ users.length }}条记录</span></li>&nbsp;
            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-chevron-left"></i></a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item"><a class="page-link" href="#">5</a></li>
            <li class="page-item"><a class="page-link" href="#">6</a></li>
            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
        
      </div>    

      <div class="row">
        <div class="col-md-12">
            <table class="table small table-sm w-100">
                  <tr align="center">
                    <td>选择</td><td>ID</td><td>账户</td><td>姓名</td><td>性别</td><td>邮箱</td><td>身份证</td><td>身份照片</td><td>账户状态</td><td>密码</td><td>建立时间</td><td>更新时间</td><td>操作</td>
                  </tr>
                  <tr align="center" v-for="user in users">
                      <td>
                          <input type="checkbox" v-model="user.check">
                      </td>
                      <td>
                          @{{ user.id }}
                      </td>
                      <td>
                          @{{ user.account_phone }}
                      </td>
                      <td>
                          @{{ user.real_name }}
                      </td>
                      <td>
                          @{{ user.sex }}
                      </td>
                      <td>
                          @{{ user.email }}
                      </td>
                      <td>
                          @{{ user.id_number }}
                      </td>
                      <td>
                          @{{ user.id_picture }}
                      </td>
                      <td>
                          @{{ user.active }}
                      </td>
                      <td>
                          *****
                      </td>
                      <td>
                          @{{ user.created_at }}
                      </td>
                      <td>
                          @{{ user.updated_at }}
                      </td>
                      <td><a href="" title="编辑"><i class="fa fa-edit fa-fw fa-lg"></i></a><a href=""  title="删除"><i class="fa fa-trash-o fa-fw fa-lg"></i></a>
                      </td>
                  </tr>
          </table>
          <h5 class="text-danger text-center" v-if="users.length<1">没有搜索结果</h5>

        </div>
      </div>
  </div>
</div>

</div>
@endsection

@section('javascript')
<script src="{{ asset('js/component/modal.js')}}"></script>
<script type="text/javascript">
  var vm = new Vue({
      el:'#app',
      data:{
          users: [],
          user_num: '',
          keyword: '',
          field:'',
          checkButtonLabel: '全选',
          isCheck: true,
          modalshow:'',
          
      },
      mounted() {
          axios.put("{{ $_SERVER['REQUEST_URI'] }}",).then(function (res) {
                vm.users = res.data;
          })
      },
      methods:{
        checkAll: function(){
            if(this.checkButtonLabel=='全选'){
                this.users.forEach(function(user){
                    user.check=true;
                  })
                this.checkButtonLabel='不选'
                this.isCheck=false
            }
            else{
                this.users.forEach(function(user){
                    user.check=false;
                  })
                this.checkButtonLabel='全选'
                this.isCheck=true 
            }
        },
        search:function(){
          axios.put("{{ $_SERVER['REQUEST_URI'] }}", {pagesize:10,field:vm.field,keyword:vm.keyword})
            .then(function (response) {
              vm.users = response.data;
              })
        },
        modal:function(){
          this.modalshow='show'
        }
      },
      
  });

</script>
@endsection